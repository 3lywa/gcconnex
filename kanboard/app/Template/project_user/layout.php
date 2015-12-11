<div class="container-fluid">
            <?php if ($this->user->isProjectAdmin() || $this->user->isAdmin()): ?>
                    <div class="btn-group">
                <a href="/kanboard/?controller=gantt&action=projects" class="btn btn-info">
                    <i class="fa fa-sliders fa-fw"></i>&nbsp;<?= t('Projects Gantt chart') ?>
                </a>
                </div>
            <?php endif ?>
        
    <section class="sidebar-container">
        <?= $this->render('project_user/sidebar', array('users' => $users, 'filter' => $filter)) ?>
        <div class="sidebar-content">
                    <div class="panel panel-info">
            <div class="panel-heading">
                <h3><?= $this->e($title) ?></h3>
            </div>
            <div class="panel-body">
            <?= $content_for_sublayout ?>
            </div>
            </div>
        </div>
    </section>
</div>