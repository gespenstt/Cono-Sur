$(document).ready(function(){
        
    var validarError = 0;
    var msgError = "";
    
    if(!det_lang){
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
