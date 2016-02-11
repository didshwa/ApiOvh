<?php
class Dns{
    var $ovh;
    var $_domain_name;
	public function __construct($_ovh)
	{
		$this->ovh = $_ovh;
	}
	public function setdomain($domain)
  	{	
		$this->_domain_name = $domain;
  	}
	public function getdyndnsid($subDomain)
  	{	
    	$res = $this->ovh->get('/domain/zone/' . $this->_domain_name . '/dynHost/record?subDomain='.$subDomain);
    	return $res;
  	}
	public function getdyndnsdata($id)
  	{	
    	$res = $this->ovh->get('/domain/zone/' . $this->_domain_name . '/dynHost/record/'.$id);
    	return $res;
  	}
	public function putdyndns($subDomain,$target,$id)
  	{
		// update with new quote
        $data = (object) array(
			'ip' 	=> $target,
        	'subDomain' => $subDomain
        );	
    	$res = $this->ovh->put('/domain/zone/' . $this->_domain_name . '/dynHost/record/'.$id, $data);
    	return $res;
  	}

	public function refresh()
  	{
    	$res = $this->ovh->put('/domain/zone/' . $this->_domain_name . '/refresh');
    	return $res;
  	}

}
?>
