<?php
namespace App\Test;

use App\Test\AbstractWebDriverTestCase;
use Facebook\WebDriver\WebDriverBy;


class ExampleBrowserTest extends AbstractWebDriverTestCase
{
    public function testGoogleToGmail() {
        
        $this->webDriver->get('http://www.google.co.jp');
        $this->assertEquals('Google', $this->webDriver->getTitle());
        $this->saveScreenshot();
        
        $linkButton = $this->webDriver->findElement(WebDriverBy::cssSelector('div.gb_fa a.gb_ga'));
        $linkButton->click();
        $this->saveScreenshot();

        $gmail = $this->webDriver->findElement(WebDriverBy::id('gb23'));
        $gmail->click();
        $this->saveScreenshot();

        $this->assertContains('https://mail.google.com', $this->webDriver->getCurrentURL());
    }

}