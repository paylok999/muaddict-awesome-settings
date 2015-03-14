<?php

class AccountModel
{
	public $baseapi = 'http://167.114.117.209/';
	protected $hash = '8415e91f9f0770f983d3e7dace5c6936';
	public function CallAPI($method, $url, $datas = false)
	{
		$curl = curl_init();
		switch ($method)
		{
			case "POST":
				curl_setopt($curl, CURLOPT_POST, 1);
				if ($datas)
					curl_setopt($curl, CURLOPT_POSTFIELDS, $datas);
				break;
			case "PUT":
				curl_setopt($curl, CURLOPT_PUT, 1);
				break;
			case "DELETE":
				curl_setopt($curl, CURLOPT_URL,$url);
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
				break;
			default:
				if ($datas)
					$url = sprintf("%s?%s", $url, http_build_query($datas));
		}
		// Optional Authentication:
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_USERPWD, "username:password");
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		return $result;
	}
	
	public function getAllCharacter()
	{
		$api = $this->CallAPI('GET', $this->baseapi. sprintf('api/user/allcharacter/%s?hash=%s', Auth::user()->username, $this->hash));
		$response = json_decode($api);
		return $response;
	}
	
	public function getCharacterDetailsByName($character)
	{
		//return DB::table('character')->select('mlevel')->where('name', $character)->first();
		$api = $this->CallAPI('GET', $this->baseapi. sprintf('/api/user/characterinfo/%s?hash=%s', $character, $this->hash));
		$response = json_decode($api);
		return $response;
	}
	
	public function getCharacterInfoByName($character)
	{
		$api = $this->CallAPI('GET', $this->baseapi. sprintf('/api/user/characterinfo/%s?hash=%s', $character, $this->hash));
		$response = json_decode($api);
		return $response;
	}
	
	public function getPKCountByCharname($charname)
	{
		$api = $this->CallAPI('GET', $this->baseapi. sprintf('api/user/characterpk/%s?hash=%s', $charname, $this->hash));
		$response = json_decode($api);
		return $response;
	}
	public function getCoinsByUsername($username)
	{
		return DB::table('T_InGameShop_Point')->where('AccountID', $username)->first();
	}
	
	public function checkAccountIfOnline($username)
	{
		return DB::table('memb_stat')->where('memb___id', $username)->first();
	}
	
	public function getMemberAccountByUsername($username)
	{	
		return DB::table('memb_info')->where('memb___id', $username)->first();
	}
	
	public function addStartingSeals($username)
	{
		$seals = array(
					'AccountID' => $username,
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 10,
					'UniqueID3' => 15,
					'InventoryType' => 1,
				);
				
				$sealshealing = array(
					'AccountID' => $username,
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 38,
					'UniqueID3' => 63,
					'InventoryType' => 1,
				);
				
				$sealspet = array(
					'AccountID' => $username,
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 61,
					'UniqueID3' => 102,
					'InventoryType' => 1,
				);
				
				$sealsring = array(
					'AccountID' => $username,
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 59,
					'UniqueID3' => 98,
					'InventoryType' => 1,
				);
				
				$masterseals = array(
					'AccountID' => $username,
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
	}
	
	public function add1DaySeals($username)
	{
		$masterseals = array(
					'AccountID' => $username,
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 51,
					'UniqueID3' => 80,
					'InventoryType' => 1,
				);
				
				$sealspet = array(
					'AccountID' => $username,
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 61,
					'UniqueID3' => 101,
					'InventoryType' => 1,
				);
				
				$sealsring = array(
					'AccountID' => $username,
					'AuthCode' =>0,
					'UniqueID1' => 673,
					'UniqueID2' => 59,
					'UniqueID3' => 97,
					'InventoryType' => 1,
				);
			
				
				DB::table('T_InGameShop_Items')->insert($masterseals);
				DB::table('T_InGameShop_Items')->insert($sealspet);
				DB::table('T_InGameShop_Items')->insert($sealsring);
			
	}
}