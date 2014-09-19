<?php $this->need('header.php'); ?>

<div class="row">
    <div class="span9" id="content">
        <div class="post">
            <div class="page-header">
                <h1>
                    <?php $this->title() ?>
                    <small></small>
                </h1>
                <h6>
                    <span><?php _e('Author: '); ?><?php $this->author(); ?></span>
                    <span><?php _e('Date: '); ?><?php $this->date('F j, Y'); ?></span>
                    <span><?php _e('Category: '); ?><?php $this->category(','); ?></span>
                </h6>
            </div>
            <div class="entry-content"><?php $this->content(); ?></div>
            <div class="entry-tags">
                <?php _e('Labels'); ?>: 
                <span class="label label-info">
                    <?php $this->tags('</span> <span class="label label-info">', true, 'None'); ?>
                </span>
            </div>
        </div>
        <hr class="soften" />
        <?php $this->need('comments.php'); ?>
    </div><!-- end #content-->
    <?php $this->need('sidebar.php'); ?>
</div>
<?php $this->need('footer.php'); ?>


