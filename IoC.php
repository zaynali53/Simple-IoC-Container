<?php 
/**
 * IoC Container (https://github.com/zaynali53/Simple-IoC-Container)
 * @author  Zayn Ali (https://github.com/zaynali53)
 * @link    Facebook (https://facebook.com/zaynali53)
 */

abstract class IoC {

    /**
     * Container for registered callbacks
     * @var mixed
     */
    protected static $registry = [];

    /**
     * Add a new resolver to the registry array.
     * @param  string $name 	 (The key)
     * @param  object $callback  (Closure that creates instance)
     * @return void
     */
    public static function register($name, callable $callback)
    {
        self::$registry[$name] = $callback;
    }

    /**
     * Create the instance
     * @param  string $name (The key)
     * @return mixed
     */
    public static function make($name, $args = NULL)
    {
        if (self::isRegistered($name)) {

            $name = self::$registry[$name];

            if ( ! is_null($args)) return $name($args);

            return $name();
        }

        throw new \Exception("Error: Key \"$name\" is not registered! \n");
    }

    /**
     * Determine whether the key is registered
     * @param  string $name (The key)
     * @return bool         (Whether the key exists or not)
     */
    public static function isRegistered($name)
    {
        return array_key_exists($name, self::$registry);
    }

}
