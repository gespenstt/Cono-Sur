
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Backend Tab Campanario</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="<?=public_path("css/bootstrap.min.css");?>" rel="stylesheet">
    <link href="<?=public_path("css/bootstrap-responsive.min.css");?>" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="<?=public_path("css/font-awesome.min.css");?>" rel="stylesheet">        
    
    <link href="<?=public_path("css/ui-lightness/jquery-ui-1.10.0.custom.min.css");?>" rel="stylesheet">
    
    <link href="<?=public_path("css/base-admin-3.css");?>" rel="stylesheet">
    <link href="<?=public_path("css/base-admin-3-responsive.css");?>" rel="stylesheet">
    
    <link href="<?=public_path("css/pages/dashboard.css");?>" rel="stylesheet">  

    <link href="<?=public_path("css/custom.css");?>" rel="stylesheet"> 

    <link href="<?=public_path("css/custom.css");?>" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

<body>

<?php include_component("componentes", "menu"); ?>
    
    
<div class="main">

    <div class="container">

        <?php echo $sf_content; ?>

    </div> <!-- /container -->
    
</div> <!-- /main -->
    


<div class="footer">
		
	<div class="container">
		
		<div class="row">
			
			<div id="footer-copyright" class="ol-md-6">
				&copy; <?=date("Y");?> Backend Trivia
			</div> <!-- /span6 -->
			
		</div> <!-- /row -->
		
	</div> <!-- /container -->
	
</div> <!-- /footer -->



    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?=public_path("js/libs/jquery-1.9.1.min.js");?>"></script>
<script src="<?=public_path("js/libs/jquery-ui-1.10.0.custom.min.js");?>"></script>
<script src="<?=public_path("js/libs/bootstrap.min.js");?>"></script>

<script src="<?=public_path("js/plugins/flot/jquery.flot.js");?>"></script>
<script src="<?=public_path("js/plugins/flot/jquery.flot.pie.js");?>"></script>
<script src="<?=public_path("js/plugins/flot/jquery.flot.resize.js");?>"></script>

<script src="<?=public_path("js/libs/bootstrap/bootstrap-filestyle.min.js");?>"></script>

<script src="<?=public_path("js/Application.js");?>"></script>

<script src="<?=public_path("js/charts/area.js");?>"></script>
<script src="<?=public_path("js/charts/donut.js");?>"></script>

  </body>
</html>
