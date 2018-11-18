<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8' />
	<title>醫療人員排班系統-月曆版</title> 
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">   

	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.6.1/fullcalendar.css' />
	<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js'></script>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.6.1/fullcalendar.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.6.1/locale/zh-tw.js'></script>
	<link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
	<input id = "worktimeInput" type="hidden" value = "{{url('worktimes/1')}}">
	
	<footer class="bd-pageheader" align="center">
		<div class = "container-fluid">
			<h3>醫療人員排班</h1>
		</div>
	</footer>

	<div class="row">
		<div class="col-xs-2 col-md-1">
		</div>
		<div class="col-xs-2 col-md-3">
			<div class="form-group">
					<label for="inputMemberLevel">選取班別</label>
					<div id="time" class="custom-controls-stacked">
						<label class="custom-control custom-radio">
								<input id="time" value="0" name="radio-time" type="radio" class="custom-control-input">
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description">早班</span>
						</label>
						<label class="custom-control custom-radio">
								<input id="time" value="1" name="radio-time" type="radio" class="custom-control-input">
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description">晚班</span>
						</label>
						<label class="custom-control custom-radio">
								<input id="time" value="2" name="radio-time" type="radio" class="custom-control-input">
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description">全天</span>
						</label>
					</div>
					<div id="space"></div>

					<label for="inputMemberLevel">快速選取</label>
					<div id="days" class="custom-controls-stacked">
						<label class="custom-control custom-radio">
								<input id="day" value="0" name="check-day" type="checkbox" class="custom-control-input">
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description">日</span>
						</label>
						<label class="custom-control custom-radio">
								<input id="day" value="1" name="check-day" type="checkbox" class="custom-control-input">
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description">一</span>
						</label>
						<label class="custom-control custom-radio">
								<input id="day" value="2" name="check-day" type="checkbox" class="custom-control-input">
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description">二</span>
						</label>
						<label class="custom-control custom-radio">
								<input id="day" value="3" name="check-day" type="checkbox" class="custom-control-input">
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description">三</span>
						</label>
						<label class="custom-control custom-radio">
								<input id="day" value="4" name="check-day" type="checkbox" class="custom-control-input">
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description">四</span>
						</label>
						<label class="custom-control custom-radio">
								<input id="day" value="5" name="check-day" type="checkbox" class="custom-control-input">
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description">五</span>
						</label>
						<label class="custom-control custom-radio">
								<input id="day" value="6" name="check-day" type="checkbox" class="custom-control-input">
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description">六</span>
						</label>
					</div>
			</div>
			<div id="btn">
				<a id="clearCalender" class="btn btn-warning">清除</a>
				<a id="saveCalender" class="btn btn-primary">送出</a>
			</div>
			<div class="alert alert-warning" role="alert">
				<h4 class="alert-heading"><span class="glyphicon">&#xe007;</span>注意事項</h4>
				<p> <span class="glyphicon">&#xe250;</span>對月曆上事件按滑鼠右鍵可以取消排班</p>
				<p> <span class="glyphicon">&#xe250;</span>請選取班別，在進行排班</p>
				<p> <span class="glyphicon">&#xe023;</span>早班時間：00:00~12:00</p>
				<p> <span class="glyphicon">&#xe023;</span>晚班時間：12:00~24:00</p>
				<p> <span class="glyphicon">&#xe023;</span>全天時間：00:00~24:00</p>
			</div>
		</div>
		<div class="col-xs-8 col-md-8">	
			<div id='calendar'></div>
		</div>
		
	</div>

	


</body>
</html>
<script type="text/javascript" src="{{ asset('js/calendar.js') }}"></script> 

