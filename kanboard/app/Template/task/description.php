<?php if (! empty($task['description'])): ?>
    <div id="description" class="panel panel-info task-show-section">
        <div class="panel-heading">
            <h3><?= t('Description') ?></h3>
        </div>
        <div class="panel-body">

        <article class="markdown task-show-description">
            <?php if (! isset($is_public)): ?>
                <?= $this->text->markdown(
                    $task['description'],
                    array(
                        'controller' => 'task',
                        'action' => 'show',
                        'params' => array(
                            'project_id' => $task['project_id']
                        )
                    )
                ) ?>
            <?php else: ?>
                <?= $this->text->markdown(
                    $task['description'],
                    array(
                        'controller' => 'task',
                        'action' => 'readonly',
                        'params' => array(
                            'token' => $project['token']
                        )
                    )
                ) ?>
            <?php endif ?>
        </article>
        </div>
    </div>
<?php endif ?>