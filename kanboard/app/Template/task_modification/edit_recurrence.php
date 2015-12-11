<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Edit recurrence') ?></h3>
</div>
<div class="panel-body">
<?php if ($task['recurrence_status'] != \Kanboard\Model\Task::RECURRING_STATUS_NONE): ?>
<div class="listing">
    <?= $this->render('task/recurring_info', array(
        'task' => $task,
        'recurrence_trigger_list' => $recurrence_trigger_list,
        'recurrence_timeframe_list' => $recurrence_timeframe_list,
        'recurrence_basedate_list' => $recurrence_basedate_list,
    )) ?>
</div>
<?php endif ?>

<?php if ($task['recurrence_status'] != \Kanboard\Model\Task::RECURRING_STATUS_PROCESSED): ?>

    <form method="post" action="<?= $this->url->href('taskmodification', 'recurrence', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>" autocomplete="off">

        <?= $this->form->csrf() ?>

        <?= $this->form->hidden('id', $values) ?>
        <?= $this->form->hidden('project_id', $values) ?>

        <?= $this->form->label(t('Generate recurrent task'), 'recurrence_status') ?><br />
        <?= $this->form->select('recurrence_status', $recurrence_status_list, $values, $errors) ?><br />

        <?= $this->form->label(t('Trigger to generate recurrent task'), 'recurrence_trigger') ?><br />
        <?= $this->form->select('recurrence_trigger', $recurrence_trigger_list, $values, $errors) ?><br />

        <?= $this->form->label(t('Factor to calculate new due date'), 'recurrence_factor') ?><br />
        <?= $this->form->number('recurrence_factor', $values, $errors) ?><br />

        <?= $this->form->label(t('Timeframe to calculate new due date'), 'recurrence_timeframe') ?><br />
        <?= $this->form->select('recurrence_timeframe', $recurrence_timeframe_list, $values, $errors) ?><br />

        <?= $this->form->label(t('Base date to calculate new due date'), 'recurrence_basedate') ?><br />
        <?= $this->form->select('recurrence_basedate', $recurrence_basedate_list, $values, $errors) ?>

        <div class="form-actions">
            <button type="submit" value="<?= t('Save') ?>" class="btn btn-primary"><?= t('Save') ?></button>
            <?= t('or') ?>
            <?= $this->url->link(t('cancel'), 'task', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
        </div>
    </form>

<?php endif ?>
</div>
</div>