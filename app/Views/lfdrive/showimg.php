<?= $this->extend('layouts/content_tabbar') ?>
<?= $this->section('content') ?>

<style>
    
</style>


<div class="container content-tabbar">
    <div class="row">
        <div class="col-12 text-center my-5">
            <h2>Show Image</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-center">
            <p>Path :: <?= $key ?></p>
            <img src="<?= $img_url ?>" alt="">

        </div>
    </div>
</div>

<?= $this->endSection() ?>