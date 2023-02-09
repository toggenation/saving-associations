<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Device $device
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Device'), ['action' => 'edit', $device->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Device'), ['action' => 'delete', $device->id], ['confirm' => __('Are you sure you want to delete # {0}?', $device->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Devices'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Device'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="devices view content">
            <h3><?= h($device->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($device->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($device->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Device Status Id') ?></th>
                    <td><?= $this->Number->format($device->device_status_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Modules') ?></h4>
                <?php if (!empty($device->modules)) : ?>
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
                        <?php foreach ($device->modules as $modules) : ?>
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
