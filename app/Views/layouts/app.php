<?= $this->include('layouts/header', ['bodyClass' => $bodyClass ?? '']) ?>

<?= $this->renderSection('content') ?>

<?= $this->include('layouts/footer') ?>
