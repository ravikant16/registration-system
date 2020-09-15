$(document).ready(function(){
	var baseUrl = $('#base_url').val();
	
	const loadForm = () => {
		var x='<form action="javascript:void(0);" id="student_form_data">'+
			'<div class="form-row">'+
				'<div class="form-group col-md-3">'+
					'<label for="first_name">First Name</label>'+
					'<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">'+
				'</div>'+

				'<div class="form-group col-md-3">'+
					'<label for="last_name">Last Name</label>'+
					'<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">'+
				'</div>'+

				'<div class="form-group col-md-3">'+
					'<label for="profile_picture">Add Photo</label>'+
					'<input type="file" class="form-control" name="profile_picture" id="profile_picture">'+
				'</div>'+
			'</div>'+

			'<div class="form-row">'+
				'<div class="form-group col-md-6">'+
					'<label for="email">Email</label>'+
					'<input type="email" class="form-control" name="email" id="email" placeholder="Email">'+
				'</div>'+

				'<div class="form-group col-md-3">'+
					'<label for="mobile_no">Mobile No.</label>'+
					'<input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="Mobile No.">'+
				'</div>'+

				'<div class="form-group col-md-3">'+
					'<label for="attr_mobile_no">Attr. Mobile No.</label>'+
					'<input type="text" class="form-control" name="attr_mobile_no" id="attr_mobile_no" placeholder="Alternate Mobile No.">'+
				'</div>'+
			'</div>'+

			'<div class="form-row">'+
				'<div class="form-group col-md-3">'+
					'<label for="dob">Date of Birth</label>'+
					'<input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth">'+
				'</div>'+

				'<div class="form-group col-md-3">'+
					'<label for="gender">Gender</label>'+
					'<select class="form-control" name="gender" id="gender">'+
					'<option value="">Select Gender</option>'+
						'<option value="Male">Male</option>'+
						'<option value="Female">Female</option>'+
					'</select>'+
				'</div>'+

				'<div class="form-group col-md-3">'+
					'<label for="aadhaar_no">Aadhaar_no</label>'+
					'<input type="number" class="form-control" name="aadhaar_no" id="aadhaar_no" placeholder="Aadhaar No.">'+
				'</div>'+

				'<div class="form-group col-md-3">'+
					'<label for="category">Category</label>'+
					'<select class="form-control" name="category" id="category">'+
						'<option value="">Select Category</option>'+
						'<option value="OBC">OBC</option>'+
						'<option value="SC">SC</option>'+
						'<option value="ST">ST</option>'+
						'<option value="EWS">EWS</option>'+
					'</select>'+
				'</div>'+
			'</div>'+

			'<div class="form-row">'+
				'<div class="form-group col-md-6">'+
					'<label for="father_name">Father Name</label>'+
					'<input type="text" class="form-control" name="father_name" id="father_name" placeholder="Father Name">'+
				'</div>'+

				'<div class="form-group col-md-6">'+
					'<label for="mother_name">Mother Name</label>'+
					'<input type="text" class="form-control" id="mother_name" placeholder="Mother Name">'+
				'</div>'+
			'</div>'+

			'<div class="form-group">'+
				'<label for="address">Address</label>'+
				'<textarea type="text" class="form-control" id="address" name="address" placeholder="Address"></textarea>'+
			'</div>'+
			
			'<div class="form-row">'+
				'<div class="form-group col-md-5">'+
					'<label for="city">City</label>'+
					'<input type="text" class="form-control" id="city" placeholder="City">'+
				'</div>'+
				
				'<div class="form-group col-md-4">'+
					'<label for="state">State</label>'+
					'<input type="text" class="form-control" id="state" placeholder="State">'+
				'</div>'+

				'<div class="form-group col-md-3">'+
					'<label for="pin_code">Pin Code</label>'+
					'<input type="number" class="form-control" id="pin_code" placeholder="Pin Code">'+
				'</div>'+
			'</div>'+

			'<div class="form-row">'+
				'<div class="form-group col-md-4">'+
					'<label for="profession">Profession</label>'+
					'<input type="text" class="form-control" id="profession" placeholder="Profession">'+
				'</div>'+
				
				'<div class="form-group col-md-4">'+
					'<label for="employee">Employee</label>'+
					'<input type="text" class="form-control" id="employee" placeholder="Employee">'+
				'</div>'+

				'<div class="form-group col-md-4">'+
					'<label for="education">Education</label>'+
					'<input type="number" class="form-control" id="education" placeholder="Education">'+
				'</div>'+
			'</div>'+
			
			'<div class="form-group">'+
				'<input type="checkbox"> I have confirm above data is correct.'+
			'</div>'+
			
			'<button id="submit_data" class="btn btn-primary">Submit</button>'+

			'</form>';

			$('#student_form').html(x);
	}
	loadForm();

	$('#student_form_data').validate({
		rules:{
			first_name:{required:true},
		},
	});

	$(document).on('click','#submit_data',function(){
		var formValidate = $('#student_form_data').valid();
		if(formValidate){
			alert(true);
		}
	});

});