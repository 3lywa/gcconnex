<div class="panel panel-info">
	<div class="panel-heading"><h3><?= t('Edit project') ?></h3></div>
	<div class="panel-body">
<form method="post" role="form" action="<?= $this->url->href('project', 'update', array('project_id' => $project['id'])) ?>" autocomplete="off">

    <?= $this->form->csrf() ?>
    <?= $this->form->hidden('id', $values) ?>

    <?= $this->form->label(t('Name'), 'name') ?><br />
    <?= $this->form->text('name', $values, $errors, array('required', 'maxlength="50"')) ?><br />

    <?= $this->form->label(t('Identifier'), 'identifier') ?><br />
    <?= $this->form->text('identifier', $values, $errors, array('maxlength="50"')) ?><br />
    <p class="form-help"><?= t('The project identifier is an optional alphanumeric code used to identify your project.') ?></p>

    <?= $this->form->label(t('Start date'), 'start_date') ?><br />
    <?= $this->form->text('start_date', $values, $errors, array('maxlength="10"'), 'form-date') ?><br />

    <?= $this->form->label(t('End date'), 'end_date') ?><br />
    <?= $this->form->text('end_date', $values, $errors, array('maxlength="10"'), 'form-date') ?><br />

    <?php if ($this->user->isAdmin() || $this->user->isProjectAdministrationAllowed($project['id'])): ?>
        <?= $this->form->checkbox('is_private', t('Private project'), 1, $project['is_private'] == 1) ?><br />
    <?php endif ?>

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
    <!--div class="form-help"><?= $this->url->doc(t('Write your text in Markdown'), 'syntax-guide') ?></div-->

    <div class="form-actions">
        <button type="submit" value="<?= t('Save') ?>" class="btn btn-primary">Save</button>
    </div>
</form>
	</div>
</div>