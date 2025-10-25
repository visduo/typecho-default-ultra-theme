<?php
/**
 * TOC区
 *
 * @author 多仔
 * @link https://www.duozai.cn
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<div class="toc-panel" style="display: none;">
    <div class="toc-control">
        <span class="toc-control-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul"
                 viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
            </svg>
        </span>
    </div>
    <div class="toc"></div>
</div>
<script>
    function initToc() {
        const DEFAULT_TOC_VISIBLE = <?php echo($this->options->tocDefaultVisibleStatus == 'yes' ? 'true' : 'false'); ?>;
        const DEFAULT_TOC_EXPANDED = <?php echo($this->options->tocDefaultExpandedStatus == 'yes' ? 'true' : 'false'); ?>;

        const tocPanel = document.querySelector('.toc-panel');
        const tocContainer = document.querySelector('.toc');
        const postContent = document.querySelector('.post-content');
        const tocControl = document.querySelector('.toc-control');

        const headings = Array.from(postContent.querySelectorAll('h1, h2, h3, h4, h5, h6'));
        if (headings.length === 0) {
            tocPanel.style.display = 'none';
            return;
        } else {
            tocPanel.style.display = 'block';
        }

        const originalLevels = headings.map(heading => parseInt(heading.tagName.replace('H', '')));
        const minLevel = Math.min(...originalLevels);
        const levelOffset = minLevel - 1;

        let tocHTML = '<ul class="toc-list">';
        let prevLevel = 1;
        const headingHasChildren = new Array(headings.length).fill(false);

        headings.forEach((heading, index) => {
            if (index < headings.length - 1) {
                const currentOriginalLevel = parseInt(heading.tagName.replace('H', ''));
                const currentLevel = currentOriginalLevel - levelOffset;
                const nextOriginalLevel = parseInt(headings[index + 1].tagName.replace('H', ''));
                const nextLevel = nextOriginalLevel - levelOffset;
                if (nextLevel > currentLevel) {
                    headingHasChildren[index] = true;
                }
            }
        });

        headings.forEach((heading, index) => {
            const headingId = `heading-${index}`;
            heading.id = headingId;
            const currentOriginalLevel = parseInt(heading.tagName.replace('H', ''));
            const currentLevel = currentOriginalLevel - levelOffset;
            const headingText = heading.textContent.trim();
            const hasChildren = headingHasChildren[index];

            if (currentLevel > prevLevel) {
                tocHTML += '<ul class="toc-sublist">';
            } else if (currentLevel < prevLevel) {
                tocHTML += '</ul>'.repeat(prevLevel - currentLevel);
            }

            const collapsedClass = hasChildren && !DEFAULT_TOC_EXPANDED ? ' collapsed' : '';
            tocHTML += `<li class="toc-item ${hasChildren ? 'has-children' : ''}${collapsedClass}" data-id="${headingId}" data-level="${currentLevel}">`;
            if (hasChildren) {
                tocHTML += '<span class="toc-toggle"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16"><path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/></svg></span>';
            }
            tocHTML += `${headingText}</li>`;

            prevLevel = currentLevel;
        });

        tocHTML += '</ul>'.repeat(prevLevel);
        tocContainer.innerHTML = tocHTML;

        tocContainer.addEventListener('click', (e) => {
            const tocItem = e.target.closest('.toc-item');
            const toggleIcon = e.target.closest('.toc-toggle');

            if (toggleIcon && tocItem) {
                tocItem.classList.toggle('collapsed');
                return;
            }

            if (tocItem) {
                const targetId = tocItem.dataset.id;
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'auto',
                        block: 'start'
                    });
                }
            }
        });

        let isTocVisible = DEFAULT_TOC_VISIBLE;
        tocContainer.classList.toggle('hidden', !isTocVisible);

        tocControl.addEventListener('click', (e) => {
            e.stopPropagation();
            isTocVisible = !isTocVisible;
            tocContainer.classList.toggle('hidden', !isTocVisible);
        });

        tocContainer.addEventListener('click', (e) => {
            e.stopPropagation();
        });

        document.addEventListener('click', (e) => {
            const isClickInsideToc = tocContainer.contains(e.target);
            const isClickOnControl = tocControl.contains(e.target);
            if (isTocVisible && !isClickInsideToc && !isClickOnControl) {
                isTocVisible = false;
                tocContainer.classList.add('hidden');
            }
        });
    }

    function highlightToc() {
        let currentId = null;
        const viewportTop = 50;

        const content = document.querySelector('.post-content');
        const headings = Array.from(content.querySelectorAll('h1, h2, h3, h4, h5, h6'));
        if (headings.length === 0) {
            return;
        }

        for (let i = 0; i < headings.length; i++) {
            const heading = headings[i];
            const rect = heading.getBoundingClientRect();

            const isTouchedTop = rect.top <= viewportTop;

            let isLastTouched = true;
            for (let j = i + 1; j < headings.length; j++) {
                const nextRect = headings[j].getBoundingClientRect();
                if (nextRect.top <= viewportTop) {
                    isLastTouched = false;
                    break;
                }
            }

            if (isTouchedTop && isLastTouched) {
                currentId = heading.id;
                break;
            }
        }

        document.querySelectorAll('.toc-item.toc-active').forEach(item => {
            item.classList.remove('toc-active');
        });
        const currentTocItem = document.querySelector(`.toc-item[data-id="${currentId}"]`);
        if (currentTocItem) {
            currentTocItem.classList.add('toc-active');

            let parentItem = currentTocItem.closest('.toc-sublist')?.previousElementSibling;
            while (parentItem && parentItem.classList.contains('toc-item')) {
                if (parentItem.classList.contains('has-children')) {
                    parentItem.classList.remove('collapsed');
                }
                parentItem = parentItem.closest('.toc-sublist')?.previousElementSibling;
            }
        }
    }
</script>
