$(document).ready(function(){
    $("#submit-button").click(function(){
        $.ajax({  
            type: "POST",  
            url: "/app_dev.php/registerTransaction",  
            data: '{"userId": "134256", "currencyFrom": "EUR", "currencyTo": "GBP", "amountSell": 1000, "amountBuy": 747.10, "rate": 0.7471, "timePlaced" : "24-JAN-15 10:27:44", "originatingCountry" : "' + $("#select-country").val() + '"}',
            success: function(response) {
                console.log(response);              
            },
            dataType: 'json'
        }); 
    });
});