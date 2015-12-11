<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('Task distribution') ?></h3>
</div>
<div class="panel-body">
<?php if (empty($metrics)): ?>
    <p class="alert"><?= t('Not enough data to show the graph.') ?></p>
<?php else: ?>
    <section id="analytic-task-repartition">

    <div id="chart" data-metrics='<?= json_encode($metrics, JSON_HEX_APOS) ?>'></div>

    <table class="table table-hover">
        <tr>
            <th><?= t('Column') ?></th>
            <th><?= t('Number of tasks') ?></th>
            <th><?= t('Percentage') ?></th>
        </tr>
        <?php foreach ($metrics as $metric): ?>
        <tr>
            <td>
                <?= $this->e($metric['column_title']) ?>
            </td>
            <td>
                <?= $metric['nb_tasks'] ?>
            </td>
            <td>
                <?= n($metric['percentage']) ?>%
            </td>
        </tr>
        <?php endforeach ?>
    </table>

    </section>
<?php endif ?>
</div>
</div>