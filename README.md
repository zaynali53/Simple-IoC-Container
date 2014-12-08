Simple IoC Container
===========

> The inversion of control container is a powerful tool for managing class dependencies. Dependency injection is a method of removing hard-coded class dependencies. Instead, the dependencies are injected at run-time, allowing for greater flexibility as dependency implementations may be swapped easily.

#### Usage
```php
include 'IoC.php';

IoC::register('db', function() {
    
    return new \PDO('mysql:host=localhost;dbname=test', 'user', 'pass');
});

try {

    $pdo = IoC::make('db');

} catch (Exception $e) {

	echo $e->getMessage(), die();
}
```

#### Usage with Arguments
```php
include 'IoC.php';

IoC::register('db', function($args) {

	if (is_array($args)) extract($args);

    return new \PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpass);
});

try {

	$pdo = IoC::make('db', [
		'dbname' => 'test',
		'dbhost' => 'localhost',
		'dbuser' => 'root',
		'dbpass' => ''
		]);

} catch (Exception $e) {

	echo $e->getMessage(), die();
}
```
