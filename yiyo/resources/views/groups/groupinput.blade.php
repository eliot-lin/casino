<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>VIP 資料建檔</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script type="text/javascript" src="{{ URL::asset('js/vipinput.js') }}"></script>
          <link rel="stylesheet" href="{{ asset('css/groupinput.css') }}">
          <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <body>
    <form>

    <div class="container">
        <div class="card card-inverse">
            <img class="card-img" src="{{ asset('vipbanner.png') }}" alt="Card image" style="width:100%;">     
        </div>

        <div class="panel panel-success">
            <div class="panel-heading">
                <h6 class="panel-title">
                    持卡人 資料建檔
                </h6>
            </div>
            <div class="panel-body">
                <form>
                    <div class="form-group">
                        <label for="inputMemberLevel">持卡人類型</label>
                            <div id="member_level" class="custom-controls-stacked">
                                <label class="custom-control custom-radio">
                                        <input id="radioMemberLevel" value="0" name="radio-MemberLevel" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">企業</span>
                                </label>
                                <label class="custom-control custom-radio">
                                        <input id="radioMemberLevel" value="1" name="radio-MemberLevel" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">家庭</span>
                                </label>
                            </div>
                    </div>


                    <div class="form-group">
                        <label for="formGroupExampleInput" >名稱</label>
                            <input type="text" class="form-control"  id="formInputName" placeholder="輸入持卡人姓名"> 
                    </div>


                    <div class="form-group">
                        <label for="formGroupExampleInput2" >手機</label>
                            <input type="text" class="form-control" id="formInputCell" placeholder="輸入手機"> 
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInputVocation" >職業</label>
                            <input type="text" class="form-control"  id="occupation" placeholder="輸入VIP姓名"> 
                    </div>
                    
                    <div class="form-group">
                        <label for="formGroupExampleInput1" >身份證</label>
                            <input type="text" class="form-control" id="formInputID" placeholder="輸入身分證字號"> 
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="formInputEmail" placeholder="輸入Email">
                    </div>

                    <div class="form-group">
                        <label for="inputEmail">Email2</label>
                            <input type="email" class="form-control" id="formInputEmail" placeholder="輸入Email2">
                    </div>
                
                    <div class="form-group">
                        <label for="inputSex">性別</label>
                            <div class="custom-controls-stacked">
                                <label class="custom-control custom-radio">
                                    <input id="radioSex" name="radio-sex" value="0" type="radio" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">女生</span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input id="radioSex" name="radio-sex" value="1" type="radio" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">男生</span>
                                </label>
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddr">地址</label>
                            <input type="text" class="form-control" id="inputAddr" placeholder="地址">
                    </div>
                  

                    <div class="form-group">
                        <label for="inputMariage">婚姻</label>
                            <div class="custom-controls-stacked">
                                <label class="custom-control custom-radio">
                                        <input id="radioMariage" name="radio-mariage" value="0" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">已婚</span>
                                </label>
                                <label class="custom-control custom-radio">
                                        <input id="radioMariage" name="radio-mariage" value="1" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">單身</span>
                                </label>
                            </div>
                    </div>
                    <div class="form-group">
                        <button id="sub" type="button" class="btn btn-success">提交</button>
                    </div>

                </form>
            </div>
        </div>

         
    </body>
</html>
