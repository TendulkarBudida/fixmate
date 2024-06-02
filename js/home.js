let isNavOpen = false;

function toggleNav() {
    if (isNavOpen) {
        closeNav();
    } else {
        openNav();
    }
}

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    document.querySelector(".sidenav").classList.remove("collapsed");
    isNavOpen = true;
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "60px";
    document.getElementById("main").style.marginLeft = "60px";
    document.body.style.backgroundColor = "white";
    document.querySelector(".sidenav").classList.add("collapsed");
    isNavOpen = false;
}


function loadContent(url) {
    fetch(url)
    .then(response => response.text())
    .then(html => {
        document.getElementById('content').innerHTML = html;
    })
    .catch(error => console.error('Error fetching content:', error));
}

// Location purpose
let map, infoWindow, marker;


        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 6
            });
            infoWindow = new google.maps.InfoWindow;

            // Event listener to place a marker on map click
            map.addListener('click', function(event) {
                placeMarker(event.latLng);
            });
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            const pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            placeMarker(pos);
            map.setCenter(pos);
            map.setZoom(14);
        }

        function placeMarker(location) {
            if (marker) {
                marker.setPosition(location);
            } else {
                marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
            }
            map.panTo(location);
        }

        function showCoordinates() {
            if (marker) {
                const position = marker.getPosition();
                alert(`Latitude: ${position.lat()}, Longitude: ${position.lng()}`);
            } else {
                alert("No location selected.");
            }
        }

        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }