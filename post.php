<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="col-sm-12 col-md-8" id="main">
    <article class="post">
        <h1 class="post-title"><?php $this->title() ?></h1>
        <ul class="post-meta">
            <li><?php $this->date(); ?></li>
            <li>
                <?php $this->category(','); ?>
                <?php if ($this->tags): ?> / <?php $this->tags(' & ', true, ''); ?>
                <?php endif; ?>
            </li>
            <li>约 <?php postWordCount($this); ?> 字</li>
            <li><?php postView($this); ?> 阅读</li>
            <li><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('暂无评论', '1 条评论', '%d 条评论'); ?></a></li>
        </ul>
        <div class="post-content" style="margin-top: 2em;">
            <?php echo parseContent($this->content); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
