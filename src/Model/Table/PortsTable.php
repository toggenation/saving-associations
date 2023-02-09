<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ports Model
 *
 * @property \App\Model\Table\ModulesTable&\Cake\ORM\Association\BelongsToMany $Modules
 *
 * @method \App\Model\Entity\Port newEmptyEntity()
 * @method \App\Model\Entity\Port newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Port[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Port get($primaryKey, $options = [])
 * @method \App\Model\Entity\Port findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Port patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Port[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Port|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Port saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Port[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Port[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Port[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Port[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PortsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('ports');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Modules', [
            'foreignKey' => 'port_id',
            'targetForeignKey' => 'module_id',
            'joinTable' => 'modules_ports',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('physical_port')
            ->requirePresence('physical_port', 'create')
            ->notEmptyString('physical_port');

        $validator
            ->integer('port_unit_id')
            ->requirePresence('port_unit_id', 'create')
            ->notEmptyString('port_unit_id');

        $validator
            ->scalar('port_identity')
            ->requirePresence('port_identity', 'create')
            ->notEmptyString('port_identity');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
