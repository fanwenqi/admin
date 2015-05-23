<?php
	/**
	 * 
	 * 
	 */
	class M_Loader extends CI_Loader
	{

		public function view($view, $vars = array(), $return = FALSE)
		{
			$m_controller = new M_Controller();
			$m_controller->config->load('config');
			$vars['template'] = $m_controller->config->item('base_url').'template/';
			
			return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
		}	
		
	}