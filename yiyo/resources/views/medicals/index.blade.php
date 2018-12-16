@extends('layouts.app')

@section('title', 'Medical 首頁' )
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
<!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<input id = "getMissionsUrl" type="hidden" value = "{{ url('getMissions') }}">
<link rel="stylesheet" href="{{ asset('css/medicalIndex.css') }}">
<input id="handleMissionsUrl" name="missionsListUrl" type="hidden" value="{{ url('missions/handle') }}">
<input id="missionUrl" type="hidden" value="{{ url('missions')}}">
<input id="medical_id" type="hidden" value="{{ Auth::user()->id }}">
<!-- <meta http-equiv="refresh" content="3"> -->

@section('content')

<div id="inline">
    <div class="acceptMission">
        <table id="acceptMission" class="table table-striped table-bordered">
            <div class="word"><span class="captain">被委託任務</span></div>
            <thead>
                <tr class="mission">
                    <th id="requesterName" style="width:18%">委託人姓名</th>
                    <th id="requesterType" style="width:12%">需要服務</th>
                    <th id="issued_at" style="width:21%">已過多久</th>  
                    <th id="message" style="width:33%">訊息</th>
                    <th id="accept" style="width:16%">接受與否</th>           
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <div class="acceptedMission">
        <table id="acceptedMission" class="table table-striped table-bordered">
        <div class="word"><span class="captain">已接受的委託任務</span></div>
            <thead>
                <tr class="mission">
                    <th id="requesterName2" style="width:18%">委託人姓名</th>
                    <th id="requesterType2" style="width:13%">需要服務</th>
                    <th id="issued_at2" style="width:20%">已過多久</th>  
                    <th id="message2" style="width:39%">訊息</th>
                    <th id="done" style="width:10%">完成</th>           
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
<script type="text/javascript" src="{{ asset('js/medicalIndex.js') }}"></script>



