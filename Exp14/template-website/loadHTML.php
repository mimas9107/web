<?php
/**
 * 自訂函式 loadHTML
 * 
 * 此函式接受檔案路徑與可選參數陣列，利用輸出控制擷取 include 檔案內容，
 * 並回傳組合後的 HTML 字串。
 *
 * @param string $file 檔案路徑
 * @param array  $data 傳遞給 include 檔案之變數（例如：['config' => $config]）
 * @return string 載入後的 HTML 內容
 */
function loadHTML($file, $data = array()){
    if(file_exists($file)){
        // 將陣列變數轉換為局部變數
        extract($data);
        ob_start();
        include $file;
        return ob_get_clean();
    }
    return '';
}
?>