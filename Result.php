<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\packagist;

/**
 * Result holds the information of a search for packages call
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\packagist
 */
class Result extends Object
{
	/**
	 * @var string the name of the package
	 */
	protected $name;
	/**
	 * @var string the description of the package
	 */
	protected $description;
	/**
	 * @var string the url of the package
	 */
	protected $url;
	/**
	 * @var int the number of downloads
	 */
	protected $downloads;
	/**
	 * @var in the number of favers
	 */
	protected $favers;

	/**
	 * @return string package name
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return string package description
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @return string package url
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * @return int number of downloads
	 */
	public function getDownloads()
	{
		return $this->downloads;
	}

	/**
	 * @return int the numer of favers
	 */
	public function getFavers()
	{
		return $this->faves;
	}
}
