<div id="page-wrapper">
	<div class="row">
	<h2>CTC Settings</h2> <br>
		<div class="col-lg-12"><br>
                    <table class="table" style="width:50%;">
						<?php foreach ($ctc as $c){ ?>
						<tr>
							<td><?php echo $c->ctc_type; ?></td>
							<td><?php echo $c->ctc_interest_rate; ?></td>
							<td><?php echo $c->ctc_ceiling_rate; ?></td>
							<td><a href="#">Edit</a></td>
						</tr>
						<?php } ?>
					</table>
		</div>
	</div>
</div>