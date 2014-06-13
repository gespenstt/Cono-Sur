$(document).ready(function(){
    
    if($("#iconPicture").length>0){
        dibujarIconPicture();
    }
        
    var validarError = 0;
    var msgError = "";
    
    //DET LANG
    if(!det_lang){
        $('#modalLang').modal(); 
        $('#modalLang').on('hide.bs.modal', function () {
            location.href=$("#defaultLang").val();
        })
    }
    
    if(!$("#foto").length > 0){
        $("#canvasImagen").hide();
    }
    
    var options = { 
        beforeSend: function() 
        {

        },
        uploadProgress: function(event, position, total, percentComplete) 
        {

        },
        success: function(response) 
        {
            console.log("SUCCESS");
            console.log(response);

        },
        complete: function(response) 
        {
        //response text from the server.
            console.log("complete");
            console.log(response);
            if(response=="ok"){
                $('#formRecipe')[0].reset();
                $("#modalRecipe").modal(); 
            }
        }
 
    };
    if($("#formRecipe").length > 0){
        console.log("FORM")
        $('#formRecipe').ajaxForm(options);
    }
})

validarRecipe = function(){
    console.log("validarRecipe")
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
    var imagen = $("#validaImagen");
    setValidacion(nombre_receta);
    setValidacion(ingredientes);
    setValidacion(intrucciones);
    setValidacion(vino_usado);
    setValidacion(nombre);
    setValidacion(link_blog);
    setValidacion(email,"email");
    setValidacion(acepta_pais,"checkbox");
    setValidacion(acepta_tos,"checkbox");
    setValidacion(imagen,"otro");
    if(validarError==0){
        console.log("validarRecipe | OK")
        return true;
    }else{
        console.log("validarRecipe | NOK")
        //alert(msgError);
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
            case "otro":
                    if(elemento.attr("data-imagen")!="true"){
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
            //msgError = msgError + msgattr + "\n";
            //elemento.parent("div").next("div.validaciones").show();
            console.log(elemento.parent().find("p"));
            if(tipo=="checkbox"){
                elemento.parent().find("p").html(msgattr);
                elemento.parent().find("p").removeClass("hidden");
            }else{
                elemento.parent().find("p").html(msgattr);
                elemento.parent().find("p").removeClass("hidden");
                elemento.parent("div").parent("div").addClass("has-error");                
            }
        }else{
            if(tipo=="checkbox"){
                elemento.parent().find("p").addClass("hidden");
            }else{
                elemento.parent().find("p").addClass("hidden");
                elemento.parent("div").parent("div").removeClass("has-error");                
            }
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
    console.log(img.width);
    console.log(img.height);
    if(img.width == 400 && img.height == 400){
        $("#validaImagen").attr("data-imagen","true");
    }else{
        $("#validaImagen").attr("data-imagen","false");
        return false;
    }
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

    context.drawImage( img, x, y, 200, 200 );  
}

dibujarIconPicture = function(){
var c=document.getElementById("previewcanvas");
var ctx=c.getContext("2d");
var img=document.getElementById("iconPicture");
ctx.drawImage(img,0,0);    
}