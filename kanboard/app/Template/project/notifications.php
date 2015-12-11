<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Notifications') ?></h3>
</div>
<div class="panel-body">
<?php if (empty($types)): ?>
    <p class="alert"><?= t('There is no notification method registered.') ?></p>
<?php else: ?>
    <form method="post" action="<?= $this->url->href('project', 'notifications', array('project_id' => $project['id'])) ?>" autocomplete="off">

        <?= $this->form->csrf() ?>

        <h4><?= t('Notification methods:') ?></h4>
        <?= $this->form->checkboxes('notification_types', $types, $notifications) ?>

        <div class="form-actions">
            <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue"/>
            <?= t('or') ?>
            <?= $this->url->link(t('cancel'), 'project', 'show', array('project_id' => $project['id'])) ?>
        </div>
    </form>
<?php endif ?>
</div>
</div>