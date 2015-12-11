<div class="container-fluid">
			    <?php if (isset($is_private) && $is_private): ?>
		    <div class="alert alert-info">
		        <p><?= t('There is no user management for private projects.') ?></p>
		    </div>
		    <?php endif ?>
	<div class="panel panel-info">
		<div class="panel-heading"><h3>New project</h3></div>
		<div class="panel-body">
		    <form method="post" action="<?= $this->url->href('project', 'save') ?>" autocomplete="off">
		
		        <?= $this->form->csrf() ?>
		        <?= $this->form->hidden('is_private', $values) ?>
		        
			        <label for="form-name">Project Name</label>
			        <?= $this->form->text('name', $values, $errors, array('autofocus', 'required '), 'form-control') ?>
		
		        <div class="form-actions">
		            <button type="submit" value="<?= t('Save') ?>" class="btn btn-primary">Create</button>
		            <?= t('or') ?> <?= $this->url->link(t('cancel'), 'project', 'index') ?>
		        </div>
		    </form>
		</div>
	</div>
</div>