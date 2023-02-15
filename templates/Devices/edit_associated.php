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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $device->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $device->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Devices'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <!-- 
        $data = [
  'device_status_id' => '3',
  'name' => 'myDevice',
  'modules' => [
      [
         'name' => 'Autodetect',
         'module_state_id' => '1',
         'module_class_id' => '12',
         'module_type_id' => '4',
         'ports' => [
            [
              'physical_port' => '1',
              'port_unit_id' => '1',
              'port_identity' => '201901',
              'name' => 'Analog-1',
            ],
            [
              'physical_port' => '2',
              'port_unit_id' => '1',
              'port_identity' => '201902',
              'name' => 'Analog-2',
            ],
         ],
     ],
   ]
 ];
     -->
    <div class="column-responsive column-80">
        <div class="devices form content">
            <?= $this->Form->create($device) ?>
            <fieldset>
                <legend><?= __('Edit Device') ?></legend>
                <?php
                echo $this->Form->control('device_status_id', [
                    'type' => 'text'
                ]);
                echo $this->Form->control('name');

                ?>

                <div class="module">

                    <?php foreach ($device->modules as $mkey => $module) {
                    ?>
                        <h3><?= $mkey; ?>

                            <?php echo $this->Form->hidden(
                                "modules.{$mkey}.id"
                            );
                            echo $this->Form->control(
                                "modules.{$mkey}.name",
                                [
                                    'label' => 'Module Name'
                                ]
                            );

                            echo $this->Form->control(
                                "modules.{$mkey}.module_state_id",
                                [
                                    'type' => 'text'
                                ]
                            );

                            echo $this->Form->control(
                                "modules.{$mkey}.module_class_id",
                                [
                                    'type' => 'text'
                                ]
                            );

                            echo $this->Form->control(
                                "modules.{$mkey}.module_type_id",
                                [
                                    'type' => 'text'
                                ]
                            ); ?>
                            <div class="port">
                                <?php foreach ($module->ports as $pkey => $port) {
                                    echo $this->Form->hidden(
                                        "modules.{$mkey}.ports.{$pkey}.id"
                                    );

                                    // 'physical_port' => '1',
                                    // 'port_unit_id' => '1',
                                    // 'port_identity' => '201901',
                                    // 'name' => 'Analog-1',
                                    echo $this->Form->control(
                                        "modules.{$mkey}.ports.{$pkey}.name",
                                        [
                                            'label' => 'Port name'
                                        ]
                                    );
                                    echo $this->Form->control(
                                        "modules.{$mkey}.ports.{$pkey}.physical_port",
                                        [
                                            'type' => 'text'
                                        ]
                                    );

                                    echo $this->Form->control(
                                        "modules.{$mkey}.ports.{$pkey}.port_unit_id",
                                        [
                                            'type' => 'text'
                                        ]
                                    );
                                    echo $this->Form->control(
                                        "modules.{$mkey}.ports.{$pkey}.port_identity",
                                        [
                                            'type' => 'text'
                                        ]
                                    );
                                } ?>
                            </div>
                        <?php
                    }
                        ?>
                </div>
                <div class="module">
                    <?php $mkey = count($device->modules); ?>
                    <h4>Add a module</h4>
                    <?php
                    echo $this->Form->control(
                        "modules.{$mkey}.name",
                        [
                            'label' => 'Module Name'
                        ]
                    );

                    echo $this->Form->control(
                        "modules.{$mkey}.module_state_id",
                        [
                            'type' => 'text'
                        ]
                    );

                    echo $this->Form->control(
                        "modules.{$mkey}.module_class_id",
                        [
                            'type' => 'text'
                        ]
                    );

                    echo $this->Form->control(
                        "modules.{$mkey}.module_type_id",
                        [
                            'type' => 'text'
                        ]
                    ); ?>

                    <div class="port">
                        <?php foreach (range(0, 2) as $pkey) {
                            // echo $this->Form->hidden(
                            //     "modules.{$mkey}.ports.{$pkey}.id"
                            // );
                            echo $this->Form->control(
                                "modules.{$mkey}.ports.{$pkey}.name",
                                [
                                    'label' => 'Port name'
                                ]
                            );

                            echo $this->Form->control(
                                "modules.{$mkey}.ports.{$pkey}.name",
                                [
                                    'label' => 'Port name'
                                ]
                            );
                            echo $this->Form->control(
                                "modules.{$mkey}.ports.{$pkey}.physical_port",
                                [
                                    'type' => 'text'
                                ]
                            );

                            echo $this->Form->control(
                                "modules.{$mkey}.ports.{$pkey}.port_unit_id",
                                [
                                    'type' => 'text'
                                ]
                            );
                            echo $this->Form->control(
                                "modules.{$mkey}.ports.{$pkey}.port_identity",
                                [
                                    'type' => 'text'
                                ]
                            );
                        } ?>
                    </div>

                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>