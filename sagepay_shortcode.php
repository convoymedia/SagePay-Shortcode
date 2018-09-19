<?php
/**
 * Plugin Name:       Sagepay Plugin
 * Plugin URI:        http://convoymedia.com
 * Description:       Simple sagepay plugin
 * Version:           1.0.1
 * Author:            Convoy Media
 * Author URI:        http://convoymedia.com/
 */

class SagePay {

	protected $vendorTxCode;
	protected $amount;
	protected $currency;
	protected $description;
	protected $successURL;
	protected $failureURL;
	protected $customerName;
	protected $customerEMail;
	protected $vendorEMail;
	protected $sendEMail;
	protected $eMailMessage;
	protected $billingSurname;
	protected $billingFirstnames;
	protected $billingAddress1;
	protected $billingAddress2;
	protected $billingPostCode;
	protected $billingCountry;
	protected $billingCity;
	protected $billingState;
	protected $billingPhone;
	protected $deliverySurname;
	protected $deliveryFirstnames;
	protected $deliveryAddress1;
	protected $deliveryAddress2;
	protected $deliveryCity;
	protected $deliveryPostCode;
	protected $deliveryCountry;
	protected $deliveryState;
	protected $deliveryPhone;
	protected $basket;
	protected $allowGiftAid;
	protected $applyAVSCV2;
	protected $apply3DSecure;
	protected $billingAgreement;
	protected $basketXML;
	protected $customerXML;
	protected $surchargeXML;
	protected $vendorData;
	protected $referrerID;
	protected $language;
	protected $website;
	protected $encryptPassword;

	public function __construct() {
		$this->setVendorTxCode($this->createVendorTxCode());
	}

	public function getCrypt() {
			$cryptString = 'VendorTxCode='.$this->getVendorTxCode();
			$cryptString.= '&ReferrerID='.$this->getReferrerID();
			$cryptString.= '&Amount='.$this->getAmount();
			$cryptString.= '&Currency='.$this->getCurrency();
			$cryptString.= '&Description='.$this->getDescription();
			$cryptString.= '&SuccessURL='.$this->getSuccessURL();
			$cryptString.= '&FailureURL='.$this->getFailureURL();
			$cryptString.= '&CustomerName='.$this->getCustomerName();
			$cryptString.= '&CustomerEMail='.$this->getCustomerEMail();
			$cryptString.= '&VendorEMail='.$this->getVendorEMail();
			$cryptString.= '&SendEMail='.$this->getSendEMail();
			$cryptString.= '&eMailMessage='.$this->getEMailMessage();
			$cryptString.= '&BillingSurname='.$this->getBillingSurname();
			$cryptString.= '&BillingFirstnames='.$this->getBillingFirstnames();
			$cryptString.= '&BillingAddress1='.$this->getBillingAddress1();
			$cryptString.= '&BillingAddress2='.$this->getBillingAddress2();
			$cryptString.= '&BillingCity='.$this->getBillingCity();
			$cryptString.= '&BillingPostCode='.$this->getBillingPostCode();
			$cryptString.= '&BillingCountry='.$this->getBillingCountry();
			$cryptString.= '&BillingState='.$this->getBillingState();
			$cryptString.= '&BillingPhone='.$this->getBillingPhone();
			$cryptString.= '&DeliverySurname='.$this->getDeliverySurname();
			$cryptString.= '&DeliveryFirstnames='.$this->getDeliveryFirstnames();
			$cryptString.= '&DeliveryAddress1='.$this->getDeliveryAddress1();
			$cryptString.= '&DeliveryAddress2='.$this->getDeliveryAddress2();
			$cryptString.= '&DeliveryCity='.$this->getDeliveryCity();
			$cryptString.= '&DeliveryPostCode='.$this->getDeliveryPostCode();
			$cryptString.= '&DeliveryCountry='.$this->getDeliveryCountry();
			$cryptString.= '&DeliveryState='.$this->getDeliveryState();
			$cryptString.= '&DeliveryPhone='.$this->getDeliveryPhone();
			$cryptString.= '&Basket='.$this->getBasket();
			$cryptString.= '&AllowGiftAid='.$this->getAllowGiftAid();
			$cryptString.= '&ApplyAVSCV2='.$this->getApplyAVSCV2();
			$cryptString.= '&Apply3DSecure='.$this->getApply3DSecure();
			$cryptString.= '&BillingAgreement='.$this->getBillingAgreement();
			$cryptString.= '&BasketXML='.$this->getBasketXML();
			$cryptString.= '&CustomerXML='.$this->getCustomerXML();
			$cryptString.= '&SurchargeXML='.$this->getSurchargeXML();
			$cryptString.= '&VendorData='.$this->getVendorData();
			$cryptString.= '&ReferrerID='.$this->getReferrerID();
			$cryptString.= '&Language='.$this->getLanguage();
			$cryptString.= '&Website='.$this->getWebsite();


			return $this->encryptAndEncode($cryptString);

	}



	protected function createVendorTxCode() {
	 $timestamp = date("y-m-d-H-i-s", time());
	 $random_number = rand(0,32000)*rand(0,32000);
	 return "{$timestamp}-{$random_number}";
	}

	public function setVendorTxCode($code) {
        $this->vendorTxCode = $code;

        return $this;
	}
	public function getVendorTxCode() {
		return $this->vendorTxCode;
	}

	public function setAmount($amount) {
		$this->amount = number_format($amount, 2);
    
        return $this;    
    }

	public function getAmount() {
		return $this->amount;
	}

	public function getCurrency() {
		return $this->currency;
	}

	public function setCurrency($currency) {
		$this->currency = strtoupper($currency);
    
        return $this;
    }

	public function getSuccessURL() {
		return $this->successURL;
	}
	public function setSuccessURL($url) {
		$this->successURL = $url;
    
        return $this;
    }
	public function getFailureURL() {
		return $this->failureURL;
	}
	public function setFailureURL($url) {
		$this->failureURL = $url;
    
        return $this;
    }

	public function getDescription() {
		return $this->description;
	}
	public function setDescription($description) {
		$this->description = mb_substr($description, 0, 100);
        return $this;
    }

	public function getCustomerName() {
		return $this->customerName;
	}
	public function setCustomerName($name) {
		$this->customerName = $name;
    
        return $this;
    }

	public function getCustomerEMail() {
		return $this->customerEMail;
	}
	public function setCustomerEMail($email) {
		$this->customerEMail = $email;
    
        return $this;
    }

	public function getVendorEMail() {
		return $this->vendorEMail;
	}
	public function setVendorEMail($email) {
		$this->vendorEMail = $email;
    
        return $this;
    }

	public function getSendEMail() {
		return $this->sendEMail;
	}
	public function setSendEMail($sendEmail = 1) {
		$this->sendEMail = $sendEmail;
    
        return $this;
    }

	public function getEMailMessage() {
		return $this->eMailMessage;
	}
	public function setEMailMessage($emailMessage) {
		$this->eMailMessage = $emailMessage;

        return $this;
    }

	public function setBillingFirstnames($billingFirstnames) {
		$this->billingFirstnames = $billingFirstnames;

        return $this;
    }

	public function getBillingFirstnames() {
		return $this->billingFirstnames;
	}

	public function setBillingSurname($billingSurname) {
		$this->billingSurname = $billingSurname;
    
        return $this;
    }

	public function getBillingSurname() {
		return $this->billingSurname;
	}

	public function setBillingAddress1($billingAddress1) {
		$this->billingAddress1 = $billingAddress1;
    
        return $this;
    }

	public function getBillingAddress1() {
		return $this->billingAddress1;
	}

	public function setBillingAddress2($billingAddress2) {
		$this->billingAddress2 = $billingAddress2;
    
        return $this;
    }

	public function getBillingAddress2() {
		return $this->billingAddress2;
	}

	public function setBillingCity($billingCity) {
		$this->billingCity = $billingCity;
    
        return $this;
    }

	public function getBillingCity() {
		return $this->billingCity;
	}

	public function setBillingPostCode($billingPostCode) {
		$this->billingPostCode = $billingPostCode;
        
        return $this;
    }

	public function getBillingPostCode() {
		return $this->billingPostCode;
	}

	public function setBillingState($billingState) {
		$this->billingState = $billingState;
    
        return $this;
    }

	public function getBillingState() {
		return $this->billingState;
	}

	public function getBillingCountry() {
		return $this->billingCountry;
	}
	public function setBillingCountry($countryISO3166) {
		$this->billingCountry = strtoupper($countryISO3166);

        return $this;
    }

	public function setBillingPhone($phone) {
		$this->billingPhone = $phone;
    
        return $this;
    }

	public function getBillingPhone() {
		return $this->billingPhone;
	}

	public function setDeliverySurname($surname) {
		$this->deliverySurname = $surname;

        return $this;
    }

	public function getDeliverySurname() {
		return $this->deliverySurname;
	}


	public function setDeliveryFirstnames($firstnames) {
		$this->deliveryFirstnames = $firstnames;
    
        return $this;
    }

	public function getDeliveryFirstnames() {
		return $this->deliveryFirstnames;
	}

	public function setDeliveryAddress1($address) {
		$this->deliveryAddress1 = $address;
    
        return $this;
    }

	public function getDeliveryAddress1() {
		return $this->deliveryAddress1;
	}

	public function setDeliveryAddress2($address) {
		$this->deliveryAddress2 = $address;
    
        return $this;
    }

	public function getDeliveryAddress2() {
		return $this->deliveryAddress2;
	}

	public function setDeliveryCity($city) {
		$this->deliveryCity = $city;
    
        return $this;
    }

	public function getDeliveryCity() {
		return $this->deliveryCity;
	}

	public function setDeliveryPostCode($zip) {
		$this->deliveryPostCode = $zip;
    
        return $this;
    }

	public function getDeliveryPostCode() {
		return $this->deliveryPostCode;
	}

	public function setDeliveryCountry($country) {
		$this->deliveryCountry = strtoupper($country);
    
        return $this;
    }

	public function getDeliveryCountry() {
		return $this->deliveryCountry;
	}


	public function setDeliveryState($state) {
		$this->deliveryState = $state;
    
        return $this;
    }

	public function getDeliveryState() {
		return $this->deliveryState;
	}

	public function setDeliveryPhone($phone) {
		$this->deliveryPhone = $phone;
    
        return $this;
    }

	public function getDeliveryPhone() {
		return $this->deliveryPhone;
	}

	public function setBasket($basket) {
		$this->basket = $basket;
    
        return $this;
    }

	public function getBasket() {
		return $this->basket;
	}

	public function setAllowGiftAid($allowGiftAid = 0) {
        $this->allowGiftAid = $allowGiftAid;

        return $this;
	}

	public function getAllowGiftAid() {
		return $this->allowGiftAid;
	}

	public function setApplyAVSCV2($avsCV2 = 0) {
		$this->applyAVSCV2 = $avsCV2;
    
        return $this;
    }

	public function getApplyAVSCV2() {
		return $this->applyAVSCV2;
	}

	public function setApply3DSecure($apply3DSecure = 0) {
		$this->apply3DSecure = $apply3DSecure;
    
        return $this;
    }

	public function getApply3DSecure() {
		return $this->apply3DSecure;
	}


	public function setBillingAgreement ($billingAgreement = 0) {
		$this->billingAgreement = $billingAgreement;
    
        return $this;
    }

	public function getBillingAgreement() {
		return $this->billingAgreement;
	}


	public function setBasketXML ($basketXML) {
		$this->basketXML = $basketXML;

        return $this;
    }

	public function getBasketXML() {
		return $this->basketXML;
	}

	public function setCustomerXML ($customerXML) {
		$this->customerXML = $customerXML;
    
        return $this;
    }

	public function getCustomerXML() {
		return $this->customerXML;
	}

	public function setSurchargeXML ($surchargeXML) {
		$this->surchargeXML = $surchargeXML;
    
        return $this;
    }

	public function getSurchargeXML() {
		return $this->surchargeXML;
	}

	public function setVendorData ($vendorData) {
		$this->vendorData = $vendorData;
    
        return $this;
    }

	public function getVendorData() {
		return $this->vendorData;
	}

	public function setReferrerID ($referrerID) {
		$this->referrerID = $referrerID;
    
        return $this;
    }

	public function getReferrerID() {
		return $this->referrerID;
	}


	public function setLanguage ($language) {
		$this->language = $language;
    
        return $this;
    }

	public function getLanguage() {
		return $this->language;
	}


	public function setWebsite ($website) {
		$this->website = $website;
    
        return $this;
    }

	public function getWebsite() {
		return $this->website;
	}
    
    public function setPassword($password) {
        $this->encryptPassword = $password;
        
        return $this;
    }


	public function setDeliverySameAsBilling() {
		$this->setDeliverySurname($this->getBillingSurname());
		$this->setDeliveryFirstnames($this->getBillingFirstnames());
		$this->setDeliveryAddress1($this->getBillingAddress1());
		$this->setDeliveryAddress2($this->getBillingAddress2());
		$this->setDeliveryCity($this->getBillingCity());
		$this->setDeliveryPostCode($this->getBillingPostCode());
		$this->setDeliveryCountry($this->getBillingCountry());
		$this->setDeliveryState($this->getBillingState());
		$this->setDeliveryPhone($this->getBillingPhone());

		return $this;
	}


	public function decode($strIn) {
		$decodedString =  $this->decodeAndDecrypt($strIn);
		parse_str($decodedString, $sagePayResponse);
		return $sagePayResponse;
	}

	protected function encryptAndEncode($strIn) {
		$strIn = $this->pkcs5_pad($strIn, 16);
        return "@" . bin2hex(openssl_encrypt($strIn, 'AES-128-CBC', $this->encryptPassword, OPENSSL_RAW_DATA, $this->encryptPassword));
	}

    protected function decodeAndDecrypt($strIn) {
        $strIn = substr($strIn, 1);
        $strIn = pack('H*', $strIn);
        return openssl_decrypt($strIn, 'AES-128-CBC', $this->encryptPassword, OPENSSL_RAW_DATA, $this->encryptPassword);
    }


	protected function pkcs5_pad($text, $blocksize)	{
		$pad = $blocksize - (strlen($text) % $blocksize);
		return $text . str_repeat(chr($pad), $pad);
	}
}

add_action( 'admin_menu', 'sagepay_menu' );
function sagepay_menu() {
	add_menu_page( 'SagePay', 'SagePay', 'manage_options', 'sagepay-admin-page', 'sagepay_admin_page', 'dashicons-cart', 6  );
}

function sagepay_admin_page(){
    if (isset($_POST['test_or_live'])) {
        update_option('test_or_live', $_POST['test_or_live']);
        update_option('encrypt_password', $_POST['encrypt_password']);
        update_option('vendor_name', $_POST['vendor_name']);
        update_option('success_page', $_POST['success_page']);
        update_option('failure_page', $_POST['failure_page']);
    } 
    $option = get_option('test_or_live', 'test');
    $password = get_option('encrypt_password', '');
    $vendor = get_option('vendor_name', '');
    $success = get_option('success_page', '');
    $failure = get_option('failure_page', '');
	?>
	<div class="wrap">
		<h2>SagePay Options</h2>
        
        <form method="post">
            <table class="form-table">
                <tr valign="top">
                <th scope="row">Which server do you want to use?</th>
                <td>
                    <select name="test_or_live">
                        <option value="test" <?php if ($option==="test") { ?> selected <?php } ?>>Test</option>
                        <option value="live" <?php if ($option==="live") { ?> selected <?php } ?>>Live</option>
                    </select>
                </tr>
                 
                <tr valign="top">
                <th scope="row">Encryption pssword</th>
                <td><input type="text" name="encrypt_password" value="<?php echo $password; ?>" /></td>
                </tr>
                
                <tr valign="top">
                <th scope="row">Vendor name</th>
                <td><input type="text" name="vendor_name" value="<?php echo $vendor; ?>" /></td>
                </tr>
                
                <tr valign="top">
                <th scope="row">Success page URL</th>
                <td><input type="text" name="success_page" value="<?php echo $success; ?>" /></td>
                </tr>
                
                <tr valign="top">
                <th scope="row">Failure page URL</th>
                <td><input type="text" name="failure_page" value="<?php echo $failure; ?>" /></td>
                </tr>
            </table>
            
            <?php submit_button(); ?>

        </form>
    </div>
	<?php
}

function processSagePay() {
    if (isset($_POST['processPayment']) && $_POST['processPayment']==="sagepay") {
        $sagePay = new SagePay();
        $sagePay->setPassword(get_option('encrypt_password', ''));
        $sagePay->setCurrency('GBP');
        $sagePay->setAmount($_POST['amount']);
        $sagePay->setDescription("Reference No: ".$_POST['ref']);
        $sagePay->setBillingSurname($_POST['last_name']);
        $sagePay->setBillingFirstnames($_POST['first_name']);
        $sagePay->setBillingCity($_POST['city']);
        $sagePay->setBillingPostCode($_POST['postcode']);
        $sagePay->setBillingAddress1($_POST['address1']);
        $sagePay->setBillingCountry('gb');
        $sagePay->setCustomerEmail($_POST['email']);
        $sagePay->setDeliverySameAsBilling();
        $sagePay->setSuccessURL(get_option('success_page', ''));
        $sagePay->setFailureURL(get_option('failure_page', ''));
        $url=$sagePay->getCrypt()."&TxType=PAYMENT". "&Vendor=".get_option('vendor_name', '')."&VPSProtocol=3.00";
        header("Location: https://".get_option('test_or_live', 'test').".sagepay.com/gateway/service/vspform-register.vsp?Crypt=".$url);
        exit();
    }
}
add_action('init', processSagePay);

function SagePayShortcode() {
    return '<style>
        #SagePayForm .hundred {
            width:100%;
        }
        
        #SagePayForm .btn-accent {
            margin-top:10px;
        }
        
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            /* display: none; <- Crashes Chrome on hover */
            -webkit-appearance: none;
            margin: 0; /* <-- Apparently some margin are still there even though its hidden */
        }
    </style>
    <form method="POST" id="SagePayForm" action="">
        <input type="hidden" name="processPayment" value="sagepay" />
        <input class="hundred" type="text" name="first_name" placeholder="First Name *" required />
        <input class="hundred" type="text" name="last_name" placeholder="Last Name *" required />
        <input class="hundred" type="email" name="email" placeholder="Email *" required />
        <input class="hundred" type="text" name="company" placeholder="Company (if applicable)" />
        <input class="hundred" type="text" name="ref" placeholder="Payment reference *" required />
        <input class="hundred" type="number" name="amount" placeholder="Payable amount *" required min="0" step=".01" />
        
        <input class="hundred" type="text" name="address1" placeholder="Billing Address *" required />
        <input class="hundred" type="text" name="city" placeholder="Billing City *" required />
        <input class="hundred" type="text" name="postcode" placeholder="Billing Postcode *" required />
        <input class="btn-accent btn-circle menu-item menu-item-type-post_type menu-item-object-page menu-item-66353 menu-btn-container btn" type="submit" value="continue to SagePay">
    </form>';
}
add_shortcode('sagepay', 'SagePayShortcode');

