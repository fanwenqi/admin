<?php
	
	class M_Pagination extends CI_Pagination 
	{
		public function __construct( $params = array() ) {
			parent::__construct($params);
		}
		
		public function showPage($config) {
			
			$config['full_tag_open'] = '<div class="dataTables_paginate paging_simple_numbers" id="table1_paginate">';
			$config['full_tag_close'] = '</div>';
			

			$config['first_tag_open'] = '<span class="paginate_button first disabled">';
			$config['first_link'] = 'First';
			$config['first_tag_close'] = '</span>';
			
			$config['last_tag_open'] = '<span class="paginate_button last">';
			$config['last_link'] = 'Last';
			$config['last_tag_close'] = '</span>';
						
			
			$config['prev_tag_open'] = '<span class="paginate_button previous disabled"  id="table1_previous">';
			$config['prev_link'] = 'Previous';
			$config['prev_tag_close'] = '</span>';


			$config['next_tag_open'] = '<span class="paginate_button next"  id="table1_next">';
			$config['next_link'] = 'Next';
			$config['next_tag_close'] = '</span>';			
			
			
			$config['cur_tag_open'] = '<span class="paginate_button">';
			$config['cur_tag_close'] = '</span>';			
			
			$config['num_tag_open'] = '<span class="paginate_button">';
			$config['num_tag_close'] = '</span>';

			$this->initialize($config);
			return $this->create_links();			
		}
	}