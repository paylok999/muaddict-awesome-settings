<?php

class AccountModel
{
	public function getAllCharacter()
	{
		return DB::table('character')->select('name')->where('AccountID', Auth::user()->username)->get();
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
}