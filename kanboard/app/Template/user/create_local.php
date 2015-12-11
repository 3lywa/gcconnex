<div class="container-fluid">
    <div class="panel panel-info">
    <div class="panel-heading">
    <h3>New user</h3>
    </div>
    <div class="panel-body">
    <form method="post" action="<?= $this->url->href('user', 'save') ?>" autocomplete="off">

        <?= $this->form->csrf() ?>

        <div class="form-column">
            <?= $this->form->label(t('Username'), 'username') ?><br />
            <?= $this->form->text('username', $values, $errors, array('autofocus', 'required', 'maxlength="50"')) ?><br/>

            <?= $this->form->label(t('Name'), 'name') ?><br />
            <?= $this->form->text('name', $values, $errors) ?><br/>

            <?= $this->form->label(t('Email'), 'email') ?><br />
            <?= $this->form->email('email', $values, $errors) ?><br/>

            <?= $this->form->label(t('Password'), 'password') ?><br />
            <?= $this->form->password('password', $values, $errors, array('required')) ?><br/>

            <?= $this->form->label(t('Confirmation'), 'confirmation') ?><br />
            <?= $this->form->password('confirmation', $values, $errors, array('required')) ?><br/>
        </div>

        <div class="form-column">
            <?= $this->form->label(t('Add project member'), 'project_id') ?><br />
            <?= $this->form->select('project_id', $projects, $values, $errors) ?><br/>

            <?= $this->form->label(t('Timezone'), 'timezone') ?><br />
            <?= $this->form->select('timezone', $timezones, $values, $errors) ?><br/>

            <?= $this->form->label(t('Language'), 'language') ?><br />
            <?= $this->form->select('language', $languages, $values, $errors) ?><br/>

            <?= $this->form->checkbox('notifications_enabled', t('Enable email notifications'), 1, isset($values['notifications_enabled']) && $values['notifications_enabled'] == 1 ? true : false) ?><br />
            <?= $this->form->checkbox('is_admin', t('Administrator'), 1, isset($values['is_admin']) && $values['is_admin'] == 1 ? true : false) ?><br />
            <?= $this->form->checkbox('is_project_admin', t('Project Administrator'), 1, isset($values['is_project_admin']) && $values['is_project_admin'] == 1 ? true : false) ?>
        </div>

        <div class="form-actions">
            <button type="submit" value="<?= t('Save') ?>" class="btn btn-primary"><?= t('Save') ?></button>
            <?= t('or') ?>
            <?= $this->url->link(t('cancel'), 'user', 'index') ?>
        </div>
    </form>
    </div>
    </div>
</div>