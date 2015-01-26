<!--
<?php  
require_once '/var/www/fabui/application/plugins/modelbrowser/lib/thingiverse.php';
$thingiverse = new Thingiverse();
//~ $thingiverse->redirect_uri = 'fabui/application/plugins/modelbrowser/views/index/index';
?>
-->
<div class="row">
	<!-- col -->
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<h1 class="page-title txt-color-blueDark">
			<i class="fab-fw icon-fab-plugin"></i> Model Browser 
		</h1>
	</div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-align-right">
        <div class="page-title">

        </div>
    </div>
</div>

<div class="container">
		<?php 
		if ($thingiverse->access_token = $_GET['access_token']):
			$thingiverse->getThing('603223');
			var_dump($thingiverse->response_data);
		?>
		<?php  
		elseif ($code = $_GET['code']):
			$thingiverse->oAuth($code);
			echo 'Access Token: ' . $thingiverse->access_token;
			$thingiverse->getUser();
			var_dump($thingiverse->response_data);
		?>
			<a href="?access_token=<?php echo $thingiverse->access_token; ?>">See User Likes</a>			
		<?php  
		else:
		?>
			<a href="<?php echo $thingiverse->makeLoginURL(); ?>">Login with Thingiverse</a>
		<?php  
		endif;
		?>
	</div>
