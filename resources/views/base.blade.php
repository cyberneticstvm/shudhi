<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Liexa">
    <meta name="google-site-verification" content="l3z82WCHOAkOa5q90D5rF_pGP1I9Oae5zs5vn6-p5AA" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('/assets/img/brand.png') }}">
    <title>SHUDHI WMS</title>
    <link rel="canonical" href="https://app.shudhiwms.org" />
    <link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/icons/icofont.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/bootstrap-icons_1.8.1/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/slick/slick.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/slick/slick-theme.min.css') }}" />
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/sidebar/demo.css') }}" rel="stylesheet">
</head>

<body class="mb-5 pb-5">
    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader end-->
    <nav id="main-nav">
        <ul class="second-nav">
            <li>
                <a href="#" class="bg-success sidebar-user d-flex align-items-center py-4 px-3 border-0 mb-0">
                    <img src="{{ asset('/assets/img/avatar.png') }}" class="img-fluid rounded-pill me-3">
                    <div class="text-white">
                        <h6 class="mb-0">Hi {{ (Auth::user()) ? Auth::user()->name : 'Guest' }},</h6>
                        <small>{{ (Auth::user()) ? Auth::user()->mobile : 'xxxxxxxxxx' }}</small><br>
                        <span class="f-10 text-white-50">{{ (Auth::user()) ? Auth::user()->user_type : '' }}</span>
                    </div>
                </a>
            </li>
            @if(Auth::user())
            <li>
                <a href="{{ route('user.feedback') }}"><i class="bi bi-file me-2"></i> Feedback / Complaints</a>
            </li>
            <li>
                <a href="{{ route('logout') }}"><i class="bi bi-power me-2"></i> Logout</a>
            </li>
            @endif
        </ul>
    </nav>
    @yield('content')

    <script src="{{ asset('/assets/vendor/jquery/jquery.min.js') }}" type="2b1840b241899e59fb500706-text/javascript"></script>
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" type="2b1840b241899e59fb500706-text/javascript"></script>
    <script type="2b1840b241899e59fb500706-text/javascript" src="{{ asset('/assets/vendor/slick/slick.min.js') }}"></script>
    <script type="2b1840b241899e59fb500706-text/javascript" src="{{ asset('/assets/vendor/sidebar/hc-offcanvas-nav.js') }}"></script>
    <script src="{{ asset('/assets/js/custom.js') }}" type="2b1840b241899e59fb500706-text/javascript"></script>
    <script src="{{ asset('/assets/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}" data-cf-settings="2b1840b241899e59fb500706-|49" defer=""></script>
    <script defer src="{{ asset('/assets/js/beacon.min.js') }}" data-cf-beacon='{"rayId":"78a8f0ac1822c328","version":"2022.11.3","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}'></script>

    <script src="https://maps.googleapis.com/maps/api/js?key={{config('app.google_api_key')}}&libraries=places">
    </script>
    <script type="2b1840b241899e59fb500706-text/javascript" src="{{ asset('/assets/js/script.js') }}"></script>
    <script>
        var options = {
            componentRestrictions: {
                country: "in"
            }
        };
        //window.addEventListener('load', initialize);

        function initialize() {
            var input = document.getElementById('address');
            var autocomplete = new google.maps.places.Autocomplete(input, options);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                $('#latitude').val(place.geometry['location'].lat());
                $('#longitude').val(place.geometry['location'].lng());
            });
        }
    </script>
    <script>
        //pickmylocation();

        function pickmylocation() {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    var addr = getUserAddressBy(position.coords.latitude, position.coords.longitude);
                },
                function errorCallback(error) {
                    console.log(error)
                }
            );
        }

        function getUserAddressBy(lat, long) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var address = JSON.parse(this.responseText)
                    var addr = address.results[0].formatted_address;
                    document.getElementById('address').value = addr;
                    $('#latitude').val(lat);
                    $('#longitude').val(long);
                }
            };
            xhttp.open("GET", "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + long + "&key={{config('app.google_api_key')}}", true);
            xhttp.send();
        }
    </script>
    @include("message")
</body>

</html>