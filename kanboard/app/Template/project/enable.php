<div class="panel panel-success">
<div class="panel-heading">
    <h3><?= t('Project activation') ?></h3>
</div>
<div class="panel-body">
    <p class="alert alert-success">
        <?= t('Do you really want to enable this project: "%s"?', $project['name']) ?>
    </p>

    <div class="form-actions">
        <?= $this->url->link(t('Yes'), 'project', 'enable', array('project_id' => $project['id'], 'enable' => 'yes'), true, 'btn btn-red') ?>
        <?= t('or') ?> <?= $this->url->link(t('cancel'), 'project', 'show', array('project_id' => $project['id'])) ?>
    </div>
</div>
</div>