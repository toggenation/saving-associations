<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Ports Controller
 *
 * @property \App\Model\Table\PortsTable $Ports
 * @method \App\Model\Entity\Port[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PortsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $ports = $this->paginate($this->Ports);

        $this->set(compact('ports'));
    }

    /**
     * View method
     *
     * @param string|null $id Port id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $port = $this->Ports->get($id, [
            'contain' => ['Modules'],
        ]);

        $this->set(compact('port'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $port = $this->Ports->newEmptyEntity();
        if ($this->request->is('post')) {
            $port = $this->Ports->patchEntity($port, $this->request->getData());
            if ($this->Ports->save($port)) {
                $this->Flash->success(__('The port has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The port could not be saved. Please, try again.'));
        }
        $modules = $this->Ports->Modules->find('list', ['limit' => 200])->all();
        $this->set(compact('port', 'modules'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Port id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $port = $this->Ports->get($id, [
            'contain' => ['Modules'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $port = $this->Ports->patchEntity($port, $this->request->getData());
            if ($this->Ports->save($port)) {
                $this->Flash->success(__('The port has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The port could not be saved. Please, try again.'));
        }
        $modules = $this->Ports->Modules->find('list', ['limit' => 200])->all();
        $this->set(compact('port', 'modules'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Port id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $port = $this->Ports->get($id);
        if ($this->Ports->delete($port)) {
            $this->Flash->success(__('The port has been deleted.'));
        } else {
            $this->Flash->error(__('The port could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
