@extends('master')
@section('main')
    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 100vh;
            width: 100%;
        }
    </style>
    <div id="map"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKvQDLL6cSbDHKaqrRaWQool_z_mIzhms"></script>
    <script>
        // The map
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 10,
            center: {
                lat: 23.8103,
                lng: 90.4125
            },
        });
        let outlet = {!! json_encode($OutletsView->toArray()) !!};
        outlet.forEach(element => {
            // The marker
            const marker = new google.maps.Marker({
                position: {
                    lat: element.latitude,
                    lng: element.longitude
                },
                title: element.name,
                map: map,
            });
        });
    </script>
@endsection
