<?php
/**
 * The control file of admin_entry module of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: control.php,v 1.4 2012/02/16 09:53:49 lj Exp $
 */
use lib\BaseCode as BaseCode;
use lib\util\Util as Util;
use lib\pager\pager_page as pager_page;
use lib\util\UploadFile as UploadFile;

class user_resold_sale extends SecuredControl
{
    /**
     * 数据库连接。
     * 
     * @var object
     * @access pdo
     */
     protected $pdo;

    /* 构造函数。*/
    public function __construct()
    {
        parent::__construct();
        $this->pdo = $this->user_resold_sale->pdo;

    }

    /**出售列表 
    @$params 由于显示的时候只需要固定的一些 字段，并且都需要处理，
    所以下面进行了数组的重新组合

     -- by xiewen

     */
    public function index(){
        $this->assign('handle',"index");
        $house_type = isset($_GET["house_type"])?(int)$_GET["house_type"]:$_POST['house_type'];
        $this->assign('menu',array());
        $keywords = trim(isset($_GET["keyword"])?$_GET["keyword"]:"");
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(!empty($_POST['data'])){
                $id= $_POST['data'];
                $hits = $this->pdo->getRow("select hits from fc_esf where id=".$id);
                $newhits= intval($hits['hits'])+1;
                $sql = $this->pdo->doSql("update fc_esf set hits=".$newhits.",refresh_date = ".time()." where id=".$id);
                if($sql){
                    $result =array(
                        'status'=>"1"
                        );
                    echo json_encode($result);exit;
                }else{
                     $result =array(
                        'status'=>"0"
                        );
                    echo json_encode($result);exit;
                }
            }
        }
        $uid=$this->session->userid;
        $page_info = "house_type=".$house_type."&";
        $pageSize = 5;
        $offset = 0;
        $subPages=5;//每次显示的页数
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 0;
        if($currentPage>0) $offset=($currentPage-1)*$pageSize;
        $where = 'where create_uid= '.$uid." and house_type=".$house_type;
        if($_GET) {
            //处理搜索条件
            if($keywords!=""){
                $where .= " and title like '%".$keywords."%' ";
                $page_info .="title=".$keywords."&";
            }
        }
        $select_columns = "select %s from fc_esf %s %s %s";
        $order = "order by id desc, hits desc ";
        $limit = "limit $offset,$pageSize";
        $count = " count(id) as count ";
        $sql = sprintf($select_columns,'id,title,shi,ting,wei,total_area,hits,refresh_date,price,rent_deposit',$where,$order,$limit);
        $sqlcount = sprintf($select_columns,$count,$where,'','');
        $res = $this->pdo->getAll($sql);
        $arr_list = array();
        foreach ($res as $key => $value) {
            $arr_list[$key]['id'] = $value['id'];
            //$arr_list[$key]['write_date'] = $value['write_date'];
            $arr_list[$key]['title'] = $value['title']?$value['title']:'暂无';
            $arr_list[$key]['shi'] = $value['shi']?$value['shi']:0;
            $arr_list[$key]['ting'] = $value['ting']?$value['ting']:0;
            $arr_list[$key]['wei'] = $value['wei']?$value['wei']:0;
            $arr_list[$key]['total_area'] = $value['total_area']?$value['total_area']:0;
            $arr_list[$key]['title'] = $value['title']?$value['title']:'暂无';
            $arr_list[$key]['hits'] =$value['hits']?$value['hits']:'1';
            $arr_list[$key]['refresh_date'] =$value['refresh_date']?date("Y-m-d h:i:s", $value['refresh_date']):'暂无';
            $arr_list[$key]['price'] =$value['price']?$value['price']:'暂无';
            $arr_list[$key]['rent_deposit'] =$value['rent_deposit']?$value['rent_deposit']:'暂无';
        }
        $Count = $this->pdo->getRow($sqlcount);
        $recordCount = $Count['count'];
        $page=new pager_page($pageSize,$recordCount,$currentPage,$subPages,$page_info,4);
        $splitPageStr=$page->get_page_html();
        $this->assign('name',$keywords);
        $this->assign('arr_list',$arr_list);
        $this->assign('house_type',$house_type);
        $this->assign('splitPageStr',$splitPageStr);
        $this->display('user_resold_sale','list');
    }
//增加
    public function add(){
        $house_type = isset($_GET['house_type'])?(int)$_GET['house_type']:exit;
        $code = new BaseCode();
        $region_option=$code->getPairBaseCodeByType(224);//新房片区
         if(isset($house_type)){
           $rtl= $this->user_resold_sale->getTableMode('fc_esf');
            $rtl=array(
                    'tube'=>null,
                    'borough'=>null,
                    'region'=>null,
                    'circle'=>null,
                    'pm_type'=>null,
                    'price'=>null,
                    'current_floor'=>null,
                    'total_floor'=>null,
                    'shi'=>null,
                    'ting'=>null,
                    'wei'=>null,
                    'porch'=>null,
                    'toward'=>null,
                    'fitmen_type'=>null,
                    'total_area'=>null,
                    'out_area'=>null,
                    'selling_point'=>null,
                    'facilities'=>null,
                    'rent_way'=>null,
                    'telphone'=>$this->session->mobile,
                    'linkman'=>$this->session->username,
                    );
         }
         $this->assign('handle','add');
         $this->assign('house_type',$house_type);
         $this->assign('region_option',$region_option);
         $this->assign('info',$rtl); 


         //print_r($rtl);exit;
         $this->display('user_resold_sale','edit'); 
    }


//删除
    public function del(){
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $param = $_POST;
        $user_res = $this->pdo->getRow("select create_uid from fc_esf where id = ".$param['houseid']);
        if(false!==$user_res && $user_res['create_uid'] == $this->session->userid){
            $rlt = $this->pdo->remove("fc_esf","id=".$param['houseid']);
             if($rlt && false!==$rlt){
                $result = array(
                    'status'=>1,
                    'info'=>"删除操作",
                    'msg'=>"删除成功"
                    );
               echo json_encode($result);exit;
             }else{
                $result =array(
                    'status'=>0,
                    'info'=>"删除操作",
                    'msg'=>"删除失败"
                    );
                echo json_encode($result);exit;
             }
        }else{

             Util::alert_msg("参数错误!","warning",$_SERVER['HTTP_REFERER'],1);
        }
    }else{

        Util::alert_msg("参数错误!","warning",$_SERVER['HTTP_REFERER'],1);
    }

    }


    //编辑
    public function edit(){
        $house_type = isset($_GET['house_type'])?(int)$_GET['house_type']:exit;
        $code = new BaseCode();
        $region_option=$code->getPairBaseCodeByType(224);//新房片区
        if(isset($house_type)){
                $esf_id =$_GET['esf_id'];
                $rtl = $this->pdo->getRow("select * from fc_esf where id=".$esf_id);
                $dis = $this->pdo->getRow("select map_x,map_y,traffic,tube,market,postoffice,bank,hospital,school,region, hotel,facilities from fc_esf_district where id=".$rtl['district_id']);
                $region = $this->pdo->getRow("select direction,college,middleschool,preschool,market,postoffice,bank,hospital,school,hotel,attris,tube,traffic,facilities,map_range,des from fc_region where id=".$rtl['district_id']);
                $rtl['map_x']=$dis['map_x']==null?0:$dis['map_x'];
                $rtl['map_y'] = $dis['map_y']==null?0:$dis['map_y'];
                $rtl['region'] = $dis['region'];
                $rtl['traffic'] = $dis['traffic'];
                $rtl['circle'] = $dis['circle'];
                $rtl['tube'] = $dis['tube'];
                $rtl['college'] = $dis['college'];
                $rtl['middleschool'] = $dis['middleschool'];
                $rtl['preschool'] = $dis['preschool'];
                $rtl['market'] = $dis['market'];
                $rtl['postoffice'] = $dis['postoffice'];
                $rtl['bank'] = $dis['bank'];
                $rtl['hospital'] = $dis['hospital'];
                $rtl['school'] = $dis['school'];
                $rtl['hotel'] = $dis['hotel'];
                $rtl['attris'] = $dis['attris'];
                $rtl['facilities'] = explode(',',  $rtl['facilities']);

                //print_r( $rtl['facilities']);exit;

                $rtl['rent_live_date'] = date("Y-m-d",$rtl['rent_live_date']);
                $pic = $this->pdo->getAll("select esf_id,code,attach_id from fc_esf_pic where esf_id=".$esf_id);
                $arr = array();
                if($pic){
                     foreach ($pic as $key => $value) {
                       $url_img =  $this->pdo->getRow("select url from fc_esf_attach where id =".$value['attach_id']);
                       $pic[$key]['url'] =$url_img['url'];
                    }
                    foreach ($pic as $key => $value) {
                      $arr[$value['code']][]=$value;
                      
                    } 
                }
                if(!empty($arr)){
                $rtl['on_pic'] = $arr[0]==null?null:$arr[0];
                $rtl['in_pic'] = $arr[1]==null?null:$arr[0];
                } 
        }
        $this->assign('handle','edit');
        $this->assign('house_type',$house_type);
        $this->assign('region_option',$region_option);
        $this->assign('info',$rtl); 

        //print_r($rtl);exit;
        $this->display('user_resold_sale','edit');
    }
    
        //保存信息
        public function save(){
             $house_type = isset($_POST['house_type'])?$_POST['house_type']:1;
              $action = isset($_GET['action'])?$_GET['action']:'';
              $uid=$this->session->userid;
              //增加
              if( $action=="add" ){
                if($_SERVER['REQUEST_METHOD']=="POST"){
                         if($_SERVER['REQUEST_METHOD']=="POST"){
                        $param = isset($_POST)?$_POST:'';
                        if(!empty($param['facilities'])){
                           $param['facilities'] = implode(',', $param['facilities']);
                        }else{
                           $param['facilities'] = '';
                        }
                        if(!empty($param['rent_live_date'])){
                         $param['rent_live_date'] =  strtotime($param['rent_live_date']);
                       }
                        $reside = trim($param['reside']);
                         $district_id = $this->pdo->getRow("select id from fc_esf_district where reside = '$reside' ");
                         if($district_id){
                            $param['district_id'] = $district_id['id'];
                         }else{
                            Util::alert_msg("不存在的小区!","warning",$_SERVER['HTTP_REFERER'],1);
                         }
                        $param['house_type'] = $house_type;
                        $pic1=isset($param['pic1'])?$param['pic1']:'';
                        $pic2=isset($param['pic2'])?$param['pic2']:'';
                        $rtl = $this->pdo->add($param,'fc_esf');
                        $esf_id=$this->pdo->getLastInsID();
                        $title = isset($_POST['title'])?$_POST['title']:'';
                        $create_date=time();
                        if(!empty($pic1)){
                            foreach ($pic1 as $key => $value) {
                                   $res1 = $this->pdo->Dosql("insert into fc_esf_pic(`id`,`create_uid`,`create_date`,`code`,`attach_id`,`esf_id`,`title`,`des`,`is_default`,`is_district`,`flag`,`is_show`) values(null,".$uid.",".$create_date.",0,".$value.",".$esf_id.",'".$title."',null,null,null,null,1)");
                            }
                        }
                        if(!empty($pic2)){
                            foreach ($pic2 as $key => $value) {
                                   $res2 = $this->pdo->Dosql("insert into fc_esf_pic(`id`,`create_uid`,`create_date`,`code`,`attach_id`,`esf_id`,`title`,`des`,`is_default`,`is_district`,`flag`,`is_show`) values(null,".$uid.",".$create_date.",1,".$value.",".$esf_id.",'".$title."',null,null,null,null,1)");
                            }
                        }
                        if($rtl){
                                Util::alert_msg("添加成功!","succeed",$_SERVER['HTTP_REFERER'],1);
                            }else{
                                Util::alert_msg("添加失败!","warning",$_SERVER['HTTP_REFERER'],1);
                        }
                   }else{
                        Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],1);
                   }

                }
              }else if ($action=="edit"){
                //编辑
                if($_SERVER['REQUEST_METHOD']=="POST"){
                 $param =isset($_POST)?$_POST:'';
                 if(!empty($param['facilities'])){
                    $param['facilities'] = implode(',', $param['facilities']);
                 }else{
                    $param['facilities'] = '';
                 }
                 if(!empty($param['rent_live_date'])){
                   $param['rent_live_date'] =  strtotime($param['rent_live_date']);
                 }
                 $reside = trim($param['reside']);
                 $district_id = $this->pdo->getRow("select id from fc_esf_district where reside = '$reside' ");
                 if($district_id){
                    $param['district_id'] = $district_id['id'];
                 }else{
                    Util::alert_msg("不存在的小区!","warning",$_SERVER['HTTP_REFERER'],1);
                 }
                 $param['house_type'] = $house_type;
                 $pic1=isset($param['pic1'])?$param['pic1']:'';
                 $pic2=isset($param['pic2'])?$param['pic2']:'';
                 $pic_data['create_date']=time();
                 $pic_data['title']=$param['title'];
                 $pic_data['is_show']=1;
                 //$param['facilities']=implode(',',$param['facilities']);
                 //由于在上传图片的时候attach就已经存在  因此在保存的时候插入新加入的图片即可
                 if(!empty($pic1)){
                   foreach ($pic1 as $key => $value) {
                       $res1 = $this->pdo->Dosql("insert into fc_esf_pic(`id`,`create_uid`,`create_date`,`code`,`attach_id`,`esf_id`,`title`,`des`,`is_default`,`is_district`,`flag`,`is_show`) values(null,".$uid.",".$pic_data['create_date'].",0,".$value.",".$param['id'].",'".$param['title']."',null,null,null,null,1)");
                   }
                 }
                 if(!empty($pic2)){
                   foreach ($pic2 as $key => $value) {
                      $res2 = $this->pdo->Dosql("insert into fc_esf_pic(`id`,`create_uid`,`create_date`,`code`,`attach_id`,`esf_id`,`title`,`des`,`is_default`,`is_district`,`flag`,`is_show`) values(null,".$uid.",".$pic_data['create_date'].",1,".$value.",".$param['id'].",'".$param['title']."',null,null,null,null,1)");
                   }
                 }
                $rlt = $this->pdo->update($param,'fc_esf','id='.$param['id']);
                unset($param['id']);
                $res = $this->pdo->update($param,'fc_esf_district','id='.$param['district_id']);

                if($rlt && $res){
                      Util::alert_msg("更新成功","succeed",$_SERVER['HTTP_REFERER'],1);
                }else{

                    Util::alert_msg("数据更新失败!","warning",$_SERVER['HTTP_REFERER'],1);
                } 

                }
                 
              }else{

                  Util::alert_msg("数据错误!","warning",$_SERVER['HTTP_REFERER'],1);

              }

        }





    /**
     * 上传图片
     */
    public function uploadImg()
    {
        $result['status'] = '1';
        if($_FILES['jUploaderFile']&&!empty($_FILES['jUploaderFile']['name']))
        {
            $uploadFile = new UploadFile($_FILES['jUploaderFile'],'img_type');//图片放在upload/../公司名/
            $uploadFile->setHeight(300);
            $uploadFile->setWidth(400);
            //$uploadFile->DelOriginalImage(true); //删除原始图片
            $uploadFile -> upload();
            $img_info = $uploadFile -> getSaveInfo();//得到上传文件信息
            $img_info = $img_info[0];
            if(!empty($img_info)&&is_array($img_info)){
                //插入数据库
                $this->pdo->add(array(
                    "name"=>$img_info['name'],
                    "url"=>$img_info['url'],
                    "type"=>$img_info['type'],
                    "size"=>$img_info['size'],
                    "checksum"=>$img_info['checksum'],
                    "update_at"=>time()
                ),"fc_esf_attach");
                $aid = $this->pdo->getLastInsID();
                $result['url'] = $img_info['url'];
                $result['id'] = $aid;
                $result['status'] = '1';
            }   
        }
        echo json_encode($result);exit;
    }

/**
@params 编辑时 删除相关的图片和数据库相关信息 --by xiewen
*/
    public function deluploadimg()
    {
        $aPara = formatParameter($_GET['sp'], "out");
        $sql = "Select * from ".DB_PREFIX_HOME."esf_pic where id = '{$aPara["pic_id"]}' ";
        $pic_info = $this->pdo->getRow($sql);
        //$msg = "删除图片失败";$isok = false;
        $msg = '0';
        if($pic_info['is_district']==1){//小区图片只删除pic表里的记录数据不删除文件
            if($this->pdo->remove("id='{$aPara["pic_id"]}'",DB_PREFIX_HOME."esf_pic"))
            {
                //$msg = '删除图片成功';$isok = true;
                $msg = '1';
            }
        }else{
            $sql="select url from ".DB_PREFIX_HOME."esf_attach where id = '{$aPara['attach_id']}'";
            $attr_info = $this->pdo->getRow($sql);
            if($this->pdo->remove("id='{$aPara["pic_id"]}'",DB_PREFIX_HOME."esf_pic")&&$this->pdo->remove("id='{$aPara["pic_id"]}'",DB_PREFIX_HOME."esf_attach"))
            {
                UploadFile::DeleteFile(WEB_ROOT.$attr_info["url"]);
                //$msg = '删除图片成功';$isok = true;
                $msg = '1';
            }

        }
        echo $msg ;exit;
        //page_msg($msg,$isok,'',5,1);
    }
  /**
   @params 删除上传时的图片和文件夹 -- by xiewen
   $params 出售的删除可以和出租的删除整合在一起
  */
  public function delNImg(){
    $attach_id =isset($_GET['sp'])?$_GET['sp']:0;
    $img_url = $this->pdo->getRow("select url from fc_esf_attach where id= ".$attach_id);
    $url = $img_url['url'];
    $rtl = $this->pdo->remove('fc_esf_attach','id='.$attach_id);
    UploadFile::DeleteFile(WEB_ROOT.$url);
     if(false!==$rtl){
        $data['status'] =1;
        $data['info'] = "删除图片成功";
    }else{
        $data['status'] =0;
        $data['info'] = "删除图片失败";
    }
    echo json_encode($data);exit;

  }

    /**
     * 根据小区id输出小区信息
     @params 注意 !empty()?:   是错误的写法
     */
    public function getDistrictById()
    {
        $id = isset($_POST['id'])?$_POST['id']:0;
        if($id==0) exit;
        $sql = "select * from fc_esf_district where id= '$id'  limit 1";//2012/04/11暂时去掉flag=1
        $district = $this->pdo->getRow($sql);
        empty($district['school'])!=null? $district['school'] :"";
        empty($district['market'])!=null? $district['market'] : "";
        empty($district['hospital'])!=null? $district['hospital'] : "";
        empty($district['postoffice'])!=null? $district['postoffice'] : "";
        empty($district['bank'])!=null? $district['bank'] : "";
        //empty($district['other'])!=null? $district['other'] : "";
        empty($district['pm_type'])!=null? $district['pm_type'] : "";

        // print_r($district);exit;


        echo json_encode($district);
        exit;
    }

    /**
     * 选择小区
     */
    public function ajaxXqlist()
    {
        $key = trim(isset($_GET['query'])?$_GET['query']:'');
        $sql = "select reside,id from fc_esf_district where (reside like '%$key%')  limit 10";
        $info = $this->pdo->getAll($sql);
        if(count($info)>0){
            foreach ($info as $val)
            {
                $arr[] = $val['reside'] ;
                $data[] = $val['id'];
            }
            $msg['query'] = $key;
            $msg['suggestions'] = $arr;
            $msg['data'] = $data;
            echo json_encode($msg);
        }
        exit;
    }

}

