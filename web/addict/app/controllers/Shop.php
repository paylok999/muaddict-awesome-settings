<?php

class Shop extends BaseController
{
	public function show()
	{
		$this->data['shoppingitems'] = $this->getAllItems();
		return View::make('shop/shop', $this->data);
	}
	
	public function showCheckout()
	{
		$this->data['shoppingitems'] = $this->getAllItems();
		return View::make('shop/shop', $this->data);
	}
	public function getAllItems()
	{
		return DB::table('onlineshop')->orderBy('id', 'asc')->get();
	}
	
	public function getAllItemsByUsername()
	{
		$getcheckout = DB::table('onlineshopcheckout')
		->where('username', Auth::user()->username)
		->orderBy('id', 'asc')->get();
		
		$allitems = array();
		$itemcount = array();
		$itemprice = array();
		$itemid = array();
		foreach($getcheckout as $checkout)
		{
			$items = DB::table('onlineshop')->where('id', $checkout->cartnumber)->first();
			$allitems[] = $items;
			$itemcount[] = $checkout->cartcount;
			$itemprice[] = $checkout->cartcount * $items->itemprice;
			$itemid[] = $checkout->id;
		}
		$this->data['shoppingitems'] = $allitems;
		$this->data['itemcount'] = $itemcount;
		$this->data['itemprice'] = $itemprice;
		$this->data['itemid'] = $itemid;
		return View::make('shop/checkout', $this->data);
	}
	
	public function addCart()
	{
		$inputs = Input::all();
		foreach(array_filter($inputs['cartnumber']) as $key=> $input)
		{
			if($inputs['cartcount'][$key] <= 0){
			}else{
				DB::table('onlineshopcheckout')
				->insert(
					array(
						'username' =>Auth::user()->username, 
						'cartnumber' => $input, 
						'cartcount' => $inputs['cartcount'][$key], 
						'status' => 0
					)
				);
				
			}
		}
		return Redirect::to('shop/checkout');
	}
	
	public function deleteItem()
	{
		$itemid = Input::get('cartnumber');
		//var_dump($itemid);
		DB::table('onlineshopcheckout')->where('id', $itemid)->delete();
		return 1;
		
	}
	
	public function cancel()
	{
		return View::make('shop/cancel', $this->data);
	}
	
	public function complete()
	{
		return View::make('shop/complete', $this->data);
	}
}