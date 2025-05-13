<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title ?? 'Goldman') ?></title>
    <meta charset="UTF-8">
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/golden.ico">

    <link href="/lib/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="/lib/bootstrap-5.0.2/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>
<body>

<style>
    body{
        background-color: #ababab;
    }

    .gm-main-content {
        height: 100vh;
    }
</style>
<header>

    <nav class="navbar gm-nav-header navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success mx-2" type="submit">Search</button>
                <a href="<?= base_url('logout') ?>" type="submit" class="btn btn-outline-danger mx-2">Logout</a>
            </form>
            <!-- <form class="text-end" action="<?= base_url('logout') ?>" method="get">
                <button type="submit" class="btn btn-outline-danger mx-2">Logout</button>
            </form> -->
            </div>
        </div>
    </nav>

</header>
