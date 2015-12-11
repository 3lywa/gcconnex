<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Public access') ?></h3>
</div>
<div class="panel-body">
<?php if ($project['is_public']): ?>

    <div class="listing">
        <ul class="no-bullet">
            <li><strong><i class="fa fa-share-alt"></i> <?= $this->url->link(t('Public link'), 'board', 'readonly', array('token' => $project['token']), false, '', '', true) ?></strong></li>
            <li><strong><i class="fa fa-rss-square"></i> <?= $this->url->link(t('RSS feed'), 'feed', 'project', array('token' => $project['token']), false, '', '', true) ?></strong></li>
            <li><strong><i class="fa fa-calendar"></i> <?= $this->url->link(t('iCal feed'), 'ical', 'project', array('token' => $project['token']), false, '', '', true) ?></strong></li>
        </ul>
    </div>

    <?= $this->url->link(t('Disable public access'), 'project', 'share', array('project_id' => $project['id'], 'switch' => 'disable'), true, 'btn btn-red') ?>

<?php else: ?>
    <?= $this->url->link(t('Enable public access'), 'project', 'share', array('project_id' => $project['id'], 'switch' => 'enable'), true, 'btn btn-blue') ?>
<?php endif ?>
</div>
</div>