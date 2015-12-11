<?php if (! empty($categories)): ?>
<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Categories') ?></h3>
</div>
<div class="panel-body">
<table class="table table-hover">
    <tr>
        <th><?= t('Category Name') ?></th>
        <th><?= t('Actions') ?></th>
    </tr>
    <?php foreach ($categories as $category_id => $category_name): ?>
    <tr>
        <td><?= $this->e($category_name) ?></td>
        <td>
            <ul>
                <li>
                    <?= $this->url->link(t('Edit'), 'category', 'edit', array('project_id' => $project['id'], 'category_id' => $category_id)) ?>
                </li>
                <li>
                    <?= $this->url->link(t('Remove'), 'category', 'confirm', array('project_id' => $project['id'], 'category_id' => $category_id)) ?>
                </li>
            </ul>
        </td>
    </tr>
    <?php endforeach ?>
</table>
</div>
</div>
<?php endif ?>

<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Add a new category') ?></h3>
</div>
<div class="panel-body">
<form method="post" action="<?= $this->url->href('category', 'save', array('project_id' => $project['id'])) ?>" autocomplete="off">

    <?= $this->form->csrf() ?>
    <?= $this->form->hidden('project_id', $values) ?>

    <?= $this->form->label(t('Category Name'), 'name') ?><br />
    <?= $this->form->text('name', $values, $errors, array('autofocus', 'required', 'maxlength="50"')) ?>

    <div class="form-actions">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue"/>
    </div>
</form>
</div>
</div>