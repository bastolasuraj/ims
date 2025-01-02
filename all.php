<?php
// Define glob patterns for file searches
$patterns = [
    '*/*.php',
    '*.php',
//    '*/*/*'
];

// Loop through each pattern to find and process files
foreach ($patterns as $pattern) {
    $files = glob($pattern);
    // Filter out specific files if needed
    if ($pattern === '*/*/*') {
        $files = array_filter($files, function ($file) {
            return basename($file) !== 'logo.png';
        });
    }
    // Display file names and contents
    foreach ($files as $file) {
        echo '<br>'.$file . '<br>';
        echo htmlspecialchars(file_get_contents($file));
        echo '<br> -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+- <br>';
    }
}
