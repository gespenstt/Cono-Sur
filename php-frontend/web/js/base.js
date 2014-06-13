$(document).ready(function(){
        
    var validarError = 0;
    var msgError = "";
    
    //DET LANG
    if(det_lang){
        $('#modalLang').modal(); 
        $('#modalLang').on('hide.bs.modal', function () {
            location.href=$("#defaultLang").val();
        })
    }
})

validarRecipe = function(){
    
    validarError = 0;
    msgError = "";
    
    var nombre_receta = $("#nombre_receta");
    var ingredientes = $("#ingredientes");
    var intrucciones = $("#intrucciones");
    var vino_usado = $("#vino_usado");
    var nombre = $("#nombre");
    var link_blog = $("#link_blog");
    var email = $("#email");
    var acepta_pais = $("#acepta_pais");
    var acepta_tos  = $("#acepta_tos");
    setValidacion(nombre_receta);
    setValidacion(ingredientes);
    setValidacion(intrucciones);
    setValidacion(vino_usado);
    setValidacion(nombre);
    setValidacion(link_blog);
    setValidacion(email,"email");
    setValidacion(acepta_pais,"checkbox");
    setValidacion(acepta_tos,"checkbox");
    if(validarError==0){
        return true;
    }else{
        alert(msgError);
        return false;
    }
    
}

setValidacion = function(elemento,tipo,comparacion){
        //console.log(elemento)
        comparacion = typeof comparacion !== 'undefined' ? comparacion : null;    
        tipo = typeof tipo !== 'undefined' ? tipo : null;
        
        var validacionSwitch = true;
        switch(tipo){
            case "email":
                    if(!validarEmail(elemento.val())){
                       validacionSwitch = false; 
                    }
                break;
            case "comparacion":
                    if(elemento.val() != comparacion.val()){
                       validacionSwitch = false; 
                    }
                break;
            case "checkbox":
                    if(!elemento.is(':checked')){
                       validacionSwitch = false; 
                    }
                break;
            default:
                    validacionSwitch = true;
                break;
        }
        if(elemento.val()=="" || !validacionSwitch){
            validarError++;
            var msgattr = elemento.attr("data-msg");
            msgError = msgError + msgattr + "\n";
            //elemento.parent("div").next("div.validaciones").show();
        }else{
            //elemento.parent("div").next("div.validaciones").hide();
        } 
}

validarEmail = function(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 


ShowImagePreview = function( files )
{
    if( !( window.File && window.FileReader && window.FileList && window.Blob ) )
    {
      //alert('The File APIs are not fully supported in this browser.');
      return false;
    }

    if( typeof FileReader === "undefined" )
    {
        //alert( "Filereader undefined!" );
        return false;
    }

    var file = files[0];

    if( !( /image/i ).test( file.type ) )
    {
        //alert( "File is not an image." );
        return false;
    }

    reader = new FileReader();
    reader.onload = function(event) 
            { var img = new Image; 
              img.onload = UpdatePreviewCanvas; 
              img.src = event.target.result;  }
    reader.readAsDataURL( file );
}

UpdatePreviewCanvas = function()
{
    var img = this;
    var canvas = document.getElementById( 'previewcanvas' );

    if( typeof canvas === "undefined" 
        || typeof canvas.getContext === "undefined" )
        return;

    var context = canvas.getContext( '2d' );

    var world = new Object();
    world.width = canvas.offsetWidth;
    world.height = canvas.offsetHeight;

    canvas.width = world.width;
    canvas.height = world.height;

    if( typeof img === "undefined" )
        return;

    var WidthDif = img.width - world.width;
    var HeightDif = img.height - world.height;

    var Scale = 0.0;
    if( WidthDif > HeightDif )
    {
        Scale = world.width / img.width;
    }
    else
    {
        Scale = world.height / img.height;
    }
    if( Scale > 1 )
        Scale = 1;

    var UseWidth = Math.floor( img.width * Scale );
    var UseHeight = Math.floor( img.height * Scale );

    var x = Math.floor( ( world.width - UseWidth ) / 2 );
    var y = Math.floor( ( world.height - UseHeight ) / 2 );

    context.drawImage( img, x, y, UseWidth, UseHeight );  
}