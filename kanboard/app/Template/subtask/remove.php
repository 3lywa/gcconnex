<div class="panel panel-danger">
<div class="panel-heading">
    <h3><?= t('Remove a sub-task') ?></h3>
</div>

<div class="panel-body">
    <p class="alert alert-danger">
        <?= t('Do you really want to remove this sub-task?') ?>
    </p>

    <p><strong><?= $this->e($subtask['title']) ?></strong></p>

    <div class="form-actions">
        <?= $this->url->link(t('Yes'), 'subtask', 'remove', array('task_id' => $task['id'], 'project_id' => $task['project_id'], 'subtask_id' => $subtask['id']), true, 'btn btn-red') ?>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'task', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
    </div>
</div>
</div>