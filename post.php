<?php
/**
 * 文章页
 *
 * @author 多仔
 * @link https://www.duox.dev
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div class="col-sm-12 <?php if ($this->options->sidebarStatus == 'yes'): ?>col-md-8<?php endif; ?>" id="main">
    <article class="post">
        <h1 class="post-title"><?php $this->title(); ?></h1>
        <ul class="post-meta">
            <li><?php $this->date(); ?></li>
            <li class="post-meta-separator">/</li>
            <li>
                <?php $this->category(','); ?>
                <?php if ($this->tags): ?>
                    & <?php $this->tags(' & ', true, ''); ?>
                <?php endif; ?>
            </li>
            <li class="post-meta-separator">/</li>
            <li style="<?php if ($this->options->postViewVisibleStatus != 'yes'): ?>display: none;<?php endif; ?>"><?php echo postView($this); ?> 阅读</li>
            <li class="post-meta-separator" style="<?php if ($this->options->postViewVisibleStatus != 'yes'): ?>display: none;<?php endif; ?>">/</li>
            <li><a href="<?php $this->permalink(); ?>#comments"><?php $this->commentsNum('暂无评论', '%d 条评论'); ?></a></li>
            <li class="post-meta-separator">/</li>
            <?php if ($this->options->postWordCountVisibleStatus == 'yes'): ?>
                <li>全文约 <?php echo postWordCount($this); ?> 字</li>
                <li class="post-meta-separator">/</li>
            <?php endif; ?>
            <?php if ($this->options->postReadingTimeVisibleStatus == 'yes'): ?>
                <li>阅读预计需要 <?php echo postReadingTime($this); ?> 分钟</li>
            <?php endif; ?>
        </ul>
        <div class="post-content" style="margin-top: 2em">
            <?php echo parseContent($this->content); ?>
        </div>
        <?php if ($this->options->statementStatus == 'yes'): ?>
            <div class="post-statement">
                <?php $this->options->statementText(); ?><br>
                如若转载，请注明出处：<?php $this->permalink() ?>
            </div>
        <?php endif; ?>
        <ul class="post-near">
            <li>上一篇：<?php $this->thePrev('%s', '没有了'); ?></li>
            <li>下一篇：<?php $this->theNext('%s', '没有了'); ?></li>
        </ul>
    </article>
    <?php $this->need('comments.php'); ?>
</div>
<?php $this->options->sidebarStatus == 'yes' ? $this->need('sidebar.php') : ''; ?>
<?php $this->need('footer.php'); ?>
