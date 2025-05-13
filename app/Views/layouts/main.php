<?= view('layouts/header', ['title' => $title ?? 'Goldman']) ?>
<?= $this->renderSection('content') ?>
<?= view('layouts/footer') ?>