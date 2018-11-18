<?php

use Illuminate\Database\Seeder;
use App\Models\Division;

class DivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $divisions = [
            ['no' => '00','name' => '不分科'],
            ['no' => '01','name' => '家醫科'],
            ['no' => '02','name' => '內科'],
            ['no' => '03','name' => '外科'],
            ['no' => '04','name' => '小兒科'],
            ['no' => '05','name' => '婦產科'],
            ['no' => '06','name' => '骨科'],
            ['no' => '07','name' => '神經外科'],
            ['no' => '08','name' => '泌尿科'],
            ['no' => '09','name' => '耳鼻喉科'],
            ['no' => '10','name' => '眼科'],
            ['no' => '11','name' => '皮膚科'],
            ['no' => '12','name' => '神經科'],
            ['no' => '13','name' => '精神科'],
            ['no' => '14','name' => '復健科'],
            ['no' => '15','name' => '整形外科'],
            ['no' => '22','name' => '急診醫學科'],
            ['no' => '23','name' => '職業醫學科'],
            ['no' => '40','name' => '牙科'],
            ['no' => '60','name' => '中醫'],
            ['no' => '81','name' => '麻醉科'],
            ['no' => '82','name' => '放射線科'],
            ['no' => '83','name' => '病理科'],
            ['no' => '84','name' => '核醫科'],

            ['no' => '2A','name' => '結核科'],
            ['no' => '2B','name' => '洗腎科'],
            ['no' => 'AA','name' => '消化內科'],
            ['no' => 'AB','name' => '心臟血管內科'],
            ['no' => 'AC','name' => '胸腔內科'],
            ['no' => 'AD','name' => '腎臟內科'],
            ['no' => 'AE','name' => '風濕免疫科'],
            ['no' => 'AF','name' => '血液腫瘤科'],
            ['no' => 'AG','name' => '內分泌科'],
            ['no' => 'AH','name' => '感染科'],
            ['no' => 'AI','name' => '潛醫科'],
            ['no' => 'AJ','name' => '胸腔暨重症加護科'],

            ['no' => 'BA','name' => '直腸外科'],
            ['no' => 'BB','name' => '心臟血管外科'],
            ['no' => 'BC','name' => '胸腔外科'],
            ['no' => 'BD','name' => '消化外科'],
            ['no' => 'CA','name' => '小兒外科'],
            ['no' => 'CB','name' => '新生兒科科'],
            ['no' => 'DA','name' => '疼痛科'],
            ['no' => 'EA','name' => '居家照護'],
            ['no' => 'FA','name' => '放射診斷科'],
            ['no' => 'FB','name' => '放射腫瘤科'],
            ['no' => 'GA','name' => '口腔顏面外科'],
            ['no' => 'HA','name' => '脊椎骨科'],



        ];

        // 

        foreach ($divisions as $division) {
            Division::create($division);
        }
    }
}
