<div class="panel panel-danger">
<div class="panel-heading">
    <h3><?= t('Clone this project') ?></h3>
</div>
<div class="panel-body">
    <p class="alert alert-danger">
        <?= t('Which parts of the project do you want to duplicate?') ?>
    </p>
    
    <form method="post" action="<?= $this->url->href('project', 'duplicate', array('project_id' => $project['id'], 'duplicate' => 'yes')) ?>" autocomplete="off">

        <?= $this->form->csrf() ?>

        <?= $this->form->checkbox('category', t('Categories'), 1, true) ?><br />
        <?= $this->form->checkbox('action', t('Actions'), 1, true) ?><br />
        <?= $this->form->checkbox('swimlane', t('Swimlanes'), 1, false) ?><br />
        <?= $this->form->checkbox('task', t('Tasks'), 1, false) ?>

        <div class="form-actions">
            <input type="submit" value="<?= t('Duplicate') ?>" class="btn btn-red"/>
            <?= t('or') ?> <?= $this->url->link(t('cancel'), 'project', 'show', array('project_id' => $project['id'])) ?>
        </div>
    </form>
</div>
</div>