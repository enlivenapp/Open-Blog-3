        <div class="col-sm-3 col-md-2 col-xs-12 sidebar">
          <ul class="nav nav-sidebar">
            <li class="<?php echo ($this->template->active_link == 'dashboard')? "active": ''; ?>"><a href="<?= site_url('admin') ?>"><i class="fa fa-tachometer"></i> Dashboard <span class="sr-only">(current)</span></a></li>
            <li class="<?php echo ($this->template->active_link == 'posts')? "active": ''; ?>"><a href="<?= site_url('admin_posts') ?>">Posts</a></li>
            <li class="<?php echo ($this->template->active_link == 'pages')? "active": ''; ?>"><a href="<?= site_url('admin_pages') ?>">Pages</a></li>
            <li class="<?php echo ($this->template->active_link == 'cats')? "active": ''; ?>"><a href="<?= site_url('admin_cats') ?>">Categories</a></li>
            <li class="<?php echo ($this->template->active_link == 'links')? "active": ''; ?>"><a href="<?= site_url('admin_links') ?>">Links</a></li>
            <li class="<?php echo ($this->template->active_link == 'social')? "active": ''; ?>"><a href="<?= site_url('admin_social') ?>">Social</a></li>
            <li class="<?php echo ($this->template->active_link == 'comments')? "active": ''; ?>"><a href="<?= site_url('admin_comments') ?>">Comments</a></li>
            <li class="<?php echo ($this->template->active_link == 'navigation')? "active": ''; ?>"><a href="<?= site_url('admin_navigation') ?>">Navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="<?php echo ($this->template->active_link == 'themes')? "active": ''; ?>"><a href="<?= site_url('admin_themes') ?>">Themes</a></li>
            <li class="<?php echo ($this->template->active_link == 'users')? "active": ''; ?>"><a href="<?= site_url('admin_users') ?>">Users</a></li>
            <li><a href="<?= site_url() ?>" target="_blank">View Site</a></li>
          </ul>

          <p><small>Powered by <a href="http://open-blog.org">Open Blog</a></small></p>
        </div>