<li>
    <a class="makeLink" href="/kanboard/?controller=activity&action=project&project_id=<?=$project['id']?>"><i class="fa fa-dashboard fa-fw"></i>&nbsp;<?= t('Activity') ?></a>
</li>
<!--li>
    <a class="makeLink" href="/kanboard/?controller=customfilter&action=index&project_id=<?=$project['id']?>"><i class="fa fa-filter fa-fw"></i>&nbsp;<?= t('Custom filters') ?></a>
</li-->

<?php if ($project['is_public']): ?>
<!--li>
    <i class="fa fa-share-alt fa-fw"></i>&nbsp;<?= $this->url->link(t('Public link'), 'board', 'readonly', array('token' => $project['token']), false, '', '', true) ?>
</li-->
<?php endif ?>

<?= $this->hook->render('template:project:dropdown', array('project' => $project)) ?>

<?php if ($this->user->isProjectManagementAllowed($project['id'])): ?>
    <li>
        <a class="makeLink" href="/kanboard/?controller=analytic&action=tasks&project_id=<?=$project['id']?>"><i class="fa fa-line-chart fa-fw"></i>&nbsp;<?= t('Analytics') ?></a>
    </li>
    <li>
        <a class="makeLink" href="/kanboard/?controller=export&action=tasks&project_id=<?=$project['id']?>"><i class="fa fa-download fa-fw"></i>&nbsp;<?= t('Exports') ?></a>
    </li>
    <li>
        <a class="makeLink" href="/kanboard/project/<?=$project['id']?>"><i class="fa fa-cog fa-fw"></i>&nbsp;<?= t('Settings') ?></a>
    </li>
<?php endif ?>