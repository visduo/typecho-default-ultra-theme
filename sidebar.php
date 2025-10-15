<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col-sm-12 col-md-4" id="secondary">
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentTags', $this->options->sidebarBlock)): ?>
        <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=0&desc=1&limit=10')->to($tags); ?>
        <section class="widget">
            <h3 class="widget-title">最新合集</h3>
            <ul class="widget-list tags-list">
                <?php while($tags->next()): ?>
                    <a href="<?php $tags->permalink(); ?>" style="margin-right:1em;line-height:1.8;display:inline-block"><?php $tags->name(); ?></a>
                <?php endwhile; ?>
            </ul>
        </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRandPosts', $this->options->sidebarBlock)): ?>
        <?php $this->widget('Widget_Post_rand@rand', 'limit=7')->to($rand); ?>
        <section class="widget">
            <h3 class="widget-title">随机推荐</h3>
            <ul class="widget-list">
                <?php while($rand->next()): ?>
                    <li><a href="<?php $rand->permalink(); ?>"><?php $rand->title(); ?></a></li>
                <?php endwhile; ?>
            </ul>
        </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRandPosts', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="widget-title">近期文章</h3>
            <ul class="widget-list">
                <?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
            </ul>
        </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="widget-title">近期评论</h3>
            <ul class="widget-list">
                <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
                <?php while($comments->next()): ?>
                    <li>
                        <a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="widget-title">文章分类</h3>
            <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
        </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="widget-title">文章归档</h3>
            <ul class="widget-list">
                <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
            </ul>
        </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowStatistics', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="widget-title">数据统计</h3>
            <ul class="widget-list">
                <li>分类总数：<?php echo categoryTotalCount(); ?>&nbsp;&nbsp;/&nbsp;&nbsp;合集总数：<?php echo tagTotalCount(); ?></li>
                <li>文章总数：<?php echo postTotalCount(); ?>&nbsp;&nbsp;/&nbsp;&nbsp;阅读总数：<?php echo postViewTotalCount(); ?></li>
                <li>评论总数：<?php echo commentTotalCount(); ?></li>
            </ul>
        </section>
    <?php endif; ?>
</div>
