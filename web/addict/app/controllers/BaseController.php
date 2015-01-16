<?php

class BaseController extends Controller {

	public $data;
	public $account;
	
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
		return DB::table('memb_stat')->where('ConnectStat', 1)->get();
		
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
}
