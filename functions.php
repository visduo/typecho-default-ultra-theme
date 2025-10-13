<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig($form)
{
    $title = new \Typecho\Widget\Helper\Form\Element\Text(
        'title',
        null,
        null,
        '站点名称'
    );
    $description = new \Typecho\Widget\Helper\Form\Element\Text(
        'description',
        null,
        null,
        '站点描述'
    );
    $faviconUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'faviconUrl',
        null,
        null,
        'favicon.ico图标路径'
    );
    $footerText = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'footerText',
        null,
        null,
        '版权信息'
    );
    $analyticsCode = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'analyticsCode',
        null,
        null,
        '网站统计代码'
    );
    
    $menuBlock = new \Typecho\Widget\Helper\Form\Element\Checkbox(
        'menuBlock',
        [
            'ShowCategory'  => '分类',
            'ShowPage'      => '独立页面'
        ],
        ['ShowCategory', 'ShowPage'],
        '顶部菜单显示内容'
    );
    
    $sidebarBlock = new \Typecho\Widget\Helper\Form\Element\Checkbox(
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
    if($exist < 800) {
        $exist = $exist + rand(800, 1200);
    }
    if ($archive->is('single')) {
        $db->query($db->update('table.contents')
            ->rows(array('views' => (int)$exist+1))
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
