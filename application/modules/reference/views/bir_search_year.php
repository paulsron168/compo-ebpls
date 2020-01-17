<div class="tab-pane fade in" id="business-nature">
	<div class="portlet">
		<div class="nature-message"></div>
		<div class="portlet-header">
			<h3><i class="fa fa-leaf"></i> <span>Business Nature List</span></h3>
			<ul class="portlet-tools pull-right business-nature">
				<li id="add-new-nature">
					<a data-toggle="modal" href="#new-nature" class="btn btn-sm btn-primary add">
						<i class="fa fa-plus-circle"></i> Add New Business Nature
					</a>
				</li>
			</ul>
		</div>
		<div class="portlet-content">
			<!-- <table class="table table-striped table-bordered table-hover table-highlight
					dataTable-helper dataTable datatable-columnfilter"
					data-provide="datatable"data-display-rows="10" data-info="true" 
					data-length-change="true" data-paginate="true" id="business-nature-list"
					aria-describedby="business-nature-list"> -->
			<div id="business_nature_content">
			<table id="business-nature-list" class="table table-striped table-bordered table-hover table-highlight buss_nature" 
				data-provide="datatable" 
				data-display-rows="10"
				data-info="true"
				data-search="true"
				data-length-change="true"
				data-paginate="true"
			>
				
			</table>
			</div>
			<!-- <table class="table table-striped table-bordered table-hover table-highlight
					dataTable-helper dataTable datatable-columnfilter"
					data-provide="datatable"data-display-rows="10" data-info="true" 
					data-length-change="true" data-paginate="true" id="requirements-list"
					aria-describedby="requirements-list" style="display: none"> -->
					<div id='requirement_list_content'>
			<table id="requirements-list" style="display: none" class="table table-striped table-bordered table-hover table-highlight">
				<thead>
					<tr>
						<th>#</th>
						<th colspan="2">Requirements</th>				
					</tr>
				</thead>
				<tbody></tbody>
			</table>
			</div>

			
		</div>
	</div>
</div>
</div>