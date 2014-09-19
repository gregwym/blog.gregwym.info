<div id="comments">
            <?php $this->comments()->to($comments); ?>
            <?php if ($comments->have()): ?>
            <h3><?php $this->commentsNum(_t('No comments yet...'), _t('One comments'), _t('%d comments')); ?> &raquo;</h3>
            
            <?php $comments->listComments(); ?>
            
            <div class="pagination">
                <?php $comments->pageNav(); ?>
            </div>
            
            <?php endif; ?>
            
            <?php if($this->allow('comment')): ?>
            <div id="<?php $this->respondId(); ?>" class="respond">
            
            <div class="cancel-comment-reply">
            <?php $comments->cancelReply(); ?>
            </div>
            
            <form class="form-horizontal" method="post" action="<?php $this->commentUrl() ?>" id="comment_form">
                <fieldset>
                    <legend><?php _e('Add new comment'); ?> &raquo;</legend>
                    <?php if($this->user->hasLogin()): ?>
                    <div class="control-group">
                        Logged in as <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. 
                        <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('Logout'); ?> &raquo;</a>
                    </div>
                    <?php else: ?>
                    <div class="control-group">
                        <label class="control-label" for="author"><?php _e('Nick name'); ?></label>
                        <div class="controls">
                            <input type="text" name="author" id="author" class="input-large" value="<?php $this->remember('author'); ?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="mail"><?php _e('E-mail'); ?><?php if ($this->options->commentsRequireMail): ?><span class="required">*</span><?php endif; ?></label>
                        <div class="controls">
                            <input type="text" name="mail" id="mail" class="input-large" value="<?php $this->remember('mail'); ?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="url"><?php _e('Web'); ?><?php if ($this->options->commentsRequireURL): ?><span class="required">*</span><?php endif; ?></label>
                        <div class="controls">
                            <input type="text" name="url" id="url" class="input-large" value="<?php $this->remember('url'); ?>" />
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="control-group">
                        <label class="control-label" for="url">Comment</label>
                        <div class="controls">
                            <textarea class="input-xlarge" name="text" rows="3"></textarea>
                            <p class="help-block">Enter your comment here...</p>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="url">Captcha</label>
                        <div class="controls">
                            <?php Captcha_Plugin::output(); ?>
							<?php // FancyCaptcha_Plugin::output(); ?>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary"><?php _e('Submit comment'); ?></button>
                    </div>
                </fieldset>
            </form>
            </div>
            <?php else: ?>
            <h4><?php _e('Comment closed'); ?></h4>
            <?php endif; ?>


        </div>