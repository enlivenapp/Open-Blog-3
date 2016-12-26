<?php

class Admin_m extends CI_Model
{
	// Protected or private properties
	protected $_table;
	
	// Constructor
	public function __construct()
	{
		parent::__construct();

		// Load needed models, libraries, helpers and language files
		$this->load->model('blog/categories_m');
		
		$tables = $this->config->item('openblog');
		$this->_table = $tables['tables'];
	}



	public function get_dashboard()
	{
		$data = new stdClass();

		$data->post_count = $this->count_posts();
		$data->active_comments_count = $this->count_comments();
		$data->modded_comments_count = $this->count_comments(1);
		$data->new_notices_count = $this->count_notices();

		return $data;
	}

	public function get_settings_list()
	{
		$data = new stdClass();
		$tabs = $this->db->select('tab')->distinct()->get('settings')->result();

		foreach ($tabs as &$tab)
		{
			$tab->list = $this->db->where('tab', $tab->tab)->get('settings')->result();

			foreach ($tab->list as &$item)
			{
				$item->input = $this->build_form_field($item->field_type, $item->name, $item->value, $item->options);
			}
		}
		$data->settings = $tabs;

		return $data;
	}

	public function update_settings()
	{
		if (! $this->input->post())
		{
			return FALSE;
		}

		foreach ($this->input->post() as $k => $v)
		{
			if (! $this->db->where('name', $k)->update('settings', ['value' => $v]))
			{
				return false;
			}
		}
		return TRUE;
	}

	public function get_required_settings()
	{
		return $this->db->where('required', 1)->get('settings')->result();
	}


	public function count_posts()
	{
		return $this->db->where('status', 'published')->count_all_results('posts');
	}

	public function count_comments($modded = '0')
	{
		return $this->db->where('modded', $modded)->count_all_results('comments');
	}

	public function count_notices()
	{
		return $this->db->where('user_id', $this->ion_auth->get_user_id())->where('notice_read', 0)->count_all_results('notifications');
	}



	public function get_groups_permissions($group_id)
	{
		$permissions = $this->db
						->where('groups_perms.group_id', $group_id)
						->join('groups_perms', 'groups_perms.perms_id = group_permissions.id')
						->get('group_permissions')
						->result();

		foreach ($permissions as & $perm)
		{
			$perm->name = (lang($perm->name)) ? lang($perm->name) : $perm->name;
		}

		return $permissions;
	}

	public function get_group_perms($group_id)
	{
		$permissions = $this->db
						->get('group_permissions')
						->result();

		foreach ($permissions as & $perm)
		{
			$perm->selected = $this->db->select('id')->where('perms_id', $perm->id)->where('group_id', $group_id)->limit(1)->get('groups_perms')->row();
			$perm->name = (lang($perm->name)) ? lang($perm->name) : $perm->name;
		}

		return $permissions;
	}

	public function update_group_perms($group, $data)
	{
		// get current group perms
		$current = $this->db->where('group_id', $group)->get('groups_perms')->result();
//print_r($current);
		foreach ($current as $ck => $item)
		{
			foreach ($data as $k => $v)
			{
				if ($k == $item->perms_id)
				{
					unset($current[$ck]);
					unset($data[$k]);
				}
			}
		}

		// now we have
		// $current which has removed permissions and
		// $data which has new permsission.
		
		// if there's still something in $current, we need
		// to remove those permissions
		if ($current)
		{
			foreach ($current as $item)
			{
				$this->db->delete('groups_perms', ['id' => $item->id]);
			}
		}

		// now we need to add the new
		// permissions if there's any
		if ($data)
		{
			foreach ($data as $k => $v)
			{
				// we don't care about $v
				$this->db->insert('groups_perms', ['perms_id' => $k, 'group_id' => $group]);
			}
			
		}
//		echo "<pre>";
//		print_r($current);
//		print_r($data);

	}












}

