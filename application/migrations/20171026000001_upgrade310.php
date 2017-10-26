<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Upgrade310 extends CI_Migration {
 
        public function up()
        {
        	// DB forge not needed, just update some settings in the database.

        	$this->db->where('name', 'allow_comments')->update('settings', ['field_type' => 'checkbox', 'options' => '']);
        	$this->db->where('name', 'mod_non_user_comments')->update('settings', ['field_type' => 'checkbox', 'options' => '']);
        	$this->db->where('name', 'mod_user_comments')->update('settings', ['field_type' => 'checkbox', 'options' => '']);
        	$this->db->where('name', 'use_honeypot')->update('settings', ['field_type' => 'checkbox', 'options' => '']);
        	$this->db->where('name', 'use_recaptcha')->update('settings', ['field_type' => 'checkbox', 'options' => '']);

        	// this is where we need to set the default value too. they were true/false before for some dumb reason.
        	$this->db->where('name', 'allow_registrations')->update('settings', ['field_type' => 'checkbox', 'options' => '', 'value' => '1']);
        	$this->db->where('name', 'email_activation')->update('settings', ['field_type' => 'checkbox', 'options' => '', 'value' => '1']);
        	$this->db->where('name', 'manual_activation')->update('settings', ['field_type' => 'checkbox', 'options' => '', 'value' => '0']);

												   
        }

        public function down()
        {
                
        }
}
