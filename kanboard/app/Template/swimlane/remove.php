<div class="panel panel-danger">
<div class="panel-heading">
        <h2><?= t('Remove a swimlane') ?></h2>
    </div>

<div class="panel-body">
        <p class="alert alert-danger">
            <?= t('Do you really want to remove this swimlane: "%s"?', $swimlane['name']) ?>
        </p>

        <div class="form-actions">
            <?= $this->url->link(t('Yes'), 'swimlane', 'remove', array('project_id' => $project['id'], 'swimlane_id' => $swimlane['id']), true, 'btn btn-red') ?>
            <?= t('or') ?>
            <?= $this->url->link(t('cancel'), 'swimlane', 'index', array('project_id' => $project['id'])) ?>
        </div>
    </div>
</div>