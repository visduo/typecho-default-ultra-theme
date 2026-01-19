### v2.8（2026.01.19）

1. 修复 PJAX 评论异常问题（@visduo）

### v2.7（2025.12.26）

1. 优化绕过图片防盗链服务（@visduo）
2. 修改主题初始化逻辑（@e300l20）
3. 新增文章声明区（@visduo）
4. 新增放映模式（@visduo）
5. 优化样式（@visduo）
6. 修改“思源宋体”为“梦源宋体”（@visduo）
7. 字图字体国内化（@visduo）

### v2.6（2025.12.10）

1. 修复侧边栏近期文章显示问题（@visduo）
2. 优化样式（@visduo）
3. 集成 KaTeX 以支持 LaTeX 渲染（@e300l20）

### v2.5（2025.11.12）

1. 新增阅读模式（@visduo）
2. 新增时间轴页面（@visduo）
3. 新增文章外链处理（@visduo）
4. 优化文章内容样式（@visduo）
5. 优化暗黑模式配色（@visduo）
6. 适配 AI 摘要插件 AISummary（@visduo）

### v2.4（2025.11.04）

1. 修复 footer 插件接口（@jrotty）

### v2.3（2025.11.01）

1. 优化后台主题设置提示（@visduo）

### v2.2（2025.10.31）

1. 优化移动端适配问题（@visduo）
2. 优化文章内容样式（@visduo）
3. 优化 images.weserv.nl 对于 gif 图像的支持（@visduo）

### v2.1（2025.10.25）

1. 新增返回顶部按钮（@visduo）
2. 新增切换主题模式按钮（@visduo）
3. 优化 TOC pjax 适配问题（@visduo）
4. 优化调整 TOC 按钮的位置（@visduo）
5. 使用 jQuery 改造原生 JavaScript 代码（@visduo）

### v2.0（2025.10.24）

1. 新增文章页上一篇/下一篇按钮（@visduo）
2. 新增文章 TOC 目录树（@visduo）
3. 新增是否启用侧边栏、是否启用侧边栏粘性布局（@visduo）
4. 新增 Noto Color Emoji 字体（@visduo）
5. 新增显示评论者 IP 归属地，需配合 ip2region 插件使用（@visduo）
6. 优化主题功能适配其他数据库（@visduo），参考：https://www.duox.dev/post/64.html
7. 优化后台外观设置配置项（@visduo）
8. 优化密码保护文章样式及 pjax 适配问题（@visduo）
9. 优化文章评论 pjax 适配问题（@visduo）
10. 优化未开启伪静态时，部分 pjax 异常问题（@visduo）
11. 优化样式文件添加版本号后缀（@visduo）

### v1.8（2025.10.22）

1. 修复几处文字表述（@visduo）

### v1.7（2025.10.19）

1. 布局微调和样式优化（@visduo）

### v1.6（2025.10.18）

1. 优化文章字数统计逻辑（@visduo），参考：https://www.duox.dev/post/60.html
2. 布局微调和样式优化（@visduo）

### v1.5（2025.10.17）

1. 优化主题配置参数，新增多个主题配置项，特性功能高度自定义（@visduo）
2. 修复 pjax 环境下，评论失败的问题（@visduo）
3. 布局微调（@visduo）
4. 优化代码（@visduo）

### v1.3（2025.10.15）

1. 优化文章字数统计逻辑（@visduo）
2. 新增文章预计阅读时间（@visduo）
3. 优化主题配置参数（@visduo）

### v1.2（2025.10.14）

1. 引入 jQuery pjax，实现全站无刷新加载（@visduo）
2. 引入 jQuery fancybox，实现图片灯箱效果（@visduo）
3. 引入 jQuery lazyload，实现图片懒加载效果（@visduo）
4. 修复文章阅读数量统计的问题（@visduo）
5. 适配旧版 Typecho（@visduo）
6. 其他细节优化（@visduo）

### v1.1（2025.10.13）

1. 适配暗黑模式（@visduo）
2. 布局微调（@visduo）

### v1.0（2025.10.12）

1. 引入 bootstrap-grid.css，替换默认栅格系统为 Bootstrap 栅格系统（@wei-with-two-swords）
2. 布局和样式改动、微调（@wei-with-two-swords、@visduo）
3. 引入 highlight 代码高亮系统（@visduo）
4. 引入思源宋体作为全站字体、Maple Mono 字体作为代码块字体，并启用字图 CDN 为字体加载加速（@visduo）
5. 侧栏加入最新合集、随机推荐、数据统计模块（@visduo）
6. 文章加入阅读数量统计（@visduo）
7. 顶部导航栏加入分类、独立页面菜单项（@visduo）
8. 引入 images.weserv.nl 服务，解决微信公众号图片防盗链问题（@visduo）
