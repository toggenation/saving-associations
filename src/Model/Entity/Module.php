<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Module Entity
 *
 * @property int $id
 * @property string $name
 * @property int $module_state_id
 * @property int $module_class_id
 * @property int $module_type_id
 * @property int $device_id
 *
 * @property \App\Model\Entity\Device $device
 * @property \App\Model\Entity\Port[] $ports
 */
class Module extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'name' => true,
        'module_state_id' => true,
        'module_class_id' => true,
        'module_type_id' => true,
        'device_id' => true,
        'device' => true,
        'ports' => true,
    ];
}
