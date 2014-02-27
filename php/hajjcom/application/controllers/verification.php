<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verification extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		$this->data['title'] = "Welcome to KronJobs";
		$this->data['people'] = $this->applicant->get_many_by(array('company_id' => $this->session->userdata('company_id')));
		$this->data['applicant_count'] = count($this->data['people']);
	}
	public function index() {
		$this->data['title'] = "Welcome to KronJobs";
	}
	public function login() {
		$this->layout = 'layouts/login';
		$this->data['title'] = "Login to KronJobs";
		$this->form_validation->set_rules('username', 'Username', 'required|xss_clean|callback__exists');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
		if($this->form_validation->run()) {
			$this->message->set('success', 'You have now successfully logged in.');
			redirect('verification/index');
		}
	}
	public function logout() {
		$this->session->sess_destroy();
		$this->message->set('success', 'You have now successfully logged out.');
		redirect('verification/login');
	}
	public function _exists() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$var = $this->auth->get_by(array("username"=>$username, "password"=>sha1($password)));
		if($var) {
			$array = array( 'display_name' => $var->display_name, 'username' => $username, 'user_id' => $var->id , 'company_id' => $var->company_id, 'last_login' => $var->last_login );
			$this->session->set_userdata( $array );
			$this->auth->update($var->id, array("last_login" => date("Y-m-d H:i:s")));
			return true;
		} else {
			$this->form_validation->set_message('_exists', 'The username or password is incorrect.');
			return false;
		}
	}
	public function create_user() {
		$error = false;
		$this->layout = 'layouts/interim';
		$this->form_validation->set_rules('company_name', 'Company Name', 'required|xss_clean|callback__is_company');
		$this->form_validation->set_rules('address', 'Company Address', 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Company E-mail Address', 'required|xss_clean|valid_email');
		$this->form_validation->set_rules('manager_name', 'Account Manager Name', 'required|xss_clean');
		$this->form_validation->set_rules('manager_role', 'Account Manager Role', 'required|xss_clean');
		if($this->form_validation->run()) {
			$vars = $this->input->post();
			unset($vars['create']);
			$vars['date_created'] = $vars['date_modified'] = date("Y-m-d H:i:s");
			$key = strtoupper( substr(sha1(time()),0,10) );
			$vars['login_key'] = $key;
			$config['upload_path'] = "./company_records/";
			$config['allowed_types'] = 'doc|docx|pdf';
			$config['max_size']	= '2048';
			if($_FILES['manager_cv']['name'] != "") {
				$path = pathinfo($_FILES['manager_cv']['name']);
				$config['file_name'] = $key.".".$path['extension'];

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('manager_cv')) {
					$error = true;
					foreach((array) $this->upload->display_errors() as $message) {
						$this->message->set('error', $message);
					}
				} else {
					$vars['manager_cv'] = "company_records/" . $config['file_name'];
				}
			} else {
				$error = true;
				$this->message->set('error', 'You must provide the CV for your account manager');
			}
			if(!$error) {
				mkdir("company_records/$key/");
				if($insert_id = $this->company->insert($vars)) {
					$this->record->insert(['company_id' => $insert_id]);
					$array = [ 'interim_user' => $key, 'company_id' => $insert_id ];
					$this->session->set_userdata( $array );
					$this->message->set("success","You company has been successfully added to the database.");
					redirect("verification/user_portal");
				}
			}
		}

	}
	public function user_portal() {
		$this->layout = 'layouts/interim';
		if(!$this->session->userdata('interim_user')) {
			if($this->input->post('interim_user')) {
				$company = $this->company->get_by(['login_key' => $this->input->post('interim_user')]);
				if($company) {
					$array = [ 'interim_user' => $this->input->post('interim_user') , 'company_id' => $company->id ];
					$this->session->set_userdata( $array );
					$this->data['company_records'] = $this->record->get_by(['company_id' => $company->id]);
				} else {
					redirect("verification/login");
				}
			} else {
				redirect("verification/login");
			}
		} else {
			$error = false;
			if($this->input->post('document_upload')) {
				$config['upload_path'] = "./company_records/".$this->session->userdata('interim_user')."/";
				$config['allowed_types'] = 'doc|docx|pdf';
				$config['max_size']	= '2048';
				foreach($_FILES as $field_name => $value) {
					if($_FILES[$field_name]['name'] != "") {
						$path = pathinfo($_FILES[$field_name]['name']);
						$config['file_name'] = $field_name.".".$path['extension'];

						$this->load->library('upload', $config);

						if ( ! $this->upload->do_upload($field_name)) {
							$error = true;
							foreach((array) $this->upload->display_errors() as $message) {
								$this->message->set('error', $message);
							}
						} else {
							$vars[$field_name] = "company_records/".$this->session->userdata('interim_user')."/".$config['file_name'];
						}
					} else {
						$error = true;
						$this->message->set('error', 'There was an error while trying to upload the document');
					}
					if(!$error) {
						if($this->record->update_by(['company_id' => $this->session->userdata('company_id')], $vars)) {
							$this->message->set("success","Document upload successful.");
						}
					}
				}
			}
			
			$test_records = $this->data['company_records'] = $this->record->get_by(['company_id' => $this->session->userdata('company_id')]);
			$this->data['company'] = $this->company->get($this->session->userdata('company_id'));
			$test_records = (array)$test_records;
			$complete_status = true;
			if($this->input->post('process_application') && $this->input->post('processVar') == sha1($this->data['company_records']->id)) {
				foreach($test_records as $k=>$v) {
					if(!isset($v)) { $complete_status = false; }
				}
				if($complete_status) {
					$this->session->set_userdata( 'application_status', 'complete' );
				} else {
					$this->message->set('error', 'Application incomplete.');
				}
			}
		}
		$this->output->enable_profiler(TRUE);

	}
	public function confirm() {

	}
	public function _is_company() {
		$company_name = $this->input->post('company_name');
		if($this->company->get_by(array('company_name' => $company_name))) {
			$this->form_validation->set_message('_is_company', 'A company with a similar name already exists.');
			return false;
		} else {
			return true;
		}

	}
	public function process() {

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */