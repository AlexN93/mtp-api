<?php
namespace LexxTech\MTPBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use LexxTech\MTPBundle\Entity\Transaction;
		
class TransactionTest extends WebTestCase		
{
    private function getKernel()
    {
        $kernel = $this->createKernel();
        $kernel->boot();

        return $kernel;
    }
    
    public function testEmptyObject()
    {
        $kernel = $this->getKernel();
        $validator = $kernel->getContainer()->get('validator');
        $errors = $validator->validate(new Transaction);

        $this->assertEquals(8, $errors->count());
        $this->assertEquals('TransactionUserID cannot be empty', $errors[0]->getMessage());
        $this->assertEquals('TransactionCurrencyFrom cannot be empty', $errors[1]->getMessage());
        $this->assertEquals('TransactionCurrencyTo cannot be empty', $errors[2]->getMessage());
        $this->assertEquals('TransactionAmountSell cannot be empty', $errors[3]->getMessage());
        $this->assertEquals('TransactionAmountBuy cannot be empty', $errors[4]->getMessage());
        $this->assertEquals('TransactionRate cannot be empty', $errors[5]->getMessage());
        $this->assertEquals('TransactionTime cannot be empty', $errors[6]->getMessage());
        $this->assertEquals('TransactionOrigin cannot be empty', $errors[7]->getMessage());
    }

    public function testLimits()
    {
        $kernel = $this->getKernel();
        $validator = $kernel->getContainer()->get('validator');
        $transaction = new Transaction();
        $transaction->setTransactionUserID(0);
        $transaction->setTransactionCurrencyFrom("EUR");
        $transaction->setTransactionCurrencyTo("GBP");
        $transaction->setTransactionAmountSell(0.001);
        $transaction->setTransactionAmountBuy(0.001);
        $transaction->setTransactionRate(1.72);
        $transaction->setTransactionTime("24-JAN-15 10:27:44");
        $transaction->setTransactionOrigin("FR");
        $errors = $validator->validate($transaction);
        $this->assertEquals(4, $errors->count());
        $this->assertEquals('Min TransactionUserID is 1', $errors[0]->getMessage());
        $this->assertEquals('Min TransactionAmountSell is 0.01', $errors[1]->getMessage());
        $this->assertEquals('Min TransactionAmountBuy is 0.01', $errors[2]->getMessage());
        $this->assertEquals('Incorrect currency conversion', $errors[3]->getMessage());
    }
    
    public function testValidObject()
    {
        $kernel = $this->getKernel();
        $validator = $kernel->getContainer()->get('validator');
        $transaction = new Transaction();
        $transaction->setTransactionUserID(134256);
        $transaction->setTransactionCurrencyFrom("EUR");
        $transaction->setTransactionCurrencyTo("GBP");
        $transaction->setTransactionAmountSell(1000);
        $transaction->setTransactionAmountBuy(747.10);
        $transaction->setTransactionRate(0.7471);
        $transaction->setTransactionTime("24-JAN-15 10:27:44");
        $transaction->setTransactionOrigin("FR");
        $errors = $validator->validate($transaction);
        $this->assertEquals(0, $errors->count());
    }
}