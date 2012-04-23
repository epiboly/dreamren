<?php
class TestAction extends Action
{
	public function _initialize(){

		echo '<h1>Test '.ACTION_NAME.'</h1><hr />';
	}
	public function  index(){

		$this->display('');
	}

	public function getUserInfo(){
		dump(getUserInfo(1));
	}

	public function getShortUrl(){
		$result	=	getShortUrl('http://t.thinksns.com');
		dump($result);
	}

	public function userData(){
		$userData	=	model('UserData');
		dump($userData->save($this->mid,'followed',1005));
		dump($userData->save($this->mid,'following',1003));
		dump($userData->lget($this->mid));
	}

	public function weiboAttach(){
		$weiboAttach	=	D('WeiboAttach','weibo');
		dump($weiboAttach->add($this->mid,111,2,'3,4,5,123123,aaa,;-'));
	}

	public function deleteUser(){
		$uids ='14916';
		$uids = is_array($uids) ? $uids : explode(',', $uids);
    	foreach($uids as $k => $v) {
    		if (!is_numeric($v) || $v == $GLOBALS['ts']['user']['uid']) {
    			unset($uids[$k]);
    		}
    	}
    	if ( empty($uids) ) return false;

		$result = D('Follow', 'weibo')->where(array('uid'=>array('IN',$uids),'follow_id'=>array('IN',$uids),'_logic'=>'OR'))->delete();
		dump($result);
		dump(D('Follow', 'weibo')->getLastSql());

		$result = D('FollowGroup', 'weibo')->where(array('uid'=>array('IN',$uids),'follow_id'=>array('IN',$uids),'_logic'=>'OR'))->delete();
		dump($result);
		dump(D('FollowGroup', 'weibo')->getLastSql());

	}

	public function delWeiboAttach(){
		$uid = 10045;
		$weibo_id = 50310;
		$result = D('WeiboAttach','weibo')->del($uid,$weibo_id);
		dump($result);
	}

	//更新微博与话题的关联数据
	public function updateWeiboJoinTopicData() {
		dump('开始');
		set_time_limit(0);
		//preg_match_all("/#([^#]*[^#^\s][^#]*)#/is", $content, $arr);
		$page = empty($_GET['page']) ? 1 : intval($_GET['page']);
		$radix = 10000;
		$limit = ($page - 1) * $radix.', '.$radix;
		$result = M('weibo')->field('weibo_id, content, type, transpond_id')->where('isdel=0')->limit($limit)->findAll();
//		dump($result);
//		dump($result);exit;
		if(empty($result)) {
			dump('结束');exit;
		} else {
			foreach($result as $value) {
				if(preg_match_all("/#([^#]*[^#^\s][^#]*)#/is", $value['content'], $arr)) {
					$arr = array_unique($arr[1]);
					foreach($arr as $val) {
						$map['name'] = $val;
						$topicId = M('weibo_topic')->where($map)->getField('topic_id');
						$add['weibo_id'] = $value['weibo_id'];
						$add['topic_id'] = $topicId;
						$add['type'] = $value['type'];
						$add['transpond_id'] = $value['transpond_id'];
						M('weibo_topic_link')->add($add);
//						dump(M('weibo_topic_link')->getLastSql());exit;
					}
				}
			}
			$page++;
			$url = U('home/Test/updateWeiboJoinTopicData', array('page'=>$page));
			echo "<script type='text/javascript'>window.location.href=\"$url\"</script>";exit;
		}
	}
}