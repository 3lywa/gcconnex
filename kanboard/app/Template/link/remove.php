<div class="panel panel-danger">
<div class="panel-heading">
    <h3><?= t('Remove a link') ?></h3>
</div>

<div class="panel-body">
    <p class="alert alert-danger">
        <?= t('Do you really want to remove this link: "%s"?', $link['label']) ?>
    </p>

    <div class="form-actions">
        <?= $this->url->link(t('Yes'), 'link', 'remove', array('link_id' => $link['id']), true, 'btn btn-red') ?>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'link', 'index') ?>
    </div>
</div>
</div>