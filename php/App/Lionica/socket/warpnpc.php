<?php
if($arg['type']=='teleport')
{
	$tomap=1;
	if($this->char['map']['_id']==1)
	{
		$price=array(2=>100,3=>300,4=>500,5=>10,6=>1000);
	}
	elseif($this->char['map']['_id']==2)
	{
		$price=array(1=>100);
	}
	elseif($this->char['map']['_id']==3)
	{
		$price=array(1=>300);
	}
	elseif($this->char['map']['_id']==4)
	{
		$price=array(1=>500);
	}
	elseif($this->char['map']['_id']==5)
	{
		$price=array(1=>0);
	}
	elseif($this->char['map']['_id']==6)
	{
		$price=array(1=>1000);
	}
	else
	{
		$price=array();	
	}
	if(isset($price[$arg['map']]))
	{
		$p=intval($price[$arg['map']]);
		if($this->char['silver']<$p)
		{
			$this->ajax->alert('มีเงินไม่เพียงพอ');
		}
		elseif($map=$this->db->findone('lionica_maps',array('_id'=>intval($arg['map'])),array('start'=>1)))
		{
			$this->char['silver']-=$p;
			$this->char['map']=array('_id'=>$map['_id'],'x'=>$map['start'][0],'y'=>$map['start'][1]);
			$this->db->update('lionica_char',array('_id'=>$this->char['_id']),array('$set'=>array('map'=>$this->char['map']),'$inc'=>array('silver'=>$p*-1)));
			
			play(array('_id'=>$this->char['_id']));
		}
	}
}

?>