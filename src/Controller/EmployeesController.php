<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Http\Exception\UnauthorizedException;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 *
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{
    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        $this->Auth->allow(['add']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $employees = $this->Employees->find()->contain(['Locations','Departments'])->all()->tolist();
        // debug($employees);
        // die;
        $this->set('employees',$employees[0]);
        //$this->paginate($this->Employees);
        // $this->set(compact('employees'));
        // $query =  $this->Employees->find()->contain(['Locations']);
        // $this->set('location', $query);
        // $querys =  $this->Employees->find()->all();
        // //->contain(['Department']);
        // $this->set('department', $querys);

    }

    public function login(){
        if($this->request->is('post')){
            debug($this->request->getData());
            $user = $this->Auth->identify(); // Postされたユーザー名とパスワードをもとにデータベースを検索。ユーザー名とパスワードに該当するユーザーがreturnされる
            debug($user);
            //     die;
            if ($user) { // 該当するユーザーがいればログイン処理
                $this->Auth->setUser($user);
                return $this->Auth->redirectUrl();
            } else { // 該当するユーザーがいなければエラー
                throw new UnauthorizedException('メールアドレスかパスワードが間違っています');
            }
        }
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Departments', 'Locations', 'Books', 'FavoriteTags', 'Favorites', 'LendingStatuses'],
        ]);

        $this->set('employee', $employee);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $departments = $this->Employees->Departments->find('list', ['limit' => 200]);
        $locations = $this->Employees->Locations->find('list', ['limit' => 200]);
        $this->set(compact('employee', 'departments', 'locations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $departments = $this->Employees->Departments->find('list', ['limit' => 200]);
        $locations = $this->Employees->Locations->find('list', ['limit' => 200]);
        $this->set(compact('employee', 'departments', 'locations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function logout(){
        $this->request->session()->destroy(); // セッションの破棄
        return $this->redirect($this->Auth->logout()); // ログアウト処理
    }
}
