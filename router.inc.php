<?php
// 感谢@小四 提供代码支持. (http://www.wbyun.com)
return array(
	/**
	 * 路由的key必须写全称. 比如: 使用'wap/Index/index', 而非'wap'.
	 */
	'router' => array(
		// 基本
		'wap/Index/index'			=>	'wap',
		'w3g/Index/index'			=>	'w3g',
		'admin/Index/index'			=>	'admin',
		'home/User/index'			=>	'home',
		'home/Index/index'			=>	'home',
		'home/User/atme'			=>	'atme',
		'home/User/collection'		=>	'favorite',
		'home/User/comments'		=>	'comment',
		'home/User/findfriend'		=>	'findfriend',
		'home/Public/login'			=>	'login',
		'home/Public/adminlogin'	=>	'adminlogin',
		'home/Public/logout'		=>	'logout',
		'home/Public/register'		=>	'register',
		'home/Public/sendPassword'  =>  'sendPassword',
		'home/Public/error404'		=>	'404',
		'home/Message/notify'		=>	'notification',
		'home/Message/appmessage'	=>	'appmessage',
		// 微博广场
		'home/Square/index'			=>	'square',
		'home/Square/hot_topics'	=>	'square/topic',
        'home/Square/star'          =>  'square/star',
		'home/Square/top'           =>  'square/top',
        'home/Square/app'           =>  'square/app',
		// 私信
		'home/Message/index'		=>	'message',
		'home/Message/inbox'		=>	'message/inbox',
		'home/Message/outbox'		=>	'message/outbox',
		'home/Message/detail'		=>	'message/[id]',
		// 设置
		'home/Account/index'		=>	'setting',
		'home/Account/privacy'		=>	'setting/privacy',
		'home/Account/domain'		=>	'setting/domain',
		'home/Account/security'		=>	'setting/security',
		'home/Account/medal'		=>	'setting/medal',
		'home/Account/bind'			=>	'setting/bind',
		'home/Account/credit'		=>	'setting/credit',
		'home/Account/verified'		=>	'setting/verified',
		'home/Account/invite'		=>	'setting/invite',
		// 个人空间
		'home/Space/index'			=>	'space/[uid]',
		'home/Space/follow'			=>	'space/[uid]/[type]',
		'home/Space/profile'		=>	'space/[uid]/profile',
		// 微博详情
		'home/Space/detail'			=>	'weibo/[id]',
		// 搜索
		'home/User/topics'			=>	'topics/[domain]',
		'home/User/search'			=>	'search',
		'home/User/searchuser'		=>	'search/user',
		'home/User/searchtag'		=>	'search/tag',
		// 应用
		'home/Index/addapp'			=>	'app/add',
		'home/Index/editapp'		=>	'app/edit',
		'home/Index/install'		=>	'app/install/[app_id]',
		// 日志
		'blog/Index/index'			=>	'app/blog',
		'blog/Index/news'			=>	'app/blog/lastest',
		'blog/Index/followsblog'	=>	'app/blog/following',
		'blog/Index/my'				=>	'app/blog/my',
		'blog/Index/personal'		=>	'app/blog/[uid]',
		'blog/Index/show'			=>	'app/blog/detail/[id]',
		'blog/Index/addBlog'		=>	'app/blog/post',
		'blog/Index/edit'			=>	'app/blog/edit/[id]',
		'blog/Index/admin'			=>	'app/blog/admin',
		// 相册
		'photo/Index/index'			=>	'app/photo',
		'photo/Index/all_albums'	=>	'app/photo/all_albums',
		'photo/Index/all_photos'	=>	'app/photo/all_photos',
		'photo/Index/albums'		=>	'app/photo/albums',
		'photo/Index/photos'		=>	'app/photo/photos',
		'photo/Index/album'			=>	'app/photo/album/[id]',
		'photo/Index/photo'			=>	'app/photo/photo/[id]',
		'photo/Upload/flash'		=>	'app/photo/multi_upload',
		'photo/Upload/index'		=>	'app/photo/upload',
		'photo/Manage/album_edit'	=>	'app/photo/edit/[id]',
		'photo/Manage/album_order'	=>	'app/photo/order/[id]',
		// 活动
		'event/Index/index'			=>	'app/event',
		'event/Index/personal'		=>	'app/event/events',
		'event/Index/addEvent'		=>	'app/event/post',
		'event/Index/edit'			=>	'app/event/edit/[id]',
		'event/Index/eventDetail'	=>	'app/event/detail/[id]',
		'event/Index/member'		=>	'app/event/member/[id]',
		// 投票
		'vote/Index/index'			=>	'app/vote',
		'vote/Index/my'				=>	'app/vote/my',
		'vote/Index/personal'		=>	'app/vote/[uid]',
		'vote/Index/addPoll'		=>	'app/vote/post',
		'vote/Index/pollDetail'		=>	'app/vote/detail/[id]',
		// 礼物
		'gift/Index/index'			=>	'app/gift',
		'gift/Index/receivebox'		=>	'app/gift/receive',
		'gift/Index/sendbox'		=>	'app/gift/send',
		'gift/Index/personal'		=>	'app/gift/[uid]',
		// 招贴版
		'poster/Index/index'		=>	'app/poster',
		'poster/Index/personal'		=>	'app/poster/posters',
		'poster/Index/addPosterSort'=>	'app/poster/post',
		'poster/Index/addPoster'	=>	'app/poster/post/[typeId]',
		'poster/Index/editPoster'	=>	'app/poster/edit/[id]',
		'poster/Index/posterDetail'	=>	'app/poster/detail/[id]',
		// 群组
		'group/Index/index'			=>	'app/group',
		'group/Index/newIndex'		=>	'app/group/index',
		'group/Index/post'			=>	'app/group/my_post',
		'group/Index/replied'		=>	'app/group/replied',
		'group/Index/comment'		=>	'app/group/comment',
		'group/Index/atme'			=>	'app/group/atme',
		'group/SomeOne/index'		=>	'app/group/groups',
		'group/Index/find'			=>	'app/group/class',
		'group/Index/search'		=>	'app/group/search',
		'group/Index/add'			=>	'app/group/add',
		'group/Group/index'			=>	'app/group/[gid]',
		'group/Group/search'		=>	'app/group/[gid]/search',
		'group/Group/detail'		=>	'app/group/[gid]/detail/[id]',
		'group/Invite/create'		=>	'app/group/[gid]/invite',
		'group/Manage/index'		=>	'app/group/[gid]/setting/baseinfo',
		'group/Manage/privacy'		=>	'app/group/[gid]/setting/privacy',
		'group/Manage/membermanage'	=>	'app/group/[gid]/setting/member',
		'group/Manage/announce'		=>	'app/group/[gid]/setting/announcement',
		'group/Log/index'			=>	'app/group/[gid]/setting/log',
		'group/Topic/index'			=>	'app/group/[gid]/bbs',
		'group/Topic/add'			=>	'app/group/[gid]/bbs/post',
		'group/Topic/edit'			=>	'app/group/[gid]/bbs/edit/[tid]',
		'group/Topic/editPost'		=>	'app/group/[gid]/bbs_reply/edit/[pid]',
		'group/Topic/topic'			=>	'app/group/[gid]/bbs/[tid]',
		'group/Dir/index'			=>	'app/group/[gid]/file',
		'group/Dir/upload'			=>	'app/group/[gid]/file/upload',
		'group/Member/index'		=>	'app/group/[gid]/member',
	)
);