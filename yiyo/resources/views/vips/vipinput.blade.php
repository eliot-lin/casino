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
          <link rel="stylesheet" href="{{ asset('css/vipinput.css') }}">
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
                    VIP 資料建檔
                </h6>
            </div>
            <div class="panel-body">
                <form>
                  <div class="form-group">
                      <label for="inputMemberLevel">會員等級</label>
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
                              <label class="custom-control custom-radio">
                                    <input id="radioMemberLevel" value="2" name="radio-MemberLevel" type="radio" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">個人</span>
                              </label>
                          </div>
                  </div>


                  <div class="form-group">
                      <label for="formGroupExampleInput" >姓名</label>
                          <input type="text" class="form-control"  id="formInputName" placeholder="輸入VIP姓名"> 
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
                      <label for="inputHeight">身高</label>
                          <input type="text" class="form-control" id="inputHeight" placeholder="身高">
                  </div>

                  <div class="form-group">
                      <label for="inputWeight">體重</label>
                          <input type="text" class="form-control" id="inputWeight" placeholder="體重">
                  </div>

                   <div class="form-group">
                      <label for="inputBlood">血型</label>
                         <div class="custom-controls-stacked">
                            <label class="custom-control custom-radio">
                                  <input id="radioBlood" name="radio-blood" value="0" type="radio" class="custom-control-input">
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description">A型</span>
                            </label>
                            <label class="custom-control custom-radio">
                                  <input id="radioBlood" name="radio-blood" value="1" type="radio" class="custom-control-input">
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description">B型</span>
                            </label>

                            <label class="custom-control custom-radio">
                                  <input id="radioBlood" name="radio-blood" value="2" type="radio" class="custom-control-input">
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description">AB型</span>
                            </label>

                            <label class="custom-control custom-radio">
                                  <input id="radioBlood" name="radio-blood" value="3" type="radio" class="custom-control-input">
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description">O型</span>
                            </label>

                            <label class="custom-control custom-radio">
                                  <input id="radioBlood" name="radio-blood" value="4" type="radio" class="custom-control-input">
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description">不詳</span>
                            </label>   
                        </div>
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
                      <label for="inputReligion">宗教信仰</label>
                          <input type="text" class="form-control" id="inputReligion" placeholder="宗教信仰">
                  </div>
                
                  <!-- <div class="form-group">
                      <label for="inputProfile">大頭照</label>
                          <input type="file" class="form-control-file" id="inputProfile"">
                  </div> -->

                  <div class="form-group">
                      <label for="inputUrgentName">緊急聯絡人</label>
                          <input type="text" class="form-control" id="inputUrgentName" placeholder="聯絡人姓名">
                  </div>

                  <div class="form-group">
                      <label for="inputUrgentPhone">緊急聯絡電話</label>
                          <input type="text" class="form-control" id="inputUrgentPhone" placeholder="緊急聯絡電話">
                  </div>

                   <div class="form-group">
                      <label for="inputUrgentRelation">緊急聯絡人關係</label>
                          <input type="text" class="form-control" id="inputUrgentRelation" placeholder="緊急聯絡人關係">
                  </div>

                  <div class="form-group">
                      <label for="inputUrgentAddr">緊急聯絡人地址</label>
                          <input type="text" class="form-control" id="inputUrgentAddr" placeholder="緊急聯絡人地址">
                  </div>

                  

                  <div class="form-group">
                        <label for="inputLifeStyle">生活型態</label>
                        <p></p>
                           
                          <label class="checkbox-inline">
                            <input id="lifeStyle" name="lifestyle" type="checkbox" value="smoke">抽菸
                          </label>
                          <label class="checkbox-inline">
                            <input id="lifeStyle" name="lifestyle" type="checkbox" value="tyn">喝酒
                          </label>
                          <label class="checkbox-inline">
                            <input id="lifeStyle" name="lifestyle" type="checkbox" value="hsz">吃檳榔
                          </label>
                          <label class="checkbox-inline">
                            <input id="lifeStyle" name="lifestyle" type="checkbox" value="zmi">熬夜
                          </label>
                          <label class="checkbox-inline">
                            <input id="lifeStyle" name="lifestyle" type="checkbox" value="txg">暴飲暴食
                          </label>
                          <span class="help-block">可複選</span>
                           
                    </div>


                    <div class="form-group">
                        <label for="inputLifeStyle">相關病史</label>
                        <p></p>
                           
                          <label class="checkbox-inline">
                            <input id="lifeStyle" name="lifestyle" type="checkbox" value="tpe">高血壓
                          </label>
                          <label class="checkbox-inline">
                            <input id="lifeStyle" name="lifestyle" type="checkbox" value="tyn">中風
                          </label>
                          <label class="checkbox-inline">
                            <input id="lifeStyle" name="lifestyle" type="checkbox" value="hsz">心臟病
                          </label>
                          <label class="checkbox-inline">
                            <input id="lifeStyle" name="lifestyle" type="checkbox" value="zmi">糖尿病
                          </label>
                          <label class="checkbox-inline">
                            <input id="lifeStyle" name="lifestyle" type="checkbox" value="txg">骨質疏鬆
                          </label>
                          <label class="checkbox-inline">
                            <input id="lifeStyle" name="lifestyle" type="checkbox" value="tpe">B肝
                          </label>
                          <label class="checkbox-inline">
                            <input id="lifeStyle" name="lifestyle" type="checkbox" value="tyn">C肝
                          </label>
                          <label class="checkbox-inline">
                            <input id="lifeStyle" name="lifestyle" type="checkbox" value="hsz">痛風
                          </label>
                          <label class="checkbox-inline">
                            <input id="lifeStyle" name="lifestyle" type="checkbox" value="zmi">氣喘
                          </label>
                          <label class="checkbox-inline">
                            <input id="lifeStyle" name="lifestyle" type="checkbox" value="txg">關節炎
                          </label>
                             <label class="checkbox-inline">
                            <input id="lifeStyle" name="lifestyle" type="checkbox" value="tpe">食物過敏
                          </label>
                          <label class="checkbox-inline">
                            <input id="lifeStyle" name="lifestyle" type="checkbox" value="tyn">藥物過敏
                          </label>
                          <label class="checkbox-inline">
                            <input id="lifeStyle" name="lifestyle" type="checkbox" value="hsz">環境過敏
                          </label>
                          <span class="help-block">可複選</span>
                           
                    </div>

                    <div class="form-group" id="suguryhistory">
                      <label for="formGroupExampleInput1" >手術史</label>
                       <form id="History">
                         <input type="text" class="form-control" id="formInputSurgery" placeholder="年份（西元） + 名稱"> 
                         <p></p>
                       </form>
                    </div>

                     <div class="form-group">
                          <button id="newSurguryHistoryForm" type="button" class="btn btn-primary btn-xs">新增</button>
                    </div>


                    <div class="form-group" id="divdrug">
                        <label for="formGroupExampleInput1" >長期服用藥物</label>
                        <form id="Drug">
                          <input type="text" class="form-control" id="formLongMedicine" placeholder="藥物名稱"> 
                          <p></p>
                        </form>
                      
                    </div>

                    <div class="form-group">
                          <button id="newDrugForm" type="button" class="btn btn-primary btn-xs">新增</button>
                    </div>

                    <div class="form-group">
                      <label for="inputDisabilites">殘障手冊</label>
                         <div class="custom-controls-stacked">
                            <label class="custom-control custom-radio">
                                  <input id="radioDisabilites" name="radio-disabilites" value="false" type="radio" class="custom-control-input">
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description">無</span>
                            </label>
                            <label class="custom-control custom-radio">
                                  <input id="radioDisabilites" name="radio-disabilites" value="true" type="radio" class="custom-control-input">
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description">有</span>
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
