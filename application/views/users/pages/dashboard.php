<script type="text/javascript" src="<?=base_url('assets/js/custom/student_form.js?ver=1.0.0');?>"></script>

<div class="container-fluid">
    <form action="javascript:void(0);" id="student_form_data">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
            </div>
            <div class="form-group col-md-3">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
            </div>
            <div class="form-group col-md-3">
                <label for="profile_picture">Add Photo</label>
                <div id="show_image" style="display:none"></div>
                <input type="file" accept='image/*' class="form-control" name="profile_picture" id="profile_picture">
                <div class="error" style="display:none;" id="profile_picture_err"></div>
                <div class="progress" id="progress_div" style="display: none;">
                    <div class="bar" id="bar"></div>
                    <div class="percent" id="percent">0%</div>
                </div>
                <input type="hidden" class="form-control" name="image_name" id="image_name" />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" readonly value="<?php if(isset($users)){ echo $users[0]['email'];}
                ?>" class="form-control" name="email" id="email" placeholder="Email">
            </div>

            <div class="form-group col-md-3">
                <label for="mobile_no">Mobile No.</label>
                <input type="text" class="form-control" readonly value="<?php if(isset($users)){ echo $users[0]['phone'];}
                ?>" name="mobile_no" id="mobile_no" placeholder="Mobile No.">
            </div>
            <div class="form-group col-md-3">
                <label for="attr_mobile_no">Attr. Mobile No.</label>
                <input type="text" class="form-control" name="attr_mobile_no" id="attr_mobile_no"
                    placeholder="Alternate Mobile No.">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth">
            </div>
            <div class="form-group col-md-3">
                <label for="gender">Gender</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="aadhaar_no">Aadhaar No.</label>
                <input type="number" class="form-control" name="aadhaar_no" id="aadhaar_no" placeholder="Aadhaar No.">
            </div>
            <div class="form-group col-md-3">
                <label for="category">Category</label>
                <select class="form-control" name="category" id="category">
                    <option value="">Select Category</option>
                    <option value="OBC">OBC</option>
                    <option value="SC">SC</option>
                    <option value="ST">ST</option>
                    <option value="EWS">EWS</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="father_name">Father Name</label>
                <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Father Name">
            </div>
            <div class="form-group col-md-6">
                <label for="mother_name">Mother Name</label>
                <input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Mother Name">
            </div>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea type="text" class="form-control" id="address" name="address" placeholder="Address"></textarea>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="city">City</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="City">
            </div>
            <div class="form-group col-md-4">
                <label for="state">State</label>
                <input type="text" class="form-control" name="state" id="state" placeholder="State">
            </div>
            <div class="form-group col-md-3">
                <label for="pin_code">Pin Code</label>
                <input type="number" class="form-control" name="pin_code" id="pin_code" placeholder="Pin Code">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="profession">Profession</label>
                <input type="text" class="form-control" name="profession" id="profession" placeholder="Profession">
            </div>
            <div class="form-group col-md-4">
                <label for="employee">Employee</label>
                <input type="text" class="form-control" name="employee" id="employee" placeholder="Employee">
            </div>
            <div class="form-group col-md-4">
                <label for="education">Education</label>
                <input type="text" class="form-control" name="education" id="education" placeholder="Education">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="govt_issued_id">Govt. issued ID</label> <br/>
                <input type="radio" value="pan_card" id="pan_card" name="govt_issued_id" class="govt_issued_id"> Pan Card,
                <input type="radio" value="voter_id" id="voter_id" name="govt_issued_id" class="govt_issued_id"> Voter ID
            </div>

            <div class="form-group col-md-4" id="identity_div" style="display:none;">
            <label for="identity" id="identity_label"></label>
                <div id="show_identity_image" style="display:none"></div>
                <input type="file" accept='image/*' id="identity" name="identity" id="identity" class="form-control">
                <div class="error" style="display:none;" id="identity_err"></div>
                <div class="progress" id="progress1_div" style="display: none;">
                    <div class="bar" id="bar1"></div>
                    <div class="percent" id="percent1">0%</div>
                </div>
                <input type="hidden" class="form-control" name="govt_identity" id="govt_identity" />
            </div>

        </div>

        <div class="form-group">
            <input type="checkbox" name="confirm"> I confirm the above information is correct.
        </div>
        <button id="submit_data" class="btn btn-primary">Submit</button>
    </form>
</div>
