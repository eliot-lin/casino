<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>DNS 資料建檔</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <script type="text/javascript" src="{{ URL::asset('js/dnsinput.js') }}"></script>
          <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <body>

        <div class="container">

            <div class="panel panel-info">

                <div class="panel-heading">
                    <h6 class="panel-title">
                        DNS 資料建檔
                    </h6>
                </div>

                <div class="panel-body">
                    <!-- loadfromdb -->   
                    <div class="form-group">
                        <label for="inputVocation">職業</label>
                            <div class="custom-controls-stacked">
                                <label class="custom-control custom-radio">
                                      <input id="inputVocation" name="radio-vocational" value="0" type="radio" class="custom-control-input">
                                      <span class="custom-control-indicator"></span>
                                      <span class="custom-control-description">醫師</span>
                                </label>
                                <label class="custom-control custom-radio">
                                      <input id="inputVocation" name="radio-vocational" value="1" type="radio" class="custom-control-input">
                                      <span class="custom-control-indicator"></span>
                                      <span class="custom-control-description">NP</span>
                                </label>
                            </div>
                    </div>
                    <!-- loadfromdb -->   
                    <div class="form-group">
                        <label for="inputRelationship">合作關係</label>
                            <div class="custom-controls-stacked">
                                <label class="custom-control custom-radio">
                                      <input id="inputCooperationRelationship" name="radio-cooperation" value="0" type="radio" class="custom-control-input">
                                      <span class="custom-control-indicator"></span>
                                      <span class="custom-control-description">簽約</span>
                                </label>
                                <label class="custom-control custom-radio">
                                      <input id="inputCooperationRelationship" name="radio-cooperation" value="1" type="radio" class="custom-control-input">
                                      <span class="custom-control-indicator"></span>
                                      <span class="custom-control-description">合作</span>
                                </label>
                                <label class="custom-control custom-radio">
                                      <input id="inputCooperationRelationship" name="radio-cooperation" value="2" type="radio" class="custom-control-input">
                                      <span class="custom-control-indicator"></span>
                                      <span class="custom-control-description">友好</span>
                                </label>
                            </div>
                    </div>
                    <!-- loadfromdb -->
                    <div class="form-group">
                        <label for="inputServiceTime">簽約服務內容</label>
                        <p></p>
                           <form>
                                <label class="checkbox-inline">
                                  <input type="checkbox" name="contract" value="consult">諮詢
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" name="contract" value="visit">出診
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" name="contract" value="hospital">住院
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" name="contract" value="hospital">陪診
                                </label>
                                <span class="help-block">可複選</span>
                           </form>
                    </div>
                  
                    <div class="form-group">
                           <label for="inputDNSName" >姓名</label>
                            <input type="text" class="form-control"  id="inputDNSName" placeholder="輸入姓名"> 
                    </div>

                    <div class="form-group">
                        <label for="inputDNSCellPhone" >手機</label>
                            <input type="text" class="form-control" id="inputDNSCellPhone" placeholder="輸入手機"> 
                    </div>
                   
                    <div class="form-group">
                        <label for="IDNumber" >身份證</label>
                            <input type="text" class="form-control" id="inputIDNumber" placeholder="輸入身分證字號"> 
                    </div>
                   
                    
                    <div class="form-group">
                        <label for="inputDNSEmail">Email</label>
                            <input type="email" class="form-control" id="inputDNSEmail" placeholder="輸入Email">
                    </div>
                  
                     <div class="form-group">
                        <label for="inputGender">學歷</label>
                       <div class="custom-controls-stacked">
                          <label class="custom-control custom-radio">
                                <input id="radioEducation" name="radio-education" value="0" type="radio" class="custom-control-input">
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
                           <label for="inputHospitalName" >服務醫院</label>
                            <input type="text" class="form-control"  id="inputHospitalName" placeholder="輸入服務醫院"> 
                    </div>

                    <div class="form-group">
                        <label for="inputDepartment">科別</label>
                        <select class="form-control" id="department">
                          <option value="00">不分科</option>
                        </select>
                    </div>

                     <div class="form-group">
                        <label for="inputDepartment2">科別二</label>
                        <select class="form-control" id="department2">
                          <option value="00">不分科</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputServiceArea">服務地區</label>
                        <p></p>
                           <form>
                                <label class="checkbox-inline">
                                  <input id="serviceZone" name="zone" type="checkbox" value="tpe">台北
                                </label>
                                <span class="help-block">可複選</span>
                           </form>
                    </div>

                    <div class="form-group">
                        <label for="inputAddr">地址</label>
                            <input type="text" class="form-control" id="inputAddr" placeholder="地址">
                    </div>
                    
                    <div class="form-group">
                        <label for="inputDate">生日</label>
                            <div>
                                <input class="form-control" type="date" id="birthday" name="bday" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                                <span class="validity"></span>
                            </div>
                    </div>

                     <div class="form-group">
                        <label for="inputMariage">婚姻</label>
                            <div class="custom-controls-stacked">
                                <label class="custom-control custom-radio">
                                      <input id="radioMariage" name="radio-mariage" value="married" type="radio" class="custom-control-input">
                                      <span class="custom-control-indicator"></span>
                                      <span class="custom-control-description">已婚</span>
                                </label>
                                <label class="custom-control custom-radio">
                                      <input id="radioMariage" name="radio-mariage" value="single" type="radio" class="custom-control-input">
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
                                  <input type="checkbox" name="lang" value="mandarin">國語
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
                      <button id="sub" type="button" class="btn btn-success">提交</button>
                    </div>
            </div>

        </div>

    </body>
</html>
