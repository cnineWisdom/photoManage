@extends('layouts.parent')
@section('styleCss')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/jquery.spzoom.css') }}">
@endsection

@section('title','案例详情')
@section('siderbar')
    @parent
@endsection
@section('modal')
    @parent
@endsection
@section('content')
    <div class="caseDetail_main">
        <div class="caseDetail_main_nav">
            <a href="{{ url()->previous() }}"> <i style="float: left;font-size:20px" class="iconfont icon-fanhui"></i>
                <span>返回</span>
            </a>
        </div>
        <div class="caseDetail_main_content">
            <div class="caseDetail_main_content_pic">
                <div class='caseDetail_main_content_pic_big'>
                    <div>
                        <!-- <img  src="picture/pic (2).png" alt="" height="376.2"> -->
                        <img  src="{{$result->photosTmp[0]}}" alt="" height="376.2">
                    </div>
                </div>
                <div class="picture_content_left" style="position:absolute;left: -20px;height: 100px;width: 20px;bottom:20px;line-height: 100px;text-align: center;cursor: pointer;display: none">
                    <i class="iconfont icon-zuojiantou" style="font-size:20px;"></i>
                </div>
                <div class="picture_content_right" style="position:absolute;right: -20px;height: 100px;width: 20px;bottom:20px;line-height: 100px;text-align: center;cursor: pointer;">
                    <i class="iconfont icon-youjiantou" style="font-size:20px;"></i>
                </div>
                <div class="caseDetail_main_content_pic_small">
                    <ul>
                        @foreach ($result->photosTmp as $value) 
                            <li style="background-image: url('{{$value}}'') center;background-size:cover"></li>

                        @endforeach
                    </ul>
                    <div><i></i></div>
                </div>
                <p>共{{$result->photoCount}}张</p>
            </div>  
            <div class="caseDetail_main_content_detail">
                <div class="pic_content_detail_introduction" style="width: 100%;border:none;padding-top: 10px">
                    <h2>{{$result->title}}</h2> 
                    <button class='share_button caseDetail_main_content_detail_download_button' style="float:right;position: absolute;top: 0px;right:0px;margin-top:10px">
                        <a href="./picture/downPicture.zip" style="position:absolute;width:100%;height:100%;left: 0px;top:0px;">
                        </a> 下载图片
                    </button>
                    <span class="pic_content_detail_author">{{$result->author}}</span>
                    <span class="pic_content_detail_date">{{$result->createDate}}</span><br>
                    <h4>{{$result->content}}<br>摄影师：{{$result->photographer}}<br>成像设备：{{$result->device}}
                            </h4>
                    <h4 style="margin-top:20px;margin-bottom:5px">条件/关键词：</h4>
                    <ul>
                        @foreach ($result->keyWordTmp as $val)
                            <li> <a href="javascript:void(0);"> {{$val}} </a></li>
                        @endforeach
                    </ul>
                    <h4 style="margin-top:20px;margin-bottom:5px">评分等级：</h4>
                    <h6 class="index_imgdetail_rate" style="float:left">
                        @foreach ($result->starArr as $v)
                            @if($v) <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                            @else <i class="iconfont icon-tuanjianrongcopy normal_rate"></i>
                            @endif
                        @endforeach
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <div style="width:100%;background:rgb(250,250,250);display:inline-block;">
        <div class="layout">
            <div class="caseDetail_main_conment">
                <form action="" style="position:relative">
                    <h3>评论：</h3>
                    <textarea name="" id=""  placeholder="写下你的想法吧..."></textarea>
                    <h6 class="index_imgdetail_rate caseDetail_main_conment_rate" style="position: absolute;right: 10px;top:135px">
                        <i class="iconfont icon-tuanjianrongcopy normal_rate"></i>
                        <i class="iconfont icon-tuanjianrongcopy normal_rate"></i>
                        <i class="iconfont icon-tuanjianrongcopy normal_rate"></i>
                        <i class="iconfont icon-tuanjianrongcopy normal_rate"></i>
                        <i class="iconfont icon-tuanjianrongcopy normal_rate"></i>
                    </h6>
                </form>
                <button class='share_button' style="float:right">发表评论</button>
            </div>
            <div class="caseDetail_main_conment_content">
                <p style="text-align:center;display: none">暂无评论</p>   

                <div class="caseDetail_main_conment_content_word">
                    <h3 class="caseDetail_main_conment_content_word_username">Joe_TSUE</h3>  
                    <span style="float:left">2小时前</span><br>
                    <h5>18岁的非裔美国女性，BMI增加，有头痛，恶心，短暂复视和视力丧失的病史，她在最近两周从床上起床（并在直立后离开）时注意到了这一点。去了PCP并接受了流感治疗，并且在没，改善和已知的视觉症状后，被送到ED。 MRI没有显示任何肿块，并显示空蝶鞍turcia。计划用于LP（期望高开放压力）和神经眼科学。愿景20/30 OD和20/20操作系统;没有RAPD; </h5>
                </div>
            </div>
            <div class="caseDetail_main_similar_pic">
                <h3 class="caseDetail_main_conment_content_word_username" style="float:none;margin-top:50px;">类似案例及图片</h3>
                <ul style="margin-top:20px;">
                    <a href=""> 
                        <li style="background:rgb(250,250,250);background: url('picture/Group.jpg') no-repeat center;background-size: cover"></li>
                    </a>
                    <a href="">
                        <li style="background:rgb(250,250,250);background: url('picture/pic (2).png') no-repeat center;background-size: cover"></li>
                    </a>
                    <a href="">
                        <li style="background:rgb(250,250,250);background: url('picture/pic (3).png') no-repeat center;background-size: cover">
                        </li>
                    </a>
                    <a href="">
                        <li style="background:rgb(250,250,250);background: url('picture/pic (4).png') no-repeat center;background-size: cover"></li>
                    </a>
                    <a href="">
                        <li style="background:rgb(250,250,250);background: url('picture/pic (5).png') no-repeat center;background-size: cover"></li>
                    </a>
                    <a href="">
                        <li style="background:rgb(250,250,250);background: url('picture/pic (6).png') no-repeat center;background-size: cover"></li>
                    </a>
                    <a href="">
                        <li style="background:rgb(250,250,250);background: url('picture/pic (7).png') no-repeat center;background-size: cover"></li>
                    </a>
                    <a href="">
                        <li style="background:rgb(250,250,250);background: url('picture/pic (8).png') no-repeat center;background-size: cover"></li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection

@section('script')

@endsection

</body>
</html>
