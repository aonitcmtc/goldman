<?= view('layouts/header_public', ['title' => $title ?? 'Goldman']) ?>
<?= $this->renderSection('content') ?>
<?= view('layouts/footer') ?>