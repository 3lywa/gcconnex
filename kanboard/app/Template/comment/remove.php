<div class="panel panel-danger">
<div class="panel-heading">
    <h3><?= t('Remove a comment') ?></h3>
</div>

<div class="panel-body">
    <p class="alert alert-danger">
        <?= t('Do you really want to remove this comment?') ?>
    </p>

    <?= $this->render('comment/show', array('comment' => $comment, 'task' => $task, 'preview' => true)) ?>

    <div class="form-actions">
        <?= $this->url->link(t('Yes'), 'comment', 'remove', array('task_id' => $task['id'], 'project_id' => $task['project_id'], 'comment_id' => $comment['id']), true, 'btn btn-red') ?>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'task', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
    </div>
</div>
</div>