<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Edit the description') ?></h3>
</div>
<div class="panel-body">
<form method="post" role="form" action="<?= $this->url->href('taskmodification', 'description', array('task_id' => $task['id'], 'project_id' => $task['project_id'], 'ajax' => $ajax)) ?>" autocomplete="off">

    <?= $this->form->csrf() ?>
    <?= $this->form->hidden('id', $values) ?>

    <div class="form-tabs">
        <ul class="form-tabs-nav">
            <li class="form-tab form-tab-selected">
                <i class="fa fa-pencil-square-o fa-fw"></i><a id="markdown-write" href="#"><?= t('Write') ?></a>
            </li>
            <li class="form-tab">
                <a id="markdown-preview" href="#"><i class="fa fa-eye fa-fw"></i><?= t('Preview') ?></a>
            </li>
        </ul>
        <div class="write-area">
            <?= $this->form->textarea('description', $values, $errors, array('autofocus', 'placeholder="'.t('Leave a description').'"'), 'task-show-description-textarea') ?>
        </div>
        <div class="preview-area">
            <div class="markdown"></div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" value="<?= t('Save') ?>" class="btn btn-primary"><?= t('Save') ?></button>
        <?= t('or') ?>
        <?php if ($ajax): ?>
            <?= $this->url->link(t('cancel'), 'board', 'show', array('project_id' => $task['project_id'])) ?>
        <?php else: ?>
            <?= $this->url->link(t('cancel'), 'task', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
        <?php endif ?>
    </div>
</form>
</div>
</div>