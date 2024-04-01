<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">
    <title>Blogku</title>

    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/boxicons/css/boxicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/summernote/summernote.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
</head>

<body>
    <nav class="navbar py-4 bg-soft-blue">
        <div class="container justify-content-between">
            <a href="." class="logo">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Blogku">
                <span>Blogku</span>
            </a>
            <div class="d-flex gap-4">
                <p><img src="{{asset('assets/images/person-fill.svg')}}" alt="Icon Error">{{ Auth::user()->name }}</p>
                <a href="{{ url('logout') }}" class="link">Keluar</a>
            </div>
        </div>
    </nav>
