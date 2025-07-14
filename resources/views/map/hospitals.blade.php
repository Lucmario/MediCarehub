@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Hôpitaux à proximité (source Google Maps)</h2>
    <div id="map" style="height: 500px;"></div>
    <p class="mt-2 text-muted">La carte affiche les hôpitaux connus de Google dans la zone de Cotonou. Pour une couverture nationale, il faut adapter le centre et le rayon.</p>
</div>
<script>
function initMap() {
    var center = {lat: 6.3703, lng: 2.3912}; // Cotonou
    var map = new google.maps.Map(document.getElementById('map'), {
        center: center,
        zoom: 12
    });
    var service = new google.maps.places.PlacesService(map);
    service.nearbySearch({
        location: center,
        radius: 20000, // 20 km autour du centre
        type: ['hospital']
    }, function(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
                var place = results[i];
                new google.maps.Marker({
                    map: map,
                    position: place.geometry.location,
                    title: place.name
                });
            }
        }
    });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=VOTRE_API_KEY&libraries=places&callback=initMap" async defer></script>
@endsection 