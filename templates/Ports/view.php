<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Port $port
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Port'), ['action' => 'edit', $port->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Port'), ['action' => 'delete', $port->id], ['confirm' => __('Are you sure you want to delete # {0}?', $port->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ports'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Port'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ports view content">
            <h3><?= h($port->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Physical Port') ?></th>
                    <td><?= h($port->physical_port) ?></td>
                </tr>
                <tr>
                    <th><?= __('Port Identity') ?></th>
                    <td><?= h($port->port_identity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($port->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($port->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Port Unit Id') ?></th>
                    <td><?= $this->Number->format($port->port_unit_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Modules') ?></h4>
                <?php if (!empty($port->modules)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Module State Id') ?></th>
                            <th><?= __('Module Class Id') ?></th>
                            <th><?= __('Module Type Id') ?></th>
                            <th><?= __('Device Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($port->modules as $modules) : ?>
                        <tr>
                            <td><?= h($modules->id) ?></td>
                            <td><?= h($modules->name) ?></td>
                            <td><?= h($modules->module_state_id) ?></td>
                            <td><?= h($modules->module_class_id) ?></td>
                            <td><?= h($modules->module_type_id) ?></td>
                            <td><?= h($modules->device_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Modules', 'action' => 'view', $modules->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Modules', 'action' => 'edit', $modules->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Modules', 'action' => 'delete', $modules->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modules->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
