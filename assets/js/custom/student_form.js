$(document).ready(function(){
	var baseUrl = $('#base_url').val();
	
	function getRecord(){
		$.ajax({
			type:'GET',
			url:baseUrl+'User_ctrl/getUserData',
			data:{},
			beforeSend:function(){},
			success:function(response){
				if(response.status == 200){
					
				}else{
					alert(response.msg);
				}
			},
		});
	}



	$('#student_form_data').validate({
		rules:{
			first_name:{required:true},
			last_name:{required:true},
			profile_picture:{required:true},
			email:{required:true},
			mobile_no:{required:true},
			//attr_mobile_no:{required:true},
			dob:{required:true},
			gender:{required:true},
			aadhaar_no:{required:true,minlength:12,maxlength:12},
			category:{required:true},
			father_name:{required:true},
			mother_name:{required:true},
			address:{required:true},
			city:{required:true},
			state:{required:true},
			pin_code:{required:true,minlength:6,maxlength:6},
			profession:{required:true},
			employee:{required:true},
			education:{required:true},
			confirm:{required:true},
			govt_issued_id:{required:true},
		},
		message:{
			confirm:'Please confirm.',
			aadhaar_no:'Please enter valid aadhaar no.',
			pin_code: 'Please enter valid pin code.',
			confirm:'Please confirm.'
		},
	});

	$(document).on('click','#submit_data',function(){
		var formValidate = $('#student_form_data').valid();
		if(formValidate){
			var govt_issued_id = $("input[name='govt_issued_id']:checked").val();

			var formData = new FormData();
			formData.append('first_name',$('#first_name').val());
			formData.append('last_name',$('#last_name').val());
			formData.append('image_name',$('#image_name').val());
			formData.append('email',$('#email').val());
			formData.append('mobile_no',$('#mobile_no').val());
			formData.append('attr_mobile_no',$('#attr_mobile_no').val());
			formData.append('dob',$('#dob').val());
			formData.append('gender',$('#gender').val());
			formData.append('aadhaar_no',$('#aadhaar_no').val());
			formData.append('category',$('#category').val());
			formData.append('father_name',$('#father_name').val());
			formData.append('mother_name',$('#mother_name').val());
			formData.append('address',$('#address').val());
			formData.append('city',$('#city').val());
			formData.append('state',$('#state').val());
			formData.append('pin_code',$('#pin_code').val());
			formData.append('profession',$('#profession').val());
			formData.append('employee',$('#employee').val());
			formData.append('education',$('#education').val());
			formData.append('govt_issued_id',govt_issued_id);
			formData.append('govt_identity',$('#govt_identity').val());
			
			$.ajax({
				type:'POST',
				url:baseUrl+'User_ctrl/addData',
				data:formData,
				dataType:'json',
				beforeSend:function(){},
				success:function(response){
					if(response.status == 200){
						alert(response.msg);
						location.reload();
					}else{
						alert(response.msg);
					}
				},
				error:function(){
					alert('Something went wrong. Please try again.');
				},
				cache:false,
				processData:false,
				contentType:false
			});
		}else{
			$([document.documentElement, document.body]).animate({
				scrollTop: $(".error").offset().top
			}, 2000);
		}
	});

	$(document).on('click','.govt_issued_id',function(){
		var identity_label = $(this).val();
		if(identity_label == 'pan_card'){
			var label = 'Pan Card';
		}else{
			var label = 'Voter ID';
		}
		$('#identity_label').html(label);
		$('#identity_div').css('display','block');
	});

	$(document).on('change','#identity',function(){
		var identity = $('#identity').val();
        if (identity) {
            //-----get image extension-------------
            var img_ext = identity.split('.').pop().toUpperCase();
            //-----get image size-----------------
            var img_size = $('#identity')[0].files[0].size;
            //------validate extension-----------
            if (img_ext != 'JPG' && img_ext != 'JPEG' && img_ext != 'PNG') {
                $('#identity_err').html('wrong file formate.').css('display', 'block');
                return false;
            } else {
                $('#identity_err').css('display', 'none');
            }
            if (img_size >= '1000000') { //-----size validation-----------
                $('#identity_err').html('file size should be less than 1mb.').css('display', 'block');
                return false;
            } else {
                $('#identity_err').css('display', 'none');
            }
        }

        var imageData = new FormData();
        imageData.append('identity', $('#identity')[0].files[0]);

        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    var percent = 0;
                    var position = event.loaded || event.position; /*event.position is deprecated*/
                    var total = event.total;
                    if (evt.lengthComputable) {
                        //var percent = (evt.loaded / evt.total) * 100;
                        percent = Math.ceil(position / total * 100);
                        //Do something with upload progress here
                        uploadProgress(event, position, total, percent);
                    }
                }, false);
                return xhr;
            },
            type: 'POST',
            url: baseUrl + 'User_ctrl/uploadIdentity',
            data: imageData,
            dataType: 'json',
            beforeSend: function() {
                $('#progress1_div').css('display', 'block');
                var percentVal = '0%';
                $('#ba1r').width(percentVal)
                $('#percent1').html(percentVal);
            },
            success: function(response) {
				if(response.status == 200){
					$('#govt_identity').val(response.govt_identity);
					var percentVal = '100%';
					$('#bar1').width(percentVal);
					$('#bar1').css('background-color', '#4caf50');
					$('#percent1').html(percentVal);

					$('#identity').css('display','none');
					$('#show_identity_image').html('<img width="200" height="100" src="'+baseUrl+response.govt_identity+'" />').css('display','block');
					$("#progress1_div").fadeOut(3000, function() { $(this).remove(); });
				}else{
					alert(response.msg);
				}
            },
            cache: false,
            processData: false,
            contentType: false
        });
	});


	$(document).on('change', '#profile_picture', function() {
        var profile_pic = $('#profile_picture').val();
        if (profile_pic) {
            //-----get image extension-------------
            var img_ext = profile_pic.split('.').pop().toUpperCase();
            //-----get image size-----------------
            var img_size = $('#profile_picture')[0].files[0].size;
            //------validate extension-----------
            if (img_ext != 'JPG' && img_ext != 'JPEG' && img_ext != 'PNG') {
                $('#profile_picture_err').html('wrong file formate.').css('display', 'block');
                return false;
            } else {
                $('#profile_picture_err').css('display', 'none');
            }
            if (img_size >= '1000000') { //-----size validation-----------
                $('#profile_picture_err').html('file size should be less than 1mb.').css('display', 'block');
                return false;
            } else {
                $('#photo_err').css('display', 'none');
            }
        }

        var imageData = new FormData();
        imageData.append('profile_pic', $('#profile_picture')[0].files[0]);

        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    var percent = 0;
                    var position = event.loaded || event.position; /*event.position is deprecated*/
                    var total = event.total;
                    if (evt.lengthComputable) {
                        //var percent = (evt.loaded / evt.total) * 100;
                        percent = Math.ceil(position / total * 100);
                        //Do something with upload progress here
                        uploadProgress(event, position, total, percent);
                    }
                }, false);
                return xhr;
            },
            type: 'POST',
            url: baseUrl + 'User_ctrl/uploadProfile',
            data: imageData,
            dataType: 'json',
            beforeSend: function() {
                $('#progress_div').css('display', 'block');
                var percentVal = '0%';
                $('#bar').width(percentVal)
                $('#percent').html(percentVal);
            },
            success: function(response) {
				if(response.status == 200){
					$('#image_name').val(response.image_name);
					var percentVal = '100%';
					$('#bar').width(percentVal);
					$('#bar').css('background-color', '#4caf50');
					$('#percent').html(percentVal);

					$('#profile_picture').css('display','none');
					$('#show_image').html('<img width="200" height="200" src="'+baseUrl+response.image_name+'" />').css('display','block');
					$("#progress_div").fadeOut(3000, function() { $(this).remove(); });
				}else{
					alert(response.msg);
				}
            },
            cache: false,
            processData: false,
            contentType: false
        });
    });

    function uploadProgress(event, position, total, percent) {
        var percentVal = percent + '%';
        $('#bar').width(percentVal)
        $('#percent').html(percentVal);
	}
	
});