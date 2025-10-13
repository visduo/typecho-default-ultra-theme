<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
        </div>
    </div>
</div>
<footer id="footer">
    <?php $this->options->footerText(); ?><br>
    Theme by <a href="https://www.duozai.cn/" target="_blank" style="color: #999;">多仔</a>
</footer>
<link rel="stylesheet" href="//static-lab.6os.net/highlight/11.11.1/styles/atom-one-light.min.css">
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
<?php $this->options->analyticsCode(); ?>
</body>
</html>
