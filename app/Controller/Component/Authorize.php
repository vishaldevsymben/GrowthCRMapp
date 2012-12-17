<?php

/**
 * Authorize.net Class
 *
 * Integrate the Authorize.net payment gateway in your site using this
 * easy to use library. Just see the example code to know how you should
 * proceed. Also, remember to read the readme file for this class.
 *
 * @package     Payment Gateway
 * @category	Library
 * @author      Md Emran Hasan <phpfour@gmail.com>
 * @link        http://www.phpfour.com
 */
App::import('Component', 'Session');



$vendorPath = Configure::corePaths('vendor');

$idx = strpos(strtolower($vendorPath['vendors'][0]), 'vendors');

$PEARPath = substr($vendorPath['vendors'][0], 0, $idx) . '/app/vendors/PEAR';

define('PEAR_PATH', $PEARPath);

set_include_path(PEAR_PATH . PATH_SEPARATOR . get_include_path());



class AuthorizeComponent extends Object 
{
    /**
     * Login ID of authorize.net account
     *
     * @var string
     */
    public $login;

    /**
     * Secret key from authorize.net account
     *
     * @var string
     */
     public $secret;
	 public $ipnData = array();
	 public $fields = array();

    /**
	 * Initialize the Authorize.net gateway
	 *
	 * @param none
	 * @return void
	 
	 */
 public function __construct()
	 {
	 }
	public function initializedata()
	{
       

        // Some default values of the class
		$this->gatewayUrl = 'https://secure.authorize.net/gateway/transact.dll';
		$this->ipnLogFile = 'authorize.ipn_results.log';

		// Populate $fields array with a few default
		$this->addField('x_Version',        '3.0');
        $this->addField('x_Show_Form',      'PAYMENT_FORM');
		$this->addField('x_Relay_Response', 'TRUE');
	}
	
	    public function addField($field, $value)
    {
        $this->fields["$field"] = $value;
    }

    /**
     * Enables the test mode
     *
     * @param none
     * @return none
     */
    public function enableTestMode()
    {
        $this->testMode = TRUE;
        $this->addField('x_Test_Request', 'TRUE');
        $this->gatewayUrl = 'https://test.authorize.net/gateway/transact.dll';
    }

    /**
     * Set login and secret key
     *
     * @param string user login
     * @param string secret key
     * @return void
     */
    public function setUserInfo($login, $key)
    {
        $this->login  = $login;
        $this->secret = $key;
		
		
    }

    /**
     * Prepare a few payment information
     *
     * @param none
     * @return void
     */
    public function prepareSubmit()
    {
        $this->addField('x_Login', $this->login);
        $this->addField('x_fp_sequence', $this->fields['x_Invoice_num']);
        $this->addField('x_fp_timestamp', time());

        $data = $this->fields['x_Login'] . '^' .
                $this->fields['x_Invoice_num'] . '^' .
                $this->fields['x_fp_timestamp'] . '^' .
                $this->fields['x_Amount'] . '^';

        $this->addField('x_fp_hash', $this->hmac($this->secret, $data));
    }

    /**
	 * Validate the IPN notification
	 *
	 * @param none
	 * @return boolean
	 */
	public function validateIpn()
	{
	    foreach ($_POST as $field=>$value)
		{
			$this->ipnData["$field"] = $value;
		}

        $invoice    = intval($this->ipnData['x_invoice_num']);
        $pnref      = $this->ipnData['x_trans_id'];
        $amount     = doubleval($this->ipnData['x_amount']);
        $result     = intval($this->ipnData['x_response_code']);
        $respmsg    = $this->ipnData['x_response_reason_text'];

        $md5source  = $this->secret . $this->login . $this->ipnData['x_trans_id'] . $this->ipnData['x_amount'];
        $md5        = md5($md5source);

		if ($result == '1')
		{
		 	// Valid IPN transaction.
		 	$this->logResults(true);
		 	return true;
		}
		else if ($result != '1')
		{
		 	$this->lastError = $respmsg;
			$this->logResults(false);
			return false;
		}
        else if (strtoupper($md5) != $this->ipnData['x_MD5_Hash'])
        {
            $this->lastError = 'MD5 mismatch';
            $this->logResults(false);
            return false;
        }
	}

    /**
     * RFC 2104 HMAC implementation for php.
     *
     * @author Lance Rushing
     * @param string key
     * @param string date
     * @return string encoded hash
     */
    private function hmac ($key, $data)
    {
       $b = 64; // byte length for md5

       if (strlen($key) > $b) {
           $key = pack("H*",md5($key));
       }

       $key  = str_pad($key, $b, chr(0x00));
       $ipad = str_pad('', $b, chr(0x36));
       $opad = str_pad('', $b, chr(0x5c));
       $k_ipad = $key ^ $ipad ;
       $k_opad = $key ^ $opad;

       return md5($k_opad  . pack("H*", md5($k_ipad . $data)));
    }
	
    public function submitPayment()
    {

        $this->prepareSubmit();

        echo "<html>\n";
        echo "<head><title>Processing Payment...</title></head>\n";
        echo "<body onLoad=\"document.forms['gateway_form'].submit();\">\n";
        echo "<p style=\"text-align:center;\"><h2>Please wait, your order is being processed</h2></p>";
        //echo "  and you will be redirected to the payment website.\n";
        echo "<form method=\"POST\" name=\"gateway_form\" ";
        echo "action=\"" . $this->gatewayUrl . "\">\n";

        foreach ($this->fields as $name => $value)
        {
             echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";
        }


    /*    echo "<p style=\"text-align:center;\"><br/><br/>If you are not automatically redirected to ";
        echo "payment website within 5 seconds...<br/><br/>\n";
        echo "<input type=\"submit\" value=\"Click Here\"></p>\n";*/

        echo "</form>\n";
        echo "</body></html>\n";
    }
}
