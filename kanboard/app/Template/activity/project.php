<div class="container-fluid">
	<div class="btn-group">
		<a href="/kanboard/board/<?= $project['id'] ?>" class="btn btn-info">
			<i class="fa fa-th fa-fw"></i>&nbsp;Board
		</a>
		<a href="/kanboard/calendar/<?= $project['id'] ?>" class="btn btn-info">
			<i class="fa fa-calendar fa-fw"></i>&nbsp;Calendar
		</a>
			    <a class="btn btn-info" href="/kanboard/?controller=activity&action=project&project_id=<?=$project['id']?>"><i class="fa fa-dashboard fa-fw"></i>&nbsp;<?= t('Activity') ?></a>
                <?php if ($this->user->isProjectManagementAllowed($project['id'])): ?>
        <a class="btn btn-info" href="/kanboard/?controller=analytic&action=tasks&project_id=<?=$project['id']?>"><i class="fa fa-line-chart fa-fw"></i>&nbsp;<?= t('Analytics') ?></a>
        <a class="btn btn-info" href="/kanboard/?controller=export&action=tasks&project_id=<?=$project['id']?>"><i class="fa fa-download fa-fw"></i>&nbsp;<?= t('Exports') ?></a>
        <a class="btn btn-info" href="/kanboard/project/<?=$project['id']?>"><i class="fa fa-cog fa-fw"></i>&nbsp;<?= t('Settings') ?></a>
                    <?php if ($project['is_public']): ?>
                <a class="btn btn-info"><i class="fa fa-rss-square fa-fw"></i><?= $this->url->link(t('RSS feed'), 'feed', 'project', array('token' => $project['token']), false, '', '', true) ?></a>
                <a class="btn btn-info"><i class="fa fa-calendar fa-fw"></i><?= $this->url->link(t('iCal feed'), 'ical', 'project', array('token' => $project['token'])) ?></a>
            <?php endif ?>
<?php endif ?>
    </div>

    <?= $this->render('event/events', array('events' => $events)) ?>
</div>