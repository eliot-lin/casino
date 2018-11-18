<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
        <title>Doctor 測試APP</title>
    </head>
    <body>
    <div id="MissionForm">
            <div class = "container-fluid">
                <div class="row">
                    <div class="col-xs-6 col-md-2"></div>
                    <div class="col-xs-6 col-md-8">
                        <form action="">
                            <h1>任務表單</h1>
                            <div class="form-group">
                                <label for="inputMissionType">任務別</label>
                                <select class="form-control" id="missionType">
                                    <option value="0">未指定</option>
                                    <option value="1">掛號</option>
                                    <option value="2">急診</option>
                                    <option value="3">出診</option>
                                </select>
                            </div>
                            
                            <div class="form-group" id="mymissionform">
                                <label for="inputVIPName" >VIP</label>
                                <input type="text" class="form-control"  id="inputVIPid" placeholder="VIP" value="{{$vip->id}}"> 
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
        </div>
    </body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    
</html>
