<?php if ($this->session->flashdata()): ?>
            <div class="flashData">
                  <?php if($this->session->flashdata('success')): ?>
                  <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success') ?>
                  </div>
                  <?php endif ?>

                  <?php if($this->session->flashdata('error')): ?>
                  <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('error') ?>
                  </div>
                  <?php endif ?>

                  <?php if($this->session->flashdata('info')): ?>
                  <div class="alert alert-info" role="alert">
                    <?php echo $this->session->flashdata('info') ?>
                  </div>
                  <?php endif ?>

                  <?php if($this->session->flashdata('warning')): ?>
                  <div class="alert alert-warning" role="alert">
                    <?php echo $this->session->flashdata('warning') ?>
                  </div>
                  <?php endif ?>
                </div>
                <?php endif ?>

                <!-- installer directory still there? -->
                <?php if ($this->template->installer_warning): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->template->installer_warning ?>
                  </div>
                <?php endif?>
