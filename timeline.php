<?php
/**
 * 时间轴
 *
 * @package custom
 * @author 多仔
 * @link https://www.duox.dev
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div class="col-sm-12 <?php if ($this->options->sidebarStatus == 'yes'): ?>col-md-8<?php endif; ?>" id="main">
    <article class="post">
        <h1 class="post-title"><?php $this->title(); ?></h1>
        <div class="post-content" style="margin-top: 2em">
            <div class="timeline">
                <?php
                $db = Typecho_Db::get();
                $archives = $db->fetchAll($db->select()->from('table.contents')
                        ->where('type = ?', 'post')
                        ->where('status = ?', 'publish')
                        ->order('table.contents.created', Typecho_Db::SORT_DESC));

                $postCounts = array();
                $allPosts = array();

                for ($i = 0; $i < count($archives); $i++) {
                    $archive = Typecho_Widget::widget('Widget_Abstract_Contents')->push($archives[$i]);
                    $year = date('Y', $archive['created']);
                    $month = date('m', $archive['created']);
                    $day = date('d', $archive['created']);

                    if (!isset($postCounts[$year])) {
                        $postCounts[$year] = array('total' => 0);
                    }
                    if (!isset($postCounts[$year][$month])) {
                        $postCounts[$year][$month] = 0;
                    }
                    $postCounts[$year][$month]++;
                    $postCounts[$year]['total']++;

                    $allPosts[] = array(
                            'year' => $year,
                            'month' => $month,
                            'day' => $day,
                            'permalink' => $archive['permalink'],
                            'title' => $archive['title']
                    );
                }

                $currentYear = 0;
                $currentMonth = 0;
                $htmlOutput = '';

                foreach ($allPosts as $post) {
                    $postYear = $post['year'];
                    $postMonth = $post['month'];

                    if ($currentYear != $postYear) {
                        if ($currentYear > 0) {
                            $htmlOutput .= '</ul></div></div></div></div>';
                        }
                        $currentYear = $postYear;
                        $yearTotal = $postCounts[$currentYear]['total'];
                        $htmlOutput .= '
                            <div class="year-section">
                                <div class="year-header collapsed" data-year="'.$currentYear.'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="timeline-toggle bi bi-caret-right-fill" viewBox="0 0 16 16">
                                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"></path>
                                    </svg>
                                    '.$currentYear.' 年 <span class="post-count">（共 '.$yearTotal.' 篇文章）</span>
                                </div>
                                <div class="year-content hidden">
                        ';
                        $currentMonth = 0;
                    }

                    if ($currentMonth != $postMonth) {
                        if ($currentMonth > 0) {
                            $htmlOutput .= '</ul></div></div>';
                        }
                        $currentMonth = $postMonth;
                        $monthTotal = $postCounts[$currentYear][$currentMonth];
                        $htmlOutput .= '
                            <div class="month-section">
                                <div class="month-header" data-month="'.$currentYear.'-'.$currentMonth.'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="timeline-toggle bi bi-caret-right-fill" viewBox="0 0 16 16">
                                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"></path>
                                    </svg>
                                    '.$postMonth.' 月 <span class="post-count">（共 '.$monthTotal.' 篇文章）</span>
                                </div>
                                <div class="month-content hidden">
                                    <ul>
                        ';
                    }

                    $htmlOutput .= '
                        <li class="timeline-item">
                            <span class="timeline-date">'.$post['day'].' 日&emsp;</span>
                            <a href="'.$post['permalink'].'">'.$post['title'].'</a>
                        </li>';
                }

                if ($currentYear > 0 && $currentMonth > 0) {
                    $htmlOutput .= '</ul></div></div></div></div>';
                }

                echo $htmlOutput;
                ?>
            </div>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
    <script>
        function initTimeline() {
            const yearHeaders = document.querySelectorAll('.year-header');
            yearHeaders.forEach(header => {
                header.addEventListener('click', function () {
                    const yearContent = this.nextElementSibling;
                    yearContent.classList.toggle('hidden');
                    this.classList.toggle('collapsed');
                    this.classList.toggle('expanded');
                });
            });

            const monthHeaders = document.querySelectorAll('.month-header');
            monthHeaders.forEach(header => {
                header.addEventListener('click', function () {
                    const monthContent = this.nextElementSibling;
                    monthContent.classList.toggle('hidden');
                    this.classList.toggle('expanded');
                });
            });
        }
    </script>
</div>
<?php $this->options->sidebarStatus == 'yes' ? $this->need('sidebar.php') : ''; ?>
<?php $this->need('footer.php'); ?>
