<?php
defined('BASEPATH') or exit("No direct script access allowed");

class Admin_model extends CI_model
{
	public function admin_login_check($username,$password){
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$query=$this->db->get('admin_login');

			if($query->num_rows() > 0){

				 $rows = $query->row();

				   $newdata = array(
                           'username'  => $rows->username,
						   'password'  => $rows->password,
						   'id'  => $rows->id,
                           'logged_in' => TRUE
                    );
                    $this->session->set_userdata($newdata);

				return 'success';
			}
			else{
				return 'error';
			}
		}

		function uploads($file,$prx,$id,$name,$type,$paths)
   		{
      if (!empty($file))
          {
        $path = $paths;

         if(!is_dir($path)) //create the folder if it's not already exists
          {
            mkdir($path,0755,TRUE);
          } 
        
        $config['upload_path'] = $path;
        $config['allowed_types'] = $type;   
        $config['file_name'] = $prx."_".date('d-m-Y')."_".$id;   
  
        $this->upload->initialize($config);
        if ($this->upload->do_upload($name))
        {
          $img = $this->upload->data();
             return   $img['file_name'];
        }
      }
    }

	public function create_login(){
			$this->load->library('upload');	

		/*if (!empty($_FILES['attimg']['name'])) {
			
			$path="upload/profile";
			
			if (!is_dir($path)) {
				mkdir($path,0755,true);
			}

			$config["upload_path"] = $path;
			$config['allowed_types'] = 'png|jpg|gif';
			$config['overwrite'] = TRUE;
			$config['file_name'] = $this->input->post('att_name');
			$this->upload->initialize($config);
			if($this->upload->do_upload('attimg')){

				$img=$this->upload->data();
				$filename=$img['file_name'];
			}
		}*/
			
				$password=md5($this->input->post('att_con_password'));

				$fileimage=$this->uploads($_FILES['attimg']['name'],'STR',$this->input->post('att_name'),'attimg','gif|jpg|png|jpeg','upload/profile');

				$datas = array(
					'name' =>$this->input->post('att_name') ,
					'contact_number' =>$this->input->post('att_contact'),
					'descript' =>$this->input->post('att_descpt'),
					'username' =>$this->input->post('att_email'),
					'password' => $password,
					'image'=>$fileimage,
					'address' =>$this->input->post('att_addr') ,
					'weekday' =>$this->input->post('att_workday'),
					'hours' =>$this->input->post('Att_hours'),
					'work_day' =>$this->input->post('att_day') ,
					'work_time' =>$this->input->post('att_time'),
					'close_day' =>$this->input->post('att_close'),
					'url' =>$this->input->post('att_url'),
					'createtime'  => date("Y-m-d h:i:sa"),
					'updateby' =>'1',
					'status'  => 'A'
				);
						
			
			$this->db->insert("user_login",$datas);
		
			if( $this->db->affected_rows()){
					return 'success';
				}
				else 
				{
					return 'error'; 
				}
	
		
	}

	/*public function getvalues($data){
		$this->load->database();
		$val=$this->db->get($data);
		return $val->result();
	}*/

	 public function getvalues($table,$column='',$where='')
        {
            $this->load->database();
            $col = ($column == '' ? '*' : $column);
            $this->db->select($column);
            $this->db->from($table);
            if($where != '')
            {
            if(is_array($where))
            {
                foreach ($where as $key => $value) 
                {
                   switch ($key):
                       case 'where':
                            $this->db->where($value);
                       break;
                       case 'like':
                            $this->db->like($value);
                       break;
                       case 'group_by':
                           $this->db->group_by($value);
                       break;
                       case 'order_by':
                           $val = explode('-',$value);
                           $this->db->order_by($val[0],$val[1]);
                       break;
                       case 'limit':
                           $this->db->limit($value);
                       break;
                       case 'or_where':                         
                          $this->db->or_where($value); 
                       break;
					   case 'where_in': 
					  $val=current($value);
					   array_shift($value);
					   //print_r(array_shift($value));
                          $this->db->where_in($val,array_shift($value)); 
                       break;
					   case 'where_not_in': 
					  $val=current($value);
					   array_shift($value);
					   //print_r(array_shift($value));
                          $this->db->where_not_in($val,array_shift($value)); 
                       break;
                   endswitch; 
                }
            }
            else 
            {
                 $this->db->where($where);
            }
            }
              $query = $this->db->get();
            if($query->num_rows() > 0)
            {
                return $query->result();
            }
        }

	public function edit($id){
		
		$this->db->where('id',$id);
		$val=$this->db->get('devices');
		if($val->num_rows() > 0){
			return $val->row();
		}
		else{
			return false;
		}
	}
	public function create()
        {
            $table = $this->input->post('device');
            $data =array();
            foreach ($_POST as $key => $value) 
            {
                if($key != 'image' && $key  !='table' && $key !='redirect' && $key != 'uid'  && $key !='pages')
                {
                    $data[$key] = $value;
                }
            }
           /*if($table=='login'){
                unset($data['oldpassword']);
             }*/
			  if($table=='devices'){
			  $data = array(
			  			'attraction' => $this->input->post('attract'),
						'device'  => $this->input->post('new_device'),
						'createtime'  => date("Y-m-d h:i:sa"),
						'updateby' =>'1',
						'status'  => 'A'
				);
			 }
			
            $this->db->insert($table,$data);
			
            if($this->db->affected_rows())
            {
                return 'success';
            }
            else 
            {
                return 'error'; 
            }
        }

        public function fetch()
        {
            //$this->load->database();
                        
            foreach ($_POST as $key => $value) 
            {
                if($key == 'table')
                {
                    $table = $value;
                }
                else
                {
                    $where[$key] = $value;
                }
            }
            $query = $this->db->select('*')->from($table)->where($where)->get()->row();
            return $query;
        }

        public function update()
        {
            $table = $this->input->post('table');
            $data =array();
            foreach ($_POST as $key => $value) 
            {
                if($key != 'image' && $key  !='table' && $key  !='submit' && $key !='redirect' && $key !='where' && $key !='id' && $key != 'uid' && $key != 'userfile'&& $key != 'subscriber_email'&& $key !='customers2_length' && $key  !='old_password' && $key !='new_password'&& $key !='confirm_password' && $key !='created_by')
                {
                    
                    $data[$key] = $value;
                }
            }
          
						
			if($table=='devices')
			{
				$data = array(
						'device'   => $this->input->post('update_device'),
						'updatetime' => date("Y-m-d h:i:sa"),
						'updateby' => $this->input->post('id'),
						'status'   => 'A'
						
				);	
			}
			
			if($table=='user_login')
			{
				$this->load->library('upload');	
				if (!empty($_FILES['att_edit_img']["name"])) {
			
			$path="upload/profile";
			
			$config["upload_path"] = $path;
			$config['allowed_types'] = 'png|jpg|gif';
			$config['overwrite'] = TRUE;
			$config['file_name'] = $this->input->post('att_name');
			
			$this->upload->initialize($config);
			if($this->upload->do_upload('att_edit_img')){

				$img=$this->upload->data();
				$img_name=$img["file_name"];
				
			}
		 }
				$data = array(
						'name' =>$this->input->post('att_edit_name') ,
						'contact_number' =>$this->input->post('att_edit_number') ,
						'descript' =>$this->input->post('att_edit_descpt') ,
						'address' =>$this->input->post('att_edit_address') ,
						'weekday' =>$this->input->post('att_edit_workday') ,
						'hours' =>$this->input->post('att_edit_hours'),
						'work_day' =>$this->input->post('att_edit_day') ,
						'work_time' =>$this->input->post('att_edit_time') ,
						'close_day' =>$this->input->post('att_edit_closeday') ,
						'url' =>$this->input->post('att_edit_url'),
						'updatetime' => date("Y-m-d h:i:sa"),
						'updateby' => $this->input->post('id'),
						'status'   => 'A'
						);	
			}

            $this->db->where('id',$this->input->post('id'));
            $this->db->update($table,$data);
            if( $this->db->affected_rows())
            {                
                return 'success';
            }
            else 
            {
                //return 'error'; 
            }
        }
}

?>