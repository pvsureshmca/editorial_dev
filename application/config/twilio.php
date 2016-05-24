<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**

	* Name:  Twilio

	*

	* Author: Ben Edmunds

	*		  ben.edmunds@gmail.com

	*         @benedmunds

	*

	* Location:

	*

	* Created:  03.29.2011

	*

	* Description:  Twilio configuration settings.

	*

	*

	*/



	/**

	 * Mode ("sandbox" or "prod")

	 **/

	$config['mode']   = 'prod';



	/**

	 * Account SID

	 **/
	  ### Sandbox ####	
      $config['account_sid']   = 'ACd04b38edc8a9f384a96dc0502373dee4';
      

      //$config['account_sid']   = 'ACd04b38edc8a9f384a96dc0502373dee4';


	/**

	 * Auth Token

	 **/
      ### Sandbox ####
      $config['auth_token']    = 'd23b8711d5297f60920dd80e854131bc';
      

     //$config['auth_token']    = 'd23b8711d5297f60920dd80e854131bc';


	/**

	 * API Version

	 **/

	$config['api_version']   = '2010-04-01';



	/**

	 * Twilio Phone Number

	 **/
      
      
      //$config['number']        = '+12245850180';
      
      $config['number']        = '+17472217379';




/* End of file twilio.php */
