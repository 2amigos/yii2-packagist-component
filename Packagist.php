<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\packagist;

use Guzzle\Http\Client;
use Guzzle\Http\ClientInterface;
use Guzzle\Http\Exception\ClientErrorResponseException;
use yii\base\Component;
use yii\helpers\Json;

/**
 * Packagist
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\packagist
 */
class Packagist extends Component
{
	/**
	 * @var ClientInterface
	 */
	private $_httpClient;
	/**
	 * @var string the packagist api url
	 */
	private $_url = 'https://packagist.org';
	/**
	 * @var Response
	 */
	private $_response;

	/**
	 * @param ClientInterface $httpClient
	 */
	public function setHttpClient(ClientInterface $httpClient)
	{
		$this->_httpClient = $httpClient;
	}

	/**
	 * @return ClientInterface
	 */
	public function getHttpClient()
	{
		if ($this->_httpClient === null) {
			$this->_httpClient = new Client();
		}
		return $this->_httpClient;
	}

	/**
	 * @return Response gets the processed response from the call
	 */
	public function getResponse()
	{
		return $this->_response;
	}

	/**
	 * @param string $url sets the base url for the api
	 * @return static
	 */
	public function setUrl($url)
	{
		$this->_url = $url;
		return $this;
	}

	/**
	 * @return string the base url for the api
	 */
	public function getUrl()
	{
		return $this->_url;
	}

	/**
	 * Searches for package information. If not package information is found, please check [[Response::getIsSuccessful()]]
	 * @param string $name the package name to get information
	 * @param string $path the url path to make the api call
	 * @return $this
	 */
	public function package($name, $path = '/packages/%s.json')
	{
		$url = sprintf($this->getUrl() . $path, $name);
		$this->_response = new Response(['json' => $this->request($url)]);
		return $this;
	}

	/**
	 * Searches for all packages information. It is recommended the use of filters to narrow your search.
	 * @param array $filters the filter to apply on the call
	 * @param string $path the url path to make the api call
	 * @return $this
	 */
	public function all(array $filters = [], $path = '/packages/list.json')
	{
		$url = $this->getUrl() . $path;
		if (!empty($filters)) {
			$url .= '?' . http_build_query($filters);
		}

		$this->_response = new Response(['json' => $this->request($url)]);
		return $this;
	}

	/**
	 * Searches for packages on the packagist.org repository
	 * @param string $query the query to search
	 * @param array $filters the filters to apply on the search
	 * @param string $path the url path to make the api call
	 * @return $this
	 */
	public function search($query, array $filters = [], $path = '/search.json')
	{
		$filters['q'] = $query;
		$url = $this->getUrl() . $path . '?' . http_build_query($filters);

		$this->_response = new Response(['json' => $this->request($url)]);
		return $this;
	}

	/**
	 * Makes a request to packagist api
	 * @param $url
	 * @return \Guzzle\Http\EntityBodyInterface|string
	 */
	protected function request($url)
	{
		$response = null;
		try {
			$response = $this->getHttpClient()
				->get($url)
				->send();
		} catch (ClientErrorResponseException $e) {
			return Json::encode([
				'error' => $e->getMessage()
			]);
		}

		return $response->getBody(true);
	}

}
