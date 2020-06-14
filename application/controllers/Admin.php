<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
    function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('common_model','common_model',TRUE);
		// $this->load->helper('common_helper');
        $this->load->library('session');
        $this->load->helper('form');
		$this->load->helper('url');		
	}
	function index(){
		if($this->session->userdata('id') == NULL){
			redirect('Admin/login','refresh');
		}
		// $this->load->view('Admin/login');
		$this->load->view('Admin/index');
	}
	function login(){
		// print_r($_POST);
		if (!empty($_POST['id']) && isset($_POST['id']) && !empty($_POST['pswd'])) {
			$data = array('username' => $_POST['id'], 'password' => md5($_POST['pswd']),'is_status' => '1');
			$result = $this->common_model->login($data);
			if ($result) {
				$updateAdmin['ip_address'] = $_SERVER['REMOTE_ADDR'];
				$updateAdmin['last_login'] = date('Y-m-d H:i:s');
				$is_update = $this->common_model->update_common($updateAdmin,'admin_login',array('id'=>$result['id']));
				if ($is_update) {
					$this->session->set_userdata($result);
					// $this->load->view('Admin/index');
					redirect('Admin/index','refresh');

				}
			}else{
				// $data['err'] = 1;
				// $data['message'] = 'User Name or Password is Incorrect.!';
				// $this->load->view('Admin/login',$data);
				$this->session->set_flashdata('msg_login', 'Email or password is incorrect !');
					$this->load->view('Admin/login');


			}
		}else{
			$this->load->view('Admin/login');
		}
	}
	public function insertArt(){
		if($this->session->userdata('id') == NULL){
			redirect('Admin/login','refresh');
		}
		$this->load->view('Admin/insert_art');
	}
	public function insertArtData(){
		if($this->session->userdata('id') == NULL){
			redirect('Admin/login','refresh');
		}
		if (!empty($_FILES['art_image']['name']) && isset($_FILES['art_image']['name'])) {

			$art_title 			= $this->input->post('art_title');
			$art_dimension		= $this->input->post('art_dimension');
			$art_description 	= $this->input->post('art_description');

			$name     			= basename($_FILES['art_image']['name']);
			$file_ext = substr($name, strripos($name, '.'));
			$file_name			= date('YmdHis').rand(999,9999).$file_ext;
	        $config['upload_path']          = './assets/artImage';
	        $config['allowed_types']        = 'gif|jpg|png|JPG|PNG|JPEG|jpeg';
	        $config['file_name']            = $file_name;

			$this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('art_image'))
	        {
	                $error = array('error' => $this->upload->display_errors());

	                echo json_encode($error);
	        }
	        else
	        {
				$savedata['art_title'] = $art_title;
				$savedata['art_dimesion'] = $art_dimension;
				$savedata['art_description'] = $art_description;
				$savedata['art_image'] = $file_name;
				$savedata['is_Active'] = '1';
				$savedata['origional_name'] = $_FILES['art_image']['name'];
				$savedata['updated_at'] = date('Y-m-d H:i:s');

	            $data = array('upload_data' => $this->upload->data());
				$data1 = $this->common_model->save($savedata,'art_images');
	            if ($data && $data1) {
	            	echo json_encode(array("success"=>1));
	            }
	        }
		}else{
			echo json_encode(array("Image_Required"=>1));
			exit(1);
		}
	}
	public function showArt(){
		if($this->session->userdata('id') == NULL){
			redirect('Admin/login','refresh');
		}
		$this->load->view('Admin/show_art');
		
	}
	public function showArtData(){
		if($this->session->userdata('id') == NULL){
			redirect('Admin/login','refresh');
		}
		$artdata = $this->common_model->getAllParameters("art_images.*","art_images");
		if (!empty($artdata)) {
			$html = '';
			foreach ($artdata as $artdatas) {
				echo '<tr>
				<td>'.$artdatas->id.'</td>
				<td>'.$artdatas->art_title.'</td>
				<td>'.$artdatas->art_dimesion.'</td>
				<td>'.$artdatas->art_description.'</td>
				<td>'.'<img src="'.base_url().'assets/artImage/'.$artdatas->art_image.'" height="100" width="100">'.'</td>
				<td style="text-align:center;">'.'<a class="fa fa-trash" title="Remove it" style="color:#b34a4a" href="#" onclick=deleteArt('.$artdatas->id.')></a> <a href="'.base_url().'Admin/editArt/'.$artdatas->id.'" class="fa fa-edit" id="activate_link" style="color:blue;" ></a>'.'</td>
				</tr>';
			}
		}
	}
	public function deleteArt(){
		if($this->session->userdata('id') == NULL){
			redirect('Admin/login','refresh');
		}
		$id = $this->input->post('id');
		$is_data = $this->common_model->delete('art_images',array('id'=>$id));
	}
	public function editArt($id=''){
		if($this->session->userdata('id') == NULL){
			redirect('Admin/login','refresh');
		}
		$this->data['artData'] = $this->common_model->getParameters("art_images.*","art_images",array('id'=>$id));
		$this->load->view('Admin/edit_art',$this->data);
	}
	public function updateArtData(){
		if($this->session->userdata('id') == NULL){
			redirect('Admin/login','refresh');
		}
		if (empty($_POST['artId'])) {
			echo json_encode(array('failed'=>1));
		}
			$art_title 			= $this->input->post('art_title');
			$art_dimension		= $this->input->post('art_dimension');
			$art_description 	= $this->input->post('art_description');
			$artId 				= $this->input->post('artId');

		if (!empty($_FILES['art_image']['name'])) {
			$name     			= basename($_FILES['art_image']['name']);
			$file_ext = substr($name, strripos($name, '.'));
			$file_name			= date('YmdHis').rand(999,9999).$file_ext;
	        $config['upload_path']          = './assets/artImage';
	        $config['allowed_types']        = 'gif|jpg|png|JPG|PNG|JPEG|jpeg';
	        $config['file_name']            = $file_name;
			$this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('art_image'))
	        {
	                $error = array('error' => $this->upload->display_errors());
	                echo json_encode($error);
	        }else
	        {
				$savedata['origional_name'] = $_FILES['art_image']['name'];
				$savedata['art_image'] = $file_name;
	            $data = array('upload_data' => $this->upload->data());
			}
		}
			$savedata['art_title'] = $art_title;
			$savedata['art_dimesion'] = $art_dimension;
			$savedata['art_description'] = $art_description;
			$savedata['is_Active'] = '1';
			$savedata['updated_at'] = date('Y-m-d H:i:s');
			$data1 = $this->common_model->update_common($savedata,'art_images',array('id'=>$artId));
			if ($data1) {
            	echo json_encode(array("success"=>1));
				exit(1);
			}

	}
}