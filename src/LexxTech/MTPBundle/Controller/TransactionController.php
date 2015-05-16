<?php

namespace LexxTech\MTPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LexxTech\MTPBundle\Entity\Transaction;
use Symfony\Component\HttpFoundation\JsonResponse;
use ElephantIO\Client,
    ElephantIO\Engine\SocketIO\Version1X;

class TransactionController extends Controller
{    
    public function registerTransactionAction()
    {
        $data = $this->get("request")->getContent();
        if(!empty($data)) {
            $params = json_decode($data, true);
            $transaction = new Transaction();
            $transaction->setTransactionUserID($params['userId']);
            $transaction->setTransactionCurrencyFrom($params['currencyFrom']);
            $transaction->setTransactionCurrencyTo($params['currencyTo']);
            $transaction->setTransactionAmountSell($params['amountSell']);
            $transaction->setTransactionAmountBuy($params['amountBuy']);
            $transaction->setTransactionRate($params['rate']);
            $date = date("Y-m-d H:i:s", strtotime($params['timePlaced']));
            $transaction->setTransactionTime(new \DateTime($date));
            $transaction->setTransactionOrigin($params['originatingCountry']);
            
            $validator = $this->get('validator');
            $errors = $validator->validate($transaction);
            if (count($errors) > 0) {
                $errorsString = (string) $errors;
                return new JsonResponse(array('message' => $errorsString), 200, $this->getHeaders());
            }
            else {
                $em = $this->getDoctrine()->getManager();
                $em->persist($transaction);
                $em->flush();
                $this->transmitData($params);
                return new JsonResponse(array('message' => 'Created Transaction with id '.$transaction->getTransactionID()), 200, $this->getHeaders());
            }
        }
        else {
            return new JsonResponse(array('message' => 'empty data'), 200, $this->getHeaders());
        }
    }
    
    public function listTransactionsAction($country) {
        $repository = $this->getDoctrine()->getRepository('LexxTechMTPBundle:Transaction');
        
        if($country) {
            $transactions = $repository->createQueryBuilder('p')
                ->where('p.TransactionOrigin = :origin')
                ->setParameter('origin', $country)
                ->getQuery()
                ->getArrayResult();
        }
        else {
            $transactions = $repository->createQueryBuilder('q')
                ->getQuery()
                ->getArrayResult();
        }
        return new JsonResponse($transactions, 200, $this->getHeaders());
    }
    
    public function transactionsPerCountryAction() {
        $repository = $this->getDoctrine()->getRepository('LexxTechMTPBundle:Transaction');
        $transactions = $repository->createQueryBuilder('p')
                ->select('count(p) AS TransactionCount, p.TransactionOrigin')
                ->groupBy('p.TransactionOrigin')
                ->orderBy('p.TransactionID', 'ASC')
                ->getQuery()
                ->getArrayResult();
        return new JsonResponse($transactions, 200, $this->getHeaders());
    }
    
    public function createAction()
    {
        return $this->render('LexxTechMTPBundle:Default:create.html.twig');
    }
    
    public function welcomeAction()
    {
        return $this->render('LexxTechMTPBundle:Default:welcome.html.twig');
    }
    
    private static function getHeaders()
    {
        return array(
            "Content-type" => "application/json",
            "Access-Control-Allow-Origin" => "*",
            "Access-Control-Allow-Methods" => "POST, GET, OPTIONS",
            "Access-Control-Allow-Headers" => "origin, content-type, accept",
        );
    }
    
    private static function transmitData($params) {
        $client = new Client(new Version1X('https://mtp-webapp.herokuapp.com'));
        $client->initialize();
        $client->emit('send transaction', $params);
        $client->close();
    }
}
