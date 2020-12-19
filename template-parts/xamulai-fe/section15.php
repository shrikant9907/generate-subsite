
<?php 
$prevData = $_SESSION['prevData'] ;
$autolpSettings = $_SESSION['autolpSettings']; 

if($autolpSettings['section_15'] && ($prevData['section15_heading'] || $prevData['section15_client_image'] | $prevData['section15_client_description'] | $prevData['section15_client_name'])){
?>
<!-- Testimonials Section Start -->
<section class="section-testimonials common-section pt_80 pb_80 bg-light-pink">
<?php if ($prevData['section15_heading']) { ?>
<div class="container">
    <h2 class="main-heading-ui text-center with-bottom-border"><?php echo $prevData['section15_heading']; ?></h2>
</div>
<?php } ?>
<?php if($prevData['gs15']){ ?>
	<div class="container-fluid">
		<div class="row">
			<?php foreach( $prevData['gs15'] AS $gs15 ){ 
			if ($gs15['section15_client_image'] || $gs15['section15_client_description'] || $gs15['section15_client_name']){ ?>	
				<div class="col-12 col-sm-4">
					<!-- Card Start -->
					<div class="testimonials-card">
						<div class="card-icon">
							<i class="fas fa-quote-right"></i>
						</div>
						<div class="card-image-wr text-center bg-light">
							<img  class="card_image" src="<?php echo $gs15['section15_client_image']; ?>">
						</div>
						<div class="card-body">
							<p class="card-text"><?php echo $gs15['section15_client_description']; ?></p>
							<h5 class="card-title"><?php echo $gs15['section15_client_name']; ?></span></h5>
						</div>
					</div>
					<!-- Card End -->
				</div>
			<?php }
			} ?>			
		</div>
	</div>
<?php } ?>	
</section>
<!-- Testimonials Section End -->
<?php } ?>