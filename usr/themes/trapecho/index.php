<?php
/**
 * 基于 Bootstrap 的 Typecho 主题
 * 
 * @package Trapecho Theme 
 * @author Greg Wang
 * @version 1.0.2
 * @link http://dolast.com/pages/trapecho
 */
 
 $this->need('header.php');
 ?>

<div class="row">
    <div class="span9" id="content">
        <?php while($this->next()): ?>
        <div class="post">
            <div class="page-header">
                <h1>
                    <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a> 
                    <small></small>
                </h1>
                <h6>
                    <span><?php _e('Author: '); ?><?php $this->author(); ?></span>
                    <span><?php _e('Date: '); ?><?php $this->date('F j, Y'); ?></span>
                    <span><?php _e('Category: '); ?><?php $this->category(','); ?></span>
                    <a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('No Comments', '1 Comment', '%d Comments'); ?></a>
                </h6>
            </div>
            <div class="entry-content"><?php $this->content('Read more...'); ?></div>
        </div>
        <hr class="soften" />
        <?php endwhile; ?>
        <div class="pagination">
            <?php $this->pageNav(); ?>
        </div>
    </div><!-- end #content-->
    <?php $this->need('sidebar.php'); ?>
</div>
<?php $this->need('footer.php'); ?>

