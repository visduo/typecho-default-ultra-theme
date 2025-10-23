<?php
/**
 * 底栏区
 *
 * @author 多仔
 * @link https://www.duozai.cn
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
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
<script>
<?php if ($this->options->pjaxStatus == 'yes'): ?>
    $(document).pjax('a[href^="<?php $this->options->siteUrl() ?>"]:not(a[target="_blank"], a[no-pjax])', {
        container: '#main',
        fragment: '#main',
        timeout: 3000
    }).on('pjax:send', function() {
        NProgress.start();
    }).on('submit', 'form[id=search]', function (event) {
        event.preventDefault();
        $.pjax({
            url: '<?php echo $this->options->siteUrl.($this->options->rewrite == 0 ? 'index.php/' : ''); ?>search/' + $('#search #s').val() + '/',
            container: '#main',
            fragment: '#main'
        });
        $('#search #s').val('');
    }).on('submit', 'form[id=comment-form]', function (event) {
        event.preventDefault();
        $.pjax.submit(event, {
            container: '#main',
            fragment: '#main'
        });
    }).on('pjax:beforeReplace', function(event) {
        if (event.state.url.endsWith('/comment')) {
            $.pjax({
                url: /#(comments|comment-\d+)$/.test(event.previousState.url) ? event.previousState.url : event.previousState.url + '#comments',
                container: '#main',
                fragment: '#main'
            });
        }
    }).on('submit', 'form[class=protected]', function (event) {
        event.preventDefault();
        $.pjax.submit(event, {
            container: '#main',
            fragment: '#main'
        });
    }).on('pjax:complete', function(event, data, status, xhr, options) {
        if(event.relatedTarget) {
            if(event.relatedTarget.tagName === 'FORM' && event.relatedTarget.id === 'comment-form') {
                let message = (data.responseText.match(/<div class="container">\s*([\s\S]*?)\s*<\/div>/i) || [, ''])[1].trim();
                if(message) {
                    alert(message);
                    $.pjax({
                        url: xhr.url.replace(/\/comment$/, '/#comments'),
                        container: '#main',
                        fragment: '#main'
                    });
                }
            } else if(event.relatedTarget.tagName === 'FORM' && event.relatedTarget.classList.contains('protected')) {
                let message = (data.responseText.match(/<div class="container">\s*([\s\S]*?)\s*<\/div>/i) || [, ''])[1].trim();
                if(message) {
                    alert(message);
                }
            }
        }

        hljs.highlightAll();

        <?php if ($this->options->imageLazyloadStatus == 'yes'): ?>
            $('img.lazyload').lazyload();
        <?php endif; ?>

        NProgress.done();
    });

    document.addEventListener('DOMContentLoaded', function() {
        $(document).trigger('pjax:complete');
    });
    <?php else: ?>
        hljs.highlightAll();

        <?php if ($this->options->imageLazyloadStatus == 'yes'): ?>
            $('img.lazyload').lazyload();
        <?php endif; ?>
<?php endif; ?>

const body = document.body;
const themeModeSelect = document.getElementById('themeMode');
const highlightThemeCss = document.getElementById('highlightThemeCss');
const highlightLightThemeCss = '//static-lab.6os.net/highlight/11.11.1/styles/atom-one-light.min.css';
const highlightDarkThemeCss = '//static-lab.6os.net/highlight/11.11.1/styles/atom-one-dark.min.css';
const systemThemeModeMedia = window.matchMedia('(prefers-color-scheme: dark)');

let isAutoThemeMode = false;
function handleSystemThemeModeChange() {
    if (isAutoThemeMode) {
        const newThemeMode = systemThemeModeMedia.matches ? 'dark' : 'light';
        setBodyThemeMode(newThemeMode);
    }
}

systemThemeModeMedia.addEventListener('change', handleSystemThemeModeChange);

function setBodyThemeMode(themeMode) {
    body.setAttribute('theme-mode', themeMode);
    highlightThemeCss.href = themeMode === 'dark' ? highlightDarkThemeCss : highlightLightThemeCss;
}

function initThemeMode() {
    const savedThemeMode = localStorage.getItem('theme-mode') || '<?php echo $this->options->defaultThemeMode ?>';
    themeModeSelect.value = savedThemeMode;

    if (savedThemeMode === 'auto') {
        isAutoThemeMode = true;
        const initialThemeMode = systemThemeModeMedia.matches ? 'dark' : 'light';
        setBodyThemeMode(initialThemeMode);
    } else {
        isAutoThemeMode = false;
        setBodyThemeMode(savedThemeMode);
    }
}

themeModeSelect.addEventListener('change', (e) => {
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

initThemeMode();
</script>
</body>
</html>
