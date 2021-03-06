<?php

namespace Tests\Subspace\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Yaml\Exception\ParseException;

class DefaultControllerTest extends WebTestCase
{
    public function testIndexPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode(), '[FAIL] Home Page is not returning a 200 response.');
        //$this->assertContains('Get Started Today', $crawler->filter('.register-form h1')->text());
    }

    public function testLocationsPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/locations');

        $this->assertEquals(200, $client->getResponse()->getStatusCode(), '[FAIL] Home Page is not returning a 200 response.');
        //$this->assertContains('Get Started Today', $crawler->filter('.register-form h1')->text());
    }

    public function testTourPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/tour');

        $this->assertEquals(200, $client->getResponse()->getStatusCode(), '[FAIL] Tour Page is not returning a 200 response.');
        //$this->assertContains('Get Started Today', $crawler->filter('.register-form h1')->text());
    }

    public function testPricingPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/pricing');

        $this->assertEquals(200, $client->getResponse()->getStatusCode(), '[FAIL] Pricing Page is not returning a 200 response.');
        //$this->assertContains('Get Started Today', $crawler->filter('.register-form h1')->text());
    }
 
    public function testForgottenpasswordPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/forgottenpassword');

        $this->assertEquals(200, $client->getResponse()->getStatusCode(), '[FAIL] Forgotten Password Page is not returning a 200 response.');
        //$this->assertContains('Get Started Today', $crawler->filter('.register-form h1')->text());
    }

    function testAllPagesExist()
    {
        //$yaml = new Yaml();
        
        try {
            //$value = Yaml::parse(file_get_contents(__DIR__.'/../../../app/config/routing.yml'));
        } 
        catch (ParseException $e) 
        {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
    }
}
