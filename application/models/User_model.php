<?php
defined('BASEPATH') or exit("No direct script access allowed");

class User_model extends CI_model
{
	public function user_login(){

		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));

			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$query=$this->db->get('user_login');

			if($query->num_rows() > 0){

				 $rows = $query->row();

				   $newdata = array(
                           
                           'usernme'  => $rows->username,
						   'passwrd'  => $rows->password,
						   'id'       => $rows->id,
                           'logged_user' => TRUE
                    );
                    $this->session->set_userdata($newdata);

				return 'success';
			}
			else{
				return 'error';
			}
	}

	 public function create()
        {
            $table = $this->input->post('table');
            $data =array();
            foreach ($_POST as $key => $value) 
            {
                if($key != 'image' && $key  !='table' && $key !='redirect' && $key != 'uid'  && $key !='pages')
                {
                    $data[$key] = $value;
                }
            }

			  if($table=='deviceloc'){
			  $data = array(
						'location'  => $this->input->post('location'),
						'createtime'  => date("Y-m-d h:i:sa"),
						'updateby' => $this->input->post('id'),
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

  public function getvaluesJoin($table,$column='',$where='')
        {
      $this->load->database();
      $this->db->select('*');
      $this->db->from($table.' a');
      $this->db->join('category b', 'a.category=b.cid');
          
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

	public function article(){
			
	$this->load->library('upload');
   
				$datas=array(
					'pname'=>$this->input->post('pname') ,
					'description'=>$this->input->post('description') ,
					'price'=>$this->input->post('price') ,
					'category'=>$this->input->post('category') ,
					'pimage'=> $this->input->post('inputprofile'),
					'updateby' => $this->session->userdata('id'),
					'status'  => 'A'
					);
                
                

                    if($this->input->post('pid'))
                    {
                        $this->db->where('id',$this->input->post('pid'));
                        $this->db->update('product',$datas);
                    }else{
                        $this->db->insert("product",$datas);
                    }		
			if( $this->db->affected_rows()){
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
      
			if($table=='deviceloc')
			{
				$data = array(
						'location'   => $this->input->post('devi_edit'),
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

        public function delete_product($id)
            {
                $data = array(
                    'status'   => 'D'
            );	

                $this->db->where('id',$this->input->post('id'));
                $this->db->update("product",$data);
                if( $this->db->affected_rows())
                {                
                    return 'success';
                }

                return $this->db->delete('product', ['id' => $id]);
            }

            function limit_characters($text, $limit) {
                if (strlen($text) <= $limit) return $text;
                return substr($text, 0, $limit) . '...';
            }

}

?>