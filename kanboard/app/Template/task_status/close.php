<div class="panel panel-danger">
<div class="panel-heading">
    <h3><?= t('Close a task') ?></h3>
</div>
<div class="panel-body">
    <p class="alert alert-danger">
        <?= t('Do you really want to close the task "%s" as well as all subtasks?', $task['title']) ?>
    </p>

    <div class="form-actions">
        <?= $this->url->link(t('Yes'), 'taskstatus', 'close', array('task_id' => $task['id'], 'project_id' => $task['project_id'], 'confirmation' => 'yes', 'redirect' => $redirect), true, 'btn btn-red') ?>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'task', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, 'close-popover') ?>
    </div>
</div>
</div>