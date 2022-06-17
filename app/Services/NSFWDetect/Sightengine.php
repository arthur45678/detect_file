<?php

namespace App\Services\NSFWDetect;
use App\Contracts\NSFWDetect;


class Sightengine implements NSFWDetect
{

    protected $api_user;

    protected $api_secret;

    protected $config;
    protected $api_url;


    /**
     * @param $connect
     */
    public function __construct($config)
    {
        $this->config = $config;
        $this->api_user = $this->config['sightengine']['API']["sightengine_api_user"];
        $this->api_secret = $this->config['sightengine']['API']["sightengine_api_secret"];

        $this->api_url = $this->config['sightengine']['api_url'];

    }

    /**
     * @string $config
     * @return string
     */
    private function initFilters($config){
        $str = '';

        foreach ($config as $key => $val) {
            if($val){
                $str .= $key .',';
            }
        }
       return rtrim($str,',');
    }

    /**
     * @param $url
     * @return mixed
     */
    public function parseImageByUrl($url)
    {
        $params = array(
            'url' => $url,
            'models' => $this->initFilters($this->config['sightengine']['image-detect']['models']),
            'api_user' => $this->api_user,
            'api_secret' => $this->api_secret,
        );
        return $this->sendRequest($params, $this->api_url.$this->config['sightengine']['image-detect']['api_uri']);
    }



    public function parseVideoByFile($file)
    {
        $params = array(
            'media' => new \CurlFile($file),
            // specify the models you want to apply
            'models' => $this->initFilters($this->config['sightengine']['video-detect']['models']),
            'api_user' => $this->api_user,
            'api_secret' => $this->api_secret,
        );

        return $this->sendRequest($params, $this->api_url.$this->config['sightengine']['video-detect']['api_uri']);
    }

    /**
     * @param array $params
     * @param string $request_url
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function sendRequest(array $params, string $request_url)
    {
        $ch = curl_init($request_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $response = curl_exec($ch);
        curl_close($ch);

        $output = json_decode($response, true);
        return $output;
    }
}
