<?php
/*
 *          smsMasking Class v1
 *
 *      Developed by info@smsmasking.ca
 *
 */
class smsMaskingException extends \Exception
{
}
 
class smsMasking {
 
    /**
     * @var string API Endpoint resmi SMS Masking
     */
    protected $API='http://smsmasking.ca/api.html';
 
    public function __construct() {
    }
 
    /**
     * Untuk mengirim sms ke nomor tujuan
     *
     * @param string $sender Nama pengirim
     * @param integer $number Nomor handphone penerima
     * @param string $message Isi pesan yang akan dikirim
     * @return array Hasil dari request
     */
    public function send($sender, $number, $message) {
        $data = array(
            'sender' => $sender,
            'number' => $number,
            'message' => $message
        );
        $request = $this->request($data);
        return $request;
    }
 
    /**
     * Request handled by cUrl
     *
     * @var array $post Array properti untuk dikirim ke Endpoint
     * @return array Hasil dari request
     */
    protected function request($post=null) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL             => $this->API,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_VERBOSE         => 1,
            CURLOPT_SSL_VERIFYHOST  => 0,
            CURLOPT_SSL_VERIFYPEER  => 0
        ));
        if($post) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        }
        $data = curl_exec($curl);
        $data = json_decode($data, 1);
        curl_close($curl);
        return $data;
    }
 
}