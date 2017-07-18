/*
      Author  : Suresh Pokharel
      Email   : suresh.wrc@gmail.com
      GitHub  : github.com/suresh021
      URL     : psuresh.com.np
      Date    : 7/18/2017
*/

$(document).ready(function() {
	$(".vdc").prop("disabled", true); // disable initially
	$(".district").prop("disabled", true); // disable initially


	$(".zone").select2({
		placeholder: "Select a zone",
		allowClear: true
	});

	$(".district").select2({
		placeholder: "Select a district",
		allowClear: true
	});

	$(".vdc").select2({
		placeholder: "Select a vdc",
		allowClear: true
	});
});


$(document.body).on("change","#zone",function(){
	//console.log(this.value);
	$.ajax({
		dataType : 'json',
		async: false,
		url:'process.php?zone_id=' + this.value,
		complete: function (response) {
            var result = JSON.parse(response.responseText);//parsing status from response received from php
            var newString = '';
            // console.log(result.data);
            for (var i = result.data.length - 1; i >= 0; i--) {
            	newString += "<option value = '"+result.data[i].id+"'>"+result.data[i].name+"</option>";
            }
            $('#district').html(newString);
            $(".district").prop("disabled", false); // enable district
        }
    });
});

$(document.body).on("change","#district",function(){
	//console.log(this.value);
	$.ajax({
		dataType : 'json',
		async: false,
		url:'process.php?district_id=' + this.value,
		complete: function (response) {
            var result = JSON.parse(response.responseText);//parsing status from response received from php
            var newString = '';
            // console.log(result.data);
            for (var i = result.data.length - 1; i >= 0; i--) {
            	newString += "<option value = 'new'>"+result.data[i].name+"</option>";
            }
            $('#vdc').html(newString);
            $(".vdc").prop("disabled", false); // enable district
        }
    });
});