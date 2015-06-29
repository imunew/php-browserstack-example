<?php
namespace App\Test;

use PHPUnit_Framework_TestCase;
use DateTime;
use Facebook\WebDriver\Remote\RemoteWebDriver;


abstract class AbstractWebDriverTestCase extends PHPUnit_Framework_TestCase
{
    const BROWSERSTACK_USER = 'Your BrowserStack Username';
    const BROWSERSTACK_KEY = 'Your BrowserStack Access Key';
    
    /** @var RemoteWebDriver */
    protected $webDriver;

    protected function setUp() {
        
        parent::setUp();
        
        $this->webDriver = $this->createWebDriver();
    }

    protected function tearDown() {
        
        parent::tearDown();
        
        $this->webDriver->quit();
    }

    /**
     * createWebDriver
     * @return RemoteWebDriver
     */
    protected function createWebDriver() {
        
        $url = 'http://'. self::BROWSERSTACK_USER. ':'. self::BROWSERSTACK_KEY. '@hub.browserstack.com/wd/hub';
        return RemoteWebDriver::create($url, [
            'browser' => "IE",
            'browser_version' => "9.0",
            'os' => "Windows",
            'os_version' => "7",
            'browserstack.debug' => "true",
            'acceptSslCerts' => "true"
        ]);
    }
    
    protected function saveScreenshot() {
        
        $screenshotsPath = $this->buildScreenshotsPath();
        $directory = dirname($screenshotsPath);
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        
        file_put_contents($screenshotsPath, $this->webDriver->takeScreenshot());
    }
    
    private function buildScreenshotsPath() {
        
        $now = new DateTime();
        
        return sprintf('%s/%s/%s.png', 
                realpath(__DIR__.'/../screenshots'), 
                $now->format('Ymd'), 
                $now->format('His'));
    }

}