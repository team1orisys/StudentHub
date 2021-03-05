<?php
class mainmodel extends CI_model
{
	/*@function name:encpas**
     *@function:hashing password**
    *@author:Varsha S
    **@date:04/03/2021**/
	public function encpas($pass)
	{
		return password_hash($pass, PASSWORD_BCRYPT);
	}
   /*@function name:selectpass**
     *@function:selecting password from login table**
    *@author:Varsha S
    **@date:04/03/2021**/
	public function selectpass($username,$pass)
	{
		$this->db->select('password');
		$this->db->from("login");
		$this->db->where("username",$username);
		$qry=$this->db->get()->row('password');
		return $this->verifypass($pass,$qry);
	}
	/*@function name:verifypass**
     *@function:verifying password**
    *@author:Varsha S
    **@date:04/03/2021**/
	public function verifypass($pass,$qry)
	{
		return password_verify($pass,$qry);
	}
	/*@function name:getuserid**
     *@function:selecting id**
    *@author:Varsha S
    **@date:04/03/2021**/
	public function getuserid($username)
	{
		$this->db->select('id');
		$this->db->from("login");
		$this->db->where("username",$username);
		return $this->db->get()->row('id');
	}
	/*@function name:getuser**
     *@function:getting details**
    *@author:Varsha S
    **@date:04/03/2021**/
	public function getuser($id)
	{
		$this->db->select('*');
		$this->db->from("login");
		$this->db->where("id",$id);
		return $this->db->get()->row();
	}
	/*@function name:grievanceaction**
     *@function:inserting grievance details**
      *@module:student
    *@author:Asha Chandran
    **@date:04/03/2021**/
   public function grievanceaction($a)
   {
      $this->db->insert("grievances",$a);
    }
   /*@function name:grievanceaction**
    *@function:inserting leave details**
    *@module:trainer,student
    *@author:Revathy T S
    **@date:04/03/2021**/ 

    public function insert_leave($a)
  {
    $this->db->insert("leaves",$a);
  }

	/*@function name:studinsert**
     *@function:inserting student details**
     *@module:trainer
    *@author:Varsha S
    **@date:05/03/2021**/
	public function studinsert($a,$b)
	{
		
	    $this->db->insert("login",$b);
		$loginid=$this->db->insert_id();
		$a['loginid']=$loginid;
	    $this->db->insert("student",$a);
	}
	/*@function name:updatestud**
    *@function:fetching student details**
    @module:student
    *@author:Varsha S
    **@date:05/03/2021**/
	public function updatestud($id)
		{
			$this->db->select('*');
			$qry=$this->db->where("loginid",$id);
			$qry=$this->db->get("student");
			return $qry;
		}
	/*@function name:updateaction**
     *@function:updating student details**
     *@module:student
     *@author:Varsha S
     **@date:05/03/2021**/	
		public function updateaction($a,$id)
	   {
		$this->db->select('*');
		$qry=$this->db->where("id",$id);
		$qry=$this->db->join('login','student.loginid=login.id','inner');
		$qry=$this->db->update("student",$a);
		return $qry;
		}
	/*@function name:resume**
     *@function:fetching resume details**
     *@module:admin
     *@author:Varsha S
     **@date:05/03/2021**/
		public function resume($id)
		{
			$this->db->select('*');
			$qry=$this->db->where("ad_no",$id);
			$qry=$this->db->get("student");
			return $qry;
		}
/***@author:revathy***/
/***date:05/03/2021**/
/***@module:trainer***/
/***@function:uploading course materials***/
public function uploadfile($a)
{
$this->db->insert("materials",$a);
}


/***@author:revathy***/
/***date:05/03/2021**/
/***@module:student***/
/***@function:viewing course materials***/
public function view_materials()
{
$this->db->select('*');
$qry=$this->db->get("materials");
return $qry;
}

/***@author:revathy***/
/***date:05/03/2021**/
/***@module:trainer and admin***/
/***@function:viewing leave application***/
public function leaveview()
{
$this->db->select('*');
$qry=$this->db->get("leaves");

return $qry;
}
/**********Add and view mark page
  @asha
  @4/03/2021
  @module trainer
  @add and view mark
  ********/
public function addmarkaction($a)
{
$this->db->insert("performance",$a);
}


public function viewmark()
{
       $this->db->select('*');
$qry=$this->db->get("performance");
       return $qry;
}

        /**********Grievance page
  @asha
  @4/03/2021
  @module student
  @and view complaint
  ********/

  public function viewgrievance()
{
       $this->db->select('*');
$qry=$this->db->get("grievances");
       return $qry;
}

/**********add trainer page
  @asha
  @4/03/2021
  @module admin
  @add  trainer
  ********/

  public function addtraineraction($a,$b)
{

       $this->db->insert("login",$b);
$loginid=$this->db->insert_id();
$a['loginid']=$loginid;
  $this->db->insert("trainer",$a);
}

/**********view trainer page
  @asha
  @4/03/2021
  @module admin
  @view  trainer
  ********/
  public function viewtrainer()
{
       $this->db->select('*');
       $qry=$this->db->get("trainer");
       return $qry;
}



}
?>