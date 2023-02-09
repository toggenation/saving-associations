<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Port $port
 * @var \Cake\Collection\CollectionInterface|string[] $modules
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Ports'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ports form content">
            <?= $this->Form->create($port) ?>
            <fieldset>
                <legend><?= __('Add Port') ?></legend>
                <?php
                    echo $this->Form->control('physical_port');
                    echo $this->Form->control('port_unit_id');
                    echo $this->Form->control('port_identity');
                    echo $this->Form->control('name');
                    echo $this->Form->control('modules._ids', ['options' => $modules]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
