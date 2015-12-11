<?php if ($task['time_estimated'] > 0 || $task['time_spent'] > 0): ?>
<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Time tracking') ?></h3>
</div>
<div class="panel-body">
<div class="container-fluid">
<ul>
    <li><?= t('Estimate:') ?> <strong><?= $this->e($task['time_estimated']) ?></strong> <?= t('hours') ?></li>
    <li><?= t('Spent:') ?> <strong><?= $this->e($task['time_spent']) ?></strong> <?= t('hours') ?></li>
    <li><?= t('Remaining:') ?> <strong><?= $this->e($task['time_estimated'] - $task['time_spent']) ?></strong> <?= t('hours') ?></li>
</ul>
</div>
</div>
</div>

<?php endif ?>