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

// XML-põhiste keelte kooskasutus
function fillXML(){

	$.get("getMyXML",function(data){

		  var start = '<table class="table"><thead><tr><th>Kõik elamud</th><th>Korterid</th><th>Majad</th></tr></thead><tbody>';
	    var end = '</tbody></table>';

  		var elamud = data.getElementsByTagName("elamu");
      var majad = data.getElementsByTagNameNS("http://www.myspecialurl_korterid.com","elamu");
      var korterid = data.getElementsByTagNameNS("http://www.myspecialurl2_majad.com","elamu");

  		var content = "";

  		for(i = 0 ; i < elamud.length; i++){
  			content +="<tr>";

        content +="<td>";
        content += info(elamud[i]);
        content +="</td>";

  			content +="<td>";
  			content += info(majad[i]);
  			content +="</td>";

  			content +="<td>";
  			content += info(korterid[i]);
  			content +="</td>";

  			content +="</tr>";
  		}
  		document.getElementById("XML_stuff_here").innerHTML =start+content+end;      
 	});
}

function info(obj){
	if(typeof obj === "undefined"){
		return "";	
	}
	else{
		return obj.getElementsByTagName("aadress")[0].innerHTML +" (" + obj.getAttribute("suurus") +")";
	} 
}

fillXML();



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
