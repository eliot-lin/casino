<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <title>VIP APP-掛號</title>
    </head>
    <body>
   <input id = "hospitalUrl" type = "hidden" value = "{{url('hospitals/getHospitals')}}">
    <div class = "container-fluid">

        <form action="">
           

            <h1 style = "text-align:center">掛號</h1>

            <label for="inputDate">日期</label>
            <div>
                <input class="form-control" type="date" id="registerdate" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                <span class="validity"></span>
            </div>

            <div class="form-group">
                <label for="inputHospital">醫院</label>
                <select class="form-control" id="VipInputHospital">
                    <option value="">選擇醫院</option>
                    <option value="台大醫院">台大醫院</option>
                    <option value="中國附醫">中國附醫</option>
                    <option value="成大醫院">成大醫院</option>
                </select>
            </div>
            
            <div class="form-group" id="mymissionform">
                <label for="inputDivision" >科別</label>
                <select class="form-control" id="VipInputDivision">
                    <option value="">選擇科別</option>
                    <option value="不分科">不分科</option>
                    <option value="家醫科">家醫科</option>
                    <option value="內科">內科</option>
                </select>
            </div>

            <div class="form-group" id="mymissionform">
                <label for="VipInputTime" >時段</label>
                <select class="form-control" id="VipInputTime">
                    <option value="">選擇時段</option>
                    <option value="早診">早診</option>
                    <option value="午診">午診</option>
                    <option value="晚診">晚診</option>
                </select>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput" >醫師</label>
                <input type="text" class="form-control"  id="VipInputDoc" placeholder="輸入醫師姓名"> 
            </div>  
            <div> 
                <a id="createNewSubmit" target="popup" class="btn btn-success" >送出</a>
                <a id="createNewSubmit2" target="popup" class="btn btn-info" >諮詢</a>
            </div>
        </form>   
           
    </div>    
       
    </body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/missionCRUD.js') }}"></script>
    <script src = "{{ asset('js/vipRegister.js')}}"></script>
</html>
