
<!-- Modal -->
<div class="modal fade" id="modalLang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Welcome to Cono Sur´s Blogger Competition!</h4>
      </div>

      <div class="modal-body">

        <p>Although your country is not participating this year, we invite you to check out the site and stay tuned for heaps of savory recipes to pair with your favorite Cono Sur wines, which we will publish 18 August, 2014.</p> 

        <h4>Participating Countries</h4>

        <p><img src="<?=public_path("img/country-modal.png");?>" alt=""></p>
 
        <h4>Cheers!</h4>
         <p>
             Confirm you are above legal drinking age to enter the site.<br />
             Product for those of legal drinking age. Enjoy responsibly.
         </p>             
         <a href="<?=url_for("home/lang/?set=en&legal=ok");?>" type="button" class="btn btn-submit" >I agree</a>

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

publish the recipes on this site on 18.08.2014 when the voting begins. If you have any questions, 

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

<!-- Modal -->
<div class="modal fade" id="modalRestriccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
          
      <?php
        switch ($lang){//fi gb se ie
            case "fi":
      ?>
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Tervetuloa</h4>
      </div>

      <div class="modal-body">
         <p>
          Vahvistan, että olen täysi-ikäinen<br />
          Tuote on tarkoitettu täysi-ikäisille. Nauti kohtuudella.
        </p>

         <h4>Osallistuvat maat</h4>

        <p><img src="<?=public_path("img/country-modal.png");?>" alt=""></p>

         <a href="<?=url_for("home/accept/?legal=ok");?>" type="button" class="btn btn-submit" id="aceptar">Olen täysi-ikäinen</a>

      </div>  

        <?php            
                break;
            case "gb":
        ?> 

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Welcome</h4>
      </div>

      <div class="modal-body">
         <p>
          Confirm you are above legal drinking age to enter the site.<br />
          Product for those of legal drinking age. Enjoy responsibly.
        </p>

        <h4>Participating Countries</h4>

        <p><img src="<?=public_path("img/country-modal.png");?>" alt=""></p>

         <a href="<?=url_for("home/accept/?legal=ok");?>" type="button" class="btn btn-submit" id="aceptar">I agree</a>

      </div>   
        <?php            
                break;
            case "se":
        ?> 
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Välkommen</h4>
      </div>

      <div class="modal-body">
         <p>På den här webbplatsen förekommer det information om alkoholhaltiga drycker och du måste ha fyllt 20 år för att besöka den.</p>

        <h4>Deltagande länder</h4>

        <p><img src="<?=public_path("img/country-modal.png");?>" alt=""></p>

         <a href="<?=url_for("home/accept/?legal=ok");?>" type="button" class="btn btn-submit" id="aceptar">jag håller med</a>

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
          Confirm you are above legal drinking age to enter the site.<br />
          Product for those of legal drinking age. Enjoy responsibly.
        </p>

        <h4>Participating Countries</h4>

        <p><img src="<?=public_path("img/country-modal.png");?>" alt=""></p>
        
         <a href="<?=url_for("home/accept/?legal=ok");?>" type="button" class="btn btn-submit" id="aceptar">I agree</a>

      </div>   
        <?php  
                break;
        }   
        ?>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalVote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Vote</h4>
      </div>

      <div class="modal-body">

         <form role="form">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
		 <p>
			<script type="text/javascript"
			 src="http://www.google.com/recaptcha/api/challenge?k=6Le4R_cSAAAAAN9b8eQkCxwQbynVCBNWjrIRqCzJ">
			</script>		 
			 <script type="text/javascript">
			 var RecaptchaOptions = {
				theme : 'clean'
			 };
			 </script>
		 </p>
      </div>
    </div>
  </div>
</div>