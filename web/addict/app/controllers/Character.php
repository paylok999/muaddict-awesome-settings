<?php

class Character extends BaseController
{
	public $limit = 20;
	
	public function getTop($order = 'mlevel')
	{
		$orderlimit = array('mlevel', 'pkcount', 'winduels');
		if(!in_array($order, $orderlimit))
			die();
		if($order == 'mlevel' || $order == 'winduels'){
			return DB::table('character')
			->select(DB::raw('TOP 20 name,mlevel, winduels, loseduels, pkcount'))
			->where('ctlcode', 0)
			->orderBy($order, 'desc')
			->remember(10)
			->get();
		}else{
			return DB::table('C_PlayerKiller_Info')
			->select(DB::raw('top 20 count(victim) as victim, killer'))
			->groupBy('killer')
			->orderBy('victim', 'desc')
			->remember(10)
			->get();
			
		}
	}

}