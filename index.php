<?php
/**
 * Typecho 默认主题 Ultra 版
 *
 * @package default-ultra
 * @author 多仔
 * @version 1.3
 * @link https://www.duozai.cn
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div class="col-sm-12 col-md-8" id="main">
    <?php while ($this->next()): ?>
        <article class="post">
            <h2 class="post-title">
                <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
            </h2>
            <ul class="post-meta ellipsis-1">
                <li><?php $this->date(); ?></li>
                <li>
                    <?php $this->category(','); ?>
                    <?php if ($this->tags): ?>
                    / <?php $this->tags(' & ', true, ''); ?>
                    <?php endif; ?>
                </li>
                <?php if ($this->options->showPostWordCount == "yes"): ?>
                    <li>约 <?php echo postWordCount($this); ?> 字</li>
                <?php endif; ?>
                <?php if ($this->options->showPostReadingTime == "yes"): ?>
                    <li>约 <?php echo postReadingTime($this); ?> 分钟</li>
                <?php endif; ?>
                <?php if ($this->options->showPostView == "yes"): ?>
                    <li><?php echo postView($this); ?> 阅读</li>
                <?php endif; ?>
                <li><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('暂无评论', '1 条评论', '%d 条评论'); ?></a></li>
            </ul>
            <div class="post-content ellipsis-3">
                <?php $this->excerpt(500, ''); ?>
            </div>
        </article>
    <?php endwhile; ?>
    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
