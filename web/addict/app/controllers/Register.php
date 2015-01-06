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
				
				$seals = array(
					'AccountID' => Input::get('username'),
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 10,
					'UniqueID3' => 15,
					'InventoryType' => 1,
				);
				
				$sealshealing = array(
					'AccountID' => Input::get('username'),
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 38,
					'UniqueID3' => 63,
					'InventoryType' => 1,
				);
				
				$sealspet = array(
					'AccountID' => Input::get('username'),
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 61,
					'UniqueID3' => 102,
					'InventoryType' => 1,
				);
				
				$sealsring = array(
					'AccountID' => Input::get('username'),
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 59,
					'UniqueID3' => 98,
					'InventoryType' => 1,
				);
				
				$masterseals = array(
					'AccountID' => Input::get('username'),
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 51,
					'UniqueID3' => 81,
					'InventoryType' => 1,
				);
				
				DB::table('T_InGameShop_Items')->insert($seals);
				DB::table('T_InGameShop_Items')->insert($sealshealing);
				DB::table('T_InGameShop_Items')->insert($sealspet);
				DB::table('T_InGameShop_Items')->insert($sealsring);
				DB::table('T_InGameShop_Items')->insert($masterseals);
				return 1;
			}
		}
		
	}
	
	public function addCoin(){
		//$checkonline = DB::table('memb_stat')->where('ConnectStat', 1)->get();
		$checkonline = 
DB::table('memb_info')
->orWhere('memb___id', 'rina1326')
->orWhere('memb___id', 'benj1326')
->orWhere('memb___id', 'ginjikun')
->orWhere('memb___id', 's3cr3t0k00')
->orWhere('memb___id', 'cav013')
->orWhere('memb___id', 'mutrax01')
->orWhere('memb___id', 'banchan')
->orWhere('memb___id', 'kenneth19')
->orWhere('memb___id', 'ken05')
->orWhere('memb___id', 'akazuki')
->orWhere('memb___id', 'DEATHMATCH')
->orWhere('memb___id', 'koino16')
->orWhere('memb___id', 'Rafa08')
->orWhere('memb___id', 'kerh30')
->orWhere('memb___id', 'emdelta00b')
->orWhere('memb___id', 'markq')
->orWhere('memb___id', 'delta2000b')
->orWhere('memb___id', 'sayryz')
->orWhere('memb___id', 'beductster')
->orWhere('memb___id', 'honeyko')
->orWhere('memb___id', 'monchi')
->orWhere('memb___id', 'cav05')
->orWhere('memb___id', 'Chinchan24')
->orWhere('memb___id', 'rayjohn91')
->orWhere('memb___id', 'bajewa3')
->orWhere('memb___id', 'cjpera1')
->orWhere('memb___id', 'anielboy')
->orWhere('memb___id', 'akizuki')
->orWhere('memb___id', 'kapitantut')
->orWhere('memb___id', 'enigma333')
->orWhere('memb___id', 'MORIONES')
->orWhere('memb___id', 'reiji17')
->orWhere('memb___id', 'briana07')
->orWhere('memb___id', 'gm20141')
->orWhere('memb___id', 'issay717')
->orWhere('memb___id', 'palma07')
->orWhere('memb___id', 'Babyjames')
->orWhere('memb___id', 'Imagine')
->orWhere('memb___id', 'Hahaa001')
->orWhere('memb___id', 'deathshead')
->orWhere('memb___id', 's3cr3t0k0')
->orWhere('memb___id', 's3cr3t0k00')
->orWhere('memb___id', 's3cr3t0k01')
->orWhere('memb___id', 's3cr3t0k02')
->orWhere('memb___id', 's3cr3t0k03')
->orWhere('memb___id', 's3cr3t0k04')
->orWhere('memb___id', 's3cr3t0k05')
->orWhere('memb___id', 's3cr3t0k06')
->orWhere('memb___id', 's3cr3t0k07')
->orWhere('memb___id', 's3cr3t0k08')
->orWhere('memb___id', 's3cr3t0k09')
->orWhere('memb___id', 's3cr3t0k10')
->orWhere('memb___id', 's3cr3t0k11')
->orWhere('memb___id', 's3cr3t0k12')
->orWhere('memb___id', 's3cr3t0k13')
->orWhere('memb___id', 's3cr3t0k14')
->orWhere('memb___id', 's3cr3t0k15')
->orWhere('memb___id', 's3cr3t0k16')
->orWhere('memb___id', 's3cr3t0k17')
->orWhere('memb___id', 's3cr3t0k18')
->orWhere('memb___id', 's3cr3t0k19')
->orWhere('memb___id', 's3cr3t0k20')
->orWhere('memb___id', 'enigma003')
->orWhere('memb___id', 'recalde2')

->orWhere('memb___id', 'mcca101509')
->orWhere('memb___id', 'km1810')
->orWhere('memb___id', 'Godz')
->orWhere('memb___id', '4tech')
->orWhere('memb___id', 'jcguerra01')
->orWhere('memb___id', 'rinjie1326')
->orWhere('memb___id', 'km1819')
->orWhere('memb___id', 'kingjj1232')
->orWhere('memb___id', 'anne0214')
->orWhere('memb___id', 'rose0214')
->orWhere('memb___id', 'lldelta00b')
->orWhere('memb___id', 'recalde2')
->orWhere('memb___id', 'ez2605')
->orWhere('memb___id', 'ecra08')
->orWhere('memb___id', 'shaban2')
->orWhere('memb___id', 'insert')
->orWhere('memb___id', 'jamesgod')
->orWhere('memb___id', 'Maricel21')
->orWhere('memb___id', 'bolbol69')
->orWhere('memb___id', 'Mikaela143')
->orWhere('memb___id', 'JonJon13')
->orWhere('memb___id', 'Maricel24')
->orWhere('memb___id', 'itoygwapo')
->orWhere('memb___id', 'jmayag21')
->orWhere('memb___id', 'tabs')
->orWhere('memb___id', 'yats')
->orWhere('memb___id', 'jayson1')
->orWhere('memb___id', 'popoymola')
->orWhere('memb___id', 'popoymola1')
->orWhere('memb___id', 'geLoaLvior')
->orWhere('memb___id', 'geLaaLvior')
->orWhere('memb___id', 'katokse14')
->orWhere('memb___id', 'rhemrhem')
->orWhere('memb___id', 'weezkee204')
->orWhere('memb___id', 'weezkee')
->orWhere('memb___id', 'maria1')
->orWhere('memb___id', 'weezkee204')
->orWhere('memb___id', 'weezkee204')

->get();
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
}