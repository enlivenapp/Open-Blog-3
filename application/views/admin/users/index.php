<div>

    <?php if (isset($message)): ?>
    <div>
        <?= $message ?>
    </div>
    <?php endif ?>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Users</a></li>
    <li role="presentation"><a href="#groups" aria-controls="groups" role="tab" data-toggle="tab">Groups</a></li>
    <li role="presentation"><a href="#permissions" aria-controls="permissions" role="tab" data-toggle="tab">Permissions (Beta)</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <!-- users -->
    <div role="tabpanel" class="tab-pane fade in active" id="home">
      <h1><?php echo lang('index_heading');?></h1>
        <p><?php echo lang('index_subheading');?></p>

        <p><a class="btn btn-default btn-sm" href="<?php echo site_url('admin_users/create_user') ?>"><?php echo lang('index_create_user_link') ?></a></p>

        <table class="table table-condensed">
          <tr>
            <th><?php echo lang('index_fname_th');?></th>
            <th><?php echo lang('index_lname_th');?></th>
            <th><?php echo lang('index_email_th');?></th>
            <th><?php echo lang('index_groups_th');?></th>
            <th><?php echo lang('index_status_th');?></th>
            <th><?php echo lang('index_action_th');?></th>
          </tr>
          <?php foreach ($users as $user):?>
            <tr>
                    <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                    <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
              <td>
                <?php foreach ($user->groups as $group):?>
                  <?php echo anchor("admin_users/edit_group/".$group->id, htmlspecialchars(ucfirst($group->name),ENT_QUOTES,'UTF-8')) ;?><br />
                        <?php endforeach?>
              </td>
              <td><?php echo ($user->active) ? anchor("admin_users/deactivate/".$user->id, lang('index_active_link')) : anchor("admin_users/activate/". $user->id, lang('index_inactive_link'));?></td>
              <td><?php echo anchor("admin_users/edit_user/".$user->id, lang('edit_user_heading')) ;?></td>
            </tr>
          <?php endforeach;?>
        </table>
    </div>
    <!-- groups -->
    <div role="tabpanel" class="tab-pane fade" id="groups">
        <h1><?php echo lang('edit_user_validation_groups_label') ?></h1>
         <p><a class="btn btn-default btn-sm" href="<?php echo site_url('admin_users/create_group') ?>"><?php echo lang('index_create_group_link') ?></a></p>

         <table class="table table-condensed">
          <tr>
            <th><?php echo lang('create_group_name_label');?></th>
            <th><?php echo lang('create_group_desc_label');?></th>
            <th><?php echo lang('permissions_label');?></th>
             <th></th>
          </tr>
          <?php foreach ($groups as $group):?>
            <tr>
                <td><?php echo htmlspecialchars($group->name,ENT_QUOTES,'UTF-8');?></td>
                <td><?php echo htmlspecialchars($group->description,ENT_QUOTES,'UTF-8');?></td>
                <td>
                <?php if ($group->name == 'admin'): ?>
                Unrestricted
                <?php elseif ( ! $group->permissions ): ?>
                None
                <?php else: ?>
                <?php foreach ($group->permissions as $perm): ?>
                <?= $perm->description ?><br>
                <?php endforeach ?>
                <?php endif?>

              </td>
                <td class="text-right">
                  <?php if ($group->protected != 1): ?>
                  <?php echo anchor("admin_users/remove_group/".$group->id, lang('remove_group_heading'), 'class="btn btn-danger btn-xs"' ) ;?> 
                <?php endif ?>
                <?php echo anchor("admin_users/edit_group/".$group->id, lang('edit_group_heading'), 'class="btn btn-default btn-xs"' ) ;?> 
              </td>
            </tr>
          <?php endforeach;?>
        </table>
    </div>

    <!-- permissions -->
    <div role="tabpanel" class="tab-pane fade" id="permissions">
      <h1><?php echo lang('permissions_label') ?></h1>
         <p><a class="btn btn-default btn-sm" href="<?php echo site_url('admin_users/create_perm') ?>"><?php echo lang('index_create_perm_link') ?></a></p>

         <table class="table table-condensed">
          <tr>
            <th><?php echo lang('permissions_name_label');?></th>
             <th></th>
          </tr>
          <?php foreach ($permissions as $perm):?>
            <tr>
                <td><?php echo htmlspecialchars($perm->description,ENT_QUOTES,'UTF-8');?></td>
                
                <td class="text-right">
                  <?php if ($perm->protected != 1): ?>
                  <?php echo anchor("admin_users/remove_perm/".$perm->id, lang('remove_perm_heading'), 'class="btn btn-danger btn-xs"' ) ;?> 
                <?php endif ?>
                <?php echo anchor("admin_users/edit_perm/".$perm->id, lang('edit_perm_heading'), 'class="btn btn-default btn-xs"' ) ;?> 
              </td>
            </tr>
          <?php endforeach;?>
        </table>
    </div>

  </div>

</div>