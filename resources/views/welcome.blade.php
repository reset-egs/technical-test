<html>

<head>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="card rounded border shadow mx-auto w-50">
            <div class="card-body">
                <h5 class="card-title">Welcome to Our Hotel</h5>
                <p class="card-text">We're excited to have you as our guest. To make a reservation for one of our available rooms, please click the button below.</p>
                <a href="{{ route('rooms.index') }}" class="btn btn-primary">Book a Room</a>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</html>
