<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Sec_update extends CI_Migration {

		// update Authentication for IPV6 Support  
        public function up()
        {
             $this->dbforge->modify_column('login_attempts', ['ip_address' => ['type' => 'VARCHAR', 'constraint' => '45']]); 												   
        }

        public function down()
        {
                
        }
}
