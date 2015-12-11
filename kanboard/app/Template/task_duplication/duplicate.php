<div class="panel panel-danger">
<div class="panel-heading">
    <h3><?= t('Duplicate a task') ?></h3>
</div>
<div class="panel-body">
    <p class="alert alert-danger">
        <?= t('Do you really want to duplicate this task?') ?>
    </p>

    <div class="form-actions">
        <?= $this->url->link(t('Yes'), 'taskduplication', 'duplicate', array('task_id' => $task['id'], 'project_id' => $task['project_id'], 'confirmation' => 'yes'), true, 'btn btn-red') ?>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'task', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
    </div>
</div>
</div>