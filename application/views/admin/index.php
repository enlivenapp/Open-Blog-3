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
                <h1 class="panel-title text-center"><?= $new_notices_count ?></h1>
            </div>
            <div class="panel-body text-center">                        
                <strong>Unread Notifications</strong>
            </div>
        </div>  
    </div>
</div>





<!-- last OB News -->
<div class="row">
    <div class="colxs-12">
        <h2>Open Blog News</h2>
        <pre>
            <?php print_r($news) ?>
        </pre>
    </div>
</div>