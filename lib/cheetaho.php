<?php

/**
 * CheetahO API php library
 * @author CheetahO
 *
 */
class CheetahO
{
    protected $auth = array();

    public function __construct($key = '')
    {
        $this->auth = array(
                "key" => $key
        );
    }

    /**
     * 
     * @param array $opts
     * @return multitype:boolean string
     */
    public function url($params = array())
    {
        $data = json_encode(array_merge($this->auth, $params));
        $response = self::request($data, 'http://opt.nerijuso.lt/api/v1/media');
        
        return $response;
    }
   
    /**
     * 
     * @param unknown $data
     * @param unknown $url
     * @return multitype:boolean string
     */
    private function request($data, $url)
    {
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));
               
        curl_setopt($curl, CURLOPT_URL, $url);
               
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.85 Safari/537.36");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_FAILONERROR, 0);
        
        $response = json_decode(curl_exec($curl), true);
        
        if ($response === null) {
          
            $response = array('data' => array(
                "error" => array('message' => 'cURL Error: ' . curl_error($curl)))
            );
        }
        
        curl_close($curl);
        
        return $response;
    }
}