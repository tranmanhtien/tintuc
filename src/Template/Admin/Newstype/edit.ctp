<?php
    /**
     * @var App\View\AppView $this
     */
use App\Model\Entity\Author;
use Cake\Form\Form;
?>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Loại tin</h6>
  </div>
  <div class="card-body">
    <?= $this->Form->create($newstype)?>
      <div class="form-group">
        <?= $this->Form->label('Tên');?>
        <?= $this->Form->text('name', ['class' => 'form-control']);?>
      </div>
      <div class="form-group">
        <?= $this->Form->label('Tên không dấu');?>
        <?= $this->Form->text('name_unsigned', ['class' => 'form-control']);?>
      </div>
      <div class="form-group">
        <?= $this->Form->label('Thể loại');?>
        <?= $this->Form->select('category_id',$arrcate, ['class' => 'form-control']);?>
      </div>   
      <button type="submit" class="btn btn-primary">Sửa</button> <a class="btn btn-success" href="<?= $this->Url->build('admin/newtype')?>">Quay về</a>
      <?= $this->Flash->render() ?>
    <?= $this->Form->end()?>
  </div>
</div>
