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
   /*@function name:log**
     *@function:viewing login form
     @author:Varsha S
    **@date:04/03/2021**/
    public function log()
    {
        $this->load->view('login');
    }
    /*@function name:log**
     *@function:login process
     @author:Varsha S
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
                                redirect(base_url().'main/studindex');
                     }
                    elseif($_SESSION['status']=='1' && $_SESSION['usertype']=='0' && $_SESSION['logged_in']==true)
                      {
                            redirect(base_url().'main/adminhome');
                      }
                  elseif($_SESSION['status']=='1' && $_SESSION['usertype']=='2' && $_SESSION['logged_in']==true)
                    {
                            redirect(base_url().'main/trainerindex');
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
    
   /*@function name:trainerindex**
     @function:viewing trainer's index page
      *@module:trainer
     @author:Varsha S
    **@date:04/03/2021**/
   public function trainerindex()
   {
    
                $this->load->view('trainerindex');  
    }
   /*@function name:studindex**
    @function:viewing student's index page
     *@module:student
    @author:Varsha S
    **@date:04/03/2021**/
   public function studindex()
    {  
            $this->load->view('studindex');  
    }       
  /*@function name:grievance**
    @function:viewing grievance form
     *@module:student
    @author:Asha Chandran
    **@date:04/03/2021**/

public function grievance()
{

    $this->load->view('grievance');
}
  /*@function name:grievanceaction**
    @function:inserting grievance 
     *@module:student
    @author:Asha Chandran
    **@date:04/03/2021**/

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
  /*@function name:leaveapplication**
    @function:viewing leave application form
     *@module:trainer,student
    @author:Asha Chandran
    **@date:04/03/2021**/

public function leaveapplication()
{
$this->load->view('leaveapplication');
}
 /*@function name:leave_action**
    @function:inserting leave details
     *@module:trainer,student
    @author:Asha Chandran
    **@date:04/03/2021**/
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

   /*@function name:addstudent**
    *@function:viewing student registration form**
    @author:Varsha S
     *@module:trainer
    **@date:05/03/2021**/
   
        public function addstudent()
        {
            $this->load->view('addstudent');
        }
   /*@function name:studinsert**
    *@function:insertion of student details**
     *@module:trainer
     @author:Varsha S
    **@date:05/03/2021**/
    public function studinsert()
    {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='2')
        {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("name","name",'required');
        $this->form_validation->set_rules("ad_no","ad_no",'required');
        $this->form_validation->set_rules("ad_date","ad_date",'required');
        $this->form_validation->set_rules("rollno","rollno",'required');
        $this->form_validation->set_rules("dob","dob",'required');
        $this->form_validation->set_rules("aadhar","aadhar",'required');
        $this->form_validation->set_rules("email","email",'required');
        $this->form_validation->set_rules("gender","gender",'required');
        $this->form_validation->set_rules("address","address",'required');
        $this->form_validation->set_rules("father","father",'required');
        $this->form_validation->set_rules("mother","mother",'required');
        $this->form_validation->set_rules("phone","phone",'required');
        $this->form_validation->set_rules("p_phone","p_phone",'required');
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
        $this->form_validation->set_rules("project","project",'required');
        $this->form_validation->set_rules("batch","batch",'required');
        $this->form_validation->set_rules("skills","skills",'required');
        $this->form_validation->set_rules("h_qualification","h_qualification",'required');
        $this->form_validation->set_rules("stream","stream",'required');
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
                 "cast"=>$this->input->post("cast"),
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
        redirect(base_url().'main/addstudent');  
        }
      }
      else
      {
        redirect(base_url().'main/log');
      }
    } 
     
    /*@function name:updatestud**
     *@function:viewing updation form**
      *@module:student
    *@author:Varsha S
    **@date:05/03/2021**/
      public function updatestud()
        {
        if($_SESSION['logged_in']==true && $_SESSION['usertype']=='1')
         {
            $this->load->model('mainmodel');
            $id=$this->session->id;
            $data['user_data']=$this->mainmodel->updatestud($id);
            $this->load->view("student_profile",$data);
        }
        else
        {
           redirect(base_url().'main/log');
        }
                   
        }
    /*@function name:updateaction**
     *@function:updating student details**
      *@module:student
    *@author:Varsha S
    **@date:05/03/2021**/
public function updateaction()
    { 
       if($_SESSION['logged_in']==true && $_SESSION['usertype']=='1')
         {

        $a = array("name"=>$this->input->post("name"),
                   "email"=>$this->input->post("email"),
                   "dob"=>$this->input->post("dob"),
                  "father"=>$this->input->post("father"),
                   "mother"=>$this->input->post("mother"),
                  "address"=>$this->input->post("address"),
                  "phone"=>$this->input->post("phone"),
                  "p_phone"=>$this->input->post("p_phone"),
                 "blood"=>$this->input->post("blood"),
                "nationality"=>$this->input->post("nationality"),
                "state"=>$this->input->post("state"),
                 "district"=>$this->input->post("district"),
                 "taluk"=>$this->input->post("taluk"),
                 "panchayath"=>$this->input->post("panchayath"),
                  "block"=>$this->input->post("block"),  
                  "income"=>$this->input->post("income"),
                  "aadhar"=>$this->input->post("aadhar"),
                  "skills"=>$this->input->post("skills"),
                  "h_qualification"=>$this->input->post("h_qualification"),
                 "passingdate"=>$this->input->post("passingdate"));
        if($this->input->post("update"))
        {   //echo "hi";exit();
            $this->load->model('mainmodel');
            $id=$this->input->post("id");
            $this->mainmodel->updateaction($a,$id);
            redirect('main/updatestud','refresh');
        }
    }
    else
    {
          redirect(base_url().'main/log');

    }
 /*@function name:adno**
    *@function:Page for selecting admission number**
     *@module:admin
    *@author:Varsha S
    **@date:05/03/2021**/
public function adno()
{
  $this->load->view('adno');
}
/*@function name:resume**
    *@function:viewing short resume**
     *@module:admin
    *@author:Varsha S
    **@date:05/03/2021**/
public function resume()
{
            $this->load->model('mainmodel');
            $id=$this->input->post("ad_no");
            $data['user_data']=$this->mainmodel->resume($id);
            $this->load->view("shortresume",$data);
}
/*****@author:revathy*****/
/***@date:05/03/2021**/
/***@module:trainer***/
/***@function:viewing page to add subject name and upload course materials***/

public function upload()
{
$this->load->view('fileupload');
}
/*****@@author:revathy*****/
/***@date:05/03/2021**/
/***@module:trainer ***/
/***@function: uploading course materials***/
public function fileupload()
{

$this->load->library('form_validation');
$this->form_validation->set_rules("subject","subject",'required');
$this->form_validation->set_rules("date","date",'required');
$this->load->model('mainmodel');
$config['upload_path']='./files/';
$config['allowed_types']='gif|jpg|png|pdf|doc';
$config['max_size']=1000;
$config['max_height']=1024;
$config['max_width']=750;
$this->load->library('upload',$config);
if(!$this->upload->do_upload('file'))
{
$error=array('error'=>$this->upload->display_errors());
//print_r($error);
}
else
{
$data=array('file'=>$this->upload->data());
$img=$data['file']['file_name'];
}
$a=array("subject"=>$this->input->post("subject"),
"date"=>$this->input->post("date"),'file'=>$img);
$this->mainmodel->uploadfile($a);
redirect(base_url().'main/upload');

}
/*****@author:revathy*****/
/***@date:05/03/2021**/
/***@module:trainer module***/
/***@function:course materials***/

public function pdf()
{ $this->load->model('mainmodel');
$data['n']=$this->mainmodel->view_materials();
$this->load->view('pdfview',$data);
}
/*****@author:revathy*****/
/***@date:05/03/2021**/
/***@module:trainer and admin***/
/***@function:viewing leave application ***/

public function view_leave()
{ $this->load->model('mainmodel');
$data['n']=$this->mainmodel->leaveview();
$this->load->view('appliedleave',$data);
}
/********** and view grievance
  @author:asha
  @5/03/2021
  @module student
  @view grievance
  ********/
   public function viewgrievance()
    {
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->viewgrievance();
        $this->load->view('addgrievanceview',$data);
    }  

  /**********Add mark and view functions
  @author:asha
  @5/03/2021
  @module trainer
  @add and view mark
  ********/
  public function addmark()
{

    $this->load->view('addmark');
}

public function addmarkaction()
{

    $this->load->library('form_validation');
    $this->form_validation->set_rules("assesment","assesment",'required');
    $this->form_validation->set_rules("sub1","sub1",'required');
    $this->form_validation->set_rules("sub1mark","sub1mark",'required');
    $this->form_validation->set_rules("sub2","sub2",'required');
    $this->form_validation->set_rules("sub2mark","sub2mark",'required');
    $this->form_validation->set_rules("sub3","sub3",'required');
    $this->form_validation->set_rules("sub3mark","sub3mark",'required');
    $this->form_validation->set_rules("sub4","sub4",'required');
    $this->form_validation->set_rules("sub4mark","sub4mark",'required');
    $this->form_validation->set_rules("sub5","sub5",'required');
    $this->form_validation->set_rules("sub5mark","sub5mark",'required');
    $this->form_validation->set_rules("lab1","lab1",'required');
    $this->form_validation->set_rules("lab2","lab2",'required');
    $this->form_validation->set_rules("total","total",'required');
    $this->form_validation->set_rules("percentage","percentage",'required');
 
    if($this->form_validation->run())
    {
       
      $this->load->model('mainmodel');
      $a=array("assesment"=>$this->input->post("assesment"),
           "sub1"=>$this->input->post("sub1"),
           "sub1mark"=>$this->input->post("sub1mark"),
           "sub2"=>$this->input->post("sub2"),
           "sub2mark"=>$this->input->post("sub2mark"),
           "sub3"=>$this->input->post("sub3"),
           "sub3mark"=>$this->input->post("sub3mark"),
            "sub4"=>$this->input->post("sub4"),
           "sub4mark"=>$this->input->post("sub4mark"),
            "sub5"=>$this->input->post("sub5"),
           "sub5mark"=>$this->input->post("sub5mark"),
            "lab1"=>$this->input->post("lab1"),
           "lab2"=>$this->input->post("lab2"),
            "total"=>$this->input->post("total"),
           "percentage"=>$this->input->post("percentage"));
        $this->mainmodel->addmarkaction($a);
        redirect(base_url().'main/addmark');
    }
  }
  public function viewmark()
    {
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->viewmark();
        $this->load->view('addmarkview',$data);
    }

    /**********home page
  @author:asha
  @5/03/2021
  @index.php
  ********/
   public function index()
  {

       $this->load->view('index');
  }

   /**********add trainers page
  @author:asha
  @5/03/2021
  @module admin
  @addtrainer.php
  ********/
  public function addtrainer()
  {

       $this->load->view('addtrainer');
  }
  public function addtraineraction()
{

    $this->load->library('form_validation');
    $this->form_validation->set_rules("name","name",'required');
    $this->form_validation->set_rules("address","address",'required');
    $this->form_validation->set_rules("phoneno","phoneno",'required');
    $this->form_validation->set_rules("email","email",'required');
    $this->form_validation->set_rules("gender","gender",'required');
    $this->form_validation->set_rules("dob","dob",'required');
    $this->form_validation->set_rules("qualification","qualification",'required');
    $this->form_validation->set_rules("certifications","certifications",'required');
    $this->form_validation->set_rules("skills","skills",'required');
    $this->form_validation->set_rules("username","username",'required');
    $this->form_validation->set_rules("password","password",'required');
 
    if($this->form_validation->run())
    {
         $this->load->model('mainmodel');
         $pass=$this->input->post("password");
         $encpas=$this->mainmodel->encpas($pass);
    $a=array("name"=>$this->input->post("name"),
             "address"=>$this->input->post("address"),
             "phoneno"=>$this->input->post("phoneno"),
             "email"=>$this->input->post("email"),
             "gender"=>$this->input->post("gender"),
             "dob"=>$this->input->post("dob"),
             "qualification"=>$this->input->post("qualification"),
             "certifications"=>$this->input->post("certifications"),
             "skills"=>$this->input->post("skills"));
    $b=array("username"=>$this->input->post("username"),
                  "password"=>$encpas,
                    "usertype"=>'2');

    $this->mainmodel->addtraineraction($a,$b);
 
  redirect(base_url().'main/addtrainer');
    }
}
         public function viewtrainer()
    {
        $this->load->model('mainmodel');
        $data['n']=$this->mainmodel->viewtrainer();
        $this->load->view('addtrainerview',$data);
    } 



}
