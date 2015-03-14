<?php

class Account extends BaseController
{
	public $msstatreset = 2000;
	public $statreset = 1000;
	
	public function changePassword()
	{
		$postdata = Input::all();
		//var_dump($postdata);die();
		$api = $this->CallAPI('POST', $this->baseapi. sprintf('/api/user/changepassword/%s?hash=%s', Auth::user()->username, $this->hash), $postdata);
		$response = json_decode($api);
		return $response->callback;
	}
	
	/* load transfer coin modules*/
	public function getCoinTransferForm()
	{
		$api = $this->CallAPI('GET', $this->baseapi. sprintf('/api/user/coininfo/%s?hash=%s', Auth::user()->username, $this->hash));
		$response = json_decode($api);
		$this->data['coins'] = $response;
		return View::make('account/transfercoin', $this->data);

	}
	
	/*POST transfercoin*/
	public function transferCoin()
	{
		$postdata = Input::all();
		$postdata['username'] = Auth::user()->username;
		//var_dump($postdata);die();
		$api = $this->CallAPI('POST', $this->baseapi. sprintf('/api/user/cointransfer?hash=%s', $this->hash), $postdata);
		$response = json_decode($api);
		return $response->callback;
	}
	
	public function resetMSReset()
	{
		$charname = Input::get();
		$charname['username'] = Auth::user()->username;
		$api = $this->CallAPI('POST', $this->baseapi. sprintf('/api/user/msreset?hash=%s', $this->hash), $charname);
		$response = json_decode($api);
		return $response->callback;

	}
	/*character stat reset*/
	public function resetStats()
	{
		$charname = Input::get();
		$charname['username'] = Auth::user()->username;
		$api = $this->CallAPI('POST', $this->baseapi. sprintf('/api/user/statreset?hash=%s', $this->hash), $charname);
		$response = json_decode($api);
		return $response->callback;
	}
	/*show character details*/
	public function getCharacterDetails($charname)
	{
		$this->data['character'] = $charname;
		$this->data['info'] = $this->account->getCharacterInfoByName($charname);
		$this->data['pk'] = $this->account->getPKCountByCharname($charname);
		//var_dump($this->data['info']);die();
		return View::make('account/character', $this->data);
	}
	
	public function unstockCharacter()
	{
		$charname = Input::get();
		$charname['username'] = Auth::user()->username;
		$api = $this->CallAPI('POST', $this->baseapi. sprintf('/api/user/unstock?hash=%s', $this->hash), $charname);
		$response = json_decode($api);
		return $response->callback;
		
	}
}