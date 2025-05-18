<style>

.list-group-item-secondary.list-group-item-action.active
{
    color: #fff;
    background-color: #828486;
    border-color: #828486;
}

.list-group-child {
    color: #fff;
    background-color: #a1a09d;
    border-color: #a1a09d;
}

.list-group-child.active {
    color: #fff;
    background-color: #9f9699;
    border-color: #9f9699;
}


</style>

<!-- php setup -->
<?php
    // $page = isset($_GET['page']) ? $_GET['page'] : 'news.php';
    $admin_path = $_SERVER['REQUEST_URI'];
?>

<div class="left-menu">
    <h4 class="text-center">Menu</h4>

    <ul class="list-group list-group-flush">
        <a href="/lfdrive/page" class="text-decoration-none">
            <li class="<?= $admin_path == '/lfdrive/page' ? 'active':''?> dropdown list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-secondary">
                home
                <!-- <span class="">
                    <i class="fa <?= $admin_path == '/lfdrive/page' ? 'fa-caret-square-o-down':'fa-caret-square-o-right'?>" aria-hidden="true"></i>
                </span> -->
            </li>
        </a>

        <a href="/lfdrive/upload/uploadimg" class="text-decoration-none">
            <li class="<?= str_contains($admin_path, '/lfdrive/upload') ? 'active':''?> list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-secondary">
                Upload
                <span class="">
                    <i class="fa <?= str_contains($admin_path, '/lfdrive/upload') ? 'fa-caret-square-o-down':'fa-caret-square-o-right'?>" aria-hidden="true"></i>
                </span>
            </li>
        </a>
        <!-- child Members -->
        <ul class="list-group list-group-flush <?= str_contains($admin_path, '/lfdrive/upload') ? '':'d-none'?>">
            <a href="/lfdrive/upload/uploadimg" class="text-decoration-none">
                <li class="<?= $admin_path == '/lfdrive/upload/uploadimg' ? 'active':''?> list-group-item list-group-child">Upload image</li>
            </a>
            <a href="/lfdrive/upload/showimg" class="text-decoration-none">
                <li class="<?= $admin_path == '/lfdrive/upload/showimg' ? 'active':''?> list-group-item list-group-child">Show image</li>
            </a>
        </ul>
        <!-- child Members -->

    </ul>
</div>
