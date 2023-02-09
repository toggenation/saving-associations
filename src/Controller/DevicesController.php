<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Chronos\Chronos;
use Cake\ORM\Entity;

/**
 * Devices Controller
 *
 * @property \App\Model\Table\DevicesTable $Devices
 * @method \App\Model\Entity\Device[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DevicesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $devices = $this->paginate($this->Devices);

        $this->set(compact('devices'));
    }

    /**
     * View method
     *
     * @param string|null $id Device id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $device = $this->Devices->get($id, [
            'contain' => ['Modules'],
        ]);

        $this->set(compact('device'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $device = $this->Devices->newEmptyEntity();
        if ($this->request->is('post')) {
            $device = $this->Devices->patchEntity($device, $this->request->getData());
            if ($this->Devices->save($device)) {
                $this->Flash->success(__('The device has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The device could not be saved. Please, try again.'));
        }
        $this->set(compact('device'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Device id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $device = $this->Devices->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $device = $this->Devices->patchEntity($device, $this->request->getData());
            if ($this->Devices->save($device)) {
                $this->Flash->success(__('The device has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The device could not be saved. Please, try again.'));
        }
        $this->set(compact('device'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Device id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $device = $this->Devices->get($id);
        if ($this->Devices->delete($device)) {
            $this->Flash->success(__('The device has been deleted.'));
        } else {
            $this->Flash->error(__('The device could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function saveAssociated()
    {
        // $data = $this->request->getData();

        $ports = [
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
        ];

        $data = [
            'device_status_id' => '3',
            'name' => 'myDevice',
            'modules' => [
                [
                    'name' => 'Autodetect',
                    'module_state_id' => '1',
                    'module_class_id' => '12',
                    'module_type_id' => '4',
                    'ports' => $ports
                ],
            ]
        ];

        $device = $this->Devices->newEntity($data, [
            'associated' => [
                // 'Modules',
                // 'Modules.Ports'
                'Modules' => [
                    'accessibleFields' => ['ports' => true],
                    'associated' => 'Ports'
                ]
            ]
        ]);

        // dd($device);

        foreach ($device->modules as $module) {
            foreach ($module->ports as $port) {
                $port->_joinData = new Entity(['extra_data' => uniqid('hi-james-')]);
            }
        }

        // dd($device);
        $entity = $this->Devices->save($device);

        if ($entity) {
            dd($entity);
        }

        dd($device->getErrors());
    }
}
