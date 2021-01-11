<?php
    $this->layout = 'auth';
    $this->set('Tittlepage', 'Đăng ký tài khoản quản trị'); 
?>
<!-- Sign up form -->
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Đăng ký</h2>
                <?= $this->Flash->render() ?>
                <?= $this->Form->create($user,['id' => 'register_admin'])?>
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <?= $this->Form->text('name', ['placeholder' => 'Tên']);?>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <?= $this->Form->text('email', ['placeholder' => 'Email của bạn','type' => 'email']);?>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <?= $this->Form->password('password', ['placeholder' => 'Mật khẩu','id'=>'password']);?>
                    </div>
                    <div class="form-group">
                        <span id='message_repass'></span>
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <?= $this->Form->password('re_pass', ['placeholder' => 'Nhập lại mật khẩu','id'=>'re_pass']);?>
                    </div>
                    <div class="form-group" hidden >
                        <input type="radio" name="role" value="1" checked>
                    </div>
                    <!-- <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>Tôi đồng ý với <a href="#" class="term-service">điều khoản</a></label>
                    </div> -->
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Đăng ký"/>
                    </div>
                <?= $this->Form->end()?>
            </div>
            <div class="signup-image">
                <figure><img src="/img/signup-image.jpg" alt="sing up image"></figure>
                <a href="<?= $this->Url->build(['controller' => 'Users','action' => 'login'])?>" class="signup-image-link">Đăng nhập</a>
            </div>
        </div>
    </div>
</section>