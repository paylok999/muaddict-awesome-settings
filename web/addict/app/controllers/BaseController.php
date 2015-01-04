<?php

class BaseController extends Controller {

	public $data;
	public $account;
	
	public function __construct(AccountModel $account)
	{
		if (Auth::check())
		{
			$this->data['login'] = 1;
			$this->data['userinfo'] = Auth::user();
			$this->account = $account;
			$this->data['characters'] = $this->account->getAllCharacter();
		}else{
			$this->data['login'] = 0;
		}
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

}