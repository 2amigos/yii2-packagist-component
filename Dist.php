<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\packagist;

/**
 * Dist holds package's dist information
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\packagist
 */
class Dist extends Object
{
	/**
	 * @var string the crc value
	 */
	protected $shasum;
	/**
	 * @var string the type of package -ie "zip"
	 */
	protected $type;
	/**
	 * @var string the url
	 */
	protected $url;
	/**
	 * @var string the reference
	 */
	protected $reference;

	/**
	 * @return string
	 */
	public function getShasum()
	{
		return $this->shasum;
	}

	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @return string
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * @return string
	 */
	public function getReference()
	{
		return $this->reference;
	}
} 