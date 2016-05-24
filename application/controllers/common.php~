<?php
function AES_Encode($plain_text,$key = 'editorial123456')
{

	return base64_encode(openssl_encrypt($plain_text, "aes-256-cbc", $key, true, str_repeat(chr(0), 16)));
}

function AES_Decode($base64_text,$key = 'editorial123456')
{

	return openssl_decrypt(base64_decode($base64_text), "aes-256-cbc", $key, true, str_repeat(chr(0), 16));
}

function format_password($pword)
{

	return  preg_replace(array('/[A-Za-z0-9]/', '/\s/', '/\W/'), '*', $pword);

}


// CleanString Function begins
function CleanString($string) {
    $string = str_replace(' ', '_', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($string)); // Removes special chars.
}
// CleanString Function ends

//echo AES_Encode("12345");exit;
