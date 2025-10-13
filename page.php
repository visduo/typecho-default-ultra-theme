<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="col-sm-12 col-md-8" id="main" role="main">
    <article class="post">
        <h1 class="post-title"><?php $this->title() ?></h1>
        <div class="post-content" style="margin-top: 2em;">
            <?php $this->content(); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>