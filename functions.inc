<?php
/* Author: Brad Botteron
Date: 5/12/2020
Desc: Functions for webpage*/

function sendNotification($email, $total, $name, $phone){
    $to = "bradbotteron13@gmail.com";
    $subject = "$name your total quote!";
    $msg = "";
    $msg .= ucfirst($name) . ", thank you for accepting our quote!\n";
    $msg .= "Your total quote amount is $$total\n";
    $msg .= "Someone will be in contact with you shortly about scheduling ";
    $msg .= "an appointment to come verify your house size and start painting!\n";
    $msg .= "If your phone number is not $phone, please resubmit or send an email to \n";
    $msg .= "bradbotteron13@gmail.com\n";
    $msg .= "Again, thank you $name, for using our quote calculator!\n";
    $msg .= "Nasty disclaimer incoming:\n";
    $msg .= "Total quote stated above is subject to change. \nWe will bill actual hours ";
    $msg .= "incurred for each position as the time arrises. \nAny out of scope work is subject ";
    $msg .= "to additional charges. \nAny invoices must be paid in full and on time by the agreed ";
    $msg .= "upon date after meeting.\n";
    mail($email, $subject, $msg);
    mail($to, $subject, $msg);
}

function calculateQuote($size, $rooms, $floors, $sheen){

    $total = 0;
    $total += ($floors * 150);
    if($size == 0){ $total += 150;}
    else {
        $total += (150 * $size);
    }
    foreach($sheen as $element){
        if($element == 2){
            $total += 20;
        } else if($element == 3){
            $total += 30;
        } else if($element == 4){
            $total += 30;
        }
    }
    switch($rooms){
        case 1:
            break;
        case 2:
            $total += 50;
            break;
        case 3:
            $total += 100;
            break;
        case 4:
            $total += 150;
            break;
        case 5:
            $total += 200;
            break;
        case 6:
            $total += 250;
            break;
        case 7:
            $total += 300;
            break;
        case 8:
            $total += 350;
    }

    return $total;
}

function getSizeText($size){
    $sizeText = "";
    switch($size){
        case 0:
            $sizeText = "Less than 1200";
            break;
        case 1:
            $sizeText = "between 1200 and 1800";
            break;
        case 2:
            $sizeText = "between 1801 and 2600";
            break;
        case 3:
            $sizeText = "between 2601 and 3200";
            break;
        case 4:
            $sizeText = "more than 3200";
            break;
    }
    return $sizeText;
}

function getSheenText($room){
    $roomText = "";
    switch($room){
        case 1:
            $roomText = "Flat";
            break;
        case 2:
            $roomText = "Matte";
            break;
        case 3:
            $roomText = "Semi-Gloss";
            break;
        case 4:
            $roomText = "Satin";
            break;
        default:
            $roomText = "Error";
            break;
    }
    return $roomText;
}