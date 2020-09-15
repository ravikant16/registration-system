<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_ctrl extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in()){
            redirect(base_url());
        }
    }

    public function dashboard(){
        $id = $this->session->userdata('user_id');
        $data = array();
        $data['users'] = $this->db->select('*')->get_where('users',array('active'=>1,'id'=>$id))->result_array();
        $data['header'] = $this->load->view('users/common/header',$data,true);
        $data['footer'] = $this->load->view('users/common/footer',$data,true);
        $data['main'] = $this->load->view('users/pages/dashboard',$data,true);
        $this->load->view('users/index',$data);
    }

    function getUserData(){
        $id = $this->session->userdata('user_id');
        $this->db->select('*');
        $result = $this->db->get_where('user_data',array('status'=>1,'id'=>$id))->result_array();
        if(count($result) > 0){
            echo json_encode(array('data'=>$result,'status'=>200));
        }else{
            echo json_encode(array('data'=>'Record not found.','status'=>500));
        }
    }

    function addData(){
        $data = $this->input->post();
        $last_no = $this->session->userdata('user_id');
        if($last_no < 10){
            $last_no = '0'.$last_no;
        }
        $data['registration_no'] = date('Ydm').$last_no;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $this->session->userdata('user_id');
        $result = $this->db->insert('user_data',$data);
        if($result){
            echo json_encode(array('status'=>200,'msg'=>'Record update successfully.'));
        }else{
            echo json_encode(array('status'=>500,'msg'=>'Something went wrong. Please try again.'));
        }
    }

    function uploadIdentity(){
        $user_id = $this->session->userdata('user_id');
        $path = 'assets/images/student_profile/'.$user_id.'/';
        if(!is_dir($path)){
            //-----------create directory-------------
            mkdir($path,0755, true);
            
            //-----------add index.html page-----------
            $myFile = fopen($path."index.html", "w") or die("Unable to open file!");
            $txt = "<!DOCTYPE html><html><head><title>403 Forbidden</title></head><body><p>Directory access is forbidden.</p></body></html>";
            fwrite($myFile, $txt);
            fclose($myFile);
        }

        if(!empty($_FILES['identity']['name'])){
            $imageName=$_FILES['identity']['name'];
            $ext=pathinfo($imageName,PATHINFO_EXTENSION);
            $var_img_name = $user_id.'_'.time().".".$ext;
            $temp=$_FILES['identity']['tmp_name'];
            
            if(move_uploaded_file($temp,$path.$var_img_name)){
                $this->compressImage($_FILES['identity']['type'],$path.$var_img_name, 50);
            }
            echo json_encode(array('msg'=>'Image upload successfully.','govt_identity'=>$path.$var_img_name,'status'=>200));
        }else{
            echo json_encode(array('msg'=>'Something went wrong. Please try again.','status'=>500));
        }
    }

    function uploadProfile(){
        $user_id = $this->session->userdata('user_id');
        $path = 'assets/images/student_profile/'.$user_id.'/';
        if(!is_dir($path)){
            //-----------create directory-------------
            mkdir($path,0755, true);
            
            //-----------add index.html page-----------
            $myFile = fopen($path."index.html", "w") or die("Unable to open file!");
            $txt = "<!DOCTYPE html><html><head><title>403 Forbidden</title></head><body><p>Directory access is forbidden.</p></body></html>";
            fwrite($myFile, $txt);
            fclose($myFile);
        }

        if(!empty($_FILES['profile_pic']['name'])){
            $imageName=$_FILES['profile_pic']['name'];
            $ext=pathinfo($imageName,PATHINFO_EXTENSION);
            $var_img_name = $user_id.'_'.time().".".$ext;
            $temp=$_FILES['profile_pic']['tmp_name'];
            
            if(move_uploaded_file($temp,$path.$var_img_name)){
                $this->compressImage($_FILES['profile_pic']['type'],$path.$var_img_name, 50);
            }
            echo json_encode(array('msg'=>'Image upload successfully.','image_name'=>$path.$var_img_name,'status'=>200));
        }else{
            echo json_encode(array('msg'=>'Something went wrong. Please try again.','status'=>500));
        }
    }
    
    //------compress image-----------
    function compressImage($type,$path,$quality) {
	  $info = getimagesize($path);
	  if ($info['mime'] == 'image/jpeg') 
	    $image = imagecreatefromjpeg($path);

	  elseif ($info['mime'] == 'image/gif') 
	    $image = imagecreatefromgif($path);

	  elseif ($info['mime'] == 'image/png') 
	    $image = imagecreatefrompng($path);

	  elseif ($info['mime'] == 'image/jpg') 
	    $image = imagecreatefromjpg($path);    
	    
        imagejpeg($image, $path, $quality);
    }
}