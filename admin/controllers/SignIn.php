<?php
	/**
	 * 
	 */
	class SignIn extends M_Controller
	{
		public function index()
		{
			$this->load->library('Session');
			
			$userId = $this->session->userdata('userid');
			//if ( !empty($userId) ) {
			//	break;
			//}
	
			
			$this->load->view('signin/index');
		}
		
	}