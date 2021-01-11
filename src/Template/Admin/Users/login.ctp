<?php
    $this->set('Tittlepage', 'Đăng nhập admin');
    $this->layout = 'auth';
?>
<!-- Sing in  Form -->
<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="/img/signin-image.jpg" alt="sing up image"></figure>
                <a href="<?= $this->Url->build(['controller' => 'Users','action' => 'register'])?>" class="signup-image-link">Tạo một tài khoản</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Đăng nhập</h2>
                <?= $this->Flash->render() ?>
                <?= $this->Form->create()?>
                <!-- <form method="POST" class="register-form" id="login-form"> -->
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="email" id="email" placeholder="Tên đăng nhập/email"/>
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="Mật khẩu"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                        <label for="remember-me" class="label-agree-term"><span><span></span></span>Nhớ tài khoản</label>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Đăng nhập"/>
                    </div>
                <!-- </form> -->
                <?= $this->Form->end()?>
                <div class="social-login">
                    <span class="social-label">Đăng nhập cùng</span>
                    <ul class="socials">
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> 