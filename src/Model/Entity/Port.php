<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Port Entity
 *
 * @property int $id
 * @property string $physical_port
 * @property int $port_unit_id
 * @property string $port_identity
 * @property string $name
 *
 * @property \App\Model\Entity\Module[] $modules
 */
class Port extends Entity
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
        'physical_port' => true,
        'port_unit_id' => true,
        'port_identity' => true,
        'name' => true,
        'modules' => true,
    ];
}
