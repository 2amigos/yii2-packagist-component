<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\packagist;


/**
 * Downloads holds
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\packagist
 */
class Downloads extends Object
{
	/**
	 * @var int the total times downloaded
	 */
	protected $total;
	/**
	 * @var int the total times downloaded monthly
	 */
	protected $monthly;
	/**
	 * @var int the total times downloaded daily
	 */
	protected $daily;

	/**
	 * @return int
	 */
	public function getTotal()
	{
		return $this->total;
	}

	/**
	 * @return int
	 */
	public function getMonthly()
	{
		return $this->monthly;
	}

	/**
	 * @return int
	 */
	public function getDaily()
	{
		return $this->daily;
	}
} 