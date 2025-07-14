@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Carte interactive (OpenStreetMap + Leaflet)</h2>
    <div id="map" style="height: 400px;"></div>
</div>
@endsection

@push('scripts')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var map = L.map('map').setView([6.3703, 2.3912], 13); // Coordonnées par défaut (Cotonou)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);
        // Exemple de marqueur
        L.marker([6.3703, 2.3912]).addTo(map)
            .bindPopup('Cotonou, Bénin')
            .openPopup();
    });
</script>
@endpush
