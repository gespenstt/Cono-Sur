        <div class="row">
            
            <div class="widget stacked ">

                <div class="widget-header">
                    <i class="icon-list-alt"></i>
                    <h3>Receta - Crop</h3>
                </div>     
                <div class="widget-content">
                    <section>







<form action="<?=url_for('receta/crop'); ?>" method="post" id="formularioCrop" onsubmit="return checkCoords();">
    <input type="hidden" id="x" name="x" value="0" />
    <input type="hidden" id="y" name="y" value="0" />
    <input type="hidden" id="w" name="w" value="460" />
    <input type="hidden" id="h" name="h" value="460" />
    <input type="hidden" id="id" name="id" value="<?=$receta->getRecId();?>" />

    <img src="<?=public_path("uploads/".$receta->getRecImagen());?>" id="iconCropImage" />
                        <div style="padding-top:20px;">
                            <button type="submit" class="btn btn-success" >Recortar</button>
                            <a href="<?=url_for("receta/detalle/?id=".$receta->getRecId());?>" class="btn btn-default" >Cancelar</a>
                        </div>

    </form>

                    </section>

                </div>      
            </div>   
            
        </div>


  <script language="Javascript">
            window.onload = function(){

                    $('#iconCropImage').Jcrop({
                            aspectRatio: 460 / 460,
                            onSelect: updateCoords,
                            allowResize: 1,
                            setSelect: [ 0, 0, 460, 460 ],
                            minSize: [ 460, 460 ]
                            //maxSize: [ <?=$ancho;?>, <?=$alto;?> ]
                    });
            };

            function updateCoords(c)
            {
                    $('#x').val(c.x);
                    $('#y').val(c.y);
                    $('#w').val(c.w);
                    $('#h').val(c.h);
            };

            function checkCoords()
            {
                    if (parseInt($('#w').val())) return true;
                    return false;
            };
    </script>