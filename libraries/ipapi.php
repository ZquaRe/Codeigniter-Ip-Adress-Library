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
    public function __construct()
    {
      $this->CI =& get_instance();
      $this->CI->load->library('user_agent'); 
    }

    public function alldetails()
    {
        return !empty($this->ipdecode()) ? $this->ipdecode() : null; 
    }

    public function ip()
    {
        return !empty($this->CI->input->ip_address()) ? $this->CI->input->ip_address() : null; 
    }

    public function isp()
    {
        return !empty($this->ipdecode()->isp) ? $this->ipdecode()->isp : null; 
    }

    public function org()
    {
        return !empty($this->ipdecode()->org) ? $this->ipdecode()->org : null; 
    }

    public function currency()
    {
        return !empty($this->ipdecode()->currency) ? $this->ipdecode()->currency : null; 
    }

    public function country()
    {
        return !empty($this->ipdecode()->country) ? $this->ipdecode()->country : null; 
    }

    public function regionCode()
    {
        return !empty($this->ipdecode()->region) ? $this->ipdecode()->region : null; 
    }

    public function regionName()
    {
        return !empty($this->ipdecode()->regionName) ? @$this->ipdecode()->regionName : null; 
    }

    public function countryCode()
    {
        return !empty($this->ipdecode()->countryCode) ? $this->ipdecode()->countryCode : null; 
    }

    public function city()
    {
        return !empty($this->ipdecode()->city) ? $this->ipdecode()->city : null; 
    }

    public function zip()
    {
        return !empty($this->ipdecode()->zip) ? $this->ipdecode()->zip : null; 
    }

    public function lat()
    {
        return !empty($this->ipdecode()->lat) ? $this->ipdecode()->lat : null; 
    }

    public function lon()
    {
        return !empty($this->ipdecode()->lon) ? $this->ipdecode()->lon : null; 
    }

    public function timezone()
    {
        return !empty($this->ipdecode()->timezone) ? $this->ipdecode()->timezone : null; 
    }

    public function mobile()
    {
        return !empty($this->ipdecode()->mobile) ? $this->ipdecode()->mobile : null; 
    }

    public function query()
    {
        return !empty($this->ipdecode()->query) ? $this->ipdecode()->query : null; 
    }

    public function asname()
    {
        return !empty($this->ipdecode()->asname) ? $this->ipdecode()->asname : null; 
    }

    public function proxy()
    {
        return !empty($this->ipdecode()->proxy) ? $this->ipdecode()->proxy : null; 
    }

    public function continent()
    {
        return !empty($this->ipdecode()->continent) ? $this->ipdecode()->continent : null; 
    }

    public function continentCode()
    {
        return !empty($this->ipdecode()->continentCode) ? $this->ipdecode()->continentCode : null; 
    }

    public function hosting()
    {
        return !empty($this->ipdecode()->hosting) ? $this->ipdecode()->hosting : null; 
    }



    private function ipdecode()
    {
     if($this->ip() == "::1") $this->curl =$this->curl('http://ip-api.com/json/?fields=status,message,continent,continentCode,country,countryCode,region,regionName,city,zip,lat,lon,timezone,currency,isp,org,as,asname,reverse,mobile,proxy,hosting,query'); else $this->curl = $this->curl('http://ip-api.com/json/'.$this->ip().'?fields=status,message,continent,continentCode,country,countryCode,region,regionName,city,zip,lat,lon,timezone,currency,isp,org,as,asname,reverse,mobile,proxy,hosting,query'); return json_decode($this->curl);
     return json_decode($this->ipdecode()->curl);
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
