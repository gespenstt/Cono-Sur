$(document).ready(function(){
    if(!det_lang){
        $('#modalLang').modal(); 
        $('#modalLang').on('hide.bs.modal', function () {
            location.href=$("#defaultLang").val();
        })
    }
})