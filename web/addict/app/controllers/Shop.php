<?php

class Shop extends BaseController
{
	public function show()
	{
		return View::make('shop/shop', $this->data);
	}
	
}