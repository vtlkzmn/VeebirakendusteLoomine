/** JavaScript bonus */
/* var boonus = 0;
function bonusButton() {
    boonus += 1;
    document.getElementById("points").innerHTML = "Boonus: " + boonus;
} */




/* data push */
function poll(){
  $.get("getLatestEstate",function(data){
    $("#getLatestEstate").html("<b>Created:</b> " + data.created 
    	+ "<br>" + "<b>Subject:</b> " + data.subject
    	+ "<br>" + "<b>Body:</b> " + data.body);
  });

  setTimeout(function(){
    poll();
  }, 10000); 

}

$(window).load(function() {

	var new_src = $('#leheosade_hilisem').attr('data-addsrc');
	document.getElementById("leheosade_hilisem").src = new_src;

	poll();
	
});






$(document).ready(function(){
	$('#getRequest').click(function(){
		$.get('/getRequest', function(data){
			console.log(data);
		});
	});
});



//uue posti lehe laadimine toimub ilma terve lehte uue laadimist AJAXi kaudu
$(document).ready(function(){
	$(window).scroll(fetchPosts);
	function fetchPosts() {
		var page = $('.endless-pagination').data('next-page');

		if (page !== null) {
			clearTimeout( $.data( this, "scrollCheck" ));

			$.data( this, "scrollCheck", setTimeout(function() {
				var scroll_position_for_posts_load = $(window).height() + $(window).scrollTop() + 100;

				if(scroll_position_for_posts_load >= $(document).height()){
					$.get(page, function(data){
						$('.endless-pagination').data('next-page', data.next_page);
						$('.posts').append(data.posts);
                        console.log("AJAX works pretty good");
					});
				}
			}, 350))
		}
	}
});
