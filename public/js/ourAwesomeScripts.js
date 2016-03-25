var boonus = 0;
function bonusButton() {
    boonus += 1;
    document.getElementById("points").innerHTML = "Boonus: " + boonus;
}

$(window).load(
	function() {
		$('div[data-addsrc]').each(function(index){
			var src = $(this).attr('data-addsrc');
			$(this).html('<img class="img-responsive" alt="" src="' +src+ '">');
		})
	}
)

$(document).ready(function(){
	$('#getRequest').click(function(){
		$.get('addEstate/getRequest', function(data){
			console.log(data);
		});
	});
});


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
					});
				}
			}, 350))
		}
	}
});

$.(document).ready(function(){
	$('body').on('click', 'pagination a', function(e){
		e.preventDefault();
		var url = $(this).attr('href');
		$.get(url, function(data){
			$('.posts').html(data);
		});
	});
});