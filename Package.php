<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\packagist;

use Guzzle\Http\Client;
use yii\helpers\ArrayHelper;

/**
 * Package holds package information returned by the api call
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\packagist
 */
class Package extends Result
{
	/**
	 * @var string date time -ie "2014-01-08T07:30:24+00:00"
	 */
	protected $time;
	/**
	 * @var string package type -ie "yii2-extension"
	 */
	protected $type;
	/**
	 * @var string git repository url
	 */
	protected $repository;


	/**
	 * @inheritdoc
	 */
	public function __construct($config = [])
	{
		$maintainers = ArrayHelper::getValue($config, 'maintainers', array());
		foreach($maintainers as $key => $maintainer) {
			$config['maintainers'][$key] = new Maintainer($maintainer);
		}
		$downloads = ArrayHelper::getValue($config, 'downloads', array());
		if($downloads) {
			$config['downloads'] = new Downloads($downloads);
		}
		$versions = ArrayHelper::getValue($config, 'versions', array());
		foreach($versions as $key => $version) {
			$config['versions'][$key] = new Version($version);
		}
		parent::__construct($config);
	}

	/**
	 * @return string
	 */
	public function getRepository()
	{
		return $this->repository;
	}

	/**
	 * @return string
	 */
	public function getTime()
	{
		return $this->time;
	}

	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @var array the readme information of the package
	 */
	private $_readme;

	/**
	 * Returns the readme information of the package
	 * @param string|null $username if added, basic authentication login will be applied to increment the rate limit
	 * @param string|null $password if added, basic authentication login will be applied to increment the rate limit
	 * @return mixed
	 */
	public function getReadme($username = null, $password = null)
	{
		if($this->_readme == null && $this) {
			$config = [];
			if($username && $password) {
				$config['request.options'] = array(
					'auth' => [$username, $password, 'Basic']
				);
			}
			$client = new Client(sprintf('https://api.github.com/repos/%s/readme', $this->name), $config);
			$this->_readme = $client->get()->send()->json();
		}

		return $this->_readme;
	}
} 