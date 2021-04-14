<?php
//初始化

$ch = curl_init();
//設定選項，包括URL

// curl_setopt($ch, CURLOPT_URL, "https://data.coa.gov.tw/Service/OpenData/TransService.aspx?UnitId=tR9TIFWlvquB");
curl_setopt($ch, CURLOPT_URL, "https://od.cdc.gov.tw/eic/Weekly_Age_County_Gender_19CoV.csv");
// curl_setopt($ch, CURLOPT_URL, "https://od.cdc.gov.tw/eic/Weekly_Age_County_Gender_19CoV.json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);

//執行並獲取HTML文件內容
$output = curl_exec($ch);

//釋放curl控制代碼
curl_close($ch);

//轉換csv檔案為json格式並輸出
$array = array_map("str_getcsv", explode("\n", $output));
echo json_encode($array);

//列印獲得的資料
// echo $output;
