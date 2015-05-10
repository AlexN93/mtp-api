<?php
namespace LexxTech\MTPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ElephantIO\Client,
    ElephantIO\Engine\SocketIO\Version1X;

/**
 * @ORM\Entity
 * @ORM\Table(name="Transaction")
 */
class Transaction
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $TransactionID;

    /**
     * @ORM\Column(type="integer", length=11)
     * @Assert\NotBlank()
     */
    protected $TransactionUserID;

    /**
     * @ORM\Column(type="string", length=5)
     * @Assert\NotBlank()
     */
    protected $TransactionCurrencyFrom;
    
    /**
     * @ORM\Column(type="string", length=5)
     * @Assert\NotBlank()
     */
    protected $TransactionCurrencyTo;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\NotBlank()
     */
    protected $TransactionAmountSell;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\NotBlank()
     */
    protected $TransactionAmountBuy;
            
    /**
     * @ORM\Column(type="decimal", scale=5)
     * @Assert\NotBlank()
     */
    protected $TransactionRate;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank()
     */
    protected $TransactionTime;
    
    /**
     * @ORM\Column(type="string", length=5)
     * @Assert\NotBlank()
     */
    protected $TransactionOrigin;
    
    function getTransactionID() {
        return $this->TransactionID;
    }
    
    public function getTransactionUserID() {
        return $this->TransactionUserID;
    }

    public function setTransactionUserID($TransactionUserID) {
        $this->TransactionUserID = $TransactionUserID;
    }
    
    function getTransactionCurrencyFrom() {
        return $this->TransactionCurrencyFrom;
    }

    function getTransactionCurrencyTo() {
        return $this->TransactionCurrencyTo;
    }

    function getTransactionAmountSell() {
        return $this->TransactionAmountSell;
    }

    function getTransactionAmountBuy() {
        return $this->TransactionAmountBuy;
    }

    function getTransactionRate() {
        return $this->TransactionRate;
    }

    function getTransactionTime() {
        return $this->TransactionTime;
    }

    function getTransactionOrigin() {
        return $this->TransactionOrigin;
    }

    function setTransactionCurrencyFrom($TransactionCurrencyFrom) {
        $this->TransactionCurrencyFrom = $TransactionCurrencyFrom;
    }

    function setTransactionCurrencyTo($TransactionCurrencyTo) {
        $this->TransactionCurrencyTo = $TransactionCurrencyTo;
    }

    function setTransactionAmountSell($TransactionAmountSell) {
        $this->TransactionAmountSell = $TransactionAmountSell;
    }

    function setTransactionAmountBuy($TransactionAmountBuy) {
        $this->TransactionAmountBuy = $TransactionAmountBuy;
    }

    function setTransactionRate($TransactionRate) {
        $this->TransactionRate = $TransactionRate;
    }

    function setTransactionTime($TransactionTime) {
        $this->TransactionTime = $TransactionTime;
    }

    function setTransactionOrigin($TransactionOrigin) {
        $this->TransactionOrigin = $TransactionOrigin;
    }
    
    function transmitData($params) {
        $client = new Client(new Version1X('https://mtp-webapp.herokuapp.com'));
        try {
            $client->initialize();
            $client->emit('send transaction', $params);
            $client->close();
        }
        catch (ServerConnectionFailureException $e) {
            echo 'Server Connection Failure!!';
        }
    }
}