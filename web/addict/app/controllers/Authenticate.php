<?php 

class Authenticate extends BaseController
{
	public function login()
	{
		$data = Input::all();
		$validator = Validator::make(
			$data,
			array(
				'username' => 'required|min:5|max:10',
				'password' => 'required|min:6|max:10',
			)
		);
		if($validator->fails()){
			
			return 'Something went wrong. Please Check your inputs. Follow the guideline';
			
		}else{
			try{
				Auth::attempt(array('username' => $data['username'], 'password' => $data['password']));
				return 1;
			}catch(Exception $e){
				return $e->getMessage();
			}
		}
	}
	
	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
}