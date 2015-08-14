
<!-- Modal -->
<div class="modal fade" id="modalLang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Welcome to Cono Sur´s Blogger Competition!</h4>
      </div>

      <div class="modal-body">

        <p>Although your country is not participating this year, we invite you to check out the site and stay tuned for heaps of savory recipes to pair with your favorite Cono Sur wines, which we will publish 11 August, 2015. </p> 

        <h4>Participating Countries</h4>

        <p><img src="<?=public_path("img/country-modal.png");?>" alt=""></p>
 
        <h4>Cheers!</h4>
         <p>
             Confirm you are above legal drinking age to enter the site.<br />
             Product for those of legal drinking age. Enjoy responsibly.
         </p>             
         <a href="<?=url_for("home/lang/?set=en&legal=ok");?>" type="button" class="btn btn-submit" >I am of legal age.</a> 
         <a href="http://www.google.com" type="button" class="btn btn-submit" >I am not of legal age.</a>

      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalRecipeError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Ups!</h4>
      </div>

      <div class="modal-body">

         <p>An error has occurred, please try again later.</p>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalRecipe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Congratulations!</h4>
      </div>

      <div class="modal-body">

         <p>You have successfully entered the Cono Sur Blogger Competition. We will

publish the recipes on this site on 18.08.2015 when the voting begins. If you have any questions, 

please write to <a href="mailto:webmanager@conosurwinery.cl">webmanager@conosurwinery.cl</a>.</p>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalLoading" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" align="center" style="padding-top: 100px;">
      <img src="<?=public_path("img/ajax-loader.gif");?>" />
  </div>
</div>

<!-- Modal COUNTRY -->
<div class="modal fade" id="modalRestriccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
          
      <?php
        switch ($lang){
            case "se":
        ?> 
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Välkommen</h4>
      </div>

      <div class="modal-body">
         <p>På den här webbplatsen förekommer det information om alkoholhaltiga drycker och du måste ha fyllt 25 år för att besöka den.</p>

        <h4>Deltagande länder</h4>

        <p><img src="<?=public_path("img/country-modal.png");?>" alt=""></p>

         <a href="<?=url_for("home/accept/?legal=ok");?>" type="button" class="btn btn-submit" id="aceptar">Jag är 25år eller äldre</a> 
         <a href="http://www.google.com" type="button" class="btn btn-submit" id="aceptar">Jag är under 25år</a>

      </div>   
        <?php            
                break;
            case "ie":
        ?>
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Welcome</h4>
      </div>

      <div class="modal-body">
         <p>
          Welcome to the Cono Sur Blogger Competition 2015!<br />
          You must be of legal age to enter this site.
        </p>

        <h4>Participating Countries</h4>

        <p><img src="<?=public_path("img/country-modal.png");?>" alt=""></p>
        
         <a href="<?=url_for("home/accept/?legal=ok");?>" type="button" class="btn btn-submit" id="aceptar">I am of legal age.</a> 
         <a href="http://www.google.com" type="button" class="btn btn-submit" id="aceptar">I am not of legal age.</a>

      </div>   
        <?php  
                break;
            case "ca":
        ?>
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Welcome</h4>
      </div>

      <div class="modal-body">

        <p>
          Welcome to the Cono Sur Blogger Competition 2015!<br />
          You must be of legal age to enter this site.
        </p>

        <h4>Participating Countries</h4>

        <p><img src="<?=public_path("img/country-modal.png");?>" alt=""></p>
        
         <a href="<?=url_for("home/accept/?legal=ok");?>" type="button" class="btn btn-submit" id="aceptar">I am of legal age.</a> 
         <a href="http://www.google.com" type="button" class="btn btn-submit" id="aceptar">I am not of legal age.</a>

      </div>   
        <?php  
                break;
            case "jp":
        ?>
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">ようこそ</h4>
      </div>

      <div class="modal-body">
         <p>
          コノスル・ブロガー・コンペティション2015へようこそ！<br />
          このサイトを閲覧するためには、法律で飲酒が可能な年齢（20歳以上）である必要があります。
        </p>

        <h4>Participating Countries</h4>

        <p><img src="<?=public_path("img/country-modal.png");?>" alt=""></p>
        
        <a href="<?=url_for("home/accept/?legal=ok");?>" type="button" class="btn btn-submit" id="aceptar">20歳以上です。</a> 
         <a href="http://www.google.com" type="button" class="btn btn-submit" id="aceptar">20歳以上ではありません。</a>

      </div>   
        <?php  
                break;
            case "cl":
        ?>
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Bienvenido</h4>
      </div>

      <div class="modal-body">
         <p>
          Bienvenido al Concurso Cono Sur Blogger 2015!<br />
          Debes ser mayor de edad para entrar en este sitio.
        </p>

        <h4>Países Participantes</h4>

        <p><img src="<?=public_path("img/country-modal.png");?>" alt=""></p>
        
         <a href="<?=url_for("home/accept/?legal=ok");?>" type="button" class="btn btn-submit" id="aceptar">Soy mayor de edad</a>
         <a href="http://www.google.com" type="button" class="btn btn-submit" id="aceptar">No soy mayor de edad</a>

      </div>   
        <?php  
                break;
            case "us":
        ?>
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Welcome</h4>
      </div>

      <div class="modal-body">
         <p>
          Welcome to the Cono Sur Blogger Competition 2015!<br />
          You must be of legal age to enter this site.
        </p>

        <h4>Participating Countries</h4>

        <p><img src="<?=public_path("img/country-modal.png");?>" alt=""></p>
        
         <a href="<?=url_for("home/accept/?legal=ok");?>" type="button" class="btn btn-submit" id="aceptar">I am of legal age.</a> 
         <a href="http://www.google.com" type="button" class="btn btn-submit" id="aceptar">I am not of legal age.</a>

      </div>   
        <?php  
                break;
        }   
        ?>
    </div>
  </div>
</div>


<!-- Modal VOTE -->
<div class="modal fade" id="modalVote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">YOU ARE VOTING FOR:</h4> 
        <h4 class="modal-title" id="myModalLabel"><span id="titulo-receta"></span></h4>
      </div>
        
      <div class="modal-body">
          <div id="mensajeVoto" class="hidden">
          </div>
          <div class="voto-step1">
            <!-- Mensaje -->
            <!-- /Mensaje -->
            <input type="hidden" id="url-voto" value="<?=url_for("vote/ajax");?>" />
            <form id="formularioVoto" class="form-horizontal" role="form">
              <div class="form-group">
                <label for="exampleInputEmail1" class="col-sm-2 control-label"><b>Email</b></label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control form-control-especial" id="exampleInputEmail1" placeholder="Enter email">
                    <input type="hidden" name="receta" id="receta_id" value="" />
                  </div>
              </div>  
              <div class="form-group">
                <label for="exampleInputEmail1" class="col-sm-2 control-label"><b>Name</b></label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control form-control-especial" placeholder="Enter your name">
                  </div>
              </div>          
                     <p>	 
                      <div class="g-recaptcha" data-sitekey="6Le4R_cSAAAAAN9b8eQkCxwQbynVCBNWjrIRqCzJ"></div>
                     </p>
              <button type="button" class="btn btn-submit-voto">Submit</button>
            </form>
          </div>
          <div class="voto-step2 text-center hidden">
              <img src="<?=public_path("img/ajax-loader.gif");?>" />
          </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal VOTE SUCCESS -->
<div class="modal fade" id="modalVotoexito" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Congratulations!</h4>
      </div>

      <div class="modal-body">

         <p id="mensajeVotoExito"></p>
         
      </div>
    </div>
  </div>
</div>

<!-- Modal CHEF -->
<div class="modal fade" id="modalChef" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Christopher Carpentier</h4>
      </div>

      <div class="modal-body">      

         <div class="row show-grid">

			<div class="col-md-5">

				<img src="<?=public_path("img/chef.jpg");?>" alt="" width="100%">
							
			</div>

			<div class="col-md-7 text-left">

                            <p><?php echo html_entity_decode($diccionario_chef["chef_descripcion"]["descripcion"]); ?></p>
					  		
			</div>

		</div>
         
      </div>
    </div>
  </div>
</div>
