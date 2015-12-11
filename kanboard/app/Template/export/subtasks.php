<div class="panel panel-info">
<div class="panel-heading">
    <h3>
        <?= t('Subtasks exportation for "%s"', $project['name']) ?>
    </h3>
</div>
<div class="panel-body">
<p class="alert alert-info"><?= t('This report contains all subtasks information for the given date range.') ?></p>

<form method="get" action="?" autocomplete="off">

    <?= $this->form->hidden('controller', $values) ?>
    <?= $this->form->hidden('action', $values) ?>
    <?= $this->form->hidden('project_id', $values) ?>

    <?= $this->form->label(t('Start Date'), 'from') ?>
    <?= $this->form->text('from', $values, $errors, array('required', 'placeholder="'.$this->text->in($date_format, $date_formats).'"'), 'form-date') ?><br/>

    <?= $this->form->label(t('End Date'), 'to') ?>
    <?= $this->form->text('to', $values, $errors, array('required', 'placeholder="'.$this->text->in($date_format, $date_formats).'"'), 'form-date') ?>

    <div class="form-help"><?= t('Others formats accepted: %s and %s', date('Y-m-d'), date('Y_m_d')) ?></div>

    <div class="form-actions">
        <input type="submit" value="<?= t('Execute') ?>" class="btn btn-blue"/>
    </div>
</form>
</div>
</div>