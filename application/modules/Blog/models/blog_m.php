<?php

class Blog_m extends CI_Model
{
	// Protected or private properties
	protected $_table;
	
	// Constructor
	public function __construct()
	{
		parent::__construct();

		// Load needed models, libraries, helpers and language files
		$this->load->model('categories_m');
		
		$tables = $this->config->item('openblog');
		$this->_table = $tables['tables'];
	}



		public function get_posts($offset = 0)
	{
		$current_date = date('Y-m-d');
		
		$this->db->select($this->db->dbprefix($this->_table['posts']) . '.*, ' . $this->db->dbprefix($this->_table['users']) . '.first_name, ' . $this->db->dbprefix($this->_table['users'])  . '.last_name');
		$this->db->join($this->db->dbprefix($this->_table['users']), $this->db->dbprefix($this->_table['posts']) . '.author = ' . $this->db->dbprefix($this->_table['users']) . '.id');
		$this->db->where($this->db->dbprefix($this->_table['posts']) . '.status', 'published');
		$this->db->where($this->db->dbprefix($this->_table['posts']) . '.date_posted <=', $current_date);
		$this->db->order_by($this->db->dbprefix($this->_table['posts']) . '.sticky', 'DESC');
		$this->db->order_by($this->db->dbprefix($this->_table['posts']) . '.id', 'DESC');
		$this->db->limit($this->config->item('posts_per_page'), $offset);
			
		$query = $this->db->get($this->_table['posts']);
			
		if ($query->num_rows() > 0)
		{
			$result['posts'] = $query->result_array();
			
			foreach ($result['posts'] as &$item)
			{
				$item['url'] = '';
				$item['display_name'] = $item['first_name'] . ' ' . $item['last_name'];
				$item['categories'] = $this->categories_m->get_categories_by_ids($this->get_post_categories($item['id']));
				$item['comment_count'] = $this->db->where('post_id', $item['id'])->from($this->_table['comments'])->count_all_results();
			}

			$result['post_count'] = $query->num_rows();

			return json_decode(json_encode($result));
		}
		return array();
	}



public function get_posts_count()
	{
		$this->db->select('id');
		$this->db->where('status', 'published');
			
		$query = $this->db->count_all_results($this->_table['posts']);
			
		return $query;
	}






	public function get_archive()
	{
		return array();
	}

	public function get_categories()
	{
		return $this->categories_m->get_categories();
	}

	public function get_links()
	{
		$query = $this->db->get('categories');
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;
	}

	

	
	
	public function get_post_categories($post_id)
	{
		$this->db->select('category_id');
		$this->db->where('post_id', $post_id);
		
		$query = $this->db->get($this->_table['posts_to_categories']);
			
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			
			foreach ($result as $category)
			{
				$categories[] = $category['category_id'];
			}
			
			return $categories;
		}
	}


	public function get_posts_by_date($year, $month)
	{
		$date = $year . '-' . $month;
		$current_date = date('Y-m-d');
		
		$this->db->select('posts.id, posts.author, posts.date_posted, posts.title, posts.url_title, posts.excerpt, posts.content, posts.allow_comments, posts.sticky, posts.status, posts.author, users.display_name');
		$this->db->from($this->_table['posts'] . ' posts');
		$this->db->join($this->_table['users'] . ' users', 'posts.author = users.id');
		$this->db->where('posts.status', 'published');
		$this->db->where('posts.date_posted <=', $current_date);
		$this->db->like('posts.date_posted', $date);
		$this->db->order_by('posts.sticky', 'DESC');
		$this->db->order_by('posts.id', 'DESC');
			
		$query = $this->db->get();
			
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			
			foreach (array_keys($result) as $key)
			{
				$result[$key]['categories'] = $this->categories->get_categories_by_ids($this->get_post_categories($result[$key]['id']));
				$result[$key]['comment_count'] = $this->db->where('post_id', $result[$key]['id'])->from($this->_table['comments'])->count_all_results();
			}

			return $result;
		}
	}

	public function get_posts_by_category($url_name)
	{
		$current_date = date('Y-m-d');
		
		$this->db->select('posts.id, posts.author, posts.date_posted, posts.title, posts.url_title, posts.excerpt, posts.content, posts.allow_comments, posts.sticky, posts.status, posts.author, users.display_name');
		$this->db->from($this->_table['posts'] . ' posts');
		$this->db->join($this->_table['posts_to_categories'] . ' posts_to_categories', 'posts.id = posts_to_categories.post_id');
		$this->db->join($this->_table['categories'] . ' categories', 'posts_to_categories.category_id = categories.id');
		$this->db->join($this->_table['users'] . ' users', 'posts.author = users.id');
		$this->db->where('posts.status', 'published');
		$this->db->where('posts.date_posted <=', $current_date);
		$this->db->where('categories.url_name', $url_name);
		$this->db->order_by('posts.sticky', 'DESC');
		$this->db->order_by('posts.id', 'DESC');
			
		$query = $this->db->get();
			
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			
			foreach (array_keys($result) as $key)
			{
				$result[$key]['categories'] = $this->categories->get_categories_by_ids($this->get_post_categories($result[$key]['id']));
				$result[$key]['comment_count'] = $this->db->where('post_id', $result[$key]['id'])->from($this->_table['comments'])->count_all_results();
			}

			return $result;
		}
	}

	public function get_post_by_url($year, $month, $day, $url_title)
	{
		$date = $year . '-' . $month . '-' . $day;
		
		$this->db->select('posts.id, posts.author, posts.date_posted, posts.title, posts.url_title, posts.excerpt, posts.content, posts.allow_comments, posts.sticky, posts.status, posts.author, users.display_name');
		$this->db->from($this->_table['posts'] . ' posts');
		$this->db->join($this->_table['users'] . ' users', 'posts.author = users.id');
		$this->db->where('posts.status', 'published');
		$this->db->where('posts.url_title', $url_title);
		$this->db->where('posts.date_posted', $date);
		$this->db->limit(1);
			
		$query = $this->db->get();
			
		if ($query->num_rows() == 1)
		{
			$result = $query->row_array();
			
			$result['categories'] = $this->categories->get_categories_by_ids($this->get_post_categories($result['id']));
			$result['comment_count'] = $this->db->where('post_id', $result['id'])->from($this->_table['comments'])->count_all_results();

			return $result;
		}
	}
	
	public function get_post_by_id($post_id)
	{
		$this->db->select('posts.id, posts.author, posts.date_posted, posts.title, posts.url_title, posts.excerpt, posts.content, posts.allow_comments, posts.sticky, posts.status, posts.author, users.display_name');
		$this->db->from($this->_table['posts'] . ' posts');
		$this->db->join($this->_table['users'] . ' users', 'posts.author = users.id');
		$this->db->where('posts.status', 'published');
		$this->db->where('posts.id', $post_id);
		$this->db->limit(1);
		
		$query = $this->db->get();
			
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			
			foreach (array_keys($result) as $key)
			{
				$result[$key]['categories'] = $this->categories->get_categories_by_ids($this->get_post_categories($result[$key]['id']));
				$result['comment_count'] = $this->db->where('post_id', $result['id'])->from($this->_table['comments'])->count_all_results();
			}

			return $result;
		}
	}
	
	public function get_posts_by_tags($tag_name)
	{
		$current_date = date('Y-m-d');
		
		$this->db->select('posts.id, posts.author, posts.date_posted, posts.title, posts.url_title, posts.excerpt, posts.content, posts.allow_comments, posts.sticky, posts.status, posts.author, users.display_name');
		$this->db->from($this->_table['posts'] . ' posts');
		$this->db->join($this->_table['users'] . ' users', 'posts.author = users.id');
		$this->db->join($this->_table['tags_to_posts'] . ' tags_to_posts', 'posts.id = tags_to_posts.post_id');
		$this->db->join($this->_table['tags'] . ' tags', 'tags_to_posts.tag_id = tags.id');
		$this->db->where('posts.status', 'published');
		$this->db->where('posts.date_posted <=', $current_date);
		$this->db->where('tags.name', $tag_name);
		$this->db->order_by('posts.sticky', 'DESC');
		$this->db->order_by('posts.id', 'DESC');
			
		$query = $this->db->get();
			
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			
			foreach (array_keys($result) as $key)
			{
				$result[$key]['categories'] = $this->categories->get_categories_by_ids($this->get_post_categories($result[$key]['id']));
				$result[$key]['comment_count'] = $this->db->where('post_id', $result[$key]['id'])->from($this->_table['comments'])->count_all_results();
			}

			return $result;
		}
	}

	public function get_posts_by_term($term)
	{
		$current_date = date('Y-m-d');
		
		$this->db->select('posts.id, posts.author, posts.date_posted, posts.title, posts.url_title, posts.excerpt, posts.content, posts.allow_comments, posts.sticky, posts.status, posts.author, users.display_name');
		$this->db->from($this->_table['posts'] . ' posts');
		$this->db->join($this->_table['users'] . ' users', 'posts.author = users.id');
		$this->db->where('posts.status', 'published');
		$this->db->where('posts.date_posted <=', $current_date);
		$this->db->like('posts.title', $term);
		$this->db->orlike('posts.excerpt', $term);
		$this->db->orlike('posts.content', $term);
		$this->db->order_by('posts.sticky', 'DESC');
		$this->db->order_by('posts.id', 'DESC');
			
		$query = $this->db->get();
			
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			
			foreach (array_keys($result) as $key)
			{
				$result[$key]['categories'] = $this->categories->get_categories_by_ids($this->get_post_categories($result[$key]['id']));
				$result[$key]['comment_count'] = $this->db->where('post_id', $result[$key]['id'])->from($this->_table['comments'])->count_all_results();
			}

			return $result;
		}
	}
}

/* End of file blog_model.php */
/* Location: ./application/modules/blog/models/blog_model.php */