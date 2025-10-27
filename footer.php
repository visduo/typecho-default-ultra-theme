<?php
/**
 * 底栏区
 *
 * @author 多仔
 * @link https://www.duozai.cn
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
</div></div></div>
<div class="minitool-group">
    <?php if ($this->options->tocMinitoolStatus == 'yes'): ?>
        <button class="vertical-btn toc-minitool">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
            </svg>
        </button>
    <?php endif; ?>
    <?php if ($this->options->themeModeSelectStatus == 'yes' && $this->options->themeModeMinitoolStatus == 'yes'): ?>
        <button class="vertical-btn themeMode-minitool">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun" viewBox="0 0 16 16">
                <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars" viewBox="0 0 16 16">
                <path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278M4.858 1.311A7.27 7.27 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.32 7.32 0 0 0 5.205-2.162q-.506.063-1.029.063c-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286"/>
                <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.73 1.73 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.73 1.73 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.73 1.73 0 0 0 1.097-1.097zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z"/>
            </svg>
        </button>
    <?php endif; ?>
    <?php if ($this->options->topMinitoolStatus == 'yes'): ?>
        <button class="vertical-btn top-minitool">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-bar-up" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M3.646 11.854a.5.5 0 0 0 .708 0L8 8.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708M2.4 5.2c0 .22.18.4.4.4h10.4a.4.4 0 0 0 0-.8H2.8a.4.4 0 0 0-.4.4"/>
            </svg>
        </button>
    <?php endif; ?>
</div>
<?php if ($this->options->tocMinitoolStatus == 'yes'): ?>
    <div class="toc-panel">
        <div class="toc-header">
            <h3>目录</h3>
            <button class="toc-close">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                </svg>
            </button>
        </div>
        <div class="toc-container"></div>
    </div>
    <div class="toc-overlay"></div>
<?php endif; ?>
<footer id="footer">
    <?php $this->options->footerText(); ?><br>
    Theme by <a href="https://www.duozai.cn/" target="_blank" style="color: #999">多仔</a>
</footer>
<?php $this->options->analyticsCode(); ?>
<script src="//static-lab.6os.net/jquery/3.6.0/jquery.min.js"></script>
<script src="//static-lab.6os.net/highlight/11.11.1/highlight.min.js"></script>
<link id="highlightThemeCss" rel="stylesheet" href="">
<?php if ($this->options->pjaxStatus == 'yes'): ?>
    <script src="//static-lab.6os.net/jquery-pjax/2.0.1/jquery.pjax.min.js"></script>
    <script src="//static-lab.6os.net/nprogress/0.2.0/nprogress.min.js"></script>
    <link rel="stylesheet" href="//static-lab.6os.net/nprogress/0.2.0/nprogress.min.css">
<?php endif; ?>
<?php if ($this->options->imageLightBoxStatus == 'yes'): ?>
    <link rel="stylesheet" href="//static-lab.6os.net/fancybox/3.5.7/jquery.fancybox.min.css">
    <script src="//static-lab.6os.net/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<?php endif; ?>
<?php if ($this->options->imageLazyloadStatus == 'yes'): ?>
    <script src="//static-lab.6os.net/jquery-lazyload/1.9.5/jquery.lazyload.min.js"></script>
<?php endif; ?>
<!-- 主题模式切换 -->
<script>
    const $body = $('body');
    const $themeModeSelect = $('#themeMode');
    const $highlightThemeCss = $('#highlightThemeCss');
    const highlightLightThemeCss = '//static-lab.6os.net/highlight/11.11.1/styles/atom-one-light.min.css';
    const highlightDarkThemeCss = '//static-lab.6os.net/highlight/11.11.1/styles/atom-one-dark.min.css';
    const systemThemeModeMedia = window.matchMedia('(prefers-color-scheme: dark)');

    // 是否开启自动模式切换
    let isAutoThemeMode = false;

    // 系统主题模式切换
    systemThemeModeMedia.addEventListener('change', function () {
        if (isAutoThemeMode) {
            const newThemeMode = systemThemeModeMedia.matches ? 'dark' : 'light';
            setBodyThemeMode(newThemeMode);
        }
    });

    // 设置主题模式
    function setBodyThemeMode(themeMode) {
        $body.attr('theme-mode', themeMode);
        $highlightThemeCss.attr('href', themeMode === 'dark' ? highlightDarkThemeCss : highlightLightThemeCss);
    }

    // 初始化主题模式
    function initThemeMode() {
        const savedThemeMode = localStorage.getItem('theme-mode') || '<?php echo $this->options->defaultThemeMode ?>';
        $themeModeSelect.val(savedThemeMode);

        if (savedThemeMode === 'auto') {
            isAutoThemeMode = true;
            const initialThemeMode = systemThemeModeMedia.matches ? 'dark' : 'light';
            setBodyThemeMode(initialThemeMode);
        } else {
            isAutoThemeMode = false;
            setBodyThemeMode(savedThemeMode);
        }
    }

    // 切换主题模式
    $themeModeSelect.change(function(e) {
        const selectedThemeMode = e.target.value;
        localStorage.setItem('theme-mode', selectedThemeMode);

        if (selectedThemeMode === 'auto') {
            isAutoThemeMode = true;
            const currentSystemThemeMode = systemThemeModeMedia.matches ? 'dark' : 'light';
            setBodyThemeMode(currentSystemThemeMode);
        } else {
            isAutoThemeMode = false;
            setBodyThemeMode(selectedThemeMode);
        }
    });

    // 初始化主题模式
    initThemeMode();

    <?php if ($this->options->themeModeMinitoolStatus == 'yes'): ?>
    // 主题模式切换
    $('.themeMode-minitool').click(function () {
        const bodyThemeMode = $body.attr('theme-mode');
        if (bodyThemeMode === 'dark') {
            $themeModeSelect.val('light').trigger('change');
        } else {
            $themeModeSelect.val('dark').trigger('change');
        }
    })
    <?php endif; ?>
</script>
<?php if ($this->options->tocMinitoolStatus == 'yes'): ?>
    <!-- TOC -->
    <script>
        // 初始化TOC目录
        function initToc() {
            const DEFAULT_TOC_VISIBLE = <?php echo($this->options->tocDefaultVisibleStatus == 'yes' ? 'true' : 'false'); ?>;
            const DEFAULT_TOC_EXPANDED = <?php echo($this->options->tocDefaultExpandedStatus == 'yes' ? 'true' : 'false'); ?>;

            const $tocMinitool = $('.toc-minitool');
            const $tocPanel = $('.toc-panel');
            const $tocContainer = $('.toc-container');
            const $tocOverlay = $('.toc-overlay');
            const $postContent = $('.post-content');

            $tocContainer.html('');

            // 文章内容不存在
            if ($postContent.length === 0) {
                $tocMinitool.hide();
                $tocPanel.removeClass('active');
                $tocOverlay.removeClass('active');
                return;
            }

            // 获取文章中所有标题元素
            const $headings = $postContent.find('h1, h2, h3, h4, h5, h6');
            // 若无标题则隐藏目录工具
            if ($headings.length === 0) {
                $tocMinitool.hide();
                $tocPanel.removeClass('active');
                $tocOverlay.removeClass('active');
                return;
            } else {
                $tocMinitool.show();
            }

            // 处理标题级别
            const originalLevels = $headings.map(function() {
                return parseInt($(this).prop('tagName').replace('H', ''));
            }).get();
            const minLevel = Math.min(...originalLevels);
            const levelOffset = minLevel - 1;

            // 生成TOC列表HTML
            let tocHTML = '<ul class="toc-list">';
            let prevLevel = 1;
            const headingHasChildren = new Array($headings.length).fill(false);

            // 标记有子级的标题
            $headings.each(function(index) {
                if (index < $headings.length - 1) {
                    const currentLevel = parseInt($(this).prop('tagName').replace('H', '')) - levelOffset;
                    const nextLevel = parseInt($headings.eq(index + 1).prop('tagName').replace('H', '')) - levelOffset;
                    if (nextLevel > currentLevel) {
                        headingHasChildren[index] = true;
                    }
                }
            });

            // 遍历标题生成目录项
            $headings.each(function(index) {
                const headingId = `heading-${index}`;
                $(this).attr('id', headingId); // 给标题添加唯一ID用于锚点跳转
                const currentLevel = parseInt($(this).prop('tagName').replace('H', '')) - levelOffset;
                const headingText = $(this).text().trim();
                const hasChildren = headingHasChildren[index];

                // 处理层级嵌套
                if (currentLevel > prevLevel) {
                    tocHTML += '<ul class="toc-sublist">';
                } else if (currentLevel < prevLevel) {
                    tocHTML += '</ul>'.repeat(prevLevel - currentLevel);
                }

                // 生成目录项HTML
                const collapsedClass = hasChildren && !DEFAULT_TOC_EXPANDED ? ' collapsed' : '';
                tocHTML += `<li class="toc-item ${hasChildren ? 'has-children' : ''}${collapsedClass}" data-id="${headingId}" data-level="${currentLevel}">`;
                if (hasChildren) {
                    tocHTML += '<span class="toc-toggle"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16"><path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/></svg></span>';
                }
                tocHTML += `${headingText}</li>`;

                prevLevel = currentLevel;
            });

            // 闭合剩余的列表标签
            tocHTML += '</ul>'.repeat(prevLevel);
            $tocContainer.html(tocHTML);

            // 绑定目录点击事件
            $tocContainer.off('click');
            $tocContainer.on('click', function(e) {
                const $tocItem = $(e.target).closest('.toc-item');
                const $toggleIcon = $(e.target).closest('.toc-toggle');

                // 处理展开/折叠按钮
                if ($toggleIcon.length && $tocItem.length) {
                    $tocItem.toggleClass('collapsed');
                    return;
                }

                // 处理目录项点击
                if ($tocItem.length) {
                    const targetId = $tocItem.data('id');
                    const $targetElement = $(`#${targetId}`);
                    if ($targetElement.length) {
                        $targetElement[0].scrollIntoView({
                            behavior: 'auto',
                            block: 'start'
                        });
                    }
                }
            });

            // 设置TOC初始可见状态
            if(DEFAULT_TOC_VISIBLE) {
                $tocMinitool.click();
            }

            // 阻止事件冒泡
            $tocContainer.on('click', function(e) {
                e.stopPropagation();
            });
        }

        // TOC目录高亮
        function highlightToc() {
            let currentId = null;
            const viewportTop = 50; // 视口顶部偏移量

            const $postContent = $('.post-content');
            const $headings = $postContent.find('h1, h2, h3, h4, h5, h6');
            if ($headings.length === 0) {
                return;
            }

            // 文章内容超出视口，取消高亮
            const postContentRect = $postContent[0].getBoundingClientRect();
            const isPostContentOutOfView = (
                postContentRect.bottom < 0 ||
                postContentRect.top > window.innerHeight
            );

            if (isPostContentOutOfView) {
                $('.toc-item.toc-active').removeClass('toc-active');
                return;
            }

            // 找到当前视口内最顶部的标题
            for (let i = 0; i < $headings.length; i++) {
                const $heading = $headings.eq(i);
                const rect = $heading[0].getBoundingClientRect();
                const isTouchedTop = rect.top <= viewportTop;

                // 检查是否为最后一个可见标题
                let isLastTouched = true;
                for (let j = i + 1; j < $headings.length; j++) {
                    const nextRect = $headings.eq(j)[0].getBoundingClientRect();
                    if (nextRect.top <= viewportTop) {
                        isLastTouched = false;
                        break;
                    }
                }

                if (isTouchedTop && isLastTouched) {
                    currentId = $heading.attr('id');
                    break;
                }
            }

            // 更新高亮状态
            $('.toc-item.toc-active').removeClass('toc-active');
            const $currentTocItem = $(`.toc-item[data-id="${currentId}"]`);
            if ($currentTocItem.length) {
                $currentTocItem.addClass('toc-active');

                // 自动展开父级目录
                let $parentItem = $currentTocItem.closest('.toc-sublist')?.prev();
                while ($parentItem && $parentItem.hasClass('toc-item')) {
                    if ($parentItem.hasClass('has-children')) {
                        $parentItem.removeClass('collapsed');
                    }
                    $parentItem = $parentItem.closest('.toc-sublist')?.prev();
                }
            }
        }

        // 打开/关闭TOC
        function toggleToc() {
            $('.toc-panel').toggleClass('active');
            $('.toc-overlay').toggleClass('active');
        }

        $('.toc-minitool').click(toggleToc)
        $('.toc-close').click(toggleToc);
        $('.toc-overlay').click(toggleToc);
    </script>
<?php endif; ?>
<!-- 初始化 -->
<script>
    // 初始化main容器
    function initMain() {
        // 代码高亮
        hljs.highlightAll();

        <?php if ($this->options->imageLazyloadStatus == 'yes'): ?>
        // 图片懒加载
        $('img.lazyload').lazyload();
        <?php endif; ?>

        <?php if ($this->options->tocMinitoolStatus == 'yes'): ?>
        // 初始化TOC目录
        initToc();

        // 移除原生事件监听
        $(window).off('scroll', highlightToc);
        $(window).off('resize', highlightToc);

        // 当元素存在时，绑定事件
        if ($('.toc-minitool').length && $('.post-content').length) {
            $(window).on('scroll', { passive: true }, highlightToc);
            $(window).on('resize', { passive: true }, highlightToc);
        }
        <?php endif; ?>
    }

    <?php if ($this->options->pjaxStatus == 'yes'): ?>
    // PJAX实现
    $(document).pjax('a[href^="<?php $this->options->siteUrl() ?>"]:not(a[target="_blank"], a[no-pjax])', {
        container: '#main',
        fragment: '#main',
        timeout: 7000
    }).on('pjax:send', function() {
        // 显示进度条
        NProgress.start();
    }).on('submit', 'form[id=search]', function(event) {
        // 搜索表单提交，替换为PJAX跳转到搜索结果页
        event.preventDefault();
        const searchKeywords = $('#search #s');
        $.pjax({
            url: '<?php echo $this->options->siteUrl.($this->options->rewrite == 0 ? 'index.php/' : ''); ?>search/' + searchKeywords.val() + '/',
            container: '#main',
            fragment: '#main'
        });
        searchKeywords.val('');
    }).on('submit', 'form[id=comment-form]', function(event) {
        // 评论表单提交，替换为PJAX提交
        event.preventDefault();
        $.pjax.submit(event, {
            container: '#main',
            fragment: '#main'
        });
    }).on('pjax:beforeReplace', function(event) {
        if (event.state.url.endsWith('/comment')) {
            // 评论提交后，替换为PJAX跳转到评论页
            $.pjax({
                url: /#(comments|comment-\d+)$/.test(event.previousState.url) ? event.previousState.url : event.previousState.url + '#comments',
                container: '#main',
                fragment: '#main'
            });
        }
    }).on('submit', 'form[class=protected]', function(event) {
        // 加密文章密码表单提交，替换为PJAX提交
        event.preventDefault();
        $.pjax.submit(event, {
            container: '#main',
            fragment: '#main'
        });
    }).on('pjax:complete', function(event, data, status, xhr, options) {
        if (event.relatedTarget) {
            if (event.relatedTarget.tagName === 'FORM' && event.relatedTarget.id === 'comment-form') {
                // 如果PJAX来源是评论表单，则显示提示信息
                let message = (data.responseText.match(/<div class="container">\s*([\s\S]*?)\s*<\/div>/i) || [, ''])[1].trim();
                if (message) {
                    alert(message);
                    $.pjax({
                        url: xhr.url.replace(/\/comment$/, '/#comments'),
                        container: '#main',
                        fragment: '#main'
                    });
                }
            } else if (event.relatedTarget.tagName === 'FORM' && event.relatedTarget.classList.contains('protected')) {
                // 如果PJAX来源是加密文章密码表单，则显示提示信息
                let message = (data.responseText.match(/<div class="container">\s*([\s\S]*?)\s*<\/div>/i) || [, ''])[1].trim();
                if (message) {
                    alert(message);
                }
            }
        }

        // PJAX完成，初始化main容器
        initMain();
    }).on('pjax:end', function() {
        // 隐藏进度条
        NProgress.done();
    });

    $(function() {
        // 页面加载完成（直接访问），触发PJAX完成事件
        $(document).trigger('pjax:complete');
    });

    $(window).on('popstate', function() {
        // 历史记录状态发生变化时（前进后退），触发PJAX完成事件
        $(document).trigger('pjax:complete');
    });

    $(document).on('pjax:error', function(e) {
        // PJAX错误，直接跳转
        window.location.href = e.triggerElement.href;
    });
    <?php else: ?>
    // 非PJAX，直接初始化main容器
    initMain();
    <?php endif; ?>
</script>
<?php if ($this->options->topMinitoolStatus == 'yes'): ?>
    <!-- 返回顶部 -->
    <script>
        $('.top-minitool').click(function () {
            // 滚动到顶部
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        $(window).on('scroll', function() {
            // 判断滚动距离是否超过300px
            if ($(window).scrollTop() > 300) {
                $('.top-minitool').css('opacity', '1');
            } else {
                $('.top-minitool').css('opacity', '0');
            }
        });

        $(window).on('load', function() {
            $(window).trigger('scroll');
        });
    </script>
<?php endif; ?>
</body>
</html>
