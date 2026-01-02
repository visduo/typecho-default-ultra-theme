<?php
/**
 * default-ultra theme for Typecho
 *
 * @package default-ultra
 * @author 多仔
 * @version 2.8
 * @link https://www.duox.dev
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div class="col-sm-12 <?php if ($this->options->sidebarStatus == 'yes'): ?>col-md-8<?php endif; ?>" id="main">
    <?php while ($this->next()): ?>
        <article class="post">
            <h2 class="post-title">
                <a href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a>
            </h2>
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
            <div class="post-summary">
                <?php $this->excerpt(500, ''); ?>
            </div>
        </article>
    <?php endwhile; ?>
    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div>
<?php $this->options->sidebarStatus == 'yes' ? $this->need('sidebar.php') : ''; ?>
<?php $this->need('footer.php'); ?>
