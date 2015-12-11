<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Add a new link') ?></h3>
</div>
<div class="panel-body">
<form action="<?= $this->url->href('link', 'save') ?>" method="post" autocomplete="off">

    <?= $this->form->csrf() ?>

    <?= $this->form->label(t('Label'), 'label') ?><br />
    <?= $this->form->text('label', $values, $errors, array('required')) ?>

    <?= $this->form->label(t('Opposite label'), 'opposite_label') ?>
    <?= $this->form->text('opposite_label', $values, $errors) ?>

    <div class="form-actions">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue"/>
    </div>
</form>
</div>
</div>