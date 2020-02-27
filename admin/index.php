<?php 
	require_once('header.php');

	if(isset($_GET["pg"]))
    {
    	$pg = $_GET["pg"];

        if($pg == "m1"){ require_once("m1_receive_new_mail.php"); }
        else if($pg == "d1"){ require_once("d1_add_new_department.php");}
        else if($pg == "m2"){ require_once("m2_send_out_4_charging.php"); }
        else if($pg == "m3"){ require_once("m3_receive_charged_mail.php"); }
        else if($pg == "m4"){ require_once("m4_file_up_mail.php"); }
        else if($pg == "m5"){ require_once("m5_dispatch_mail.php"); }
        else if($pg == "m6"){ require_once("m6_search_out_mail.php"); }
        else if($pg == "f1"){ require_once("f1_open_new_file.php"); }
        else if($pg == "f2"){ require_once("f2_file_movement.php"); }
        else if($pg == "f3"){ require_once("f3_archive_file.php"); }
        else if($pg == "f4"){ require_once("f4_morning_list_guide.php"); }
        else if($pg == "f5"){ require_once("f5_search_out_file.php"); }
        else if($pg == "l1"){ require_once("l1_leave_apply.php"); }
		else if($pg == "l2"){ require_once("l2_leave_request.php"); }
        else if($pg == "l2"){ require_once("l3_leave_roster.php"); }
		else if($pg == "l4"){ require_once("l4_leave_status.php"); }
		else if($pg == "l5"){ require_once("l5_view_leave_requests.php"); }
		else if($pg == "l6"){ require_once("l6_staff_on_leave.php"); }
        else if($pg == "l7"){ require_once("l7_get_leave_trend.php"); }
        else if($pg == "p1"){ require_once("p1_view_profile.php"); }
        else if($pg == "p2"){ require_once("p2_edit_profile.php"); }
        else if($pg == "p3"){ require_once("p3_change_password.php"); }
        else if($pg == "s1"){ require_once("s1_add_new_staff.php");}
		else if($pg == "s2"){ require_once("s2_disposition_list.php");}
		else if($pg == "s3"){ require_once("s3_nominal_roll.php");}
        else if($pg == "s4"){ require_once("s4_search_user.php");}
        else if($pg == "s5"){ require_once("s5_add_user.php");}
        else{ require_once('welcome.php'); }  //Starting out with home page
    }
    else
    {
        require_once('welcome.php');
    }

	require_once('footer.php');
?>