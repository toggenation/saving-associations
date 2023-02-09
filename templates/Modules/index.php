<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Module> $modules
 */
?>
<div class="modules index content">
    <?= $this->Html->link(__('New Module'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Modules') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('module_state_id') ?></th>
                    <th><?= $this->Paginator->sort('module_class_id') ?></th>
                    <th><?= $this->Paginator->sort('module_type_id') ?></th>
                    <th><?= $this->Paginator->sort('device_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($modules as $module): ?>
                <tr>
                    <td><?= $this->Number->format($module->id) ?></td>
                    <td><?= h($module->name) ?></td>
                    <td><?= $this->Number->format($module->module_state_id) ?></td>
                    <td><?= $this->Number->format($module->module_class_id) ?></td>
                    <td><?= $this->Number->format($module->module_type_id) ?></td>
                    <td><?= $module->has('device') ? $this->Html->link($module->device->name, ['controller' => 'Devices', 'action' => 'view', $module->device->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $module->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $module->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $module->id], ['confirm' => __('Are you sure you want to delete # {0}?', $module->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
