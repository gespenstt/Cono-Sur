
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
 
        <p>Cheers!</p>
          
          <input type="hidden" id="defaultLang" value="<?=url_for("home/lang/?set=en");?>" />

      </div>
    </div>
  </div>
</div>