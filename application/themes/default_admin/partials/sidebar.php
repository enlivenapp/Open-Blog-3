        <div class="col-sm-3 col-md-2 col-xs-12 sidebar">
          <ul class="nav nav-sidebar">
            <?php foreach ($this->template->admin_nav as $nav): ?>
            <li class="<?php echo ($this->template->active_link == $nav['name'])? "active": ''; ?>"><?= $nav['link'] ?></li>
            <?php endforeach ?>
            <li><a href="<?= site_url() ?>" target="_blank">View Site</a></li>
          </ul>

          <p><small>Powered by <a href="http://open-blog.org">Open Blog</a></small></p>
        </div>