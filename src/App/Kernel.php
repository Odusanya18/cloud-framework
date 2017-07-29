<?php

namespace App;

use Klein\Klein as MicroKernel;
use Symfony\Component\Yaml\Yaml as Parser;

class Kernel extends MicroKernel
{
	/**
	 * @var string $env
	 */
	private $env;
	/**
	 * @var array $config
	 */
	private $config;

	/**
	 * @var Yaml $yaml
	 */
	private $yaml;

	
	public function registerServices()
	{
		$this->service()->services = [];

		// Include all routes defined in a file under a given namespace
		foreach(glob(__DIR__ ."/../src/App/Route/*.php") as $route) {
    		$this->with("/$route", $route);
		}
	}

	/**
	 * @return string
	 */
	public function getRootDir()
    {
        return __DIR__;
    }

    /**
     * @param string $env
     * @return string
     */
    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/'.$this->env;
    }

    /**
     * @return string
     */
    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }

    /**
     * @param string $env
     */
	public function load()
	{
		$this->yaml = implode(array_map(
			function ($filename) {
    			return file_get_contents($filename);
			}, glob(__DIR__ . '/../config/*.yaml')
			)
		);
	}

	public function createFromGlobals($env)
	{
		$this->env = $env;
		$this->load();
		$this->config = Parser::parse($this->yaml);
		$this->app()->register('config', $this->config);
		var_dump($this->yaml);
		die();
		$this->registerServices();
		return $this;
	}

}