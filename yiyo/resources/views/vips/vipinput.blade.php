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
                <form >
                <!-- onsubmit="return false" -->
                  <!-- <div class="form-group">
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
                  </div> -->

                 
                <!-- <div class="form-group">
                    <label>*帳號</label> <b id="warning" style="color:red">有 * 為必填項目</b>
                        <input type="text" class="form-control" id="formInputAccount" placeholder="輸入帳號" required> 
                </div> -->
                




                  <div class="form-group">
                      <label for="formGroupExampleInput" >*姓名</label> <b id="nName" class="need">*請輸入姓名</b>
                          <input type="text" class="form-control"  id="formInputName" placeholder="輸入VIP姓名" required> 
                  </div>

                  <div class="form-group">
                      <label for="formGroupExampleInput2" >*手機</label>
                          <input type="text" class="form-control" id="formInputCell" placeholder="輸入手機" required> 
                  </div>

                  <div class="form-group">
                      <label>*家裡電話</label>
                          <input type="text" class="form-control" id="formInputTell" placeholder="輸入家裡電話" required> 
                  </div>

                  <div class="form-group">
                      <label>*公司電話</label>
                          <input type="text" class="form-control" id="formInputOTell" placeholder="輸入公司電話" required> 
                  </div>

                   <div class="form-group">
                      <label for="formGroupExampleInputVocation" >*職業</label> <b id="nOccu" class="need">*請輸入職業</b>
                          <input type="text" class="form-control"  id="occupation" placeholder="輸入職業" required> 
                  </div>
                 
                 
                  
                  <div class="form-group">
                      <label for="inputEmail">*Email(日後登入的帳號)</label> <b id="nMail" class="need">*請輸入Email(帳號)</b>
                          <input type="email" class="form-control" id="formInputEmail" placeholder="輸入Email" required>
                  </div>

                  <div class="form-group">
                      <label for="formGroupExampleInput1" >*身份證(日後登入的密碼)</label> <b id="nID" class="need">*請輸入身分證(密碼)</b>
                          <input type="text" class="form-control" id="formInputID" placeholder="輸入身分證字號" required> 
                  </div>
                  <!-- <div class="form-group">
                    <label>*密碼</label>
                        <input type="password" class="form-control" id="formInputPassword" placeholder="輸入密碼" required> 
                  </div>
                <div class="form-group">
                    <label>*確認密碼</label>
                        <input type="password" class="form-control" id="formInputConfirmPassword" placeholder="輸入確認密碼" required> 
                </div> -->

                  <!-- <div class="form-group">
                      <label for="inputEmail">Email2</label>
                          <input type="email" class="form-control" id="formInputEmail" placeholder="輸入Email2">
                  </div> -->
                
                   <div class="form-group">
                      <label for="inputSex">*性別</label> <b id="nSex" class="need">*請選擇性別</b>
                         <div class="custom-controls-stacked" >
                            <label class="custom-control custom-radio">
                                  <input class="radioSex" name="radio-sex" value="0" type="radio" class="custom-control-input" checked required>
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
                      <label for="inputHeight" >*身高</label> <b id="nHeight" class="need">*請輸入身高</b>
                          <input type="text" class="form-control" id="inputHeight" placeholder="身高" required>
                  </div>

                  <div class="form-group">
                      <label for="inputWeight">*體重</label> <b id="nWeight" class="need">*請輸入體重</b>
                          <input type="text" class="form-control" id="inputWeight" placeholder="體重" required>
                  </div>

                   <div class="form-group">
                      <label for="inputBlood">*血型</label> <b id="nBlood" class="need">*請選擇血型</b>
                         <div class="custom-controls-stacked">
                            <label class="custom-control custom-radio">
                                  <input class="radioBlood" name="radio-blood" value="0" type="radio" class="custom-control-input" checked required>
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description">A型</span>
                            </label>
                            <label class="custom-control custom-radio">
                                  <input class="radioBlood" name="radio-blood" value="1" type="radio" class="custom-control-input">
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description">B型</span>
                            </label>

                            <label class="custom-control custom-radio">
                                  <input class="radioBlood" name="radio-blood" value="2" type="radio" class="custom-control-input">
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description">AB型</span>
                            </label>

                            <label class="custom-control custom-radio">
                                  <input class="radioBlood" name="radio-blood" value="3" type="radio" class="custom-control-input">
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description">O型</span>
                            </label>

                            <label class="custom-control custom-radio">
                                  <input class="radioBlood" name="radio-blood" value="4" type="radio" class="custom-control-input">
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description">不詳</span>
                            </label>   
                        </div>
                  </div>


                  <div class="form-group">
                      <label for="inputAddr">*地址</label> <b id="nAddr" class="need">*請輸入地址</b>
                          <input type="text" class="form-control" id="inputAddr" placeholder="地址" required>
                          <!-- <input id="inputAddr" value="台北市信義區" class="twaddress" /> -->
                  </div>
                  
                  <div class="form-group">
                      <label for="inputDate">*生日</label> <b id="nBirth" class="need">*請選擇生日</b>
                          <div>
                              <input class="form-control" type="date" id="birthday" name="bday" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                              <span class="validity"></span>
                          </div>
                  </div>

                   <div class="form-group">
                      <label for="inputMariage">*婚姻</label> <b id="nMar" class="need">*請選擇婚姻狀況</b>
                          <div class="custom-controls-stacked">
                              <label class="custom-control custom-radio">
                                    <input class="radioMariage" name="radio-mariage" value="0" type="radio" class="custom-control-input" checked required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">已婚</span>
                              </label>
                              <label class="custom-control custom-radio">
                                    <input class="radioMariage" name="radio-mariage" value="1" type="radio" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">單身</span>
                              </label>
                          </div>
                  </div>

                  <div class="form-group">
                      <label for="inputReligion">*宗教信仰</label> <b id="nRelig" class="need">*請輸入宗教信仰，可填無</b>
                          <input type="text" value="無" class="form-control" id="inputReligion" placeholder="宗教信仰" required>
                  </div>
                
                  <!-- <div class="form-group">
                      <label for="inputProfile">大頭照</label>
                          <input type="file" class="form-control-file" id="inputProfile"">
                  </div> -->

                  <div class="form-group">
                      <label for="inputUrgentName">*緊急聯絡人</label> <b id="nCont" class="need">*請輸入緊急聯絡人</b>
                          <input type="text" class="form-control" id="inputUrgentName" placeholder="聯絡人姓名" required>
                  </div>

                  <div class="form-group">
                      <label for="inputUrgentPhone">*緊急聯絡電話</label> <b id="nContCell" class="need">*請輸入緊急聯絡電話</b>
                          <input type="text" class="form-control" id="inputUrgentPhone" placeholder="緊急聯絡電話" required>
                  </div>

                   <div class="form-group">
                      <label for="inputUrgentRelation">*緊急聯絡人關係</label> <b id="nContRelat" class="need">*請輸入緊急聯絡人關係</b>
                          <input type="text" class="form-control" id="inputUrgentRelation" placeholder="緊急聯絡人關係" required>
                  </div>

                  <div class="form-group">
                      <label for="inputUrgentAddr">*緊急聯絡人地址</label> <b id="nContAddr" class="need">*請輸入緊急聯絡人地址</b>
                          <input type="text" class="form-control" id="inputUrgentAddr" placeholder="緊急聯絡人地址" required> 
                  </div>

                  

                  <div class="form-group">
                        <label for="inputLifeStyle">生活型態</label>
                        <p></p>
                           
                          <label class="checkbox-inline">
                            <input class="lifeStyle" name="lifestyle" type="checkbox" value="smoke">抽菸
                          </label>
                          <label class="checkbox-inline">
                            <input class="lifeStyle" name="lifestyle" type="checkbox" value="tyn">喝酒
                          </label>
                          <label class="checkbox-inline">
                            <input class="lifeStyle" name="lifestyle" type="checkbox" value="hsz">吃檳榔
                          </label>
                          <label class="checkbox-inline">
                            <input class="lifeStyle" name="lifestyle" type="checkbox" value="zmi">熬夜
                          </label>
                          <label class="checkbox-inline">
                            <input class="lifeStyle" name="lifestyle" type="checkbox" value="txg">暴飲暴食
                          </label>
                          <span class="help-block">可複選</span>
                           
                    </div>


                    <div class="form-group">
                        <label for="inputLifeStyle">相關病史</label>
                        <p></p>
                           
                          <label class="checkbox-inline">
                            <input class="lifeStyle" name="lifestyle" type="checkbox" value="tpe">高血壓
                          </label>
                          <label class="checkbox-inline">
                            <input class="lifeStyle" name="lifestyle" type="checkbox" value="tyn">中風
                          </label>
                          <label class="checkbox-inline">
                            <input class="lifeStyle" name="lifestyle" type="checkbox" value="hsz">心臟病
                          </label>
                          <label class="checkbox-inline">
                            <input class="lifeStyle" name="lifestyle" type="checkbox" value="zmi">糖尿病
                          </label>
                          <label class="checkbox-inline">
                            <input class="lifeStyle" name="lifestyle" type="checkbox" value="txg">骨質疏鬆
                          </label>
                          <label class="checkbox-inline">
                            <input class="lifeStyle" name="lifestyle" type="checkbox" value="tpe">B肝
                          </label>
                          <label class="checkbox-inline">
                            <input class="lifeStyle" name="lifestyle" type="checkbox" value="tyn">C肝
                          </label>
                          <label class="checkbox-inline">
                            <input class="lifeStyle" name="lifestyle" type="checkbox" value="hsz">痛風
                          </label>
                          <label class="checkbox-inline">
                            <input class="lifeStyle" name="lifestyle" type="checkbox" value="zmi">氣喘
                          </label>
                          <label class="checkbox-inline">
                            <input class="lifeStyle" name="lifestyle" type="checkbox" value="txg">關節炎
                          </label>
                             <label class="checkbox-inline">
                            <input class="lifeStyle" name="lifestyle" type="checkbox" value="tpe">食物過敏
                          </label>
                          <label class="checkbox-inline">
                            <input class="lifeStyle" name="lifestyle" type="checkbox" value="tyn">藥物過敏
                          </label>
                          <label class="checkbox-inline">
                            <input class="lifeStyle" name="lifestyle" type="checkbox" value="hsz">環境過敏
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
                      <label for="inputDisabilites">*殘障手冊</label> <b id="nHandic" class="need">*請選擇是否有殘障手冊</b>
                         <div class="custom-controls-stacked">
                            <label class="custom-control custom-radio">
                                  <input class="radioDisabilites" name="radio-disabilites" value="0" type="radio" class="custom-control-input" checked required>
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description">無</span>
                            </label>
                            <label class="custom-control custom-radio">
                                  <input class="radioDisabilites" name="radio-disabilites" value="1" type="radio" class="custom-control-input">
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description">有</span>
                            </label>
                          </div>
                  </div>


                    <div class="form-group">
                        <button id="sub" type="submit" class="pure-button pure-button-primary">提交</button>
                    </div>
                    
                </form>
            </div>
        </div>

         
    </body>
</html>
