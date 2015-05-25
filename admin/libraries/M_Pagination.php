<?php
	
	class M_Pagination extends CI_Pagination 
	{
		public function __construct( $params = array() ) {
			parent::__construct($params);
		}
		
		public function showPage($config) {
			/*
			$config['full_tag_open'] = '<div class="dataTables_paginate paging_simple_numbers" id="table1_paginate">';
			$config['full_tag_close'] = '</div>';
			
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<td>';
			$config['first_tag_close'] = '</td>';
			
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<td>';
			$config['last_tag_close'] = '</td>';
			*/
						
			$config['prev_link'] = 'Previous';
			$config['prev_tag_open'] = '<a class="paginate_button">';
			$config['prev_tag_close'] = '</a>';

			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<a class="paginate_button">';
			$config['next_tag_close'] = '</a>';			
			
			
			$config['cur_tag_open'] = '<a class="paginate_button">';
			$config['cur_tag_close'] = '</a>';			
			
			$config['num_tag_open'] = '<a class="paginate_button">';
			$config['num_tag_close'] = '</a>';

			$this->initialize($config);
			return $this->create_links();			
		}
	}