<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Blog M
 * 
 * Public Blog Model Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Blog_m extends CI_Model
{
	// Protected or private properties
	protected $_table;
	
	/**
     * Construct
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function __construct()
	{
		parent::__construct();

		// Load needed models, libraries, helpers and language files
		$this->load->model('Categories_m');
		
		$tables = $this->config->item('openblog');
		$this->_table = $tables['tables'];
	}

	/**
     * get_posts
     * 
     * Gets blog posts with pagination
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  array
     */
	public function get_posts($offset = 0)
	{
		// today's date
		$current_date = date('Y-m-d');
		
		// rediculous db call
		$this->db->select( $this->db->dbprefix($this->_table['posts']. '.*,') . $this->db->dbprefix($this->_table['users'] . '.first_name, ') . $this->db->dbprefix($this->_table['users']. '.last_name') )
					->join( $this->db->dbprefix($this->_table['users']), $this->db->dbprefix($this->_table['posts']. '.author') . ' = '  . $this->db->dbprefix($this->_table['users'] . '.id') )
					->where($this->db->dbprefix($this->_table['posts'] . '.status'), 'published')
					->where($this->db->dbprefix($this->_table['posts'] . '.date_posted') . ' <= ', $current_date)
					->order_by($this->db->dbprefix($this->_table['posts'] . '.sticky'), 'DESC')
					->order_by($this->db->dbprefix($this->_table['posts'] . '.id'), 'DESC')
					->limit($this->config->item('posts_per_page'), $offset);
			
		$query = $this->db->get($this->_table['posts']);
		
		// did we find anything?	
		if ($query->num_rows() > 0)
		{
			// yes...
			$result['posts'] = $query->result_array();

			// process for needed fields.
			foreach ($result['posts'] as &$item)
			{
				$item['url'] = post_url($item['url_title'], $item['date_posted']);
				$item['display_name'] = $this->concat_display_name($item['first_name'], $item['last_name']);
				$item['categories'] = $this->Categories_m->get_categories_by_ids($this->get_post_categories($item['id']));
				$item['comment_count'] = $this->db->where('post_id', $item['id'])->where('modded', '0')->from($this->_table['comments'])->count_all_results();
				$item['date_posted'] = DateTime::createFromFormat('Y-m-d', $item['date_posted'])->format('D M d Y');
			}

			$result['post_count'] = $query->num_rows();

			return json_decode(json_encode($result));
		}

		// failed... bounce.
		return array();
	}

	/**
     * get_links
     * 
     * gets the links to display in the
     * footer-ish widget-ish thing...
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function get_links()
	{
		$query = $this->db->where('visible', 'yes')->order_by('position', 'ASC')->get('links');
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;
	}



	/**
	 * Get Archive
	 * 
	 * Retrieves the archives
	 * 
	 * @since  v3.0.0
	 * 
	 * 
	 * @return array
	 */
	public function get_archive()
	{
		// more crazy db build/call
		$this->db->select('COUNT(' . $this->db->dbprefix($this->_table['posts'] . '.id') . ') AS posts_count, ' . $this->db->dbprefix($this->_table['posts'] .'.date_posted') . ' FROM ' . $this->db->dbprefix($this->_table['posts']) . ' WHERE ' . $this->db->dbprefix($this->_table['posts'] .'.status') . ' = \'published\' GROUP BY SUBSTRING(' . $this->db->dbprefix($this->_table['posts'] .'.date_posted') . ', 1, 7)', FALSE)
					->order_by($this->db->dbprefix($this->_table['posts'] . '.date_posted'), 'DESC')
					->limit($this->config->item('months_per_archive'));
		
		$query = $this->db->get();
		
		// we can haz results?
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			
			foreach ($result as &$item)
			{
				$item['url']  = date('Y', strtotime($item['date_posted'])) . '/' . date('m', strtotime($item['date_posted'])) . '/';
				$item['date_posted']  = strftime('%B %Y', strtotime($item['date_posted']));
			}
			return $result;
		}
		return false;
	}

	/**
     * get_categories
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  string
     */
	public function get_categories()
	{
		return $this->Categories_m->get_categories();
	}

	/**
	 * Concat Display Name 
	 * 
	 * Concats the first and last name. Defaults are 'empty'
	 * This is used when a user does not have an ID. Otherwise,
	 * the Ion_Auth lib is used.
	 * 
	 * @since  v3.0.0
	 * 
	 * @param  $fname The first name
	 * @param  $lname The last name
	 * 
	 * @return string
	 */
	public function concat_display_name($fname = 'empty', $lname='empty')
	{
		return $fname . ' ' . $lname;
	}

	/**
     * get_post_by_url
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  array|bool
     */
	public function get_post_by_url($url_title)
	{
		// load markdown lib
		$this->load->library('markdown');

		$this->db->select('posts.*, users.first_name, users.last_name')
					->join($this->_table['users'] . ' users', 'posts.author = users.id')
					->where('posts.status', 'published')
					->where('posts.url_title', $url_title);


		$this->db->limit(1);
			
		$query = $this->db->get($this->_table['posts']);
			
		if ($query->num_rows() == 1)
		{
			// yep
			$result = $query->row_array();

			// build the needed vaules
			$result['content'] = $this->markdown->parse($result['content']);
			$result['url'] = post_url($result['url_title']);
			$result['display_name'] = $this->concat_display_name($result['first_name'], $result['last_name']);
			$result['categories'] = $this->Categories_m->get_categories_by_ids($this->get_post_categories($result['id']));
			$result['comment_count'] = $this->db->where('post_id', $result['id'])->where('modded', '0')->from($this->_table['comments'])->count_all_results();

			return $result;
		}
		return false;
	}
	
	/**
     * get_post_by_date
     * 
     * AKA archived posts...
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  obj|array
     */
	public function get_posts_by_date($year, $month)
	{
		$result = new stdClass();
		$date = $year . '-' . $month;
		$current_date = date('Y-m-d');
		
		$this->db->select('posts.*, users.first_name, users.last_name')
					->join($this->_table['users'] . ' users', 'posts.author = users.id')
					->where('posts.status', 'published')
					->where('posts.date_posted <=', $current_date)
					->like('posts.date_posted', $date)
					->order_by('posts.sticky', 'DESC')
					->order_by('posts.id', 'DESC');
			
		$query = $this->db->get($this->_table['posts']);
			
		if ($query->num_rows() > 0)
		{			
			$result->posts = $query->result();
			
			foreach ($result->posts as &$item)
			{
				$item->url = post_url($item->url_title, $item->date_posted);
				$item->display_name = $this->concat_display_name($item->first_name, $item->last_name);
				$item->categories = $this->Categories_m->get_categories_by_ids($this->get_post_categories($item->id));
				$item->comment_count = $this->db->where('post_id', $item->id)->where('modded', '0')->from($this->_table['comments'])->count_all_results();
			}

			$result->post_count = $query->num_rows();

			return $result;
		}
		return [];
	}

	/**
     * get_posts_by_category
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  obj|array
     */
	public function get_posts_by_category($url_name)
	{
		$result = new stdClass();
		$current_date = date('Y-m-d');
		
		$this->db->select('posts.*, users.first_name, users.last_name')
					->join($this->_table['posts_to_categories'] . ' posts_to_categories', 'posts.id = posts_to_categories.post_id')
					->join($this->_table['categories'] . ' categories', 'posts_to_categories.category_id = categories.id')
					->join($this->_table['users'] . ' users', 'posts.author = users.id')
					->where('posts.status', 'published')
					->where('posts.date_posted <=', $current_date)
					->where('categories.url_name', $url_name)
					->order_by('posts.sticky', 'DESC')
					->order_by('posts.id', 'DESC');
			
		$query = $this->db->get($this->_table['posts']);
			
		if ($query->num_rows() > 0)
		{
			$result->posts = $query->result();
			
			foreach ($result->posts as &$item)
			{
				$item->url = post_url($item->url_title, $item->date_posted);
				$item->display_name = $this->concat_display_name($item->first_name, $item->last_name);
				$item->categories = $this->Categories_m->get_categories_by_ids($this->get_post_categories($item->id));
				$item->comment_count = $this->db->where('post_id', $item->id)->where('modded', '0')->from($this->_table['comments'])->count_all_results();
			}

			$result->post_count = $query->num_rows();

			return $result;
		}
		return [];
	}




//---------------------------------------------------------------------------------------------------
////---------------------------------------------------------------------------------------------------
/////---------------------------------------------------------------------------------------------------
/////---------------------------------------------------------------------------------------------------
/////--------------               Kept for now...   may be deleted         -----------------------------
/////---------------------------------------------------------------------------------------------------
///'//---------------------------------------------------------------------------------------------------
/////---------------------------------------------------------------------------------------------------
/////---------------------------------------------------------------------------------------------------'


public function get_posts_count()
	{
		$this->db->select('id');
		$this->db->where('status', 'published');
			
		$query = $this->db->count_all_results($this->_table['posts']);
			
		return $query;
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