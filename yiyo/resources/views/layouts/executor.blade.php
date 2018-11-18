<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" 

href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" 

src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" 

src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<title>Executor</title>
        <!-- include other src-->
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <!-- <link href="/jtable/themes/metro/blue/jtable.min.css" rel="stylesheet" type="text/css" /> -->
        <!-- <script src="/jtable/jquery.jtable.min.js" type="text/javascript"></script> -->
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        <style>
          body{
              background-color:lightcoral;
              font-family:"微軟正黑體";
          }
        </style>
</head>
<body>
    <div class="content">
        <div class="title m-b-md">
    <div class = "row">
    <div class = "col-md-2"></div>
    <div class = "col-md-8">
    <table class="myTable table-hover">   
        <thead>
            <tr>
                <th></th>
                <th>編號</th>
                <th>任務別</th>
                <th>VIP</th>
                <th>執行人</th>
                <th>起始時間</th>
                <th>結束時間</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style = "width:20px;"><input type = "radio" name = "1"></td>
                <td>1</td>
                <td>掛號</td>
                <td id = "vip1">賴阿白</td>
                <td>NP-甲NP</td>
                <td>2017.5.30</td>
                <td>2017.7.16</td>
            </tr>
            <tr>
                <td style = "width:20px;"><input type = "radio" name = "1"></td>
                <td>2</td>
                <td>接待</td>
                <td id = "vip2">彥逢</td>
                <td>NP-甲NP</td>
                <td>2017.6.21</td>
                <td>2017.7.30</td>
            </tr>
            <tr>
                <td style = "width:20px;"><input type = "radio" name = "1"></td>
                <td>2</td>
                <td>出診</td>
                <td id = "vip3">李雅文</td>
                <td>NP-甲NP</td>
                <td>2017.3.16</td>
                <td>2017.4.28</td>
            </tr>
        </tbody>
    </table> 
    </div> 
    </div>
    <!-- <a href="{{ url('test/add') }}">Add</a> -->
    <script>
$(document).ready(function(){
    $('.myTable').dataTable();
});
</script>
    </div>
    </div>
    
<table id="myTable" class="table table-striped" >
<div class="table-responsive">
<table id="myTable" class="display table" width="100%" >
</table>
</div>