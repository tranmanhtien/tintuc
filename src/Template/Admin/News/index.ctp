<?php

/** 
 * @var App\View\AppView $this
 */
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tin tức <a href="<?= $this->Url->build('admin/new/add') ?>" class="btn btn-success ml-2">THÊM</a></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?= $this->Flash->render() ?>
        <thead>
          <tr>
            <th>Tiêu đề</th>
            <th>Tác giả</th>
            <th>Nội dung</th>
            <th>Thể loại</th>
            <th>Loại tin</th>
            <th>Ảnh</th>
            <th>Tag</th>
            <th>Tùy chọn</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($news as $row) { ?>
            
            <tr>
              <td><?= $row->tittle ?></td>
              <td><?= $row->author['name'] ?></td>
              <td><?= $row->description ?></td>
              <td><?= $row->news_type['category']['name'] ?></td>
              <td><?= $row->news_type['name'] ?></td>
              <td><img src="/<?= $row->cover_image?>"></td>
              <td><?= $row->tag['name'] ?></td>
              <td><a href="<?= $this->Url->build('admin/new/edit/' . $row->id) ?>" class="btn btn-warning mr-2">SỬA</a>
                <?= $this->Form->postLink(
                  'XÓA',
                  ['action' => 'delete', $row->id],
                  [
                    'confirm' => 'Bạn có chắc chắn muốn xóa tin có mã id là: ' . $row->id,
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