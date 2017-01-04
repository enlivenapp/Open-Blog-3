<h2><?= lang('posts_hdr') ?></h2>

<p><a class="btn btn-default btn-sm" href="<?php echo site_url('admin_posts/add_post') ?>"><?php echo lang('index_add_new_post') ?></a></p>

<table class="table table-condensed">
    <tr>
        <th>Title</th>
        <th>Date Created</th>
        <th>Status</th>
        <th></th>
    </tr>
    <?php foreach ($posts as $post): ?>
        <tr>
        <td><?= $post->title ?></td>
        <td><?= $post->date_posted ?></td>
        <td><?= $post->status ?></td>
        <td class="text-right">
            <a href="<?= site_url('admin_posts/edit_post/' . $post->id) ?>" class="btn btn-default btn-xs"><?= lang('post_edit_btn') ?></a>
            <a href="<?= site_url('admin_posts/remove_post/' . $post->id) ?>" class="btn btn-danger btn-xs"><?= lang('post_remove_btn') ?></a>
        </td>
    </tr>
  <?php endforeach ?>
</table>
