<?php

require_once __DIR__.'/door.php';

//$folder->clean('bin/impression');
//exit;

$now = intval(date('YmdH'));

echo 'NOW - '.$now.'<br>';
$day=getlist($inf=_FILES.'bin/news-view/','/^(([0-9]+)\-([0-9]+)\-([0-9]+))$/iU');
//echo '<pre>'.print_r($news,1).'</pre>';
for($i=0;$i<count($day);$i++)
{
  $cday=intval(str_replace('-','',$day[$i]));
  echo 'day: '.$day[$i].'<br>';
  $hour = getlist($inf.$day[$i].'/','/^([0-9]+)$/iU');
  for($j=0;$j<count($hour);$j++)
  {
    echo 'hour: '.$hour[$j].'<br>';
    $d = intval(str_replace('-','',$day[$i]).''.$hour[$j]);
    if($now>$d) //
    {
      $news = getlist($inf.$day[$i].'/'.$hour[$j].'/','/^([0-9]+)$/iU');
      for($k=0;$k<count($news);$k++)
      {
        echo 'news: '.$news[$k].'<br>';
        $imp = getlist($inf.$day[$i].'/'.$hour[$j].'/'.$news[$k].'/','/^(([0-9]+)\.txt)$/iU');
        echo '<pre>'.print_r($imp,1).'</pre>';
        $log = ['do'=>0,'is'=>0,'mb'=>0,'tb'=>0,'dt'=>0];
        for($m=0;$m<count($imp);$m++)
        {
          $log2=(array)unserialize(file_get_contents($inf.$day[$i].'/'.$hour[$j].'/'.$news[$k].'/'.$imp[$m]));
          foreach($log2 as $kl=>$vl)
          {
            if($kl=='u')
            {
              $log['u']=intval($vl);
            }
            else
            {
              if(!isset($log[$kl]))
              {
                $log[$kl]=0;
              }
              $log[$kl]+=$vl;
            }
          }
        }
        $all=intval($log['do'])+intval($log['is']);
        if(intval($news[$k])==22601)
        {
          print_r(['$inc'=>[
            'do'=>intval($log['do']),
            'is'=>intval($log['is']),
            'mb'=>intval($log['mb']),
            'tb'=>intval($log['tb']),
            'dt'=>intval($log['dt']),
          ]]);
        }
        $db->update('news',['_id'=>intval($news[$k])],['$inc'=>[
          'do'=>intval($log['do']),
          'is'=>intval($log['is']),
          'mb'=>intval($log['mb']),
          'tb'=>intval($log['tb']),
          'dt'=>intval($log['dt']),
        ]]);
        if($db->findone('logs',['ty'=>'news','date'=>$cday]))
        {
          $inc=[
            'do'=>intval($log['do']),
            'is'=>intval($log['is']),
            'mb'=>intval($log['mb']),
            'tb'=>intval($log['tb']),
            'dt'=>intval($log['dt']),
            'hour.'.intval($hour[$j])=>$all];
          if($log['u'])
          {
            $inc['u.'.$log['u']]=$all;
          }
          $db->update('logs',['ty'=>'news','date'=>$cday],['$inc'=>$inc]);
        }
        else
        {
          $log['ty']='news';
          $log['date']=$cday;
          $log['hour']=[strval(intval($hour[$j]))=>$all];
          if($log['u'])
          {
            $log['u.'.$log['u']]=$all;
            unset($log['u']);
          }
          $db->insert('logs',$log);
        }
        $folder->clean('bin/news-view/'.$day[$i].'/'.$hour[$j].'/'.$news[$k]);
        usleep(10000);
      }
    usleep(10000);
    $folder->clean('bin/news-view/'.$day[$i].'/'.$hour[$j]);
    }
  }
  if(!count($hour))
  {
    $folder->clean('bin/news-view/'.$day[$i]);
  }
}


function getlist($path,$pattern)
{
  $f=[];
  if(is_dir($path))
  {
    if($dh=opendir($path))
    {
      while(($dir=readdir($dh))!==false)
      {
        if(preg_match($pattern,$dir,$file))
        {
          array_push($f,$file[1]);
        }
      }
      closedir($dh);
    }
  }
  sort($f);
  return $f;
}
//$folder->clean('bin/impression');
echo 'OK';
?>
