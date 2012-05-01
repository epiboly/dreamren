<?php

class VoteAddWidget extends Widget
{
	static $rand = 0;
	public function render($data)
	{
		self::$rand ++;
		$data['rand'] = self::$rand;
		$data['time'] = getdate();
		$data['count'] = 3;
		$data['exit'] = isset($data['exit'])?$data['exit']:true;
		$content = $this->renderFile(ADDON_PATH . '/widgets/VoteAdd.html',$data);
		return $content;
	}
}
