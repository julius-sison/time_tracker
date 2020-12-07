(function($) {
	var url = "../wp-content/plugins/timetracker/";
	$.ajax({
		url:url+"getData.php",
		data:{data:""},
		type:'POST',
		success:function(e){
			var content = "";
			var data = JSON.parse(e);
			var _style = '';
			$.each(data,function(a,b){
				if(a>=5)
					_style = 'style="display:none;"';
				console.log(b);
				content += "<li "+_style+">"+(a+1)+". <img src='../wp-content/plugins/timetracker/img/screen/"+b.screen+"' width='100px' /><br/>"+b.date_time+"</li>";
			});
			$("#display_list").html(content);

			setTimeout(function(){
				var size_li = data.length;
				var x = 5;

				$('#display_content li:lt(3)').show();
				$('#display_loadMore').click(function(){
				    x=(x+5 <= size_li) ? x+5 : size_li;
				    $('#display_content li:lt('+x+')').show();
				});

				$('#display_showLess').click(function(){
				    x=(x-5<0) ? 5 : x-5;
				    $('#display_content li').not(':lt('+x+')').hide();
				});
			},1000);
		}
	});
})(jQuery);