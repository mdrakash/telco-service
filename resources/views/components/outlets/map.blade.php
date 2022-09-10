<style>
    /* Set the size of the div element that contains the map */
    #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
    }
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKvQDLL6cSbDHKaqrRaWQool_z_mIzhms"></script>

<script>
    
    // The map, centered at Uluru
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
        console.log(lat);
        console.log(lng);
    });
</script>
