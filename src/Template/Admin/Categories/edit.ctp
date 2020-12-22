<?php
    /**
     * @var App\View\AppView $this
     */
use App\Model\Entity\Author;
use Cake\Form\Form;
?>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Thể loại</h6>
  </div>
  <div class="card-body">
    <?= $this->Form->create($category)?>
      <div class="form-group">
        <?= $this->Form->label('Tên');?>
        <?= $this->Form->text('name', ['class' => 'form-control']);?>
      </div>
      <button type="submit" class="btn btn-primary">Sửa</button> <a class="btn btn-success" href="<?= $this->Url->build('admin/category')?>">Quay về</a>
      <?= $this->Flash->render() ?>
    <?= $this->Form->end()?>
  </div>
</div>
