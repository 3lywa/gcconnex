<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Change default swimlane') ?></h3>
</div>
<div class="panel-body">
<form method="post" action="<?= $this->url->href('swimlane', 'change', array('project_id' => $project['id'])) ?>" autocomplete="off">

    <?= $this->form->csrf() ?>
    <?= $this->form->hidden('id', $default_swimlane) ?>

    <?= $this->form->label(t('Rename'), 'default_swimlane') ?><br />
    <?= $this->form->text('default_swimlane', $default_swimlane, array(), array('required', 'maxlength="50"')) ?><br/>

    <?php if (! empty($active_swimlanes) || $default_swimlane['show_default_swimlane'] == 0): ?>
        <?= $this->form->checkbox('show_default_swimlane', t('Show default swimlane'), 1, $default_swimlane['show_default_swimlane'] == 1) ?>
    <?php else: ?>
        <?= $this->form->hidden('show_default_swimlane', $default_swimlane) ?>
    <?php endif ?>

    <div class="form-actions">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue"/>
    </div>
</form>
</div>
</div>

<?php if (! empty($active_swimlanes)): ?>
<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Active swimlanes') ?></h3>
</div>
<div class="panel-body">
<?= $this->render('swimlane/table', array('swimlanes' => $active_swimlanes, 'project' => $project)) ?>
</div>
</div>
<?php endif ?>

<?php if (! empty($inactive_swimlanes)): ?>
<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Inactive swimlanes') ?></h3>
</div>
<div class="panel-body">
<?= $this->render('swimlane/table', array('swimlanes' => $inactive_swimlanes, 'project' => $project, 'hide_position' => true)) ?>
</div>
<?php endif ?>

<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Add a new swimlane') ?></h3>
</div>
<div class="panel-body">
<form method="post" action="<?= $this->url->href('swimlane', 'save', array('project_id' => $project['id'])) ?>" autocomplete="off">

    <?= $this->form->csrf() ?>
    <?= $this->form->hidden('project_id', $values) ?>

    <?= $this->form->label(t('Name'), 'name') ?><br />
    <?= $this->form->text('name', $values, $errors, array('required', 'maxlength="50"')) ?><br />

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
    </div>
</form>
</div>
</div>