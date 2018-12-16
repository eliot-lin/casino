<!doctype html>
<head>
    <title>諮詢任務 - {{$vip->user->name}}</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/consultation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Pretty-Footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/complain.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <input id = "childIdUrl" type="hidden" value = "{{ url('missions/childId') }}">
    <input id = "allMission" type="hidden" value = "{{ url('missions/allmissions') }}">
    <input id = "missionMethod" type="hidden" value = "{{ $missions[0]->method }}">
    <input id = "vipCardNo" type="hidden" value = "{{ $vip->card_no }}">
    <input id = "vipGroupName" type="hidden" value = "{{ $vip->group->name }}">
    <input id = "vipName" type="hidden" value = "{{ $vip->user->name }}">
    <input id = "vipId" type="hidden" value = "{{ $vip->id }}">
    <input id = "missionId" type="hidden" value = "{{ $id }}">
    <input id = "dnsListUrl" name = "dnsListUrl" type = "hidden" value = "{{ url('medical/dnss') }}">
    <input id = "missionSubUrl" type="hidden" value = "{{ url('missions/sub') }}">
    <input id = "dnsUrl" type="hidden" value = "{{ url('dnss')}}">
    <input id = "missionUpdateUrl" type="hidden" value = "{{ url('missions') }}">
    <input id = "missionStoreUrl" type="hidden" value = "{{ url('missions') }}">
    <input id = "messageStoreUrl" type="hidden" value = "{{ url('missions/message') }}">
    <input id = "missionUrl" type="hidden" value = "{{ url('missions') }}">
    <input id = "name" type="hidden" value = "{{ $vip->user->name}}">
    <input id = "card" type="hidden" value = "{{ $vip->user->vip_card_no}}">
    <nav class="navbar fixed-top navbar-dark bg-danger navbar-fixed-top">
         <a class="navbar-brand" id="abc"></a>
    </nav>
    <footer class="bd-pageheader">
        <div class = "container-fluid">
            <h1>諮詢任務</h1>
            <div class="row">
                <div class="col-xs-6 col-md-4">
                    <h3>姓名: {{ $vip->user->name}}</h3>
                    <h3 id="birthday">生日: {{date('Y/m/d', strtotime($vip->user->birthday))}}</h3>
                    <h3>會編: {{ $vip->card_no }}</h3>
                    <h3>電話: {{ $vip->user->cell }}</h3>
                    <h3>地址: {{ $vip->user->address }}</h3>
                </div>
                <div class="col-xs-6 col-md-2">
                    <img src="{{ $vip->user->portrait }}" class="img-rounded" alt="Lights" style="width:87%" >
                </div>
                <div class="col-xs-6 col-md-2">
                    <img src="{{ asset('default.jpg') }}" id="default" class="img-rounded" alt="Lights" style="width: 91%;" >
                    <img src="medical_pic" id="drPic" class="img-rounded" alt="Lights" style="width: 91%;display:none" >                    
                </div>
                <div class="col-xs-6 col-md-3">
                    <h3 id="excutor">諮詢人員: </h3> 
                    <h3 id="cell">電話: </h3> 
                    <h3 id="division">科別: </h3> 
                    <h3 id="hospital">醫院: </h3> 
                </div>
                <div class="col-xs-6 col-md-1">
                    <div class="form-group">
                      <button id="complain" type="button" class="btn btn-danger">主訴系統</button>
                    </div>
                    <!-- <div class="form-group">
                      <button id="suggest" type="button" class="btn btn-primary" >建議任務</button>
                    </div> -->
                    <div class="form-group">
                        <button id="reply" type="button" class="btn btn-warning">回應片語</button>
                    </div>
                    <div class="form-group">
                      <button id="complete" type="button" class="btn btn-success">完成諮詢</button>
                    </div>
                </div>
            </div>
                
        </div>
    </footer>

    <div class="container-fluid">
        <input id = "visitListUrl" name = "visitListUrl" type = "hidden" value = "{{ url('api/dnss') }}">

        <div class="consult-table">
        <div class="row">
                <div class="col-xs-9 col-md-8">
                    <div class="table-Dr"><b><h2>諮詢醫生 :</b></h2>
                    <table id="dr_consult" class="data-table">
                        <thead>
                            <tr>
                            <th>選取</th>
                            <th id = "handle1"><input type = "checkbox" name = "handle-th" id = "region-th">地區</th>
                            <th id = "handle2"><input type = "checkbox" name = "handle-th" id = "division-th">科別</th>
                            <th id = "handle3"><input type = "checkbox" name = "handle-th" id = "hospital-th">醫院</th>
                            <th id = "handle4"><input type = "checkbox" name = "handle-th" id = "doctor-th">醫生</th>
                            <th id = "handle5"><input type = "checkbox" name = "handle-th" id = "status-th">狀態</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                    <div id="functionBar" >
                        <label><input type="checkbox" id="checkAll"  style="zoom:1.8;"/>全選</label>
                        <a   id="SeedMission" class="btn btn-primary">請求接任務</a>
                        <a   id="SetMissionExcutor" class="btn btn-success">承接任務</a>
                    </div> 
                </div>
                <div class="col-xs-9 col-md-4">
                     <div id="complainSystem" > <!-- 病狀紀錄 -->

                        <b><h2>主訴系統</b></h2>
                        <textarea class="cpTxtarea"></textarea>

                    </div>   
                    
                </div>
                <div class="consultMessage">
                    <form>
                        <div class="form-group" id="CommentForm">
                            <label for="comment" id"commentFomrTitle"><b><h2>諮詢訊息:</b></h2></label>
                            <textarea class="form-control" rows="5" id="comment"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div id="phraseForm">
            <div class = "container-fluid">
                
                <div class="row">
                    <div class="col-xs-6 col-md-2"></div>
                    <div class="col-xs-6 col-md-8">
                        <form action="">
                            <h1>片語選單</h1>
                            <div class="form-group">
                                <label for="inputMissionType">片語別</label>
                                <select class="form-control" id="missionPhrase">
                                    <option value="0">請稍後，馬上回復您的問題。</option>
                                    <option value="1">請稍後，我們正在處理中</option>
                                    <option value="2">請稍後，我們正在幫您找醫師回電給您。</option>
                                    <option value="3">我們建議您掛號，若有需要請重新填掛號單或出診單，我們將為您處理。</option>
                                </select>
                            </div>
                            <div> 
                                <a id="phraseCancel" target="popup" class="btn btn-danger">取消</a>
                                <a id="phraseSend" target="popup" class="btn btn-success">傳送</a>
                            </div>
                        </form>   
                    </div>
                    <div class="col-xs-6 col-md-2"></div>
                </div>
            </div>    
        </div>
        
        <!-- <div id="MissionForm">
            <div class = "container-fluid">
                
                <div class="row">
                    <div class="col-xs-6 col-md-2"></div>
                    <div class="col-xs-6 col-md-8">
                        <form action="">
                            <h1>任務表單</h1>
                            <div class="form-group">
                                <label for="inputMissionType">任務別</label>
                                <select class="form-control" id="missionType">
                                    <option value="0" rel="未指定">未指定</option>
                                    <option value="2" rel="0">掛號</option>
                                    <option value="3" rel="初診">出診</option>
                                    <option value="4" rel="急診">急診</option>
                                </select>
                            </div>
                            
                            <div class="form-group" id="mymissionform">
                                <label for="inputVIPName" >VIP</label>
                                <input type="text" class="form-control"  id="inputVIPid" placeholder="VIP" value="{{$vip->user->name}}"> 
                            </div>

                            <div> 
                                <a id="cancel" target="popup" class="btn btn-danger">取消</a>
                                <a id="createNewSubmit" target="popup" class="btn btn-success">確認</a>
                            </div>
                        </form>   
                    </div>
                    <div class="col-xs-6 col-md-2"></div>
                </div>
            </div>    
        </div> -->
    </div>
    <div id = "complainForm">
        <div class="container-fluid">
        <!-- <div class="test"> -->
            <div id="midform">
                <div class="button" id="Table3" >
                    <ul class="tabs">
                        <li><a href="#tab1">一般</a></li>
                        <li><a href="#tab2">外傷</a></li>
                        <li><a href="#tab3">神經</a></li>
                        <li><a href="#tab4">心胸</a></li>
                        <li><a href="#tab5">腹胃</a></li>
                        <li><a href="#tab6">婦泌</a></li>
                        <li><a href="#tab7">骨肌皮</a></li>
                        <li><a href="#tab8">眼耳鼻</a></li>
                        <li><a href="#tab9">兒科</a></li>
                    </ul>

                    <div class="tab_container">
                        <div id="tab1" class="tab_content">
                            <table class="table" class = "table table-striped">
                                <tbody>
                                    <tr>
                                        <td>代訴</td>
                                        <td>呼吸短促</td>
                                        <td>昏厥</td>
                                        <td>噁心</td>
                                        <td>心悸</td>
                                        <td>中毒</td>
                                        <td>懷孕</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>DOE</td>
                                        <td>頭暈</td>
                                        <td>嘔吐</td>
                                        <td>胸口灼熱感</td>
                                        <td>藥物過量</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>臉色蒼白</td>
                                        <td>頭痛</td>
                                        <td>腹脹</td>
                                        <td>冒冷汗</td>
                                        <td>誤食</td>
                                        <td>鼻塞</td>
                                    </tr>
                                    <tr>
                                        <td>OHCA</td>
                                        <td>發紺</td>
                                        <td>關節痛</td>
                                        <td>便秘</td>
                                        <td>體重減輕</td>
                                        <td>皮疹</td>
                                        <td>喉嚨痛</td>
                                    </tr>
                                    <tr>
                                        <td>無呼吸</td>
                                        <td>發燒</td>
                                        <td>肌肉痠痛</td>
                                        <td>黃疸</td>
                                        <td>喝酒後</td>
                                        <td>皮膚癢</td>
                                        <td>聲音沙啞</td>
                                    </tr>
                                    <tr>
                                        <td>意識昏迷</td>
                                        <td>畏寒</td>
                                        <td>腰痛</td>
                                        <td>食慾不振</td>
                                        <td>情緒異常</td>
                                        <td>造口異常</td>
                                        <td>十分不適</td>
                                    </tr>
                                    <tr>
                                        <td>昏睡</td>
                                        <td>無力</td>
                                        <td>腹痛</td>
                                        <td>胸悶</td>
                                        <td>水腫</td>
                                        <td>導管滑脫</td>
                                    </tr>
                                    <tr>
                                        <td>意識不清</td>
                                        <td>倦怠</td>
                                        <td>疼痛</td>
                                        <td>胸痛</td>
                                        <td>感覺異常</td>
                                        <td>灼熱感</td>
                                    </tr>
                                    <tr>
                                        <td>言語不清</td>
                                        <td>眩暈</td>
                                        <td>腹瀉</td>
                                        <td>背痛</td>
                                        <td>麻木</td>
                                        <td>傷口異常</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab2" class="tab_content">
                            <table class="table" class = "table table-striped">
                                <tbody>
                                    <tr>
                                        <td>代訴</td>
                                        <td>螫傷</td>
                                        <td>壓碎傷</td>
                                        <td>脫臼</td>
                                        <td>頭痛</td>
                                    </tr>
                                    <tr>
                                        <td>交通事故</td>
                                        <td>挫傷</td>
                                        <td>截肢傷</td>
                                        <td>變形</td>
                                        <td>噁心</td>
                                    </tr>
                                    <tr>
                                        <td>自高處落下</td>
                                        <td>瘀傷</td>
                                        <td>頭部外傷</td>
                                        <td>腫脹</td>
                                        <td>嘔吐</td>
                                    </tr>
                                    <tr>
                                        <td>滑倒地上</td>
                                        <td>開放性傷口</td>
                                        <td>外傷</td>
                                        <td>出血</td>
                                        <td>腹痛</td>
                                    </tr>
                                    <tr>
                                        <td>打鬥/暴力</td>
                                        <td>咬傷</td>
                                        <td>燙傷</td>
                                        <td>疼痛</td>
                                        <td>大便失禁</td>
                                    </tr>
                                    <tr>
                                        <td>上吊</td>
                                        <td>抓傷</td>
                                        <td>灼傷</td>
                                        <td>壓痛</td>
                                        <td>小便失禁</td>
                                    </tr>
                                    <tr>
                                        <td>槍傷</td>
                                        <td>擦傷</td>
                                        <td>化學灼傷</td>
                                        <td>意識不清</td>
                                    </tr>
                                    <tr>
                                        <td>貫穿傷</td>
                                        <td>撕裂傷</td>
                                        <td>電灼傷</td>
                                        <td>意識昏迷</td>
                                    </tr>
                                    <tr>
                                        <td>穿刺傷</td>
                                        <td>割傷</td>
                                        <td>義務嵌入</td>
                                        <td>斷裂</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab3" class="tab_content">
                            <table class="table" class = "table table-striped">
                                <tbody>
                                    <tr>
                                        <td>癲癇/痙攣</td>
                                        <td>意識混亂</td>
                                        <td>憂鬱</td>
                                    </tr>
                                    <tr>
                                        <td>意識昏迷</td>
                                        <td>感覺異常</td>
                                        <td>幻覺</td>
                                    </tr>
                                    <tr>
                                        <td>意識不清</td>
                                        <td>靜止時顫抖</td>
                                        <td>情緒異常</td>
                                    </tr>
                                    <tr>
                                        <td>頭痛</td>
                                        <td>半身麻痺</td>
                                        <td>自殺意念</td>
                                    </tr>
                                    <tr>
                                        <td>言語不清</td>
                                        <td>譫妄</td>
                                        <td>震顫</td>
                                    </tr>
                                    <tr>
                                        <td>失語</td>
                                        <td>步態不穩</td>
                                    </tr>
                                    <tr>
                                        <td>視力模糊</td>
                                        <td>躁動</td>
                                    </tr>
                                    <tr>
                                        <td>麻痺</td>
                                        <td>不安</td>
                                    </tr>
                                    <tr>
                                        <td>肌肉無力</td>
                                        <td>失眠</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab4" class="tab_content">
                            <table class="table" class = "table table-striped">
                                <tbody>
                                    <tr>
                                        <td>呼吸短促</td>
                                        <td>鼻塞</td>
                                        <td>胸痛</td>
                                    </tr>
                                    <tr>
                                        <td>活動時困難</td>
                                        <td>喉嚨痛</td>
                                        <td>胸悶</td>
                                    </tr>
                                    <tr>
                                        <td>呼吸困難</td>
                                        <td>聲音沙啞</td>
                                        <td>心悸</td>
                                    </tr>
                                    <tr>
                                        <td>哮喘</td>
                                        <td></td>
                                        <td>心律不整</td>
                                    </tr>
                                    <tr>
                                        <td>呼吸快速</td>
                                        <td></td>
                                        <td>背痛</td>
                                    </tr>
                                    <tr>
                                        <td>咳血</td>
                                        <td></td>
                                        <td>冒冷汗</td>
                                    </tr>
                                    <tr>
                                        <td>打噴嚏</td>
                                        <td></td>
                                        <td>反射至背部</td>
                                    </tr>
                                    <tr>
                                        <td>咳痰</td>
                                    </tr>
                                    <tr>
                                        <td>咳嗽</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab5" class="tab_content">
                            <table class="table" class = "table table-striped">
                                <tbody>
                                    <tr>
                                        <td>噁心</td>
                                        <td>腹痛</td>
                                        <td>腹瀉</td>
                                        <td>黃疸</td>                                
                                    </tr>
                                    <tr>
                                        <td>嘔吐</td>
                                        <td>上腹痛</td>
                                        <td>腹脹感</td>
                                        <td>血便</td>
                                    </tr>
                                    <tr>
                                        <td>吐咖啡色</td>
                                        <td>右上腹痛</td>
                                        <td>腹脹</td>
                                        <td>瀝青便</td>
                                    </tr>
                                    <tr>
                                        <td>吐血</td>
                                        <td>右下腹痛</td>
                                        <td>便祕</td>
                                        <td>黑便</td>
                                    </tr>
                                    <tr>
                                        <td>打嗝</td>
                                        <td>左上腹痛</td>
                                        <td>痔瘡</td>
                                        <td>大便失禁</td>                                
                                    </tr>
                                    <tr>
                                        <td>吞嚥困難</td>
                                        <td>左下腹痛</td>
                                    </tr>
                                    <tr>
                                        <td>誤食</td>
                                        <td>下腹痛</td>
                                    </tr>
                                    <tr>
                                        <td>食慾不振</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab6" class="tab_content">
                            <table class="table" class = "table table-striped">
                                <tbody>
                                    <tr>
                                        <td>血尿</td>
                                        <td>經血過多</td>
                                        <td>性侵害</td>
                                    </tr>
                                    <tr>
                                        <td>排尿困難</td>
                                        <td>經痛</td>
                                        <td>加害者</td>
                                    </tr>
                                    <tr>
                                        <td>多尿</td>
                                        <td>陰道出血</td>
                                    </tr>
                                    <tr>
                                        <td>頻尿</td>
                                    </tr>
                                    <tr>
                                        <td>夜尿</td>
                                        <td>腰痛</td>
                                        <td>灼熱感</td>
                                    </tr>
                                    <tr>
                                        <td>寡尿</td>
                                        <td>腎絞痛</td>
                                        <td>懷孕</td>
                                    </tr>
                                    <tr>
                                        <td>尿失禁</td>
                                        <td>流產</td>
                                    </tr>
                                    <tr>
                                        <td>尿潴留</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab7" class="tab_content">
                            <table class="table" class = "table table-striped">
                                <tbody>
                                    <tr>
                                        <td>肌肉痠痛</td>
                                        <td>腫塊</td>
                                        <td>皮膚潰瘍</td>
                                        <td>皮疹</td>                                
                                    </tr>
                                    <tr>
                                        <td>關節痛</td>
                                        <td>異常</td>
                                        <td>皮膚癢</td>
                                        <td>褥瘡</td>                                
                                    </tr>
                                    <tr>
                                        <td>腫脹</td>
                                        <td>活動異常</td>
                                        <td>膿瘍</td>
                                        <td>水泡</td>                                
                                    </tr>
                                    <tr>
                                        <td>變形</td>
                                        <td>腫塊</td>                                
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>滲出液</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab8" class="tab_content">
                            <table class="table" class = "table table-striped">
                                <tbody>
                                    <tr>
                                        <td>眼痛</td>
                                        <td>癢</td>
                                        <td>眼</td>
                                        <td>鼻塞</td>                                
                                    </tr>
                                    <tr>
                                        <td>耳痛</td>
                                        <td>聽力異常</td>
                                        <td>耳</td>
                                        <td>喉嚨痛</td>                                
                                    </tr>
                                    <tr>
                                        <td>鼻痛</td>
                                        <td>耳鳴</td>
                                        <td>鼻</td>
                                        <td>聲音沙啞</td>                                
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>分泌物多</td>                                
                                    </tr>
                                    <tr>
                                        <td>異物</td>
                                        <td>出血</td>
                                        <td>斜視</td>
                                    </tr>
                                    <tr>
                                        <td>腫脹</td>
                                        <td>流鼻血</td>
                                    </tr>
                                    <tr>
                                        <td>疼痛</td>
                                        <td>發紅</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab9" class="tab_content">
                            <table class="table" class = "table table-striped">
                                <tbody>
                                    <tr>
                                        <td>代訴</td>
                                        <td>胸痛</td>
                                        <td>皮膚癢</td>
                                        <td>黃疸</td> 
                                        <td>溺水</td>                                                                             
                                    </tr>
                                    <tr>
                                        <td>哭鬧不安</td>
                                        <td>腹瀉</td>
                                        <td>皮膚潰瘍</td>
                                        <td>耳痛</td>     
                                        <td>異物吸入</td>                                                           
                                    </tr>
                                    <tr>
                                        <td>發燒</td>
                                        <td>腹痛</td>
                                        <td>水泡</td>
                                        <td>淋巴腫痛</td>     
                                        <td>藥物中毒</td>                                                           
                                    </tr>
                                    <tr>
                                        <td>咳嗽</td>
                                        <td>腹溺</td>
                                        <td>紫斑</td>
                                        <td>抽筋</td>     
                                        <td>嗆奶</td>                                                           
                                    </tr>
                                    <tr>
                                        <td>流鼻水</td>
                                        <td>食慾不振</td>
                                        <td>發紺</td>
                                        <td>四肢無力</td>     
                                        <td>頻尿</td>                                                           
                                    </tr>
                                    <tr>
                                        <td>鼻塞</td>
                                        <td>活動力差</td>
                                        <td>皮疹</td>
                                        <td>肌肉痠痛</td>     
                                        <td>小便痛</td>                                                           
                                    </tr>
                                    <tr>
                                        <td>嘔吐</td>
                                        <td>呼吸急促</td>
                                        <td>血便</td>
                                        <td></td>     
                                        <td>排尿困難</td>                                                           
                                    </tr>
                                    <tr>
                                        <td>頭痛</td>
                                        <td>意識不清</td>
                                        <td>聲音沙啞</td>
                                    </tr>
                                    <tr>
                                        <td>喉嚨痛</td>
                                        <td>眼睛紅腫</td>
                                        <td>口內潰瘍</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>  
        <!-- </div> -->
        <div class="flex">
            <div class = "flex1">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>右側</td>
                            <td>眼</td>
                            <td>全身</td>
                            <td>舌頭</td>
                            <td>頸部</td>
                            <td>外陰部</td>
                            <td>上肢</td>
                            <td>手</td>
                        </tr>
                        <tr>
                            <td>左側</td>
                            <td>耳</td>
                            <td>頭</td>
                            <td>口腔</td>
                            <td>前胸</td>
                            <td>後背</td>
                            <td>下肢</td>
                            <td>足</td>
                        </tr>
                        <tr>
                            <td>兩側</td>
                            <td>鼻</td>
                            <td>顏面</td>
                            <td>牙齒</td>
                            <td>腹部</td>
                            <td>生殖器</td>
                            <td>大腿</td>
                            <td>手指</td>
                        </tr>
                        <tr>
                            <td>上</td>
                            <td>嘴唇</td>
                            <td>肩膀</td>
                            <td>喉嚨</td>
                            <td>臀部</td>
                            <td>關節</td>
                            <td>小腿</td>
                            <td>腳趾</td>
                        </tr>
                        <tr>
                            <td>下</td>
                            <td></td>
                            <td>下背</td>
                            <td>食道</td>
                            <td>肛門口</td>
                            <td>膝關節</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class = "flex2">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>反覆地</td>
                            <td>自數分鐘前</td>
                            <td>早上</td>
                            <td>週</td>
                        </tr>
                        <tr>
                            <td>突然地</td>
                            <td>自數小時前</td>
                            <td>下午</td>
                        </tr>
                        <tr>
                            <td>逐漸地</td>
                            <td>自數天前</td>
                            <td>晚上</td>
                        </tr>
                        <tr>
                            <td>持續地</td>
                            <td>昨天開始</td>
                            <td>次</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="output">
                <textarea type="text" id="txtarea"></textarea>  
                <a class="btn btn-warning clear">清空</a>
                <a class="btn btn-danger cancel">取消</a>                
                <a class="btn btn-success CompleteComplain">完成</a>
            </div>
        </div>
    </div>
    <div id="MissionForm2"></div> <!-- 黑色布幕 -->
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src = "https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset('js/missionCRUD.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/medicalType.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/consult.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/missionTimer.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>   
<script type="text/javascript" src="{{ asset('js/complain.js') }}"></script>



<!-- <div class="table-NP"><b><h2>諮詢專科護理師 :</b></h2>
                        <table id="nurse_consult" class="data-table">   
                            <thead>
                                <tr>
                                    <th>地區</th>
                                    <th>科別</th>
                                    <th>醫院</th>
                                    <th>專科護理師</th>
                                    <th>服務地點</th>
                                    <th>狀態</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table> 
                        <div class = "container">
                            <a  target="popup" id="SeedMission" class="btn btn-primary">發送任務</a>
                            <a  target="popup" class="btn btn-success">承接任務</a>
                        </div> 
                        </div> -->