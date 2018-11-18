<!doctype html>
<head>
    <title>掛號 - {{ $vip->user->name }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->
    <link rel="stylesheet" href="{{ asset('assets/css/Pretty-Footer.css') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <input id = "missionId" type="hidden" value = "{{ $id }}">
    <input id = "missionUrl" type="hidden" value = "{{ url('missions') }}">
    <input id = "missionUpdateUrl" type="hidden" value = "{{ url('missions') }}">
    <input id = "toDoctor" type="hidden" value = "{{ url('missions/doctors') }}">
    <input id = "missionSubUrl" type="hidden" value = "{{ url('missions/sub') }}">
    <input id = "complete" type="hidden" value = "{{ url('missions/complete') }}">
    <input id = "fail" type="hidden" value = "{{ url('missions/fail') }}">

    <input id = "userurl" type="hidden" value = "{{ url('users')  }}">
    <input id = "vipData" type="hidden" value = "{{ $vip }}">
    <input id = "vips_id" type="hidden" value = "{{ $vip->user_id }}">

    <input id = "regionsUrl" type="hidden" value = "{{ url('regions') }}">
    <input id = "getHospitalsByRegion" type="hidden" value="{{ url('hospitals/get-hospitals-by-region') }}">
    <input id = "doctorsNotEmergency" type="hidden" value="{{ url('divisions/doctors-not-Emergency') }}"> 
    <input id = "divisions" type="hidden" value = "{{ url('divisions/div') }}">
    <input id = "past-hospital" type="hidden" value = "{{ url('hospitals/getPastHospital') }}">
    <input id = "docuser" type="hidden" value = "{{ url('users/') }}">
    <input id = "messagesUrl" type="hidden" value = "{{ url('messages/') }}">
    <input id = "progressesUrl" type="hidden" value = "{{ url('progresses/') }}">
    <input id = "bailerID" type="hidden" class ="Dr">

    <nav class="navbar fixed-top navbar-dark bg-danger navbar-fixed-top">
        <span class="navbar-text" id="abc"></span>
    </nav>

    <footer class="bd-pageheader">
        <div class = "container-fluid">
            <h1><b>掛號任務</b></h1>
            <div class="row">
                <div class="col-xs-6 col-md-2 col-lg-3">
                    <div class="box">
                        <h3>姓名: {{ $vip->user->name }}</h3>
                        <h3>身分證字號 : {{ $vip->user->id_no }}</h3>
                        <h3 id = "birthday"> 生日 : {{ date('Y/m/d', strtotime($vip->user->birthday)) }}</h3>
                        <h3>手機 : {{ $vip->user->cell }}</h3>
                    </div>
                </div>
                <div class="col-xs-6 col-md-2 col-lg-2" id="imagepos" >
                    <img src="{{$vip->user->portrait}}" class="img-rounded" alt="Lights" style="width:80%" >
                </div>
                <div class="col-xs-6 col-md-6 col-lg-5">
                    <div class="passHptl">
                        <table id="pastHsptl" class="table table-striped table-bordered">
                            <caption class="captain" id="captiinPassHosptal">曾去過的醫院</caption>
                            <thead>
                                <tr class="PHtable">
                                    <th>醫院</th>
                                    <th>科別</th>
                                    <th>醫生</th>
                                    <th>日期</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xs-6 col-md-2 col-lg-2" id="registerMessage">
                    <form>
                        <h3><b>掛號訊息</b></h3>
                        <div class="form-group" id="CommentForm">
                            <!-- <label for="comment" id"commentFomrTitle">掛號訊息:</label> -->
                            <textarea class="form-control" rows="5" id="comment"></textarea>
                        </div>
                        <button id="reviseRegisterMessage" type="button" class="btn btn-success">儲存變更</button>

                    </form>
                </div>
            </div>
        </div>
    </footer>
        
    <div class="container-fluid" id="below">
        <div class="row">
            <div class="col-xs-6 col-md-5 col-lg-3 col-xl-2"  id="leftform">
                <div class="return">
                    <form name="region"><br>
                        地區 : 
                            <select id="regionSelector" class="input"></select>
                        醫院 : 
                            <select name="member" id="hospitalSelector" class="input">
                                <option value="">請先選取地區
                            </select>
                            <br><br>日期 :  <input id="date" class="Time" type="date">
                    </form><br>
                        科別 : 
                            <select id="divisionSelector" data-live-search="true" >
                            </select><br><br>
                        診別 : 
                            <select id="diagnosis" class="input">
                                <optgroup label="診別">
                                    <option value="1" selected>早診</option>
                                    <option value="2">午診</option>
                                    <option value="3">晚診</option>
                                </optgroup>
                            </select>
                    <br><br>指定醫生 : <input id="assignDr" class="Dr"></input>
                    <br><br>被委託人 : <input id="bailer" class="Dr" value="{{ $missions[0]->provider_name }}"></input><br><br>
                    <a id="SeedMission" class="btn btn-primary">請求接任務</a>
                    <a class="Register-btn btn btn-warning">傳送片語 </a>
                    <a class="btn btn-success CompleteRegisterMission">成功</a>
                    <a id="FailMission" class="btn btn-danger">失敗</a>
                    
                </div>
            </div>

            <div class="col-xs-12 col-md-7 col-lg-9 col-xl-10" id="rightform">
                <div class="abgne_tab" id="Table3" >

                    <ul class="tabs">
                        <li><a href="#tab1">Case 1. 被委託醫師</a></li>
                        <li><a href="#tab2">Case 2. 合作顧問</a></li>
                        <li><a href="#tab3">Case 3. 朋友協助</a></li>
                    </ul>

                    <div class="tab_container">
                        <div id="tab1" class="tab_content">
                            <table class="case1table" class = "table table-striped">
                                <thead>
                                    <tr class="caseTableHead">
                                        <th class="choose">選取</th>
                                        <th class="handle1"><label for=""><input type = "checkbox" name = "handle-th" class = "area-th" value = "1"></label>地區</th>
                                        <th class="handle2"><input type = "checkbox" name = "handle-th" class = "division-th" value = "2">科別</th>
                                        <th class="handle3"><input type = "checkbox" name = "handle-th" class = "hospital-th" value = "3">醫院</th>
                                        <th class="handle4"><input type = "checkbox" name = "handle-th" class = "doctor-th" value = "4">醫生</th>
                                        <th class="handle5"><input type = "checkbox" name = "handle-th" class = "contract-th" value = "5">契約</th>                                
                                        <th class="handle6"><input type = "checkbox" name = "handle-th" class = "service-th" value = "6">服務地點</th>
                                        <th class="handle7"><input type = "checkbox" name = "handle-th" class = "phone-th" value = "7">電話</th>
                                        <th class="handle8"><input type = "checkbox" name = "handle-th" class = "status-th" value = "8">狀態</th>
                                    </tr>
                                </thead>
                                <tbody class="caseTableBody">
                                </tbody>
                            </table>
                        </div>
                        <div id="tab2" class="tab_content">
                        <table class="case2table" class = "table table-striped" class="post">
                                <thead>
                                    <tr class="caseTableHead">
                                        <th class="choose">選取</th>
                                        <th class="handle9"><label for=""><input type = "checkbox" name = "handle-th" class = "name-th" value = "9"></label>姓名</th>
                                        <th class="handle10"><input type = "checkbox" name = "handle-th" class = "region-th" value = "10">地點</th>
                                        <th class="handle3"><input type = "checkbox" name = "handle-th" class = "hospital-th" value = "3">醫院</th>
                                        <th class="handle7"><input type = "checkbox" name = "handle-th" class = "phone-th" value = "7">電話</th>
                                        <th class="handle8"><input type = "checkbox" name = "handle-th" class = "status-th" value = "8">狀態</th>                                                                
                                    </tr>
                                </thead>
                                <tbody class="caseTableBody">
                                    <tr>
                                        <td><input name="choose" type="radio" value="11"></td>
                                        <td id="staff11">陳建霖</td>
                                        <td>台北市</td>
                                        <td><span class="ntuh"> 台大醫院</span></td>
                                        <td><a href="#" class="glyphicon glyphicon-earphone"> 09255287878</a></td>
                                        <td><span style="color:dimgray;" id="status11" class="glyphicon glyphicon-user"></span></td>
                                    </tr>
                                    <tr>
                                        <td><input name="choose" type="radio" value="12"></td>
                                        <td id="staff12">曾國烈</td>
                                        <td>板橋</td>
                                        <td><span class="femh"> 亞東醫院</span></td>
                                        <td><a href="#" class="glyphicon glyphicon-earphone"> 09255287878</a></td>
                                        <td><span style="color:dimgray;" id="status12" class="glyphicon glyphicon-user"></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab3" class="tab_content" class="case3table">
                            <table class="case3table" class = "table table-striped" class="post">
                            <thead>
                                <tr class="caseTableHead">
                                    <th class="choose">選取</th>
                                    <th>姓名</th>
                                    <th>單位</th>
                                    <th>電話</th>
                                    <th>狀態</th>                                                            
                                </tr>
                            </thead>
                            <tbody class="caseTableBody">
                                <tr>
                                    <td><input name="choose" type="radio" value="100"></td>
                                    <td id="staff100">陳主任</td>
                                    <td>中國附醫</td>
                                    <td><a href="#" class="glyphicon glyphicon-earphone"> 09255287878</a></td>
                                    <td><span style="color:dimgray;" id="status100" class="glyphicon glyphicon-user"></span></td>
                                </tr>
                                <tr>
                                    <td><input name="choose" type="radio" value="101"></td>
                                    <td id="staff101">ALEX</td>
                                    <td>元又</td>
                                    <td><a href="#" class="glyphicon glyphicon-earphone"> 09255287878</a></td>
                                    <td><span style="color:dimgray;" id="status101" class="glyphicon glyphicon-user"></span></td>
                                </tr>
                                <tr>
                                    <td><input name="choose" type="radio" value="102"></td>
                                    <td id="staff102">Cindy</td>
                                    <td>元又</td>
                                    <td><a href="#" class="glyphicon glyphicon-earphone"> 09255287878</a></td>
                                    <td><span style="color:dimgray;" id="status102" class="glyphicon glyphicon-user"></span></td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                    <option value="0">處理中請稍後，馬上為您掛號。</option>
                                    <option value="1">掛號訊息不完整</option>
                                    <option value="2">請問是否需要專人陪診</option>
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
        <!-- <button id="fcmtest" type="button" class="btn btn-success">測試推播</button> -->
</body>
<!-- selectpicker -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script> -->
<!-- <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.js')}}"> -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src = "https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset('js/missionCRUD.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/registerDT.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/register.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/missionTimer.js') }}"></script>
    
