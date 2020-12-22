<?php
namespace App\Controller\Admin;

use App\Controller\Admin\HomeAdminController;
use App\Model\Entity\Category;
/**
 * @property \App\Model\Table\Categories $Categories
 */

/**
 * Categories Controller
 *
 */
class CategoriesController extends HomeAdminController
{
    public function initialize(){
        parent::initialize();
        $this->loadModel('Categories');
    }
    public function index()
    {
        $categories =  $this->Paginator->paginate($this->Categories->find());
        $this->set('categories',$categories);
    }
    public function add(){
        $category = $this->Categories->newEntity();
        if($this->request->is('post')){
            $this->Categories->patchEntity($category , $this->request->data);
            if($this->Categories->save($category)) {
                $this->Flash->success(__('Đã được lưu'));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('Các trường chưa nhập đủ!'));
            }
        }
        $this->set('category', $category);
    }
    public function edit($id = null){
        $category = $this->Categories->get($id);
        if($this->request->is(['post','put'])){
            $this->Categories->patchEntity($category , $this->request->data);
            if($this->Categories->save($category)) {
                $this->Flash->success(__('Đã được lưu'));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('Các trường chưa nhập đủ!'));
            }
        }
        $this->set('category', $category);
    }
    public function delete($id = null){
        $category = $this->Categories->get($id);
        if ($this->Authors->delete($category)) {
            $this->Flash->success(__('Thế loại có mã id: {0} đã bị xóa thành công .', h($id)));
            return $this->redirect(['action' => 'index']);
        }else{
            $this->Flash->success(__('Xóa không thành công !'));
        }
    }
}
