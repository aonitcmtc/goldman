<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= esc($title ?? 'Mountain') ?></title>
    <meta charset="UTF-8">
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/construction.ico">

    <link href="/lib/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="/lib/bootstrap-5.0.2/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <style>
        body {
            background-image: url("./lib_outsite/outsite/construction-workers.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: inherit;
            /* opacity: 0.5; */

        }

        .gm-nav-header {
            display: none !important;
        }

        .gm-content-login {
            background-color: transparent;

            border: 3px solid #fff;
            border-radius: 0.8rem;
            /* box-shadow: 5px 5px #7d7d7d;  */

        }

        .btn-gc-login {
            display: none;
        }
    </style>

    <div class="container gm-main-content">
        <div class="row justify-content-end">
            <div class="col-12 text-center text-light mt-5">
                <h2>Lf Drive</h2>
                <!-- <p>This is Login Auth.</p> -->
            </div>

            <div class="col-12 col-lg-4 gm-content-login text-center py-5 my-5">
                <h2 class="text-light">Login</h2>
                <?php if (session()->getFlashdata('error')): ?>
                    <p style="color:red"><?= session()->getFlashdata('error') ?></p>
                <?php endif; ?>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8 text-start text-light py-3">
                        <form action="/login/auth" method="post">
                            <!-- <label>Username</label><br>
                            <input type="text" name="username" required><br> -->
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            

                            <!-- <label>Password</label><br>
                            <input type="password" name="password" required><br><br> -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <div class="col-12 text-center mt-3">
                                <input type="hidden" class="" id="out_site" name="out_site" value="lfdrive">
                                <button type="submit" class="btn btn-md btn-danger">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

</body>
</html>
