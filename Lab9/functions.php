<?php
function voter($candidate_number)
{
    $voters = [];
    
   
    $f = fopen("voters.txt", "r+");
    
    if ($f === false) {
        
        die("Unable to open file!");
    }
    
   
    while (!feof($f)) {
        $line = fgets($f);
        
        
        if (empty($line)) continue;
        
        
        $format = explode("\t", $line);
        
        
        $voters[$format[0]] = (int) $format[1];
    }
   

    
    fclose($f);

    if (isset($voters[$candidate_number])) {
        $voters[$candidate_number]++;
    } else {
        $voters[$candidate_number] = 1; 
    }
    
    $f = fopen("voters.txt", "w");
    
    if ($f === false) {
        die("Unable to open file for writing!");
    }
    
    
    foreach ($voters as $key => $votes) {
        fwrite($f, $key . "\t" . $votes . "\n");
    }
    
    
    fclose($f);

    
    $max_votes = max($voters);
    $max_candidate = array_search($max_votes, $voters);
    
    return $max_candidate;
}

?>
