<!DOCTYPE html>
<html>
    <head>
            <title>Cono Sur</title>
            <meta charset="UTF-8">
            <meta name="description" content="Cono Sur is in search of a savory new main dish to pair with one of their wines and calling all bloggers from England, Finland, Ireland and Sweden to participate. A Semi-Finalist will be selected from each country and sent to Paris, France to compete in the Grand Finale. The Grand Prize: A trip for two to Chile to visit Cono Sur Vineyards & Winery and discover its beautiful home country">

            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <!-- for Facebook -->          
            <meta property="og:title" content=<?php echo get_slot('social_title', '"Cono Sur"') ?> />
            <meta property="og:type" content="website" />
            <meta property="og:image" content="<?php echo get_slot('social_img', 'http://bloggercompetition.conosur.com/img/logo-conosur.png') ?>" />
            <meta property="og:description" content=<?php echo get_slot('social_desc', '"Cono Sur is in search of a savory new main dish to pair with one of their wines and calling all bloggers from England, Finland, Ireland and Sweden to participate. A Semi-Finalist will be selected from each country and sent to Paris, France to compete in the Grand Finale. The Grand Prize: A trip for two to Chile to visit Cono Sur Vineyards & Winery and discover its beautiful home country"') ?> />

            <!-- for Twitter -->          
            <meta name="twitter:card" content="summary" />
            <meta name="twitter:title" content=<?php echo get_slot('social_title', '"Cono sur"') ?> />
            <meta name="twitter:description" content=<?php echo get_slot('social_desc', '"Cono Sur is in search of a savory new main dish to pair with one of their wines and calling all bloggers from England, Finland, Ireland and Sweden to participate. A Semi-Finalist will be selected from each country and sent to Paris, France to compete in the Grand Finale. The Grand Prize: A trip for two to Chile to visit Cono Sur Vineyards & Winery and discover its beautiful home country"') ?> />
            <meta name="twitter:image" content="<?php echo get_slot('social_img', 'http://bloggercompetition.conosur.com/img/logo-conosur.png') ?>" />

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