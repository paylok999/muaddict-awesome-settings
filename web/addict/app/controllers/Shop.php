<?php

class Shop extends BaseController
{
	public function show()
	{
		$api = $this->CallAPI('GET', $this->baseapi. sprintf('/api/shop/allitems?hash=%s', $this->hash));
		$response = json_decode($api);
		$this->data['shoppingitems'] = $response;
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
		$api = $this->CallAPI('GET', $this->baseapi. sprintf('/api/shop/allitemsbyusername/%s?hash=%s', Auth::user()->username, $this->hash));
		$response = json_decode($api);
		$this->data['shoppingitems'] = $response->shoppingitems;
		$this->data['itemcount'] = $response->itemcount;
		$this->data['itemprice'] = $response->itemprice;
		$this->data['itemid'] = $response->itemid;
		return View::make('shop/checkout', $this->data);
	}
	
	public function addCart()
	{
		$inputs = Input::all();
		foreach(array_filter($inputs['cartnumber']) as $key=> $input)
		{
			if($inputs['cartcount'][$key] <= 0){
			}else{
				$data = array(
						'username' =>Auth::user()->username, 
						'cartnumber' => $input, 
						'cartcount' => $inputs['cartcount'][$key], 
						'status' => 0
					);
				$api = $this->CallAPI('POST', $this->baseapi. sprintf('/api/shop/additem?hash=%s', $this->hash), $data);
				$response = json_decode($api);
				
			}
		}
		return Redirect::to('shop/checkout');
	}
	
	public function deleteItem()
	{
		$api = $this->CallAPI('DELETE', $this->baseapi. sprintf('/api/shop/delete/%s?hash=%s', Input::get('cartnumber'), $this->hash));
		$response = json_decode($api);
		return $response;
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