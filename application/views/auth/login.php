<div class="container">
    <div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><?= lang('login_heading') ?></h3>
        </div>
          <div class="panel-body">
            <?php echo form_open("auth/login");?>
                    <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="<?= lang('index_email_th') ?>" name="identity" type="text">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="<?= lang('login_password_label') ?>" name="password" type="password" value="">
              </div>
              <div class="checkbox">
                  <label>
                    <input name="remember" type="checkbox" value="Remember Me"> <?= lang('login_remember_label'); ?>
                  </label>
                </div>
              <input class="btn btn-lg btn-default btn-block" type="submit" value="Login">
              <p style="margin-top: 15px;" class="text-center">
                <a class="" href="<?php echo site_url('auth/forgot_password') ?>"><?= lang('login_forgot_password');?></a> 
                <?php if ( $this->config->item('allow_registrations') ): ?>
                <a class="" href="<?php echo site_url('auth/create_user') ?>"><?= lang('create_user_heading') ?></a>
                <?php endif ?>
              </p>
            </fieldset>
              </form>
          </div>
      </div>
    </div>
  </div>
</div>