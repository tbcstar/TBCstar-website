# TBCstar-website
Laravel框架的魔兽website源码

安装步骤
1、在网站根目录下，找到.env.example文件，并将其重命名为.env。打开.env文件并修改数据库配置信息，以匹配您的MySQL数据库设置。
2、安装项目依赖：composer install
3、生成应用程序密钥：php artisan key:generate
4、运行数据库迁移：php artisan migrate --seed
5、伪静态：
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
6、目录权限：sudo chmod -R 755 storage 和 bootstrap/cache
7、站点设置指向public目录




站点功能：
主页
新闻系统
站点搜索（角色、新闻、公会）
注册
授权
多语言
军械库
+角色名
+职业
+种族
+等级
+物品等级
+专精
2v2 PvP评级
3v3 PvP评级
10v10 PvP评级
已穿戴装备展示
天赋展示
pvp天赋展示
声望展示
显示关于BOSS击杀的信息
论坛：
创建主题
浏览主题
在主题中回复
关闭、打开主题（管理员）
置顶、取消置顶主题（管理员）
个人区域
余额充值（RoboKassa，FreeKassa）
付款历史
更改个人识别码
更改电子邮件
推荐
服务：
种族更改
派系更改
更改名称
解除卡死
移除Mut
解除账户锁定
服务器投票
