<?php 
        $db = mysql_connect('monsoongamescom.ipagemysql.com', 'monsoongames', 'WX!er0*999') or die('Could not connect: ' . mysql_error()); 
        mysql_select_db('match_results') or die('Could not select database');
 
        // Strings must be escaped to prevent SQL injection attack. 
        $player= mysql_real_escape_string($_GET['player'], $db); 
        $opponent= mysql_real_escape_string($_GET['opponent'], $db); 
        $difficulty= mysql_real_escape_string($_GET['difficulty'], $db); 
        $result= mysql_real_escape_string($_GET['result'], $db); 
        $playerKills= mysql_real_escape_string($_GET['playerKills'], $db); 
        $enemyKills= mysql_real_escape_string($_GET['enemyKills'], $db); 
        $playerLevel= mysql_real_escape_string($_GET['playerLevel'], $db); 
        $enemyLevel= mysql_real_escape_string($_GET['enemyLevel'], $db); 
        $length= mysql_real_escape_string($_GET['length'], $db); 
        $hash = $_GET['hash']; 
 
        $secretKey="xwd3DD28Gi!"; # Change this value to match the value stored in the client javascript below 

        $real_hash = md5($player. $opponent. $difficulty. $result. $playerKills. $enemyKills. 
$playerLevel. $enemyLevel. $length. $secretKey); 
        if($real_hash == $hash) { 
            // Send variables for the MySQL database class. 
            $query = "INSERT INTO results VALUES (NULL, '$player', '$opponent', '$difficulty', '$result', '$playerKills', '$enemyKills', '$playerLevel', '$enemyLevel', '$length');"; 
            $qResult= mysql_query($query) or die('Query failed: ' . mysql_error()); 
        } 

?>