##MTP API

This repo contains the source code of MTP API <br>
Author: Aleksandar Nikolov <br>
Deployed: https://mtp-api.herokuapp.com/ <br>
Data of transactions can be posted to https://mtp-api.herokuapp.com/registerTransaction and will be written in the database and transmitted to [MTP Web App](https://mtp-webapp.herokuapp.com/) <br>

##Tech Stack:
+ PHP(Symfony 2.6)
+ MySQL db
+ Elephant IO

##API spec:
+ POST :  /registerTransaction
```
Body request : 
{"userId": "134256", "currencyFrom": "EUR", "currencyTo": "GBP", "amountSell": 1000, "amountBuy": 747.10, "rate": 0.7471, "timePlaced" : "24-JAN-15 10:27:44", "originatingCountry" : "FR"}
```

If everything goes alright, it will return <br>
```
Created Transaction with id (someid)
```
And transmit the data to the [MTP Web App](https://mtp-webapp.herokuapp.com/) front end. <br>

+ GET: /transactionsPerCountry <br>
```
[
    {
        "TransactionCount": "15",
        "TransactionOrigin": "FR"
    },
    {
        "TransactionCount": "3",
        "TransactionOrigin": "US"
    },
    {
        "TransactionCount": "5",
        "TransactionOrigin": "RU"
    }
]
```
+ GET: /listTransactions/country <br>
```
[
    {
        "TransactionID": 6,
        "TransactionUserID": 134256,
        "TransactionCurrencyFrom": "EUR",
        "TransactionCurrencyTo": "GBP",
        "TransactionAmountSell": "1000.00",
        "TransactionAmountBuy": "747.10",
        "TransactionRate": "0.74710",
        "TransactionTime": {
            "date": "2015-01-24 10:27:44",
            "timezone_type": 3,
            "timezone": "Europe/Berlin"
        },
        "TransactionOrigin": "BG"
    },
    {
        "TransactionID": 30,
        "TransactionUserID": 134256,
        "TransactionCurrencyFrom": "EUR",
        "TransactionCurrencyTo": "GBP",
        "TransactionAmountSell": "1000.00",
        "TransactionAmountBuy": "747.10",
        "TransactionRate": "0.74710",
        "TransactionTime": {
            "date": "2015-01-24 10:27:44",
            "timezone_type": 3,
            "timezone": "Europe/Berlin"
        },
        "TransactionOrigin": "BG"
    }
]
```

##Getting started:
To run this server, you will need: <br>
1. You will need Apache web server and MySQL db installed <br>
2. Installing through terminal <br>
```
$ git clone https://github.com/AlexN93/mtp-api.git
$ composer install
$ php app/console doctrine:schema:update --force
```

## Unit test

Sometime in the future when I've time to write them :)