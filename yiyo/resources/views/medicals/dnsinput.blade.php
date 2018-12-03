<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
    <title>醫療人員 資料建檔</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <script type="text/javascript" src="{{ URL::asset('js/dnsinput.js') }}"></script>
      <link rel="stylesheet" href="{{ asset('css/medicalinput.css') }}">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <input id = "getHospitalsByRegion" type="hidden" value="{{ url('hospitals/get-hospitals-by-region') }}">
    </head>
    <body>
        <div class="container">
            <div class="card card-inverse">
                  <img class="card-img" src="{{ asset('title.png') }}" alt="Card image" style="width:100%;">     
            </div>
            <div class="panel panel-info">

                <div class="panel-heading">
                    <h6 class="panel-title">
                        醫療人員 資料建檔
                    </h6>
                </div>
                <form onsubmit="return false">
                  <div class="panel-body">

                      <div class="form-group">
                          <label for="inputVocation">*職業</label>
                              
                              <div class="custom-controls-stacked">
                                  <label class="custom-control custom-radio">
                                        <input class="inputVocation" name="radio-vocational" value="1" type="radio" class="custom-control-input" checked required>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">醫師</span>
                                  </label>
                                  <label class="custom-control custom-radio">
                                        <input class="inputVocation" name="radio-vocational" value="2" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">NP</span>
                                  </label>
                              </div>
                      </div>

                      <div class="form-group">
                          <label for="inputRelationship">*合作關係</label>
                              <div class="custom-controls-stacked">
                                  <label class="custom-control custom-radio">
                                        <input class="inputCooperationRelationship" name="radio-cooperation" value="合約" type="radio" class="custom-control-input" checked required>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">簽約</span>
                                  </label>
                                  </label>
                                  <label class="custom-control custom-radio">
                                        <input class="inputCooperationRelationship" name="radio-cooperation" value="友好" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">友好</span>
                                  </label>
                              </div>
                      </div>

                      <div class="form-group">
                          <label for="inputServiceTime" >*簽約服務內容</label>
                          <p></p>
                            <form>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="time" value="consult" checked>諮詢
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="time" value="register">代掛號
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="time" value="visit">出診
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="time" value="company">陪診
                                  </label>
                                  <span class="help-block">可複選</span>
                            </form>
                      </div>

                      <div class="form-group">
                            <label for="inputHospitalName" >*服務醫院</label><br>
                            地區 : 
                                <select id="regionSelector" class="input">
                                  <option value="N">北部</option>
                                  <option value="C">中部</option>
                                  <option value="S">南部</option>
                                  <option value="E">東部</option>
                                </select>

                              醫院 : 
                                  <select name="member" id="hospitalSelector" class="input">
                                      <option value="">請先選取地區
                                  </select>
                                  <!-- <br><br>日期 :  <input id="date" class="Time" type="date"> -->
                              <!-- <input type="text" class="form-control"  id="inputHospitalName" placeholder="輸入服務醫院">  -->
                      </div>

                      <div class="form-group">
                          <label for="inputDepartment">*科別</label>
                          <select class="form-control" id="department" required>
                            <option value="1">不分科</option>
                            <option value="2">家醫科</option>
                            <option value="3">內科</option>
                            <option value="4">外科</option>
                            <option value="5">小兒科</option>
                            <option value="6">婦產科</option>
                            <option value="7">骨科</option>
                            <option value="8">神經外科</option>
                            <option value="9">泌尿科</option>
                            <option value="10">耳鼻喉科</option>
                            <option value="11">眼科</option>
                            <option value="12">皮膚科</option>
                            <option value="13">神經科</option>
                            <option value="14">精神科</option>
                            <option value="15">復健科</option>
                            <option value="16">整形外科</option>
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="inputDepartment2">科別二</label>
                          <select class="form-control" id="department2">
                          <option value="1">不分科</option>
                            <option value="2">家醫科</option>
                            <option value="3">內科</option>
                            <option value="4">外科</option>
                            <option value="5">小兒科</option>
                            <option value="6">婦產科</option>
                            <option value="7">骨科</option>
                            <option value="8">神經外科</option>
                            <option value="9">泌尿科</option>
                            <option value="10">耳鼻喉科</option>
                            <option value="11">眼科</option>
                            <option value="12">皮膚科</option>
                            <option value="13">神經科</option>
                            <option value="14">精神科</option>
                            <option value="15">復健科</option>
                            <option value="16">整形外科</option>
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="inputServiceTime">*服務時間</label>
                          <p></p>
                            <form>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="time" value="sun" checked>日
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="time" value="mon">一
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="time" value="tue">二
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="time" value="wed">三
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="time" value="thur">四
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="time" value="fri">五
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="time" value="sat">六
                                  </label>
                                  <span class="help-block">可複選</span>
                            </form>
                      </div>
                    
                      <div class="form-group">
                            <label for="inputDNSName" >*姓名</label>
                              <input type="text" class="form-control"  id="inputDNSName" placeholder="輸入姓名" required> 
                      </div>

                      <div class="form-group">
                        <label for="inputSex">*性別</label>
                          <div class="custom-controls-stacked" >
                              <label class="custom-control custom-radio">
                                    <input class="radioSex" name="radio-sex" value="0" type="radio" class="custom-control-input" checked>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">女生</span>
                              </label>
                              <label class="custom-control custom-radio">
                                    <input class="radioSex" name="radio-sex" value="1" type="radio" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">男生</span>
                              </label>
                            </div>
                      </div>

                      <div class="form-group">
                          <label for="inputDNSCellPhone" >*手機</label>
                              <input type="text" class="form-control" id="inputDNSCellPhone" placeholder="輸入手機" required> 
                      </div>
                      <div class="alert alert-success alert-success-cell" style="display:none;">
                          <strong>通過!</strong> 手機格式正確！
                      </div>
                      <div class="alert alert-danger alert-danger-cell" style="display:none;">
                          <strong>錯誤!</strong> 手機格式輸入有誤！
                      </div>
                      <div class="form-group">
                          <label>家裡電話</label>
                              <input type="text" class="form-control" id="formInputTell" placeholder="輸入家裡電話" > 
                      </div>

                      <div class="form-group">
                          <label>公司電話</label>
                              <input type="text" class="form-control" id="formInputOTell" placeholder="輸入公司電話" > 
                      </div>




                      <div class="form-group">
                          <label for="inputDNSEmail">*Email(日後登入的帳號)</label>
                              <input type="email" class="form-control" id="inputDNSEmail" placeholder="輸入Email" required>
                          <span id='result' class="help-block"></span>
                      </div>

                      <div class="alert alert-success alert-success-mail" style="display:none;">
                          <strong>通過!</strong> Email格式正確！
                      </div>

                      <div class="alert alert-danger alert-danger-mail" style="display:none;">
                          <strong>錯誤!</strong> Email格式輸入有誤！
                      </div>
                      <div class="form-group">
                          <label for="IDNumber" >*身份證(日後登入的密碼)</label>
                              <input type="text" class="form-control" id="inputIDNumber" placeholder="輸入身分證字號" required> 
                      </div>
                      <div class="alert alert-success alert-success-userid" style="display:none;">
                          <strong>通過!</strong> 格式正確！
                      </div>

                      <div class="alert alert-danger alert-danger-userid" style="display:none;">
                          <strong>錯誤!</strong> 格式有誤！
                      </div>
                    
                      <div class="form-group">
                          <label for="inputGender">學歷</label>
                        <div class="custom-controls-stacked">
                            <label class="custom-control custom-radio">
                                  <input id="radioEducation" name="radio-education" value="0" type="radio" class="custom-control-input" checked>
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description">學士</span>
                            </label>
                            <label class="custom-control custom-radio">
                                  <input id="radioEducation" name="radio-education" value="1" type="radio" class="custom-control-input">
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description">碩士</span>
                            </label>
                            <label class="custom-control custom-radio">
                                  <input id="radioEducation" name="radio-education" value="2" type="radio" class="custom-control-input">
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description">博士</span>
                            </label>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="inputNational">國籍</label>
                          <select class="form-control" id="country">
                            <option value="tw">台灣</option>
                            <option value="cn">大陸</option>
                            <option value="hk">香港</option>
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="inputServiceArea">*服務地區</label>
                          <p></p>
                            <form>
                                  <label class="checkbox-inline">
                                    <input id="serviceZone" name="zone" type="checkbox" value="tpe" checked>台北
                                  </label>
                                  <label class="checkbox-inline">
                                    <input id="serviceZone" name="zone" type="checkbox" value="tyn">桃園
                                  </label>
                                  <label class="checkbox-inline">
                                    <input id="serviceZone" name="zone" type="checkbox" value="hsz">新竹
                                  </label>
                                  <label class="checkbox-inline">
                                    <input id="serviceZone" name="zone" type="checkbox" value="zmi">苗栗
                                  </label>
                                  <label class="checkbox-inline">
                                    <input id="serviceZone" name="zone" type="checkbox" value="txg">台中
                                  </label>
                                  <label class="checkbox-inline">
                                    <input id="serviceZone" name="zone" type="checkbox" value="chw">彰化
                                  </label>
                                  <label class="checkbox-inline">
                                    <input id="serviceZone" name="zone" type="checkbox" value="cyi">嘉義
                                  </label>
                                  <label class="checkbox-inline">
                                    <input id="serviceZone" name="zone" type="checkbox" value="tnn">台南
                                  </label>
                                  <label class="checkbox-inline">
                                    <input id="serviceZone" name="zone" type="checkbox" value="khh">高雄
                                  </label>
                                  <label class="checkbox-inline">
                                    <input id="serviceZone" name="zone" type="checkbox" value="pif">屏東
                                  </label>
                                  <label class="checkbox-inline">
                                    <input id="serviceZone" name="zone" type="checkbox" value="hun">花蓮
                                  </label>
                                  <label class="checkbox-inline">
                                    <input id="serviceZone" name="zone" type="checkbox" value="ila">宜蘭
                                  </label>
                                  <label class="checkbox-inline">
                                    <input id="serviceZone" name="zone" type="checkbox" value="gni">綠島
                                  </label>
                                  <label class="checkbox-inline">
                                    <input id="serviceZone" name="zone" type="checkbox" value="kyd">蘭嶼
                                  </label>
                                  <span class="help-block">可複選</span>
                            </form>
                      </div>

                      <div class="form-group">
                          <label for="inputAddr">*地址</label>
                              <input type="text" class="form-control" id="inputAddr" placeholder="地址" required>
                      </div>
                      
                      <div class="form-group">
                          <label for="inputDate">*生日</label>
                              <div>
                                  <input class="form-control" type="date" id="birthday" name="bday" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required>
                                  <span class="validity"></span>
                              </div>
                      </div>

                      <div class="form-group">
                          <label for="inputMariage">婚姻</label>
                              <div class="custom-controls-stacked">
                                  <label class="custom-control custom-radio">
                                        <input id="radioMariage" name="radio-mariage" value="0" type="radio" class="custom-control-input" checked>
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
                          <label for="inputLanguege">語言</label>
                          <p></p>
                            <form>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="lang" value="mandarin" checked>國語
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="lang" value="minnan">閩南語
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="lang" value="hakka">客家話
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="lang" value="eng">英語
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="lang" value="jpn">日語
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="lang" value="other">其他
                                  </label>
                                  <span class="help-block">可複選</span>
                            </form>
                      </div>
                      
                      <div class="form-group">
                          <button id="sub" type="submit" class="pure-button pure-button-primary">提交</button>
                      </div>

                  </form>
            </div>

        </div>

    </body>
</html>
