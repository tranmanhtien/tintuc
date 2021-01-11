<?php
namespace App\Controller\Admin;

use App\Controller\Admin\HomeAdminController;
use App\Model\Entity\Author;

/**
 * @property \App\Model\Table\AuthorsTable $Authors
 */
/**
 * @var App\View\AppView $this
 */

/**
 * Authors Controller
 *
 */
class AuthorsController extends HomeAdminController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Authors');
    }
    public function index(){
        
        $authors = $this->paginate($this->Authors->find());
        $this->set('authors',$authors);
        
    }
    public function add(){
        $author = $this->Authors->newEntity();
        if ($this->request->is('post')) {
            $this->Authors->patchEntity($author, $this->request->data);   
            if ($this->Authors->save($author)) {
                $this->Flash->success(__('Đã được lưu'));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('Các trường chưa nhập đủ!'));
            }
        }
        $this->set('author', $author);
    }
    public function edit($id = null){
        $author = $this->Authors->get($id);
        if ($this->request->is(['post','put'])) {
            $this->Authors->patchEntity($author, $this->request->data);   
            if ($this->Authors->save($author)) {
                $this->Flash->success(__('Đã được lưu'));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('Các trường chưa nhập đủ!'));
            }
        }
        $this->set('author', $author);
    }
    public function delete($id){
        // $this->request->allowMethod(['post', 'delete']);
        $author = $this->Authors->get($id);
        if ($this->Authors->delete($author)) {
            $this->Flash->success(__('Nhà xuất bản có mã id: {0} đã bị xóa thành công .', h($id)));
            return $this->redirect(['action' => 'index']);
        }else{
            $this->Flash->success(__('Xóa không thành công !'));
        }
    }
}
