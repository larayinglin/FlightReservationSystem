<!DOCTYPE html>
<html>
<head>
<title>PHP exercise</title>
</head>
<body>
  
   <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      What is the main difference between JavaScript and PHP? <br/> 
      <textarea rows="5" cols="20" name="ans1"></textarea>
      <br/>      
      <input type="submit" />
   </form>

<?php

// form handler and form -- same file -- sometimes refer to as "sticky form" 

$ans1 = $feedback = NULL;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
   if (empty($_POST['ans1']))
      echo "<font color='red'><i>Please enter your answer</i></font> <br />";
   else 
   {   	
      $ans1 = trim($_POST['ans1']);      // trim() remove leading space
      
      // check answer (may send data to another web component to check or check here)
      // if correct, display "Correct!"      
      $feedback = "<font color='green' size=+1>Correct!</font>";
   }      
}



$next_question = "question2.php";  // target component to process the request

if ($feedback != NULL)
{
   echo "<hr/>";
   echo "You answered <br/> <i>  $ans1 </i>  <br/> ";
   echo $feedback . "<br/>";
   echo "<a href= $next_question>Next question</a>";   
}

?>
</body>
</html>
