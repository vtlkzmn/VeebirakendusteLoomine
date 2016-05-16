function poll() {
	null != document.getElementById("getLatestEstate") && ($.get("getLatestEstate", function(e) {
		$("#getLatestEstate").html("<b>Created:</b> " + e.created + "<br><b>Subject:</b> " + e.subject + "<br><b>Body:</b> " + e.body)
	}), setTimeout(function() {
		poll()
	}, 1e4))
}

function addToDatabase(e, t) {
	$.ajax({
		type: "POST",
		url: "/estates/addEstate",
		data: "subject=" + e + "&body=" + t,
		success: function(e) {
			alert("Edukalt lisatud andmebaasi storage olnud failid!")
		},
		error: function(a) {
			setTimeout(function() {
				addToDatabase(e, t)
			}, 1e4)
		}
	})
}

function kontrolliStorage() {
	if (window.navigator.onLine) {
		var e = localStorage.address_offline_last,
			t = localStorage.description_offline_last;
		"undefined" == typeof e || "undefined" == typeof t || (addToDatabase(e, t), localStorage.removeItem("address_offline_last"), localStorage.removeItem("description_offline_last"))
	} else setTimeout(function() {
		kontrolliStorage()
	}, 1e4)
}

function fillXML() {
	null != document.getElementById("XML_stuff_here") && $.get("getMyXML", function(e) {
		var t = '<table class="table"><thead><tr><th>Kõik elamud</th><th>Majad</th><th>Korterid</th></tr></thead><tbody>',
			a = "</tbody></table>",
			n = e.getElementsByTagName("elamu"),
			o = e.getElementsByTagNameNS("http://www.myspecialurl_korterid.com", "elamu"),
			l = e.getElementsByTagNameNS("http://www.myspecialurl2_majad.com", "elamu"),
			d = "";
		for (i = 0; i < n.length; i++) d += "<tr>", d += "<td>", d += info(n[i]), d += "</td>", d += "<td>", d += info(l[i]), d += "</td>", d += "<td>", d += info(o[i]), d += "</td>", d += "</tr>";
		document.getElementById("XML_stuff_here").innerHTML = t + d + a
	})
}

function info(e) {
	return "undefined" == typeof e ? "" : e.getElementsByTagName("aadress")[0].innerHTML + " (" + e.getAttribute("suurus") + ")"
}
"undefined" == typeof jQuery && (document.write(unescape("%3Cscript src='/js/jquery.js' type='text/javascript'%3E%3C/script%3E")), document.write(unescape("%3Cscript src='/js/jquery-1.12.3.min.js' type='text/javascript'%3E%3C/script%3E"))), kontrolliStorage(), window.addEventListener("online", function(e) {
	kontrolliStorage()
}, !1), $(window).load(function() {
	if (null != document.getElementById("addEstate-button") && $("#addEstate-button").click(function(e) {
			if (window.navigator.onLine) {
				var t = document.getElementById("address-offline").value,
					a = document.getElementById("description-offline").value;
				("" == t || "" == b) && (alert("Pead täitma väljad!"), e.preventDefault())
			} else {
				e.preventDefault();
				var t = document.getElementById("address-offline").value,
					a = document.getElementById("description-offline").value;
				localStorage.setItem("address_offline_last", t), localStorage.setItem("description_offline_last", a), document.getElementById("address-offline").value = "", document.getElementById("description-offline").value = "", alert('Salvestasime aadressi:"' + t + '" ja kirjelduse: "' + a + '"\nKui interneti ühenduse tuleb tagasi, siis see lisatakse!')
			}
		}), fillXML(), null != document.getElementById("leheosade_hilisem")) {
		var e = $("#leheosade_hilisem").attr("data-addsrc");
		document.getElementById("leheosade_hilisem").src = e
	}
	poll()
}), $(document).ready(function() {
	function e() {
		var e = $(".endless-pagination").data("next-page");
		null !== e && (clearTimeout($.data(this, "scrollCheck")), $.data(this, "scrollCheck", setTimeout(function() {
			var t = $(window).height() + $(window).scrollTop() + 100;
			t >= $(document).height() && $.get(e, function(e) {
				$(".endless-pagination").data("next-page", e.next_page), $(".posts").append(e.posts)
			})
		}, 350)))
	}
	$(window).scroll(e)
});