<?php

class AccountModel
{
	public function getAllCharacter()
	{
		return DB::table('character')->select('name')->where('AccountID', Auth::user()->username)->get();
	}
	
	public function getCharacterDetailsByName($character)
	{
		return DB::table('character')->select('mlevel')->where('name', $character)->first();
	}
	
	public function getCharacterInfoByName($character)
	{
		return DB::table('character')
		->select(
			'mlevel', 
			'mlpoint',
			'class', 
			'clevel', 
			'leveluppoint', 
			'strength', 
			'dexterity', 
			'vitality', 
			'leadership', 
			'energy', 
			'money', 
			'winduels', 
			'loseduels'
		)
		->where('name', $character)->first();
	}
	
	public function getPKCountByCharname($charname)
	{
		return DB::table('C_PlayerKiller_Info')
			->select(DB::raw('top 1 count(victim) as victim, killer'))
			->where('killer', $charname)
			->groupBy('killer')
			->orderBy('victim', 'desc')
			->get();
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