<div style="padding-top: 70px;">
    Seleccione el idioma: <br><br>
    <a href="<?=url_for("home/debug/?lang=2");?>" class="btn btn-default">Ingles Irlanda</a> 
    <a href="<?=url_for("home/debug/?lang=3");?>" class="btn btn-default">Sueco</a> 
    <a href="<?=url_for("home/debug/?lang=9");?>" class="btn btn-default">Canada</a> 
    <a href="<?=url_for("home/debug/?lang=6");?>" class="btn btn-default">Japon</a> 
    <a href="<?=url_for("home/debug/?lang=7");?>" class="btn btn-default">Chile</a> 
    <a href="<?=url_for("home/debug/?lang=8");?>" class="btn btn-default">USA</a> 
    <a href="<?=url_for("home/debug/?reset=ok");?>" class="btn btn-warning">RESET</a>
    <a href="<?=url_for("home/debug/?resetlegal=ok");?>" class="btn btn-warning">RESET Legal</a> 
    <?php if(!empty($msg)): ?>
    <p style="padding-top: 20px;"><b><?=$msg;?></b></p>
    <?php endif; ?>
</div>
