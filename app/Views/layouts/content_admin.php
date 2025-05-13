<?= view('layouts/header_admin', ['title' => $title ?? 'Goldcat']) ?>
<?= view('layouts/sidebar') ?>
<?= $this->renderSection('content') ?>
<?= view('layouts/footer_admin') ?>