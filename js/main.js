jQuery(document).ready(function($){
	getpage();
});
function getpage(href){
	if(href === undefined) {
		href = "explore";
	}
	$.ajax({
		url: 'http://www.zoeandgavin.com/server.php',
		data: "q="+href,
		type: 'get',
		success: function(data){
			success(data);	
		}
	});
}
function success(data){
	//change iframe src

	//append to page
	$(data).find("iframe").remove();
	//$(data).children("iframe").attr("src", "http://google.com");
	$("#container").html(data);
	setInterval(function(){
		$("#parchment, #container").css("background-color", "transparent");
		$(".TextInput").css("width", "80%");
	}, 100);
	$("#container a").live("click", function(){
		var href = $(this).attr("href");
		getpage(href);
		return false;
	});
}