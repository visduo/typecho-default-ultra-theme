<?php
/**
 * 独立页
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
        <div class="post-content" style="margin-top: 2em">
            <?php echo parseContent($this->content); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div>
<?php $this->options->sidebarStatus == 'yes' ? $this->need('sidebar.php') : ''; ?>
<?php $this->need('footer.php'); ?>
