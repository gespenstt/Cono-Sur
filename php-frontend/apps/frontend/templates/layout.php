<!DOCTYPE html>
<html>
    <head>
            <title>Cono Sur</title>
            <meta charset="UTF-8">
            <meta name=description content="">
            <meta name=viewport content="width=device-width, initial-scale=1">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Bootstrap CSS -->
            <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
                <link href="<?=public_path("css/main.css");?>" rel="stylesheet" media="screen">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="<?=public_path("js/jquery.cycle2.min.js");?>"></script>
            <script src="<?=public_path("js/fix-ios6.js");?>"></script>
            <script>
                var det = '<?php include_component("componentes", "detectar"); ?>'; 
            </script>
    </head>
    <body>
        <div class="container">
<?php include_component("componentes", "menu"); ?>            
<?php echo $sf_content ?>
<?php include_component("componentes", "footer"); ?> 
        </div>
    </body>
</html>
