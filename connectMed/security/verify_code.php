<?php
$key = $_POST['key'];
$inputCode = $_POST['inputCode'];

// Run the Python script for code verification
exec("python provareal.py $key $inputCode", $output, $return_var);
$verificationResult = $output[0];  // Assuming the Python script prints the result to the console

if ($verificationResult === 'True') {
    echo "Code is valid";
} else {
    echo "Code is not valid";
}
?>

