<?= view('layouts/header_public', ['title' => $title ?? 'Goldcat']) ?>
<?= $this->renderSection('content') ?>
<?= view('layouts/footer') ?>