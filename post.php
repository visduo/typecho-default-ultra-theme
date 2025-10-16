<?php
/**
 * 文章页
 *
 * @author 多仔
 * @link https://www.duozai.cn
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div class="col-sm-12 col-md-8" id="main">
    <article class="post">
        <h1 class="post-title"><?php $this->title() ?></h1>
        <ul class="post-meta">
            <li><?php $this->date(); ?></li>
            <li>
                <?php $this->category(','); ?>
                <?php if ($this->tags): ?>
                    / <?php $this->tags(' & ', true, ''); ?>
                <?php endif; ?>
            </li>
            <?php if ($this->options->showPostView == 'yes'): ?>
                <li><?php echo postView($this); ?> 阅读</li>
            <?php endif; ?>
            <li><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('暂无评论', '%d 条评论'); ?></a></li>
            <?php if ($this->options->showPostWordCount == 'yes'): ?>
                <li>全文约 <?php echo postWordCount($this); ?> 字</li>
            <?php endif; ?>
            <?php if ($this->options->showPostReadingTime == 'yes'): ?>
                <li>阅读预计需要 <?php echo postReadingTime($this); ?> 分钟</li>
            <?php endif; ?>
        </ul>
        <div class="post-content" style="margin-top: 2em;">
            <?php echo parseContent($this->content); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
