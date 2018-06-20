<?php
namespace McryptD3;

class Mcryptd3 {
    var $key = '';
    var $iv  = '';

    public function __construct($key, $iv)
    {
        $key_leng = strlen($key);
        $iv_leng = strlen($iv);
        if ($key_leng < 24){
            $key = $key . str_repeat('0', 24-intval($key_leng));
        }
        if ($iv_leng < 8){
            $iv = $iv . str_repeat('0', 8-intval($iv_leng));
        }
        $this->key = $key;
        $this->iv  = $iv;
    }

    public function encrypt($input){
        return base64_encode(openssl_encrypt($input, "des-ede3-cbc", $this->key, OPENSSL_RAW_DATA, $this->iv));
    }
    public function decrypt($encrypted){
        return openssl_decrypt(base64_decode($encrypted), 'des-ede3-cbc', $this->key, OPENSSL_RAW_DATA, $this->iv);
    }

}