<!doctype html>
<head>
    <title>出診</title> 
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">   
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/visit.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Pretty-Footer.css') }}" />
</head>

<body>
    <input id = "visitListUrl" name = "visitListUrl" type = "hidden" value = "{{ url('api/dnss') }}">
    <h1 class="title"><b>出診任務</b></h1>
    <footer class="footer">
            <div class="vip-info">
                <div class="info">
                    <h3>姓名: {{$vip->name}} <a class="glyphicon glyphicon-book visit-btn" style = "cursor:pointer;"></a></h3>
                    <h3>生日: {{date('Y/m/d', strtotime($vip->birthday))}}</h3>
                    <h3>電話: {{$vip->cell}}</h3>
                    <h3>地址: {{$vip->address}}</h3>
                </div>  
                <div class="output">
                    <h3>確認醫生: <input class="text" value="林依持"></input></h3> 
                    <h3>確認護理人員 : <input class="text" value="流雲"></input></h3>   
                    <h3>出診地點 : <input class="text2"></input></h3>  
                    <h3>出診時間 : <input class="text2" type="datetime-local"></input></h3>
                </div>  
                <div>
                    <br><br><br><br><br><br><br><br><h3><a class="btn btn-success CompleteVisitMission">完成任務</a></h3>    
                </div>
            </div>
    </footer>

    <div class="visit-table">
        <div class="table-Dr"><b><h2>出診醫生 :</b></h2>
            <table id="test" class="data-table">
                <thead>
                    <tr>
                        <th>地區</th>
                        <th>科別</th>
                        <th>醫院</th>
                        <th>醫生</th>
                        <th>服務地點</th>
                        <th>狀態</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>地區</th>
                        <th>科別</th>
                        <th>醫院</th>
                        <th>醫生</th>
                        <th>服務地點</th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                </tbody>
            </table>
        </div>

        <div class="table-NP"><b><h2>出診護理師 :</b></h2>
            <table class="data-table">   
                <thead>
                    <tr>
                        <th>地區</th>
                        <th>科別</th>
                        <th>醫院</th>
                        <th>醫生</th>
                        <th>服務地點</th>
                        <th>狀態</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>地區</th>
                        <th>科別</th>
                        <th>醫院</th>
                        <th>醫生</th>
                        <th>服務地點</th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
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
                    </tr>
                </tbody>
            </table>  
        </div>
    </div>
</body>

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src = "https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset('js/visitDN.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/visit.js') }}"></script>
