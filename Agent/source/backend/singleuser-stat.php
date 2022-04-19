<?php
include_once '../../../access/connect.php';
session_start();
$id =  58;
$lid = 922;
$data = "";
$query = mysqli_query($connection, "SELECT * FROM bn_agents WHERE agent_id = '$id'");
$count = mysqli_num_rows($query);
$rows = mysqli_fetch_assoc($query);
$getuserac = array();
if ($count == 1) {
    $pid = $rows['project_id'];

    $userquery = mysqli_query($connection, "SELECT * FROM bn_user_activity WHERE lead_id = '$lid'");
    $c = 0;
    while ($row = mysqli_fetch_assoc($userquery)) {
        $c++;
        $cdata = array();
        //Check
        $fp = $row['floor_plan'];
        if ($fp == "" || $fp == null || $fp == 'null') {
        } else {
            $array = explode(',', $fp);
            foreach ($array as $value) {
                $query = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_floorplan WHERE fp_id='$value'"));
                $fptitle = array("fptitle" => $query['fp_title'], "fp_id" => $query['fp_id']);
                array_push($cdata, $fptitle);
            }
        }
        $datas = 0;
        $lid = $row['lead_id'];
        $fpdata = array();
        $fpcount = mysqli_fetch_assoc(mysqli_query($connection, "SELECT MAX(timer),fp_id FROM bn_fp_activity WHERE lead_id='$lid'"));
        $getlead = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_leads WHERE lead_id='$lid'"));
        $perquery = mysqli_query($connection, "SELECT check_property,check_amenities,check_configurations,check_nearby,check_vx,check_images,use_explore,book_siteVisit,read_blog FROM bn_user_activity WHERE lead_id = '$lid'");
        $perquerys = mysqli_fetch_assoc($perquery);
        foreach ($perquerys as $value) {
            $datas += $value;
        }
        $valData = $fpcount['fp_id'];
        $queryFpdata = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_floorplan WHERE fp_id='$valData'"));
        $querydata = array("percentage" => ceil($datas / 9 * 100), "property" => $row['check_property'], "Nearby" => $row['check_nearby'], "Images" => $row['check_images'], "SiteVisit" => $row['book_siteVisit'], "Explore" => $row['use_explore'], "name" => $getlead['name'], "phone" => $getlead['phone'], "floorplan" => $cdata, "cl" => $c, 'maxTimer' => $queryFpdata['fp_title']);
        array_push($getuserac, $querydata);
    }
    if ($getuserac == "" || $getuserac == []) {
        $data = array("status" => "KO", 'message' => "There was an error!");
    } else {
        $data = array("status" => "OK", "data" => $getuserac);
    }
} else {
    $data = array("status" => "KO", 'message' => "There was an error!");
}

echo json_encode($data);
