<?= view('layouts/header', ['title' => $title ?? 'Goldcat']) ?>
<?= $this->renderSection('content') ?>
<?= view('layouts/footer') ?>