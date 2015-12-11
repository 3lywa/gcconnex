<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Last logins') ?></h3>
</div>

<div class="panel-body">
<?php if (empty($last_logins)): ?>
    <p class="alert"><?= t('Never connected.') ?></p>
<?php else: ?>
    <table class="table table-hover">
    <tr>
        <th class="column-20"><?= t('Login date') ?></th>
        <th class="column-15"><?= t('Authentication method') ?></th>
        <th class="column-15"><?= t('IP address') ?></th>
        <th><?= t('User agent') ?></th>
    </tr>
    <?php foreach ($last_logins as $login): ?>
    <tr>
        <td><?= dt('%B %e, %Y at %k:%M %p', $login['date_creation']) ?></td>
        <td><?= $this->e($login['auth_type']) ?></td>
        <td><?= $this->e($login['ip']) ?></td>
        <td><?= $this->e($login['user_agent']) ?></td>
    </tr>
    <?php endforeach ?>
    </table>
<?php endif ?>
</div>
</div>