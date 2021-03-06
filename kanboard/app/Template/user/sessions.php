<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Persistent connections') ?></h3>
</div>
<div class="panel-body">
<?php if (empty($sessions)): ?>
    <p class="alert"><?= t('No session.') ?></p>
<?php else: ?>
    <table class="table table-hover">
    <tr>
        <th class="column-20"><?= t('Creation date') ?></th>
        <th class="column-20"><?= t('Expiration date') ?></th>
        <th class="column-15"><?= t('IP address') ?></th>
        <th><?= t('User agent') ?></th>
        <th class="column-10"><?= t('Action') ?></th>
    </tr>
    <?php foreach ($sessions as $session): ?>
    <tr>
        <td><?= dt('%B %e, %Y at %k:%M %p', $session['date_creation']) ?></td>
        <td><?= dt('%B %e, %Y at %k:%M %p', $session['expiration']) ?></td>
        <td><?= $this->e($session['ip']) ?></td>
        <td><?= $this->e($session['user_agent']) ?></td>
        <td><?= $this->url->link(t('Remove'), 'user', 'removeSession', array('user_id' => $user['id'], 'id' => $session['id']), true) ?></td>
    </tr>
    <?php endforeach ?>
    </table>
<?php endif ?>
</div>
</div>