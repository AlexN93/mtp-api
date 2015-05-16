<?php
namespace LexxTech\MTPBundle\Tests\Controller;		
		
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
		
class TransactionControllerTest extends WebTestCase		
{
    public function testRegisterTransaction()		
    {        
        $client = static::createClient();
        $client->request(
            'POST', 
            '/registerTransaction',  
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"userId": "134256", "currencyFrom": "EUR", "currencyTo": "GBP", "amountSell": 1000, "amountBuy": 747.10, "rate": 0.7471, "timePlaced" : "24-JAN-15 10:27:44", "originatingCountry" : "FR"}'
        );
        $this->assertNotNull($client->getResponse());
        $this->assertTrue($client->getResponse()->isOk());
    }		
}