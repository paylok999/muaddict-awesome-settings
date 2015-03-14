<?php

class Character extends BaseController
{
	public $limit = 20;
	
	public function getTop($order = 'mlevel')
	{
		$api = $this->CallAPI('GET', $this->baseapi. sprintf('/api/character/rankings/%s?hash=%s', $order, $this->hash));
		$response = json_decode($api);
		return $response;
	}
	
	public function get2015TopPlayer($order)
	{
		if($order == '2015top'){
			$api = $this->CallAPI('GET', $this->baseapi. sprintf('/api/character/rankings2015/%s?hash=%s', $order, $this->hash));
			$response = json_decode($api);
			return $response;

		}
	}
	
	public function getBloodCastleRankings()
	{
			$api = $this->CallAPI('GET', $this->baseapi. sprintf('/api/character/bloodcastle?hash=%s', $this->hash));
			$response = json_decode($api);
			return $response;
	}

}