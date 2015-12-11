<div class="form-login">

    <?= $this->hook->render('template:auth:login-form:before') ?>

    <?php if (isset($errors['login'])): ?>
        <p class="alert alert-error"><?= $this->e($errors['login']) ?></p>
    <?php endif ?>

    <?php if (! HIDE_LOGIN_FORM): ?>
    
    
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>Login</h3>
        </div>
    	<div class="panel-body">
            <form method="post" action="<?= $this->url->href('auth', 'check') ?>">

                <?= $this->form->csrf() ?>

                <label for="form-username">Username</label>        
                <?= $this->form->text('username', $values, $errors, array('autofocus'), 'form-control') ?>

                <label for="form-password">Password</label> 
                <?= $this->form->password('password', $values, $errors, array(''), 'form-control') ?>

                <?php if (isset($captcha) && $captcha): ?>
                    <?= $this->form->label(t('Enter the text below'), 'captcha') ?>
                    <img src="<?= $this->url->href('auth', 'captcha') ?>"/>
                    <?= $this->form->text('captcha', $values, $errors, array('required')) ?>
                <?php endif ?>

                <?php if (REMEMBER_ME_AUTH): ?>
                    <?= $this->form->checkbox('remember_me', t('Remember Me'), 1, true) ?><br/>
                <?php endif ?>

                <div class="form-actions">
                    <button type="submit" value="<?= t('Sign in') ?>" class="btn btn-primary">Sign in</button>
                </div>
            </form>
    	</div>
    </div>
        
    <?php endif ?>

    <?= $this->hook->render('template:auth:login-form:after') ?>

    <?php if (GOOGLE_AUTH || GITHUB_AUTH || GITLAB_AUTH): ?>
    <ul class="no-bullet">
        <?php if (GOOGLE_AUTH): ?>
            <li><?= $this->url->link(t('Login with my Google Account'), 'oauth', 'google') ?></li>
        <?php endif ?>

        <?php if (GITHUB_AUTH): ?>
            <li><?= $this->url->link(t('Login with my Github Account'), 'oauth', 'github') ?></li>
        <?php endif ?>

        <?php if (GITLAB_AUTH): ?>
            <li><?= $this->url->link(t('Login with my Gitlab Account'), 'oauth', 'gitlab') ?></li>
        <?php endif ?>
    </ul>
    <?php endif ?>

</div>