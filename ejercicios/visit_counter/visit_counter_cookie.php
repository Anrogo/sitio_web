
<?php  
// Visit counter using cookies 
 
if(!isset($_COOKIE['visitCount'])){ 
    setcookie('visitCount', 1, time() + 3600 * 24);  // 1 day 
    echo "Hi, it's your <strong>first</strong> time here"; 
} else { 
    $count = ++$_COOKIE['visitCount']; 
    setcookie('visitCount', $count, time() + 3600 * 24);  // 1 day 
    echo "Welcome back!<br>You have viewed this page <strong>$count</strong> times."; 
}
?>

