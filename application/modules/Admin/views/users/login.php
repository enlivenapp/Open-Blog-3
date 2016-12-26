<div class="container">
    <div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Please sign in</h3>
        </div>
          <div class="panel-body">
            <?php echo form_open("auth/login");?>
                    <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="E-mail" name="identity" type="text">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password" value="">
              </div>
              <div class="checkbox">
                  <label>
                    <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                  </label>
                </div>
              <input class="btn btn-lg btn-default btn-block" type="submit" value="Login">
              <p style="margin-top: 15px;" class="text-center">
                <a class="" href="<?php echo site_url('auth/forgot_password') ?>"><?php echo lang('login_forgot_password');?></a> 
                <a class="" href="<?php echo site_url('pages/contact') ?>">Don't have an account?</a>
              </p>
            </fieldset>
              </form>
          </div>
      </div>
    </div>
  </div>
</div>