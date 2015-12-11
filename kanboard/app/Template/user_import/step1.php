<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
        <h3><?= t('Import') ?></h3>
        </div>
        <div class="panel-body">
    <form action="<?= $this->url->href('userImport', 'step2') ?>" method="post" enctype="multipart/form-data">
        <?= $this->form->csrf() ?>

        <?= $this->form->label(t('Delimiter'), 'delimiter') ?><br />
        <?= $this->form->select('delimiter', $delimiters, $values) ?><br />

        <?= $this->form->label(t('Enclosure'), 'enclosure') ?><br />
        <?= $this->form->select('enclosure', $enclosures, $values) ?><br />

        <?= $this->form->label(t('CSV File'), 'file') ?>
        <?= $this->form->file('file', $errors) ?>

        <p class="form-help"><?= t('Maximum size: ') ?><?= is_integer($max_size) ? $this->text->bytes($max_size) : $max_size ?></p>

        <div class="form-actions">
            <button type="submit" value="<?= t('Import') ?>" class="btn btn-primary"><?= t('Import') ?></button>
        </div>
    </form>


        </div>
        </div>
        
            <div class="alert">
                <b><?= t('Instructions') ?></b>
        <ul>
            <li><?= t('Your file must use the predefined CSV format') ?></li>
            <li><?= t('Your file must be encoded in UTF-8') ?></li>
            <li><?= t('The first row must be the header') ?></li>
            <li><?= t('Duplicates are not imported') ?></li>
            <li><?= t('Usernames must be lowercase and unique') ?></li>
            <li><?= t('Passwords will be encrypted if present') ?></li>
        </ul>
    </div>
        
    <p><i class="fa fa-download fa-fw"></i><?= $this->url->link(t('Download CSV template'), 'userImport', 'template') ?></p>
</div>