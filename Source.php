<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\packagist;


/**
 * Source holds the Package's source information
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\packagist
 */
class Source extends Object
{
	/**
	 * @var string the source's type
	 */
	protected $type;
	/**
	 * @var string the source's url
	 */
	protected $url;
	/**
	 * @var string the reference code
	 */
	protected $reference;

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