<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Edit column "%s"', $column['title']) ?></h3>
</div>
<div class="panel-body">
<form method="post" action="<?= $this->url->href('column', 'update', array('project_id' => $project['id'], 'column_id' => $column['id'])) ?>" autocomplete="off">

    <?= $this->form->csrf() ?>

    <?= $this->form->hidden('id', $values) ?>
    <?= $this->form->hidden('project_id', $values) ?>

    <?= $this->form->label(t('Title'), 'title') ?><br />
    <?= $this->form->text('title', $values, $errors, array('autofocus', 'required', 'maxlength="50"')) ?><br />

    <?= $this->form->label(t('Task limit'), 'task_limit') ?><br />
    <?= $this->form->number('task_limit', $values, $errors) ?><br />

    <?= $this->form->label(t('Description'), 'description') ?>

    <div class="form-tabs">

        <div class="write-area">
          <?= $this->form->textarea('description', $values, $errors) ?>
        </div>
        <div class="preview-area">
            <div class="markdown"></div>
        </div>
        <ul class="form-tabs-nav">
            <li class="form-tab form-tab-selected">
                <i class="fa fa-pencil-square-o fa-fw"></i><a id="markdown-write" href="#"><?= t('Write') ?></a>
            </li>
            <li class="form-tab">
                <a id="markdown-preview" href="#"><i class="fa fa-eye fa-fw"></i><?= t('Preview') ?></a>
            </li>
        </ul>
    </div>

    <div class="form-actions">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue"/>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'column', 'index', array('project_id' => $project['id'])) ?>
    </div>
</form>
</div>
</div>