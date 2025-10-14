<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig($form)
{
    $title = new Typecho_Widget_Helper_Form_Element_Text(
        'title',
        null,
        null,
        '站点名称'
    );
    $description = new Typecho_Widget_Helper_Form_Element_Text(
        'description',
        null,
        null,
        '站点描述'
    );
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
    
    $menuBlock = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'menuBlock',
        [
            'ShowCategory'  => '分类',
            'ShowPage'      => '独立页面'
        ],
        ['ShowCategory', 'ShowPage'],
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
        ['ShowRecentTags', 'ShowRandPosts', 'ShowRecentPosts', 'ShowRecentComments', 'ShowStatistics'],
        '侧边栏显示内容'
    );
    
    $weservStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'weservStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'yes',
        '是否启用images.weserv.nl服务'
    );
    
    $themeChangeStatus = new Typecho_Widget_Helper_Form_Element_Radio(
        'themeChangeStatus',
        [
            'yes'   => '是',
            'no'    => '否'
        ],
        'yes',
        '是否启用主题切换'
    );
    
    $defaultTheme = new Typecho_Widget_Helper_Form_Element_Radio(
        'defaultTheme',
        [
            'auto'      => '跟随系统',
            'light'     => '亮色模式',
            'dark'      => '深色模式',
        ],
        'auto',
        '默认主题'
    );
    
    $form->addInput($title);
    $form->addInput($description);
    $form->addInput($faviconUrl);
    $form->addInput($footerText);
    $form->addInput($analyticsCode);
    $form->addInput($menuBlock);
    $form->addInput($sidebarBlock);
    $form->addInput($weservStatus);
    $form->addInput($themeChangeStatus);
    $form->addInput($defaultTheme);
}

function postView($archive) {
    $db = Typecho_Db::get();
    $cid = $archive->cid;
    $exist = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid))['views'];
    if($exist == 0) {
        $exist = rand(800, 1200);
        $db->query($db->update('table.contents')
            ->rows(array('views' => $exist))
            ->where('cid = ?', $cid));
    }
    if ($archive->is('single')) {
        $db->query($db->update('table.contents')
            ->rows(array('views' => (int)$exist + 1))
            ->where('cid = ?', $cid));
        $exist = (int) $exist + 1;
    }
    
    echo $exist;
}

function postWordCount($archive){
    $db = Typecho_Db::get ();
    $cid = $archive->cid;
    $rs = $db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
    echo mb_strlen($rs['text'], 'UTF-8');
}

function postCount() {
    $db = Typecho_Db::get();
    $count = $db->fetchRow($db->select('COUNT(*) AS result')->from('table.contents')->where('type = ?', 'post')->where('status = ?', 'publish'));
    return $count['result'];
}

function commentCount() {
    $db = Typecho_Db::get();
    $count = $db->fetchRow($db->select('COUNT(*) AS result')->from('table.comments')->where('status = ?', 'approved'));
    return $count['result'];
}

function categoryCount() {
    $db = Typecho_Db::get();
    $count = $db->fetchRow($db->select('COUNT(*) AS result')->from('table.metas')->where('type = ?', 'category'));
    return $count['result'];
}

function tagCount() {
    $db = Typecho_Db::get();
    $count = $db->fetchRow($db->select('COUNT(*) AS result')->from('table.metas')->where('type = ?', 'tag'));
    return $count['result'];
}

function postViewCount() {
    $db = Typecho_Db::get();
    $count = $db->fetchRow($db->select('SUM(views) AS result')->from('table.contents'));
    return $count['result'];
}

class Widget_Post_rand extends Widget_Abstract_Contents {
    public function __construct($request, $response, $params = NULL) {
        parent::__construct($request, $response, $params);
        $this->parameter->setDefault(array('limit' => $this->options->commentsListSize, 'parentId' => 0, 'ignoreAuthor' => false));
    }
    
    public function execute() {
        $select  = $this->select()->from('table.contents')
            ->where("table.contents.password IS NULL OR table.contents.password = ''")
            ->where('table.contents.status = ?', 'publish')
            ->where('table.contents.created <= ?', time())
            ->where('table.contents.type = ?', 'post')
            ->limit($this->parameter->limit)
            ->order('RAND()');
        $this->db->fetchAll($select, array($this, 'push'));
    }
}

function parseContent($content) {
    $options = Helper::options();
    // 修正正则：用 [^>]* 代替 .* 避免越界，确保只匹配到 > 结束
    $pattern = '/<img.*?src="(.*?)".*?alt="(.*?)".*?>/i';
    $replacement = '<a href="'.($options->weservStatus == 'yes' ? 'https://images.weserv.nl/?url=' : '').'$1" data-fancybox="gallery" /><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQAAAACQCAMAAADQvUWjAAABP2lDQ1BpY2MAAHicfZC/SwJxGMY/11WWWA05NBQcJU0FUUtTgYZOEfgj1Kbz/FGgdt33QprLoaloiEZrCaLZxhz6A4KgIQqirdWghpKLrw5aUM/yfnh4Xt6XB5TnvFEQ3RoUirYVDvm1eCKpuV5Q8dLPIGO6IczlSDAKIPSSMGwrzw+936PIeTe9rhfTO6/Xq8kFpbo7UY4FP1Yu+F/udEYYwBfgM0zLBkUDxku2KXkJ8BrrehqUODBlxRNJUPakn2vxieRUiy8lW9FwAJQaoOU6ONXBhfy2vCslv/dkirEI0AeMIggTwv9HpreZCRBgBmRfv3sQ2bnZ1pZnEXqeHOdtElyH0DhynM9Tx2mcgfoIta32/mYF5uugHrS91DFc7cPIQ9vzVWCoDNUbU7f0pqUCXdkNqJ/DQAKGb8G99g3j4l+xfPB+eQAAABtQTFRF4ePp7e/1c3R31tjdoKKljY6Rx8nOtLa7XFxeR44UlQAAAAlwSFlzAAALEwAACxMBAJqcGAAAAHhlWElmSUkqAAgAAAAFABIBAwABAAAAAQAAABoBBQABAAAASgAAABsBBQABAAAAUgAAACgBAwABAAAAAgAAAGmHBAABAAAAWgAAAAAAAABJGQEA6AMAAEkZAQDoAwAAAgACoAQAAQAAAAABAAADoAQAAQAAAJAAAAAAAAAApI/SzwAAAiJJREFUeJzt19uO2zAMRVHy8Kb//+KCmmaaFgXaVwd7AfEgyvhBx6JEmwEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPwnf139z7Hvb/vV3wZ///mZOiIsVoeZRYZl+J2qWef7v/qMu2X397yz7fFOZSnXSTfP43Mqlfdhp+6fZRam7LTTVa+btZk93AkfmUW42s01pu459yn7bACRMzluOaqUHfOK9wAeHsIJP1V55GqzUBxVSbsepnRS6jOj8u6ojGhNZJqp9q57uavlsY7tes9jG4DnaZXNCdN4WMqzQu45nlmntlIqtwYUWxN9L48OQJNeR+Z3IkdeatXcIvAsnwzZBnB3hEir9mgL3ZvDNrhnBxAeJVVvAFk7Y53u3oLwSs9XAFOnVOocV/oO3pufH0Bn5dzZtXXLp7rkeQPQ/ArAZ4sh7oDv6fFzD6ivDfOxtIf7aCx2D2hFdpXO10mn8JpXCajqpKKrdtfTtg7aLuLhK+CYZW5Dc0+Blk11n3vU+5S/BXDjmfZzy/8eflsCTz8GZW6xh909BVrRkTW1vYHXuKtbYTV+F0ZmxCm/TeOnNEI5Mz2qPfv8roDZBqiOdW1LZH0ytWOTcm+1Mj8tgNzPDaBirOuMe1h15NlH7z69DXHXtgVuOh8UQPjLnUxs199f7zh34H2Di7CvFvlVAh/wLvR3/u93ZgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPtvPwB/Bwrf0wZNQgAAAABJRU5ErkJggg==" data-original="'.($options->weservStatus == 'yes' ? 'https://images.weserv.nl/?url=' : '').'$1" class="lazyload"></a>';
    $content = preg_replace($pattern, $replacement, $content);
    
    $array = explode('<!--more-->', $content);
    $content = $array[0];

    echo $content;
}
