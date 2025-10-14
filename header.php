<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle([
                'category' => _t('分类 %s 下的文章'),
                'search'   => _t('包含关键字 %s 的文章'),
                'tag'      => _t('标签 %s 下的文章'),
                'author'   => _t('%s 发布的文章')
        ], '', ' - '); ?><?php $this->options->title(); ?></title>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/normalize.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/grid.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.min.css'); ?>">
    <?php if($this->options->faviconUrl):  ?>
        <link rel="shortcut icon" href="<?php $this->options->faviconUrl(); ?>" type="image/x-icon" />
    <?php else: ?>
        <link rel="shortcut icon" href="<?php $this->options->themeUrl('images/favicon.ico'); ?>" type="image/x-icon" />
    <?php endif ?>
</head>
<body theme="">
<header id="header" class="clearfix">
    <div class="container-md">
        <div class="row">
            <div class="site-name col-md-6 col-sm-12">
                <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>
                <p class="description"><?php $this->options->description(); ?></p>
            </div>
            <div class="site-helper col-md-6 col-sm-12">
                <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>">
                    <label for="s" class="sr-only">搜索关键字</label>
                    <input type="text" id="s" name="s" class="text" placeholder="请输入关键字搜索"/>
                    <button type="submit" class="submit">搜索</button>
                </form>
                <div id="theme-selector" style="<?php if ($this->options->themeChangeStatus != "yes"): ?>display: none;<?php endif; ?>">
                    <select id="themeMode">
                        <option value="auto">跟随系统</option>
                        <option value="light">亮色模式</option>
                        <option value="dark">深色模式</option>
                    </select>
                </div>
            </div>
            <div class="site-search col-md-3 col-sm-12">

            </div>
            <div class="col-md-12">
                <nav id="nav-menu" class="clearfix">
                    <a href="<?php $this->options->siteUrl(); ?>">首页</a>
                    <?php if (!empty($this->options->menuBlock) && in_array('ShowCategory', $this->options->menuBlock)): ?>
                        <?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
                        <?php while ($categories->next()): ?>
                            <a href="<?php $categories->permalink(); ?>"><?php $categories->name(); ?></a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php if (!empty($this->options->menuBlock) && in_array('ShowPage', $this->options->menuBlock)): ?>
                        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                        <?php while ($pages->next()): ?>
                            <a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
    </div>
</header>
<div id="body">
    <div class="container-md">
        <div class="row">
