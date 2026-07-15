<div class="page__section">
  <h2 class="text-lg font-semibold mb-1">Permission Matrix</h2>
  <p class="text-muted-foreground mb-4">
    Tabel berikut menampilkan permission yang dimiliki setiap role dalam sistem.
  </p>

  <div class="card">
    <div class="card__header">
      <span class="card__title">Matrix Permission per Role</span>
    </div>
    <div class="card__body p-0">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Permission</th>
              <th>Deskripsi</th>
              <?php foreach ($groups as $key => $group): ?>
              <th class="text-center"><?= esc($group['title']) ?></th>
              <?php endforeach; ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($permissions as $permKey => $permDesc): ?>
            <tr>
              <td><code class="text-xs"><?= esc($permKey) ?></code></td>
              <td><?= esc($permDesc) ?></td>
              <?php foreach ($groups as $groupKey => $group): ?>
              <td class="text-center">
                <?php
                  $hasPermission = false;
                  if (isset($matrix[$groupKey])) {
                    foreach ($matrix[$groupKey] as $matrixPerm) {
                      if ($matrixPerm === $permKey) {
                        $hasPermission = true;
                        break;
                      }
                      if (str_contains($matrixPerm, '*')) {
                        $prefix = str_replace('*', '', $matrixPerm);
                        if (str_starts_with($permKey, $prefix)) {
                          $hasPermission = true;
                          break;
                        }
                      }
                    }
                  }
                ?>
                <?php if ($hasPermission): ?>
                  <span class="badge badge--soft badge--success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" aria-hidden="true">
                      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 13l4 4L19 7" />
                    </svg>
                  </span>
                <?php else: ?>
                  <span class="badge badge--soft badge--secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" aria-hidden="true">
                      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M18 6L6 18m12 0L6 6" />
                    </svg>
                  </span>
                <?php endif; ?>
              </td>
              <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
