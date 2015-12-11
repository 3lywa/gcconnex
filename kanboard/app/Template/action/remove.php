<div class="panel panel-danger">
<div class="panel-heading">
    <h3><?= t('Remove an automatic action') ?></h3>
</div>

<div class="panel-body">
    <p class="alert alert-danger">
        <?= t('Do you really want to remove this action: "%s"?', $this->text->in($action['event_name'], $available_events).'/'.$this->text->in($action['action_name'], $available_actions)) ?>
    </p>

    <div class="form-actions">
        <?= $this->url->link(t('Yes'), 'action', 'remove', array('project_id' => $project['id'], 'action_id' => $action['id']), true, 'btn btn-red') ?>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'action', 'index', array('project_id' => $project['id'])) ?>
    </div>
</div>
</div>