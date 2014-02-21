<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\packagist;


use yii\helpers\ArrayHelper;

/**
 * Version holds version information
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\packagist
 */
class Version extends Object
{
	/**
	 * @var string package name
	 */
	protected $name;
	/**
	 * @var string package description
	 */
	protected $description;
	/**
	 * @var string package keywords
	 */
	protected $keywords;
	/**
	 * @var string package homepage
	 */
	protected $homepage;
	/**
	 * @var string package version
	 */
	protected $version;
	/**
	 * @var string package version normalized
	 */
	protected $versionNormalized;
	/**
	 * @var string package license
	 */
	protected $license;
	/**
	 * @var Author[] authors information
	 */
	protected $authors;
	/**
	 * @var Source package version information
	 */
	protected $source;
	/**
	 * @var Dist package dist information
	 */
	protected $dist;
	/**
	 * @var string date time
	 */
	protected $time;
	/**
	 * @var array autoload information
	 */
	protected $autoload;
	/**
	 * @var array extra
	 */
	protected $extra;
	/**
	 * @var array require information
	 */
	protected $require;
	/**
	 * @var array|null require information
	 */
	protected $requireDev;
	/**
	 * @var array|null conflict information
	 */
	protected $conflict;
	/**
	 * @var array|null provide information
	 */
	protected $provide;
	/**
	 * @var array|null replace information
	 */
	protected $replace;
	/**
	 * @var string
	 */
	protected $bin;

	/**
	 * Configures certain Version object attributes prior calling parent::__construct
	 * @param array $config
	 */
	public function __construct($config = [])
	{
		$authors = ArrayHelper::getValue($config, 'authors', array());
		foreach($authors as $key => $maintainer) {
			$config['authors'][$key] = new Author($maintainer);
		}
		$source = ArrayHelper::getValue($config, 'source');
		if($source) {
			$config['source'] = new Source($source);
		}
		$dist = ArrayHelper::getValue($config, 'dist');
		if($dist) {
			$config['dist'] = new Dist($source);
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
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @return array
	 */
	public function getKeywords()
	{
		return $this->keywords;
	}

	/**
	 * @return string
	 */
	public function getHomepage()
	{
		return $this->homepage;
	}

	/**
	 * @return string
	 */
	public function getVersion()
	{
		return $this->version;
	}

	/**
	 * @return string
	 */
	public function getVersionNormalized()
	{
		return $this->versionNormalized;
	}

	/**
	 * @return string
	 */
	public function getLicense()
	{
		return $this->license;
	}

	/**
	 * @return Author[]
	 */
	public function getAuthors()
	{
		return $this->authors;
	}

	/**
	 * @return Source
	 */
	public function getSource()
	{
		return $this->source;
	}

	/**
	 * @return Dist
	 */
	public function getDist()
	{
		return $this->dist;
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
	public function getTime()
	{
		return $this->time;
	}

	/**
	 * @return array
	 */
	public function getAutoload()
	{
		return $this->autoload;
	}

	/**
	 * @return array
	 */
	public function getExtra()
	{
		return $this->extra;
	}

	/**
	 * @return array
	 */
	public function getRequire()
	{
		return $this->require;
	}

	/**
	 * @return array
	 */
	public function getRequireDev()
	{
		return $this->requireDev;
	}

	/**
	 * @return array
	 */
	public function getConflict()
	{
		return $this->conflict;
	}

	/**
	 * @return array
	 */
	public function getProvide()
	{
		return $this->provide;
	}

	/**
	 * @return array
	 */
	public function getReplace()
	{
		return $this->replace;
	}

	/**
	 * @return string
	 */
	public function getBin()
	{
		return $this->bin;
	}
} 