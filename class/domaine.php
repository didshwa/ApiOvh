<?php
class Domains{
  var $ovh;
  public function __construct($_ovh)
  {
    $this->ovh = $_ovh;
  }
  public function getdomains()
  {	
    $res = $this->ovh->get('/domain');
    return $res;
  }
  public function getinfodomain($dom)
  {	
    $res = $this->ovh->get('/domain/'.$dom.'/serviceInfos');
    return $res;
  }
  public function getinfozonedomain($dom)
  {	
    $res = $this->ovh->get('/domain/zone/'.$dom.'/serviceInfos');
    return $res;
  }
  
}
