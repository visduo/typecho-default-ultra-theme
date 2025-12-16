<?php
/**
 * 评论区
 *
 * @author 多仔
 * @link https://www.duox.dev
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($this->allow('comment')): ?>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>
            <h3 id="response">添加新评论</h3>
            <form method="post" action="<?php $this->commentUrl(); ?>" id="comment-form">
                <?php if ($this->user->hasLogin()): ?>
                    <p>登录身份: <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a></p>
                <?php else: ?>
                    <p>
                        <label for="author" class="required">昵称</label>
                        <input type="text" name="author" id="author" class="text" value="<?php $this->remember('author'); ?>" required/>
                    </p>
                    <p>
                        <label for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>>Email
                        </label>
                        <input type="email" name="mail" id="mail" class="text" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                    </p>
                    <p>
                        <label for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>>网站</label>
                        <input type="url" name="url" id="url" class="text" placeholder="https://" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                    </p>
                <?php endif; ?>
                <p>
                    <label for="textarea" class="required">评论内容</label>
                    <textarea rows="7" cols="50" name="text" id="textarea" class="textarea" placeholder="请输入评论内容" required><?php $this->remember('text'); ?></textarea>
                </p>
                <p>
                    <?php if ($this->options->pjaxStatus == 'yes'): ?>
                        <input name="_" type="hidden" value="<?php echo Helper::security()->getToken(str_replace(array('?_pjax=%23main', '&_pjax=%23main'), '', Typecho_Request::getInstance()->getRequestUrl())); ?>"/>
                    <?php endif; ?>
                    <button type="submit" class="submit">提交评论</button>
                </p>
            </form>
        </div>
    <?php if ($this->options->commentsThreaded && $this->options->pjaxStatus == 'yes'): ?>
        <script>
            (function(){window.TypechoComment={dom:function(id){return document.getElementById(id)},create:function(tag,attr){var el=document.createElement(tag);for(var key in attr){el.setAttribute(key,attr[key])}return el},reply:function(cid,coid){var comment=this.dom(cid),parent=comment.parentNode,response=this.dom('<?php $this->respondId(); ?>'),input=this.dom('comment-parent'),form='form'==response.tagName?response:response.getElementsByTagName('form')[0],textarea=response.getElementsByTagName('textarea')[0];if (null==input){input=this.create('input',{'type':'hidden','name':'parent','id':'comment-parent'});form.appendChild(input)}input.setAttribute('value',coid);if (null==this.dom('comment-form-place-holder')){var holder=this.create('div',{'id':'comment-form-place-holder'});response.parentNode.insertBefore(holder,response)}comment.appendChild(response);this.dom('cancel-comment-reply-link').style.display='';if (null!=textarea&&'text'==textarea.name){textarea.focus()}return false},cancelReply:function(){var response=this.dom('<?php $this->respondId(); ?>'),holder=this.dom('comment-form-place-holder'),input=this.dom('comment-parent');if (null!=input){input.parentNode.removeChild(input)}if (null==holder){return true}this.dom('cancel-comment-reply-link').style.display='none';holder.parentNode.insertBefore(response,holder);return false}}})();
        </script>
    <?php endif; ?>
    <?php else: ?>
        <h3>评论已关闭</h3>
    <?php endif; ?>
    <?php if ($comments->have()): ?>
        <h3><?php $this->commentsNum('暂无评论', '%d 条评论'); ?></h3>
        <?php
        function threadedComments($comments, $options) {
            $options = Helper::options();
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
                        <?php if (class_exists('ip2region_Plugin') && $options->commentAuthorIp2RegionStatus == 'yes'): ?>
                            <?php echo '评论于 '.ip2region_Plugin::get($comments->ip); ?>
                        <?php endif; ?>
                        &nbsp;&nbsp;
                        <span class="comment-reply"><?php $comments->reply(); ?></span>
                    </div>
                    <?php $comments->content(); ?>
                    <?php if ('waiting' == $comments->status): ?>
                        <br>温馨提示：您的评论需管理员审核后才能显示～
                    <?php endif; ?>
                </div>
                <?php if ($comments->children): ?>
                    <div class="comment-children">
                        <?php $comments->threadedComments($options); ?>
                    </div>
                <?php endif; ?>
            </li>
        <?php } ?>
        <?php $comments->listComments(); ?>
        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    <?php endif; ?>
</div>
