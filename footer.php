<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
</div>
</div>
</div>
<footer id="footer">
    <?php $this->options->footerText(); ?><br>
    Theme by <a href="https://www.duozai.cn/" target="_blank" style="color: #999;">多仔</a>
</footer>
<?php $this->options->analyticsCode(); ?>
<script src="//static-lab.6os.net/jquery/3.6.0/jquery.min.js"></script>
<script src="//static-lab.6os.net/highlight/11.11.1/highlight.min.js"></script>
<link id="highlightTheme" rel="stylesheet" href="">
<script src="//static-lab.6os.net/jquery-pjax/2.0.1/jquery.pjax.min.js"></script>
<script src="//static-lab.6os.net/nprogress/0.2.0/nprogress.min.js"></script>
<link rel="stylesheet" href="//static-lab.6os.net/nprogress/0.2.0/nprogress.min.css">
<link rel="stylesheet" href="//static-lab.6os.net/fancybox/3.5.7/jquery.fancybox.min.css">
<script src="//static-lab.6os.net/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="//static-lab.6os.net/jquery-lazyload/1.9.5/jquery.lazyload.min.js"></script>
<script>
    $(document).pjax('a[href^="<?php $this->options->siteUrl() ?>"]:not(a[target="_blank"], a[no-pjax])', {
        container: '#main',
        fragment: '#main',
        timeout: 3000
    }).on('pjax:send', function() {
        NProgress.start();
    }).on("submit", "form[id=search]", function (event) {
        event.preventDefault();
        $.pjax({
            url: '<?php $this->options->siteUrl(); ?>search/' + $('#search #s').val() + '/',
            container: '#main',
            fragment: '#main'
        });
        $('#search #s').val('');
    }).on("submit", "form[id=comment-form]", function (event) {
        $.pjax.submit(event, {
            container: "#main",
            fragment: "#main"
        });
    }).on('pjax:beforeReplace', function(event, contents, options) {
        const urlObj = new URL(window.location.href);
        const pathname = urlObj.pathname;

        if (pathname.endsWith('/comment')) {
            const newPath = pathname.replace(/\/comment$/, '');
            const newUrl = `${urlObj.origin}${newPath}${urlObj.search}#comments`;

            $.pjax({
                url: newUrl,
                container: '#main',
                fragment: '#main'
            });
        }
    }).on('pjax:complete', function() {
        hljs.highlightAll();

        $("img.lazyload").lazyload();

        const body = document.body;
        const themeSelect = document.getElementById('themeMode');
        const highlightLink = document.getElementById('highlightTheme');
        const highlightLightTheme = '//static-lab.6os.net/highlight/11.11.1/styles/atom-one-light.min.css';
        const highlightDarkTheme = '//static-lab.6os.net/highlight/11.11.1/styles/atom-one-dark.min.css';
        const systemThemeMedia = window.matchMedia('(prefers-color-scheme: dark)');

        let isAutoMode = false;
        function handleSystemThemeChange() {
            if (isAutoMode) {
                const newTheme = systemThemeMedia.matches ? 'dark' : 'light';
                setBodyTheme(newTheme);
            }
        }

        systemThemeMedia.addEventListener('change', handleSystemThemeChange);

        function setBodyTheme(theme) {
            body.setAttribute('theme', theme);
            highlightLink.href = theme === 'dark' ? highlightDarkTheme : highlightLightTheme;
        }

        function initTheme() {
            const savedMode = localStorage.getItem('themeMode') || '<?php echo $this->options->defaultTheme ?>';
            themeSelect.value = savedMode;

            if (savedMode === 'auto') {
                isAutoMode = true;
                const initialTheme = systemThemeMedia.matches ? 'dark' : 'light';
                setBodyTheme(initialTheme);
            } else {
                isAutoMode = false;
                setBodyTheme(savedMode);
            }
        }

        themeSelect.addEventListener('change', (e) => {
            const selectedMode = e.target.value;
            localStorage.setItem('themeMode', selectedMode);

            if (selectedMode === 'auto') {
                isAutoMode = true;
                const currentSystemTheme = systemThemeMedia.matches ? 'dark' : 'light';
                setBodyTheme(currentSystemTheme);
            } else {
                isAutoMode = false;
                setBodyTheme(selectedMode);
            }
        });

        initTheme();

        NProgress.done();
    });

    document.addEventListener('DOMContentLoaded', function() {
        $(document).trigger('pjax:complete');
    });
</script>
</body>
</html>
