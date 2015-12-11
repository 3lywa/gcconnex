<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Time Tracking') ?></h3>
</div>
<div class="panel-body">
<h3><?= t('Subtask timesheet') ?></h3>
<?php if ($subtask_paginator->isEmpty()): ?>
    <p class="alert"><?= t('There is nothing to show.') ?></p>
<?php else: ?>
    <table class="table table-hover">
        <tr>
            <th class="column-25"><?= $subtask_paginator->order(t('Task'), 'task_title') ?></th>
            <th class="column-25"><?= $subtask_paginator->order(t('Subtask'), 'subtask_title') ?></th>
            <th class="column-20"><?= $subtask_paginator->order(t('Start'), 'start') ?></th>
            <th class="column-20"><?= $subtask_paginator->order(t('End'), 'end') ?></th>
            <th class="column-10"><?= $subtask_paginator->order(t('Time spent'), 'time_spent') ?></th>
        </tr>
        <?php foreach ($subtask_paginator->getCollection() as $record): ?>
        <tr>
            <td><?= $this->url->link($this->e($record['task_title']), 'task', 'show', array('project_id' => $record['project_id'], 'task_id' => $record['task_id'])) ?></td>
            <td><?= $this->url->link($this->e($record['subtask_title']), 'task', 'show', array('project_id' => $record['project_id'], 'task_id' => $record['task_id'])) ?></td>
            <td><?= dt('%B %e, %Y at %k:%M %p', $record['start']) ?></td>
            <td><?= dt('%B %e, %Y at %k:%M %p', $record['end']) ?></td>
            <td><?= n($record['time_spent']).' '.t('hours') ?></td>
        </tr>
        <?php endforeach ?>
    </table>

    <?= $subtask_paginator ?>
<?php endif ?>
</div>
</div>