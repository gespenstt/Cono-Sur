<!DOCTYPE html>
<html>
    <head>
            <title>Cono Sur</title>
            <meta charset="UTF-8">
            <meta name=description content="">

            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

            <!-- Bootstrap CSS -->
            <link href="<?=public_path("css/bootstrap.css");?>" rel="stylesheet" media="screen">
            <link href="<?=public_path("css/main.css");?>" rel="stylesheet" media="screen">
            
            <script>
                var det_lang = <?php include_component("componentes", "detectar"); ?>;
            </script>
            <script src="<?=public_path("js/jquery.min.js");?>"></script>
            <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> 
            <script src="<?=public_path("js/bootstrap.js");?>"></script> 
            <script src="<?=public_path("js/jquery.cycle2.min.js");?>"></script>
            <script src="<?=public_path("js/jquery.form.js");?>"></script>
            <!--[if IE]>
            <script src="http://goo.gl/r57ze"></script>
            <![endif]-->
            <script src="<?=public_path("js/fix-ios6.js");?>"></script>
            <script src="<?=public_path("js/base.js");?>"></script>
    </head>
    <body>
        <div class="container">
            <input type="hidden" id="url_lang" value="<?=url_for("home/lang/?set=CHANGE");?>" />
<?php include_component("componentes", "menu"); ?>            
<?php echo $sf_content ?>
<?php include_component("componentes", "footer"); ?> 
        </div>
<?php include_component("componentes", "stuff"); ?> 
    </body>
</html>
