<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	Language variable for the admin control panel
 */

$lang['yes']								= 'Yes';
$lang['no']									= 'No';
$lang['pages']								= 'Pages';
$lang['blog']								= 'Blog';

// Settings
$lang['settings_help_txt']					= "Settings allow you to change how your website performs certain actions and basic information like your site's name.";
$lang['allow_comments_label']				= "Allow Comments";
$lang['allow_comments_desc']				= "Do you want to allow comments on your blog posts?";
$lang['base_controller_label']				= "Base Controller";
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
$lang['use_recaptcha_desc']					= 'Would you like to enable Google Recaptcha for your site to help eliminate SPAM and comment moderation? <a href="https://www.google.com/recaptcha/intro/" target="_blank">More Info <sup><i class="fa fa-external-link"></i></sup></a>';
$lang['use_honeypot_label']					= "Enable Form Honey Pots";
$lang['use_honeypot_desc']					= "To help prevent SPAM, you can use a honey pot, a SPAMmer filling in a hidden field that should not be. This will help protect your comment and registration forms from robots but not humans. ";
$lang['mail_protocol_label']				= "Mail Protocol";
$lang['mail_protocol_desc']					= "Choose the mail protocol you would like to send emails with.";
$lang['smtp']								= 'SMTP (Requires smtp email account IE: your server, google, yahoo, etc)';
$lang['mail']								= 'MAIL (Easy to use, bad for large list of recipients)';
$lang['sendmail']							= "SENDMAIL (Some servers don't allow the 'mail' protocol.)";
$lang['sendmail_path_label']				= "Sendmail Path";
$lang['sendmail_path_desc']					= "(Required if usung Sendmail) Enter the sendmail path. Usually found in your server control panel.";
$lang['smtp_user_label']					= "SMTP User";
$lang['smtp_user_desc']						= "(Required if usung SMTP) Enter the username for your SMTP account";
$lang['smtp_host_label']					= "SMTP Host";
$lang['smtp_host_desc']						= "(Required if usung SMTP) Enter the SMTP Host for your account.  (IE: google.com, mail.yourdomain.com, etc)";
$lang['smtp_pass_label']					= "SMTP Password";
$lang['smtp_pass_desc']						= "(Required if usung SMTP) Enter the SMTP Password for your username";
$lang['smtp_port_label']					= "SMTP Port";
$lang['smtp_port_desc']						= "(Required if usung SMTP) Enter the SMTP Port number provided by your host.";
$lang['admin_email_label']					= "Admin Email";
$lang['admin_email_desc']					= "The email address in which you would like to receive notices from the website.";
$lang['server_email_label']					= "Server Email";
$lang['server_email_desc']					= "The email address in which you would like the server to set as 'From'. This can be 'noreply@' or your email address so people can reply and get a human.";


$lang['email_activation_label']					= "Email Activation";
$lang['email_activation_desc']					= "Would you like new users to verify their email prior to being allowed to log in and comment? (Recommended ON)";
$lang['manual_activation_label']				= "Manual Activation";
$lang['manual_activation_desc']					= "Would you like to manually verify each user who registers?";
$lang['allow_registrations_label']				= "Allow Registrations";
$lang['allow_registrations_desc']				= "Do you wish to allow users to create an account on your blog?";







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
$lang['link_added_fail_resp']				= "Could not add Link.  Please try again.";
$lang['link_removed_success_resp']			= "Link removed successfully";
$lang['link_removed_fail_resp']				= "Could not remove Link.  Please try again.";
$lang['link_update_success_resp']			= "Link updated successfully";
$lang['link_update_fail_resp']				= "Could not update Link.  Please try again.";



// Categories
$lang['cats_hdr']							= "Categories";
$lang['cat_remove_btn']						= "Remove Category";
$lang['cat_edit_btn']						= "Edit Category";
$lang['index_add_new_cat']					= "Add New Category";
$lang['add_cat_subheading']					= "Please add the category information below.";
$lang['cat_form_name']						= "Category Name";
$lang['cat_form_url']						= "(same as above, all lowercase, no spaces)";
$lang['cat_form_desc']						= "Description";
$lang['blank_window']						= "Open in new window";
$lang['same_window']						= "Open in same window";
$lang['visible']							= "Visible";
$lang['not_visible']						= "Hidden";
$lang['save_cat_btn']						= "Save Category";
$lang['cat_added_success_resp']				= "Category added successfully";
$lang['cat_added_fail_resp']				= "Could not add Category.  Please try again.";
$lang['cat_removed_success_resp']			= "Category removed successfully";
$lang['cat_removed_fail_resp']				= "Could not remove Category.  Please try again.";
$lang['cat_update_success_resp']			= "Category updated successfully";
$lang['cat_update_fail_resp']				= "Could not update Category.  Please try again.";


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
$lang['page_added_fail_resp']				= "Could not add Page.  Please try again.";
$lang['page_removed_success_resp']			= "Page removed successfully";
$lang['page_removed_fail_resp']				= "Could not remove Page.  Please try again.";
$lang['page_update_success_resp']			= "Page updated successfully";
$lang['page_update_fail_resp']				= "Could not update Page.  Please try again.";
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
$lang['page_form_meta_keywords_help_text']	= "Enter the keywords for this page separated by commas.";
$lang['page_form_meta_desc_text']			= "META Description";
$lang['page_form_meta_desc_help_text']		= "Enter the description for this page.  It's best to keep it between 50 and 100 characters.";
$lang['page_form_home_text']				= "Homepage";
$lang['page_form_home_help_text']			= "Check the box if this page is the homepage. You must choose Pages to be the default controller in Settings.  Any other page currently marked as the homepage will be removed as the homepage.";
$lang['page_form_url_title_text']			= "URL Title";
$lang['page_form_url_title_help_text']		= "This is the 'slug' shown in the URL of your page. If you change this value, there must be NO spaces between words, instead, used dashes. <br>IE: new-url-title";
$lang['page_form_redirect_text']			= "Redirection";
$lang['page_form_redirect_help_text']		= "If you change the URL Title above we automatically set up an HTTP 301 (permanent) redirect for you so the old url_title points to the new page url_title. Here, you can override the default settings.";
$lang['page_form_redirect_none']			= "Do Not Redirect Old URL Title";
$lang['page_form_redirect_perm']			= "Permanently Redirect to new URL Title";
$lang['page_form_redirect_temp']			= "Temporarily Redirect to new URL Title";



// posts
$lang['posts_hdr']							= "Posts";
$lang['optional_hdr']						= "Optional";
$lang['optional_help_text']					= "While the options below are optional, they are highly recommended and greatly help with Search Engine Optimization (SEO). We also generate meta tags for facebook and twitter with these values.";
$lang['post_remove_btn']					= "Remove Post";
$lang['post_edit_btn']						= "Edit Post";
$lang['index_add_new_post']					= "Add New Post";
$lang['index_edit_post']					= "Edit Post";
$lang['save_post_btn']						= "Save Post";
$lang['post_added_success_resp']			= "Post added successfully";
$lang['post_added_fail_resp']				= "Could not add post.  Please try again.";
$lang['post_removed_success_resp']			= "Post removed successfully";
$lang['post_removed_fail_resp']				= "Could not remove post.  Please try again.";
$lang['post_update_success_resp']			= "post updated successfully";
$lang['post_update_fail_resp']				= "Could not update post.  Please try again.";
$lang['post_form_title_text']				= "Post Title";
$lang['post_form_title_help_text']			= "Enter the title of your post.";
$lang['post_form_status_text']				= "Status";
$lang['post_form_status_help_text']			= "Choose if you want the post to be Live or Draft.";
$lang['post_form_status_active']			= "Live";
$lang['post_form_status_inactive']			= "Draft";
$lang['post_form_content_text']				= "Post Content";
$lang['post_form_content_help_text']		= "Enter the content of your post below. Use the editor to help you format with Markdown.";
$lang['post_form_excerpt_text']				= "Post Excerpt";
$lang['post_form_excerpt_help_text']		= "Enter a short ~200 character excerpt (teaser) of your post below.";
$lang['post_form_cats_help_text']			= "Choose any categories.  To choose multiple categories press CMD/CTRL + Click your choices.";
$lang['post_form_meta_title_text']			= "META Title";
$lang['post_form_meta_title_help_text']		= "Usually the same as your post title, but you can enter a different one here.";
$lang['post_form_meta_keywords_text']		= "META Keywords";
$lang['post_form_meta_keywords_help_text']	= "Enter the keywords for this post separated by commas.";
$lang['post_form_meta_desc_text']			= "META Description";
$lang['post_form_meta_desc_help_text']		= "Enter the description for this post.  It's best to keep it between 50 and 100 characters.";
$lang['post_form_home_text']				= "Homepage";
$lang['post_form_home_help_text']			= "Check the box if this post is the homepage. You must choose posts to be the default controller in Settings.  Any other posts currently marked as the homepost will be removed as the homepage.";
$lang['post_form_url_title_text']			= "URL Title";
$lang['post_form_url_title_help_text']		= "This is the 'slug' shown in the URL of your post. If you change this value, there must be NO spaces between words, instead, used dashes. <br>IE: new-url-title";
$lang['post_add_form_url_title_help_text']	= "This is the 'slug' shown in the URL of your post. If you enter this, there must be NO spaces between words, instead, used dashes. You can leave this blank and we'll build one for you based on the title of your post. <br>IE: new-url-title";

$lang['post_form_redirect_text']			= "Redirection";
$lang['post_form_redirect_help_text']		= "If you change the URL Title above we automatically set up an HTTP 301 (permanent) redirect for you so the old url_title points to the new post url_title. Here, you can override the default settings.";
$lang['post_form_redirect_none']			= "Do Not Redirect Old URL Title";
$lang['post_form_redirect_perm']			= "Perminently Redirect to new URL Title";
$lang['post_form_redirect_temp']			= "Temporarily Redirect to new URL Title";
$lang['post_form_feature_image_text']		= "Feature Image";
$lang['post_add_form_feature_image_help_text']		= "Upload a feature image or leave blank.";
$lang['post_edit_form_feature_image_help_text']		= "Upload a feature image to replace current or leave blank to keep the same.";
$lang['post_new_post_notification_sbj']		= "New Post";
$lang['post_new_post_notification_msg']		= "Hi!   We just added new content.  Below is the new post. <br><br>";
$lang['post_new_post_notification_msg_foot']		= "<br><br>You're receiving this email because you've requested new content when we post it. ";


// navigation
$lang['nav_hdr']							= "Navigation";
$lang['nav_new_hdr']						= "Create Navigation item";
$lang['nav_right_side_hdr']					= "Navigation Link";
$lang['nav_right_side_desc']				= "Below you can link to a specific page or post. Leave all options blank to point to your homepage.";
$lang['index_add_new_nav']					= "Add Navigation Item";
$lang['tab_all_nav_items']					= "All Navigation Items";
$lang['tab_nav_redirects']					= "Redirects";
$lang['nav_hdr']							= "Navigation";
$lang['index_nav_desc']						= "Drag and Drop items to reorder the links shown on the front navigation of your site.";
$lang['index_redirect_desc']				= "The table below shows any redirects for posts &amp; pages on your site. It also includes the type (page or post) and the type of redirect (301 - Permanent or 302 - Temporary). <b>Editing and Removing Redirects should be performed by experienced users</b>.";
$lang['nav_no_redirects_found']				= "No Redirects Found";
$lang['redir_edit_btn']						= "Edit Redirect";
$lang['redir_remove_btn']					= "Remove Redirect";
$lang['nav_edit_btn']						= "Edit";
$lang['nav_remove_btn']						= "Remove";
$lang['nav_edit_hdr']						= "Edit Navigation Item";
$lang['nav_save_btn']						= "Save Navigation item";
$lang['nav_form_title_text']				= "Title";
$lang['nav_form_title_help_text']			= "This is the text shown in the navigation bar that visitors see and click.";
$lang['nav_form_desc_text']					= "Description";
$lang['nav_form_desc_help_text']			= "This is the description of this link and it used for the title field. Visitors see this when hovering the mouse over the link text.";
$lang['nav_form_url_text']					= "URI";
$lang['nav_form_url_help_text']				= "This is the URI portion of your link. We automatically add your site's URL for you when generating links.";
$lang['nav_form_url_text_example']			= "about   <-- example usage";
$lang['nav_form_redirect_text']				= "Redirection";
$lang['nav_form_redirect_help_text']		= "If you changed the 'Choose A Page' or 'Choose A Post' field we automatically set up an HTTP 301 (perminent) redirect for you so the old URI points to the new page URI. Here, you can override the default settings.";
$lang['nav_form_redirect_text']				= "Redirection";
$lang['nav_form_type_text']					= "Type";
$lang['nav_form_type_help_text']			= "If you changed the 'Choose A Page' or 'Choose A Post', please choose if this navigation item points to a page or a post. We need this to correctly point the redirection.";
$lang['nav_form_type_page']					= "This is a Page";
$lang['nav_form_type_post']					= "This is a Blog Post";
$lang['nav_update_success_resp']			= "Updated Navigation Item Successfully";
$lang['nav_update_fail_resp']				= "Unable to update navigation item. Please try again.";
$lang['nav_form_choose_page']				= "Choose A Page";
$lang['nav_form_choose_page_help_text']		= "Choose from existing pages.";
$lang['nav_form_choose_post']				= "Choose A Blog Post";
$lang['nav_form_choose_post_help_text']		= "Choose from existing blog posts.";
$lang['pages_index_controller_label']		= "Page Marked As Homepage";

// redirection
$lang['nav_redir_edit_hdr']					= "Editing Redirection";
$lang['nav_redir_edit_subheading']			= "<b><em>Important</em></b>:  Only experienced users should edit or remove redirection items.  Changing these can have a negative impact on SEO and the number of 404 errors reported to visitors.  Use this function with great care.";

$lang['nav_redirect_removed_success_resp']	= "Removed Redirection Successfully";
$lang['nav_redirect_removed_fail_resp']		= "Unable to remove Redirection item. Please try again.";
$lang['nav_redirect_edit_success_resp']		= "Updated Redirection Successfully";
$lang['nav_redirect_edit_fail_resp']		= "Unable to update Redirection item. Please try again.";
$lang['nav_redir_form_old_slug_text']		= "From";
$lang['nav_redir_form_old_slug_desc']		= "The From field is the old URI segment, the one that will be initially called.";
$lang['nav_redir_form_new_slug_text']		= "To";
$lang['nav_redir_form_new_slug_desc']		= "The To field is the new URI segment, the one the visitor will be redirected to.";
$lang['nav_redir_form_type_text']			= "Type";
$lang['nav_redir_form_type_desc']			= "Whether this is a Page or a Post";
$lang['nav_redir_form_code_text']			= "HTTP Redirect Type";
$lang['nav_redir_form_code_desc']			= "Should this redirect be Permanent (301) or Temporary (302)?";

// Comments
$lang['comments_hdr']						= "Manage Comments";
$lang['comments_no_comments_found_mod']		= "No Comments Found for moderation";
$lang['comments_no_comments_found_act']		= "No Published Comments";
$lang['comments_tab_moderated']				= "Moderated";
$lang['comments_tab_active']				= "Published";
$lang['comments_btn_edit']					= "Edit";
$lang['comments_btn_remove']				= "Delete";
$lang['comments_btn_view']					= "Details";
$lang['comments_btn_accept']				= "Accept";
$lang['comments_btn_hide']					= "Hide";
$lang['comments_tbl_hdr_post_title']		= "Post Title";
$lang['comments_tbl_hdr_author']			= "Author";
$lang['comments_tbl_hdr_date']				= "Date";
$lang['comments_tbl_hdr_short_excerpt']		= "Short Excerpt";
$lang['comments_reg_user']					= "Registered User";
$lang['comment_removed_success_resp']		= "Comment Successfully Deleted";
$lang['comment_removed_fail_resp']			= "Unable to delete comment. Please try again.";
$lang['comment_accept_success_resp']		= "Comment Successfully Accepted";
$lang['comment_accept_fail_resp']			= "Unable to accept comment. Please try again.";
$lang['comment_hide_success_resp']			= "Comment Successfully Hidden";
$lang['comment_hide_fail_resp']				= "Unable to hide comment. Please try again.";
$lang['comment_update_success_resp']		= "Comment Successfully Updated";
$lang['comment_update_fail_resp']			= "Unable to update the comment. Please try again.";
$lang['comment_form_field_content']			= "Content";
$lang['comment_form_field_content_hlp_txt']	= "You can edit the content of the user's comment below.";
$lang['comment_edit_hdr']					= "Edit Comment";
$lang['comment_edit_subheading']			= "";
$lang['comment_details_hdr']				= "Details";
$lang['comments_save_btn']					= "Save Comment";
$lang['comments_blog_post_hdr']				= "Blog Post";
$lang['comments_comment_id']				= "Comment ID";
$lang['comments_author']					= "Author";
$lang['comments_date_posted']				= "Date Received";
$lang['comments_current_status']			= "Current Status";

// updates
$lang['updates_hdr']						= "Updates";
$lang['updates_subheader']					= "You can update Open Blog and the CodeIgniter framework upon which it is built. Below is the current status of your installation.";
$lang['updates_failed_connection']			= "Failed to connect to the open-blog.org API.";
$lang['updates_update_available']			= "There is an update available! <br><b><em>IMPORTANT NOTICE: Make a FULL site Backup before your begin the update!</em></b>";
$lang['updates_update_not_available']		= "You installation of Open Blog is up to date.";
$lang['updates_ob_install_text']			= "Your Open Blog Installation";
$lang['updates_ob_current_stable_text']		= "Current Stable Release";
$lang['updates_install_up_to_date_text']	= "Your Open Blog installation is up to date.  You don't need to do anything.";
$lang['updates_update_now_btn']				= "Update Now";
$lang['updates_update_success_resp']		= "Update Succeeded. Make sure to check your settings";
$lang['updates_update_failed_resp']			= "Unable to update Open Blog.  Please try again or find help on the Open Blog website.";
$lang['updates_download_btn']				= "Download The Update";




// themes
$lang['themes_hdr']							= "Themes";
$lang['themes_subheader']					= 'Below is a list of currently installed themes.  To find more themes and installation instructions, visit us at the <a href="http://open-blog.org" target="_blank">Open Blog website</a>.';
$lang['themes_theme_in_use']				= "This theme is Active";
$lang['themes_theme_not_in_use']			= "This theme is NOT Active.";
$lang['theme_author_title']					= "Author";
$lang['theme_author_email']					= "Support Email";
$lang['theme_version']						= "Version";
$lang['themes_activate_theme']				= "Activate Theme";
$lang['themes_theme_type_desc']				= "Theme Type";
$lang['themes_type_admin']					= "Admin";
$lang['themes_type_front']					= "Regular";
$lang['themes_activated_success_resp']		= "Theme Successfully Activated";
$lang['themes_activated_fail_resp']			= "Couldn't Activate Theme. Please try again.";



// social
$lang['social_hdr']							= "Social";
$lang['social_hdr_help_txt']				= "Add, Edit, or Remove Links to your social media accounts.";
$lang['social_add_new']						= "Add";
$lang['social_edit_btn']					= "Edit";
$lang['social_remove_btn']					= "Remove";
$lang['social_removed_success_resp']		= "Social Link Successfully Removed";
$lang['social_removed_fail_resp']			= "Could not remove Social Link. Please try again.";
$lang['index_add_new_social']				= "Add Social Link";
$lang['social_form_name']					= "Name";
$lang['social_form_url']					= "URL";
$lang['social_form_active']					= "Active";
$lang['add_social_subheading']				= "Add a new social link. Just enter the Name of the social media service, the full URL (include http://) and if you want it to be active.  Active links are shown on the public pages of your site.";
$lang['save_social_btn']					= "Save Social Link";
$lang['social_update_success_resp']			= "Social Link Successfully Updated";
$lang['social_update_fail_resp']			= "Could not update Social Link. Please try again.";
$lang['social_added_success_resp']			= "Social Link Successfully Added";
$lang['social_added_fail_resp']				= "Could not add Social Link. Please try again.";


// languages
$lang['languages_hdr']						= "Languages";
$lang['languages_hdr_help_txt']				= "Enable, Disable, and set a language as default. Enabled languages are offered to site visitors.";
$lang['languages_disable_btn']				= "Disable";
$lang['languages_enable_btn']				= "Enable";
$lang['languages_make_default_btn']			= "Make Default";
$lang['languages_disable_success_resp']		= "Language Successfully Disabled";
$lang['languages_disable_fail_resp']		= "Could not disable language. Please try again.";
$lang['languages_enable_success_resp']		= "Language Successfully Enabled";
$lang['languages_enable_fail_resp']			= "Could not enable language. Please try again.";
$lang['languages_default_success_resp']		= "Successfully changed default language";
$lang['languages_default_fail_resp']		= "Could not change default language. Please try again.";
$lang['languages_help_text']				= 'Notes: The "Is Default" is set automatically when a visitor views your website. They can change the language to any "Enabled" language they prefer. This will <b>not</b> change any text you enter in your blog.';
$lang['languages_table_lang_h']				= "Language";
$lang['languages_table_abbr_h']				= "Abbreviation";
$lang['languages_table_is_default_h']		= "Is Default";
$lang['languages_table_enabled_h']			= "Enabled";


$lang['save_settings']						= "Save Settings";

// form action responses
$lang['settings_update_success']			= "Settings Updated Successfully";
$lang['settings_update_failed']				= "Settings Failed to Update.  Please try again.";


// permissions
$lang['permission_check_failed']			= "You must be an logged in and have permission to view this page.";

// installer directory warning
$lang['installer_dir_warning_notice']		= "The /installer/ directory is still present.  For better security you should delete the installer/ directory and it's contents immediately!";


