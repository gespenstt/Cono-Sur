<?php
    //$contFooter = file_get_contents("http://conosur.ratamonkey.com/web/index.php/componentes/footer");
    //echo $contFooter;
    $url = 'http://conosur.ratamonkey.com/web/index.php/componentes/footer';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // you may set this options if you need to follow redirects. Though I didn't get any in your case
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    $content = curl_exec($curl);
    curl_close($curl);
    echo $content;
?>