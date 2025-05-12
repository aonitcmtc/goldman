<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .gm-nav-header {
        display: none !important;
    }
</style>

<div class="container gm-main-content">
    <div class="row">
        <div class="col-12">
            <h2>Hello Home Page</h2>
            <p>This is Home content.</p>
        </div>

        <h2>Login</h2>
        <?php if (session()->getFlashdata('error')): ?>
            <p style="color:red"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        <form action="/login/auth" method="post">
            <label>Username</label><br>
            <input type="text" name="username" required><br>
            <label>Password</label><br>
            <input type="password" name="password" required><br><br>
            <button type="submit" class="btn btn-sm btn-danger">Login</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>