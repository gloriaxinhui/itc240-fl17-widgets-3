<?php include 'includes/header.php'?>
<?php
    
    $to = 'gloriaxinhui@gmail.com';
    
if(isset($_POST["FirstName"])){//show data
    
    //clean and process the post data
    $FirstName = clean_post('FirstName');
    $LastName = clean_post('LastName');
    $Email = clean_post('Email');
    $Comments = clean_post('Comments');
    
    $subject = "Ceramics Appointment Request Form " . $FirstName . " " . $LastName . " " . date("l jS \of F Y h:i:s A");
    
    $myText = process_post();

    $headers = 'From: noreply@gloriazhang.com' . PHP_EOL .
    'Reply-To: ' . $Email . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $myText, $headers);
    
    echo '
    <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">
          <strong>Message Sent</strong>
        </h2>
        <hr class="divider">
    <p>Thank you for your information!</p>
    <p>We will get back to you within 48 hours</p>
    <p><a href="">Exit</a></p>
    ';

}else{//show form
  echo '
        <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">Contact
          <strong>Form</strong>
        </h2>
        <hr class="divider">
        <form action="" method="post">
          <div class="row">
          
            <div class="form-group col-lg-4">
              <label class="text-heading">First Name</label>
              <input type="text" name="FirstName" autofocus required placeholder="First Name" class="form-control">
            </div>
            
			<div class="form-group col-lg-4">
              <label class="text-heading">Last Name</label>
              <input type="text" name="LastName" required placeholder="Last Name" class="form-control">
            </div>
            
            <div class="form-group col-lg-4">
              <label class="text-heading">Email Address</label>
              <input type="email" name="Email" required placeholder="Enter a valid email address" class="form-control" >
            </div>

            <div class="clearfix"></div>
            
            <div class="form-group col-lg-12">
              <label class="text-heading">Comments</label>
              <textarea name="Comments" placeholder="Your thoughts are important to us." class="form-control" rows="6"></textarea>
            </div>
            
            <!-- Recaptcha -->
            <div class="form-group col-lg-4 g-recaptcha" data-sitekey="6Lfq1RwUAAAAAHAgc_QE3sekYQzmDwvMANe_dSbG"></div>
          
            <div class="form-group col-lg-12">
              <button type="submit" class="btn btn-secondary">Submit</button>
            </div>
          </div>
          
        </form>
  ';}

?>
<?php 

include 'includes/footer.php';

function clean_post($key)
{
    if(isset($_POST[$key])){
        $value = strip_tags(trim($_POST[$key]));
    }else{
        $value="";
    }
    return $value;
}

function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(", ",$_POST[$varName]) . PHP_EOL . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL . PHP_EOL;
         }
    }
    return $myReturn;
}