<?php
/* config.php
stores configuration information for our web application
*/

//prevents header already sent errors
ob_start();

define('DEBUG',true); #we want to see all errors

//create config object
$config = new stdClass;

//prevents date errors
date_default_timezone_set('America/Los_Angeles');

// add include file references here:
include 'credentials.php'; //database credentials here
include 'common.php'; //favorite functions here

// create config object
$config = new stdClass;

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//START NEW THEME STUFF
$sub_folder = 'widgets';//change to 'widgets' or 'sprockets' etc.

//add subfolder, in this case 'fidgets' if not loaded to root:
$config->physical_path = $_SERVER["DOCUMENT_ROOT"] . '/' . $sub_folder;
$config->virtual_path = 'http://' . $_SERVER["HTTP_HOST"] . '/' . $sub_folder;
$config->theme = 'BusinessCasual';//sub folder to themes

//END NEW THEME STUFF

//web page defaults
$config->title = THIS_PAGE;
$config->banner = 'Widgets';
$config->loadhead = ''; //place items in <head> element
$config->loadfoot = ''; //place to store items just before body tag
$config->hero = ''; // will store random superhero icon

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
        
    case 'coffee_list.php': 
        $config->title = "Widgets Coffee";
        $config->banner = "Widgets Coffee";
    break;
}

//START NEW THEME STUFF
//creates theme virtual path for theme assets, JS, CSS, images
$config->theme_virtual = $config->virtual_path . '/themes/' . $config->theme . '/';
//END NEW THEME STUFF

?>