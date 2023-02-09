<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Module $module
 * @var \Cake\Collection\CollectionInterface|string[] $devices
 * @var \Cake\Collection\CollectionInterface|string[] $ports
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Modules'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="modules form content">
            <?= $this->Form->create($module) ?>
            <fieldset>
                <legend><?= __('Add Module') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('module_state_id');
                    echo $this->Form->control('module_class_id');
                    echo $this->Form->control('module_type_id');
                    echo $this->Form->control('device_id', ['options' => $devices]);
                    echo $this->Form->control('ports._ids', ['options' => $ports]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
