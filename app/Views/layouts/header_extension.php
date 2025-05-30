<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title ?? 'Goldcat') ?></title>
    <meta charset="UTF-8">
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/boxdrive.ico">

    <link href="/lib/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="/lib/bootstrap-5.0.2/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- font-awesome-4.7.0 -->
     <link rel="stylesheet" href="/lib/font-awesome-4.7.0/css/font-awesome.min.css">
     <!-- <link href="/lib/font-awesome-4.7.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous"> -->

</head>
<body>

<style>
    @font-face {
        font-family: 'Kanit';
        src: url('/font/Kanit-Regular.ttf') format('truetype');
    }

    body{
        background-color: #fdfdfd;

        font-family: "Kanit", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    /* .container { display: flex; height: 100vh; } */
    /* .sidebar { width: 250px; height: 100vh; background: #333; color: white; padding: 20px; }
    .sidebar a { color: white; display: block; margin-bottom: 10px; text-decoration: none; }
    .content { flex-grow: 1; padding: 20px;} */

    .content-tabbar {
        float: left;
        padding: 20px;
        width: 80%;
        min-height: 100vh;
        /* background-color: #f1f1f1; */
        /* min-height: 300px; only for demonstration, should be removed */
    }

    /* Clear floats after the columns */
    .section-gc-main::after {
        content: "";
        display: table;
        clear: both;
    }

    .left-menu {
        float: left;
        width: 20%;
        min-height: 100vh;
        background-color: #afb1a5;
        padding: 20px;
    }

    /* Style the list inside the menu */
    .left-menu ul {
        list-style-type: none;
        padding: 0;
    }

    .gm-main-content {
        min-height: 100vh;
    }

    .shadow-gc-img {
        color: #3d3d3d;
        border-color: #3d3d3d;
        /* box-shadow: 2px 2px #3d3d3d; */
    }

    .d-gc-nav .gm-nav-header {
        background-color: #6c757d !important;
    }

    @media (max-width: 992px) {
  
        .left-menu {
            display: none;
            /* float: left;
            width: 20%;
            min-height: 100vh;
            background-color: #afb1a5;
            padding: 20px; */
        }

        .content-tabbar {
            float: left;
            padding: 20px;
            width: 100%;
            min-height: 100vh;
            /* background-color: #f1f1f1; */
            min-height: 100vh;
        }

        .d-footer {
            display: inline-block;
            width: -webkit-fill-available;
        }

    }


</style>
<header>

<!-- php setup -->
<?php
    // $page = isset($_GET['page']) ? $_GET['page'] : 'news.php';
    $admin_path = $_SERVER['REQUEST_URI'];
?>

    <div class="row d-gc-nav" class="">
        <nav class="navbar gm-nav-header navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand border border-light rounded-circle p-2 shadow-gc-img" href="#">
                    <img src="<?= base_url("lib_outsite/outsite/person.png")?>" height="32px" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/lfdrive/page">Home</a>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li> -->
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Upload
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/lfdrive/upload/uploadimg">Upload Image</a></li>
                        <li><a class="dropdown-item" href="/lfdrive/upload/showimg">Show Image</a></li>
                        <!-- <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                    </ul>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li> -->
                </ul>
                <form class="d-flex">
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-dark mx-2" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button> -->
                    <a href="<?= base_url('lfdrive/login') ?>" type="button" class="btn btn-outline-light mx-2">Logout</a>
                </form>
                <!-- <form class="text-end" action="<?= base_url('lfdrive/login') ?>" method="get">
                    <button type="submit" class="btn btn-outline-danger mx-2">Logout</button>
                </form> -->
                </div>
            </div>
        </nav>
    </div>

</header>
<div class="section-gc-main">
