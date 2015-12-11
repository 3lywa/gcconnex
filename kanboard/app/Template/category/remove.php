<div class="panel panel-danger">
<div class="panel-heading">
        <h3><?= t('Remove a category') ?></h3>
    </div>

<div class="panel-body">
        <p class="alert alert-danger">
            <?= t('Do you really want to remove this category: "%s"?', $category['name']) ?>
        </p>

        <div class="form-actions">
            <?= $this->url->link(t('Yes'), 'category', 'remove', array('project_id' => $project['id'], 'category_id' => $category['id']), true, 'btn btn-red') ?>
            <?= t('or') ?>
            <?= $this->url->link(t('cancel'), 'category', 'index', array('project_id' => $project['id'])) ?>
        </div>
    </div>
</div>