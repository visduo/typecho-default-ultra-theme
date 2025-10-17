<?php
/**
 * 自定义函数
 *
 * @author 多仔
 * @link https://www.duozai.cn
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**
 * 主题配置项
 */
function themeConfig($form) {
    $faviconUrl = new Typecho_Widget_Helper_Form_Element_Text(
        'faviconUrl',
        null,
        null,
        'favicon.ico图标路径'
    );
    
    $footerText = new Typecho_Widget_Helper_Form_Element_Textarea(
        'footerText',
        null,
        null,
        '版权信息'
    );
    
    $analyticsCode = new Typecho_Widget_Helper_Form_Element_Textarea(
        'analyticsCode',
        null,
        null,
        '网站统计代码'
    );
    
    $pjaxStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'pjaxStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否启用PJAX'
    );
    
    $menuBlock = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'menuBlock',
        [
            'ShowCategory'  => '分类',
            'ShowPage'      => '独立页面'
        ],
        [],
        '顶部菜单显示内容'
    );
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'sidebarBlock',
        [
            'ShowRecentTags'        => '最新合集',
            'ShowRandPosts'         => '随机推荐',
            'ShowRecentPosts'       => '近期文章',
            'ShowRecentComments'    => '近期评论',
            'ShowCategory'          => '显示分类',
            'ShowArchive'           => '显示归档',
            'ShowStatistics'        => '数据统计'
        ],
        [],
        '侧边栏显示内容'
    );
    
    $lazyloadStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'lazyloadStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否启用图片懒加载'
    );
    
    $fancyboxStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'fancyboxStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否启用图片灯箱'
    );
    
    $weservStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'weservStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否启用images.weserv.nl服务'
    );
    
    $themeChangeStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'themeChangeStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否启用主题切换'
    );
    
    $defaultTheme = new Typecho_Widget_Helper_Form_Element_Radio(
        'defaultTheme',
        [
            'auto'      => '跟随系统',
            'light'     => '亮色模式',
            'dark'      => '深色模式',
        ],
        null,
        '默认主题'
    );
    
    $showPostWordCount = new Typecho_Widget_Helper_Form_Element_Radio(
        'showPostWordCount',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否显示文章字数'
    );
    
    $showPostReadingTime = new Typecho_Widget_Helper_Form_Element_Radio(
        'showPostReadingTime',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否显示文章预计阅读时间'
    );
    
    $readingSpeed = new Typecho_Widget_Helper_Form_Element_Text(
        'readingSpeed',
        null,
        '200',
        '默认阅读速度，单位为字/分钟'
    );
    
    $showPostView = new Typecho_Widget_Helper_Form_Element_Radio(
        'showPostView',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否显示文章阅读数'
    );
    
    $randMinPostView = new Typecho_Widget_Helper_Form_Element_Text(
        'randMinPostView',
        null,
        '800',
        '随机生成文章阅读数最小值'
    );
    
    $randMaxPostView = new Typecho_Widget_Helper_Form_Element_Text(
        'randMaxPostView',
        null,
        '1200',
        '随机生成文章阅读数最大值'
    );
    
    $form->addInput($faviconUrl);
    $form->addInput($footerText);
    $form->addInput($analyticsCode);
    $form->addInput($pjaxStatus);
    $form->addInput($menuBlock);
    $form->addInput($sidebarBlock);
    $form->addInput($weservStatus);
    $form->addInput($lazyloadStatus);
    $form->addInput($fancyboxStatus);
    $form->addInput($themeChangeStatus);
    $form->addInput($defaultTheme);
    $form->addInput($showPostWordCount);
    $form->addInput($showPostReadingTime);
    $form->addInput($readingSpeed);
    $form->addInput($showPostView);
    $form->addInput($randMinPostView);
    $form->addInput($randMaxPostView);
}

/**
 * 计算文章阅读数
 */
function postView($archive) {
    $options = Helper::options();
    $db = Typecho_Db::get();
    $cid = $archive->cid;
    
    // 文章阅读数字段不存在，自动创建
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `'.$db->getPrefix().'contents` ADD `views` INT(10) DEFAULT 0;');
    }
    
    // 获取文章阅读数
    $exist = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid))['views'];
    
    if($exist == 0) {
        // 随机生成文章阅读数
        $randMinPostView = (isset($options->randMinPostView) && is_numeric($options->randMinPostView)) ? (int)$options->randMinPostView : 800;
        $randMaxPostView = (isset($options->randMaxPostView) && is_numeric($options->randMaxPostView)) ? (int)$options->randMaxPostView : 1000;
        
        $exist = rand($randMinPostView, $randMaxPostView);
        $db->query($db->update('table.contents')
            ->rows(array('views' => $exist))
            ->where('cid = ?', $cid));
    }
    
    if ($archive->is('single')) {
        // 更新文章阅读数
        $db->query($db->update('table.contents')
            ->rows(array('views' => (int) $exist + 1))
            ->where('cid = ?', $cid));
        $exist = (int) $exist + 1;
    }
    
    return $exist;
}

/**
 * 计算文章字数
 */
function postWordCount($archive) {
    $db = Typecho_Db::get ();
    $cid = $archive->cid;
    // 获取文章内容
    $rs = $db->fetchRow($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid = ?', $cid)->order ('table.contents.cid', Typecho_Db::SORT_ASC)->limit (1));
    $content = $rs['text'];
    
    // 匹配 Markdown 标记的正则规则
    $rules = [
        '/<!--markdown-->/' => '',
        '/^#{1,6}\s+/m' => '',
        '/(\*{1,2}|_{1,2})/' => '',
        '/\[([^\]]+)\]\([^)]+\)/' => '$1',
        '/!\[([^\]]*)\]\([^)]+\)/' => '$1',
        '/```.*?\R/' => '',
        '/\R```/' => '',
        '/`/' => '',
        '/^[ \t]*[-*+]\s+/m' => '',
        '/^[ \t]*\d+\.\s+/m' => '',
        '/^>\s*/m' => '',
        '/^[-*_]{3,}\s*$/m' => '',
        '/\|/' => '',
        '/^[-: ]+$/' => '',
    ];
    
    foreach ($rules as $pattern => $replacement) {
        // 移除 Markdown 标记
        $content = preg_replace($pattern, $replacement, $content);
    }

    if (empty($content)) {
        return 0;
    }

    // 处理空格（合并连续空格为1个，保留分隔作用）
    $content = preg_replace('/\s+/', ' ', $content);
    $content = trim($content);
    if ($content === '') {
        return 0;
    }

    // 字数计数器
    $count = 0;
    
    // 按空格拆分成独立块
    $blocks = preg_split('/\s+/', $content);

    foreach ($blocks as $block) {
        if (empty($block)) {
            // 空格不计数
            continue;
        }

        // 核心正则：按规则优先级拆分内容（先拆1-2类，再拆3类，最后剩4类）
        // 匹配单个中文字符、单个中文符号、连续的英文/数字/英文符号序列、其他 Unicode
        preg_match_all('/([\x{4e00}-\x{9fa5}]|[\x{3000}-\x{303f}\x{ff00}-\x{ffef}]|[a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\-\_\+\=\[\]\{\}\|\\\;\:\'\"\,\.\<\>\/\?\`]+|.)/ux', $block, $matches);

        // 按规则计数
        foreach ($matches[0] as $part) {
            // 所有规则均为“单个/连续序列算1”，直接累加
            $count++;
        }
    }

    // 向上取整统计大约字数
    return ceil($count / 10) * 10;
}

/**
 * 计算文章预计阅读时间
 */
function postReadingTime($archive){
    $options = Helper::options();
    // 获取文章字数
    $wordCount = postWordCount($archive);
    // 获取阅读速度
    $readingSpeed = (isset($options->readingSpeed) && is_numeric($options->readingSpeed)) ? (int)$options->readingSpeed : 200;
    // 计算预计阅读时间
    return ceil($wordCount / $readingSpeed);
}

/**
 * 计算全站文章总数
 */
function postTotalCount() {
    $db = Typecho_Db::get();
    $count = $db->fetchRow($db->select('COUNT(*) AS result')->from('table.contents')->where('type = ?', 'post')->where('status = ?', 'publish'));
    return $count['result'];
}

/**
 * 计算全站评论总数
 */
function commentTotalCount() {
    $db = Typecho_Db::get();
    $count = $db->fetchRow($db->select('COUNT(*) AS result')->from('table.comments')->where('status = ?', 'approved'));
    return $count['result'];
}

/**
 * 计算全站分类总数
 */
function categoryTotalCount() {
    $db = Typecho_Db::get();
    $count = $db->fetchRow($db->select('COUNT(*) AS result')->from('table.metas')->where('type = ?', 'category'));
    return $count['result'];
}

/**
 * 计算全站合集/标签总数
 */
function tagTotalCount() {
    $db = Typecho_Db::get();
    $count = $db->fetchRow($db->select('COUNT(*) AS result')->from('table.metas')->where('type = ?', 'tag'));
    return $count['result'];
}

/**
 * 计算全站文章阅读总数
 */
function postViewTotalCount() {
    $db = Typecho_Db::get();
    $count = $db->fetchRow($db->select('SUM(views) AS result')->from('table.contents'));
    return $count['result'];
}

/**
 * 生成随机推荐文章
 */
class Widget_Post_rand extends Widget_Abstract_Contents {
    public function __construct($request, $response, $params = NULL) {
        parent::__construct($request, $response, $params);
        $this->parameter->setDefault(array('limit' => $this->options->commentsListSize, 'parentId' => 0, 'ignoreAuthor' => false));
    }
    
    public function execute() {
        $select  = $this->select()->from('table.contents')
            ->where('table.contents.password IS NULL OR table.contents.password = ""')
            ->where('table.contents.status = ?', 'publish')
            ->where('table.contents.created <= ?', time())
            ->where('table.contents.type = ?', 'post')
            ->limit($this->parameter->limit)
            ->order('RAND()');
        $this->db->fetchAll($select, array($this, 'push'));
    }
}

/**
 * 文章内容解析
 */
function parseContent($content) {
    $options = Helper::options();
    
    // 文章图片处理
    $imagePattern = '/<img.*?src="(.*?)".*?alt="(.*?)".*?>/i';
    $defaultImageUrl = $options->lazyloadStatus == 'yes' ? 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQAAAACQCAMAAADQvUWjAAABP2lDQ1BpY2MAAHicfZC/SwJxGMY/11WWWA05NBQcJU0FUUtTgYZOEfgj1Kbz/FGgdt33QprLoaloiEZrCaLZxhz6A4KgIQqirdWghpKLrw5aUM/yfnh4Xt6XB5TnvFEQ3RoUirYVDvm1eCKpuV5Q8dLPIGO6IczlSDAKIPSSMGwrzw+936PIeTe9rhfTO6/Xq8kFpbo7UY4FP1Yu+F/udEYYwBfgM0zLBkUDxku2KXkJ8BrrehqUODBlxRNJUPakn2vxieRUiy8lW9FwAJQaoOU6ONXBhfy2vCslv/dkirEI0AeMIggTwv9HpreZCRBgBmRfv3sQ2bnZ1pZnEXqeHOdtElyH0DhynM9Tx2mcgfoIta32/mYF5uugHrS91DFc7cPIQ9vzVWCoDNUbU7f0pqUCXdkNqJ/DQAKGb8G99g3j4l+xfPB+eQAAABtQTFRF4ePp7e/1c3R31tjdoKKljY6Rx8nOtLa7XFxeR44UlQAAAAlwSFlzAAALEwAACxMBAJqcGAAAAHhlWElmSUkqAAgAAAAFABIBAwABAAAAAQAAABoBBQABAAAASgAAABsBBQABAAAAUgAAACgBAwABAAAAAgAAAGmHBAABAAAAWgAAAAAAAABJGQEA6AMAAEkZAQDoAwAAAgACoAQAAQAAAAABAAADoAQAAQAAAJAAAAAAAAAApI/SzwAAAiJJREFUeJzt19uO2zAMRVHy8Kb//+KCmmaaFgXaVwd7AfEgyvhBx6JEmwEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPwnf139z7Hvb/vV3wZ///mZOiIsVoeZRYZl+J2qWef7v/qMu2X397yz7fFOZSnXSTfP43Mqlfdhp+6fZRam7LTTVa+btZk93AkfmUW42s01pu459yn7bACRMzluOaqUHfOK9wAeHsIJP1V55GqzUBxVSbsepnRS6jOj8u6ojGhNZJqp9q57uavlsY7tes9jG4DnaZXNCdN4WMqzQu45nlmntlIqtwYUWxN9L48OQJNeR+Z3IkdeatXcIvAsnwzZBnB3hEir9mgL3ZvDNrhnBxAeJVVvAFk7Y53u3oLwSs9XAFOnVOocV/oO3pufH0Bn5dzZtXXLp7rkeQPQ/ArAZ4sh7oDv6fFzD6ivDfOxtIf7aCx2D2hFdpXO10mn8JpXCajqpKKrdtfTtg7aLuLhK+CYZW5Dc0+Blk11n3vU+5S/BXDjmfZzy/8eflsCTz8GZW6xh909BVrRkTW1vYHXuKtbYTV+F0ZmxCm/TeOnNEI5Mz2qPfv8roDZBqiOdW1LZH0ytWOTcm+1Mj8tgNzPDaBirOuMe1h15NlH7z69DXHXtgVuOh8UQPjLnUxs199f7zh34H2Di7CvFvlVAh/wLvR3/u93ZgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPtvPwB/Bwrf0wZNQgAAAABJRU5ErkJggg==' : '';
    $actualImageUrl = ($options->weservStatus == 'yes' ? 'https://images.weserv.nl/?url=' : '').'$1';
    
    if($options->lazyloadStatus == 'yes') {
        // 开启图片懒加载
        $imageReplacement = '<img src="'.$defaultImageUrl.'" data-original="'.$actualImageUrl.'" class="lazyload">';
    } else {
        $imageReplacement = '<img src="'.$actualImageUrl.'">';
    }
    
    if($options->fancyboxStatus == 'yes') {
        // 开启图片灯箱
        $imageReplacement = '<a href="'.$actualImageUrl.'" data-fancybox="gallery"/>'.$imageReplacement.'</a>';
    }
    
    // 文章内容处理
    return preg_replace($imagePattern, $imageReplacement, $content);
}
