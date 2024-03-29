<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Cases;
use App\Models\CaseStar;
use App\Models\CaseComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\createRequest;
use Intervention\Image\ImageManager;

class HomeController extends Controller
{
    public $loginType = 1;
    public $msg = '';
    //时间间隔
    public  $timeInval = 5;
    protected $pageCount = 15;
    protected $defaultImage ;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->defaultImage = public_path('upload/images/').'default.png';
        $this->middleware('myAuth',['only'=>['upComment','getMine']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(createRequest $request)
    {
        $this->getAuthLogin($request);
        $sql = "select * from p_case_list";
        $where = ' where `issue` = 0 ';
        if($request->get('search'))
        {
            $search = $request->get('search');
            $where .=" AND keywords like '%".$search."%' ";
        }
        $requestType = (int)$request->route('id');//注意这个参数 和get的参数是不一样的
        switch ($requestType) {
            //最新
            case 0:
                $where .= ' group by id  order by created_at desc ';
                break;
            case 1:
                $where .= ' group by id  order by views desc';
                break;
            case 2:
                $where .= ' group by id  order by created_at desc';
                break;
        }
        $sql .= $where;
        $listMess = DB::select($sql);
        foreach ($listMess as $key => &$value) {
            $value->baseId = base64_encode($value->id);
            $value->keywordsTmp = explode(",",$value->keywords);
            $value->createdTmp = Date('Y-m-d',$value->created_at);
            $value->photographer = empty($value->photographer) ? $value->author : $value->photographer;
            $photo = $value->photos;
            if($photo){
                $photoArr = json_decode($photo,1);
                $photoFirst = public_path()."/".$photoArr[0];
                $img_encode = $this->baseImg($photoFirst);
                $value->encode_img = $img_encode;
            }else{
                $photoFirst = $this->defaultImage;
                $img_encode = $this->baseImg($photoFirst);
                $value->encode_img = $img_encode;
            }
            // 获取星数 取平均值 公式 sum(star)/count(uid);
            $getStartAvg = " select AVG(`stars`)as starAvg from `p_case_star` where `cid` =".$value->id;
            $starAvg = DB::select($getStartAvg)[0];
            $value->starArr = $this->starArr($starAvg->starAvg);
        }
        unset($value);
        $data = [
            'listMess' => $listMess,
            'id' => $requestType,
            'loginType' => $this->loginType,
            'msg' => $this->msg
        ];
        return view('web.pic.pc.index',$data);
    }

    public function showDetail(createRequest $request,$photoId,$code = 0)
    {
        $photoId = base64_decode($request->route('photoId'));
        $nowTime = time();
        if($photoId){
            $sql = "SELECT p.*,AVG(`stars`) as `stars` from `p_case_list` as p LEFT JOIN `p_case_star` as s on p.id=s.cid where p.id =:photoId AND p.issue =0";
            $res = DB::select($sql,['photoId' => $photoId]);
            if(!empty($res[0]->id)){
                $comment = [];
                $comment = Cases::find($photoId)->caseComment()->orderBy('created_at','desc')->limit($this->pageCount)->get();
                foreach($comment as  $key=>&$value ){
                    $userMess = Users::where('id',$value->uid)->get();
                    if(!$userMess->isEmpty()){
                        $value->userMess = empty($userMess[0]->nick_name) ? $userMess[0]->user_name : $userMess[0]->nick_name;
                    }
                    else $value->userMess = "****";
                    //时间间隔
                    $timeInterval = ceil(($nowTime-strtotime($value->created_at))/3600);
                    if($timeInterval <= $this->timeInval){
                        $value->timeInter = $timeInterval."小时之前";
                    }
                    else $value->timeInter = date('Y-m-d',strtotime($value->created_at));
                }
                unset($value);
                foreach ($res as $k => &$val) {
                    $val->baseId = base64_encode($val->id);
                    $val->photosTmp = $this->baseArr($val->photos);
                    $val->photoCount = sizeof($val->photosTmp);
                    $keyWordTmp = explode(',',$val->keywords);
                    $val->keyWordTmp = $keyWordTmp;
                    $val->starArr =  $this->starArr($val->stars);
                    $val->createDate = date('Y-m-d',$val->created_at);
                    $val->comment = $comment;
                }
                unset($val);

                //类似的相关的图例
                $key = $res[0]->keywords;
                $keyStr = implode('|',explode(',', $key));
                $sql = "SELECT * from `p_case_list` WHERE `id` not in({$photoId}) and  `keywords` REGEXP '{$keyStr}' limit ".$this->pageCount;
                $sameList = DB::SELECT($sql);
                if($sameList){
                    foreach ($sameList as $k => &$v) {
                        $v->baseId = base64_encode($v->id);
                        if($v->photos){
                            $v->photosTmp = $this->baseArr($v->photos,129,129)[0];
                        }
                        else $v->photosTmp = $this->baseImg($this->defaultImage,129,129);
                    }
                    unset($v);
                }else{
                    $sql = "SELECT * from `p_case_list` WHERE `id` not in({$photoId}) order by `created_at` desc limit ".$this->pageCount;
                    $sameList = DB::SELECT($sql);
                    foreach ($sameList as $k => &$v) {
                        $v->baseId = base64_encode($v->id);
                        if($v->photos){
                            $v->photosTmp = $this->baseArr($v->photos,129,129)[0];
                        }
                        else $v->photosTmp = $this->baseImg($this->defaultImage,129,129);
                    }
                    unset($v);
                }
            }else{
                $code = -2;
                $back = 1;
            }
        }
        else{
            $code = -1;
            $back = 1;
        }
        $msg = getReturnMsg($code,$back);
        $data = [
            'result' => $res[0],
            'sameList' => $sameList
        ];
        return view('web.pic.pc.caseDetail',$data);
    }

    //发布评论
    public function upComment(createRequest $request)
    {
        $content = $request->post('content');
        $photoId = base64_decode($request->route('photoId'));
        $starCount = (int)$request->post('starCount');
        $starCount = $starCount ==0 ? 1 : $starCount;
        $uid =  Auth::id();
        $nowtime = time();
        $commentLimit = CaseComment::where(function($query)use($uid,$photoId,$nowtime){
            $query->where(['uid'=>$uid,'cid'=>$photoId]);
            $query->where('created_at','>',$nowtime-500);
        })->orderBy('created_at','desc')->limit(1)->get();
        if($commentLimit->isEmpty()){
            $comment = CaseComment::where(function($query)use($uid,$photoId,$nowtime){
                $query->where(['uid'=>$uid,'cid'=>$photoId]);
            })->orderBy('created_at','desc')->limit(1)->get();
            if($comment->isEmpty()){
                $updateData = [
                    'content' => $content,
                    'cid' => $photoId,
                    'uid' => $uid,
                    'create_at' => $nowtime,
                ];
                $starData = [
                    'cid' => $photoId,
                    'uid' => $uid,
                    'stars' => $starCount
                ];
                $id = CaseComment::create($updateData);
                $sid = CaseStar::create($starData);
                $code = 1;
            }else $code = -4;
        }else $code = -5;
        return $this->showdetail($request,$photoId,$code);
    }

    //个人信息
    public function getMine(createRequest $request)
    {
        $uid = Auth::id();
        $mineList = Cases::where(function($query)use($uid){
            $query->where('uid',$uid);
            $query->where('issue',0);
        })->orderBy('created_at','desc')->get();
        foreach ($mineList as $key => &$value) {
            $value->baseId = base64_encode($value->id);
            $value->creat_at = date('Y-m-d',strtotime($value->created_at));
        }
        unset($value);
        $data = [
            'result' => $mineList,
        ];
        return view('web.pic.pc.caseManager',$data);
    }

    /*
    * 返回加密后的路径
    * @param imgpath 全路径
    */
    public function baseImg($imgPath,$width=370,$height=370){
        $image = new ImageManager ;
        if(!is_readable($imgPath)){
           $imgPath = $this->defaultImage;
        }

        $images = $image->make($imgPath)->resize($width,$height)->encode('png', 75);
        $img_encode = 'data:image/png;base64,'. base64_encode($images);
        return $img_encode;
    }

    /*
     * 返回所有加密的路径
     * */
    public  function baseArr($json,$width=370,$height=370){
        $photos = json_decode($json);
        foreach ($photos as $key => &$value) {
            $path = public_path()."/".$value;
            $photosTmp[$key] = $this->baseImg($path,$width,$height);
        }
        return  $photosTmp;
    }

    public function starArr($count)
    {
        $starAvg  = ceil($count);
        $starArr = array_fill(0, 5, 0);
        for($i = 0 ; $i < $starAvg; $i++){
            if($i< 5 ){
                $starArr[$i] = 1;
            }
        }
        return $starArr;
    }

    public function getAuthLogin($request)
    {
        $session =$request->session()->all();
        if(!empty($session['warn'])) {
            $this->loginType = $session['warn']['code'];
            $this->msg = $session['warn']['message'];
            flash($this->msg)->error()->important();
        }
    }

    /*
    * @param code 错误代码
    * @param isback 是否需要跳回上一页
    */
    public function getReturnMsg($code,$isback = 0){
        // 错误 或者需要返回给前端的
        if($code < 0 ){
            $msg=[
                '-1' => '参数错误',
                '-2' => '没有数据',
                '-3' => '发布失败',
                '-4' => '暂时只能评论一次哦',
                '-5' => '太快了，休息一下'
            ];
            if($isback){
                return back()->withErrors(['error'=> $msg[$code]],'store');
            }
            flash($msg[$code])->error()->important();
        }elseif($code > 0){
            $msg=[
                '1' => '发布成功',
            ];
            if($isback){
                return back()->withErrors(['error'=> $msg[$code]],'store');
            }
            flash($msg[$code])->success();
        }

        return $msg[$code];
    }
}
