<!doctype html>
<html lang="en">
<head>
    <title>Home Page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/isWorking.css" />
    <link rel="stylesheet" href="../../css/home.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha384-kO7qWpX9t5LszlFVq4XMYu0sp5ygmHtM5h5DnH7qFaa4I24M4Y5bG5BzjfK6TP6+" crossorigin="anonymous" />
</head>
<style>
    #map {
        height: 500px;
        width: 100%;
    }
</style>
<body>

    <div id="main">
        <span id="menuIcon" style="font-size:30px; cursor:pointer; color:white;" onclick="toggleNav()">&#9776;</span>
        <main id="content">
            <!-- <div class="button-container">
                <button onclick="location.href='assistance.html'">Assistance Request</button>
                <button onclick="location.href='offer_help.html'">Offer Help</button>
            </div> -->
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Click the button to get your current location, or click on the map to set your location:</h3>
                        <button class="btn btn-primary m-2" onclick="getLocation()">Get Current Location</button>
                        <button class="btn btn-secondary m-2" onclick="showCoordinates()">Show Selected Coordinates</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <!-- Include the Google Maps JavaScript API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDT7-fCtFQEWrESemmoUxbastIWYAuy-d8&callback=initMap" async defer></script>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="../../js/home.js"></script>
</body>
</html>