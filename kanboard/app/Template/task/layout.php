<div class="container-fluid">
    <div class="btn-group">
            <a href="/kanboard/board/<?= $task['project_id'] . ($task['swimlane_id'] != 0 ? '?swimlane-'.$task['swimlane_id'] : '') ?>" class="btn btn-info">
                <i class="fa fa-th fa-fw"></i>&nbsp;Board
            </a>
            <a href="/kanboard/calendar/<?= $task['project_id'] ?>" class="btn btn-info">
                <i class="fa fa-calendar fa-fw"></i>&nbsp;Calendar
            </a>
            <?php if ($this->user->isProjectManagementAllowed($task['project_id'])): ?>
            <a href="/kanboard/project/<?= $task['project_id'] ?>" class="btn btn-info">
                <i class="fa fa-cog fa-fw"></i>&nbsp;<?= t('Project settings') ?>
            </a>
            <?php endif ?>
    </div>
    <section class="sidebar-container" id="task-section">
        <?= $this->render('task/sidebar', array('task' => $task)) ?>
        <div class="sidebar-content">
            <?= $task_content_for_layout ?>
        </div>
    </section>
</div>