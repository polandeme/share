-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 04 月 01 日 01:21
-- 服务器版本: 5.5.35
-- PHP 版本: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `share`
--

-- --------------------------------------------------------

--
-- 表的结构 `sh_comment`
--
-- 创建时间: 2015 年 01 月 01 日 10:30
--

CREATE TABLE IF NOT EXISTS `sh_comment` (
  `ct_id` int(32) NOT NULL AUTO_INCREMENT,
  `ct_sec_id` varchar(64) NOT NULL,
  `ct_pt_id` int(32) NOT NULL,
  `ct_uid` int(32) NOT NULL,
  `ct_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ct_up` int(11) NOT NULL,
  `ct_detail` varchar(128) NOT NULL,
  PRIMARY KEY (`ct_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `sh_comment`
--

INSERT INTO `sh_comment` (`ct_id`, `ct_sec_id`, `ct_pt_id`, `ct_uid`, `ct_date`, `ct_up`, `ct_detail`) VALUES
(1, '35ce039996990abf473631689d04ebe1f332f915', 13, 1, '2014-12-26 07:27:43', 0, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;dsds &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;这里写你的初始化内容\r\n &nbsp; &nbsp; &nbs'),
(2, 'e9518a62dda0af6016fa8440d8446513cba3bb1c', 13, 1, '2014-12-26 07:41:16', 0, '<p>ssddssds &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>'),
(3, '38a569a9f25466a92f3df3299770a0df6ecb8d9f', 5, 1, '2014-12-26 10:12:43', 0, '<p>没有看过这本书，不过听别人说过，感觉挺好的一本书，不限于心理学的去看，其实很多行业的都可以尝试去了解一下，可以了解人的认知习惯。</p><p><br/></p><p>尤其产品经理可以去了解一下，只有这样你才可以去了解用户，知道用户想干什么，怎么去帮助'),
(4, '0e9ee8462e072fca603ee1bf9c0c622b31734296', 15, 1, '2014-12-26 12:58:38', 0, '<p>&lt;embed type="application/x-shockwave-flash" class="edui-faked-video" pluginspage="http://www.macromedia.com/go/getflashpla'),
(5, 'bea46efaf09cab8464171eed464bb220e5bf3fee', 15, 1, '2014-12-26 12:59:12', 0, '<p>&lt;embed type="application/x-shockwave-flash" class="edui-faked-video" pluginspage="http://www.macromedia.com/go/getflashpla'),
(6, 'af69655f94ced3ec6dd9b6010ecac38dfb997b35', 24, 1, '2014-12-31 09:21:41', 0, '<p><span >不管有多苦 &amp; 梦醒了 &amp; 征服</span></p>');

-- --------------------------------------------------------

--
-- 表的结构 `sh_follow`
--
-- 创建时间: 2015 年 01 月 01 日 10:30
--

CREATE TABLE IF NOT EXISTS `sh_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fw_user_id` varchar(64) NOT NULL,
  `fw_friend_id` varchar(64) NOT NULL,
  `fw_relation` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `sh_follow`
--

INSERT INTO `sh_follow` (`id`, `fw_user_id`, `fw_friend_id`, `fw_relation`) VALUES
(9, '7f44a144ffa4e6cece59541735bfacb413314576', '011c945f30ce2cbafc452f39840f025693339c42', 1),
(10, '7f44a144ffa4e6cece59541735bfacb413314576', '947bf6b1b67b54f0de177037a4205e9cabc0f24a', 1),
(11, '7f44a144ffa4e6cece59541735bfacb413314576', '18618d2d693f11b88edf9d2f2bd9f2c73ec52cab', 1),
(12, '18618d2d693f11b88edf9d2f2bd9f2c73ec52cab', '658222a0d4fcbc1319e4d37703cc90c149814f42', 1),
(13, '658222a0d4fcbc1319e4d37703cc90c149814f42', '7f44a144ffa4e6cece59541735bfacb413314576', 1),
(14, '21ca02de0f22d12cbc9127aa03462263e3fbd997', '4a7773c64ce042bb45435dd930f88968d7dcb2c4', 1);

-- --------------------------------------------------------

--
-- 表的结构 `sh_log`
--
-- 创建时间: 2015 年 01 月 01 日 10:30
--

CREATE TABLE IF NOT EXISTS `sh_log` (
  `log_id` int(32) NOT NULL AUTO_INCREMENT,
  `log_pt_id` int(32) NOT NULL,
  `log_u_id` int(32) NOT NULL,
  `log_note` varchar(64) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `sh_log`
--

INSERT INTO `sh_log` (`log_id`, `log_pt_id`, `log_u_id`, `log_note`) VALUES
(1, 6, 2, 'zan'),
(2, 1, 3, 'zan'),
(3, 12, 6, 'zan'),
(4, 12, 1, 'zan'),
(5, 10, 1, 'zan'),
(6, 9, 1, 'zan'),
(7, 8, 1, 'zan'),
(8, 7, 1, 'zan'),
(9, 5, 1, 'zan'),
(10, 6, 1, 'zan'),
(11, 4, 1, 'zan'),
(12, 13, 1, 'zan'),
(13, 14, 1, 'zan'),
(14, 19, 1, 'zan'),
(15, 22, 1, 'zan'),
(16, 27, 5, 'zan'),
(17, 27, 9, 'zan'),
(18, 25, 9, 'zan'),
(19, 24, 9, 'zan'),
(20, 23, 9, 'zan'),
(21, 22, 9, 'zan'),
(22, 21, 9, 'zan'),
(23, 19, 9, 'zan'),
(24, 20, 9, 'zan'),
(25, 18, 9, 'zan');

-- --------------------------------------------------------

--
-- 表的结构 `sh_posts`
--
-- 创建时间: 2015 年 01 月 01 日 10:30
--

CREATE TABLE IF NOT EXISTS `sh_posts` (
  `pt_uid` int(32) NOT NULL,
  `pt_detail` text CHARACTER SET utf8mb4 NOT NULL,
  `pt_up` int(32) NOT NULL,
  `pt_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pt_id` int(32) NOT NULL AUTO_INCREMENT,
  `pt_cate` varchar(128) NOT NULL,
  `pt_role` varchar(128) NOT NULL,
  `pt_content` varchar(128) NOT NULL,
  `pt_up_uid` varchar(64) NOT NULL,
  PRIMARY KEY (`pt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `sh_posts`
--

INSERT INTO `sh_posts` (`pt_uid`, `pt_detail`, `pt_up`, `pt_date`, `pt_id`, `pt_cate`, `pt_role`, `pt_content`, `pt_up_uid`) VALUES
(5, '', 1, '2014-12-24 06:16:50', 8, '音乐网站', '', '豆瓣FM', ',1,'),
(2, '', 1, '2014-12-24 07:16:08', 10, '人物', '', '比尔盖茨', ',1,'),
(1, '', 0, '2014-12-24 11:42:15', 11, '书籍', '', '数据库系统概论', ''),
(1, '<p ><img src="/share/assets/uploads/images/edit//20141226/1419587865471585.jpg" title="1419587865471585.jpg" alt="024f78f0f736afc3ac1a2a55b019ebc4b74512ef.jpg" width="315" height="493" /></p><p><img src="/share/assets/uploads/images/edit//20141226/1419587884904915.jpg" title="1419587884904915.jpg" alt="1ad5ad6eddc451dadeaf4f9ab5fd5266d0163261.jpg" width="263" height="299" /></p><p>购买地址：<a href="http://www.amazon.cn/失控-全人类的最终命运和结局-凯文•凯利/dp/B004FPIHG0">失控亚马逊</a></p><blockquote><p>说说<br/></p></blockquote>', 1, '2014-12-26 06:30:42', 13, '书籍', '大学生', '失控', ',1,'),
(1, '<p>谷歌出品的一款jsMVC框架优点：</p><ol class=" list-paddingleft-2"><li><p>双向数据绑定</p></li><li><p>自定义指令系统</p></li><li><p>模板系统</p></li><li><p>。。。<br/></p></li></ol><p>推荐学习资料：</p><p><a href="http://www.zouyesheng.com/angular.html" src="http://www.zouyesheng.com/angular.html">http://www.zouyesheng.com/angular.html</a> </p><p><a href="http://www.ituring.com.cn/minibook/303" src="http://www.ituring.com.cn/minibook/303">http://www.ituring.com.cn/minibook/303</a> </p><p><a href="http://angularjs.cn/A003" src="http://angularjs.cn/A003">http://angularjs.cn/A003</a>&nbsp;（改网站即为angular开发）</p><p><br/></p><p><br/></p>', 1, '2014-12-26 10:15:02', 14, '前端技术', '前端工程师', 'angularJs ', ',1,'),
(1, '<p>文章地址</p><p><a href="http://zhuanlan.zhihu.com/FrontendMagazine/19920223" target="_blank" title="知乎专栏">http://zhuanlan.zhihu.com/FrontendMagazine/19920223</a></p>', 0, '2014-12-26 10:25:13', 15, '技术文章', '程序员', '使用 AngularJS & NodeJS 实现基于 token 的认证应用', ''),
(1, '', 0, '2014-12-27 01:58:58', 16, '自助烧烤', '', '金釜山烤肉', ''),
(1, '', 0, '2014-12-27 01:59:37', 17, '电影', '网络工程学士', '社交网络', ''),
(1, '', 1, '2015-01-01 16:40:21', 18, '旅游景点', '山东菏泽', '宋江故里郓城', ',9,'),
(1, '', 2, '2015-01-01 16:40:19', 19, '网站', '技术宅', '知乎', ',1,,9,'),
(1, '', 1, '2015-01-01 16:40:20', 20, 'xx', 'xx', 'xx', ',9,'),
(1, '<p><a href="http://douban.fm/"src="http://douban.fm/">http://douban.fm/</a> </p><p><br/></p>', 1, '2015-01-01 16:40:17', 21, '歌曲', '', '飞起来', ',9,'),
(1, '<p>? ?部非常好看的电影，尤其对于IT技术的人来说，讲述了扎克伯格的创办FB的经历以及其中的坎坷。这已经是第二遍看了。赞。<br/></p><p>主要剧情（来自豆瓣）：</p><blockquote><p>2003年秋，哈佛大学。恃才放旷的天才学生马克·扎克伯格（Jesse Eisenberg 饰）被女友甩掉，愤怒之际，马克利用黑客手段入侵了学校的系统，盗取了校内所有漂亮女生的资料，并制作名为“Facemash”的网站供同学们对辣妹评分。他的举动引起了轰动，一度致令哈佛服 务器几近崩溃，马克因此遭到校方的惩罚。正所谓因祸得福，马克的举动引起了温克莱沃斯兄弟的注意，他们邀请马克加入团队，共同建立一个社交网站。与此同时，马克也建立了日后名声大噪的“Facebook”。&nbsp;</p></blockquote>', 2, '2015-01-01 16:40:16', 22, '电影', '程序员', '社交网络', ',1,,9,'),
(1, '<p>歌手胡灵</p>', 1, '2015-01-01 16:40:15', 23, '歌曲', '', '新鲜年糕', ',9,'),
(1, '<p>歌手那英</p><p>试听地址<a href="http://mr3.douban.com/201412311719/d7e666efecf1cf251b13724629877f9a/view/song/small/p291400.mp4" src="http://mr3.douban.com/201412311719/d7e666efecf1cf251b13724629877f9a/view/song/small/p291400.mp4">http://mr3.douban.com/201412311719/d7e666efecf1cf251b13724629877f9a/view/song/small/p291400.mp4</a></p><blockquote><p><span property="v:summary">这张那英加入百代唱片后的首张国语专辑，一举征服了所有亚洲歌迷，创下至今毕语歌坛难以超过的销售佳绩！主打歌《征服》，至今仍为KTV点播率高居不下的冠军曲。那英由此完成了向亚洲歌后迈进的过程。<br/>　　本张专辑有别于以往的硬朗，风格转变得轻柔、软弱，在蛰伏与狂放间游刃有余的《征服》；我们听到了对感情坚定不移的《不管有多苦》；在音阶间自由来回的《什么态度》；也听到了午后阳光下慵懒柔情的《你是我的人》；以及清灵飘逸的《梦醒了》；更有全新动感冲击的《最爱这一天》……每一首歌曲，都有让人耳目一新的感觉！</span>&nbsp;</p></blockquote>', 1, '2015-01-01 16:40:14', 24, '歌曲', '程序员', '征服', ',9,'),
(1, '<p>很不错的一篇文章，是知乎cto李申申的演讲，讲述的是知乎从开始创立到现在的发展一些技术上的东西的变迁，对于技术人来说应该有些帮助</p><p>摘要：</p><blockquote><p><span class="s1">也许很多人还不知道，知<a href="http://www.zhihu.com/">乎</a>在规模上是仅次于百度贴吧和豆瓣的中文互联网最大的UGC(用户生成内容)社区。知乎创业三年来，从0开始，到现在已经有了100多台服务器。目前知乎的注册用户超过了1100万，每个月有超过8000万人使用；</span>? ?站<span class="s1">? ?个月的PV超过2.2亿，差不多每秒钟的动态请求超过2500。</span></p></blockquote><p><span class="s1"><br/>原文：<a href="http://www.infoq.com/cn/news/2014/12/zhihu-architecture-evolution" target="_self" title="链接">http://www.infoq.com/cn/news/2014/12/zhihu-architecture-evolution</a></span></p>', 1, '2015-01-01 16:40:13', 25, '文章', '知乎粉', '知乎CTO:从0到100——知乎架构变迁史', ',9,'),
(5, '<p>先占位</p>', 0, '2015-01-01 16:29:09', 26, '技术', '程序员', '利用github hooks自动部署项目', ''),
(9, '<p>最扭曲的心灵，最伟大的艺术家。<br/></p>', 2, '2015-01-01 16:40:11', 27, '书籍', '小麦兜', '香水', ',5,,9,'),
(10, '<p><a href="http://zh.learnlayout.com/" target="_blank">学习css布局</a><br/></p><p>不错的一个网站</p>', 0, '2015-02-13 10:55:53', 28, '网站', '程序员', '学习css布局', ''),
(1, '<p>数学专业的大二学姐良心推荐</p><p>真心不错的一个电影，改变自丹麦的一个童话故事。</p><p>画面特别美，总会不时的出现几个画面，让心里很舒服。</p><p>而且剧中的配乐也是爱尔兰民谣，很温馨神奇的音乐，真心喜欢</p><p><br/></p>', 0, '2015-03-22 15:05:53', 29, '电影', '21岁', '海洋之歌', ''),
(1, '<p>摘要：</p><blockquote><p>标签提供关于HTML文档的元数据。元数据不会显示在页面上，但是对于机器是可读的。它可用于浏览器（如何显示内容或重新加载页面），搜索引擎（关键词），或其他 web 服务。</p><p><br/></p></blockquote><p>原文地址：<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.admin10000.com/document/5591.html"src="http://www.admin10000.com/document/5591.html">http://www.admin10000.com/document/5591.html</a> </p><p><br/></p>', 0, '2015-03-24 14:46:05', 30, '文章', '前端程序员', '常用meta整理', '');

-- --------------------------------------------------------

--
-- 表的结构 `sh_uprela`
--
-- 创建时间: 2015 年 01 月 01 日 10:30
--

CREATE TABLE IF NOT EXISTS `sh_uprela` (
  `u_id` int(32) NOT NULL,
  `up_rela` int(32) NOT NULL,
  `p_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `sh_uprela`
--

INSERT INTO `sh_uprela` (`u_id`, `up_rela`, `p_id`, `id`) VALUES
(2, 1, 3, 1),
(2, 1, 2, 2),
(2, 1, 6, 3),
(3, 1, 1, 4),
(6, 1, 12, 5),
(1, 1, 12, 6),
(1, 1, 10, 7),
(1, 1, 9, 8),
(1, 1, 8, 9),
(1, 1, 7, 10),
(1, 1, 5, 11),
(1, 1, 6, 12),
(1, 1, 4, 13),
(1, 1, 13, 14),
(1, 1, 14, 15),
(1, 1, 19, 16),
(1, 1, 22, 17),
(5, 1, 27, 18),
(9, 1, 27, 19),
(9, 1, 25, 20),
(9, 1, 24, 21),
(9, 1, 23, 22),
(9, 1, 22, 23),
(9, 1, 21, 24),
(9, 1, 19, 25),
(9, 1, 20, 26),
(9, 1, 18, 27);

-- --------------------------------------------------------

--
-- 表的结构 `sh_user`
--
-- 创建时间: 2015 年 01 月 01 日 10:30
--

CREATE TABLE IF NOT EXISTS `sh_user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(32) NOT NULL,
  `u_password` varchar(64) NOT NULL,
  `u_motto` varchar(128) NOT NULL,
  `u_avatar` varchar(128) CHARACTER SET utf8mb4 NOT NULL,
  `u_reg_ip` varchar(64) NOT NULL,
  `u_reg_time` varchar(32) NOT NULL,
  `u_sec_id` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `u_email` varchar(64) NOT NULL,
  `u_up` int(32) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `sh_user`
--

INSERT INTO `sh_user` (`u_id`, `u_name`, `u_password`, `u_motto`, `u_avatar`, `u_reg_ip`, `u_reg_time`, `u_sec_id`, `u_email`, `u_up`) VALUES
(1, 'hgr', 'c671766e19824029de1b11311550ae164ce56226', 'Hi 不要空着，写上一句话吧! (>_<)', 'hgr1420017120.jpg', '::1', '1419171519', '7f44a144ffa4e6cece59541735bfacb413314576', '11@qq.com', 15),
(2, 'hgrhk', '639a7a0b995b0dbd0f129e021896e97582525443', 'Hi 不要空着，写上一句话吧! (>_<)', 'default.jpg', '::1', '1419171583', '947bf6b1b67b54f0de177037a4205e9cabc0f24a', '11@qq.com', 6),
(3, '111', 'd0606b2b389709deca5a21c8733461760e07de08', 'Hi 不要空着，写上一句话吧! (>_<)', 'default.jpg', '::1', '1419393575', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '11@qq.com', 0),
(4, '1111', '6a92c59300d5763be589a568b285971137b4890c', 'Hi 不要空着，写上一句话吧! (>_<)', 'default.jpg', '::1', '1419393616', '011c945f30ce2cbafc452f39840f025693339c42', '11@qq.com', 1),
(5, '黄国瑞', '0dce322835af407b12da8287d60eb2151bb5b084', 'Hi 不要空着，写上一句话吧! (>_<)', 'default.jpg', '::1', '1419401788', '18618d2d693f11b88edf9d2f2bd9f2c73ec52cab', '11@qq.com', 1),
(6, 'zjy', '2ed78da16402f7456262a35ee6129525bfd27e27', 'Hi 不要空着，写上一句话吧! (>_<)', 'zjy1419512665.jpg', '::1', '1419512581', 'a8aa42c52aaae7ae684a8337c00d1b26c0469dfd', 'hgrhkx@qq.com', 2),
(7, 'hgr', 'f41c399bd1c6140996a98fbb0399714cb47f2bdb', 'Hi 不要空着，写上一句话吧! (>_<)', 'default.jpg', '111.172.35.238', '1420108727', '7f44a144ffa4e6cece59541735bfacb413314576', 'hgrhkx@qq.com', 0),
(8, 'hgrhkx', 'e4ed9cc03062ea149c529ef84611241d2985d5a1', 'Hi 不要空着，写上一句话吧! (>_<)', 'default.jpg', '111.172.35.238', '1420111542', '21ca02de0f22d12cbc9127aa03462263e3fbd997', 'hgr@qq.com', 0),
(9, '麦兜爱吃肉', '04f4a107d104a6ffa55400e8b5df97fdb471a7f5', 'Hi 不要空着，写上一句话吧! (>_<)', 'default.jpg', '111.175.40.38', '1420129859', '658222a0d4fcbc1319e4d37703cc90c149814f42', '940009848@qq.com', 2),
(10, '测试账号0213', '84fd4508fbcb57447fcda8e541b8857a5c68f984', 'Hi 不要空着，写上一句话吧! (>_<)', 'default.jpg', '119.187.49.121', '1423824813', '4a7773c64ce042bb45435dd930f88968d7dcb2c4', '0213@qq.com', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
