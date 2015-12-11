<div class="navbar-wrapper">
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			</button>
			<a class="navbar-brand" href="/kanboard/">Lean Machine</a>
      	</div>
      	<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
			      	<li><a href="/gcc/custompage"><i class="fa fa-globe"></i>&nbsp;GCconnex</a></li>
				<?php if ($this->user->isProjectAdmin() || $this->user->isAdmin()): ?>
					<li><?= $this->url->link(t('New project'), 'project', 'create') ?></li>
				<?php endif ?>
                <!--li><?= $this->url->link(t('New private project'), 'project', 'create', array('private' => 1)) ?></li-->		
                <li><a href="/kanboard/projects"><i class="fa fa-folder fa-fw"></i>&nbsp;<?= t('All projects') ?></a></li>		
                <li><a href="/kanboard/search"><i class="fa fa-search fa-fw"></i>&nbsp;<?= t('Search') ?></a></li>
                               
                
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php if ($this->user->hasNotifications()): ?>
					<li>
						<?= $this->url->link('<i class="fa fa-bell web-notification-icon"></i>', 'app', 'notifications', array('user_id' => $this->user->getId()), false, '', t('Unread notifications')) ?>
					</li>
				<?php endif ?>
				
						<?php if ($this->user->isAdmin()): ?>
                	<li><a href="/kanboard/?controller=user&action=index"><i class="fa fa-user fa-fw"></i>&nbsp;<?= t('User management') ?></a></li>
			<!--li><a href="/kanboard/?controller=config&action=index"><i class="fa fa-cog fa-fw"></i>&nbsp;<?= t('Settings') ?></a></li-->
	        <?php endif ?>
				
	            <li>
				    <?= $this->user->getProfileLink() ?>
                </li>
				<li>
                    <?= $this->url->link(t('Logout'), 'auth', 'logout') ?>
				</li>
			</ul>
		</div>
    </div>
</nav>
</div>