  var geocoder;

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
} 

function successFunction(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    codeLatLng(lat, lng)
}

function errorFunction(){
    var lchange = $("#url_lang").val();
    lchange.replace("CHANGE","en");
    location.href=lchange;
}

function initialize() {
    geocoder = new google.maps.Geocoder();
}

function codeLatLng(lat, lng) {

var latlng = new google.maps.LatLng(lat, lng);
geocoder.geocode({'latLng': latlng}, function(results, status) {
  if (status == google.maps.GeocoderStatus.OK) {
    if (results[1]) {
         for (var i=0; i<results[0].address_components.length; i++) {
        for (var b=0;b<results[0].address_components[i].types.length;b++) {
            if (results[0].address_components[i].types[b] == "country") {
                pais = (results[0].address_components[i].short_name);
                var lchange = $("#url_lang").val();
                lchange.replace("CHANGE",pais);
                location.href=lchange;
                break;
            }
        }
    }
        alert(pais);
    } else {
    var lchange = $("#url_lang").val();
    lchange.replace("CHANGE","en");
    location.href=lchange;
    }
  } else {
    var lchange = $("#url_lang").val();
    lchange.replace("CHANGE","en");
    location.href=lchange;
  }
});
}