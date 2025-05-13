<?= $this->extend('layouts/content_public') ?>

<?= $this->section('content') ?>

<style>
    .gm-nav-header {
        display: none !important;
    }

    .gm-content-login {
        background-color: #fff;

        border: 3px solid #7d7d7d;
        border-radius: 0.5rem;
        box-shadow: 5px 5px #7d7d7d; 
    }

    .btn-gc-login {
        display: none;
    }
</style>

<div class="container gm-main-content">
    <div class="row justify-content-end">
        <div class="col-12 text-center mt-3">
            <h2>Login Page</h2>
            <p>This is Login Auth.</p>
        </div>

        <div class="col-12 col-lg-4 gm-content-login text-center py-5 my-5">
            <h2>Login</h2>
            <?php if (session()->getFlashdata('error')): ?>
                <p style="color:red"><?= session()->getFlashdata('error') ?></p>
            <?php endif; ?>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 text-start py-3">
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
                            <button type="submit" class="btn btn-md btn-warning">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?= $this->endSection() ?>