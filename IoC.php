<?php 

class IoC {

    protected static $registry = array();
 
    /**
     * Add a new resolver to the registry array.
     * @param   string  $name       (The key)
     * @param   object  $closure    (Closure that creates instance)
     * @return  void
     */
    public static function register($name, callable $closure)
    {
        static::$registry[$name] = $closure;
    }
 
    /**
     * Create the instance
     * @param   string  $name   (The key)
     * @return  mixed
     */
    public static function make($name)
    {
        if ( static::registered($name) )
        {
            $name = static::$registry[$name];
            return $name();
        }
 
        throw new Exception("$name isn't registered");
    }
 
    /**
     * Determine whether the key is registered
     * @param   string  $name   (The key)
     * @return  bool            (Whether the key exists or not)
     */
    public static function registered($name)
    {
        return array_key_exists($name, static::$registry);
    }
}
