<?php
namespace App\Controller\Page;

use App\Controller\Page\HomesController;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends HomesController
{
    public function initialize()
    {
        parent::initialize();
    }
   
    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->error('Tài khoản hoặc mật khẩu không đúng!');
            }
        }
    }
    public function register(){
        $user = $this->Users->newEntity();
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
    public function profile($id){
        $user = $this->Users->get($id);
        if ($this->request->is(['post','put'])) {
            // Prior to 3.4.0 $this->request->data() was used.
            $user = $this->Users->patchEntity($user,$this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Tài khoản đã được chỉnh sửa.'));
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('Tài khoản không đăng ký thành công.'));
        }
        $this->set('user', $user);
    }
    public function logout()
    {
        $this->Auth->logout();
        return $this->redirect($this->referer());
    }
}
