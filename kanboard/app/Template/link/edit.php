<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Link modification') ?></h3>
</div>
<div class="panel-body">
<form action="<?= $this->url->href('link', 'update', array('link_id' => $link['id'])) ?>" method="post" autocomplete="off">

    <?= $this->form->csrf() ?>
    <?= $this->form->hidden('id', $values) ?>

    <?= $this->form->label(t('Label'), 'label') ?>
    <?= $this->form->text('label', $values, $errors, array('required')) ?>

    <?= $this->form->label(t('Opposite label'), 'opposite_id') ?>
    <?= $this->form->select('opposite_id', $labels, $values, $errors) ?>

    <div class="form-actions">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue"/>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'link', 'index') ?>
    </div>
</form>
</div>
</div>