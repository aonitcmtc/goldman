<?= $this->extend('layouts/content_admin') ?>
<?= $this->section('content') ?>

<style>
    
</style>


<div class="container content-admin">
    <div class="row">
        <div class="col-12 text-center my-5">
            <h2>Member List</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
        
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                <!-- <table border="1" cellpadding="8"> -->
                    <tr>
                        <th>ID</th><th>Name</th><th>Email</th><th>Phone</th>
                    </tr>
                    <?php foreach ($members as $member): ?>
                    <tr>
                        <td><?= esc($member['member_id']) ?></td>
                        <td><?= esc($member['first_name']) ?></td>
                        <td><?= esc($member['email']) ?></td>
                        <td><?= esc($member['phone']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>


        </div>
    </div>
</div>

<?= $this->endSection() ?>