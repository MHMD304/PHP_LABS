<?php
/**
 * Reads users.txt file and returns an associative array
 * 
 * @param string $filename Path to the users.txt file
 * @return array|false Associative array or false on failure
 */
function fich2Tab($filename) {
    // Check if file exists
    if (!file_exists($filename)) {
        return false;
    }
    
    // Read the file
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $result = [];
    
    // Process each line
    foreach ($lines as $line) {
        // Split line by the first space
        $parts = explode(" ", $line, 2);
        if (count($parts) == 2) {
            $identifier = trim($parts[0]);
            $data = trim($parts[1]);
            
            // Split the second part into password and status
            $userData = explode(" ", $data, 2);
            if (count($userData) == 2) {
                $result[$identifier] = [
                    'password' => trim($userData[0]),
                    'status' => trim($userData[1])
                ];
            } else {
                $result[$identifier] = [
                    'password' => trim($userData[0]),
                    'status' => ''
                ];
            }
        }
    }
    
    return $result;
}

/**
 * Writes the associative array back to the users.txt file
 * 
 * @param array $data The associative array with user data
 * @param string $filename Path to the users.txt file
 * @return bool Success or failure
 */
function tab2Fich($data, $filename) {
    $content = '';
    
    // Build the file content
    foreach ($data as $identifier => $values) {
        $password = $values['password'];
        $status = $values['status'];
        $content .= "$identifier $password $status\n";
    }
    
    // Write to file
    return file_put_contents($filename, $content) !== false;
}
?>