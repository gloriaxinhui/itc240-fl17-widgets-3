<?php include 'includes/config.php';?>
<?php get_header()?>

<?php
    $heros[] = '<img src="images/coulson.png" />';
    $heros[] = '<img src="images/fury.png" />';
    $heros[] = '<img src="images/hulk.png" />';
    $heros[] = '<img src="images/thor.png" />';
    $heros[] = '<img src="images/black-widow.png" />';
    $heros[] = '<img src="images/captain-america.png" />';
    $heros[] = '<img src="images/machine.png" />';
    $heros[] = '<img src="images/iron-man.png" />';
    $heros[] = '<img src="images/loki.png" />';
    $heros[] = '<img src="images/giant.png" />';
    $heros[] = '<img src="images/hawkeye.png" />';
    $config->hero = randomize($heros);

    if(isset($_GET['day']))
    {//from the querystring
        $day = $_GET['day'];
        
    }else{//from the system clock
        $day = date('l');
    }
?>

  <h3>Daily</h3>
    <p>Current contents of the variable day: <?=$day?></p>
    <p><a href="?day=Monday's Special is <b>Cappuccino</b>">Monday</a></p>
    <p><a href="?day=Tuesday's Special is <b>Green Tea Latte</b>">Tuesday</a></p>
    <p><a href="?day=Wednesday' Special is <b>Caramel Macchiato</b>">Wednesday</a></p>
    <p><a href="?day=Thursday's Special is <b>Iced Coffee</b>">Thursday</a></p>
    <p><a href="?day=Friday's Special is <b>Chai Tea Latte</b>">Friday</a></p>
    <p><a href="?day=Saturday's Special is <b>Pumpkin Spice Latte</b>">Saturday</a></p>
    <p><a href="?day=Sunday's Special is <b>Salted Caramel Mocha</b>">Sunday</a></p>
<?php get_footer()?>