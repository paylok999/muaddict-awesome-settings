<?php 

class Register extends BaseController
{
	public function index()
	{
		return View::make('register');
		
	}
	
	public function addUser()
	{
		$postdata = Input::get();
		
		$validator = Validator::make(
			$postdata,
			array(
				'username' => 'required|min:6|max:10',
				'password' => 'required|min:6|max:10',
				'email' => 'required|email|max:50',
				'secreta' => 'required||min:4|max:50',
			)
		);
		
		if($validator->fails()){
			return 'Something went wrong. Please Check your inputs. Follow the guideline';
			
		}else{
			$checkuser = DB::table('memb_info')
			->where('memb___id', $postdata['username'])
			->orwhere('mail_addr', $postdata['email'])
			->get();
			if(!empty($checkuser)){
				return 'Username or Emaill address exist. Please Try again';
				
			}else{
				$userinput = array(
					'memb___id' => Input::get('username'),
					'memb_name' => Input::get('username'),
					'memb__pwd' => Input::get('password'),
					'mail_addr' => Input::get('email'),
					'SecretQuestion' => Input::get('secretq'),
					'SecretAnswer' => Input::get('secreta'),
				);
				
				DB::table('memb_info')->insert($userinput);
				return 1;
			}
		}
		
	}
	
	public function addCoin(){
		$checkonline = DB::table('memb_stat')->where('ConnectStat', 1)->get();
		//echo count($checkonline);
		//var_dump($checkonline);
		foreach($checkonline as $online){
			$onlinecoin = DB::table('T_InGameShop_Point')->where('AccountID', $online->memb___id)->get();
			//echo count($onlinecoin);
			foreach ($onlinecoin as $coin){
				//echo $coin->AccountID.' '.$coin->WCoinP.'<br>';
				//var_dump($coin);
				//DB::table('T_InGameShop_Point')->where('AccountID', $coin->AccountID)->update(array('WcoinP' => $coin->WCoinP+500));
				
			}
			//echo $onlinecoin->wcoinc.'<br>';
			
			
		}
		
	}
}