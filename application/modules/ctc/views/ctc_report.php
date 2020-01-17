<div id="page-wrapper">
	<div class="row">
	<h2>CTC REPORT</h2> <br>

<table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline thistable"
				data-display-rows="10" data-info="true" data-search="true"
				data-length-change="true" data-paginate="true" id="assess"
				aria-describedby="assess">
    <thead>
        <th>CTC NO.</th>
        <th>OWNER</th>
        <th>ENCODER</th>
        <th>TOTAL</th>
    </thead>
    
    <tbody>
    <?php foreach ($ctc as $c){ ?>
    <tr>
        <td><?php echo $c->ctc_no; ?></td>
        <td><?php echo $c->firstname . ' ' . $c->middlename.' '.$c->lastname ; ?></td>
        <td><?php echo $c->encoder; ?></td>
        <td>&#8369;<?php echo $c->overalltotal; ?></td>
        </tr>
        <?php } ?>
    </tbody>
        
</table>

     

</div>
</div>