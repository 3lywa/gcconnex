<div class="panel panel-danger">
<div class="panel-heading">
    <h3><?= t('Remove a column') ?></h3>
</div>

<div class="panel-body">
    <p class="alert alert-danger">
        <?= t('Do you really want to remove this column: "%s"?', $column['title']) ?>
        <?= t('This action will REMOVE ALL TASKS associated to this column!') ?>
    </p>

    <div class="form-actions">
        <?= $this->url->link(t('Yes'), 'column', 'remove', array('project_id' => $project['id'], 'column_id' => $column['id'], 'remove' => 'yes'), true, 'btn btn-red') ?>
        <?= t('or') ?> <?= $this->url->link(t('cancel'), 'column', 'index', array('project_id' => $project['id'])) ?>
    </div>
</div>
</div>