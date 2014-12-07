Simple IoC Container
===========

The inversion of control container is a powerful tool for managing class dependencies. Dependency injection is a method of removing hard-coded class dependencies. Instead, the dependencies are injected at run-time, allowing for greater flexibility as dependency implementations may be swapped easily.


```php
// Usage

include 'IoC.php';

IoC::register('db', function() {
    
    return new PDO('mysql:host=localhost;dbname=test', 'user', 'pass');
});

$pdo = IoC::resolve('db');
```
