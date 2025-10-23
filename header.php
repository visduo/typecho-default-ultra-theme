<?php
/**
 * 导航区
 *
 * @author 多仔
 * @link https://www.duozai.cn
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php $this->archiveTitle([
                'category' => '分类 %s 下的文章',
                'search'   => '包含关键字 %s 的文章',
                'tag'      => '合集 %s 下的文章',
                'author'   => '%s 发布的文章'
        ], '', ' - '); ?><?php $this->options->title(); ?></title>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/normalize.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/grid.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.min.css'); ?>">
    <?php if($this->options->faviconUrl):  ?>
        <link rel="shortcut icon" href="<?php $this->options->faviconUrl(); ?>" type="image/x-icon" />
    <?php else: ?>
        <link rel="shortcut icon" href="<?php $this->options->themeUrl('images/favicon.ico'); ?>" type="image/x-icon" />
    <?php endif ?>
    <?php if ($this->options->sidebarStatus != 'yes'): ?>
        <style>
            .container-md {
                max-width: 850px;
            }
        </style>
    <?php endif; ?>
    <?php $this->header(); ?>
</head>
<body theme-mode="">
<header id="header" class="clearfix">
    <div class="container-md">
        <div class="row">
            <div class="site-name col-md-6 col-sm-12">
                <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>
                <p class="description"><?php $this->options->description(); ?></p>
            </div>
            <div class="site-helper col-md-6 col-sm-12">
                <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>">
                    <input type="text" id="s" name="s" class="text" placeholder="请输入关键字搜索"/>
                    <button type="submit" class="submit">搜索</button>
                </form>
                <div id="themeMode-selector" style="<?php if ($this->options->themeModeSelectStatus != 'yes'): ?>display: none<?php endif; ?>">
                    <select id="themeMode">
                        <option value="auto">跟随系统</option>
                        <option value="light">亮色模式</option>
                        <option value="dark">深色模式</option>
                    </select>
                </div>
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
