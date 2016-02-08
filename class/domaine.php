<?php
  function getdomains()
  {	global $ovh;
    $res = $ovh->get('/domain');
    return $res;
  }
  function getinfodomain($dom)
  {	global $ovh;
    $res = $ovh->get('/domain/'.$dom.'/serviceInfos');
    return $res;
  }
  function getinfozonedomain($dom)
  {	global $ovh;
    $res = $ovh->get('/domain/zone/'.$dom.'/serviceInfos');
    return $res;
  }
