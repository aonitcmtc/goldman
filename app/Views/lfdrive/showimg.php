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
            <div class="my-3">
                <select class="form-select" aria-label="alabum name">
                    <?php if (count($group_name) > 0) : ?>
                        <?php foreach($group_name as $key => $value) : ?>
                            <option value="<?= $value['alabum'] ?>"><?= $value['alabum'] ?> (<?= $value['total'] ?>)</option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <?php if (count($arr_img) > 0) : ?>
            <p>ทั้งหมด <?= count($arr_img) ?> <span>Share</span></p>
            <?php foreach($arr_img as $key => $value) : ?>
                <div class="col-12 col-lg-3">
                    <div class="card mt-3" style="width: 100%;">
                        <img src="<?= $value['img_url'] ?>" class="card-img-top" alt="<?= $value['path_img'] ?>">
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    
    

    <!-- <div class="row">
        <div class="col-12 text-center">
            <p>Path :: <?#= $path_img ?></p>
            <img src="<?#= $img_url ?>" alt="">

        </div>
    </div> -->
</div>

<?= $this->endSection() ?>