var boonus = 0;
function bonusButton() {
    boonus += 1;
    document.getElementById("points").innerHTML = "Boonus: " + boonus;
}

//fuck, ei tea miks ei tööta kui php failist kustutan scripti ja siin uncommentin... proovige plz)
//
//    $.ajaxSetup({
//        headers: {
//            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//        }
//    });
//$(document).ready(function(){
//    $('#getRequest').click(function(){
//        $.get('addEstate/getRequest', function(data){
//            console.log(data);
//        });
//    });
//    $('#addEstate').submit(function(){
//        var subject = $('subject').val();
//        var name = $('name').val();
//
//        $.post('addEstate', {subject:subject, name:name}, function(data){
//            console.log(data);
//            $('#postRequestData').html(data);
//        });
//    });
//});