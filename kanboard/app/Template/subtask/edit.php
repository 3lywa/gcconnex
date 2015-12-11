<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Edit a sub-task') ?></h3>
</div>
<div class="panel-body">
<form method="post" action="<?= $this->url->href('subtask', 'update', array('task_id' => $task['id'], 'project_id' => $task['project_id'], 'subtask_id' => $subtask['id'])) ?>" autocomplete="off">

    <?= $this->form->csrf() ?>

    <?= $this->form->hidden('id', $values) ?>
    <?= $this->form->hidden('task_id', $values) ?>

    <?= $this->form->label(t('Title'), 'title') ?><br/>
    <?= $this->form->text('title', $values, $errors, array('required', 'autofocus', 'maxlength="255"')) ?><br/>

    <?= $this->form->label(t('Assignee'), 'user_id') ?><br/>
    <?= $this->form->select('user_id', $users_list, $values, $errors) ?><br/>

    <?= $this->form->label(t('Original estimate'), 'time_estimated') ?><br/>
    <?= $this->form->numeric('time_estimated', $values, $errors) ?> <?= t('hours') ?><br/>

    <?= $this->form->label(t('Time spent'), 'time_spent') ?><br/>
    <?= $this->form->numeric('time_spent', $values, $errors) ?> <?= t('hours') ?><br/>

    <div class="form-actions">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue"/>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'task', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
    </div>
</form>
</div>
</div>