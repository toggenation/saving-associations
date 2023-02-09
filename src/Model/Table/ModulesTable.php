<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Modules Model
 *
 * @property \App\Model\Table\DevicesTable&\Cake\ORM\Association\BelongsTo $Devices
 * @property \App\Model\Table\PortsTable&\Cake\ORM\Association\BelongsToMany $Ports
 *
 * @method \App\Model\Entity\Module newEmptyEntity()
 * @method \App\Model\Entity\Module newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Module[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Module get($primaryKey, $options = [])
 * @method \App\Model\Entity\Module findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Module patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Module[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Module|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Module saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Module[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Module[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Module[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Module[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ModulesTable extends Table
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

        $this->setTable('modules');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Devices', [
            'foreignKey' => 'device_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Ports', [
            'foreignKey' => 'module_id',
            'targetForeignKey' => 'port_id',
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
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('module_state_id')
            ->requirePresence('module_state_id', 'create')
            ->notEmptyString('module_state_id');

        $validator
            ->integer('module_class_id')
            ->requirePresence('module_class_id', 'create')
            ->notEmptyString('module_class_id');

        $validator
            ->integer('module_type_id')
            ->requirePresence('module_type_id', 'create')
            ->notEmptyString('module_type_id');

        $validator
            ->integer('device_id')
            ->notEmptyString('device_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('device_id', 'Devices'), ['errorField' => 'device_id']);

        return $rules;
    }
}
