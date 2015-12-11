<div class="container-fluid">
        <?php if ($this->user->isAdmin()): ?>
        	<div class="btn-group">
            <a href="/kanboard/?controller=user&action=index" class="btn btn-info"><i class="fa fa-user fa-fw"></i>&nbsp;<?= t('All users') ?></a>
            <a href="/kanboard/?controller=user&action=create" class="btn btn-info"><i class="fa fa-plus fa-fw"></i>&nbsp;New user</a>
            <!--li><i class="fa fa-plus fa-fw"></i><?= $this->url->link(t('New remote user'), 'user', 'create', array('remote' => 1)) ?></li-->
        </div>
        <?php endif ?>

    <section class="sidebar-container" id="user-section">
        <?= $this->render('user/sidebar', array('user' => $user)) ?>
        <div class="sidebar-content">
            <?= $user_content_for_layout ?>
        </div>
    </section>
</div>