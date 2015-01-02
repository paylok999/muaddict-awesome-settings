<?php

class BaseController extends Controller {

	public $data;
	
	public function __construct()
	{
		if (Auth::check())
		{
			$this->data['login'] = 1;
			$this->data['userinfo'] = Auth::user();
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
