<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title ?? 'Website') ?></title>
</head>
<body>

<?= $this->include('layouts/navbar') ?>

<?= $this->renderSection('content') ?>

<?= $this->include('layouts/footer') ?>

</body>
</html>