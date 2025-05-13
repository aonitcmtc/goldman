<?= $this->extend('layouts/content_public') ?>

<?= $this->section('content') ?>

<style>
    .gm-nav-header {
        /* display: none !important; */
    }

    .bg-home-page {
        background-image: url("/image/fullbody-cat.png");
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
        opacity: 0.5;
    }
</style>

<div class="container gm-main-content bg-home-page">
    <div class="row">
        <!-- <div class="col-12">
            <h2>Hello Home Page</h2>
            <p>This is Home content.</p>
        </div>

        <div>
            <form action="<?= base_url('login') ?>" method="get">
                <button type="submit" class="btn btn-outline-primary mx-2">Login</button>
            </form>
        </div> -->
    </div>
</div>

<?= $this->endSection() ?>