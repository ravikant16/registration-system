<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_function{
    
    protected $CI;
    
    public function __construct()
    {
        $this->CI =& get_instance();
    }
    
    function add_log($user,$event_name,$table_name,$table_id){
        $CI =& get_instance();
        $CI->load->database();
        $data['user_id'] = $user;
        $data['user_ip'] = $CI->input->ip_address();
        $data['event_name'] = $event_name;
        $data['event_time'] = date('Y-m-d H:i:s');
        $data['table_name'] = $table_name;
        $data['table_id'] = $table_id;
        return $res = $CI->db->insert('log_report',$data);
    }
    
    public function permission_link(){
        $CI =& get_instance();
        $CI->load->library('session');
        $CI->load->database();
        $user_id = $CI->session->userdata('user_id');
        
        $CI->db->select('g.name');
        $CI->db->join('users u','u.id = ug.user_id');
        $CI->db->join('groups g','g.id = ug.group_id');
        $result = $CI->db->get_where('users_groups ug',array('u.id'=>$user_id))->result_array();
        return $result[0]['name'];
    }
    
    public function user_permission(){
        $CI =& get_instance();
        $CI->load->library('session');
        $CI->load->database();
        $user_id = $CI->session->userdata('user_id');
        
        $CI->db->select('permission');
        $result = $CI->db->get_where('users',array('id'=>$user_id))->result_array();
        
        $data = $result[0]['permission'];
        $data = explode(",",$data);
        
        if($this->permission_link() != 'admin'){
            $check = $CI->db->select('*')->get_where('global_permission',array('status'=>1,'p_id'=>13,'sch_id'=>$CI->session->userdata('school_id')))->result_array();
            if(count($check) > 0){
                $final = [];
                foreach($data as $d){
                    if($d != 13){
                        $final[] = $d;
                    }
                }
                return $final;
            }else{
                return $data;
            }
        }else{
            return $data;
        }
    }
 
    
    function generateNumericOTP() {
        $generator = "1357902468";
        $result = "";
        for ($i = 1; $i <= 4; $i++) {
            $result .= substr($generator, (rand()%(strlen($generator))), 1);
        }
        return $result;
    }    
}
