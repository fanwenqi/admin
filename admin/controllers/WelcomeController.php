<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WelcomeController extends M_Controller {

	public function actionIndex()
	{
		$this->load->view('welcome/index');
	}
}
