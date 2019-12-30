<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class testController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library("ipapi");
    }


    public function index()
	{

    print_r($this->ipapi->alldetails());
    echo $this->ipapi->ip();
    echo $this->ipapi->isp();
    echo $this->ipapi->org();
    echo $this->ipapi->country();
    echo $this->ipapi->regionCode();
    echo $this->ipapi->regionName();
    echo $this->ipapi->countryCode();
    echo $this->ipapi->city();
    echo $this->ipapi->zip();
    echo $this->ipapi->lat();
    echo $this->ipapi->lon();
    echo $this->ipapi->timezone();
    echo $this->ipapi->mobile();
    echo $this->ipapi->query();
    echo $this->ipapi->asname();
    echo $this->ipapi->proxy();
    echo $this->ipapi->continent();
    echo $this->ipapi->continentCode();

	}
}
