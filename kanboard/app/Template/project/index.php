<div class="container-fluid">
	    <?php if ($this->user->isProjectAdmin() || $this->user->isAdmin()): ?>
	    	<div class="btn-group">
	        <a href="/kanboard/?controller=projectuser&action=managers" class="btn btn-info"><i class="fa fa-user fa-fw"></i>&nbsp;Users overview</a>
	        <a href="/kanboard/?controller=gantt&action=projects" class="btn btn-info"><i class="fa fa-sliders fa-fw"></i>&nbsp;Projects Gantt chart</a>
	        	</div>
	        	    <p></p>
	    <?php endif ?>

    <?php if ($paginator->isEmpty()): ?>
        <p class="alert"><?= t('No project') ?></p>
    <?php else: ?>
        
    <div class="panel panel-info">
    	<div class="panel-heading"><h3>Projects</h3></div>
    	    	<div class="panel-body">
    	    	
    	    	       <table class="table table-hover">
            <tr>
                <th class="column-3"><?= $paginator->order(t('Id'), 'id') ?></th>
                <th class="column-5"><?= $paginator->order(t('Status'), 'is_active') ?></th>
                <th class="column-15"><?= $paginator->order(t('Project'), 'name') ?></th>
                <th class="column-8"><?= $paginator->order(t('Start date'), 'start_date') ?></th>
                <th class="column-8"><?= $paginator->order(t('End date'), 'end_date') ?></th>
                <?php if ($this->user->isAdmin() || $this->user->isProjectAdmin()): ?>
                    <th class="column-12"><?= t('Managers') ?></th>
                    <th class="column-12"><?= t('Members') ?></th>
                <?php endif ?>
                <th><?= t('Columns') ?></th>
            </tr>
            <?php foreach ($paginator->getCollection() as $project): ?>
            <tr>
                <td>
                    <?= $this->url->link('#'.$project['id'], 'board', 'show', array('project_id' => $project['id']), false, 'dashboard-table-link') ?>
                </td>
                <td>
                    <?php if ($project['is_active']): ?>
                        <?= t('Active') ?>
                    <?php else: ?>
                        <?= t('Inactive') ?>
                    <?php endif ?>
                </td>
                <td>
                    <?= $this->url->link('<i class="fa fa-th"></i>', 'board', 'show', array('project_id' => $project['id']), false, 'dashboard-table-link', t('Board')) ?>
                    <?= $this->url->link('<i class="fa fa-sliders fa-fw"></i>', 'gantt', 'project', array('project_id' => $project['id']), false, 'dashboard-table-link', t('Gantt chart')) ?>

                    <?php if ($project['is_public']): ?>
                        <i class="fa fa-share-alt fa-fw" title="<?= t('Shared project') ?>"></i>
                    <?php endif ?>
                    <?php if ($project['is_private']): ?>
                        <i class="fa fa-lock fa-fw" title="<?= t('Private project') ?>"></i>
                    <?php endif ?>

                    <?= $this->url->link($this->e($project['name']), 'project', 'show', array('project_id' => $project['id'])) ?>
                </td>
                <td>
                    <?= $project['start_date'] ?>
                </td>
                <td>
                    <?= $project['end_date'] ?>
                </td>
                <?php if ($this->user->isAdmin() || $this->user->isProjectAdmin()): ?>
                <td>
                    <ul class="no-bullet">
                    <?php foreach ($project['managers'] as $user_id => $user_name): ?>
                        <li><?= $this->url->link($this->e($user_name), 'projectuser', 'opens', array('user_id' => $user_id)) ?></li>
                    <?php endforeach ?>
                    </ul>
                </td>
                <td>
                    <?php if ($project['is_everybody_allowed'] == 1): ?>
                        <?= t('Everybody') ?>
                    <?php else: ?>
                        <ul class="no-bullet">
                        <?php foreach ($project['members'] as $user_id => $user_name): ?>
                            <li><?= $this->url->link($this->e($user_name), 'projectuser', 'opens', array('user_id' => $user_id)) ?></li>
                        <?php endforeach ?>
                        </ul>
                    <?php endif ?>
                </td>
                <?php endif ?>
                <td class="dashboard-project-stats">
                    <?php foreach ($project['columns'] as $column): ?>
                        <strong title="<?= t('Task count') ?>"><?= $column['nb_tasks'] ?></strong>
                        <span><?= $this->e($column['title']) ?></span>
                    <?php endforeach ?>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    	    	
    	    	</div>
    </div>
    
 

        <?= $paginator ?>
    <?php endif ?>
</div>