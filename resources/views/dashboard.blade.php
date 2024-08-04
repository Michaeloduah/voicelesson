<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Masculinity Hub - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    {{-- <link href="assets/img/favicon.png" rel="icon"> --}}
    {{-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Admin Dashboard</h1>

        <h3>Add Course</h3>
        <form method="POST" action="{{ route('dashboard.admin.course.store') }}" enctype="multipart/form-data" id="myForm">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Course Name:</label>
                <input type="text" name="name" class="form-control" id="name" value={{ old('name') }}>
            </div>
            @if ($errors->has('name'))
                <span class="error text-danger">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('name') }}</span>
                </span>
            @endif

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" name="description" id="description" rows="3" value={{ old('description') }}></textarea>
            </div>
            @if ($errors->has('description'))
                <span class="error text-danger">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('description') }}</span>
                </span>
            @endif

            <div class="mb-3">
                <label for="audio" class="form-label">Audio File(s):</label>
                <input type="file" name="audio" class="form-control" id="audio" required>
            </div>
            @if ($errors->has('audio'))
                <span class="error text-danger">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('audio') }}</span>
                </span>
            @endif

            <div class="mb-3">
                <label for="content" class="form-label">Content:</label>
                <input type="text" name="content" class="form-control" id="content"
                    value={{ old('content') }}>
            </div>
            @if ($errors->has('content'))
                <span class="error text-danger">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('content') }}</span>
                </span>
            @endif

            <button class="btn btn-sm btn-outline-info mt-3" type="submit">Create Course</button>

        </form>
    </div>
</body>

</html>
