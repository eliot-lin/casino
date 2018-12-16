@extends('layouts.app')

@section('title', 'VIP 首頁')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
<!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/medicalIndex.css') }}">
<input id = "handleMissionsUrl" name="missionsListUrl" type="hidden" value="{{ url('missions/handle') }}">
<input id = "handle2MissionsUrl" name="missionsListUrl" type="hidden" value="{{ url('missions/handle2') }}">
<input id = "getMissionsUrl" type="hidden" value = "{{ url('getMissionsByVIP') }}"> 
<input id = "missionUrl" type="hidden" value="{{ url('missions')}}">
<input id = "getHospitalsByRegion" type="hidden" value="{{ url('hospitals/get-hospitals-by-region') }}">
<input id = "vip_id" type="hidden" value="{{ Auth::user()->id }}">
@section('content')

<div id="service" style="left:40%;margin-left: 40%;">
    <button id="register" type="button" class="btn btn-primary btn-xs" style="color: white; font-size: 32px;margin-left: 18px;">掛號</button>
    <button id="consultation" type="button" class="btn btn-primary btn-xs" style="color: purple;font-size: 32px;margin-left: 18px;">諮詢</button>
    <button id="visit" type="button" class="btn btn-primary btn-xs" style="color: yellow;font-size: 32px;margin-left: 18px;">出診</button>
</div>

<div id="container">
    <div id="registerTable">
        <form style="font-weight:normal;">
            <div class="form-group" style="font-size: 16px;">
                <div style="text-align:center; "><span style="color: gray; font-size: 32px; ">掛號填單</span></div><br>
                    <span>姓名：</span><br>
                        <input type="text" class="input" id="name" placeholder="輸入姓名" value=" {{ auth::user()->name }}"><br><br>
                    <span>請選擇掛號醫院：</span><br>
                        <label for="inputHospitalName" ></label><br>
                        地區 : 
                            <select id="regionSelector" class="input">
                                <option value="N">北部</option>
                                <option value="C">中部</option>
                                <option value="S">南部</option>
                                <option value="E">東部</option>
                            </select>

                        <br>醫院 : 
                            <select name="member" id="hospitalSelector" class="input">
                                <option value="">請先選取地區
                            </select><br><br>
                    <span>指定醫師：</span>
                        <input type="text" class="input" id="drname" placeholder="輸入指定醫師姓名，沒有則填「無」" value="無" required><br><br>
                    <span>日期：</span>
                        <input id="date" class="input" type="date" required><br>
                    <span>診別 :</span><br>
                        <select id="diagnosis" class="input">
                            <optgroup label="診別">
                                <option value="1" selected>早診</option>
                                <option value="2">午診</option>
                                <option value="3">晚診</option>
                            </optgroup>
                        </select><br><br>
                    <span>症狀：</span><br>
                        <textarea name="" id="des" class="input" cols="30" rows="10" required></textarea><br><br>
                    <button id="sub" type="submit" class="pure-button pure-button-primary">提交</button>
            </div>
        </form>
    </div>

    <div id="consultationTable">
        <form style="font-weight:normal;">
            <div class="form-group" style="font-size: 16px;">
                <div style="text-align:center; "><span style="color: gray; font-size: 32px; ">諮詢填單</span></div><br>
                    <span>姓名：</span><br>
                        <input type="text" class="input" id="name2" placeholder="輸入姓名" value=" {{ auth::user()->name }}"><br><br>
                    <span>症狀：</span><br>
                        <textarea name="" id="des2" class="input" cols="30" rows="10" required></textarea><br><br>
                    <button id="sub2" type="submit" class="pure-button pure-button-primary">提交</button>
            </div>
        </form>
    </div>

    <div id="visitTable">
        visitTable
    </div>
</div>

<img id="gray" src="{{ asset('images/gray.png') }}">


<div id="inline">
    <div class="sentMission">
        <table id="sentMission" class="table table-striped table-bordered">
            <div class="word"><span class="captain">您發出的委託</span></div>
            <thead>
                <tr class="mission">
                    <th id="requesterType" style="width:12%">需要服務</th>
                    <th id="issued_at" style="width:21%">已過多久</th>  
                    <th id="message" style="width:33%">內容</th>
                    <th id="status" style="width:16%">狀態</th>      
                    <th id="suggestion" style="width:16%">新訊息</th>                               
                    <th id="refuse" style="width:16%">取消請求</th>           
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <div class="acceptedMission">
        <table id="acceptedMission" class="table table-striped table-bordered">
        <div class="word"><span class="captain">您完成的委託</span></div>
            <thead>
                <tr class="mission">
                    <th id="requesterType2" style="width:12%">需要服務</th>
                    <th id="message2" style="width:39%">內容</th>
                    <th id="complete" style="width:13%">完成</th>
                    <!-- <th id="date" style="width:21%">看診日期</th>   -->
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>



@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script> -->
<!-- <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.js')}}"> -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src = "https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset('js/vipIndex.js') }}"></script>
