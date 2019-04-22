@extends('layouts.parent')
@section('styleCss')
    @parent
    <style>
        html{
            background:url({{ URL::asset('assest/pic3.png') }}) no-repeat;
        }
    </style>

@endsection

@section('title','常见问题')
@section('body','body2')
@section('siderbar')
    @parent
@endsection

@section('modal')
    @parent
@endsection

@section('content')
    <div class="normalproblem_main" style="width: 100%;border:none;padding-top: 0px;margin-top:89px;">
        <h2 class="normalproblem_main_title">上传图片</h2>
        <h3 class="normalproblem_main_title2">1. 中山大学中山眼科中心®平台需要哪些类型的图像？</h3>
            <p  class="normalproblem_main_content">在开始上传之前，浏览银行中的图像以查看已发布的内容。这将有助于您了解哪种类型的图像最能支持银行的教育使命。
            您可以提交的图像示例包括说明视网膜解剖或临床技术，病例系列和静止超声图像的图表和图形。如果您的图像包含标签，箭头或其他定位细节，请留下它们，因为这些将有助于保持每个图像的教育性质。随着中山大学中山眼科中心®网站的发展，我们将接受视频演示和技术，荧光血管造影，神经影像学，电子显微镜，光学显微镜等。</p>
        <h3 class="normalproblem_main_title2">2. 谁可以上传图片？</h3>
        <p  class="normalproblem_main_content">欢迎ASRS成员使用他们的凭据上传图像并登录www.asrs.org/imagebank。此外，成像专业人员，研究人员，行业贡献者和其他人可以在联系ASRS主办公室后上传注册详细信息。电子邮件imagebank@asrs.org请求访问和登录信息。上传视频邮件Caroline Bozell，其中包含您的标题，说明和关键字。通过Dropbox或Wetransfer将您的视频发送至caroline.bozell@asrs.org。</p>
        <h3 class="normalproblem_main_title2">3. 我应该将哪些类型的文件上传到中山大学中山眼科中心®平台？</h3>
        <p  class="normalproblem_main_content">您的图像必须可用于Web显示，这意味着您需要按如下方式格式化图像：<br>
        以.jpg或.png格式保存图像。<br>
        可以采用以下格式接受视频：mp4，m4v，wmv和mov。<br>图像大小不应大于50 MB。视频大小不应超过100 MB。<br>相应地缩放高度，以便可以正确查看图像。<br>
        如果您希望将图像考虑包含在年度印刷图册中，则扫描分辨率应为300 dpi，以获得最佳质量。<br>
        文件名不得包含患者识别信息。<br>请使用通用标题命名您的图像文件（例如：Diabetic_Retinopathy.jpg），或在上传图像后更改系统中的文件名。</p>
        <h3 class="normalproblem_main_title2">4. 如何在上传时标记我的图像？</h3>
        <p  class="normalproblem_main_content">在您上传了1张或更多图片后，您将进入一个屏幕，要求您进行描述和分类。对于标题字段，请选择最能描述图像的标签（例如：黄斑裂孔或脉络膜骨瘤）。在关键字字段中，添加至少3个可增强图像描述的字词或短语。当您开始键入关键字时，系统将根据综合关键字数据库提供建议，如果您找不到所需的关键字，系统将记录您要添加的任何字词。<br><br>此外，在描述字段中，写下图像中表示的病症或疾病的简洁描述，同时牢记图像库的教育性质。您可以包含的信息越多，您的贡献就越有用，但不包括任何患者识别细节。</p>
        <h3 class="normalproblem_main_title2">5. 上传多长时间后，我的图像会出现在RetinaImageBank®平台上？</h3>
        <p  class="normalproblem_main_content">由策展人Suber Huang博士领导，RetinaImageBank®网站的医师编辑团队将审查所有图像，然后才能在网站上看到它们。提交后，您的图像和说明将被审核和批准。如果团队需要有关您提交的更多信息，可能会要求您提供该信息，并且将拒绝不适合银行及其教育任务的图像。<br><br>大多数图像将在1至2周内获得批准。通过审核来帮助移动图片的最佳方法是在上传时提供准确的详细信息和关键字。</p>

        <h3 class="normalproblem_main_title2">6. 我可以上传之前在其他地方发布的图像吗？</h3>
        <p  class="normalproblem_main_content">不可以。请上传任何以前发布的图像的优先级。</p>

        <h3 class="normalproblem_main_title2">7. 如何使用图像？</h3>
        <p  class="normalproblem_main_content">任何想要研究高质量视网膜图像的人都可以查看RetinaImageBank®网站上的内容。当ASRS允许下载时，ASRS成员将能够下载图像以用作教育工具。之后，非会员，居民，患者，媒体代表和广大公众可以下载。这些非会员可以在注册并同意访客使用条款后下载图像。</p>

        <h3 class="normalproblem_main_title2">8. 我的图像怎么用？</h3>
        <p  class="normalproblem_main_content">上传时，您需要获得ASRS的许可，才能在Retina Times期刊，Retina FYI时事通讯和教育材料中使用您的图像。如果您的图像被选择用于任何其他产品，我们将通知您。此外，ASRS将生成RetinaImageBank®平台最佳图像的年度印刷图集，如果您的图像已被选中包含在图册中，您将收到通知。</p>

        <h2 class="normalproblem_main_title">下载图片</h2>
        <h3 class="normalproblem_main_title2">1. 谁可以下载图片？</h3>
        <p  class="normalproblem_main_content">每次登录都允许ASRS会员和ASRS附属机构免费下载最多10张图片，但此许可附带以下规定：1）版权声明（如下）必须出现在所有用途中，2）图像的使用和书面形式来自图像库的内容仅用于信息和非商业用途，不会在任何网络计算机上公开，复制或发布或在任何媒体上广播，以及3）不对图像或书面内容进行修改。<br><br>
        版权声明：“此图片最初发布于RetinaImageBank®网站。作者。摄影师。标题。视网膜图像库。年;图像编号。 ©美国视网膜专家协会。“<br><br>在注册人口统计和联系信息后，非ASRS会员和广大公众可以免费下载3张图片。非会员必须同意访客使用条款。</p>

        <h2 class="normalproblem_main_title">一般用途常见问题</h2>
        <h3 class="normalproblem_main_title2">1. 谁将使用RetinaImageBank®平台中的图像和其他媒体？</h3>
        <p  class="normalproblem_main_content">图像库对ASRS成员和非成员开放，允许每个人访问和查看图像，视频和其他媒体。</p>

        <h3 class="normalproblem_main_title2">2. 谁拥有RetinaImageBank®平台中的图像？</h3>
        <p  class="normalproblem_main_content">ASRS拥有RetinaImageBank®网站上的所有图像和其他媒体。 RetinaImageBank®网站是受版权保护的作品，不得以任何方式复制。单个图像带有水印，表明它们来自受版权保护的集合。</p>

        <h3 class="normalproblem_main_title2">3. 什么是电子水印？</h3>
        <p  class="normalproblem_main_content">电子水印确保每张图像都被识别为来自RetinaImageBank®网站的受版权保护的藏品。</p>

        <h3 class="normalproblem_main_title2">4. 其他媒体怎么样？</h3>
        <p  class="normalproblem_main_content">RetinaImageBank®平台旨在成为一个多媒体平台，其中还包括视频，并将包含PowerPoint演示文稿。目前，该计划仅关注图像和视频。当我们能够接受其他媒体时，我们会向ASRS成员发送通知。</p>

        <h3 class="normalproblem_main_title2">5. Retina Image Bank如何保护患者隐私？</h3>
        <p  class="normalproblem_main_content">美国视网膜专家协会致力于患者保密。</p>

        <h2 class="normalproblem_main_title">编委会</h2>
        <p  class="normalproblem_main_content" style="margin-left:0px;margin-top:20px;">视网膜图像库的策展人和编辑委员会负责提高网站的质量和实用性。他们将在发布之前提供图像，审查上传的内容，建议关键字和评分图像内容以供公众查看。编辑委员会的成员因其在视网膜疾病和影像学方面的专业知识以及他们对这一创新平台的成长和成功的承诺而被选中。</p>

    </div>
@endsection
@section('footer')
    @parent
@endsection
@section('script')
    @parent
@endsection