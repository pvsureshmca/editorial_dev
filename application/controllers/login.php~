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

ini_set('display_errors',1);
include APPPATH.'/controllers/common.php';
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');

		if($this->session->userdata('logged_in') == true && $this->login_model->check_login()== true)
		{
			redirect('dashboard/', 'refresh');
		}
		$this->form_validation->set_error_delimiters('', '');
	}

	public function index()
	{
		$data['ErrorMessages'] = '';
		$data['ErrorMessagesFP'] = '';

		if (($this->input->server('REQUEST_METHOD') == 'POST')) {
			
			$this->load->library('form_validation');
			if($_POST["action"] == "Signin"){
				$data=$this->Login();
			}else {
				$data=$this->forgot_password();
			}
				
			
			
		}
		$this->load->view('login', $data);
	}
	
	public function Login()
	{
		
			
			$this->form_validation->set_rules('user_name', 'user name', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
	
			if ($this->form_validation->run() === FALSE)
			{
				$data['ErrorMessages'] = validation_errors();
			}
			else
			{
				$this->load->model('login_model');
	
				$valid_user = $this->login_model->login_verify(trim($this->input->post('user_name')), trim($this->input->post('password')));


	
				if($valid_user == "TRUE")
				{
					redirect('dashboard/','refresh');
				}
				else if($valid_user=="DEACTIVATE")
				{
					$data['ErrorMessages'] = DEACTIVATED_LOGIN;
				}
				else {
					$data['ErrorMessages'] = INVALID_LOGIN;
				}
			}
			
			$data['ErrorMessagesFP'] = '';
			return $data;
		
	}
	
	public function forgot_password()
	{
		
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	
			if ($this->form_validation->run() === FALSE)
			{
				$data['ErrorMessagesFP'] = validation_errors();
			}
			else
			{
				$valid_user = $this->login_model->forgot_password(trim($this->input->post('email')));
	
				if($valid_user == "DEACTIVATE")
				{
					$data['ErrorMessagesFP'] = DEACTIVATED_LOGIN;
				}
				elseif(is_array($valid_user) && sizeof($valid_user))
				{
					$email_data["datas"]=$valid_user;
					$this->load->library('email');
					 $message = $this->load->view('email_temp_forgotpass', $email_data, true);
					
					
					$type = array (
							'mailtype' => 'html',
							'charset'  => 'utf-8',
							'priority' => '1'
					);
					$this->email->initialize($type);
					$this->email->from('noreply@editorial.com', 'Trader');
					$this->email->to($valid_user[0]['email']);
					$this->email->subject('Forgot Password');
					$this->email->message($message);
					$this->email->send();
	
					$this->session->set_flashdata ( 'forgotpasssuccess', 'Your password has been send to your email.' );
					
					redirect('login', 'refresh');
				}
				else {
					$data['ErrorMessagesFP'] = "No such account exist";
				}
			}
			$data['ErrorMessages'] = '';
			
	
		return $data;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
