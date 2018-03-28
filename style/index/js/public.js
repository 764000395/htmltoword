;$(function(){
	/* 栏目操作图标的隐藏和显示 */
	$('.left .first').on('mouseover', 'p', function() {
		/* Stuff to do when the mouse enters the element */
		if($(this).attr('status') == 'open' || $(this).attr('class') == 'fourth_title'){
			$(this).children('img').css('visibility', 'visible');
		}
	});
	$('.left .first').on('mouseout', 'p', function() {
		/* Stuff to do when the mouse leaves the element */
		$(this).children('img').css('visibility', 'hidden');
	});
	/* 点击栏目 其子栏目的隐藏和显示 */
	$('.left .first').on('click', 'p', function(event) {
		/* Act on the event */
		if($(this).attr('status') == 'open'){
			$(this).removeClass('on').children('img').css('visibility', 'hidden');
			$(this).next('ul').slideUp(100);
			$(this).attr('status', 'close');
		}else{
			$(this).addClass('on').children('img').css('visibility', 'visible');
			$(this).next('ul').slideDown(200);
			$(this).attr('status', 'open');
		}
	});

	/* 添加栏目 */
	$('.left .first').on('click', '.add', function(e) {
		e.stopPropagation(); //阻止事件向上冒泡到 P 而触发的标题点击收缩事件
		var rank = '';
		var this_rank = ($(this).parent('p').attr('class')).split("_")[0];
		switch(this_rank){
			case 'first':
			rank = 'second'; break;
			case 'second':
			rank = 'third'; break;
			case 'third':
			rank = 'fourth'; break;
		}
		
		//已经存在下一级的ul  直接添加li即可
		var html_has_ul = '<li><p class="'+rank+'_title">这是'+rank+'级标题<img class="add" src="./images/list-style/add.png" alt="添加子目录"><img class="write" src="./images/list-style/write.png" alt="编辑该目录下内容"></p></li>';
		
		//不存在下一级的ul  需将li添加上去
		var html_no_ul = '<ul class="'+rank+'" style="display: block">'+html_has_ul+'</ul>';
		if($(this).parent('p').next('ul').length < 1){
			//没有下一级的ul
			$(this).parent('p').after(html_no_ul);
		} else{
			$(this).parent('p').next('ul').append(html_has_ul);
		}

	});
});