
<!doctype html>
<html lang="en">
<head>
  <title>醫療人員排班系統</title> 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">   
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.zh-TW.min.js" charset="UTF-8"></script>

<!-- 
  <link rel='stylesheet' href='https://fullcalendar.io/js/fullcalendar-3.6.1/fullcalendar.css' />
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js'></script>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='https://fullcalendar.io/js/fullcalendar-3.6.1/fullcalendar.min.js'></script> -->


  <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">

</head>
<body>

    <footer class="bd-pageheader" align="center">
        <div class = "container-fluid">
            <h1>醫療人員排班</h1>
        </div>
    </footer>

    <div class="container" id="mainContainer">

        <div id="sandbox-container"  align="center">
            <div></div>
        </div>  
        <div class="bs-example" align="center">
            <div class="btn-group" data-toggle="buttons" >
                <label class="btn btn-default">
                    <input type="checkbox">早上
                </label>
                <label class="btn btn-default">
                    <input type="checkbox">下午
                </label>
                <label class="btn btn-default">
                    <input type="checkbox">晚上
                </label>
            </div>
        </div>

        <div align="center">
            <h1>選取日期</h1>
            <p id="days" ></p>
            <a id="saveSchedule" class="btn btn-primary">送出</a>
        </div>


        <!-- <div id='calendar2'> -->


        </div>
    </div>

</body>
</html>
<script type="text/javascript" src="{{ asset('js/schedule.js') }}"></script> 


