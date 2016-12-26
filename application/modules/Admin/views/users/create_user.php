<div class="container">
    <div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><?php echo lang('create_user_heading');?></h3>
        </div>
          <div class="panel-body">
            <?php echo form_open();?>
            <p><?php echo lang('create_user_subheading');?></p>
                    <fieldset>
              <div class="form-group">
                  <?php echo form_input($first_name);?>
              </div>
              <div class="form-group">
                  <?php echo form_input($last_name);?>
              </div>
              <?php
                if($identity_column!=='email'): ?>
              <div class="form-group">
                  <?php echo form_input($identity);?>
              </div>
              <?php endif ?>
              <div class="form-group">
                  <?php echo form_input($company);?>
              </div>
              <div class="form-group">
                  <?php echo form_input($email);?>
              </div>
              <div class="form-group">
                  <?php echo form_input($phone);?>
              </div>
              <div class="form-group">
                  <?php echo form_input($password);?>
              </div>
              <div class="form-group">
                  <?php echo form_input($password_confirm);?>
              </div>
              
              <input class="btn btn-lg btn-default btn-block" type="submit" value="Create User">
            </fieldset>
              </form>
          </div>
      </div>
    </div>
  </div>
</div>