$(function () {
    var map;
});

function initMap() {
    var centreFrance = {lat: 46.498392, lng: 2.610353};
    var response = '{{ response }}';
    map = new google.maps.Map(document.getElementById('map'), {
        center: centreFrance,
        zoom: 5
    });
    var marker = new google.maps.Marker({
        position: response,
        map: map
    });
    map.data.setStyle(function (feature) {
        var magnitude = 2;
        return {
            icon: getCircle(magnitude)
        };
    });

}

function getCircle(magnitude) {
    var circle = {
        path: google.maps.SymbolPath.CIRCLE,
        fillColor: 'red',
        fillOpacity: .2,
        scale: magnitude,
        strokeColor: 'white',
        strokeWeight: .5

    };
    return circle;
}


function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
    };

    request.open('GET', url, true);
    request.send(null);
}

