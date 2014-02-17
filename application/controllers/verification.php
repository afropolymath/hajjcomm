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
		$this->form_validation->set_rules('company_name', 'Company Name', 'required|xss_clean|callback__companyexists');

		if($this->form_validation->run()) {
			$vars = $this->input->post();
			unset($vars['create']);
			//Validate Date
			$config['upload_path'] = './uploads/passport/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '2048';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			if(strtotime($vars['expiry_date']) - strtotime($vars['issue_date']) <= 0) {
				$this->message->set('error', 'The expiry date must be after the issue date');
				$error = true;
			}
			if($_FILES['passport_scan']['name'] != "") {
				$path = pathinfo($_FILES['passport_scan']['name']);
				$config['file_name'] = $vars['passport_number'].".".$path['extension'];

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('passport_scan'))
				{
					$error = true;
					foreach($this->upload->display_errors() as $message) {
						$this->message->set('error', $message);
					}
				} else {
					$vars['passport_scan'] = "uploads/passport/" . $config['file_name'];
				}
			} else {
				$error = true;
				$this->message->set('error', 'You must provide the location of the scanned passport bio-data page');
			}
			if(!$error) {
				$vars['company_id'] = $this->session->userdata('company_id');
				$insert_id = $this->applicant->insert($vars);
				$this->message->set('success','Successfully created a new applicant.');
				redirect("applicants/view/$insert_id");
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */