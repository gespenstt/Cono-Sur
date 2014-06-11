
<!-- Modal -->
<div class="modal fade" id="modalLang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Select your country</h4>
      </div>
      <div class="modal-body">
          <a href="<?=url_for("home/lang/?set=en_uk");?>">Ingles UK</a><br>
          <a href="<?=url_for("home/lang/?set=en_ie");?>">Ingles Irlanda</a><br>
          <a href="<?=url_for("home/lang/?set=sv_se");?>">Sueco</a><br>
          <a href="<?=url_for("home/lang/?set=sv_fi");?>">Finlandes</a><br>
          <a href="<?=url_for("home/lang/?set=en");?>">Global Ingles</a><br>
          
          <input type="hidden" id="defaultLang" value="<?=url_for("home/lang/?set=en");?>" />
      </div>
    </div>
  </div>
</div>