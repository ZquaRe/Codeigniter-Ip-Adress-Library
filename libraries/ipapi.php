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


        @$this->ip               =     $CI->input->ip_address();
        @$this->isp              =     $this->ipdecode()->isp;
        @$this->org              =     $this->ipdecode()->org;
        @$this->country          =     $this->ipdecode()->country;
        @$this->regionCode       =     $this->ipdecode()->region;
        @$this->regionName       =     $this->ipdecode()->regionName;
        @$this->countryCode      =     $this->ipdecode()->countryCode;
        @$this->city             =     $this->ipdecode()->city;
        @$this->zip              =     $this->ipdecode()->zip;
        @$this->lat              =     $this->ipdecode()->lat;
        @$this->lon              =     $this->ipdecode()->lon;
        @$this->timezone         =     $this->ipdecode()->timezone;
        @$this->mobile           =     $this->ipdecode()->mobile;
        @$this->query            =     $this->ipdecode()->query;
        @$this->asname           =     $this->ipdecode()->asname;
        @$this->proxy            =     $this->ipdecode()->proxy;
        @$this->continent        =     $this->ipdecode()->continent;
        @$this->continentCode    =     $this->ipdecode()->continentCode;
        @$this->currency         =     $this->ipdecode()->currency;

    }

    public function alldetails()
    {
        return !empty($this->ipdecode) ? $this->ipdecode : null; 
    }

    public function ip()
    {
        return !empty($this->ip) ? $this->ip : null; 
    }

    public function isp()
    {
        return !empty($this->isp) ? $this->isp : null; 
    }

    public function org()
    {
        return !empty($this->org) ? $this->org : null; 
    }

    public function country()
    {
        return !empty($this->country) ? $this->country : null; 
    }

    public function regionCode()
    {
        return !empty($this->regionCode) ? $this->regionCode : null; 
    }

    public function regionName()
    {
        return !empty($this->regionName) ? $this->regionName : null; 
    }

    public function countryCode()
    {
        return !empty($this->countryCode) ? $this->countryCode : null; 
    }

    public function city()
    {
        return !empty($this->city) ? $this->city : null; 
    }

    public function zip()
    {
        return !empty($this->zip) ? $this->zip : null; 
    }

    public function lat()
    {
        return !empty($this->lat) ? $this->lat : null; 
    }

    public function lon()
    {
        return !empty($this->lon) ? $this->lon : null; 
    }

    public function timezone()
    {
        return !empty($this->timezone) ? $this->timezone : null; 
    }

    public function mobile()
    {
        return !empty($this->mobile) ? $this->mobile : null; 
    }

    public function query()
    {
        return !empty($this->query) ? $this->query : null; 
    }

    public function asname()
    {
        return !empty($this->asname) ? $this->asname : null; 
    }

    public function proxy()
    {
        return !empty($this->proxy) ? $this->proxy : null; 
    }

    public function continent()
    {
        return !empty($this->continent) ? $this->continent : null; 
    }

    public function continentCode()
    {
        return !empty($this->continentCode) ? $this->continentCode : null; 
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
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

}
?> 