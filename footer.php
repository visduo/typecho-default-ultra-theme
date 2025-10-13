<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
</div>
</div>
</div>
<footer id="footer">
    <?php $this->options->footerText(); ?><br>
    Theme by <a href="https://www.duozai.cn/" target="_blank" style="color: #999;">多仔</a>
</footer>
<script src="//static-lab.6os.net/highlight/11.11.1/highlight.min.js"></script>
<script>
    hljs.highlightAll();
</script>
<?php if ($this->options->weservStatus == "yes"): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var imgs = document.querySelectorAll('.post-content img[src]');
            imgs.forEach(function(img) {
                var src = img.getAttribute('src');
                img.setAttribute('src', 'https://images.weserv.nl/?url=' + src);
            });
        });
    </script>
<?php endif; ?>

<link id="highlightTheme" rel="stylesheet" href="">
<script>
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
        const savedMode = localStorage.getItem('themeMode') || <?php echo $this->options->defaultTheme ?>;
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
</script>
<?php $this->options->analyticsCode(); ?>
</body>
</html>
