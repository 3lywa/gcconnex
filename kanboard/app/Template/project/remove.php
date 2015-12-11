<div class="panel panel-danger">
<div class="panel-heading">
    <h3><?= t('Remove project') ?></h3>
</div>
<div class="panel-body">
    <p class="alert alert-danger">
        <?= t('Do you really want to remove this project: "%s"?', $project['name']) ?>
    </p>

    <div class="form-actions">
        <?= $this->url->link(t('Yes'), 'project', 'remove', array('project_id' => $project['id'], 'remove' => 'yes'), true, 'btn btn-red') ?>
        <?= t('or') ?> <?= $this->url->link(t('cancel'), 'project', 'show', array('project_id' => $project['id'])) ?>
    </div>
</div>
</div>