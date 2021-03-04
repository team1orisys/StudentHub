<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
   
   
      
   /*@function name:addstudent**
    **student registration form**
    **@date:04/03/2021**/
   
        public function addstudent()
        {
            $this->load->view('addstudent');
        }
   /*@function name:studinsert**
    **insertion of student details**
    **@date:04/03/2021**/
    public function studinsert()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("ad_no","admission number",'required');
        $this->form_validation->set_rules("rollno","rollno",'required');
        $this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("gender","gender",'required');
        $this->form_validation->set_rules("dob","date of birth",'required');
        $this->form_validation->set_rules("father","father",'required');
        $this->form_validation->set_rules("mother","mother",'required');
        $this->form_validation->set_rules("address","address",'required');
        $this->form_validation->set_rules("phone","phone",'required');
        $this->form_validation->set_rules("p_phone","parent phone",'required');
        $this->form_validation->set_rules("ad_date","admission date",'required');
        $this->form_validation->set_rules("religion","religion",'required');
        $this->form_validation->set_rules("cast","cast",'required');
        $this->form_validation->set_rules("category","category",'required');
        $this->form_validation->set_rules("blood","blood",'required');
        $this->form_validation->set_rules("nationality","nationality",'required');
        $this->form_validation->set_rules("state","state",'required');
        $this->form_validation->set_rules("district","district",'required');
        $this->form_validation->set_rules("taluk","taluk",'required');
        $this->form_validation->set_rules("panchayath","panchayath",'required');
        $this->form_validation->set_rules("block","block",'required');
        $this->form_validation->set_rules("income","income",'required');
        $this->form_validation->set_rules("aadhar","aadhar",'required');
        $this->form_validation->set_rules("project","project",'required');
         $this->form_validation->set_rules("batch","batch",'required');
        $this->form_validation->set_rules("skills","skills",'required');
        $this->form_validation->set_rules("h_qualification","highest qualification",'required');
        $this->form_validation->set_rules("passingdate","passingdate",'required');
        $this->form_validation->set_rules("sslcmark","sslcmark",'required');
        $this->form_validation->set_rules("hsemark","hsemark",'required');
        $this->form_validation->set_rules("ugmark","ugmark",'required');
        $this->form_validation->set_rules("pgmark","pgmark",'required');
        $this->form_validation->set_rules("username","username",'required');
        $this->form_validation->set_rules("password","password",'required');
        if($this->form_validation->run())
        {
         $this->load->model('mainmodel');
         $pass=$this->input->post("password");
         $encpass=$this->mainmodel->encpas($pass);
          $a=array("ad_no"=>$this->input->post("ad_no"),
                 "rollno"=>$this->input->post("rollno"),
                "name"=>$this->input->post("name"),
                "email"=>$this->input->post("email"),
                "gender"=>$this->input->post("gender"),
                "dob"=>$this->input->post("dob"),
                "father"=>$this->input->post("father"),
                 "mother"=>$this->input->post("mother"),
                "address"=>$this->input->post("address"),
                "phone"=>$this->input->post("phone"),
                "p_phone"=>$this->input->post("p_phone"),
                "ad_date"=>$this->input->post("ad_date"),
                "religion"=>$this->input->post("religion"),
                 "caste"=>$this->input->post("caste"),
                "category"=>$this->input->post("category"),
                "blood"=>$this->input->post("blood"),
                "nationality"=>$this->input->post("nationality"),
                "state"=>$this->input->post("state"),
                "district"=>$this->input->post("district"),
                 "taluk"=>$this->input->post("taluk"),
                "panchayath"=>$this->input->post("panchayath"),
                "block"=>$this->input->post("block"),
                "income"=>$this->input->post("income"),
                "aadhar"=>$this->input->post("aadhar"),
                "project"=>$this->input->post("project"),
                 "batch"=>$this->input->post("batch"),
                "skills"=>$this->input->post("skills"),
                "h_qualification"=>$this->input->post("h_qualification"),
                "stream"=>$this->input->post("stream"),
                "passingdate"=>$this->input->post("passingdate"),
                "sslcmark"=>$this->input->post("sslcmark"),
                 "hsemark"=>$this->input->post("hsemark"),
                "ugmark"=>$this->input->post("ugmark"),
                "pgmark"=>$this->input->post("pgmark")
               );
         $b=array("username"=>$this->input->post("username"),
                  "password"=>$encpass,
                    "usertype"=>'1');
        $this->mainmodel->studinsert($a,$b); 
        }
    } 
    /*@function name:treg**
    **Trainer registration form**
    **@date:04/03/2021**/
     public function treg()
    {
        $this->load->view('tregister');
    }
   /*@function name:trinsert**
    **trainer details insertion**
    **@date:04/03/2021**/
     public function trinsert()
     {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("username","username",'required');
        $this->form_validation->set_rules("password","password",'required');
        if($this->form_validation->run())
        {
         $this->load->model('mainmodel');
         $pass=$this->input->post("password");
         $encpass=$this->mainmodel->encpas($pass);
         $c=array("username"=>$this->input->post("username"),
                  "password"=>$encpass,
                    "usertype"=>'2');
        $this->mainmodel->trinsert($c); 
        }
     } 
     /*@function name:log**
    **Login form**
    **@date:04/03/2021**/
    public function log()
    {
        $this->load->view('login');
    }
    /*@function name:loginaction**
    **login process**
    **@date:04/03/2021**/
    public function loginaction()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("username","username",'required');
        $this->form_validation->set_rules("password","password",'required');
            if($this->form_validation->run())
            {
                $this->load->model('mainmodel');
                $username=$this->input->post("username");
                $pass=$this->input->post("password");
                $rslt=$this->mainmodel->selectpass($username,$pass);
                if($rslt)
                {
                    $id=$this->mainmodel->getuserid($username);
                    $user=$this->mainmodel->getuser($id);
                    $this->load->library(array('session'));
                    $this->session->set_userdata(array('id'=>$user->id,'status'=>$user->userstatus,'usertype'=>$user->usertype,'logged_in'=>(bool)true));
                    if($_SESSION['status']=='1' && $_SESSION['usertype']=='1'&& $_SESSION['logged_in']==true)
                     {
                                redirect(base_url().'main/studhome');
                     }
                    elseif($_SESSION['status']=='1' && $_SESSION['usertype']=='0' && $_SESSION['logged_in']==true)
                      {
                            redirect(base_url().'main/adminhome');
                      }
                  elseif($_SESSION['status']=='1' && $_SESSION['usertype']=='2' && $_SESSION['logged_in']==true)
                    {
                            redirect(base_url().'main/trainerhome');
                    }
                  
                   else
                    {
                        echo "Waiting for Approval";
                    }
                }
                    else
                    {
                        echo "invalid user";
                    }
            }
                else
                {
                    redirect('main/log','refresh');
                }
        }
    /*@function name:adminhome**
    **trainer index**
    **@date:04/03/2021**/
 public function trainerindex()
 {
    if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
    {
                $this->load->view('trainerindex');  
    }
    else
    {
        redirect('main/index','refresh');
    }
    
  }
   /*@function name:adminhome**
    **student index**
    **@date:04/03/2021**/
 public function studindex()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='1')
        {
            $this->load->view('studindex');  
        }
        else
        {
        redirect('main/index','refresh');
        }
    }       
     
      /*@function name:updatestud**
    **updation of student**
    **@date:04/03/2021**/
        public function updatestud()
        {
            $this->load->view('student_profile');
        }
     
     /**********Grievance page
  @team1
  @4/03/2021
  @module student
  @add complaint
  ********/

public function grievance()
{

    $this->load->view('grievance');
}
 /**********Grievance action
  @team1
  @4/03/2021
  @module student
  @add complaint
  ********/

public function grievanceaction()
{

    $this->load->library('form_validation');
    $this->form_validation->set_rules("griev_to","griev_to",'required');
    $this->form_validation->set_rules("subject","subject",'required');
    $this->form_validation->set_rules("message","message",'required');
    if($this->form_validation->run())
    {

      $this->load->model('mainmodel');
      $a=array("griev_to"=>$this->input->post("griev_to"),
           "subject"=>$this->input->post("subject"),
           "message"=>$this->input->post("message"));
        $this->mainmodel->grievanceaction($a);
        redirect(base_url().'main/grievance');
    }
  }
  /*****@team1*****/
/***04/03/2021**/
/***@student***/

/***grievance***/
public function grievance()
{
$this->load->view('grievance');
}

/***04/03/2021**/
/***@student and trainer***/

/***leave application form***/
public function leaveapplication()
{
$this->load->view('leaveapplication');
}
public function leave_action()
{
$this->load->library('form_validation');
$this->form_validation->set_rules("leavetype","leavetype",'required');
$this->form_validation->set_rules("fromdate","fromdate",'required');
$this->form_validation->set_rules("todate","todate",'required');
$this->form_validation->set_rules("reason","reason",'required');
if($this->form_validation->run())
{

$this->load->model('mainmodel');
$config['upload_path']='./files/';
$config['allowed_types']='gif|jpg|png|pdf|doc';
$config['max_size']=1000;
$config['max_height']=1024;
$config['max_width']=750;
$this->load->library('upload',$config);
if(!$this->upload->do_upload('file_upload'))
{
$error=array('error'=>$this->upload->display_errors());
//print_r($error);
}
else{

$data=array('file_upload'=>$this->upload->data());
$img=$data['file_upload']['file_name'];
}
$a=array("leave_type"=>$this->input->post("leavetype"),
"from_date"=>$this->input->post("fromdate"),
"to_date"=>$this->input->post("todate"),
"reason"=>$this->input->post("reason"),
     "file_upload"=>$img);
$this->mainmodel->insert_leave($a);
redirect(base_url().'main/leaveapplication');
}
}
}
