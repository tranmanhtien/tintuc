<?php
namespace App\Controller\Admin;

use App\Controller\Admin\HomeAdminController;
use App\Model\Entity\Category;
/**
 * @property \App\Model\Table\Categories $Categories
 */

/**
 * @property \App\Model\Table\NewsType $NewsType
 */

/**
 * NewsType Controller
 *
 */
class NewsTypeController extends HomeAdminController
{
    public function initialize(){
        parent::initialize();
        $this->loadModel('NewsType');
        $this->loadModel('Categories');
    }
    public function index(){
        $newstype = $this->Paginator->paginate($this->NewsType->find()->contain(['Categories']));
        $this->set('newstype',$newstype);
    }
    public function add(){
        $arrcate = [];
        $categories = $this->Categories->find()->toArray();
        foreach($categories as $row){
            $arrcate[$row->id] = $row->name;
        }
        $newstype = $this->NewsType->newEntity();
        if($this->request->is('post')){
            $this->NewsType->patchEntity($newstype , $this->request->data);
            if($this->NewsType->save($newstype)) {
                $this->Flash->success(__('Đã được lưu'));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('Các trường chưa nhập đủ!'));
            }
        }
        $this->set('newstype', $newstype);
        $this->set('arrcate',$arrcate);
    }
    public function edit($id = null){
        $arrcate = [];
        $categories = $this->Categories->find()->toArray();
        foreach($categories as $row){
            $arrcate[$row->id] = $row->name;
        }
        $newstype = $this->NewsType->get($id);
        if($this->request->is(['post','put'])){
            $this->NewsType->patchEntity($newstype , $this->request->data);
            if($this->NewsType->save($newstype)) {
                $this->Flash->success(__('Đã được lưu'));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('Các trường chưa nhập đủ!'));
            }
        }
        $this->set('newstype', $newstype);
        $this->set('arrcate',$arrcate);
    }
    public function delete($id = null){
        $newstype = $this->NewsType->get($id);
        if($this->NewsType->delete($newstype)){
            $this->Flash->success(__('Loại tin có mã id: {0} đã bị xóa thành công .', h($id)));
            return $this->redirect(['action' => 'index']);
        }
        else{
            $this->Flash->success(__('Xóa không thành công !'));
        }
    }
}
