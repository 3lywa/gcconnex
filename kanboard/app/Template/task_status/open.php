<div class="panel panel-success">
<div class="panel-heading">
    <h3><?= t('Open a task') ?></h3>
</div>

<div class="panel-body">
    <p class="alert alert-success">
        <?= t('Do you really want to open this task: "%s"?', $task['title']) ?>
    </p>

    <div class="form-actions">
        <?= $this->url->link(t('Yes'), 'taskstatus', 'open', array('task_id' => $task['id'], 'project_id' => $task['project_id'], 'confirmation' => 'yes', 'redirect' => $redirect), true, 'btn btn-red') ?>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'task', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, 'close-popover') ?>
    </div>
</div>
</div>