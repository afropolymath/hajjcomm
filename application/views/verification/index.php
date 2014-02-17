<div class="box">
	<div class="title">Recently added applicants</div>
	<div class="content">
		<? if(!empty($people)): ?>
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
<div class="box">
	<div class="title">Information from NAHCON</div>
	<div class="content">
		<ul>
            <li>All tour agencts are expected to file in their final set of applicants before the end of the week. This is to be done in order to make the selection process as fair as possible.</li>
            <li>The new handbook for NAHCON registration is now out. Click here to download. Ensure to relay all the relevant information to your applicants and every other concerned party.</li>
        </ul>
	</div>
</div>