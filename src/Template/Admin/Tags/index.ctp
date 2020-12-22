<?php

/** 
 * @var App\View\AppView $this
 */
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Thẻ nhãn <a href="<?= $this->Url->build('admin/tag/add') ?>" class="btn btn-success ml-2">THÊM</a></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?= $this->Flash->render() ?>
        <thead>
          <tr>
            <th>Tên</th>
            <th>Ngày tạo</th>
            <th>Tùy chọn</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tags as $row) { ?>
            <tr>
              <td><?= $row->name ?></td>
              <td><?= $row->created ?></td>
              <td><a href="<?= $this->Url->build('admin/tag/edit/' . $row->id) ?>" class="btn btn-warning mr-2">SỬA</a>
                <?= $this->Form->postLink(
                  'XÓA',
                  ['action' => 'delete', $row->id],
                  [
                    'confirm' => 'Bạn có chắc chắn muốn xóa thẻ nhãn: '.$row->name,
                    'class' => 'btn btn-danger mr-2'
                  ]
                )
                ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="custom-pagination">
        <ul>
          <?= $this->Paginator->prev('« Quay lại') ?>
          <?= $this->Paginator->numbers() ?>
          <?= $this->Paginator->next('Tiếp theo »') ?>
        </ul>
      </div>

    </div>
  </div>
</div>