<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Port> $ports
 */
?>
<div class="ports index content">
    <?= $this->Html->link(__('New Port'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ports') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('physical_port') ?></th>
                    <th><?= $this->Paginator->sort('port_unit_id') ?></th>
                    <th><?= $this->Paginator->sort('port_identity') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ports as $port): ?>
                <tr>
                    <td><?= $this->Number->format($port->id) ?></td>
                    <td><?= h($port->physical_port) ?></td>
                    <td><?= $this->Number->format($port->port_unit_id) ?></td>
                    <td><?= h($port->port_identity) ?></td>
                    <td><?= h($port->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $port->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $port->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $port->id], ['confirm' => __('Are you sure you want to delete # {0}?', $port->id)]) ?>
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
