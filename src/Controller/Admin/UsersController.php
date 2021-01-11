<?php
namespace App\Controller\Admin;

use App\Controller\Admin\HomeAdminController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends HomeAdminController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    public function index()
    {
        $this->paginate = [
            'limit' => 5
        ];
        $users = $this->paginate($this->Users->find());
        $this->set('users',$users);
    }
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            // Prior to 3.4.0 $this->request->data() was used.
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Tài khoản đã được lưu.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Không thể lưu.'));
        }
        $this->set('user', $user);
    }
    public function edit($id)
    {
        $user = $this->Users->get($id);
        if($this->request->is(['post','put'])){
            $this->Users->patchEntity($user,$this->request->data);
            if($this->Users->save($user)) {
                $this->Flash->success(__('Tài khoản có mã id: {0} đã được sửa thành công .', h($id)));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('Các trường chưa nhập đủ!'));
            }
        }
        $this->set('user', $user);
    }
    public function delete($id)
    {
        $user = $this->Users->get($id);
        if($this->Users->delete($user)){
            $this->Flash->success(__('Tài khoản có mã id: {0} đã bị xóa thành công .', h($id)));
            return $this->redirect(['action' => 'index']);
            
        }else{
            $this->Flash->error(__('Các trường chưa nhập đủ!'));
        }
    }
    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if ($user && $user['role'] == 1) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->error('Tài khoản hoặc mật khẩu không đúng!');
            }
        }
    }
    public function register(){
        $user = $this->Users->newEntity();
        $data = $this->request->getdata();
        // pr($data);die;
        if ($this->request->is('post')) {
            // Prior to 3.4.0 $this->request->data() was used.
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Tài khoản đã được tạo.'));
                return $this->redirect(['action' => 'register']);
            }
            $this->Flash->error(__('Tài khoản không đăng ký thành công.'));
        }
        $this->set('user', $user);
    }
    public function logout()
    {
        $this->Session->destroy();
        return $this->redirect($this->Auth->logout());
    }
}
