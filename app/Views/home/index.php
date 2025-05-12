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

        <div>
            <form action="<?= base_url('login') ?>" method="get">
                <button type="submit" class="btn btn-outline-primary mx-2">Login</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>