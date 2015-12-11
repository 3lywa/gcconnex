<div class="panel panel-danger">
<div class="panel-heading">
    <h3><?= t('Remove user') ?></h3>
</div>
<div class="panel-body">
    <p class="alert alert-danger"><?= t('Do you really want to remove this user: "%s"?', $user['name'] ?: $user['username']) ?></p>

    <div class="form-actions">
        <?= $this->url->link(t('Yes'), 'user', 'remove', array('user_id' => $user['id'], 'confirmation' => 'yes'), true, 'btn btn-red') ?>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'user', 'show', array('user_id' => $user['id'])) ?>
    </div>
</div>
</div>