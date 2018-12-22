<!doctype html>
<head>
    <title>出診</title> 
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">   
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/visit.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Pretty-Footer.css') }}" />
</head>

<body>
    <input id = "missionUrl" type="hidden" value = "{{ url('missions') }}">
    <input id = "missionUpdateUrl" type="hidden" value = "{{ url('missions') }}">
    <input id = "name" type="hidden" value = "{{$vip->user->name}}">
    <input id = "name" type="hidden" value = "{{$vip->user->name}}">


    <h1 class="title"><b>出診任務</b></h1>
    <footer class="footer">
            <div class="vip-info">
                <div class="info">
                    <h3>姓名: {{$vip->user->name}} </h3>
                    <h3>生日: {{date('Y/m/d', strtotime($vip->user->birthday))}}</h3>
                    <h3>電話: {{$vip->user->cell}}</h3>
                    <h3>地址: {{$vip->user->address}}</h3>
                </div>  
                <div class="output">
                    <h3>確認醫生: <input id="confirmDr" class="text"></h3> 
                    <h3>確認護理人員 : <input id="confirmNs" class="text"></h3>   
                    <h3>出診地點 : <input class="text2" id="address"></h3>  
                    <h3>出診時間 : <input id="date" class="input" name="bdaytime" type="datetime-local" style="color:black;"required></h3>
                </div>  
                <div>
                    <input type="button" value="請求接任務" id="SeedMission" class="btn btn-primary button"><br>
                    <a class="Register-btn btn btn-warning button">傳送片語 </a><br>
                    <a class="btn btn-success CompleteVisitMission button">完成任務</a>  
                </div>
                <div>
                    <textarea name="" id="des" class="input" cols="30" rows="10" style="margin-left: 30px; margin-top: 30px; color: black;"></textarea>
                </div>
            </div>
    </footer>

    <div id="MissionForm2"></div>
    <div id="phraseForm">
            <div class = "container-fluid">
                
                <div class="row">
                    <div class="col-xs-6 col-md-2"></div>
                    <div class="col-xs-6 col-md-8">
                        <form action="">
                            <h1>片語選單</h1>
                            <div class="form-group">
                                <label for="inputMissionType">片語別</label>
                                <select class="form-control" id="phraseType">
                                    <option value="0">處理中請稍後，馬上為您找出診人員。</option>
                                    <option value="2">您的症狀經過評估後，並不需要出診人員哦。</option>
                                    <option value="3"></option>
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

    <div class="visit-table">
        <div class="table-Dr"><b><h2>出診醫生 :</b></h2>
            <table id="drTable" class="data-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>地區</th>
                        <th>科別</th>
                        <th>醫院</th>
                        <th>醫生</th>
                        <th>狀態</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <div class="table-NP"><b><h2>出診護理師 :</b></h2>
            <table id="nsTable" class="data-table">   
                <thead>
                    <tr>
                        <th></th>
                        <th>地區</th>
                        <th>科別</th>
                        <th>醫院</th>
                        <th>醫生</th>
                        <th>狀態</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- <tr>
                        <td>北部</td>
                        <td>急診</td>
                        <td style = "cursor:pointer;">台大</td>
                        <td>蘇姿幼</td>
                        <td>台北、桃園</td>
                        <th><span style="color:green;" class="glyphicon glyphicon-user"></span></th>
                    </tr>
                    <tr>
                        <td>北部</td>
                        <td>急診</td>
                        <td style = "cursor:pointer;">礦工</td>
                        <td>賴怡諶</td>
                        <td>基隆</td>
                        <th><span style="color:green;" class="glyphicon glyphicon-user"></span></th>
                    </tr>
                    <tr>
                        <td>中部</td>
                        <td>急診</td>
                        <td style = "cursor:pointer;">中國</td>
                        <td>阿白</td>
                        <td>台中</td>
                        <th><span style="color:green;" class="glyphicon glyphicon-user"></span></th>
                    </tr>
                    <tr>
                        <td>南部</td>
                        <td>急診</td>
                        <td style = "cursor:pointer;">高醫</td>
                        <td>賴豬豬</td>
                        <td>高雄、台南</td>
                        <th><span style="color:green;" class="glyphicon glyphicon-user"></span></th>
                    </tr>
                    <tr>
                        <td>東部</td>
                        <td>急診</td>
                        <td style = "cursor:pointer;">慈濟</td>
                        <td>賴彥渢</td>
                        <td>花蓮</td>
                        <th><span style="color:green;" class="glyphicon glyphicon-user"></span></th>
                    </tr> -->
                </tbody>
            </table>  
        </div>
    </div>
</body>

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src = "https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset('js/visit.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/missionCRUD.js') }}"></script>
