<?php

/**
 * Created by PhpStorm.
 * User: ydombrovsky
 * Date: 30.08.17
 * Time: 16:32
 */
namespace  hhResumeUpdater;

require_once __DIR__ . '/vendor/autoload.php';

use \GuzzleHttp\Client;
use \GuzzleHttp\RequestOptions;

/**
 * Class App1
 *
 * @package hhResumeAutoUpdater
 */
class App {
	/**
	 * @var string
	 */
	private $token;
	/**
	 * @var string
	 */
	private $resumeId;
	/**
	 * @var string
	 */
	private $confFile = 'Config.json';
	
	/**
	 * App1 constructor.
	 */
	public function __construct()
	{
		$this->initConfig();
	}
	
	/**
	 * @throws \Exception
	 */
	private function initConfig()
	{
		$filePath = __DIR__ . '/' . $this->confFile;
		if (file_exists($filePath))
		{
			$json = file_get_contents($filePath);
			$json = json_decode($json, true);
		}
		else
		{
			throw new \Exception("Config file: " . $filePath . " not exist!!");
		}
		
		$this->token = $json['hhToken'];
		$this->resumeId = $this->parseResumeId($json['resumeLink']);
	}
	
	/**
	 * @param $resumeLink
	 *
	 * @return mixed
	 */
	private function parseResumeId($resumeLink)
	{
		return preg_split('/\//', $resumeLink)[4];
	}
	
	/**
	 *
	 */
	public function publishHhResume()
	{
		$client = new Client();
		try
		{
			$res = $client->request("POST", "https://api.hh.ru/resumes/" . $this->resumeId . "/publish", [
				RequestOptions::QUERY => [
					'resume_id'    => $this->resumeId
				],
				RequestOptions::HEADERS =>[
					'Authorization' => 'Bearer ' .$this->token,
				]
			])->getBody();
			echo "Ok".PHP_EOL;
		} catch (\Exception $e)
		{
			$this->notifyAboutError($e);
		}
		
	}
	
	/**
	 * @param \Exception $exeption
	 */
	private function notifyAboutError($exeption)
	{
		echo $exeption->getMessage().PHP_EOL;
	}
}

(new App)->publishHhResume();