<?php
/**
 * 自定义函数
 *
 * @author 多仔
 * @link https://www.duox.dev
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

error_reporting(0);

/**
 * 主题配置项
 */
function themeConfig($form) {
    $message = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'hr',
        null,
        null,
        '主题使用说明与注意事项：<a href="https://www.duox.dev/post/65.html" target="_blank">https://www.duox.dev/post/65.html</a>'
    );
    
    $hr = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'hr',
        null,
        null,
        '<hr style="border: 1px dashed #CCCCCC; margin: 32px 0">'
    );
    
    $basicSettings = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'basicSettings',
        null,
        null,
        '<h3># 基础设置</h3>'
    );
    
    $pjaxStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'pjaxStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否启用全站 PJAX',
        '开启后，全站页面实现 PJAX 无刷新跳转'
    );
    
    $faviconUrl = new Typecho_Widget_Helper_Form_Element_Text(
        'faviconUrl',
        null,
        null,
        'favicon.ico 图标路径',
        '指定网页 favicon 图标，即浏览器标签页上显示的小图标'
    );
    
    $footerText = new Typecho_Widget_Helper_Form_Element_Textarea(
        'footerText',
        null,
        null,
        '版权信息',
        '指定网页底部版权区域显示的内容'
    );
    
    $analyticsCode = new Typecho_Widget_Helper_Form_Element_Textarea(
        'analyticsCode',
        null,
        null,
        '网站统计代码',
        '指定网站统计工具（如百度统计、Google Analytics 等）的嵌入代码'
    );
    
    $themeModeSettings = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'themeModeSettings',
        null,
        null,
        '<h3># 主题模式设置</h3>'
    );
    
    $themeModeSelectStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'themeModeSelectStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否启用主题模式切换',
        '开启后，全站支持切换亮色/深色/跟随系统模式'
    );
    
    $defaultThemeMode = new Typecho_Widget_Helper_Form_Element_Radio(
        'defaultThemeMode',
        [
            'auto'      => '跟随系统',
            'light'     => '亮色模式',
            'dark'      => '深色模式',
            'read'      => '护眼模式',
        ],
        'auto',
        '默认外观',
        '指定未手动切换主题模式时全站的默认主题模式'
    );
    
    $menuSettings = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'menuSettings',
        null,
        null,
        '<h3># 顶部菜单设置</h3>'
    );
    
    $menuBlock = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'menuBlock',
        [
            'ShowCategory'  => '分类',
            'ShowPage'      => '独立页面'
        ],
        [],
        '顶部菜单显示内容',
        '指定网页顶部菜单显示的菜单项来源'
    );
    
    $sidebarSettings = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'sidebarSettings',
        null,
        null,
        '<h3># 侧边栏设置</h3>'
    );
    
    $sidebarStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'sidebarStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否启用侧边栏',
        '开启后，将显示网页侧边栏'
    );
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'sidebarBlock',
        [
            'ShowCategory'          => '文章分类',
            'ShowRecentTags'        => '最新合集',
            'ShowRandPosts'         => '随机推荐',
            'ShowRecentPosts'       => '近期文章',
            'ShowRecentComments'    => '近期评论',
            'ShowArchive'           => '文章归档',
            'ShowStatistics'        => '数据统计'
        ],
        [],
        '侧边栏显示内容',
        '指定网页侧边栏显示的内容'
    );
    
    $sidebarStickyStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'sidebarStickyStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否启用侧边栏粘性布局',
        '开启后，侧边栏会在页面滚动过程中始终保持在可视区域内'
    );
    
    $postSettings = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'postSettings',
        null,
        null,
        '<h3># 文章设置</h3>'
    );
    
    $weservStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'weservStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否启用绕过图片防盗链服务',
        '开启后，文章内的图片将自动调用绕过图片防盗链接口服务，处理外链图片（如微信公众号图片等）防盗链问题'
    );
    
    $imageLazyloadStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'imageLazyloadStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否启用图片懒加载',
        '开启后，文章内的图片仅在用户即将浏览到时才加载，非一次性全部加载'
    );
    
    $imageLightBoxStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'imageLightBoxStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否启用图片灯箱',
            '开启后，点击文章内的图片，即可让图片展开放大'
    );
    
    $postWordCountVisibleStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'postWordCountVisibleStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否显示文章字数',
        '开启后，将在首页、文章列表页、文章页自动统计并显示文章字数'
    );
    
    $postReadingTimeVisibleStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'postReadingTimeVisibleStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否显示文章预计阅读时长',
        '开启后，将在首页、文章列表页、文章页自动计算并显示文章预计阅读时长'
    );
    
    $readingSpeed = new Typecho_Widget_Helper_Form_Element_Text(
        'readingSpeed',
        null,
        '200',
        '默认阅读速度',
        '计算文章预计阅读时长时，会根据文章字数和默认阅读速度进行估算，其单位为字/分钟'
    );
    
    $postViewVisibleStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'postViewVisibleStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否显示文章阅读数',
        '开启后，将在首页、文章列表页、文章页自动计算并显示文章阅读数'
    );
    
    $randMinPostView = new Typecho_Widget_Helper_Form_Element_Text(
        'randMinPostView',
        null,
        '800',
        '随机生成文章阅读数最小值',
        '文章发布后，会在设定的最小与最大值之间，为文章随机分配一个阅读数'
    );
    
    $randMaxPostView = new Typecho_Widget_Helper_Form_Element_Text(
        'randMaxPostView',
        null,
        '1200',
        '随机生成文章阅读数最大值',
        '文章发布后，会在设定的最小与最大值之间，为文章随机分配一个阅读数'
    );
    
    $elinkTargetBlankStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'elinkTargetBlankStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '文章外链新窗口打开',
        '开启后，文章中的所有外链将自动在新窗口打开'
    );
    
    $statementStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'statementStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否显示文章声明',
        '开启后，文章底部将显示文章声明内容'
    );
    
    $statementText = new Typecho_Widget_Helper_Form_Element_Textarea(
        'statementText',
        null,
        null,
        '文章声明内容',
        '指定文章底部显示的文章声明内容'
    );
    
    $commentSettings = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'commentSettings',
        null,
        null,
        '<h3># 评论设置</h3>'
    );
    
    $commentAuthorIp2RegionStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'commentAuthorIp2RegionStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否显示评论者 IP 地址归属地信息',
        '开启后，将显示评论者 IP 地址归属地信息。该功能需要配合 ip2region 插件使用，请确保已安装 ip2region 插件'
    );
    
    $minitoolSettings = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'minitoolSettings',
        null,
        null,
        '<h3># 悬浮工具设置</h3>'
    );
    
    $tocMinitoolStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'tocMinitoolStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否启用 TOC',
        '开启后，将启用 TOC 并在网页右下角显示 TOC 按钮'
    );
    
    $tocDefaultVisibleStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'tocDefaultVisibleStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否自动打开 TOC 面板',
        '开启后，将默认打开 TOC 面板'
    );
    
    $tocDefaultExpandedStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'tocDefaultExpandedStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否自动展开 TOC 列表项',
        '开启后，将默认展开全部 TOC 列表项'
    );
    
    $themeModeMinitoolStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'themeModeMinitoolStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否启用主题模式切换按钮',
        '开启后，将在网页右下角显示主题模式切换按钮，需同时开启主题模式切换'
    );
    
    $topMinitoolStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'topMinitoolStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否启用返回顶部按钮',
        '开启后，将在网页右下角显示返回顶部按钮'
    );
    
    $playbackMinitoolStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'playbackMinitoolStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'no',
        '是否启用文章放映模式按钮',
        '开启后，将在网页右下角显示文章放映模式按钮。该功能需要配合 playback 插件使用，请确保已安装 playback 插件'
    );
    
    $form->addInput($message);
    
    $form->addInput($basicSettings);
    $form->addInput($pjaxStatus);
    $form->addInput($faviconUrl);
    $form->addInput($footerText);
    $form->addInput($analyticsCode);
    $form->addInput($hr);
    
    $form->addInput($themeModeSettings);
    $form->addInput($themeModeSelectStatus);
    $form->addInput($defaultThemeMode);
    $form->addInput($hr);
    
    $form->addInput($menuSettings);
    $form->addInput($menuBlock);
    $form->addInput($hr);
    
    $form->addInput($sidebarSettings);
    $form->addInput($sidebarStatus);
    $form->addInput($sidebarBlock);
    $form->addInput($sidebarStickyStatus);
    $form->addInput($hr);
    
    $form->addInput($postSettings);
    $form->addInput($weservStatus);
    $form->addInput($imageLazyloadStatus);
    $form->addInput($imageLightBoxStatus);
    $form->addInput($postWordCountVisibleStatus);
    $form->addInput($postReadingTimeVisibleStatus);
    $form->addInput($readingSpeed);
    $form->addInput($postViewVisibleStatus);
    $form->addInput($randMinPostView);
    $form->addInput($randMaxPostView);
    $form->addInput($elinkTargetBlankStatus);
    $form->addInput($statementStatus);
    $form->addInput($statementText);
    $form->addInput($hr);
    
    $form->addInput($commentSettings);
    $form->addInput($commentAuthorIp2RegionStatus);
    $form->addInput($hr);
    
    $form->addInput($minitoolSettings);
    $form->addInput($tocMinitoolStatus);
    $form->addInput($tocDefaultVisibleStatus);
    $form->addInput($tocDefaultExpandedStatus);
    $form->addInput($themeModeMinitoolStatus);
    $form->addInput($topMinitoolStatus);
    $form->addInput($playbackMinitoolStatus);
    $form->addInput($hr);
}

/**
 * 计算文章阅读数
 */
function postView($archive) {
    $options = Helper::options();
    $db = Typecho_Db::get();
    $adapterName = $db->getAdapterName();
    $cid = $archive->cid;
    
    // 文章阅读数字段不存在，自动创建
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        if ($adapterName == 'pgsql' || $adapterName == 'Pdo_Pgsql') {
            $db->query('ALTER TABLE "'.$db->getPrefix().'contents" ADD "views" INTEGER DEFAULT 0;');
        } else {
            $db->query('ALTER TABLE `'.$db->getPrefix().'contents` ADD `views` INT(10) DEFAULT 0;');
        }
    }
    
    // 获取文章阅读数
    $exist = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid))['views'];
    
    if ($exist == 0) {
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
    $rs = $db->fetchRow($db->select('table.contents.text')->from('table.contents')->where('table.contents.cid = ?', $cid)->order ('table.contents.cid', Typecho_Db::SORT_ASC)->limit (1));
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
 * 计算全站合集/合集总数
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
        $this->parameter->setDefault(array('limit' => $this->options->postsListSize, 'parentId' => 0, 'ignoreAuthor' => false));
    }
    
    public function execute() {
        $adapterName = $this->db->getAdapterName();
        if ($adapterName == 'pgsql' || $adapterName == 'Pdo_Pgsql' || $adapterName == 'Pdo_SQLite' || $adapterName == 'SQLite') {
            $orderBy = 'RANDOM()';
        } else {
            $orderBy = 'RAND()';
        }
        
        $select = $this->select()->from('table.contents')
            ->where('table.contents.password IS NULL OR table.contents.password = \'\'')
            ->where('table.contents.status = ?', 'publish')
            ->where('table.contents.created <= ?', time())
            ->where('table.contents.type = ?', 'post')
            ->limit($this->parameter->limit)
            ->order($orderBy);
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
    $defaultImageUrl = $options->imageLazyloadStatus == 'yes' ? 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQAAAACQCAMAAADQvUWjAAABP2lDQ1BpY2MAAHicfZC/SwJxGMY/11WWWA05NBQcJU0FUUtTgYZOEfgj1Kbz/FGgdt33QprLoaloiEZrCaLZxhz6A4KgIQqirdWghpKLrw5aUM/yfnh4Xt6XB5TnvFEQ3RoUirYVDvm1eCKpuV5Q8dLPIGO6IczlSDAKIPSSMGwrzw+936PIeTe9rhfTO6/Xq8kFpbo7UY4FP1Yu+F/udEYYwBfgM0zLBkUDxku2KXkJ8BrrehqUODBlxRNJUPakn2vxieRUiy8lW9FwAJQaoOU6ONXBhfy2vCslv/dkirEI0AeMIggTwv9HpreZCRBgBmRfv3sQ2bnZ1pZnEXqeHOdtElyH0DhynM9Tx2mcgfoIta32/mYF5uugHrS91DFc7cPIQ9vzVWCoDNUbU7f0pqUCXdkNqJ/DQAKGb8G99g3j4l+xfPB+eQAAABtQTFRF4ePp7e/1c3R31tjdoKKljY6Rx8nOtLa7XFxeR44UlQAAAAlwSFlzAAALEwAACxMBAJqcGAAAAHhlWElmSUkqAAgAAAAFABIBAwABAAAAAQAAABoBBQABAAAASgAAABsBBQABAAAAUgAAACgBAwABAAAAAgAAAGmHBAABAAAAWgAAAAAAAABJGQEA6AMAAEkZAQDoAwAAAgACoAQAAQAAAAABAAADoAQAAQAAAJAAAAAAAAAApI/SzwAAAiJJREFUeJzt19uO2zAMRVHy8Kb//+KCmmaaFgXaVwd7AfEgyvhBx6JEmwEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPwnf139z7Hvb/vV3wZ///mZOiIsVoeZRYZl+J2qWef7v/qMu2X397yz7fFOZSnXSTfP43Mqlfdhp+6fZRam7LTTVa+btZk93AkfmUW42s01pu459yn7bACRMzluOaqUHfOK9wAeHsIJP1V55GqzUBxVSbsepnRS6jOj8u6ojGhNZJqp9q57uavlsY7tes9jG4DnaZXNCdN4WMqzQu45nlmntlIqtwYUWxN9L48OQJNeR+Z3IkdeatXcIvAsnwzZBnB3hEir9mgL3ZvDNrhnBxAeJVVvAFk7Y53u3oLwSs9XAFOnVOocV/oO3pufH0Bn5dzZtXXLp7rkeQPQ/ArAZ4sh7oDv6fFzD6ivDfOxtIf7aCx2D2hFdpXO10mn8JpXCajqpKKrdtfTtg7aLuLhK+CYZW5Dc0+Blk11n3vU+5S/BXDjmfZzy/8eflsCTz8GZW6xh909BVrRkTW1vYHXuKtbYTV+F0ZmxCm/TeOnNEI5Mz2qPfv8roDZBqiOdW1LZH0ytWOTcm+1Mj8tgNzPDaBirOuMe1h15NlH7z69DXHXtgVuOh8UQPjLnUxs199f7zh34H2Di7CvFvlVAh/wLvR3/u93ZgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPtvPwB/Bwrf0wZNQgAAAABJRU5ErkJggg==' : '';
    $actualImageUrl = ($options->weservStatus == 'yes' ? 'https://static-lab.6os.net/weserv/?url=' : '').'$1';
    
    if ($options->imageLazyloadStatus == 'yes') {
        // 开启图片懒加载
        $imageReplacement = '<img src="'.$defaultImageUrl.'" data-original="'.$actualImageUrl.'" class="lazyload">';
    } else {
        $imageReplacement = '<img src="'.$actualImageUrl.'">';
    }
    
    if ($options->imageLightBoxStatus == 'yes') {
        // 开启图片灯箱
        $imageReplacement = '<a href="'.$actualImageUrl.'" data-fancybox="gallery"/>'.$imageReplacement.'</a>';
    }
    
    // 文章内容处理
    $content = preg_replace($imagePattern, $imageReplacement, $content);
    
    return $content;
}

/**
 * 获取主题版本号
 */
function version() {
    $info = Typecho_Plugin::parseInfo(__DIR__.'/index.php');
    return $info['version'];
}
