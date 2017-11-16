<?php
/* config.php
stores configuration information for our web application
*/

//prevents header already sent errors
ob_start();

define('DEBUG',FALSE); #we want to see all errors

//create config object
$config = new stdClass;

//prevents date errors
date_default_timezone_set('America/Los_Angeles');

// add include file references here:
include 'credentials.php'; //database credentials here
//include 'common.php'; //favorite functions here

// create config object
$config = new stdClass;

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//web page defaults
$config->title = THIS_PAGE;
$config->banner = 'My Cool Banner';

switch(THIS_PAGE){
        
    case 'index.php': 
        $config->title = "Home Page";
        $config->banner = "Widgets Home";
    break;
    
    case 'customer.php': 
        $config->title = "Widgets Customer";
        $config->banner = "Widgets Customer";
    break;
        
    case 'appointment.php': 
        $config->title = "Widgets Appointment";
        $config->banner = "Widgets Appointment";
    break;
        
    case 'contact.php': 
        $config->title = "Contact Widgets";
        $config->banner = "Contact Widgets";
    break;
    
    case 'daily.php': 
        $config->title = "Widgets Daily";
        $config->banner = "Widgets Daily";
    break;
}

/*
switch(THIS_PAGE){
        
    case 'index.php': 
        $title = "Business Casual";
        break;

    case 'about.php': 
        $title = "About Business Casual";
        break;
        
    case 'appointment.php': 
        $title = "Appointment";
        break;
        
    case 'contact.php': 
        $title = "Contact";
        break;
        
    default:
        $title = THIS_PAGE;
        $logo = "";
}

*/




?>