<?php
/**
 * @var App\View\AppView $this
 */

use Composer\Util\Url;

?>
  <nav class="classy-navbar justify-content-between" id="nikkiNav">

<!-- Nav brand -->
<a href="index.html" class="nav-brand"><img src="img/img/core-img/logo.png" alt=""></a>

<!-- Navbar Toggler -->
<div class="classy-navbar-toggler">
    <span class="navbarToggler"><span></span><span></span><span></span></span>
</div>

<!-- Menu -->
<div class="classy-menu">

    <!-- close btn -->
    <div class="classycloseIcon">
        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
    </div>

    <!-- Nav Start -->
    <div class="classynav">
        <ul>
            <li><a href="<?= $this->Url->build('page')?>">Trang chủ</a></li>
            <li><a href="#">Pages</a>
                <ul class="dropdown">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="archive-blog.html">Archive Blog</a></li>
                    <li><a href="single-post.html">Single Post</a></li>
                    <li><a href="about-us.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="typography.html">Typography</a></li>
                </ul>
            </li>
            <li><a href="#">Thể loại</a>
                <div class="megamenu">
                    <ul class="single-mega cn-col-4">
                        <?php foreach($newtypemenu as $row){?>
                            <li><a href="<?= $this->Url->build(['controller' => 'Homes', 'action' => 'newtype', $row->id]);?>">- <?= $row->name?></a></li>
                        <?php }?>
                    </ul>
                </div>
            </li>
            <li><a href="about-us.html">Giới thiệu</a></li>
            <li><a href="contact.html">Liên hệ</a></li>
        </ul>

        <!-- Search Form -->
        <div class="search-form">
            <form action="#" method="get">
                <input type="search" name="search" class="form-control" placeholder="Tìm kiếm...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <!-- Social Button -->
        <div class="top-social-info">
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="RSS Feed"><i class="fa fa-rss" aria-hidden="true"></i></a>
        </div>

    </div>
    <!-- Nav End -->
</div>
</nav>