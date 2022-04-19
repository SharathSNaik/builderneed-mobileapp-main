<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include_once '../access/connect.php';
//GET Agent Phone
$phone = $_GET['phone'];

//AGENT DATA
$countAgent = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM bn_agents WHERE bn_ag_phone='$phone'"));
if ($countAgent > 0) {
    $query = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_agents WHERE bn_ag_phone='$phone'"));
    $pid = $query['project_id'];
    $aid = $query['agent_id'];
    $userrole = $query['user_role'];
    if ($userrole == 0) {
        $bquery = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_project WHERE builder_id='$pid'"));
        $pname = $bquery['project_name'];
        $lcount = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM bn_leads WHERE project_id='$pid'"));
        $hotlead = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM bn_leads WHERE project_id='$pid' AND lead_status=6"));
        $tinv = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM bn_inventory WHERE project_id='$pid'"));
        $sitevistcount = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM bn_site_visit_info WHERE sr_id='$pid'"));
        //Leads Per Month
        $userPerMonth = array();
        for ($i = 1; $i <= 12; $i++) {
            $getData = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM bn_leads WHERE project_id='$pid' AND MONTH(created_on)='$i'"));
            $mn = "";
            if ($i == 1) {
                $mn = "Jan";
            } else if ($i == 2) {
                $mn = "Feb";
            } else if ($i == 3) {
                $mn = "Mar";
            } else if ($i == 4) {
                $mn = "Apr";
            } else if ($i == 5) {
                $mn = "May";
            } else if ($i == 6) {
                $mn = "Jun";
            } else if ($i == 7) {
                $mn = "Jul";
            } else if ($i == 8) {
                $mn = "Aug";
            } else if ($i == 9) {
                $mn = "Sep";
            } else if ($i == 10) {
                $mn = "Oct";
            } else if ($i == 11) {
                $mn = "Nov";
            } else if ($i == 12) {
                $mn = "Dec";
            }
            $dataad  = array("$mn" => "$getData");
            array_push($userPerMonth, $dataad);
        }
        //Sitevist Per Month
        $sitePerMonth = array();
        for ($i = 1; $i <= 12; $i++) {
            $getDatas = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM bn_site_visit_info WHERE sr_id='$pid' AND MONTH(created_date)='$i'"));
            $mn = "";
            if ($i == 1) {
                $mn = "Jan";
            } else if ($i == 2) {
                $mn = "Feb";
            } else if ($i == 3) {
                $mn = "Mar";
            } else if ($i == 4) {
                $mn = "Apr";
            } else if ($i == 5) {
                $mn = "May";
            } else if ($i == 6) {
                $mn = "Jun";
            } else if ($i == 7) {
                $mn = "Jul";
            } else if ($i == 8) {
                $mn = "Aug";
            } else if ($i == 9) {
                $mn = "Sep";
            } else if ($i == 10) {
                $mn = "Oct";
            } else if ($i == 11) {
                $mn = "Nov";
            } else if ($i == 12) {
                $mn = "Dec";
            }
            $dataadd  = array("$mn" => "$getDatas");
            array_push($sitePerMonth, $dataadd);
        }
    } else if ($userrole > 0) {
        $bquery = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_project WHERE builder_id='$pid'"));
        $pname = $bquery['project_name'];
        $lcount = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM bn_leads WHERE agent_id = '$aid' AND project_id='$pid'"));
        $hotlead = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM bn_leads WHERE project_id='$pid' AND lead_status=6 AND agent_id = '$aid'"));
        $tinv = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM bn_inventory WHERE project_id='$pid'"));
        $sitevistcount = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM bn_site_visit_info WHERE agent = '$aid' AND sr_id='$pid'"));
        //Leads Per Month
        $userPerMonth = array();
        for ($i = 1; $i <= 12; $i++) {
            $getData = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM bn_leads WHERE agent_id = '$aid' AND project_id='$pid' AND MONTH(created_on)='$i'"));
            $mn = "";
            if ($i == 1) {
                $mn = "Jan";
            } else if ($i == 2) {
                $mn = "Feb";
            } else if ($i == 3) {
                $mn = "Mar";
            } else if ($i == 4) {
                $mn = "Apr";
            } else if ($i == 5) {
                $mn = "May";
            } else if ($i == 6) {
                $mn = "Jun";
            } else if ($i == 7) {
                $mn = "Jul";
            } else if ($i == 8) {
                $mn = "Aug";
            } else if ($i == 9) {
                $mn = "Sep";
            } else if ($i == 10) {
                $mn = "Oct";
            } else if ($i == 11) {
                $mn = "Nov";
            } else if ($i == 12) {
                $mn = "Dec";
            }
            $dataad  = array("$mn" => "$getData");
            array_push($userPerMonth, $dataad);
        }
        //Sitevist Per Month
        $sitePerMonth = array();
        for ($i = 1; $i <= 12; $i++) {
            $getDatas =  mysqli_num_rows(mysqli_query($connection, "SELECT * FROM bn_leads WHERE agent_id = '$aid' AND project_id='$pid' AND MONTH(created_on)='$i'"));
            $mn = "";
            if ($i == 1) {
                $mn = "Jan";
            } else if ($i == 2) {
                $mn = "Feb";
            } else if ($i == 3) {
                $mn = "Mar";
            } else if ($i == 4) {
                $mn = "Apr";
            } else if ($i == 5) {
                $mn = "May";
            } else if ($i == 6) {
                $mn = "Jun";
            } else if ($i == 7) {
                $mn = "Jul";
            } else if ($i == 8) {
                $mn = "Aug";
            } else if ($i == 9) {
                $mn = "Sep";
            } else if ($i == 10) {
                $mn = "Oct";
            } else if ($i == 11) {
                $mn = "Nov";
            } else if ($i == 12) {
                $mn = "Dec";
            }
            $dataadd  = array("$mn" => "$getDatas");
            array_push($sitePerMonth, $dataadd);
        }
    }
    $data = array("status" => "OK", "message" => "Data Fecthed", "project" => $pname, "leadcount" => $lcount, "hotlead" => $hotlead, "totalinventory" => $tinv, "inventorypercent" => 70, "unitsleft" => 15, "activeleads" => 15, "leadChart" => $userPerMonth, "sitevisitChart" => $sitePerMonth, "sitevisitcount" => $sitevistcount, "topPerform" => $tinv, "sitevisitpie" => "27", "conversion" => "73");
} else {
    $data = array("status" => "KO", "message" => "Data Error");
}
echo json_encode($data);
