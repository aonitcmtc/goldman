<style>

.list-group-item-warning.list-group-item-action
{
    /* color: #fff;
    background-color:#dc3545;
    border-color:#dc3545; */

    /* background-image: url("./lib_outsite/outsite/mountain.jpg"); */
}


.list-group-item-warning.list-group-item-action.active
{
    color: #fff;
    background-color:#e7bb36;
    border-color: #c1a141;
}

.list-group-child {
    color: #fff;
    background-color:#ddbf66;
    border-color: #c1a141;
}

.list-group-child.active {
    color: #fff;
    background-color:#c2a44b;
    border-color: #c1a141;
}


</style>




<!-- php setup -->
<?php
    // $page = isset($_GET['page']) ? $_GET['page'] : 'news.php';

    $admin_path = $_SERVER['REQUEST_URI'];
    $child_path = $_SERVER['REQUEST_URI'];

    // print_r(str_contains($admin_path, '/adminmember')); die();

    // print_r($routes); die();

    // echo "<button class='btn btn-sm btn-danger'>btn</button>";

?>

<div class="left-menu">
    <h4 class="text-center">Menu</h4>


    <!-- <a href="<?= base_url('dashboard') ?>">Dashboard</a>
    <a href="<?= base_url('profile') ?>">Profile</a>
    <a href="<?= base_url('settings') ?>">Settings</a>
    <a href="<?= base_url('logout') ?>">Logout</a> -->

    <ul class="list-group list-group-flush">
        <a href="/adminpage" class="text-decoration-none">
            <li class="<?= $admin_path == '/adminpage' ? 'active':''?> dropdown list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-warning">
                home
                <!-- <span class="">
                    <i class="fa <?= $admin_path == '/adminpage' ? 'fa-caret-square-o-down':'fa-caret-square-o-right'?>" aria-hidden="true"></i>
                </span> -->
            </li>
        </a>

        <a href="/adminmember" class="text-decoration-none">
            <li class="<?= str_contains($admin_path, '/adminmember') ? 'active':''?> list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-warning">
                Members
                <span class="">
                    <i class="fa <?= str_contains($admin_path, '/adminmember') ? 'fa-caret-square-o-down':'fa-caret-square-o-right'?>" aria-hidden="true"></i>
                </span>
            </li>
        </a>
        <!-- child Members -->
        <ul class="list-group list-group-flush <?= str_contains($admin_path, '/adminmember') ? '':'d-none'?>">
            <a href="/adminmember" class="text-decoration-none">
                <li class="<?= $admin_path == '/adminmember' ? 'active':''?> list-group-item list-group-child">Member List</li>
            </a>
            <a href="/adminmember/manage" class="text-decoration-none">
                <li class="<?= $admin_path == '/adminmember/manage' ? 'active':''?> list-group-item list-group-child">Manage Member</li>
            </a>
            <!-- <a href="javascript:void(0)" class="text-decoration-none">
                <li class="list-group-item list-group-child">A third item</li>
            </a>
            <a href="javascript:void(0)" class="text-decoration-none">
                <li class="list-group-item list-group-child">A fourth item</li>
            </a>
            <a href="javascript:void(0)" class="text-decoration-none">
                <li class="list-group-item list-group-child">And a fifth one</li>
            </a> -->
        </ul>
        <!-- child Members -->

        <!-- <a href="javascript:void(0)" class="text-decoration-none">
            <li class="<?= $admin_path == '/xxxx1' ? 'active':''?> list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-warning">
                xxxx2
                <span class="">
                    <i class="fa <?= $admin_path == '/adminpage' ? 'fa-caret-square-o-down':'fa-caret-square-o-right'?>" aria-hidden="true"></i>
                </span>
            </li>
        </a>

        <a href="javascript:void(0)" class="text-decoration-none">
            <li class="<?= $admin_path == '/xxxx2' ? 'active':''?> list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-warning">
                xxxx3
                <span class="">
                    <i class="fa <?= $admin_path == '/adminpage' ? 'fa-caret-square-o-down':'fa-caret-square-o-right'?>" aria-hidden="true"></i>
                </span>
            </li>
        </a>
        
        <a href="javascript:void(0)" class="text-decoration-none">
            <li class="<?= $admin_path == '/xxxx3' ? 'active':''?> list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-warning">
                xxxx4
                <span class="">
                    <i class="fa <?= $admin_path == '/adminpage' ? 'fa-caret-square-o-down':'fa-caret-square-o-right'?>" aria-hidden="true"></i>
                </span>
            </li>
        </a>
        
        <a href="javascript:void(0)" class="text-decoration-none">
            <li class="<?= $admin_path == '/xxxx4' ? 'active':''?> list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-warning">
                xxxx5
                <span class="">
                    <i class="fa <?= $admin_path == '/adminpage' ? 'fa-caret-square-o-down':'fa-caret-square-o-right'?>" aria-hidden="true"></i>
                </span>
            </li>
        </a> -->
    </ul>
</div>
