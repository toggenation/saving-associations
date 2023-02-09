<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Module $module
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Module'), ['action' => 'edit', $module->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Module'), ['action' => 'delete', $module->id], ['confirm' => __('Are you sure you want to delete # {0}?', $module->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Modules'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Module'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="modules view content">
            <h3><?= h($module->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($module->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Device') ?></th>
                    <td><?= $module->has('device') ? $this->Html->link($module->device->name, ['controller' => 'Devices', 'action' => 'view', $module->device->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($module->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Module State Id') ?></th>
                    <td><?= $this->Number->format($module->module_state_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Module Class Id') ?></th>
                    <td><?= $this->Number->format($module->module_class_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Module Type Id') ?></th>
                    <td><?= $this->Number->format($module->module_type_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Ports') ?></h4>
                <?php if (!empty($module->ports)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Physical Port') ?></th>
                            <th><?= __('Port Unit Id') ?></th>
                            <th><?= __('Port Identity') ?></th>
                            <th><?= __('Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($module->ports as $ports) : ?>
                        <tr>
                            <td><?= h($ports->id) ?></td>
                            <td><?= h($ports->physical_port) ?></td>
                            <td><?= h($ports->port_unit_id) ?></td>
                            <td><?= h($ports->port_identity) ?></td>
                            <td><?= h($ports->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Ports', 'action' => 'view', $ports->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Ports', 'action' => 'edit', $ports->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ports', 'action' => 'delete', $ports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ports->id)]) ?>
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
