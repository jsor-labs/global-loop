Global Loop
=============

A global event loop for [ReactPHP](http://reactphp.org).

Installation
------------

Install the latest version with [Composer](https://getcomposer.org).

```bash
composer require jsor/global-loop
```

Check the [Packagist page](https://packagist.org/packages/jsor/global-loop) 
for all available versions.

Usage
-----

Typical applications use a single event loop. ReactPHP requires that you pass
the loop instance around, eg. as argument to functions and class constructors.

This library allows to use a single event loop instance from everywhere by
providing static global accessors.

The only requirement is to call the static `Jsor\GlobalLoop\Loop::run()` at the
end of your program.

```php
<?php

// Application runs here

Jsor\GlobalLoop\Loop::run();
```

You can then access the global loop instance from from inside your application
code by calling `Jsor\GlobalLoop\Loop::get()`.

The default loop implementation is created using 
`React\EventLoop\Factory::create()` which picks the best available loop
implementation.

If you want to use a specific or custom loop implementation, you can set it with
`Jsor\GlobalLoop\Loop::set()` at the beginning of your program.

```php
<?php

Jsor\GlobalLoop\Loop::set(new MyLoopImplementation());

// Application runs here

Jsor\GlobalLoop\Loop::run();
```

License
-------

Copyright (c) 2017 Jan Sorgalla. 
Released under the [MIT License](LICENSE).
