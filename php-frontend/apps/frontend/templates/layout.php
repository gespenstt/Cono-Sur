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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js?version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>        
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-52102454-1', 'conosur.com');
          ga('send', 'pageview');

        </script>        
        <div class="container">
            <input type="hidden" id="url_lang" value="<?=url_for("home/lang/?set=CHANGE");?>" />
<?php include_component("componentes", "menu"); ?>            
<?php echo $sf_content ?>
<?php include_component("componentes", "footer"); ?> 
        </div>
<?php include_component("componentes", "stuff"); ?> 
    </body>
</html>
