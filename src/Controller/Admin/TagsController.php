<?php
namespace App\Controller\Admin;

use App\Controller\Admin\HomeAdminController;
use App\Model\Entity\Tag;
/**
 * @property \App\Model\Table\Tags $Tag
 */
/**
 * Tags Controller
 *
 */
class TagsController extends HomeAdminController
{
    public function initialize(){
        parent::initialize();
    }
    public function index(){
        $tags = $this->paginate($this->Tags->find());
        $this->set('tags',$tags);
    }
    
    public function add()
    {
        $tag = $this->Tags->newEntity();
        if($this->request->is('post')){
            $this->Tags->patchEntity($tag,$this->request->data);
            if($this->Tags->save($tag)) {
                $this->Flash->success(__('Đã được lưu'));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('Các trường chưa nhập đủ!'));
            }
        }
        $this->set('tag', $tag);
    }

    public function edit($id = null){
        $tag = $this->Tags->get($id);
        if($this->request->is(['post','put'])){
            $this->Tags->patchEntity($tag,$this->request->data);
            if($this->Tags->save($tag)) {
                $this->Flash->success(__('Thẻ nhãn có mã id: {0} đã được sửa thành công .', h($id)));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('Các trường chưa nhập đủ!'));
            }
        }
        $this->set('tag', $tag);
    }

    public function delete($id = null){
        $tag = $this->Tags->get($id);
        if($this->Tags->delete($tag)){
            $this->Flash->success(__('Thẻ nhãn có mã id: {0} đã bị xóa thành công .', h($id)));
            return $this->redirect(['action' => 'index']);
            
        }else{
            $this->Flash->error(__('Các trường chưa nhập đủ!'));
        }
    }
}
 