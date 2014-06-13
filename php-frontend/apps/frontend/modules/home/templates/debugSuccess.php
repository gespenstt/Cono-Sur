<div style="padding-top: 70px;">
    Seleccione el idioma: <br><br>
    <a href="<?=url_for("home/debug/?lang=1");?>" class="btn btn-default">Ingles UK</a> 
    <a href="<?=url_for("home/debug/?lang=2");?>" class="btn btn-default">Ingles Irlanda</a> 
    <a href="<?=url_for("home/debug/?lang=3");?>" class="btn btn-default">Sueco</a> 
    <a href="<?=url_for("home/debug/?lang=4");?>" class="btn btn-default">Finlandes</a> 
    <a href="<?=url_for("home/debug/?reset=ok");?>" class="btn btn-warning">RESET</a> 
    <?php if(!empty($msg)): ?>
    <p style="padding-top: 20px;"><b><?=$msg;?></b></p>
    <?php endif; ?>
</div>
