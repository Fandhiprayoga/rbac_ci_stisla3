<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>
<div class="alert alert--success" role="alert">
  <p><strong><?= lang('Auth.checkYourEmail') ?></strong></p>
  <p class="mb-0"><?= lang('Auth.magicLinkDetails', [setting('Auth.magicLinkLifetime') / 60]) ?></p>
</div>

<div class="text-center mt-4">
  <a href="<?= url_to('login') ?>" class="button button--outline button--neutral">← <?= lang('Auth.backToLogin') ?></a>
</div>
<?= $this->endSection() ?>
