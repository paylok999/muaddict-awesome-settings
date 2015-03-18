<?php

class Home extends BaseController 
{
	
	public function showIndex()
	{
		return View::make('index', $this->data);
	}

	public function testmethod()
	{
		return 'test';
	}
}

