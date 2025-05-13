<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title ?? 'Goldcat') ?></title>
    <meta charset="UTF-8">
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/golden.ico">

    <link href="/lib/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="/lib/bootstrap-5.0.2/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fascinate&display=swap" rel="stylesheet"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&display=swap" rel="stylesheet">



</head>
<body>

<style>
    @font-face {
        font-family: 'Fascinate';
        /* src: url('/font/Fascinate-Regular.ttf') format('truetype'); */
        src: url('/font/DynaPuff-Regular.ttf') format('truetype');
    }
    
    body{
        /* background-color: #ababab; */
        background-color: #f1d16b;
        margin-top: 10rem;

        /* font-family: "lib/font/Fascinate-Regular.ttf"; */
        
        /* font-family: "Fascinate";
        src: url("http://localhost:8080/lib/font/fascinate.otf") format("opentype"); */
        /* src: URL('../../public/lib/font/Fascinate-Regular.ttf') format('truetype'); */

        /* font-family: "Fascinate", system-ui;
        font-weight: 400;
        font-style: normal; */

        /* font-family: "Tagesschrift", system-ui;
        font-weight: 400;
        font-style: normal; */

        font-family: "DynaPuff", system-ui;
        font-optical-sizing: auto;
        font-weight: <weight>;
        font-style: normal;
        font-variation-settings:
            "wdth" 100;
    }

    .gm-main-content {
        background-color: #f1d16b;
        min-height: 100vh;
    }

    .goldcat-nav-head {
        position: absolute;
        background-color: #fff;
        
        top: 62px;
        width: 70%;

        border: 3px solid #7d7d7d;
        border-radius: 0.5rem;
        box-shadow: 5px 5px #7d7d7d; /* ล่าง ขวา */
        /* box-shadow: 0 8px #000; */
    }

    .btn-gc-login {
        color: #3d3d3d;
        border-color: #3d3d3d;
        box-shadow: 3px 3px #3d3d3d;
    }

    .shadow-gc-img {
        color: #3d3d3d;
        border-color: #3d3d3d;
        box-shadow: 2px 2px #3d3d3d;
    }

    .gc-font-s18 {
        font-size: 18px;
        font-weight: bold;
    }

    .gc-font-s20 {
        font-size: 20px;
        font-weight: bold;
    }

    .gc-font-s22 {
        font-size: 22px;
        font-weight: bold;
    }

    .gc-font-s24 {
        font-size: 24px;
        font-weight: bold;
    }

    .gc-font-s26 {
        font-size: 26px;
        font-weight: bold;
    }

    .gc-font-s28 {
        font-size: 28px;
        font-weight: bold;
    }

    .gc-font-s30 {
        font-size: 30px;
        font-weight: bold;
    }

    .gc-font-s32 {
        font-size: 32px;
        font-weight: bold;
    }
</style>
<header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="goldcat-nav-head">
                
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <a class="navbar-brand border border-secondary rounded-circle p-2 shadow-gc-img" href="#">
                            <img src="/why.ico" height="32px" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse gc-font-s22" id="navbar-goldcat">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Home</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#">Features</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#">Pricing</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                                </li>
                            </ul>
                        </div>

                        <a href="./login" class="btn btn-sm btn-gc-login">Login</a>
                    </div>
                </nav>

            </div>
        </div>
    </div>
    

</header>
