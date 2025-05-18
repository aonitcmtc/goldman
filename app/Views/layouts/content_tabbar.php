<?= view('layouts/header_extension', ['title' => $title ?? 'Drive']) ?>
<?= view('layouts/sidebar_drive') ?>
<?= $this->renderSection('content') ?>
<?= view('layouts/footer_drive') ?>