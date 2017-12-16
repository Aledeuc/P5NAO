$(function () {
    var map;
});

function initMap() {
    var centreFrance = {lat: 46.498392, lng: 2.610353};
    map = new google.maps.Map(document.getElementById('map'), {
        center: centreFrance,
        zoom: 5
    });
    var markers =[];
    var locations = [
        {title: 'oiseau1', lat: 46.498392, lng: 2.610353},
        {title: 'oiseau2', lat: 48.8615, lng: 2.34706}
    ];

    var largeInfowindow = new google.maps.InfoWindow({});
    var bounds = new google.maps.LatLngBounds();

    for (var i = 0; i < locations.length; i++) {
        var position = {
            lat: locations[i].lat,
            lng: locations[i].lng
        };
        var title = locations[i].title;
        var marker = new google.maps.Marker({
            map: map,
            position: position,
            title: title,
            animation: google.maps.Animation.DROP,
            id: i
        });
        markers.push(marker);
        bounds.extend(marker.position);
        marker.addListener('click', function(){
            populateInfoWindow(this, largeInfowindow);
        });
    }
    map.fitBounds(bounds);

    function populateInfoWindow(marker, infowindow){
        if(infowindow.marker != marker) {
            infowindow.marker = marker;
            infowindow.setContent('<div>' + marker.title + '</div>');
            infowindow.open(map, marker);
            infowindow.addListener('closeclick', function(){
                infowindow.setMarket(null);
            });
        }
    }
}

