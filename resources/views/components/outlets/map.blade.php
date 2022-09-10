<style>
    #map,#map1 {
        height: 400px;
        width: 100%;
    }
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKvQDLL6cSbDHKaqrRaWQool_z_mIzhms"></script>

<script>
    $(document).on('click', '.editIcon', function() {
        const map = new google.maps.Map(document.getElementById("map1"), {
        zoom: 10,
        center: {lat,lng},
    });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
            position: {lat,lng},
            map: map,
            draggable: true,
        });
        google.maps.event.addListener(marker,'dragend',function() {
            lat=marker.position.lat().toFixed(6);
            lng=marker.position.lng().toFixed(6);
        });
    });

    $(document).on('click', '#addModal', function(e) {
            const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 10,
            center: {lat,lng},
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
            position: {lat,lng},
            map: map,
            draggable: true,
        });
        google.maps.event.addListener(marker,'dragend',function() {
            lat=marker.position.lat().toFixed(6);
            lng=marker.position.lng().toFixed(6);
        });
    });
    // The map
    
</script>
