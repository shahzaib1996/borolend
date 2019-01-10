$(document).ready(function () {
    $("#state").change(function () {
        var val = $(this).val();
        if (val == "punjab") {
            $("#city").html("<option value='faisalabad'>Faisalabad</option><option value='gujranwala'>Gujranwala</option><option value='lahore'>Lahore</option><option value='rawalpindi'>Rawalpindi</option><option value='sialkot'>Sialkot</option><option value='bahawalpur'>Bahawalpur</option><option value='sargodha'>Sargodha</option><option value='rahimyarkhan'>Rahim Yar Khan</option><option value='mianwali'>Mianwali</option><option value='multan'>Multan</option>");
        } else if (val == "sindh") {
            $("#city").html("<option value='karachi'>Karachi</option><option value='hyderabad'>Hyderabad</option><option value='sukker'>Sukker</option><option value='larkana'>Larkana</option><option value='jamshoro'>Jamshoro</option>");
        } else if (val == "balochistan") {
            $("#city").html("<option value='quetta'>Quetta</option><option value='gawadar'>Gawadar</option><option value='chaman'>Chaman</option><option value='sibi'>Sibi</option><option value='dmj'>Dera Murad Jamali</option>");
        } else if (val == "khyber pakhtunkhwa") {
            $("#city").html("<option value='peshawar'>Peshawar</option><option value='mardan'>Mardan</option><option value='abbotabad'>Abbottabad</option><option value='dik'>Dera Ismail Khan</option><option value='nowshehra'>Nowshehra</option>");
        }
        
    });
});

$(document).ready(function () {
    $("#c-state").change(function () {
        var val = $(this).val();
        if (val == "punjab") {
            $("#c-city").html("<option value='faisalabad'>Faisalabad</option><option value='gujranwala'>Gujranwala</option><option value='lahore'>Lahore</option><option value='rawalpindi'>Rawalpindi</option><option value='sialkot'>Sialkot</option><option value='bahawalpur'>Bahawalpur</option><option value='sargodha'>Sargodha</option><option value='rahimyarkhan'>Rahim Yar Khan</option><option value='mianwali'>Mianwali</option><option value='multan'>Multan</option>");
        } else if (val == "sindh") {
            $("#c-city").html("<option value='karachi'>Karachi</option><option value='hyderabad'>Hyderabad</option><option value='sukker'>Sukker</option><option value='larkana'>Larkana</option><option value='jamshoro'>Jamshoro</option>");
        } else if (val == "balochistan") {
            $("#c-city").html("<option value='quetta'>Quetta</option><option value='gawadar'>Gawadar</option><option value='chaman'>Chaman</option><option value='sibi'>Sibi</option><option value='dmj'>Dera Murad Jamali</option>");
        } else if (val == "khyber pakhtunkhwa") {
            $("#c-city").html("<option value='peshawar'>Peshawar</option><option value='mardan'>Mardan</option><option value='abbotabad'>Abbottabad</option><option value='dik'>Dera Ismail Khan</option><option value='nowshehra'>Nowshehra</option>");
        }
        
    });
});



 $(document).ready(function(){
        $('#samecheckbox[type="checkbox"]').click(function(){
            if($(this).is(":checked")){
                var a = document.getElementById('add1').value;
                var b = document.getElementById('add2').value;
                var c = document.getElementById('state').value;
                var d = document.getElementById('city').value;
                var e = document.getElementById('pincode').value;
                if(a==="") {
                    alert("Please fill registered address");
                    document.getElementById('samecheckbox').checked = false;
                }
                else {
                    document.getElementById('cadd1').value = a;
                    document.getElementById('cadd2').value = b;
                    // document.getElementById('c-state').value = c;
                    // document.getElementById('c-city').value = d;
                    // document.getElementById('c-pincode').value = e;
                }
                
            }
            else if($(this).is(":not(:checked)")){
                
            }
        });
});


