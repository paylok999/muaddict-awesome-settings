<?php

class Account extends BaseController
{
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
		$this->data['coins'] = $this->account->getCoinsByUsername(Auth::user()->username);
		return View::make('account/transfercoin', $this->data);

	}
	
	/*POST transfercoin*/
	public function transferCoin()
	{
		$postdata = Input::get();
		
		$validator = Validator::make(
			$postdata,
			array(
				'receiverusername' => 'required|min:6|max:10',
				'amount' => 'required|numeric',
				'userpassword' => 'required|min:6|max:10',
			)
		);
		if($validator->fails()){
			return 'Something went wrong. Please Check your inputs. Follow the guideline. reason: '. $validator->messages();
			
		}else{
			$checkifonline = $this->account->checkAccountIfOnline(Auth::user()->username);
			$checkifonlinereceiver = $this->account->checkAccountIfOnline($postdata['receiverusername']);
			if($checkifonline->ConnectStat == 1){
				return 'Your account is online. Please logout first in game.';
			}else if($checkifonlinereceiver->ConnectStat == 1){
				return 'Receiver account is online. Please logout first in game.';
			}
			$checkuser = $this->account->getMemberAccountByUsername($postdata['receiverusername']);
			if($checkuser == NULL){
				return 'Username not found. Please try again.';
			}else{
				$currentcoins = $this->account->getCoinsByUsername(Auth::user()->username);
				if($postdata['amount'] > $currentcoins->WCoinP){
					return 'You do not have this amount of coin. Please try again.';
				}else{
					if($postdata['userpassword'] != Auth::user()->password){
						return 'You have entered invalid password. Please try again.';
					}else{
						$sendercoin = $this->account->getCoinsByUsername(Auth::user()->username);
						$receivercoin = $this->account->getCoinsByUsername($postdata['receiverusername']);
						/*minus sender*/
						DB::table('T_InGameShop_Point')
						->where('AccountID', $sendercoin->AccountID)
						->update(array('WCoinP' => $sendercoin->WCoinP - $postdata['amount']));
						/*add receiver*/
						DB::table('T_InGameShop_Point')
						->where('AccountID', $receivercoin->AccountID)
						->update(array('WCoinP' => $receivercoin->WCoinP + $postdata['amount']));
						return 1;
					}
				}
				
			}
		}
		//var_dump(Input::all());
		//$this->account->getMemberAccountByUsername()
		//return 1;
	}
}