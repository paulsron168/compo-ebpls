<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12"><br>
			<div class="panel panel-success">
				<div class="panel-heading">
					<h1> Bulletin Board</h1>
				</div>
				<div class="panel-body">
					<?php foreach ($announcement as $a){?>
					<div class="col-lg-4">
						<input type="hidden" value = "<?php echo $a->announce_id;?>">
						<div class="panel panel-success">
							<div class="panel-body">
								<div class="panel-group" id="accordion">

									<div class="panel panel-default">
										<div class="panel-heading">
												<h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $a->announce_id?>"><?php echo $a->title;?></a>
														<a style="float:right" href="#<?php echo $a->announce_id?>" title="Add an anouncement" class="add" data-aid="<?php echo $a->announce_id;?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
														<a style="float:right" href="#<?php echo $a->announce_id?>" title="Delete an anouncement" class="delete" data-aid="<?php echo $a->announce_id;?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
														<a style="float:right" href="#<?php echo $a->announce_id?>" title="Edit an anouncement" class="edit" data-aid="<?php echo $a->announce_id;?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        </h4>
											<div id="<?php echo $a->announce_id;?>" class="panel-collapse collapse">
												<div class="panel-body">
													<?php echo $a->announce_content;?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
			<br>
		</div>
	</div>
</div>

<!-- Modals -->
<?php $this->load->view('home/modals/success'); ?>
<?php $this->load->view('home/modals/add_announcement'); ?>
