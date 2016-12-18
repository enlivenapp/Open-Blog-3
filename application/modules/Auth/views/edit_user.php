<div class="container">
    <div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><?php echo lang('edit_user_heading');?></h3>
        </div>
          <div class="panel-body">
            <?php echo form_open(uri_string());?>
            <p><?php echo lang('edit_user_subheading');?></p>
                    <fieldset>
              <div class="form-group">
                  <?php echo form_input($first_name);?>
              </div>
              <div class="form-group">
                  <?php echo form_input($last_name);?>
              </div>
              <div class="form-group">
                  <?php echo form_input($company);?>
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

              <?php if ($this->ion_auth->is_admin()): ?>
              <div class="form-group">
                <h3><?php echo lang('edit_user_groups_heading');?></h3>
                <p class="text-center">Add or remove a user from a group by checking or unchecking the corrosponding box.</p>
                <?php foreach ($groups as $group):?>
                    <?php
                        $gID=$group['id'];
                        $checked = null;
                        $item = null;
                        foreach($currentGroups as $grp) {
                            if ($gID == $grp->id) {
                                $checked= ' checked="checked"';
                            break;
                            }
                        }
                    ?>
                    <div class="checkbox">
                    <label>
                      <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                    <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                    </label>
                  </div>
                <?php endforeach?>

                <?php endif ?>
              </div>
                <?php echo form_hidden('id', $user['id']);?>
                <?php echo form_hidden($csrf); ?>
              
              <input class="btn btn-lg btn-default btn-block" type="submit" value="Edit User">
            </fieldset>
              </form>
          </div>
      </div>
    </div>
  </div>
</div>