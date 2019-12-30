<?php
/*
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @category    IP Adress
 * @author      Furkan Sezgin (ZquaRe)
*/

defined('BASEPATH') OR exit('No direct script access allowed');
class ipapi {

      private $CI;

      private $ip;
      private $currency;
      private $isp;
      private $org;
      private $country;
      private $regionCode;
      private $regionName;
      private $countryCode;
      private $city;
      private $zip;
      private $lat;
      private $lon;
      private $timezone;
      private $reverse;
      private $mobile;
      private $query;
      private $asname;
      private $proxy;
      private $hosting;
      private $continent;
      private $continentCode;

    public function __construct()
    {

        $this->CI = $CI =& get_instance();
        $this->CI->load->library('user_agent'); 


        $this->ip               =     $CI->input->ip_address();
        $this->currency         =     $this->ipdecode()->currency;
        $this->isp              =     $this->ipdecode()->isp;
        $this->org              =     $this->ipdecode()->org;
        $this->country          =     $this->ipdecode()->country;
        $this->regionCode       =     $this->ipdecode()->region;
        $this->regionName       =     $this->ipdecode()->regionName;
        $this->countryCode      =     $this->ipdecode()->countryCode;
        $this->city             =     $this->ipdecode()->city;
        $this->zip              =     $this->ipdecode()->zip;
        $this->lat              =     $this->ipdecode()->lat;
        $this->lon              =     $this->ipdecode()->lon;
        $this->timezone         =     $this->ipdecode()->timezone;
        $this->mobile           =     $this->ipdecode()->mobile;
        $this->query            =     $this->ipdecode()->query;
        $this->asname           =     $this->ipdecode()->asname;
        $this->proxy            =     $this->ipdecode()->proxy;
        $this->continent        =     $this->ipdecode()->continent;
        $this->continentCode    =     $this->ipdecode()->continentCode;

    }

    public function alldetails()
    {
    return $this->ipdecode();
    }

    public function ip()
    {
    return $this->ip;
    }

    public function isp()
    {
    return $this->isp;
    }

    public function org()
    {
    return $this->org;
    }

    public function country()
    {
    return $this->country;
    }

    public function regionCode()
    {
    return $this->regionCode;
    }

    public function regionName()
    {
    return $this->regionName;
    }

    public function countryCode()
    {
    return $this->countryCode;
    }

    public function city()
    {
    return $this->city;
    }

    public function zip()
    {
    return $this->zip;
    }

    public function lat()
    {
    return $this->lat;
    }

    public function lon()
    {
    return $this->lon;
    }

    public function timezone()
    {
    return $this->timezone;
    }

    public function mobile()
    {
    return $this->mobile;
    }

    public function query()
    {
    return $this->query;
    }

    public function asname()
    {
    return $this->asname;
    }

    public function proxy()
    {
    return $this->proxy;
    }

    public function continent()
    {
    return $this->continent;
    }

    public function continentCode()
    {
    return $this->continentCode;
    }





    private function ipdecode()
    {
      if($this->ip == "::1") $this->curl = $this->curl('http://ip-api.com/json/?fields=status,message,continent,continentCode,country,countryCode,region,regionName,city,zip,lat,lon,timezone,currency,isp,org,as,asname,reverse,mobile,proxy,hosting,query'); else $this->curl = $this->curl('http://ip-api.com/json/'.$this->ip.'?fields=status,message,continent,continentCode,country,countryCode,region,regionName,city,zip,lat,lon,timezone,currency,isp,org,as,asname,reverse,mobile,proxy,hosting,query');
      return json_decode($this->curl);
    }

    private function curl($url)
    {
        $user_agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
        $cz = curl_exec($ch);
        curl_close($ch);
        return $cz;
    }

}
?> 