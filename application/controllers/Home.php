<?php
class Home extends CI_Controller
{
	public function index()
	{       $data['content']='login_view.php';
		$this->load->view('home_view',$data);
	}
      
}