<?php


class Security
{
    private static $seed = 'n9rbp1k38DOqKVnsAtwz';

    public static function hacher($texte_en_clair)
    {
        $texte_hache = hash('sha256', self::$seed . $texte_en_clair);
        return $texte_hache;
    }

    public static function is_user($login)
    {
        return (!empty($_SESSION['login']) && ($_SESSION['login'] == $login));
    }

    public static function generateRandomHex()
    {
        $numbytes = 16; // Because 32 digits hexadecimal = 16 bytes
        $bytes = openssl_random_pseudo_bytes($numbytes);
        $hex = bin2hex($bytes);
        return $hex;
    }
}




?>