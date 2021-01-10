<?php
    /**
     * @var App\View\AppView $this
     */
use App\Model\Entity\News;
use Cake\Form\Form;
?>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tài khoản</h6>
  </div>
  <div class="card-body">
    <?= $this->Form->create($user)?>
      <div class="form-group">
        <?= $this->Form->label('Tên');?>
        <?= $this->Form->text('name', ['class' => 'form-control']);?>
      </div>
      <div class="form-group">
        <?= $this->Form->label('Email');?>
        <?= $this->Form->text('email', ['class' => 'form-control']);?>
      </div>
      <div class="form-group">
        <?= $this->Form->label('Mật khẩu');?>
        <?= $this->Form->password('password', ['class' => 'form-control']);?>
      </div>
      <div class="form-group ">
        <div class="form-check form-check-inline">
          <?= $this->Form->label('Quyền');?>
        </div>
        <div class="form-check form-check-inline">
          <?= $this->Form->radio('role', [
            ['value' => 0, 'text' => 'User', 'label' => ['class' => 'form-check-inline form-check-label'],'class'=> ['class' => 'form-check-input']],
            ['value' => 1, 'text' => 'Admin', 'label' => ['class' => 'form-check-inline form-check-label'],'class'=> ['class' => 'form-check-input']]
          ]);?>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Sửa</button> <a class="btn btn-success" href="<?= $this->Url->build('admin/user')?>">Quay về</a>
      <?= $this->Flash->render() ?>
    <?= $this->Form->end()?>
  </div>
</div>
