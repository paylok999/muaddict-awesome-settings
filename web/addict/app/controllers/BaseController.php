<?php

class BaseController extends Controller {

	public $data;
	public $account;
	public $baseapi = 'http://69.162.107.178/';
	protected $hash = '8415e91f9f0770f983d3e7dace5c6936';
	public function __construct(AccountModel $account)
	{
		//$this->antiDdos();
		if (Auth::check())
		{
			$this->data['login'] = 1;
			$this->data['userinfo'] = Auth::user();
			$this->account = $account;
			$this->data['characters'] = $this->account->getAllCharacter();
		}else{
			$this->data['login'] = 0;
		}
		
		$this->data['onlinecount'] = count($this->getAllOnline()) + 20;
	}
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	public function getAllOnline()
	{
		$api = $this->CallAPI('GET', $this->baseapi. sprintf('/api/allonline?hash=%s', $this->hash));
		$response = json_decode($api);
		return $response;
		
	}
	
	public function antiDdos()
	{
		// Assuming session is already started
		$uri = md5($_SERVER['REQUEST_URI']);
		$exp = 3; // 3 seconds
		$hash = $uri .'|'. time();
		if (!isset($_SESSION['ddos'])) {
			$_SESSION['ddos'] = $hash;
		}

		list($_uri, $_exp) = explode('|', $_SESSION['ddos']);
		if ($_uri == $uri && time() - $_exp < $exp) {
			header('HTTP/1.1 503 Service Unavailable');
			// die('Easy!');
			die;
		}

		// Save last request
		$_SESSION['ddos'] = $hash;
	}
	
	public function CallAPI($method, $url, $datas = false)
	{
		$curl = curl_init();
		switch ($method)
		{
			case "POST":
				curl_setopt($curl, CURLOPT_POST, 1);
				if ($datas)
					curl_setopt($curl, CURLOPT_POSTFIELDS, $datas);
				break;
			case "PUT":
				curl_setopt($curl, CURLOPT_PUT, 1);
				break;
			case "DELETE":
				curl_setopt($curl, CURLOPT_URL,$url);
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
				break;
			default:
				if ($datas)
					$url = sprintf("%s?%s", $url, http_build_query($datas));
		}
		// Optional Authentication:
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_USERPWD, "username:password");
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		return $result;
	}
}
