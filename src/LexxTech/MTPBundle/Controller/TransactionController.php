<?php

namespace LexxTech\MTPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LexxTech\MTPBundle\Entity\Transaction;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

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
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($transaction);
            $em->flush();
            $transaction->transmitData($params);
            return new Response('Created Transaction with id '.$transaction->getTransactionID());
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
        return new JsonResponse($transactions, 200, array(
            "Content-type" => "application/json",
            "Access-Control-Allow-Origin" => "*",
            "Access-Control-Allow-Methods" => "GET, OPTIONS",
            "Access-Control-Allow-Headers" => "origin, content-type, accept",
        ));
    }
    
    public function transactionsPerCountryAction() {
        $repository = $this->getDoctrine()->getRepository('LexxTechMTPBundle:Transaction');
        $transactions = $repository->createQueryBuilder('p')
                ->select('count(p), p.TransactionOrigin')
                ->groupBy('p.TransactionOrigin')
                ->orderBy('p.TransactionID', 'ASC')
                ->getQuery()
                ->getArrayResult();
        return new JsonResponse($transactions, 200, array(
            "Content-type" => "application/json",
            "Access-Control-Allow-Origin" => "*",
            "Access-Control-Allow-Methods" => "GET, OPTIONS",
            "Access-Control-Allow-Headers" => "origin, content-type, accept",
        ));
    }
    
    public function indexAction()
    {
        return $this->render('LexxTechMTPBundle:Default:index.html.twig');
    }
    
}
