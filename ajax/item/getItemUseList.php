<?php
    include_once "../../include/session.php";
    include_once "../../db/connect.php";

    if(isset($_POST['page'])) {
        $page = $_POST['page'];
    } else {
        $page = 1;
    }

    $sql = "SELECT COUNT(*) FROM item_use_log WHERE user_id = '$uid'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);

    $allPost = $row[0];
    $onePage = 5; // 한 페이지에 보여줄 게시글의 수.
    $allPage = ceil($allPost / $onePage); //전체 페이지의 수
    $oneSection = 4; //한번에 보여줄 총 페이지 개수(1 ~ 10, 11 ~ 20 ...)
    $currentSection = ceil($page / $oneSection); //현재 섹션
    $allSection = ceil($allPage / $oneSection); //전체 섹션의 수
    $firstPage = ($currentSection * $oneSection) - ($oneSection - 1); //현재 섹션의 처음 페이지

    if ($allPost == 0){
        $lastPage = 1;
        $currentSection = 1;
        $allSection = 1;    
    } else if($currentSection == $allSection) {
        $lastPage = $allPage; //현재 섹션이 마지막 섹션이라면 $allPage가 마지막 페이지가 된다.
    } else {
        $lastPage = $currentSection * $oneSection; //현재 섹션의 마지막 페이지
    }

    $prevPage = (($currentSection - 1) * $oneSection); //이전 페이지, 11~20일 때 이전을 누르면 10 페이지로 이동.
    $nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1); //다음 페이지, 11~20일 때 다음을 누르면 21 페이지로 이동.
    $currentLimit = ($onePage * $page) - $onePage; //몇 번째의 글부터 가져오는지
    $sqlLimit = ' LIMIT '.$currentLimit .', '.$onePage;

    $sql = "SELECT A.use_date, B.item_name FROM item_use_log A JOIN item_data B
                 WHERE A.user_id = '$uid' AND A.log_state = 'sussece' AND A.item_name = B.item_id
                 ORDER BY A.use_date DESC $sqlLimit";
    $result = mysql_query($sql);

    while($arr = mysql_fetch_array($result)) {
        $itemData["date"] = date("Y-m-d", strtotime($arr["use_date"]));
        $itemData["name"] = $arr["item_name"];
        $itemData["content"] = "-";
        $itemData["amount"] = "-1";

        $itemUseList[] = $itemData;
    }

    $paging["page"] = $page;
    $paging["currentSection"] = $currentSection;
    $paging["allSection"] = $allSection;
    $paging["allPage"] = $allPage;
    $paging["prevPage"] = $prevPage;
    $paging["nextPage"] = $nextPage;
    $paging["lastPage"] = $lastPage;
    $paging["firstPage"] = $firstPage;
    $paging["allPost"] = $allPost;

    echo json_encode(array('itemUseList' => $itemUseList, 'paging' => $paging));
?>