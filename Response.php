<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\packagist;


use yii\base\Component;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * Response will be filled with packagist api response information.
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\packagist
 */
class Response extends Component
{
	/**
	 * @var string a json string
	 */
	public $json;

	/**
	 * @var mixed body
	 */
	private $_body;

	/**
	 * @return mixed the body of the response will vary depending on the
	 * call made. The following list explains the different types.
	 *
	 * - If [[Packagist::all()]] call is made, the body will be an array of [[Packagist]] objects.
	 * - If [[Packagist::search()]] the body will be an array of [[Result]] objects.
	 * - If [[Packagist::package()]] the body will be a [[Package]] object.
	 */
	public function getBody()
	{
		return $this->_body;
	}

	/**
	 * @var int the number of results
	 */
	private $_total;

	/**
	 * @return int
	 */
	public function getTotal()
	{
		return $this->_total;
	}

	/**
	 * @var string the url to call to load more results
	 */
	private $_next;

	/**
	 * @return string
	 */
	public function getNext()
	{
		return $this->_next;
	}

	/**
	 * @var string the error returned if a call was not successful
	 */
	private $_error;

	/**
	 * @return string
	 */
	public function getError()
	{
		return $this->_error;
	}

	/**
	 * @return bool whether the call had no errors and its json data was processed
	 */
	public function getIsSuccessFul()
	{
		return $this->getError() === null;
	}

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		if ($this->json !== null) {
			$this->process(Json::decode($this->json));
		}
	}

	/**
	 * @param array $data
	 * @return $this
	 */
	public function process(array $data = array())
	{
		if ($this->_body !== null) {
			$this->_body = null;
		}
		if (ArrayHelper::keyExists('packageNames', $data)) {
			$this->_body = $data['packageNames'];
		}
		if (ArrayHelper::keyExists('results', $data)) {
			$this->_total = ArrayHelper::getValue($data, 'total');
			$this->_next = ArrayHelper::getValue($data, 'next');
			$this->_body = $this->buildSearchResults($data['results']);
		}
		if (ArrayHelper::keyExists('package', $data)) {
			$this->_body = new Package($data['package']);
		}
		$this->_error = ArrayHelper::getValue($data, 'error');

		return $this;
	}

	/**
	 * @param array $results
	 * @return array
	 */
	protected function buildSearchResults(array $results)
	{
		$items = [];
		foreach ($results as $result) {
			$items[] = new Result($result);
		}
		return $items;
	}
}