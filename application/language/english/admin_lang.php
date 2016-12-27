<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	Language variable for the admin control panel
 */

$lang['yes']								= 'Yes';
$lang['no']									= 'No';
$lang['pages']								= 'Pages';
$lang['blog']								= 'Blog';

// Settings
$lang['settings_help_txt']					= "Settings allows you to change how your website performs certain actions and basic information like your site's name.";
$lang['allow_comments_label']				= "Allow Comments";
$lang['allow_comments_desc']				= "Do you want to allow comments on your blog posts?";
$lang['base_controller_label']				= "Base Controller (BETA)";
$lang['base_controller_desc']				= "Choose where the homepage is...";
$lang['blog_description_label']				= "Blog Description";
$lang['blog_description_desc']				= "Enter a short description (or tag line) for your blog.";
$lang['category_list_limit_label']			= "Category Limit";
$lang['category_list_limit_desc']			= "Choose how may items you would like shown when listing categories on the homepage.";
$lang['enable_atom_comments_label']			= "Enable ATOM Comments";
$lang['enable_atom_comments_desc']			= "Do you want to enable the ATOM comments feed for your blog?";
$lang['enable_atom_posts_label']			= "Enable ATOM Posts";
$lang['enable_atom_posts_desc']				= "Do you want to enable the ATOM posts feed for your blog?";
$lang['enable_rss_comments_label']			= "Enable RSS Comments";
$lang['enable_rss_comments_desc']			= "Do you want to enable the RSS comments feed for your blog?";
$lang['enable_rss_posts_label']				= "Enable RSS Posts";
$lang['enable_rss_posts_desc']				= "Do you want to enable the RSS posts feed for your blog?";
$lang['links_per_box_label']				= "Link Limit";
$lang['links_per_box_desc']					= "Choose how may items you would like shown when listing links on the homepage.";
$lang['mod_non_user_comments_label']		= "Moderate Non User Comments";
$lang['mod_non_user_comments_desc']			= "Do you want to moderate non-users and non-logged in users?";
$lang['mod_user_comments_label']			= "Moderate User Comments";
$lang['mod_user_comments_desc']				= "Do you want to moderate logged in users?";
$lang['months_per_archive_label']			= "Archive Limit";
$lang['months_per_archive_desc']			= "Choose how may items you would like shown when listing archives on the homepage";
$lang['posts_per_page_label']				= "Posts per Page Limit";
$lang['posts_per_page_desc']				= "How many blog posts would you like to show on each page of your blog?";
$lang['recaptcha_private_key_label']		= "Google Recaptcha Private Key";
$lang['recaptcha_private_key_desc']			= "Enter the PRIVATE key provided by google.";
$lang['recaptcha_site_key_label']			= "Google Recaptcha Site Key";
$lang['recaptcha_site_key_desc']			= "Enter the SITE key provided by google.";
$lang['site_name_label']					= "Site Name";
$lang['site_name_desc']						= "Enter the name of your website.";
$lang['theme_image_label']					= "";
$lang['theme_image_desc']					= "";
$lang['use_recaptcha_label']				= "Enable Recaptcha";
$lang['use_recaptcha_desc']					= 'Whould you like to enable Google Recaptcha for your site to help elimitate SPAM and comment moderation? <a href="https://www.google.com/recaptcha/intro/" target="_blank">[More Info <i class="fa fa-external-link"></i>]</a>';



// Links
$lang['links_hdr']							= "Links";
$lang['link_remove_btn']					= "Remove Link";
$lang['link_edit_btn']						= "Edit Link";
$lang['index_add_new_link']					= "Add New Link";
$lang['add_link_subheading']				= "Please add the link information below. These are external links, make sure to prepend http:// or https:// to your link url.";
$lang['link_form_name']						= "Link Name";
$lang['link_form_url']						= "http://";
$lang['link_form_desc']						= "Description";
$lang['link_form_position']					= "Order";
$lang['link_form_target']					= "Target";
$lang['link_form_visibility']				= "Visibility";
$lang['blank_window']						= "Open in new window";
$lang['same_window']						= "Open in same window";
$lang['visible']							= "Visible";
$lang['not_visible']						= "Hidden";
$lang['save_link_btn']						= "Save Link";
$lang['link_added_success_resp']			= "Link added successfully";
$lang['link_added_fail_resp']				= "Could not add Link.  Please try agian.";
$lang['link_removed_success_resp']			= "Link removed successfully";
$lang['link_removed_fail_resp']				= "Could not remove Link.  Please try agian.";
$lang['link_update_success_resp']			= "Link updated successfully";
$lang['link_update_fail_resp']				= "Could not update Link.  Please try agian.";



// Categories
$lang['cats_hdr']							= "Categories";
$lang['cat_remove_btn']					= "Remove Category";
$lang['cat_edit_btn']						= "Edit Category";
$lang['index_add_new_cat']					= "Add New Category";
$lang['add_cat_subheading']				= "Please add the category information below.";
$lang['cat_form_name']						= "Category Name";
$lang['cat_form_url']						= "(same as above, all lowercase, no spaces)";
$lang['cat_form_desc']						= "Description";
$lang['blank_window']						= "Open in new window";
$lang['same_window']						= "Open in same window";
$lang['visible']							= "Visible";
$lang['not_visible']						= "Hidden";
$lang['save_cat_btn']						= "Save Category";
$lang['cat_added_success_resp']				= "Category added successfully";
$lang['cat_added_fail_resp']				= "Could not add Category.  Please try agian.";
$lang['cat_removed_success_resp']			= "Category removed successfully";
$lang['cat_removed_fail_resp']				= "Could not remove Category.  Please try agian.";
$lang['cat_update_success_resp']			= "Category updated successfully";
$lang['cat_update_fail_resp']				= "Could not update Category.  Please try agian.";

//$lang['']		= "";


// pages
$lang['pages_hdr']							= "Pages";
$lang['optional_hdr']						= "Optional";
$lang['optional_help_text']					= "While the options below are optional, they are highly recommended and greatly help with Search Engine Optimization (SEO). We also generate meta tags for facebook and twitter with these values.";
$lang['page_remove_btn']					= "Remove Page";
$lang['page_edit_btn']						= "Edit Page";
$lang['index_add_new_page']					= "Add New Page";
$lang['index_edit_page']					= "Edit Page";
$lang['save_page_btn']						= "Save Page";
$lang['page_added_success_resp']			= "Page added successfully";
$lang['page_added_fail_resp']				= "Could not add Page.  Please try agian.";
$lang['page_removed_success_resp']			= "Page removed successfully";
$lang['page_removed_fail_resp']				= "Could not remove Page.  Please try agian.";
$lang['page_update_success_resp']			= "Page updated successfully";
$lang['page_update_fail_resp']				= "Could not update Page.  Please try agian.";
$lang['page_form_title_text']				= "Page Title";
$lang['page_form_title_help_text']			= "Enter the title of your page.";
$lang['page_form_status_text']				= "Status";
$lang['page_form_status_help_text']			= "Choose if you want the page to be Live or Draft.";
$lang['page_form_status_active']			= "Live";
$lang['page_form_status_inactive']			= "Draft";
$lang['page_form_content_text']				= "Page Content";
$lang['page_form_content_help_text']		= "Enter the content of your page below. Use the editor to help you format with Markdown.";
$lang['page_form_meta_title_text']			= "META Title";
$lang['page_form_meta_title_help_text']		= "Usually the same as your page title, but you can enter a different one here.";
$lang['page_form_meta_keywords_text']		= "META Keywords";
$lang['page_form_meta_keywords_help_text']	= "Enter the keywords for this page seperated by commas.";
$lang['page_form_meta_desc_text']			= "META Description";
$lang['page_form_meta_desc_help_text']		= "Enter the description for this page.  It's best to keep it between 50 and 100 characters.";
$lang['page_form_home_text']				= "Homepage";
$lang['page_form_home_help_text']			= "Check the box if this page is the homepage. You must choose Pages to be the default controller in Settings.  Any other page currently marked as the homepage will be removed as the homepage.";
$lang['page_form_url_title_text']			= "URL Title";
$lang['page_form_url_title_help_text']		= "This is the 'slug' shown in the URL of your page. If you change this value, there must be NO spaces between words, instead, used dashes. <br>IE: new-url-title";
$lang['page_form_redirect_text']			= "Redirection";
$lang['page_form_redirect_help_text']		= "If you change the URL Title above we automatically set up an HTTP 301 (perminent) redirect for you so the old url_title points to the new page url_title. Here, you can override the default settings.";
$lang['page_form_redirect_none']			= "Do Not Redirect Old URL Title";
$lang['page_form_redirect_perm']			= "Perminently Redirect to new URL Title";
$lang['page_form_redirect_temp']			= "Temporarily Redirect to new URL Title";



// buttons
$lang['save_settings']						= "Save Settings";



// form action responses
$lang['settings_update_success']						= "Settings Updated Successfully";
$lang['settings_update_failed']						= "Settings Failed to Update.  Please try again.";



// installer directory warning
$lang['installer_dir_warning_notice']		= "The /installer/ directory is still present.  For better security you should delete the installer/ directory and it's contents immediately!";


