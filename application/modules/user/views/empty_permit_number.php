
<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	    	<br>
	    	<div class="panel panel-success">
	    		<div class="panel-heading">
	    			<h1>Empty Business Permit Number</h1>
	    		</div>
	    		<div class="panel-body">
						<a class="btn btn-success yes">YES, empty permit number</a>
						<a class="btn btn-info backup">BACK-UP DATABASE</a>
						<a class="btn btn-warning restore">RESTORE DATABASE</a>
						<!-- <a class="btn btn-danger no">NO, I need to review </a> -->
	    		</div>
					<div class="panel-footer foot"></div>
	    	</div>
	    </div>
			<div id="container" style="display:none">
		    <!-- <h1>Upload File</h1> -->

		    <div id="body" >
		      <div class="success"><?php if (isset($success)) {echo $success;}?></div>
		      <div class="error"><?php if (isset($error)) {echo $error;}?></div>

		        <?php echo form_open_multipart('users/import');?>
		          <div>
		              <input name="zip_file" type="file"/>
		            </div>
		            <div>
		              <input type="submit" value="Upload Zip File" />
		            </div>
		        </form>
		    </div>
				<!-- <div class="tab-pane fade in" id="upload_image">
					<div class="portlet">
						<!-- <div class="owner-message"></div> -->
						<!--div class="portlet-header">
							<h4>Uploade database file to restore.</h4>
						</div>

						<div class="portlet-content">
							<?php echo form_open_multipart('',array('id' =>'upload_database_backup'));?>

							<div class="fileinput fileinput-new input-group" data-provides="fileinput">
				                <div class="form-control" data-trigger="fileinput">
				                	<i class="glyphicon glyphicon-file fileinput-exists"></i>
				                	<span class="fileinput-filename"></span>
				                </div>
				                <span class="input-group-addon btn btn-default btn-file">
				                	<span class="fileinput-new"><i class="glyphicon glyphicon-paperclip"></i> Select file</span>
				                		<span class="fileinput-exists"><i class="glyphicon glyphicon-repeat"></i> Change</span>
				                			<input type="file" name="file">
				                </span>
				                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">
				                	<i class="glyphicon glyphicon-remove"></i> Remove
				                </a>
				                <a href="#" id="upload-btn" class="input-group-addon btn btn-success fileinput-exists">
				                	<i class="glyphicon glyphicon-open"></i> Upload
				                </a>
				            </div>
							<?php echo form_close(); ?>
						</div> <!-- End of Portlet Content -->
					</div> <!-- End of Portlet -->
				</div> <!-- End of Application Tab -->
		</div>
	</div>
</div>
