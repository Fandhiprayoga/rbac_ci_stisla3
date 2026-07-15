<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>
<div class="auth__form">
  <div>
    <h1 class="text-2xl">Magic Link</h1>
    <p class="text-muted-foreground mt-1"><?= lang('Auth.checkYourEmail') ?></p>
  </div>

  <div class="alert alert--success">
    <div class="alert__body">
      <?= lang('Auth.magicLinkDetails', [setting('Auth.magicLinkLifetime') / 60]) ?>
    </div>
  </div>

  <p class="text-center text-sm text-muted-foreground">
    <a href="<?= url_to('login') ?>" class="link">← <?= lang('Auth.backToLogin') ?></a>
  </p>
</div>
<?= $this->endSection() ?>
