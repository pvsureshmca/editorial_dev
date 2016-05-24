<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* CodeIgniter Account Controller
 *
* The class described User Details add update.
*
* @package        CodeIgniter
* @author         suresh
* @company	    Technologies
* @link	   http://www.Technologies.com
* @version 	   1.0
*/
error_reporting(E_ALL); ini_set('display_errors', 1); 
class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	    $this->login_model->check_login();
	}

	public function index()
	{
		$data['site_title'] = DASHBOARD_PAGE;
		
		$this->load->view('header',$data);
		$this->load->view('dashboard');
		$this->load->view('footer');
	}

	public function logout()
	{
		
		$this->session->sess_destroy();
		$this->load->helper('url');
		redirect('login/','refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
