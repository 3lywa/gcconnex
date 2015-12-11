<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Summary') ?></h3>
</div>
<div class="panel-body">
<ul class="listing">
    <li><?= t('Username:') ?> <strong><?= $this->e($user['username']) ?></strong></li>
    <li><?= t('Name:') ?> <strong><?= $this->e($user['name']) ?: t('None') ?></strong></li>
    <li><?= t('Email:') ?> <strong><?= $this->e($user['email']) ?: t('None') ?></strong></li>
</ul>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Security') ?></h3>
</div>
<div class="panel-body">
<ul class="listing">
    <li><?= t('Group:') ?> <strong><?= $user['is_admin'] ? t('Administrator') : ($user['is_project_admin'] ? t('Project Administrator') : t('Regular user')) ?></strong></li>
    <li><?= t('Account type:') ?> <strong><?= $user['is_ldap_user'] ? t('Remote') : t('Local') ?></strong></li>
    <li><?= $user['twofactor_activated'] == 1 ? t('Two factor authentication enabled') :  t('Two factor authentication disabled') ?></li>
</ul>
</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Preferences') ?></h3>
</div>
<div class="panel-body">
<ul class="listing">
    <li><?= t('Timezone:') ?> <strong><?= $this->text->in($user['timezone'], $timezones) ?></strong></li>
    <li><?= t('Language:') ?> <strong><?= $this->text->in($user['language'], $languages) ?></strong></li>
    <li><?= t('Notifications:') ?> <strong><?= $user['notifications_enabled'] == 1 ? t('Enabled') : t('Disabled') ?></strong></li>
</ul>
</div>
</div>

<?php if (! empty($user['token'])): ?>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3><?= t('Public access') ?></h3>
    </div>
<div class="panel-body">
    <div class="listing">
        <ul class="no-bullet">
            <li><strong><i class="fa fa-rss-square"></i> <?= $this->url->link(t('RSS feed'), 'feed', 'user', array('token' => $user['token']), false, '', '', true) ?></strong></li>
            <li><strong><i class="fa fa-calendar"></i> <?= $this->url->link(t('iCal feed'), 'ical', 'user', array('token' => $user['token']), false, '', '', true) ?></strong></li>
        </ul>
        </div>
    </div>
</div>
<?php endif ?>