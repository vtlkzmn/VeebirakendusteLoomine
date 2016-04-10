/** JavaScript bonus */
/* var boonus = 0;
function bonusButton() {
    boonus += 1;
    document.getElementById("points").innerHTML = "Boonus: " + boonus;
} */






/* data push */
function poll(){

	if(document.getElementById("getLatestEstate") != null){
  
	  $.get("getLatestEstate",function(data){
	    $("#getLatestEstate").html("<b>Created:</b> " + data.created 
	    	+ "<br>" + "<b>Subject:</b> " + data.subject
	    	+ "<br>" + "<b>Body:</b> " + data.body);
	  });

	  setTimeout(function(){
	    poll();
	  }, 10000); 

	}

}

/* kontrollime kas on midagi lisada andmebaasi */

function addToDatabase(a_last, d_last){
	// ajaxiga või millegi muuga peaks selle nüüd saatma 
	$.ajax({
        type: "POST",
        url: "/estates/addEstate",
        data: "subject="+a_last+"&body="+d_last, 
        success: function(data)
        {
            alert("Edukalt lisatud andmebaasi storage olnud failid!"); 
        },
        error: function(data){
        	// online method ei ole väga hea..
        	// seega peab kordama, kui ebaõnnestus
        	setTimeout(function(){
		   		addToDatabase(a_last,d_last);
		 	}, 10000); 
        }
    });
}

function kontrolliStorage(){

	if(window.navigator.onLine){
		var a_last = localStorage.address_offline_last;
		var d_last = localStorage.description_offline_last;
		if(typeof a_last === "undefined" || typeof d_last === "undefined"){
		// empty storage
		}
		else{
			
			addToDatabase(a_last,d_last);
			// eemaldame storge-st
			localStorage.removeItem("address_offline_last");
			localStorage.removeItem("description_offline_last");						
		}
	}
	else{
		// ootame veel, millal online tuleb
		setTimeout(function(){
		   	kontrolliStorage();
		}, 10000); 
	}	
}

kontrolliStorage();

window.addEventListener("online", function(e) {
	kontrolliStorage();
}, false);

$(window).load(function() {

	/* võrguühenduseta funktsionaalus  */
	if(document.getElementById("addEstate-button") != null){

		$("#addEstate-button").click(function(event)
		{
			if(window.navigator.onLine){
				var a = document.getElementById("address-offline").value;
				var d = document.getElementById("description-offline").value;
				if(a == "" || b ==  ""){
					alert("Pead täitma väljad!");
					event.preventDefault();
				}
			}
			else{
				event.preventDefault(); 
				var a = document.getElementById("address-offline").value;
				var d = document.getElementById("description-offline").value;
				localStorage.setItem("address_offline_last",a);
				localStorage.setItem("description_offline_last",d);
				// muudame tühjaks, et tunduks, et midagi lahedat toimus!
				document.getElementById("address-offline").value = "";
				document.getElementById("description-offline").value = "";				
				alert("Salvestasime aadressi:\""+a + "\" ja kirjelduse: \"" + d + "\"\nKui interneti ühenduse tuleb tagasi, siis see lisatakse!");
			}
		});
	}

	fillXML();

	if(document.getElementById("leheosade_hilisem") != null){
		var new_src = $('#leheosade_hilisem').attr('data-addsrc');
		document.getElementById("leheosade_hilisem").src = new_src;	
	}

	poll();
	
});

// XML-põhiste keelte kooskasutus
function fillXML(){



	if(document.getElementById("XML_stuff_here") != null){  // et valel lehel ei ole

		$.get("getMyXML",function(data){

			var start = '<table class="table"><thead><tr><th>Kõik elamud</th><th>Majad</th><th>Korterid</th></tr></thead><tbody>';
		    var end = '</tbody></table>';

	  		var elamud = data.getElementsByTagName("elamu");
	   		var korterid = data.getElementsByTagNameNS("http://www.myspecialurl_korterid.com","elamu");
	    	var majad = data.getElementsByTagNameNS("http://www.myspecialurl2_majad.com","elamu");

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
}

function info(obj){
	if(typeof obj === "undefined"){
		return "";	
	}
	else{
		return obj.getElementsByTagName("aadress")[0].innerHTML +" (" + obj.getAttribute("suurus") +")";
	} 
}




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
