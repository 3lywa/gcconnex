<div class="panel panel-info">
<div class="panel-heading">
    <h3><?= t('User repartition') ?></h3>
</div>
<div class="panel-body">
<?php if (empty($metrics)): ?>
    <p class="alert"><?= t('Not enough data to show the graph.') ?></p>
<?php else: ?>
    <section id="analytic-user-repartition">

    <div id="chart" data-metrics='<?= json_encode($metrics, JSON_HEX_APOS) ?>'></div>

    <table class="table table-hover">
        <tr>
            <th><?= t('User') ?></th>
            <th><?= t('Number of tasks') ?></th>
            <th><?= t('Percentage') ?></th>
        </tr>
        <?php foreach ($metrics as $metric): ?>
        <tr>
            <td>
                <?= $this->e($metric['user']) ?>
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