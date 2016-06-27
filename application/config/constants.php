<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/

define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');




/* Image Path */
define('PROJECT_PATH', '/var/www/html/editorial_dev/');

define('PRODUCT_IMAGE_PATH', 'uploads/articles/photos/');

define('PRODUCT_THUMB_IMAGE_PATH', 'uploads/articles/photos/thumbs/');

define('FILE_PATH', 'uploads/articles/text_files/');

define('XML_FILE_PATH', 'uploads/articles/xml_files/');

define('SITE_TITLE','Editorial');
/*Breadcumbs*/
define('DASHBOARD_PAGE','Dashboard');

define('STAFF_PAGE','User');

define('STAFF_M_PAGE','User');
define('STAFF_M_LIST','User List');
define('STAFF_M_ADD','Add User');
define('STAFF_M_EDIT','Edit User');


define('CAT_PAGE','Category');
define('CAT_LIST','Category List');
define('CAT_ADD','Add Category');
define('CAT_EDIT','Edit Category');

define('TAGS_PAGE','Tag');
define('TAGS_LIST','Tag List');
define('TAGS_ADD','Add Tag');
define('TAGS_EDIT','Edit Tag');

define('SUBCAT_PAGE','Sub Category');
define('SUBCAT_LIST','Sub Category List');
define('SUBCAT_ADD','Add Sub Category');
define('SUBCAT_EDIT','Edit Sub Category');

define('SUBTWOCAT_PAGE','Sub Level Two Category');
define('SUBTWOCAT_LIST','Sub Level Two Category List');
define('SUBTWOCAT_ADD','Add Sub Level Two Category');
define('SUBTWOCAT_EDIT','Edit Sub Level Two Category');


//newspapers

define('NEWS_PAGE','Newspaper');
define('NEWS_LIST','Newspaper List');
define('NEWS_ADD','Add Newspaper');
define('NEWS_EDIT','Edit Newspaper');


define('ARTICLE_PAGE','Article');
define('ARTICLE_LIST','Article List');
define('ARTICLE_ADD','Add Article');
define('ARTICLE_EDIT','Edit Article');

define('ARTICLE_VIEW','View Article');

define('BOOKMARK_PAGE','Bookmark');
define('BOOKMARK_LIST','Bookmark List');
define('BOOKMARK_ADD','Add Bookmark');
define('BOOKMARK_EDIT','Edit Bookmark');

define('ARTCMD_PAGE','Article Comment');
define('ARTCMD_LIST','Article Comment List');
define('ARTCMD_ADD','Add Article Comment');
define('ARTCMD_EDIT','Edit Article Comment');

define('CREATED_SUS','details has been created successfully!.');
define('UPDATED_SUS','details has been updated successfully!.');
define('DELETED_SUS','details has been deleted successfully!.');

define('INVALID_LOGIN','Invalid credentials. Please try again');
define('INVALID','Invalid');
define('NO_RESULT','No result founds');
define('DEACTIVATED_LOGIN','Your account has been deactivated.');

define('IMAGE_REQUIRED','The Images field is required.');
define('USER_EMAIL_ALREADY_EXIST','User email already exist!.');
define('INVALID_EMAIL','The Email field must contain a valid email address.');
define('IMAGE_SIZE_SHOULD', 'Image size should be 200 to 300');


define('SMTP_HOST',		'smtp.gmail.com');
define('SMTP_USER',		'pvsureshmca@gmail.com');
define('SMTP_PASS',		'123456');
define('EMAIL_SUC',		'Mail has been sent successfully');
define('EMAIL_ERR',		'Error occured while sending the mail');






/* End of file constants.php */
/* Location: ./application/config/constants.php */
