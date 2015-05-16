<?php
namespace LexxTech\MTPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank(
     *      message="TransactionUserID cannot be empty"
     * )
     * @Assert\Range(
     *      min = 1,
     *      minMessage = "Min TransactionUserID is {{ limit }}"
     * )
     */
    protected $TransactionUserID;

    /**
     * @ORM\Column(type="string", length=5)
     * @Assert\NotBlank(
     *      message="TransactionCurrencyFrom cannot be empty"
     * )
     */
    protected $TransactionCurrencyFrom;
    
    /**
     * @ORM\Column(type="string", length=5)
     * @Assert\NotBlank(
     *      message="TransactionCurrencyTo cannot be empty"
     * )
     */
    protected $TransactionCurrencyTo;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\NotBlank(
     *      message="TransactionAmountSell cannot be empty"
     * )
     * @Assert\Range(
     *      min = 0.01,
     *      minMessage = "Min TransactionAmountSell is {{ limit }}"
     * )
     */
    protected $TransactionAmountSell;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\NotBlank(
     *      message="TransactionAmountBuy cannot be empty"
     * )
     * @Assert\Range(
     *      min = 0.01,
     *      minMessage = "Min TransactionAmountBuy is {{ limit }}"
     * )
     */
    protected $TransactionAmountBuy;
            
    /**
     * @ORM\Column(type="decimal", scale=5)
     * @Assert\NotBlank(
     *      message="TransactionRate cannot be empty"
     * )
     */
    protected $TransactionRate;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank(
     *      message="TransactionTime cannot be empty"
     * )
     */
    protected $TransactionTime;
    
    /**
     * @ORM\Column(type="string", length=5)
     * @Assert\NotBlank(
     *      message="TransactionOrigin cannot be empty"
     * )
     */
    protected $TransactionOrigin;
    
    /**
     * @Assert\True(message = "Incorrect currency conversion")
     */
    public function isConversionCorerct()
    {
        return $this->getTransactionAmountBuy() == $this->getTransactionAmountSell() * $this->getTransactionRate();
    }
    
    public function getTransactionID() {
        return $this->TransactionID;
    }
    
    public function getTransactionUserID() {
        return $this->TransactionUserID;
    }

    public function setTransactionUserID($TransactionUserID) {
        $this->TransactionUserID = $TransactionUserID;
    }
    
    public function getTransactionCurrencyFrom() {
        return $this->TransactionCurrencyFrom;
    }

    public function getTransactionCurrencyTo() {
        return $this->TransactionCurrencyTo;
    }

    public function getTransactionAmountSell() {
        return $this->TransactionAmountSell;
    }

    public function getTransactionAmountBuy() {
        return $this->TransactionAmountBuy;
    }

    public function getTransactionRate() {
        return $this->TransactionRate;
    }

    public function getTransactionTime() {
        return $this->TransactionTime;
    }

    public function getTransactionOrigin() {
        return $this->TransactionOrigin;
    }

    public function setTransactionCurrencyFrom($TransactionCurrencyFrom) {
        $this->TransactionCurrencyFrom = $TransactionCurrencyFrom;
    }

    public function setTransactionCurrencyTo($TransactionCurrencyTo) {
        $this->TransactionCurrencyTo = $TransactionCurrencyTo;
    }

    public function setTransactionAmountSell($TransactionAmountSell) {
        $this->TransactionAmountSell = $TransactionAmountSell;
    }

    public function setTransactionAmountBuy($TransactionAmountBuy) {
        $this->TransactionAmountBuy = $TransactionAmountBuy;
    }

    public function setTransactionRate($TransactionRate) {
        $this->TransactionRate = $TransactionRate;
    }

    public function setTransactionTime($TransactionTime) {
        $this->TransactionTime = $TransactionTime;
    }

    public function setTransactionOrigin($TransactionOrigin) {
        $this->TransactionOrigin = $TransactionOrigin;
    }
}