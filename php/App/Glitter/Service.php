<?php
namespace Jarm\App\Glitter;
use Jarm\Core\Load;
use Jarm\App\Container;

class Service extends Container
{
  public $cate=[
    '1'=>['t'=>'แสดงอารมณ์','l'=>[2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]],
    '2'=>['t'=>'กวนๆ','p'=>1],
    '3'=>['t'=>'กำลังใจ','p'=>1],
    '4'=>['t'=>'โกรธ','p'=>1],
    '5'=>['t'=>'ขำขัน','p'=>1],
    '6'=>['t'=>'ขอบคุณ','p'=>1],
    '7'=>['t'=>'ขอโทษ','p'=>1],
    '8'=>['t'=>'ความรัก','p'=>1],
    '9'=>['t'=>'คิดถึง','p'=>1],
    '10'=>['t'=>'คำคม','p'=>1],
    '11'=>['t'=>'คำชม','p'=>1],
    '12'=>['t'=>'งอน','p'=>1],
    '13'=>['t'=>'ชุ่มฉ่ำ','p'=>1],
    '14'=>['t'=>'ชื่นชม','p'=>1],
    '15'=>['t'=>'เซ็กส์ซี่','p'=>1],
    '16'=>['t'=>'ปลอบใจ','p'=>1],
    '17'=>['t'=>'เพื่อน','p'=>1],
    '18'=>['t'=>'มิตรภาพ','p'=>1],
    '19'=>['t'=>'มุขเสี่ยว','p'=>1],
    '20'=>['t'=>'ยิ้ม','p'=>1],
    '21'=>['t'=>'ยินดี','p'=>1],
    '22'=>['t'=>'ยินดีต้อนรับ','p'=>1],
    '23'=>['t'=>'ร้อน','p'=>1],
    '24'=>['t'=>'เสียใจ','p'=>1],
    '25'=>['t'=>'หนาว','p'=>1],
    '26'=>['t'=>'ห่วงใย','p'=>1],
    '27'=>['t'=>'หัวเราะ','p'=>1],
    '28'=>['t'=>'เหงา','p'=>1],
    '29'=>['t'=>'อกหัก','p'=>1],
    '30'=>['t'=>'อวยพร','p'=>1],

    '41'=>['t'=>'ทักทาย','l'=>[42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58]],
    '42'=>['t'=>'ขอบคุณที่รับเป็นเพื่อน','p'=>41],
    '43'=>['t'=>'คอมเมนท์','p'=>41],
    '44'=>['t'=>'สวัสดี','p'=>41],
    '45'=>['t'=>'วันจันทร์','p'=>41],
    '46'=>['t'=>'วันอังคาร','p'=>41],
    '47'=>['t'=>'วันพุธ','p'=>41],
    '48'=>['t'=>'วันพฤหัสบดี','p'=>41],
    '49'=>['t'=>'วันศุกร์','p'=>41],
    '50'=>['t'=>'วันเสาร์','p'=>41],
    '51'=>['t'=>'วันอาทิตย์','p'=>41],
    '52'=>['t'=>'วันหยุด','p'=>41],
    '53'=>['t'=>'วันทำงาน','p'=>41],
    '54'=>['t'=>'ตอนเช้า','p'=>41],
    '55'=>['t'=>'ตอนเที่ยง','p'=>41],
    '56'=>['t'=>'ตอนบ่าย','p'=>41],
    '57'=>['t'=>'ตอนเย็น','p'=>41],
    '58'=>['t'=>'ก่อนนอน','p'=>41],

    '71'=>['t'=>'เทศกาล','l'=>[72,73,74,75,76,77,78,79,80,81,82,83,90]],
    '72'=>['t'=>'วันเกิด','p'=>71],
    '73'=>['t'=>'แต่งงาน','p'=>71],
    '74'=>['t'=>'รับปริญญา','p'=>71],
    '75'=>['t'=>'สอบ','p'=>71],
    '76'=>['t'=>'เปิดเทอม','p'=>71],
    '77'=>['t'=>'ปิดเทอม','p'=>71],
    '78'=>['t'=>'วันแม่','p'=>71],
    '79'=>['t'=>'วันพ่อ','p'=>71],
    '80'=>['t'=>'วันสำคัญทางพระพุทธศาสนา','p'=>71],
    '81'=>['t'=>'ตรุษจีน','p'=>71],
    '82'=>['t'=>'วาเลนไทน์','p'=>71],
    '83'=>['t'=>'สวัสดีปีใหม่','p'=>71],
    '90'=>['t'=>'วันอื่นๆ','p'=>71],

    '91'=>['t'=>'อื่นๆ','l'=>[92,93,94]],
    '92'=>['t'=>'ธรรมชาติ','p'=>91],
    '93'=>['t'=>'ฟุตบอล','p'=>92],
    '94'=>['t'=>'สัตว์','p'=>93],
  ];

  public function __construct()
  {
    $path=(Load::$path[0]??'');
    Load::$core->data=array_merge(Load::$core->data,[
      'title'=>'Glitter กลิตเตอร์ รวมรูปภาพกลิตเตอร์ หลากหลายอารมณ์ ความรู้สึก ข้อความยินดี ทักทาย อวยพร เทศกาลต่างๆ ไว้ที่นี่เพียบ.',
      'description'=>'Glitter กลิตเตอร์ รูปภาพ กวนๆ กำลังใจ โกรธ ขำขัน ขอบคุณ ขอโทษ ความรัก คิดถึง คำคม ชื่นชม เซ็กส์ซี่ ปลอบใจ เพื่อน มุขเสี่ยว ยินดีต้อนรับ เสียใจ ห่วงใย เหงา อกหัก อวยพร  ทักทาย เทศกาลต่างๆ และอื่นๆอีกมากมาย',
      'keywords'=>'Glitter, กลิตเตอร์, กวนๆ, กำลังใจ, โกรธ, ขำขัน, ขอบคุณ, ขอโทษ, ความรัก, คิดถึง, คำคม, คำชม, งอน, ชุ่มฉ่ำ, ชื่นชม, เซ็กส์ซี่, ปลอบใจ, เพื่อน, มิตรภาพ, มุขเสี่ยว, ยิ้ม, ยินดี, ยินดีต้อนรับ, ร้อน, เสียใจ, หนาว, ห่วงใย, หัวเราะ, เหงา, อกหัก, อวยพร, เทศกาล',
      'nav-header'=>'<ul>
         <li><a href="/" title="กลิตเตอร์ คำคม">กลิตเตอร์</a></li>
         <li><a href="/c-1" title="กลิตเตอร์แสดงอารมณ์"'.($path=='c-1'?' class="active"':'').'>แสดงอารมณ์</a></li>
         <li><a href="/c-41" title="กลิตเตอร์ทักทาย"'.($path=='c-41'?' class="active"':'').'>ทักทาย</a></li>
         <li><a href="/c-71" title="กลิตเตอร์เทศกาล"'.($path=='c-71'?' class="active"':'').'>เทศกาล</a></li>
         <li><a href="/c-91" title="กลิตเตอร์อื่นๆ"'.($path=='c-91'?' class="active"':'').'>กลิตเตอร์อื่นๆ</a></li>
     </ul>
      <ul class="pull-right">
        <li><a href="/post">เพิ่มกลิตเตอร์ใหม่</a></li>
        <li><a href="/manage">จัดการกลิตเตอร์ของคุณ</a></li>
      </ul>'
    ]);
  }

  public function get_list()
  {
    $db=Load::DB();

    $allby=['desc'=>'หลังไปหน้า','asc'=>'หน้าไปหลัง'];
    $all=['order','by','search','page','day','month','year','position','category'];
    extract(Load::Split()->get('/',0,['z','p','c','t','page','order','by'],['ds'=>'อัพเดทล่าสุด'],$allby));
    if(isset($c) && !isset($cate[$c]))
    {
      unset($c);
    }
    $_=['dd'=>['$exists'=>false]];
    if($c)
    {
      if($cate[$c]['l'])
      {
        $_['c']=['$in'=>$cate[$c]['l']];
      }
      else
      {
        $_['c']=intval($c);
      }
      Load::$core->data['title']=$cate[$c]['t'].' - Glitter กลิตเตอร์'.$cate[$c]['t'].' '.Load::$core->data['title'];
    }
    Load::$core->data['description']=Load::$core->data['title'].', '.Load::$core->data['description'];
    #Load::$core->data['rss']=Load::uri(['feed','/glitter'.($c?'-'.$c:'').'/rss']);
    if($count=$db->count('glitter',$_))
    {
      list($pg,$skip)=Load::Pager()->navigation(64,$count,[$url,'page-'],$page);
      $last=$db->find('glitter',$_,['_id'=>1,'t'=>1,'l'=>1,'sv'=>1,'fd'=>1,'c'=>1,'cs'=>1,'p'=>1,'ds'=>1,'ty'=>1,'pr'=>1],['sort'=>['_id'=>-1],'skip'=>$skip,'limit'=>64]);
    }
    return Load::$core
      ->assign('c',$c)
      ->assign('t',$t)
      ->assign('last',$last)
      ->assign('pager',$pg)
      ->fetch('glitter/list');
  }
}
?>
