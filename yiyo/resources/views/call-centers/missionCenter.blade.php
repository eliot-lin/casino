@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/missionCenter.css') }}">
@endsection

@section('title', '任務中心')

@section('content')
        <input id="handleMissionsUrl" name="missionsListUrl" type="hidden" value="{{ url('missions/handle') }}">
        <input id="concernMissionsUrl" name="concernmissionsListUrl" type="hidden" value="{{ url('missions/concern') }}">
        <input id="vipMissionUrl" type="hidden" value="{{ url('missions')}}">
        <input id="executorUrl" name="executorListUrl" type="hidden" value="{{ url('missions/executor') }}">
        <input id="statusUrl" type="hidden" value="{{url('missions/status')}}">
        <input id="messageUrl" type="hidden" value="{{url('call-center/message')}}">
        <input id="progressesUrl" type="hidden" value="{{ url('progresses/') }}">

        <div class="container mission-table">
            <h1 class="table-title">任務中心</h1>
            <table id="missionsTable" class="table table-hover">   
                <thead>
                    <tr>
                        <th></th>
                        <th id="handle1"><label for=""><input type="checkbox" name="handle-th" id="missionId-th" value="1"></label>序號</th>
                        <th id="handle2"><input type="checkbox" name="handle-th"id="owner-th" value="2">持卡人</th>
                        <th id="handle3"><input type="checkbox"name="handle-th" id="ownerId-th" value="3">會員編號</th>
                        <th id="handle4"><input type="checkbox"name="handle-th" id="missionType-th" value="4">任務別</th>
                        <th id="handle5"><input type="checkbox"name="handle-th" id="vip-th" value="5">姓名</th>
                        <th id="handle6"><input type="checkbox"name="handle-th" id="executor-th" value="6">執行人</th>
                        <th id="handle7"><input type="checkbox"name="handle-th" id="status-th" value="7">任務狀態</th>
                        <th id="handle8" class="mission-age"><input type="checkbox"name="handle-th" id="missionAge-th" value="8">務齡</th>
                        <th id="handle9"><input type="checkbox"name="handle-th" id="message-th" value="9">訊息</th>
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
                </tbody>
            </table>  
        
            <div id="functionBar">
                <input id="registerUrl" type="hidden" value="{{'register'}}">
                <button id="btnRegister" class="btn btn-primary">掛號</button>
                <input id="visitUrl" type="hidden" value="{{'visit'}}">
                <button id="btnVisit" class="btn btn-primary">出診</button>
                <input id="consultUrl" type="hidden" value="{{'consultation'}}">
                <button id="btnConsult" class="btn btn-primary">諮詢</button>

                <button id="newMission" target="popup" class="btn btn-success">新增任務</button>
                <button id="delteMission" class="btn btn-danger">刪除任務</button>
                <button id="reviseMission" target="popup" class="btn btn-warning">修改任務</button>
                <button id="refresh"  class="btn btn-info">重新整理</button>
            </div>
            
        </div>


        <div id="vipInfoMission" class="vip-info container">
            <div class="flex">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="flex">
                            <div class="flex flex-column">
                                <div class="flex">
                                    <div class="info">
                                        <b>姓名:</b>
                                        <span id="vipName" class="vip-name"></span>
                                        <br>
                                        <b>性別:</b>
                                        <span id="vipSex" class="vip-sex"></span>
                                        <br>
                                        <b>年齡:</b>
                                        <span id="vipAge" class="vip-age"></span>
                                        <br>
                                        <b>婚姻:</b>
                                        <span id="vipMarital"></span>
                                    </div>
                                </div>
                                <br>
                                <div class="flex">
                                    <b>居住地:</b>
                                    <span id="vipAddress"></span>
                                </div>
                            </div>
                            <div class="flex flex-column vip-icon">
                                <a href="#"><span class="glyphicon glyphicon-earphone icon-size"></span></a><br>
                                <a href="#"><span class="glyphicon glyphicon-envelope icon-size"></span></a>
                            </div>
                            <img id="vipPortrait" src="" class="img-rounded vip-image" alt="abei">
                        </div>
                    </div>
                </div>
                <div class="panel panel-default vip-surgery">
                    <div class="panel-body">
                        <h3>手術史</h3>
                        <pre id="vipSurgeryRec" class="pre-background"></pre>
                    </div>
                </div>
                <div class="panel panel-default vip-medicine">
                    <div class="panel-body">
                        <h3>長期服用藥物</h3>
                        <pre id="vipMedRec" class="pre-background"></pre>
                    </div>
                </div>
            </div>
        </div>
        <div id="executorInfo">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-6 col-md-2"></div>
                    <div class="col-xs-6 col-md-8">
                        <h1 class="table-title">執行人任務清單</h1>
                        <table id="executorTable" class="table table-hover">
                        <thead>
                            <th></th>
                            <th>編號</th>
                            <th>任務別</th>
                            <th>VIP</th>
                            <th>執行人</th>
                            <th>任務狀態</th>
                            <th>起始時間</th>
                            <th>結束時間</th>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        </tfoot>
                        </table>
                    </div>
                    
                    <div class="col-xs-6 col-md-2"></div>
                </div>
            </div>
        </div>
        <div id="statusInfo">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-6 col-md-2"></div>
                    <div class="col-xs-6 col-md-8">
                        <h1 class="table-title">VIP歷史任務</h1>
                        <table id="statusTable" class="table table-hover">
                        <thead>
                            <th></th>
                            <th>編號</th>
                            <th>任務別</th>
                            <th>VIP</th>
                            <th>執行人</th>
                            <th>任務狀態</th>
                            <th>起始時間</th>
                            <th>結束時間</th>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        </tfoot>
                        </table>
                    </div>
                    
                    <div class="col-xs-6 col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mission-table">
        <h1 class="table-title">關懷任務</h1>
        <table id="careTable" class="table table-hover">   
            <thead>
                <tr>
                    <th></th>
                    <th>持卡人</th>
                    <th>會員編號</th>
                    <th>任務別</th>
                    <th>姓名</th>
                    <th>執行人</th>
                    <th>務齡</th>
                </tr>
            </thead>
            <tfoot>
            </tfoot>
            <tbody>
            </tbody>
        </table>  
    </div>


    <!-- missioncare begin -->
    <div id="vipInfoCare" class="care-info container">
        
            <div class="flex">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="flex">
                        <div class="flex flex-column">
                            <div class="flex">
                                <div class="info">
                                    <b>姓名:</b>
                                    <span id="careName" class="vip-name"></span>
                                    <br>
                                    <b>性別:</b>
                                    <span id="careSex" class="vip-sex"></span>
                                    <br>
                                    <b>年齡:</b>
                                    <span id="careAge" class="vip-age"></span>
                                    <br>
                                    <b>婚姻:</b>
                                    <span id="careMarital"></span>
                                </div>
                            </div>
                            <br>
                            <div class="flex">
                                <b>居住地:</b>
                                <span id="careAddress"></span>
                            </div>
                        </div>
                        <div class="flex flex-column vip-icon">
                            <a href="#"><span class="glyphicon glyphicon-earphone icon-size"></span></a><br>
                            <a href="#"><span class="glyphicon glyphicon-envelope icon-size"></span></a>
                        </div>
                        <img id="carePortrait" src="" class="img-rounded vip-image" alt="abei">
                    </div>
                </div>
            </div>
            <div class="panel panel-default vip-surgery">
                <div class="panel-body">
                    <h3>手術史</h3>
                    <pre id="careSurgeryRec" class="pre-background"></pre>
                </div>
            </div>
            <div class="panel panel-default vip-medicine">
                <div class="panel-body">
                    <h3>長期服用藥物</h3>
                    <pre id="careMedRec" class="pre-background"></pre>
                </div>
            </div>
        </div>
        
    </div> <!-- missioncare end -->

    <div id="MissionForm2"></div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js/missionCenter.js')}}"></script>
@endsection
