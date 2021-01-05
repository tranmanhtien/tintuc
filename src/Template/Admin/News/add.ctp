<?php
    /**
     * @var App\View\AppView $this
     */
use Cake\Form\Form;
?>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tin tức</h6>
  </div>
  <div class="card-body">
    <?= $this->Form->create($new,['type' => 'file'])?>
      <div class="form-group">
        <?= $this->Form->label('Tiêu đề');?>
        <?= $this->Form->text('tittle', ['class' => 'form-control']);?>
      </div>
      <div class="form-group">
        <?= $this->Form->label('Thể loại');?>
        <?= $this->Form->select('category_id',$arrCate, ['class' => 'form-control','id' => 'category']);?>
      </div>
      <div class="form-group">
        <?= $this->Form->label('Loại tin');?>
        <?= $this->Form->select('newstype_id',$arrNewType, ['class' => 'form-control','id' => 'newtype']);?>
      </div>
      <div class="form-group">
        <?= $this->Form->label('Thẻ nhãn');?>
        <?= $this->Form->select('tag_id',$arrTag, ['class' => 'form-control']);?>
      </div>
      <div class="form-group">
        <?= $this->Form->label('Tác giả');?>
        <?= $this->Form->select('author_id',$arrAth, ['class' => 'form-control']);?>
      </div>
      <div class="form-group">
        <?= $this->Form->label('Nội dung');?>
        <?= $this->Form->textarea('description',['class' => 'form-control','id' => 'desTextEditor']);?>
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Ảnh bìa</label>
        <?=$this->Form->file('cover_image',['id' => 'filePhoto'])?>
      </div>
      <div class="form-group">
        <img id="previewHolder" name="cover_image" src="#" alt="" style="max-width:300px;max-height:300px">
        <button id="btn-del-img" style="display:none">Xóa</button>
      </div>
      <div class="form-group ">
        <div class="form-check form-check-inline">
          <?= $this->Form->label('Độ hot');?>
        </div>
        <div class="form-check form-check-inline">
          <?= $this->Form->radio('hot', [
            ['value' => 0, 'text' => 'Không', 'label' => ['class' => 'form-check-inline form-check-label'],'class'=> ['class' => 'form-check-input']],
            ['value' => 1, 'text' => 'Có', 'label' => ['class' => 'form-check-inline form-check-label'],'class'=> ['class' => 'form-check-input']]
          ]);?>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Thêm</button> <a class="btn btn-success" href="<?= $this->Url->build('admin/new')?>">Quay về</a>
      <?= $this->Flash->render() ?>
    <?= $this->Form->end()?>
  </div>
</div>
<script>
    CKEDITOR.replace('desTextEditor');
    $(document).ready(function(){
        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#previewHolder').attr('src', e.target.result);
              $("#btn-del-img").show();
            }
            reader.readAsDataURL(input.files[0]);
          } else {
            btn-del-img.attr('src', '');
          }
        }

        $("#filePhoto").change(function() {
          readURL(this);
        });

        $("#btn-del-img").click(function(){
          $('#previewHolder').attr('src', '');
          $('#filePhoto').val('');
          $(this).hide();
        });
       
    });
    
</script>
