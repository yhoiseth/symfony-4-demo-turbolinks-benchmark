Turbolinks benchmark with Symfony Demo Application
==================================================

The "Symfony Demo Application" is a reference application created to show how
to develop Symfony applications following the recommended best practices.

Requirements
------------

  * PHP 7.1.3 or higher;
  * PDO-SQLite PHP extension enabled;
  * and the [usual Symfony application requirements][1].

Installation
------------

Clone the repository and execute this command to install the project:

```bash
$ composer install
```

Usage
-----

There's no need to configure anything to run the application. Just execute this
command to run the built-in web server and access the application in your
browser at <http://localhost:8000>:

```bash
$ cd symfony-demo/
$ php bin/console server:run
```

Alternatively, you can [configure a fully-featured web server][2] like Nginx
or Apache to run the application.

Tests
-----

Execute this command to run tests:

```bash
$ cd symfony-demo/
$ ./vendor/bin/simple-phpunit
```

Benchmark Turbolinks
--------------------

1. In one tab, `yarn run encore dev --watch`.
2. In another, `codecept run`.
3. Remove `require('turbolinks').start();` from `assets/js/app.js`.
4. `codecept run`.
5. Compare times spent.

[1]: https://symfony.com/doc/current/reference/requirements.html
[2]: https://symfony.com/doc/current/cookbook/configuration/web_server_configuration.html
