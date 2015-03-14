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
		$api = $this->CallAPI('POST', $this->baseapi. sprintf('/api/register?hash=%s', $this->hash), $postdata);
		$response = json_decode($api);
		return $response->callback;
	}
	
	public function addCoin(){
		//$checkonline = DB::table('memb_stat')->where('ConnectStat', 1)->get();

		//echo count($checkonline);
		//var_dump($checkonline);
		foreach($checkonline as $online){
			$onlinecoin = DB::table('T_InGameShop_Point')->where('AccountID', $online->memb___id)->get();
			//echo count($onlinecoin);
			foreach ($onlinecoin as $coin){
				//echo $coin->AccountID.' | '.$coin->WCoinP.' | '.$coin->WCoinC .'<br>';
				echo $coin->AccountID.'<br>';
				//var_dump($coin);
				//DB::table('T_InGameShop_Point')->where('AccountID', $coin->AccountID)->update(array('WcoinP' => $coin->WCoinP+500, 'WCoinC' => $coin->WCoinC+5000));
				
			}
			//echo $onlinecoin->wcoinc.'<br>';
			
			
		}
		
	}
	
	public function changeOldPassword()
	{
		$oldlogins = DB::table('memb_stat')->whereRaw("ConnectTM <= '2014-12-28'")->get();
		//var_dump(count($oldlogins));die();
		foreach($oldlogins as $oldlogin){
			
			//echo $oldlogin->memb___id.'<br>';
			$accounts = DB::table('memb_info')->select('memb___id', 'memb__pwd')->where('memb___id', $oldlogin->memb___id)->get();
			foreach($accounts as $account){
				//echo $account->memb___id.' '. $account->memb__pwd.'<br>';
				/*DB::table('memb_info')
				->where('memb___id', $account->memb___id)
				->update(array('memb__pwd' => 'pig'.$account->memb__pwd.'sisiw'));*/
			}
		}
		
	}
	
	public function addseals($username)
	{
		$account = new AccountModel;
		return $account->addStartingSeals($username);
	}
	
	public function add1DaySetOfSeals()
	{
		$account = new AccountModel;
		$account->add1DaySeals('admin01');
		$checkonline = DB::table('memb_stat')->where('ConnectStat', 1)->get();
		echo count($checkonline).'<br>';
		foreach($checkonline as $online){
			echo $online->memb___id.'<br>';
			//$account->add1DaySeals($online->memb___id);
		}
	}
}