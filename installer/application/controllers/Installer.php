<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Installer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();


		$this->hash_method    = 'bcrypt';	// sha1 or bcrypt, bcrypt is STRONGLY recommended
		$this->default_rounds = 8;		// This does not apply if random_rounds is set to true
		$this->random_rounds  = FALSE;
		$this->min_rounds     = 5;
		$this->max_rounds     = 9;
		$this->salt_prefix    = version_compare(PHP_VERSION, '5.3.7', '<') ? '$2a$' : '$2y$';
		$this->salt_length    = 22;

		// load the bcrypt class if needed
		if ($this->hash_method == 'bcrypt') {
			if ($this->random_rounds)
			{
				$rand = rand($this->min_rounds,$this->max_rounds);
				$params = array('rounds' => $rand);
			}
			else
			{
				$params = array('rounds' => $this->default_rounds);
			}

			$params['salt_prefix'] = $this->salt_prefix;
			$this->load->library('bcrypt',$params);
		}



	}

	public function index($lang = null)
	{
		$data = '';
		// the beginnnings of localization
		// TODO: actually sort & set the language
		// file used
		if ($lang)
		{
			$this->session->set_userdata('language', $lang);
		}
		else
		{
			// default language is english
			$this->session->set_userdata('language', 'en');
		}

		// we don't automatically do anything with this,
		// but we do pre-set form fields and offer some
		// guidance for installers.  It's ultimately up
		// to the person installing to know what they're
		// working with.
		$data = $this->detect_server_type();

		$data['curl_available'] = $this->curl_available();

		// writable files
		$data['config_dir'] = $this->dir_writable('../application/config');
		$data['uploads_dir'] = $this->dir_writable('../uploads');
		$data['home_dir'] = $this->dir_writable('../');

	//	echo '<pre style="text-align: left;">';
	//	print_r($data);


		$this->load->view('index', $data);
	}


	public function step_one()
	{
		// load validation
		$this->load->library('form_validation');

		// sus out the server type if possible
		$data = $this->detect_server_type();

		// set server type options
		$data['server_opts'] = [
			'apache_wo' 	=> 'Apache (without mod_rewrite)',
			'apache_w'		=> 'Apache (with mod_rewrite)',
			'other'			=> 'Other (NGINX, Others without rewrite)'
		];

		$data['db_engine'] = [
			'mysqli' 	=> 'MySQL/MariaDB',
		//	'mssql'		=> 'MSSQL (Windows)',
		//	'sqlite'	=> 'SQLite',
		//	'sqlite3'	=> 'SQLite 3'

		];

		

		// if they submitted the form
		// let's check the info
		if ($this->input->post())
		{
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

	        $this->form_validation->set_rules('server', 'Server Type', 'required');
	        $this->form_validation->set_rules('db_engine', 'Database Used', 'required');
	        $this->form_validation->set_rules('db_name', 'Database Name', 'required');
	        $this->form_validation->set_rules('db_host', 'Host Name', 'required');
			$this->form_validation->set_rules('db_prefix', 'Database Prefix', 'required');
			$this->form_validation->set_rules('base_url', 'Base URL', 'required');

			if ($this->input->post('db_engine') == 'mysqli')
			{
				$this->form_validation->set_rules('db_port', 'Database Port', 'required');
	        	$this->form_validation->set_rules('db_user', 'Database Username', 'required');
	        	$this->form_validation->set_rules('db_pass', 'Database Password', 'required');
			}

			if ($this->input->post('db_engine') == 'mssql')
			{
				$this->form_validation->set_rules('db_user', 'Database Username', 'required');
	        	$this->form_validation->set_rules('db_pass', 'Database Password', 'required');
			}

	        if ($this->form_validation->run() === FALSE)
	        {

	            $this->load->view('step_one', $data);
	        }
	        else
	        {
	        	// they've passed validation, let's set some session variables
	        	// and try to connect to the database.
	        	$this->set_post_to_session();

	        	$this->set_base_url();

	        	// valid db credentials...
	        	if ($this->check_db_connect())
	        	{
	        		redirect('step_two');
	        	}
	        	else
	        	{
	        		//no connection
	        		$data['message'] = 'Error connecting to the database.  Please check your settings and try again.';
	        		$this->load->view('step_one', $data);
	        	}
	        }
		}
		else
		{
			$this->load->view('step_one', $data);
		}
	}


	public function step_two()
	{
		// load validation
		$this->load->library('form_validation');

		$this->set_base_url();

		$data ='';

		// if they submitted the form
		// let's check the info
		if ($this->input->post())
		{
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

	        $this->form_validation->set_rules('username', 'Username', 'required');
	        $this->form_validation->set_rules('first_name', 'First Name', 'required');
	        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
	        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
	        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
			$this->form_validation->set_rules('pass_conf', 'Password Confirm', 'required|matches[password]');


	        if ($this->form_validation->run() === FALSE)
	        {
	            $this->load->view('step_two', $data);
	        }
	        else
	        {
	        	// they've passed validation, let's make some bacon!
	        	
	        	// set the form values to the session
	        	$this->set_post_to_session();

	        	// now begin installing the db
	        	// and needed files
	        	
	        	$installed = $this->install();

	        	if ($installed['status'] = 'success')
	        	{
	        		redirect('step_three');
	        	}
	        	else
	        	{
	        		// cry about it.
	        		$data['message'] = $installed['message'];
	        		$this->load->view('step_two', $data);
	        	}
	        	
	        }
		}
		else
		{
			$this->load->view('step_two', $data);
		}
	}


	public function step_three()
	{
		$this->set_base_url();

		$index = ($this->session->server != 'apache_w') ? '/index.php/' : '';

		$data['login_url'] = $this->session->base_url . $index . 'auth/login';
		$data['view_url'] = $this->session->base_url;

		$this->load->view('install_complete', $data);
		$this->session->sess_destroy();
	}




		/**
	 * Install 
	 * 
	 * Installs Open Blog, databse, databse & config files
	 *
	 * @return array
	 */
	public function install()
	{

		// write application/config/config.php
		if ( ! $this->write_file_config() )
		{
			return array('status' => false, 'message' => 'Could not write config file');
		}

		// write application/config/database.php
		if ( ! $this->write_file_db() )
		{
			return array('status' => false, 'message' => 'Could not write database file');
		}

		// insert SQL into database
		if ( ! $this->process_sql() )
		{
			return array('status' => false, 'message' => 'Could not write to the database.');
		}

		// write the .htaccess file if we can
		if ( ! $this->write_file_htaccess() )
		{
			return array('status' => false, 'message' => 'Could not write htaccess file');
		}
		return array('status' => true, 'message' => 'Installed Successfully!');
	}





	/**
	 * Dir(ectory) Writable
	 * 
	 * Check to see if a directory is writable
	 * also works for files.
	 * 
	 * @return  bool
	 */
	protected function dir_writable($dir)
	{
		// returns bool true or false
		return is_writable($dir);
	}




	/**
	 * View PHP Info
	 * 
	 * Shows the php_info()
	 * 
	 * @return  void 
	 */
	public function view_php_info()
	{
		phpinfo();
	}

	/**
	 * Set Base URL
	 * 
	 * Cheat and overwrite the config array with the base_url so we
	 * can use redirect(), site_url(), etc.
	 * 
	 * @return  void 
	 */
	protected function set_base_url()
	{
		$this->config->set_item('base_url', $this->session->base_url . '/installer/');
	}


	/**
	 * Set Post to Session
	 * 
	 * Cheat and write the db & other config items to 
	 * session variables from $this->input->post()
	 * so we can connect to the database.
	 * 
	 * @return  void 
	 */
	protected function set_post_to_session()
	{
		foreach ($this->input->post() as $k => $v)
    	{
    		$this->session->set_userdata($k, $v);
    	}
	}


	/**
	 * Check DB Connect
	 * 
	 * Checks to see if we can connect to the 
	 * selected database.
	 * 
	 * @return  bool 
	 */
	protected function check_db_connect()
	{
		// mysql?
		if ($this->session->db_engine == 'mysqli')
		{
			// returns resource or ->errno
			mysqli_report(MYSQLI_REPORT_STRICT);
			try 
			{
				$mysqli = new mysqli($this->session->db_host, $this->session->db_user, $this->session->db_pass, $this->session->db_name, $this->session->db_port);
			}
			catch( Exception $e )
			{
				return FALSE;
			}
			

			if ($mysqli->connect_errno) 
			{
	    		return FALSE;
			}
			else
			{
				return TRUE;
			}
		}

		//MSSQL?
		if ($this->session->db_engine == 'mssql')
		{
			// gets the php version because 
			// PHP7 doesn't have mssql_connect()
			$php_v = explode('.', phpversion());

			if ($php_v[0] == 5)
			{
				// connect the php 5 way
				// returns identifier or FALSE
				$mssql =  mssql_connect ($this->session->db_host, $this->session->db_user, $this->session->db_pass);
				if ($mssql)
				{
					if (mssql_select_db($this->session->db_name))
					{
						return TRUE;
					}
					return FALSE;
					
				}
				else
				{
					return FALSE;
				}
			}
			elseif ($php_v[0] == 7)
			{
				// connect the php 7 way.
			}
		}
	}



	/**
	 * Detect Server Type
	 * 
	 * Attempts to determine the type
	 * of server and if mod_rewrite is
	 * available on Apache servers.
	 * 
	 * @return  array 
	 */
	protected function curl_available()
	{
    	return function_exists('curl_version');
	}


	/**
	 * Detect Server Type
	 * 
	 * Attempts to determine the type
	 * of server and if mod_rewrite is
	 * available on Apache servers.
	 * 
	 * @return  array 
	 */
	protected function detect_server_type()
	{
		// some defaults
		$data['server_type'] = 'unknown';
		$data['mod_rewrite'] = 0;
		
		// Apache?
		if (preg_match('/Apache/', $_SERVER["SERVER_SOFTWARE"]))
		{
			//yup
			$data['server_type'] = 'apache';

			// because some numbskull turned off
			// "for security reasons"   dafuq?
			if (function_exists('apache_get_modules'))
			{

			// mod_rewrite?
				if (in_array('mod_rewrite', apache_get_modules()))
				{
					// batting a thousand
					$data['mod_rewrite'] = 1;
				}
			}
		}
		elseif (preg_match('/Nginx/', $_SERVER["SERVER_SOFTWARE"]))
		{
			// found Nginx.
			$data['server_type'] = 'nginx';
		}
		return $data;
	}



	/**
	 * Process the SQL statements.
	 *
	 * @param string $file A string or path to a file containing SQL statements separated with '-- split --'.
	 *
	 * @return bool
	 */
	protected function process_sql()
	{
		// connect to db
		$db = new mysqli($this->session->db_host, $this->session->db_user, $this->session->db_pass, $this->session->db_name, $this->session->db_port);

		// parse password

		$user_salt = $this->salt();
		$parsed_password = $this->hash_password($this->session->password, $user_salt);


		// Get the SQL for the intended database and parse it
		$schema = file_get_contents('./src/' .  $this->session->db_engine . '.sql');

		$schema = str_replace('{PREFIX}', $this->session->db_prefix, $schema);
		$schema = str_replace('{USER-EMAIL}', $this->session->email, $schema);
		$schema = str_replace('{USER-NAME}', $db->real_escape_string($this->session->username), $schema);
		$schema = str_replace('{PASSWORD}', $db->real_escape_string($parsed_password), $schema);
		$schema = str_replace('{FIRST-NAME}', $db->real_escape_string($this->session->first_name), $schema);
		$schema = str_replace('{LAST-NAME}', $db->real_escape_string($this->session->last_name), $schema);
		$schema = str_replace('{SALT}', $user_salt, $schema);
		$schema = str_replace('{NOW}', time(), $schema);
		//$schema = str_replace('{MIGRATION}', $config['migration_version'], $schema);


		// Parse the queries
		$queries = explode('-- split --', $schema);

		foreach ($queries as $query)
		{
			$query = rtrim( trim($query), "\n");

			if ( ! $db->query($query) )
			{
				print_r($db->error);
				return false;
			}
		}
		return true;
	}


	/**
	 * Writes the database file
	 *
	 * @return string
	 */
	protected function write_file_db()
	{
		$replace = array(
			'___HOSTNAME___' 	=> $this->session->db_host,
			'___USERNAME___' 	=> $this->session->db_user,
			'___PASSWORD___' 	=> $this->session->db_pass,
			'___DATABASE___' 	=> $this->session->db_name,
			'___PORT___'     	=> $this->session->db_port ? $this->session->db_port : 3306,
			'___PREFIX___'		=> $this->session->db_prefix,
			'___DRIVER___'   	=> class_exists($this->session->db_engine) ? $this->session->db_engine : 'mysqli'
		);

		return $this->write_file_vars('../application/config/database.php', '../application/config//database.php.bak', $replace);
	}


	/**
	 * Writes the config file
	 *
	 * @return string
	 */
	protected function write_file_config()
	{
		$this->load->helper('string');
		
		// Able to remove index.php?
		$index_page = ($this->session->server == 'apache_w') ? '' : 'index.php';
		
		// Make random encryption key for each website
		$encryption_key = random_string('sha1');

		return $this->write_file_vars('../application/config/config.php', '../application/config/config.php.bak', array(
																							'___BASE_URL___' => $this->session->base_url,
																							'___INDEX_PAGE___' => $index_page,
																							'___ENCRYPTION_KEY___' => $encryption_key,
																							)
		);
	}

	protected function write_file_htaccess()
	{
		if ($this->session->server == 'apache_w')
		{
			if ( ! $this->write_file_vars('../.htaccess', './src/htaccess', array()) )
			{
				return false;
			}
		}
		return true;
	}



	/**
	 * Write File Var(riable)s
	 * 
	 * Write a file by replacing the placeholders found in a template file with values provided.
	 *
	 * @param string $dest  	The path to where the file should be written.
	 * @param string $temp     	The path to the template file.
	 * @param array  $replace 	Contains 'placeholder => value' pairs for the replacements
	 *
	 * @return string
	 */
	protected function write_file_vars($dest, $temp, $replace)
	{
		return (file_put_contents($dest, str_replace(array_keys($replace), $replace, file_get_contents($temp))) !== false);
	}



		/**
	 * Generates a random salt value.
	 *
	 * Salt generation code taken from https://github.com/ircmaxell/password_compat/blob/master/lib/password.php
	 *
	 * @return void
	 * @author Anthony Ferrera
	 **/
	public function salt()
	{

		$raw_salt_len = 16;

 		$buffer = '';
        $buffer_valid = false;

        if (function_exists('mcrypt_create_iv') && !defined('PHALANGER')) {
            $buffer = mcrypt_create_iv($raw_salt_len, MCRYPT_DEV_URANDOM);
            if ($buffer) {
                $buffer_valid = true;
            }
        }

        if (!$buffer_valid && function_exists('openssl_random_pseudo_bytes')) {
            $buffer = openssl_random_pseudo_bytes($raw_salt_len);
            if ($buffer) {
                $buffer_valid = true;
            }
        }

        if (!$buffer_valid && @is_readable('/dev/urandom')) {
            $f = fopen('/dev/urandom', 'r');
            $read = strlen($buffer);
            while ($read < $raw_salt_len) {
                $buffer .= fread($f, $raw_salt_len - $read);
                $read = strlen($buffer);
            }
            fclose($f);
            if ($read >= $raw_salt_len) {
                $buffer_valid = true;
            }
        }

        if (!$buffer_valid || strlen($buffer) < $raw_salt_len) {
            $bl = strlen($buffer);
            for ($i = 0; $i < $raw_salt_len; $i++) {
                if ($i < $bl) {
                    $buffer[$i] = $buffer[$i] ^ chr(mt_rand(0, 255));
                } else {
                    $buffer .= chr(mt_rand(0, 255));
                }
            }
        }

        $salt = $buffer;

        // encode string with the Base64 variant used by crypt
        $base64_digits   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
        $bcrypt64_digits = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $base64_string   = base64_encode($salt);
        $salt = strtr(rtrim($base64_string, '='), $base64_digits, $bcrypt64_digits);

	    $salt = substr($salt, 0, $this->salt_length);


		return $salt;

	}

	/**
	 * Hashes the password to be stored in the database.
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function hash_password($password, $salt=false, $use_sha1_override=FALSE)
	{
		if (empty($password))
		{
			return FALSE;
		}

		// bcrypt
		if ($use_sha1_override === FALSE && $this->hash_method == 'bcrypt')
		{
			return $this->bcrypt->hash($password);
		}


		if ($this->store_salt && $salt)
		{
			return  sha1($password . $salt);
		}
		else
		{
			$salt = $this->salt();
			return  $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
		}
	}



} // /class
