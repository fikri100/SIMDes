<?php
class M_auth extends CI_Model
{

  function __construct(){
    parent::__construct();
    $this->load->library('email');
  }

  function masuk($nik,$pass){
      $user = $this->db->get_where('tbl_warga',array('nik' => $nik))->row();
      $hashpassword = $user->pass;

      if(password_verify($pass,$hashpassword)){
        // date_default_timezone_set('Asia/Jakarta');
        // $data['user_lastlogin']=date('Y-m-d H:i:s');
        // $this->updateUserbyemail($email,$data);
        return true;
      }else{
        return false;
      }
  }

  // Update
}
