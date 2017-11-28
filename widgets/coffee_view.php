<?php
//coffee_view.php - shows details of a single customer
?>
<?php include 'includes/config.php';?>
<?php get_header()?>
<?php

//process querystring here
if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security purposes
    $id = (int)$_GET['id'];
}else{//redirect to safe page
    header('Location:coffee_list.php');
}


$sql = "select * from Cafe where CoffeeID = $id";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        $ItemName = stripslashes($row['ItemName']);
        $HotOrCold = stripslashes($row['HotOrCold']);
        $Espresso = stripslashes($row['Espresso']);
        $title = "Title Page for " . $ItemName;
        $pageID = $ItemName;
        $Feedback = '';//no feedback necessary
    }    

}else{//inform there are no records
    $Feedback = '<p>This Coffee does not exist</p>';
}

?>

<h1><?=$pageID?></h1>
<?php
    
    
if($Feedback == '')
{//data exists, show it

    echo '<p>';
    echo 'ItemName: <b>' . $ItemName . '</b> ';
    echo 'HotOrCold: <b>' . $HotOrCold . '</b> ';
    echo 'Espresso: <b>' . $Espresso . '</b> ';
    
    echo '<img src="uploads/coffee' . $id . '.jpg" />';
    
    echo '</p>'; 
}else{//warn user no data
    echo $Feedback;
}    

echo '<p><a href="coffee_list.php">Go Back</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php get_footer()?>