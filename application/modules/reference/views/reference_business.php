<script>
  $(document).ready(function(){
                $('ul#myTab1').each(function(){
                    var $active, $content, $links = $(this).find('a');
                    $active = $links.first().addClass('active');
                    $content = $($active.attr('href'));
                    $links.not(':first').each(function () {
                    $($(this).attr('href')).hide();
                    });

                    $('#update_announcement').on('click', 'a', function(e){
                        $active.removeClass('active');
                        $content.hide();
                        $active = $(this);
                        $content = $($(this).attr('href'));
                        $active.addClass('active');
                        $content.show();
                        e.preventDefault();
                    });
                });
            });
</script>
<div id="content">
	<div id="content-header"> 
		<h1>Business References</h1>
	</div>

	<div id="content-container">
		<div class="row">
			<div class="col-md-12">
				<ul id="myTab1" class="nav nav-pills">
					<li class="active"><a href="#barangay-ref" data-toggle="tab"> Barangay</a></li>
					<li><a href="#chart-of-accounts" data-toggle="tab"> Chart of Accounts</a></li>
					<li><a href="#industry-sector" data-toggle="tab"> Industry Sector</a></li>
					<li><a href="#citizenship-ref" data-toggle="tab"> Citizenship</a></li>
					<li><a href="#economic-area" data-toggle="tab"> Economic Area</a></li>
					<li><a href="#economic-organization" data-toggle="tab"> Economic Organization</a></li>
				</ul>

				<div class="tab-content">
					<?php $this->load->view('tabs/barangay_ref'); ?>
					<?php $this->load->view('tabs/chart_of_accounts'); ?>
					<?php $this->load->view('tabs/industry_sector'); ?>
					<?php $this->load->view('tabs/citizenship_ref'); ?>
					<?php $this->load->view('tabs/economic_area'); ?>
					<?php $this->load->view('tabs/economic_organization'); ?>
				</div>

			</div>
		</div>
	</div>
</div>