<div class="box">
	<div class="title">Viewing Applicant</div>
	<div class="content">
		<? if(!empty($person)): ?>
			<h3><?= $person->firstname . " " . $person->middlename . " " . $person->lastname;; ?></h3>
			<div class="alert-box alert radius">This user has no records of payment</div>
			<dl class="tabs" data-tab width="100%">
				<dd class="active"><a href="#panel1">Passport Details</a></dd>
				<dd><a href="#panel2">Scanned Biodata Page</a></dd>
				<dd><a href="#panel3">Finances</a></dd>
				<dd><a href="#panel4">Application Status</a></dd>
			</dl>
			<div class="tabs-content">
				<div class="content active" id="panel1">
					<table width="100%" class="mini-style" cellpadding="0" cellspacing="0">
						<tbody>
						    <tr>
						    	<th>Passport Number</th>
						    	<td><?= $person->passport_number; ?></td>
						    </tr>
						    <tr>
						    	<th>Issue Date</th>
						    	<td><?= $person->issue_date; ?></td>
						    </tr>
						    <tr>
						    	<th>Expiry Date</th>
						    	<td><?= $person->expiry_date; ?></td>
						    </tr>
						    <tr>
						    	<th>Issue Place</th>
						    	<td><?= $person->issue_place; ?></td>
						    </tr>
						</tbody>
					</table>	
				</div>
				<div class="content" id="panel2">
					<?= img($person->passport_scan); ?>
				</div>
				<div class="content" id="panel3">
			    	<p>This is the third panel of the basic tab example. This is the third panel of the basic tab example.</p>
				</div>
				<div class="content" id="panel4">
			    	<p>This is the fourth panel of the basic tab example. This is the fourth panel of the basic tab example.</p>
				</div>
			</div>
			<div><?= anchor("agent/edit", "Edit User Profile", array("class" => "tiny button radius")); ?> <?= anchor("applicants/deposit/".$person->id, "Make Deposit", array("class" => "tiny button radius load-implicit")); ?></div>
		<? else: ?>
			<div class="alert-box">You are viewing an invalid applicant</div>
		<? endif; ?>
	</div>
</div>