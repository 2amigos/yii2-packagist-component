<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\packagist;


use yii\base\UnknownPropertyException;
use yii\helpers\Inflector;

/**
 * Object base class where results objects extend from
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\packagist
 */
class Object
{
	/**
	 * Constructor.
	 * The default implementation does two things:
	 *
	 * - Initializes the object with the given configuration `$config`.
	 * - Call [[init()]].
	 *
	 * If this method is overridden in a child class, it is recommended that
	 *
	 * - the last parameter of the constructor is a configuration array, like `$config` here.
	 * - call the parent implementation at the end of the constructor.
	 *
	 * @param array $config name-value pairs that will be used to initialize the object properties
	 */
	public function __construct($config = [])
	{
		if (!empty($config)) {
			foreach ($config as $name => $value) {
				$name = Inflector::variablize($name);
				$this->$name = $value;
			}
		}
	}

	/**
	 * Returns the value of an object property.
	 *
	 * Do not call this method directly as it is a PHP magic method that
	 * will be implicitly called when executing `$value = $object->property;`.
	 * @param string $name the property name
	 * @return mixed the property value
	 * @throws UnknownPropertyException if the property is not defined
	 */
	public function __get($name)
	{
		$getter = 'get' . $name;
		if (method_exists($this, $getter)) {
			return $this->$getter();
		} else {
			throw new UnknownPropertyException('Getting unknown property: ' . get_class($this) . '::' . $name);
		}
	}
} 