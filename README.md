# php-browserstack-example

## setup

- git clone

```bash
$ git clone git@github.com:imunew/php-browserstack-example.git
```

- composer install

```bash
$ composer install
```

- Set Your BrowserStack Automate Username and Access Key.

```php
// tests/AbstractWebDriverTestCase.php
abstract class AbstractWebDriverTestCase extends PHPUnit_Framework_TestCase
{
    const BROWSERSTACK_USER = 'Your BrowserStack Username';
    const BROWSERSTACK_KEY = 'Your BrowserStack Access Key';
```

- Run unit test

```bash
$ vendor/bin/phpunit -c ./phpunit.xml.dist tests/ExampleBrowserTest.php
```
