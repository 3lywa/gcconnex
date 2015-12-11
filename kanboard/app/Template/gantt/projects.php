<div class="container-fluid">
            <?php if ($this->user->isProjectAdmin() || $this->user->isAdmin()): ?>
            <div class="btn-group">
                <a href="/kanboard/?controller=projectuser&action=managers" class="btn btn-info"><i class="fa fa-user fa-fw"></i>&nbsp;<?= t('Users overview') ?></a>
                </div>
            <?php endif ?>

<p></p>

    <section>
        <?php if (empty($projects)): ?>
            <p class="alert"><?= t('No project') ?></p>
        <?php else: ?>
            <div
                id="gantt-chart"
                data-records='<?= json_encode($projects, JSON_HEX_APOS) ?>'
                data-save-url="<?= $this->url->href('gantt', 'saveProjectDate') ?>"
                data-label-managers="<?= t('Project managers') ?>"
                data-label-members="<?= t('Project members') ?>"
                data-label-gantt-link="<?= t('Gantt chart for this project') ?>"
                data-label-board-link="<?= t('Project board') ?>"
                data-label-start-date="<?= t('Start date:') ?>"
                data-label-end-date="<?= t('End date:') ?>"
                data-label-not-defined="<?= t('There is no start date or end date for this project.') ?>"
            ></div>
        <?php endif ?>
    </section>
</div>