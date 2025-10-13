<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($this->allow('comment')): ?>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>
            <h3 id="response">添加新评论</h3>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                <?php if ($this->user->hasLogin()): ?>
                    <p><?php _e('登录身份: '); ?><a
                                href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a
                                href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
                    </p>
                <?php else: ?>
                    <p>
                        <label for="author" class="required"><?php _e('昵称'); ?></label>
                        <input type="text" name="author" id="author" class="text"
                               value="<?php $this->remember('author'); ?>" required/>
                    </p>
                    <p>
                        <label
                                for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>><?php _e('Email'); ?></label>
                        <input type="email" name="mail" id="mail" class="text"
                               value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                    </p>
                    <p>
                        <label
                                for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('网站'); ?></label>
                        <input type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>"
                               value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                    </p>
                <?php endif; ?>
                <p>
                    <label for="textarea" class="required">评论内容</label>
                    <textarea rows="7" cols="50" name="text" id="textarea" class="textarea" placeholder="请输入评论内容" required><?php $this->remember('text'); ?></textarea>
                </p>
                <p>
                    <button type="submit" class="submit">提交评论</button>
                </p>
            </form>
        </div>
    <?php else: ?>
        <h3>评论已关闭</h3>
    <?php endif; ?>

    <?php if ($comments->have()): ?>
        <h3><?php $this->commentsNum(_t('暂无评论'), _t('%d 条评论')); ?></h3>
        <?php
        function threadedComments($comments, $options) {
            $commentClass = '';
            if ($comments->authorId) {
                if ($comments->authorId == $comments->ownerId) {
                    $commentClass .= ' comment-by-author';
                } else {
                    $commentClass .= ' comment-by-user';
                }
            }

            $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
            ?>

            <li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
            if ($comments->levels > 0) {
                echo ' comment-child';
                $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
            } else {
                echo ' comment-parent';
            }
            $comments->alt(' comment-odd', ' comment-even');
            echo $commentClass;
            ?>">
                <div id="<?php $comments->theId(); ?>">
                    <div class="comment-author">
                        <?php $comments->gravatar('40', ''); ?>
                        <cite class="fn">
                            <?php $comments->author(); ?>
                            <?php if (strpos($commentClass, 'comment-by-author') !== false): ?>
                                <span class="author-tag">博主</span>
                            <?php endif; ?>
                        </cite>
                    </div>
                    <div class="comment-meta">
                        <?php $comments->date('Y-m-d H:i'); ?>
                        <span class="comment-reply"><?php $comments->reply(); ?></span>
                    </div>
                    <?php $comments->content(); ?>
                </div>
                <?php if ($comments->children) { ?>
                    <div class="comment-children">
                        <?php $comments->threadedComments($options); ?>
                    </div>
                <?php } ?>
            </li>
        <?php } ?>
        <?php $comments->listComments(); ?>
        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    <?php endif; ?>
</div>
