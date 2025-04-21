<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	
	function __construct()                                                         
    {
   parent::__construct();
      $this->load->database();
      $this->load->model('user_model');
         if(!$this->session->userdata('logged_user'))
        {
            redirect(base_url('home'));
        }
    }

public function index(){
  $where['where']=array('a.status ='=>'A','a.updateby='=>$this->session->userdata("id"));
  $data["get_product"]=$this->user_model->getvaluesJoin("product","*",$where);
  $this->load->view('news_list',$data);
  }

public function addnew(){
  $where['where']=array('status ='=>1);
  $data["get_category"]=$this->user_model->getvalues("category","*",$where);
  $this->load->view('new_view',$data);
    }

public function articleedit(){
  $where['where']=array('status ='=>'1');
  $data["get_category"]=$this->user_model->getvalues("category","*",$where);

  $where['where']=array('a.status ='=>'A','a.id ='=>$this->uri->segment(3));
  $data["get_product"]=$this->user_model->getvaluesJoin("product","*",$where);

  $this->load->view('articleedit',$data);
    }


public function createsec()
{
  $result =  $this->user_model->create();
        if($result == 'success')
        {
            $note = 'Your action has been completed';
             $next = true;
           }
        else if($result == "info")
        {
            $note = 'Customer paid full amount or you enter the maximum amount';
            $next = true;
        }
        else
        {
            $note = 'Your action can not be completed';
            $next = true;
        }
        header("Content-type: application/json");
       $response = array('response'=>$result,'note'=> $note);  

          echo json_encode($response);
    
       exit(); 
     }

public function create_product(){
    log_message('error', 'CSRF Token: ' . $this->security->get_csrf_hash());
 
  $result=$this->user_model->article();

  if($result == 'success'){
            $note = 'Your action has been completed';
             $next = true;
           }
        
        else{
            $note = 'Your action can not be completed';
            $next = true;
        }
        header("Content-type: application/json");
       $response = array('response'=>$result,'note'=> $note);  
        if($next)
       {
          echo json_encode($response);
       }
       exit(); 
}

 public function fetch()
    { 
       $result  = $this->user_model->fetch();
       header("Content-type: application/json");
       foreach($result as $key => $value) 
       {
           $r[$key] = $value;
       } 
       echo json_encode($r);
       exit();
    }

public function textarea(){
      $url = array("<?php echo base_url() ?>");
reset($_FILES);
$temp = current($_FILES);

if(is_uploaded_file($temp['tmp_name']))
{
    if(preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])){
        header("HTTP/1.1 400 Invalid file name,Bad request");
        return;
    }
  
    // Validating Image file type by extensions
    if(!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))){
        header("HTTP/1.1 400 Invalid extension,Bad request");
        return;
    }
      
    $fileName = "user/upload/".$temp['name'];
 
    move_uploaded_file($temp['tmp_name'], $fileName);
    $fileName= 'upload/'.$temp['name'];
    echo json_encode(array('location' => $fileName));
    }

}
    public function edit()
        {
            $this->load->database();           
            $table = $this->input->post('table');
       
      $result =  $this->user_model->update();

            if($result == 'success')
            {
                
                $note = 'Your action has been completed';
                
            }
            else if($result == "info")
            {
                $note = 'Your subscriber quota exceeded';
            }
            else
            {
                $note = 'Your action can not be completed';
            }
            
           header("Content-type: application/json");
           $response = array('response'=>$result,'note'=> $note);  
           echo json_encode($response);
           exit(); 
        }

        public function crop() {
          if (!empty($_FILES['pimage']['name'])) {
              // Upload image first
              $config['upload_path'] = './upload/profile';
              $config['allowed_types'] = 'jpg|jpeg|png';
              $config['file_name'] = 'original_' . time();
              $config['overwrite'] = true;
  
              $this->load->library('upload', $config);
  
              if ($this->upload->do_upload('pimage')) {
                  $upload_data = $this->upload->data();
                  $image_path = $upload_data['full_path'];
  
                  // Now crop it using image_lib
                  $x = $this->input->post('x');
                  $y = $this->input->post('y');
                  $width = $this->input->post('width');
                  $height = $this->input->post('height');
  
                  $cropped_filename = 'cropped_' . time() . $upload_data['file_ext'];
                  $cropped_path = './upload/profile/' . $cropped_filename;
  
                  $config_crop = [
                    'image_library'  => 'gd2', // or imagemagick
                    'source_image'   => $upload_data['full_path'],
                    'new_image'      => $cropped_path,
                    'x_axis'         => (int) $this->input->post('x'),
                    'y_axis'         => (int) $this->input->post('y'),
                    'width'          => (int) $this->input->post('width'),
                    'height'         => (int) $this->input->post('height'),
                    'maintain_ratio' => FALSE
                ];
  
                  $this->load->library('image_lib', $config_crop);
  
                  if ($this->image_lib->crop()) {
                    
                      echo json_encode(['status' => 'success', 'file' => $cropped_filename, 'csrfToken' => $this->security->get_csrf_hash()]);
                  } else {
                      echo json_encode(['status' => 'error', 'message' => $this->image_lib->display_errors()]);
                  }
              } else {
                  echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
              }
          } else {
              echo json_encode(['status' => 'error', 'message' => 'No image uploaded']);
          }
      }

      public function delete()
      {
                $id=$this->input->post('id');
              $this->load->model('User_model');
              $deleted = $this->User_model->delete_product($id);
               if($deleted)
               {
              echo json_encode(['status' => 'success']);
               }else{
                echo json_encode(['status' => 'error']);

               }

          
      }
      


}

?>