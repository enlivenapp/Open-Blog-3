<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_smtp_crypto extends CI_Migration {
 
        public function up()
        {

	        $insert_smtp_crypto = array(
					'name' 			=> 'smtp_crypto',
					'value' 		=> 'tls',
					'tab' 			=>	'email',
					'field_type' 	=> 'dropdown',
					'options' 		=> 'tls=TLS|ssl=SSL',
					'required' 		=> '0'
				);
			$this->db->insert('settings', $insert_smtp_crypto);


			$this->db->where('name', 'category_list_limit')->update('settings', array('tab' => 'limits'));
			$this->db->where('name', 'links_per_box')->update('settings', array('tab' => 'limits'));
			$this->db->where('name', 'months_per_archive')->update('settings', array('tab' => 'limits'));
			$this->db->where('name', 'posts_per_page')->update('settings', array('tab' => 'limits'));
        }

		


        public function down()
        {
                
        }
}



