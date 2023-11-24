// document.addEventListener('DOMContentLoaded', function () {
//     init();
//     initMap();
// });
//
//
// function init(){
//     let action = 'get_map_point';
//     $.ajax({
//     type: 'POST',
//     url: 'wp-admin/admin-ajax.php?action=',
//     data: {
//         action: action,
//     },
//     beforeSend: function () {
//         console.log('process..')
//     },
//     success: function (response) {
//
//     },
//     error: function () {
//
//     },
//     complete: function () {
//         console.log('Done');
//     }
// });
// }

function initMap() {
    let mapContainer = document.getElementById("map");
    let block  = document.querySelector('.marker').getAttribute('data-attr');
    let mapA = new google.maps.Map(mapContainer, {
        zoom: 11,
        center: { lat: 53.349805, lng: -6.26031 } // Початкові координати для Дубліна
    });


    let pointsElement = document.querySelector('.points');
    let decodedData = pointsElement.getAttribute('data-attr');
    var locations = JSON.parse(decodedData);




    locations.forEach(function(locations) {
        new google.maps.Marker({
            position: locations.position,
            map: mapA,
            title: locations.name,
                icon: {
                    url: block,
                    scaledSize: new google.maps.Size(30, 45)
                }
        });
    });
}