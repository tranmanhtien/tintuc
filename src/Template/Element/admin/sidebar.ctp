<?php
/**
 * @var App\View\AppView $this
 */
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Nikki Admin </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

     

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo $this->Url->build('admin/category')?>" >
          <i class="fas fa-fw fa-cog"></i>
          <span>Thể Loại</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= $this->Url->build('admin/newtype')?>">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Loại tin tức</span>
        </a>
        
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $this->Url->build('admin/author') ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Nhà xuất bản</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $this->Url->build('admin/tag') ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Thẻ nhãn</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo $this->Url->build('admin/new')?>">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Bài viết</span>
        </a>
        
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo $this->Url->build('admin/user')?>">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Tài khoản</span>
        </a>
        
      </li>
      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      

    </ul>
