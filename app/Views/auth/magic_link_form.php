<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>
<?php if (session('error') !== null) : ?>
  <div class="alert alert--danger" role="alert"><?= esc(session('error')) ?></div>
<?php endif ?>

<?php if (session('errors') !== null) : ?>
  <div class="alert alert--danger" role="alert">
    <?php if (is_array(session('errors'))) : ?>
      <?php foreach (session('errors') as $error) : ?>
        <p><?= esc($error) ?></p>
      <?php endforeach ?>
    <?php else : ?>
      <p><?= esc(session('errors')) ?></p>
    <?php endif ?>
  </div>
<?php endif ?>

<?php if (session('message') !== null) : ?>
  <div class="alert alert--success" role="alert"><?= session('message') ?></div>
<?php endif ?>

<p class="text-muted-foreground">Masukkan email Anda untuk menerima link login.</p>

<form method="POST" action="<?= url_to('magic-link') ?>">
  <?= csrf_field() ?>

  <div class="field">
    <label for="email" class="field__label">Email</label>
    <div class="input-group">
      <input id="email" type="email" class="input" name="email" value="<?= old('email', auth()->user()->email ?? null) ?>" tabindex="1" required autofocus>
    </div>
  </div>

  <button type="submit" class="button button--primary w-full mt-2" tabindex="2">
    <?= lang('Auth.send') ?>
  </button>
</form>

<div class="text-center mt-4">
  <a href="<?= url_to('login') ?>" class="text-sm">← <?= lang('Auth.backToLogin') ?></a>
</div>
<?= $this->endSection() ?>
