<?php

class Account extends BaseController
{
	public $msstatreset = 2000;
	public $statreset = 1000;
	
	public function changePassword()
	{
		$postdata = Input::get();
		
		$validator = Validator::make(
			$postdata,
			array(
				'oldpassword' => 'required|min:6|max:10',
				'newpassword' => 'required|min:6|max:10',
				'rnewpassword' => 'required|min:6|max:10',
			)
		);
		
		if($validator->fails()){
			return 'Something went wrong. Please Check your inputs. Follow the guideline';
			
		}else{
			if($postdata['oldpassword'] != Auth::user()->password){
				return 'Your input current password did not match on whats in our system. Please try again.';
			}else if($postdata['newpassword'] != $postdata['rnewpassword']){
				return 'New password and Repeat new password did not match. Please Try again.';
			}else{
				
				DB::table('memb_info')
				->where('memb___id', Auth::user()->username)
				->update(array('memb__pwd' => ($postdata['newpassword'])));
				return 1;
			}
		}
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
		$validator = Validator::make(
			$charname,
			array(
				'charname' => 'required|min:6|max:10',
			)
		);
		if($validator->fails()){
			return 'Something went wrong. Please Check your inputs. Follow the guideline. reason: '. $validator->messages();
			
		}else{
			$checkifonline = $this->account->checkAccountIfOnline(Auth::user()->username);
			if($checkifonline->ConnectStat == 1){
				return 'Your account is online. Please logout first in game.';
			}else{
				DB::table('character')->where('name', $charname['charname'])->update(array('mapnumber' => 0, 'MapPosX' => 140, 'MapPosY' => 127));
				return 1;
			}
		}
		
	}
}