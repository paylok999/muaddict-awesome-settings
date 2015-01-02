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
}