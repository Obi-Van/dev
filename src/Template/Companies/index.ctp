<div class="users index large-12 medium-8 columns content">
    <h3><?= __('Companies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quota</th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($companies as $company): ?>
            <tr>
                <td><?= $company->id ?></td>
                <td><?= $company->name ?></td>
                <td><?= $company->quota." TB" ?></td>
            <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $company->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $company->id], ['confirm' => __('Are you sure you want to delete {0}?', $company->name)]) ?>
             </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>