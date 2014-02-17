<div class="box">
	<div class="title">Make Deposit</div>
	<div class="content">
		<? if(!empty($person)): ?>
			<h3><?= $person->firstname . " " . $person->middlename . " " . $person->lastname;; ?></h3>
			<label for="service">Select a Service to begin</label>
			<select name="service">
		    	<option value="mr">Single Trip</option>
		    	<option value="mrs">Double Trip</option>
		    </select>
		    <table width="100%" class="mini-style" cellpadding="0" cellspacing="0">
				<tbody>
				    <tr>
				    	<th>Service Cost</th>
				    	<td>$1234.00</td>
				    </tr>
				    <tr>
				    	<th>Minimum Deposit</th>
				    	<td>$50</td>
				    </tr>
				</tbody>
			</table>
			<label for="deposit_amount">Enter the amount you want to deposit</label>
			<input type="text" name="deposit_amount"/>
			<div><?= anchor("agent/edit", "Proceed", array("class" => "tiny button radius")); ?></div>
		<? else: ?>
			<div class="alert-box">You are viewing an invalid applicant</div>
		<? endif; ?>
	</div>
</div>