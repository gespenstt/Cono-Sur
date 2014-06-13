
<!-- Modal -->
<div class="modal fade" id="modalLang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Welcome to Cono Sur´s Blogger Competition!</h4>
      </div>

      <div class="modal-body">

        <p>Although your country is not participating this year, we invite you to check out the site and stay tuned for heaps of savory recipes to pair with your favorite Cono Sur wines, which we will publish 18 August, 2014.</p> 

        <p><img src="<?=public_path("img/country-modal.png");?>" alt=""></p>
 
        <h4>Cheers!</h4>
          
          <input type="hidden" id="defaultLang" value="<?=url_for("home/lang/?set=en");?>" />

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
          
          <input type="hidden" id="defaultLang" value="<?=url_for("home/lang/?set=en");?>" />

      </div>
    </div>
  </div>
</div>