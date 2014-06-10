<?php
    $array_diccionario = $sf_data->getRaw("diccionario");
?>

				<div class="container-fluid">

					<div class="row show-grid violet row-no-margin">

						<div class="col-md-5 text-center">
							<h1><?=$array_diccionario["panel_a"]["titulo"];?></h1>

							<p class="text-14-uppercase"><?=$array_diccionario["panel_a"]["texto"];?></p> 

							<h2><?=$array_diccionario["panel_a"]["box"];?></h2>
							
						</div>

					  	<div class="col-md-7 contest-details">

					  		
					  	</div>

					</div>

					<h1 class="text-center"><?=$array_diccionario["panel_b"]["titulo"];?></h1>

					<p class="text-center text-14-uppercase"><?=$array_diccionario["panel_b"]["texto"];?></p> 

				</div>

				<div class="container-fluid">

					<div class="mustard triangle"></div>

					<div class="row show-grid mustard row-no-margin text-center">

						<div class="col-md-4 ">

							<span class="icon-like"></span>

							<h3><?=$array_diccionario["panel_c"]["titulo"];?></h3>

							<p class="paragraph-color-especial"><?=$array_diccionario["panel_c"]["texto"];?></p>

						</div>

					  	<div class="col-md-4">

					  		<span class="icon-chef"></span>

					  		<h3><?=$array_diccionario["panel_d"]["titulo"];?></h3>

							<p class="paragraph-color-especial"><?=$array_diccionario["panel_d"]["texto"];?></p>
					  		
					  	</div>

					  	<div class="col-md-4">

					  		<span class="icon-airplane"></span>

					  		<h3><?=$array_diccionario["panel_e"]["titulo"];?></h3>

							<p class="paragraph-color-especial"><?=$array_diccionario["panel_e"]["texto"];?></p>
					  		
					  	</div>

					</div>

					<p><small><?=$array_diccionario["panel_f"]["link"];?></small></p>

					<p><?=$array_diccionario["panel_f"]["texto"];?></p>

				</div>
				