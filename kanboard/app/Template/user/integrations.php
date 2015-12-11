<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Integrations') ?></h3>
</div>
<div class="panel-body">
<form method="post" action="<?= $this->url->href('user', 'integrations', array('user_id' => $user['id'])) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>
    <?php $hooks = $this->hook->render('template:user:integrations', array('values' => $values)) ?>
    <?php if (! empty($hooks)): ?>
        <?= $hooks ?>
    <?php else: ?>
        <p class="alert"><?= t('No external integration registered.') ?></p>
    <?php endif ?>
</form>
</div>
</div>