
<div class="row">

<?php foreach ($_response_data as $thing) {?>
	<div class="col-md-6 col-sm-12">

		<article>
			
			<div class="col-md-2 col-sm-2">
			<img alt="" src="<?php echo $thing->thumbnail; ?>">
			</div>
			<div class="col-md-10 col-sm-10">
			<a href="<?php echo MY_PLUGIN_URL.'show_thing/'.$thing->id?>"><h3><?php echo $thing->name ?></h3></a>
			</div>

		</article>
	</div>


<?php }?>


	




</div>