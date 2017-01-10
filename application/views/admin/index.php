<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-6"> 
        <div class="panel status panel-success">
            <div class="panel-heading">
                <h1 class="panel-title text-center"><?= $post_count ?></h1>
            </div>
            <div class="panel-body text-center">                        
                <strong>Published Posts</strong>
            </div>
        </div>          
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6"> 
        <div class="panel status panel-success">
            <div class="panel-heading">
                <h1 class="panel-title text-center"><?= $active_comments_count ?></h1>
            </div>
            <div class="panel-body text-center">                        
                <strong>Active Comments</strong>
            </div>
        </div>  
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6"> 
        <div class="panel status panel-danger">
            <div class="panel-heading">
                <h1 class="panel-title text-center"><?= $modded_comments_count ?></h1>
            </div>
            <div class="panel-body text-center">                        
                <strong>Comments Awaiting Moderation</strong>
            </div>
        </div>  
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6"> 
        <div class="panel status panel-warning">
            <div class="panel-heading">
                <h1 class="panel-title text-center"><?= $notification_count ?></h1>
            </div>
            <div class="panel-body text-center">                        
                <strong>Subscriptions to New Content</strong>
            </div>
        </div>  
    </div>
</div>





<!-- last OB News -->
<div class="row">
    <div class="colxs-12">
        <h2>Open Blog News</h2>
        <?php if ($news): ?>
            <?php foreach ($news as $item): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= $item->title ?> <span class="pull-right"><?= $item->date_posted ?></span></h3>
                </div>
                <div class="panel-body">
                    <?= $item->excerpt ?> <br><span class="pull-right"><a href="http://open-blog.org" target="_blank">Visit the Open Blog Website for more Help and News.</a></span>
                </div>
            </div>
            <?php endforeach ?>

        <?php else: ?>
        <h3 class="text-center">No News Found</h3>
        <?php endif ?>
    </div>
</div>