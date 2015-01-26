<?php

use Illuminate\Auth\UserProviderInterface;
use Illuminate\Auth\UserInterface as UserInterface;
use Illuminate\Auth\GenericUser;

class MemberUserProvider implements UserProviderInterface
{
	public $baseapi = 'http://69.162.107.178/';
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
	
    public function retrieveByID($identifier)
    {
		try{
			$api = $this->CallAPI('GET', $this->baseapi. sprintf('/api/account/byid/%s?hash=%s', $identifier, $this->hash));
			$response = json_decode($api);
			$data = $response;
			
			$user = array(
				'id' => $data->memb_guid,
				'username' => $data->memb___id,
				'password' => $data->memb__pwd,
			);
		}catch(\Exception $e){
			throw new Exception('Invalid credential. id not found.');
		}
	
		return new GenericUser($user);
    }

    public function retrieveByCredentials(array $credentials)
    {

        try{

			$api = $this->CallAPI('GET', $this->baseapi. sprintf('/api/account/byusername/%s?hash=%s', $credentials['username'], $this->hash));
			$response = json_decode($api);
			$data = $response;
			
			$user = array(
				'id' => $data->memb_guid,
				'username' => $data->memb___id,
				'password' => $data->memb__pwd,
				'bloc_code' => $data->bloc_code,
			);
		}catch(\Exception $e){
			throw new Exception('Invalid credential. Please try again.');
		}
	
		return new GenericUser($user);
    }

     public function validateCredentials(Illuminate\Auth\UserInterface $user, array $credentials)
     {
		if($user->password != $credentials['password']){
			throw new Exception('Invalid credential. Please try again.');
			
		}else if($user->bloc_code == 1){
			throw new Exception('Account Block. Please contact Support - Gatsby');
			
		}else{
			return true;
		}
     }
	 
	 public function updateRememberToken(\Illuminate\Auth\UserInterface $user, $token)
	 {
		 
	 }
	 
	 public function retrieveByToken($identifier, $token)
	 {
		 
	 }
}