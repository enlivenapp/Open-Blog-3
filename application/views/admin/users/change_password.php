<div class="container">
    <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                        <div class="panel-heading">
                        <h3 class="panel-title">Change Password</h3>
                        </div>
                        <div class="panel-body">
                        <?php echo form_open("auth/change_password");?>
                    <fieldset>
                              <div class="form-group">
                                  <?php echo form_input($old_password);?>
                              </div>
                              <div class="form-group">
                                  <?php echo form_input($new_password);?>
                              </div>
                              <div class="form-group">
                                  <?php echo form_input($new_password_confirm);?>
                              </div>
                              <?php echo form_input($user_id);?>
                            </div>
                            <p class="text-center">You'll be required to log in with your new password</p>
                              <input class="btn btn-lg btn-default btn-block" type="submit" value="Change Password">
                        </fieldset>
                              </form>
                      </div>
                  </div>
            </div>
      </div>
</div>
