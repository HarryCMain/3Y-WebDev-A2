


	//Change in coutry dropdown list will trigger this function and
	//generate dropdown options for state dropdown
	$(document).on('change','#season', function() {
		var seasonid = $(this).val();
		if(seasonid != "") {
			$.ajax({
				url:"php/bookings.php",
				type:'POST',
				data:{seasonid:seasonid},
				success:function(response) {
					//var resp = $.trim(response);
					if(response != '') $("#route").removeAttr('disabled','disabled').html(response);
					else $("#route, #sailing").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
				}
			});
		} else {
			$("#route, #sailing").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
		}
	});



	//Change in state dropdown list will trigger this function and
	//generate dropdown options for city dropdown
	$(document).on('change','#route', function() {
		var routeid = $(this).val();
		if(routeid != "") {
			$.ajax({
				url:"php/bookings.php",
				type:'POST',
				data:{routeid:routeid},
				success:function(response) {
					if(response != '') $("#sailing").removeAttr('disabled','disabled').html(response);
					else $("#sailing").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
				}
			});
		} else {
			$("#sailing").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
		}
	});



