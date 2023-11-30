<?php
// Run the Python script for key generation
exec('/usr/bin/env python3 gera.py', $output, $return_var);

// Display the output and return value for debugging
echo "Output: " . implode("\n", $output) . "\n";
echo "Return Value: $return_var\n";

$key = end($output) ?? '';  // Assuming the last line of the output is the key
// Store $key in your MySQL database along with the user information
echo "Generated Key: $key";
// Display the generated PNG image
echo '<img src="ultimogerado.png" alt="Generated QR Code">';
?>

