<?php
date_default_timezone_set("Asia/Manila");

$food = $_POST['order'];
$quantity = $_POST['foodQuantity'];
$cash = $_POST['cash'];
    $date = date("m/d/y h:i:s a");

$foodPrice = 0;

switch($food){
case 'burger':
$foodPrice = 50;
break;
case 'fries':
$foodPrice = 75;
break;
case 'steak':
$foodPrice = 100;
break;
}

$totalCost = $foodPrice * $quantity;
$moneyChange = $cash - $totalCost;
    
    $missingCash = $moneyChange - $moneyChange - $moneyChange;

    $successHTML = <<< EOT
        <html>
            <head>
                <title>Order System</title>
                <style>
                    td {text-align: center; padding: 10px;}
                </style>
            </head>
            <body>

                <div>
                    <h1 style="text-align: center;">RECEIPT</h1>
                    <table style="text-align: left; font-size: 30px">
                        <tr>
                            <th>Total price:</th>
                            <td>$totalCost</td>
                        </tr>
                        <tr>
                            <th>You Paid:</th>
                            <td>$cash</td>
                        </tr>
                        <tr>
                            <th>CHANGE:</th>
                            <td>$moneyChange</td>
                        </tr>
                    </table>
                    <hr>
                    <h3 style:"font-size:30px"><i>$date</i></h3>
                    <hr>
                </div>
                <br>
            </body>
        </html>
    EOT;

    $failHTML = <<< EOT
        <html>
            <head>
                <title>Order System</title>
            </head>
            <body>
                <?php session_start(); ?>
                
                <div">
                    <h2 style="text-align: center; font-size: 30px"> 
                        Sorry, balance not enough<br>
                    </h2>
                </div>
                <br>
            </body>
        </html>
    EOT;

if($moneyChange >= 0){
        echo $successHTML;
}else{
        echo $failHTML;
}

?>