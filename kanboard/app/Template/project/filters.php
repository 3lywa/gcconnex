   <div class="btn-group">
        <a href="/kanboard/?controller=board&action=show&project_id=<?= $project['id']?>" class="btn btn-info">
            <i class="fa fa-th fa-fw"></i>&nbsp;<?= t('Board') ?>
        </a>
        <a href="/kanboard/?controller=calendar&action=show&project_id=<?= $project['id']?>" class="btn btn-info">
            <i class="fa fa-calendar fa-fw"></i>&nbsp;<?= t('Calendar') ?>
        </a>
        <a href="/kanboard/?controller=listing&action=show&project_id=<?= $project['id']?>" class="btn btn-info">
            <i class="fa fa-list fa-fw"></i>&nbsp;<?= t('List') ?>
        </a>
        <?php if ($this->user->isProjectManagementAllowed($project['id'])): ?>
        <a href="/kanboard/?controller=gantt&action=project&project_id=<?= $project['id']?>" class="btn btn-info">
            <i class="fa fa-sliders fa-fw"></i>&nbsp;<?= t('Gantt') ?>
        </a>
        <?php endif ?>
            <a class="btn btn-info" href="/kanboard/?controller=activity&action=project&project_id=<?=$project['id']?>"><i class="fa fa-dashboard fa-fw"></i>&nbsp;<?= t('Activity') ?></a>
                <?php if ($this->user->isProjectManagementAllowed($project['id'])): ?>
        <a class="btn btn-info" href="/kanboard/?controller=analytic&action=tasks&project_id=<?=$project['id']?>"><i class="fa fa-line-chart fa-fw"></i>&nbsp;<?= t('Analytics') ?></a>
        <a class="btn btn-info" href="/kanboard/?controller=export&action=tasks&project_id=<?=$project['id']?>"><i class="fa fa-download fa-fw"></i>&nbsp;<?= t('Exports') ?></a>
        <a class="btn btn-info" href="/kanboard/project/<?=$project['id']?>"><i class="fa fa-cog fa-fw"></i>&nbsp;<?= t('Settings') ?></a>
<?php endif ?>
    </div>   
    <p></p> 