<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\packagist;


/**
 * Author holds information about a package's author
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\packagist
 */
class Author extends Object
{
	/**
	 * @var string the name of the author
	 */
	protected $name;
	/**
	 * @var string the email of the author
	 */
	protected $email;
	/**
	 * @var string the author's website
	 */
	protected $homepage;

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @return string
	 */
	public function getHomepage()
	{
		return $this->homepage;
	}
} 