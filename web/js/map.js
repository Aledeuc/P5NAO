$(function () {
    var map;
});
    function initMap() {
        var centreFrance = {lat: 46.498392, lng: 2.610353};
        var map = new google.maps.Map(document.getElementById('map'), {
            center: centreFrance,
            zoom: 5,
        });

        var markers = [];
        var element = document.getElementById('data');
        var data = [element.getAttribute('data-map')];
        var locations = [
            {title: 'oiseau1', lat: 46.498392, lng: 2.610353, population: 4000},
            {title: 'oiseau2', lat: 48.8615, lng: 2.34706, population: 16000}
        ];
        var largeInfowindow = new google.maps.InfoWindow({});
        var bounds = new google.maps.LatLngBounds();


        for (var location in locations){
            console.log(locations);
            var position = {
                lat: locations[location].lat,
                lng: locations[location].lng
            };
            var title = location.title;
            var marker = new google.maps.Circle({
                strokeColor: '#4d5666',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#4d5666',
                fillOpacity: 0.35,
                map: map,
                center: locations[location].center,
                radius: Math.sqrt(locations[location].population) * 100,

                position: position,
                title: title,
            });
            markers.push(marker);
            bounds.extend(marker.position);
            marker.addListener('click', function () {
                populateInfoWindow(this, largeInfowindow);
            });
        }
        map.fitBounds(bounds);

        function populateInfoWindow(marker, infowindow) {
            if (infowindow.marker != marker) {
                infowindow.marker = marker;
                infowindow.setContent('<div>' + marker.title + '</div>');
                infowindow.open(map, marker);
                infowindow.addListener('closeclick', function () {
                    infowindow.setMarket(null);
                });
            }
        }
    }