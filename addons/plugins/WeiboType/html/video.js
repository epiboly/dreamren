jQuery.extend(weibo.plugin, {
	video:function(element, options){
	   
	    
	}
});


jQuery.extend(weibo.plugin.video, {
    type:'新浪播客、优酷网、土豆网、酷6网、搜狐',
	html:function(){
	    return '<dl id="video_input" class="layer_upload_video"><dt>请输入'+weibo.plugin.video.type+'的视频播放页链接： </dt><dd><input name="publish_type_data" type="text" style="width: 320px" class="text mr5" value="" /><input type="button" class="btn_b" onclick="weibo.plugin.video.add_video()" value="添加"></dd></dl><div style="display:none"    id="video_add_complete">添加完成</div>';
	},
	click:function(options){
	   weibo.publish_type_box(this.html(),options)
	},
	add_video:function(){
		var video_url = $("input[name='publish_type_data']").val();
		$.post( U('home/widget/addonsRequest'),{addon:'WeiboType',hook:'paramUrl',url:video_url},function(txt){
			txt = eval('('+txt+')');
			if(txt.boolen){
				$('#video_input').hide();
				$('#video_add_complete').show();
				$("#content_publish").val( $("#content_publish").val( ) + ' ' + txt.data + ' ');
                weibo.publish_type_val(txt.publish_type);
                weibo.checkInputLength(_LENGTH_);
				$('div .talkPop').hide();
			}else{
				ui.error("只支持"+weibo.plugin.video.type);
			}
		})
	}
});

function switchVideo(id,type,host,flashvar){
	if( type == 'close' ){
		$("#video_mini_show_"+id).show();
		$("#video_content_"+id).html( '' );
		$("#video_show_"+id).hide();
	}else{
		$("#video_mini_show_"+id).hide();
		$("#video_content_"+id).html( showFlash(host,flashvar) );
		$("#video_show_"+id).show();
		
	}
}

//显示视频
function showFlash( host, flashvar) {
	var flashAddr = {
		'youku.com' : 'http://player.youku.com/player.php/sid/FLASHVAR/v.swf',
		'ku6.com' : 'http://player.ku6.com/refer/FLASHVAR/v.swf',
		//'sina.com.cn' : 'http://vhead.blog.sina.com.cn/player/outer_player.swf?vid=FLASHVAR',
		'sina.com.cn' : 'http://you.video.sina.com.cn/api/sinawebApi/outplayrefer.php/vid=FLASHVAR/s.swf',
		//'tudou.com' : 'http://www.tudou.com/v/FLASHVAR',
		'tudou.com' : 'http://www.tudou.com/v/FLASHVAR/&autoPlay=true/v.swf',
		'youtube.com' : 'http://www.youtube.com/v/FLASHVAR',
		'5show.com' : 'http://www.5show.com/swf/5show_player.swf?flv_id=FLASHVAR',
		//'sohu.com' : 'http://v.blog.sohu.com/fo/v4/FLASHVAR',
		'sohu.com' : 'http://share.vrs.sohu.com/FLASHVAR/v.swf',
		'mofile.com' : 'http://tv.mofile.com/cn/xplayer.swf?v=FLASHVAR',
		'music' : 'FLASHVAR',
		'flash' : 'FLASHVAR'
	};
	var videoFlash = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="430" height="400">'
        + '<param value="transparent" name="wmode"/>'
		+ '<param value="FLASHADDR" name="movie" />'
		+ '<embed src="FLASHADDR" wmode="transparent" allowfullscreen="true" type="application/x-shockwave-flash" width="430" height="400"></embed>'
		+ '</object>';
	var flashHtml = videoFlash;

	flashvar = encodeURI(flashvar);
	if(flashAddr[host]) {
		var flash = flashAddr[host].replace('FLASHVAR', flashvar);
		flashHtml = flashHtml.replace(/FLASHADDR/g, flash);
	}

	return flashHtml;
}
