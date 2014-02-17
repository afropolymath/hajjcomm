<div class="box">
	<div class="title">Applicants</div>
	<div class="content">
		<? if(!empty($people)): ?>
			<div class="alert-box notice radius">Displaying <?= count($people); ?> applicants</div>
			<table width="100%" cellpadding="0" cellspacing="0">
				<thead>
				    <tr>
				    	<th>Applicant Name</th>
				    	<th>Passport Number</th>
				    	<th></th>
				    </tr>
				</thead>
				<tbody>
					<? foreach($people as $person): ?>
				    <tr>
				    	<td><?= anchor("applicants/view/" . $person->id, $person->firstname . " " . $person->middlename . " " . $person->lastname); ?></td>
				    	<td><?= $person->passport_number; ?></td>
				    	<td align = "right"><?= anchor("applicants/delete", "Delete", array("class" => "delete icon-buttons")). " " . anchor("applicants/edit", "Edit", array("class" => "edit icon-buttons")); ?></td>
				    </tr>
					<? endforeach; ?>
				</tbody>
			</table>
		<? else: ?>
			<div class="alert-box radius">There are no applicants yet</div>
		<? endif; ?>
		<?= anchor("applicants/create", "New Applicant", array("class"=>"load-implicit tiny button radius")); ?>
	</div>
</div>