<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Password modification') ?></h3>
</div>
<div class="panel-body">
<form method="post" action="<?= $this->url->href('user', 'password', array('user_id' => $user['id'])) ?>" autocomplete="off">

    <?= $this->form->hidden('id', $values) ?>
    <?= $this->form->csrf() ?>

    <div class="alert alert-error">
        <?= $this->form->label(t('Current password for the user "%s"', $this->user->getFullname()), 'current_password') ?>
        <?= $this->form->password('current_password', $values, $errors) ?><br/>
    </div>

    <?= $this->form->label(t('New password for the user "%s"', $this->user->getFullname($user)), 'password') ?>
    <?= $this->form->password('password', $values, $errors) ?><br/>

    <?= $this->form->label(t('Confirmation'), 'confirmation') ?>
    <?= $this->form->password('confirmation', $values, $errors) ?><br/>

    <div class="form-actions">
        <button type="submit" value="<?= t('Save') ?>" class="btn btn-primary"><?= t('Save') ?></button>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'user', 'show', array('user_id' => $user['id'])) ?>
    </div>
</form>
</div>
</div>