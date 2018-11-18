<?php

use Illuminate\Database\Seeder;
use App\Models\Hospital;

class HospitalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hospitals = [
            ['name' => '中國附醫', 'city_id' => '7', 'website' => 'http://www.cmuh.cmu.edu.tw/web/index.php', 'address' => '台中市北區育德路2號', 'tel' =>'04-22052121', 'level'=>'醫學中心','lat' => '24.157649','lng' => '120.680549'],
            ['name' => '仁愛醫院', 'city_id' => '7', 'website' => 'http://register.vghtc.gov.tw/register/', 'address' => '臺中市大里區東榮路483號', 'tel' =>'04-24819900', 'level'=>'區域醫院','lat' => '25.040274','lng' => '121.519159'],
            ['name' => '台中榮總醫院', 'city_id' => '7', 'website' => 'http://www.vghtc.gov.tw/GipOpenWeb/wSite/mp?mp=1', 'address' => '臺中市西屯區臺灣大道4段1650號', 'tel' =>'04-23592525', 'level'=>'醫學中心','lat' => '25.040274','lng' => '121.519159'],
            ['name' => '台北榮民總醫院', 'city_id' => '2', 'website' => 'https://www.vghtpe.gov.tw/Index.action', 'address' => '臺北市北投區石牌路二段201號', 'tel' =>'02-28712121', 'level'=>'醫學中心','lat' => '25.040274','lng' => '121.519159'],
            ['name' => '台大醫院', 'city_id' => '2', 'website' => 'https://reg.ntuh.gov.tw/webadministration/', 'address' => '臺北市中正區中山南路7', 'tel' =>'02-23123456', 'level'=>'醫學中心','lat' => '25.040274','lng' => '121.519159'],
            ['name' => '馬偕醫院', 'city_id' => '2', 'website' => 'http://www.mmh.org.tw/regis/index_regis.asp', 'address' => '臺北市中山區中山北路二段92號', 'tel' =>'02-25433535', 'level'=>'醫學中心','lat' => '25.040274','lng' => '121.519159'],
            ['name' => '亞東醫院', 'city_id' => '3', 'website' => 'http://www.femh.org.tw/webregs/start.aspx', 'address' => '新北市板橋區南雅南路二段21號、高爾富路300號', 'tel' =>'02-89667000', 'level'=>'醫學中心','lat' => '25.040274','lng' => '121.519159'],
            ['name' => '台北市立聯合醫院仁愛院區', 'city_id' => '2', 'website' => 'http://www.tpech.gov.taipei/ct.asp?xItem=136025&CtNode=14484&mp=109151', 'address' => '臺北市大安區仁愛路四段10號', 'tel' =>'02-27093600', 'level'=>'區域醫院','lat' => '25.040274','lng' => '121.519159'],
            ['name' => '高雄三軍總醫院', 'city_id' => '13', 'website' => 'www', 'address' => '高雄市左營區軍校路553號', 'tel' =>'07-5811648', 'level'=>'區域醫院','lat' => '25.040274','lng' => '121.519159'],
            ['name' => '高雄榮總總醫院', 'city_id' => '13', 'website' => 'http://www.vghks.gov.tw/', 'address' => '高雄市左營區大中一路386號', 'tel' =>'07-3422121', 'level'=>'醫學中心','lat' => '25.040274','lng' => '121.519159'],
            ['name' => '成大醫院', 'city_id' => '12', 'website' => 'http://www.hosp.ncku.edu.tw/tandem/', 'address' => '臺南市北區勝利路138號', 'tel' =>'06-2353535', 'level'=>'醫學中心','lat' => '23.00218','lng' => '120.218987'],
            ['name' => '花蓮慈濟醫院', 'city_id' => '16', 'website' => 'http://hlm.tzuchi.com.tw/', 'address' => '花蓮縣花蓮市中央路三段707號', 'tel' =>'03-8561825', 'level'=>'醫學中心','lat' => '25.040274','lng' => '121.519159'],
            ['name' => '國軍花蓮總醫院', 'city_id' => '16', 'website' => 'http://805.mnd.gov.tw/', 'address' => '花蓮縣新城鄉嘉里路163號', 'tel' =>'03-8263151', 'level'=>'區域醫院','lat' => '25.040274','lng' => '121.519159'],
        ];

        foreach ($hospitals as $hospital) {
            Hospital::create($hospital);
        }
    }
}
