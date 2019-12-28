<?php
/**
 * Your file description
 *
 * @version 0.1.0
 * @author ying-huei
 * @date 2019/12/28
 * @since 2019/12/28 description
 */

class_alias(require_once('Eloquent/database.php'), 'DB');
header('Content-Type: application/json; charset=UTF-8');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    /** 初始化 */
    $place = $_POST['place'];
    $type = isset($_POST['type']) ? 1 : 0;
    $is_home = isset($_POST['is_home']) ? 1 : 0;
    $is_money = isset($_POST['is_money']) ? 1 : 0;
    $is_truth = isset($_POST['is_truth']) ? 1 : 0;
    // 查詢
    $result = DB::table('card')
        ->select(['name', 'type', 'place'])
        ->where('place', $place);
    if ($type) {
        $result = $result->where('type', $type);
    }
    if ($is_home) {
        $result = $result->where('is_home', $is_home);
    }
    if ($is_money) {
        $result = $result->where('is_money', $is_money);
    }
    if ($is_truth) {
        $result = $result->where('is_truth', $is_truth);
    }
    $result = $result->get();
    /** 如果搜尋結果為0，則從其他隨機抽 */
    if ($result->count() == 0) {
        $result = DB::table('card')
            ->select(['name', 'type', 'place'])
            ->where('place', 4)->get()->random();
    } else {
        $result = $result->random();
    }

    //回傳 nickname 和 gender json 資料
    echo json_encode(array(
        'name' => $result->name,
        'type' => $result->type,
        'place' => $result->place
    ));
} else {
    //回傳 errorMsg json 資料
    echo json_encode(array(
        'errorMsg' => '請求無效，只允許 POST 方式訪問！'
    ));
}