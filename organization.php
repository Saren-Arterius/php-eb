<?php
$mode = ( isset($_GET['action']) ) ? $_GET['action'] : $_POST['action'];
include('cfu.php');
postHead('');
AuthUser("$Pl_Value[USERNAME]","$Pl_Value[PASSWORD]");
if ($CFU_Time >= $TIMEAUTH+$TIME_OUT_TIME || $TIMEAUTH <= $CFU_Time-$TIME_OUT_TIME){echo "连线逾时！<br>请重新登入！";exit;}
GetUsrDetails("$Pl_Value[USERNAME]",'Gen','Game');
if ($Game['organization'])
$Pl_Org = ReturnOrg("$Game[organization]");
//Special Commands GUI
if ($mode=='Start'){
        echo "<font style=\"font-size: 12pt\">成立组织</font>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        if ($actionb == 'A'){
        echo "<form action=organization.php?action=Start method=post name=mainform>";
        echo "<input type=hidden value='B' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

        echo "<script language=\"Javascript\">";
        echo "function cfmStartOrg(){";
        echo "if ($OrganizingCost > $Gen[cash]){alert('金钱不足。');return false;}";
        echo "else if (mainform.org_name.value == ''){alert('请先输入组织名称。');return false;}";
        echo "else {if (confirm('成立组织需要 ". number_format($OrganizingCost) ." 元，确定吗？')==true){return true;}";
        echo "else {return false;}}";
        echo "}</script>";

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">成立组织所需资料: </b></td></tr>";
        echo "<tr><td align=left>成立组织需要: ". number_format($OrganizingCost) ." 元<br>";
        echo "组织名称: <input type=text name=org_name maxlength=32 size=27><br>(注意不能与现有国家名称一样)<br>";
        echo "代表颜色: <br><center>";
        foreach ($MainColors as $TheColor){$br++;$ct_default++;
        echo "<input type=\"radio\" name=\"org_color\" value=#".$TheColor;
        if ($ct_default==1) echo " checked";
        echo "><font color=#".$TheColor.">◆</font>    ";
        if ($br==6){echo"<br>";$br=0;}        }
        echo "<input type=submit value=\"确定成立组织\" onClick=\"return cfmStartOrg();\">";
        echo "</tr></td></form></table>";
        }

        if ($actionb == 'B'){
        if ($OrganizingCost > $Gen['cash']){echo "金钱不足。";postFooter();exit;}
        if ($Gen['fame'] < $OrganizingFame && $Gen['fame'] > $OrganizingNotor){echo "名声不足。";postFooter();exit;}

        $Gen['cash'] -= $OrganizingCost;
        $Gen['fame'] += 10;

        $HistoryWrite = "<font color=\"$Gen[color]\">$Game[gamename]</font> 创立 <font color=\"$org_color\">$org_name</font> 组织，并欢迎所有人自由加入及退出。";
        WriteHistory($HistoryWrite);
        //Enter Organization Info
        $sql = ("INSERT INTO ".$GLOBALS['DBPrefix']."phpeb_user_organization (id, name, color) VALUES('$CFU_Time','$org_name','$org_color')");
        mysql_query($sql) or die ('<br><center>未能完成注册<br>原因:' . mysql_error() . '<br>');

        $org_name = ereg_replace("\<([^\<\>]*)\>",'',$org_name);

        $sql = ("SELECT id FROM `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE name='". $org_name ."'");
        $query = mysql_query($sql) or die ('无法取得基本资讯, 原因:' . mysql_error() . '<br>');
        $New_Org = mysql_fetch_row($query);

        //更新 Game Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '100000', `rights` = '1', `organization` = '$New_Org[0]' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
        $query = mysql_query($sql) or die ('无法取得基本资讯, 原因:' . mysql_error() . '<br>');

        //更新 General Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `cash` = '$Gen[cash]', `fame` = '$Gen[fame]' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
        $query = mysql_query($sql) or die ('无法取得基本资讯, 原因:' . mysql_error() . '<br>');

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">成立组织完成了！<br>阁下的名聱上升10点。<input type=submit value=\"返回\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        }
}
elseif($mode == 'Employ'){
        if ($actionb == 'C'){
        unset($CancelFlag);
        if (!$Employer){echo "你被谁邀请呀？";postFooter;exit;}
        elseif ($Game['rights']=='1'){echo "主席不能被邀请。";postFooter;exit;}
        else {$Og_Org=$Pl_Org;$Pl_Org = ReturnOrg($Employer);}if (!$Og_Org){$Og_Org =  ReturnOrg('0');}

        if(!ereg('(\!'.$Pl_Value['USERNAME'].'\, )+',$Pl_Org['request_list'])){$EmployMsg = "该组织没有邀请您。";$CancelFlag = '1';}
        else{$Pl_Org['request_list'] = ereg_replace('(\!'.$Pl_Value['USERNAME'].'\, )+','',$Pl_Org['request_list']);}

        //更新 Org Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `request_list` = '$Pl_Org[request_list]' WHERE `id` = '".$Pl_Org[id]."' LIMIT 1");
        $query = mysql_query($sql) or die ('无法取得组织资讯, 原因:' . mysql_error() . '<br>');

        //更新 General Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `request` = '' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
        $query = mysql_query($sql) or die ('无法取得基本资讯, 原因:' . mysql_error() . '<br>');

        if ($actionc == 'Accept' && !$CancelFlag){
        //更新 Game Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '0', `rights` = '0', `organization` = '$Pl_Org[id]' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
        $query = mysql_query($sql) or die ('无法取得游戏资讯, 原因:' . mysql_error() . '<br>');
        $EmployMsg = "成功加入组织！";
        $HistoryWrite = "<font color=\"$Og_Org[color]\">$Og_Org[name]</font> 的 <font color=\"$Gen[color]\">$Game[gamename]</font> 受邀请加入 <font color=\"$Pl_Org[color]\">$Pl_Org[name]</font>。";
        WriteHistory($HistoryWrite);
        }

        elseif ($actionc == 'Refuse' && !$CancelFlag){
        $EmployMsg = "成功拒绝加入组织。";
        $HistoryWrite = "<font color=\"$Og_Org[color]\">$Og_Org[name]</font> 的 <font color=\"$Gen[color]\">$Game[gamename]</font> 拒绝了加入 <font color=\"$Pl_Org[color]\">$Pl_Org[name]</font>的邀请。";
        WriteHistory($HistoryWrite);
        }

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\"><br><br><br>$EmployMsg<input type=submit value=\"返回\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        postFooter();
        echo "</body>";
        echo "</html>";
        exit;
        } // End of Action C

        echo "<font style=\"font-size: 12pt\">招募人才</font>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        if ($actionb == 'A'){
        echo "<form action=organization.php?action=Employ method=post name=mainform>";
        echo "<input type=hidden value='B' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

        echo "<script language=\"Javascript\">";
        echo "function cfmEmploy(){";
        echo "if (mainform.EmployTar.value == ''){alert('请先输入要招揽的人。');return false;}";
        echo "else {if (confirm('邀请目标加入组织，确定吗？')==true){return true;}";
        echo "else {return false;}}";
        echo "}</script>";

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">招募人才: </b></td></tr>";

        unset($sql,$query,$AvailPersons);
        $sql = ("SELECT `username`,`gamename`,`organization` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` WHERE `username` != '".$Pl_Value['USERNAME']."' AND `organization` != '$Game[organization]' AND !`rights` OR !`organization` ORDER BY `organization` ASC");
        $query = mysql_query($sql) or die(mysql_error());
        $AvailPersons = mysql_fetch_array($query);
        do{
        $TarOrg = ReturnOrg($AvailPersons['organization']);
        $EmployOpt .= "<option value='$AvailPersons[username]'>$AvailPersons[gamename] ($TarOrg[name])";
        unset($AvailPersons,$TarOrg);
        }
        while ($AvailPersons = mysql_fetch_array($query));

        if ($EmployOpt)
        echo "<tr><td align=left>向 <select name=EmployTar>$EmployOpt</select><br><input type=submit value=\"邀请\" onClick=\"return cfmEmploy();\"> 发出邀请信。</td></tr>";

        if(!ereg('(\!'.$Pl_Value['USERNAME'].'\, )+',$Pl_Org['request_list'])){$EmployMsg = "该组织没有邀请您。";$CancelFlag = '1';}
        else{$Pl_Org['request_list'] = ereg_replace('(\!'.$Pl_Value['USERNAME'].'\, )+','',$Pl_Org['request_list']);}

        if ($Pl_Org['request_list']){
        echo "<tr><td align=left>未得到回覆的邀请信: <br>";

        $Pl_Org['request_list'] = ereg_replace('!| ','',$Pl_Org['request_list']);
        $List_of_Letters = explode(',',$Pl_Org['request_list']);
        unset($TargetName,$TarInfo);
        foreach($List_of_Letters as $TargetName){
        if ($TargetName){
        $sqle = ("SELECT `".$GLOBALS['DBPrefix']."phpeb_user_game_info`.`gamename`, `".$GLOBALS['DBPrefix']."phpeb_user_organization`.`name`, `".$GLOBALS['DBPrefix']."phpeb_user_organization`.`color` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info`, `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE `".$GLOBALS['DBPrefix']."phpeb_user_game_info`.`username`='". $TargetName ."' AND `".$GLOBALS['DBPrefix']."phpeb_user_game_info`.`organization` = `".$GLOBALS['DBPrefix']."phpeb_user_organization`.`id`");
        $querye = mysql_query($sqle) or die ('无法取得资讯, 原因:' . mysql_error() . '<br>');
        $TarInfo = mysql_fetch_array($querye);
        echo "<font color=\"$TarInfo[color]\">$TarInfo[name] 的 $TarInfo[gamename]</font><br>";}
        }
        echo "</td></tr>";
        }
        echo "</form></table>";
        } // End of Action A
        if ($actionb == 'B'){

        if (!$EmployTar || $EmployTar == $Pl_Value['USERNAME']){echo "你要招揽谁呀？";postFooter;exit;}

        $Pl_Org = ReturnOrg($Game['organization']);

        $Pl_Org['request_list'] .= '!'.$EmployTar.', ';

        //更新 Org Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `request_list` = '$Pl_Org[request_list]' WHERE `id` = '".$Game['organization']."' LIMIT 1");
        $query = mysql_query($sql) or die ('无法取得基本资讯, 原因:' . mysql_error() . '<br>');

        $requesttx = "$Pl_Org[name] 的 $Game[gamename] 向您发出加入组织的邀请信。<br>你要加入组织吗？<br>";
        $requesttx .= "<input type=hidden name=Employer value=\'$Pl_Org[id]\'>";

        //更新 General Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `request` = '$requesttx' WHERE `username` = '".$EmployTar."' LIMIT 1");
        $query = mysql_query($sql) or die ('无法取得基本资讯, 原因:' . mysql_error() . '<br>');

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">组织邀请信已发出。<input type=submit value=\"返回\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        } // End of Action B
}//End of Employ
elseif ($mode == 'LeaveOrg'){
        if (!$Game['organization'] || $Game['rights']){echo "以您的身份不能脱离组织。";postFooter;exit;}
        if ($actionb != 'A' && $actionb != 'B' && $actionb != 'C') {echo "未定义动作！<br>";exit;}
        if ($actionb == 'A'){
                if ($Pl_Org['license'] == 1 || $Pl_Org['license'] == 3)
                        {echo "您的组织不容许你私自脱离，若真的想离开就请您逃亡吧。";postFooter;exit;}
        }
        else {
                if ($Pl_Org['license'] != 1 && $Pl_Org['license'] != 3)
                        {echo "您无需逃亡。";postFooter;exit;}
                if ($actionb == 'C') $Gen['fame'] -= 10;
                $Gen['fame'] = floor($Gen['fame']*0.9);
        }
        //更新 Gen Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `fame` = '$Gen[fame]' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
        $query = mysql_query($sql) or die ('无法取得游戏资讯, 原因:' . mysql_error() . '<br>');

        if (abs($Gen['fame']) >= 100){
        $HistoryWrite = "<font color=\"$Gen[color]\">$Game[gamename]</font> 脱离 <font color=\"$Pl_Org[color]\">$Pl_Org[name]</font>。";
        WriteHistory($HistoryWrite);}

        //更新 Game Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '0', `rights` = '0', `organization` = '0' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
        $query = mysql_query($sql) or die ('无法取得游戏资讯, 原因:' . mysql_error() . '<br>');

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">已脱离组织。<input type=submit value=\"返回\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        }
//End of LeaveOrg
elseif ($mode == 'LeavePlace'){
        echo "<font style=\"font-size: 12pt\">退位</font>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        if (!$Game['organization'] || !$Game['rights']){echo "以您的身份不能退位。";postFooter;exit;}

        if ($Game['rights'] == '1'){$RightsTitle = $RightsClass['Major'];$AllowWho = "`rights` != '1'";}
        elseif ($Game['rights']){$RightsTitle = $RightsClass['Leader'];$AllowWho = "!`rights`";}

        if ($actionb == 'A'){
        echo "<form action=organization.php?action=LeavePlace method=post name=mainform>";
        echo "<input type=hidden value='B' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

        echo "<script language=\"Javascript\">";
        echo "function cfmLeavePlace(){";
        echo "if (mainform.GiveTar.value == ''){alert('请先输入要让给的人。');return false;}";
        echo "else {if (confirm('退位给目标人物，确定吗？')==true){return true;}";
        echo "else {return false;}}";
        echo "}</script>";

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">退位让贤: </b></td></tr>";

        unset($sql,$query,$AvailPersons);
        $sql = ("SELECT `username`,`gamename` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` WHERE `username` != '".$Pl_Value['USERNAME']."'  AND `organization` = '$Game[organization]' AND $AllowWho ORDER BY `rank` DESC");
        $query = mysql_query($sql) or die(mysql_error());
        $AvailPersons = mysql_fetch_array($query);

        do{
        $GiveTarOpt .= "<option value='$AvailPersons[username]'>$AvailPersons[gamename]";
        unset($AvailPersons);
        }
        while ($AvailPersons = mysql_fetch_array($query));

        if ($GiveTarOpt)
        echo "<tr><td align=left>您的权力: $RightsTitle <br>可退位给的人:<select name=GiveTar>$GiveTarOpt</select><br><input type=submit value=\"退位\" onClick=\"return cfmLeavePlace();\"></td></tr>";
        else echo "<tr><td align=left>您的权力: $RightsTitle <br>没有适合的人选。</td></tr>";
        echo "</form></table>";
        }// Action A End

        elseif ($actionb == 'B'){

        if (!$GiveTar){echo "请先指定目标。";postFooter;exit;}

        $sqlgame = ("SELECT `gamename`,`color` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info`,`".$GLOBALS['DBPrefix']."phpeb_user_general_info` WHERE `".$GLOBALS['DBPrefix']."phpeb_user_game_info`.`username`='". $GiveTar ."'");
        $query_game = mysql_query($sqlgame) or die ('无法取得游戏资讯, 原因:' . mysql_error() . '<br>');
        $GiveTarOpt = mysql_fetch_array($query_game);

        $HistoryWrite = "<font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> 的 <font color=\"$Gen[color]\">$Game[gamename]</font> 把 $RightsTitle 之权力让给 <font color=\"$GiveTarOpt[color]\">$GiveTarOpt[gamename]</font> 。";
        WriteHistory($HistoryWrite);

        //更新 Game Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '100000', `rights` = '1', `organization` = '$Game[organization]' WHERE `username` = '".$GiveTar."' LIMIT 1");
        $query = mysql_query($sql) or die ('无法取得基本资讯, 原因:' . mysql_error() . '<br>');

        //更新 Game Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rights` = '0', `organization` = '$Game[organization]' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
        $query = mysql_query($sql) or die ('无法取得基本资讯, 原因:' . mysql_error() . '<br>');

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">退位完成了！<input type=submit value=\"返回\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";

        }// Action B End


        else {echo "未定义动作！";}
}//End of LeavePlace

elseif ($mode == 'Break'){
if ($actionb = 'A'){
        if (!$Game['organization'] && $Game['rights'] != '1'){echo "以您的身份不能解散组织。";postFooter;exit;}

        $HistoryWrite = "<font color=\"$Gen[color]\">$Game[gamename]</font> 把 <font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> 解散了。";
        WriteHistory($HistoryWrite);

        //更新 Game Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '0', `rights` = '0', `organization` = '0' WHERE `organization` = '".$Game['organization']."'");
        $query = mysql_query($sql) or die ('无法取得游戏资讯, 原因:' . mysql_error() . '<br>');
        //更新 Map Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_map` SET `occupied` = '0' WHERE `occupied` = '".$Game['organization']."'");
        $query = mysql_query($sql) or die ('无法取得游戏资讯, 原因:' . mysql_error() . '<br>');
        //消除 Org Info
        $sql = ("DELETE FROM `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE id='". $Game['organization'] ."' LIMIT 1");
        $query = mysql_query($sql) or die ('无法取得游戏资讯, 原因:' . mysql_error() . '<br>');

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">组织已被解散。<input type=submit value=\"返回\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        }// Action A End
}// End of Break Organization

elseif ($mode == 'Dismiss'){
        echo "<font style=\"font-size: 12pt\">解雇</font>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        if (!$Game['organization'] || !$Game['rights']){echo "以您的身份不能解雇其他人。";postFooter;exit;}

        if ($Game['rights'] == '1'){$RightsTitle = $RightsClass['Major'];$AllowWho = "`rights` != '1'";}
        elseif ($Game['rights']){$RightsTitle = $RightsClass['Leader'];$AllowWho = "!`rights`";}

        if ($actionb == 'A'){
        echo "<form action=organization.php?action=Dismiss method=post name=mainform>";
        echo "<input type=hidden value='B' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

        echo "<script language=\"Javascript\">";
        echo "function cfmDismiss(){";
        echo "if (mainform.GiveTar.value == ''){alert('请先输入要解雇的人。');return false;}";
        echo "else {if (confirm('解雇目标人物，确定吗？')==true){return true;}";
        echo "else {return false;}}";
        echo "}</script>";

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">解雇人员: </b></td></tr>";

        unset($sql,$query,$AvailPersons);
        $sql = ("SELECT `username`,`gamename` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` WHERE `username` != '".$Pl_Value['USERNAME']."'  AND `organization` = '$Game[organization]' AND $AllowWho ORDER BY `rank` DESC");
        $query = mysql_query($sql) or die(mysql_error());
        $AvailPersons = mysql_fetch_array($query);

        do{
        $GiveTarOpt .= "<option value='$AvailPersons[username]'>$AvailPersons[gamename]";
        unset($AvailPersons);
        }
        while ($AvailPersons = mysql_fetch_array($query));

        if ($GiveTarOpt)
        echo "<tr><td align=left>您的权力: $RightsTitle <br>可解雇的人:<select name=GiveTar>$GiveTarOpt</select><br><input type=submit value=\"解雇\" onClick=\"return cfmDismiss();\"></td></tr>";
        else echo "<tr><td align=left>您的权力: $RightsTitle <br>没有可以被解雇的人。</td></tr>";
        echo "</form></table>";
        }// Action A End

        elseif ($actionb == 'B'){

        if (!$GiveTar){echo "请先指定目标。";postFooter;exit;}

        $sqlgame = ("SELECT `gamename` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` WHERE username='". $GiveTar ."'");
        $qgame = mysql_query($sqlgame) or die ('无法取得游戏资讯, 原因:' . mysql_error() . '<br>');
        $TarQ = mysql_fetch_array($qgame);

        $HistoryWrite = "<font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> 的 <font color=\"$Gen[color]\">$Game[gamename]</font> 把组织内的 <font color=\"$TarQ[color]\">$TarQ[gamename]</font> 解雇了。";
        WriteHistory($HistoryWrite);


        //更新 Game Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '0', `rights` = '0', `organization` = '0' WHERE `username` = '".$GiveTar."' LIMIT 1");
        $query = mysql_query($sql) or die ('无法取得基本资讯, 原因:' . mysql_error() . '<br>');

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">解雇完成了！<input type=submit value=\"返回\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";

        }// Action B End


        else {echo "未定义动作！";}
}//End of Dismiss
elseif ($mode == 'JoinOrg'){
        echo "<font style=\"font-size: 12pt\">加入组织</font>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        if ($Game['organization']){echo "你已有所属的组织了。";postFooter;exit;}

        if ($actionb == 'A'){
        echo "<form action=organization.php?action=JoinOrg method=post name=mainform>";
        echo "<input type=hidden value='B' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

        echo "<script language=\"Javascript\">";
        echo "function cfmJoinOrg(){";
        echo "if (mainform.GiveTar.value == ''){alert('请先输入要加入的组织。');return false;}";
        echo "else {if (confirm('加入目标组织，确定吗？')==true){return true;}";
        echo "else {return false;}}";
        echo "}</script>";

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">加入组织接受新会员的组织: </b></td></tr>";

        unset($sql,$query,$AvailPersons);
        $sql = ("SELECT `id`,`name` FROM `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE `id` != '0' AND `license` < 2  ORDER BY `id` DESC");
        $query = mysql_query($sql) or die(mysql_error());
        $AvailPersons = mysql_fetch_array($query);

        do{
        $GiveTarOpt .= "<option value='$AvailPersons[id]'>$AvailPersons[name]";
        unset($AvailPersons);
        }
        while ($AvailPersons = mysql_fetch_array($query));

        if ($GiveTarOpt)
        echo "<tr><td align=left>可加入的组织:<select name=GiveTar>$GiveTarOpt</select><br><input type=submit value=\"加入\" onClick=\"return cfmJoinOrg();\"></td></tr>";
        else echo "<tr><td align=left>没有可以被加入的组织。</td></tr>";
        echo "</form></table>";
        }// Action A End

        elseif ($actionb == 'B'){

        if (!$GiveTar){echo "请先指定要加入的组织。";postFooter;exit;}

        $Og_Org = ReturnOrg($Game['organization']);
        $Pl_Org = ReturnOrg($GiveTar);

        if (abs($Gen['fame']) >= 100){
        $HistoryWrite = "<font color=\"$Og_Org[color]\">$Og_Org[name]</font> 的 <font color=\"$Gen[color]\">$Game[gamename]</font> 加入 <font color=\"$Pl_Org[color]\">$Pl_Org[name]</font>。";
        WriteHistory($HistoryWrite);}

        //更新 Game Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '0', `rights` = '0', `organization` = '".$GiveTar."' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
        $query = mysql_query($sql) or die ('无法取得基本资讯, 原因:' . mysql_error() . '<br>');

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">加入组织完成了！<input type=submit value=\"返回\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";

        }// Action B End


        else {echo "未定义动作！";}
}//End of JoinOrg
elseif ($mode == 'Settings'){
        echo "<font style=\"font-size: 12pt\">组织设定</font>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        if (!$Game['organization'] || $Game['rights'] != '1'){echo "你的权力不足。";postFooter;exit;}

        if ($actionb == 'A'){
        echo "<form action=organization.php?action=ModOrg method=post name=mainform>";
        echo "<input type=hidden value='' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

        echo "<script language=\"Javascript\">";
        echo "function cfmModOrgLi(){";
        echo "if (confirm('修改组织自由度, 确定吗？')==true){mainform.actionb.value='ModLi';return true;}";
        echo "else {return false;}";
        echo "}</script>";

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">设定组织组态: </b></td></tr>";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">组织资金: ".number_format($Pl_Org['funds'])."元</b></td></tr>";
        echo "<tr><td align=left>组织自由度:<br><input type=radio name=\"license\" checked value=\"0\">: 自由加入、退出<br><input type=radio name=\"license\" value=\"1\">: 自由加入，限制退出<br><input type=radio name=\"license\" value=\"2\">: 限制加入，自由退出<br><input type=radio name=\"license\" value=\"3\">: 限制加入、退出<br>";
        echo "<input type=submit value=\"设定\" onClick=\"return cfmModOrgLi();\">";
        echo "</td></tr>";

        if ($Pl_Org['funds'] > 1000000){

        echo "<script language=\"Javascript\">";
        echo "function cfmModOrgC(){";
        echo "if (confirm('以 1,000,000元 修改组织代表色, 确定吗？')==true){mainform.actionb.value='ModC';return true;}";
        echo "else {return false;}";
        echo "}</script>";

        echo "<tr><td align=left>组织代表色:<br>更变代表色需要使用 1,000,000元 组织资金。<br>";
        foreach ($MainColors as $TheColor){$br++;$ct_default++;
        echo "<input type=\"radio\" name=\"org_color\" value=#".$TheColor;
        if ($ct_default==1) echo " checked";
        echo "><font color=#".$TheColor.">◆</font>    ";
        if ($br==6){echo"<br>";$br=0;}        }
        echo "<input type=submit value=\"设定\" onClick=\"return cfmModOrgC();\">";
        echo "</td></tr>";
        }
        if ($Pl_Org['funds'] > 10000000){
        echo "<script language=\"Javascript\">";
        echo "function cfmModOrgN(){";
        echo "if (confirm('以 10,000,000元 修改组织名称, 确定吗？')==true){mainform.actionb.value='ModN';return true;}";
        echo "else {return false;}";
        echo "}</script>";

        echo "<tr><td align=left>组织名称:<br>更变组织名称需要使用 10,000,000元 组织资金。<br>";
        echo "新名称: <input type=text name=NewOrgName maxlength=32>";
        echo "<input type=submit value=\"设定\" onClick=\"return cfmModOrgN();\">";
        echo "</td></tr>";
        }
        echo "</form></table>";
        }// Action A End
        else {echo "未定义动作！";}
}//End of Settings
elseif ($mode == 'ModOrg'){
        if (!$Game['organization'] || $Game['rights'] != '1'){echo "你的权力不足。";postFooter;exit;}

        if ($actionb == 'ModLi'){
        //更新 Org Info
        if ($license > 3 || $license < 0){echo "Hacking Attempt.";postFooter;exit;}
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `license` = '$license' WHERE `id` = '".$Pl_Org['id']."' LIMIT 1");
        $query = mysql_query($sql) or die ('无法取得组织资讯, 原因:' . mysql_error() . '<br>');
        if ($license == 0) $LiText = "即日起<b>接受新会员</b>加入而且会员可以<b>自由脱离</b>组织";elseif ($license == 1) $LiText = "即日起<b>接受新会员<b>加入但<b>限制会员自行退出</b>";
        elseif ($license == 2) $LiText = "即日起<b>不再接受新会员</b>加入但会员可以<b>自由脱离</b>组织";elseif ($license == 3) $LiText = "即日起<b>不再接受新会员</b>加入而且<b>限制会员自行退出</b>";
        $HistoryWrite = "<font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> 的 <font color=\"$Gen[color]\">$Game[gamename]</font> 宣佈组织".$LiText."。";
        WriteHistory($HistoryWrite);
        }// Action A End
        elseif ($actionb == 'ModC'){
        if (1000000 > $Pl_Org['funds']){echo "组织资金不足。";postFooter();exit;}
        if (!$org_color){echo "请先选好颜色。";postFooter();exit;}
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `color` = '$org_color', `funds` = `funds`-1000000 WHERE `id` = '".$Pl_Org['id']."' LIMIT 1");
        $query = mysql_query($sql) or die ('无法取得组织资讯, 原因:' . mysql_error() . '<br>');
        $Gen['cash']-=1000000;
        $HistoryWrite = "<font color=\"$org_color\">$Pl_Org[name]</font> 的 <font color=\"$Gen[color]\">$Game[gamename]</font> 宣佈组织更变代表颜色。";
        WriteHistory($HistoryWrite);
        }
        elseif ($actionb == 'ModN'){
        if (10000000 > $Pl_Org['funds']){echo "组织资金不足。";postFooter();exit;}
        if (!$NewOrgName){echo "请先选好组织名称。";postFooter();exit;}
        $NewOrgName = ereg_replace("\<([^\<\>]*)\>",'',$NewOrgName);
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `name` = '$NewOrgName', `funds` = `funds`-10000000 WHERE `id` = '".$Pl_Org['id']."' LIMIT 1");
        $query = mysql_query($sql) or die ('无法取得组织资讯, 原因:' . mysql_error() . '<br>');
        $HistoryWrite = "<font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> 的 <font color=\"$Gen[color]\">$Game[gamename]</font> 宣佈组织更名为 <font color=\"$Pl_Org[color]\">$NewOrgName</font> 。";
        WriteHistory($HistoryWrite);
        }
        else {echo "未定义动作！";}
        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">组织设定完成了！<input type=submit value=\"返回\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";

}//End of ModOrg
elseif ($mode == 'CityAtk'){
        echo "<font style=\"font-size: 12pt\">攻略计划</font>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        if (!$Game['organization'] || $Game['rights'] != '1'){echo "你的权力不足。";postFooter;exit;}

        if ($actionb == 'A'){
        echo "<form action=organization.php?action=CityAtk method=post name=mainform>";
        echo "<input type=hidden value='B' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

        echo "<script language=\"Javascript\">";
        echo "function changeDuration(){price.innerText= $Org_War_Cost * mainform.duration.value;}";
        echo "function cfmDeclare(){";
        echo "if ($Pl_Org[funds] < price.innerText){alert('组织资金不足！');return false;}";
        echo "else if (confirm('即将发动战争, 可以吗？')==true){return true;}";
        echo "else {return false;}";
        echo "}</script>";

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">计划对区域发动战争: </b></td></tr>";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">组织资金: ".number_format($Pl_Org['funds'])."元</b></td></tr>";
        echo "<tr><td align=left>需要资金: 每小时 ".number_format($Org_War_Cost)."元<br>共需要: <span id=price>$Org_War_Cost</span> 元<br>";


        unset($sql,$query,$AtTarPosblty,$nums);
        $sql = ("SELECT `map_id`,`name` FROM `".$GLOBALS['DBPrefix']."phpeb_user_map`,`".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE `occupied`=`id` AND `occupied` != ". $Pl_Org['id']);
        $query = mysql_query($sql) or die ('无法取得基本资讯, 原因:' . mysql_error() . '<br>');
        $nums = mysql_num_rows($query);
        if ($nums){
        while ($AtkInfo = mysql_fetch_array($query))
        {
        $AtTarPosblty .= "<option value='$AtkInfo[map_id]'>$AtkInfo[map_id] ($AtkInfo[name])";
        }

        echo "于<select name=sttimedelay><option value=0>0<option value=6>6<option value=7>7<option value=8>8<option value=9>9<option value=10>10<option value=11>11<option value=12>12<option value=13>13<option value=14>14<option value=15>15<option value=16>16<option value=17>17<option value=18>18</select>小时后";
        echo "向<select name=target>$AtTarPosblty</select> 发动<br>";
        echo "维持<select name=duration onChange=\"changeDuration()\"><option value=1>1<option value=2>2<option value=3>3</select>小时的战争";
        $DefaultOName = $CFU_Date."的战争";
        echo "<br>行动代号: <input type=text name=Opt_Name maxlength=32 value='$DefaultOName'>";
        }
        else {echo "没有可攻略的城市。"; $AtkDisabled = ' disabled';}
        echo "<Br><input type=submit value=\"宣战\"$AtkDisabled onClick=\"return cfmDeclare();\">";
        echo "</td></tr></table>";
        }
        elseif ($actionb == 'B'){
        if ($duration > 3){echo "战争时间严重过长。";postFooter();exit;}
        elseif ($duration < 0){echo "战争时间严重出错。";postFooter();exit;}
        if ($sttimedelay > 18 || $sttimedelay < 0){echo "战争延时时问出错。";postFooter();exit;}
        if ($Pl_Org['funds'] < ($Org_War_Cost * $duration)){echo "组织资金不足。";postFooter();exit;}
        if ($Pl_Org['opttime'] > $CFU_Time){echo "上一次的战争还没完结！";postFooter();exit;}

        $StartTime = $CFU_Time + $sttimedelay * 3600;
        $EndTime = $StartTime + $duration * 3600;
        $Cost = $Org_War_Cost * $duration;
        if ($Cost < 0){echo "Hacking Attempt！";postFooter();exit;}

        $HistoryWrite = "<font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> 对 $target 区域宣战！";
        WriteHistory($HistoryWrite);

        unset($sql,$query);
        $sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_map` WHERE `map_id` = '$target'");
        $query = mysql_query($sql) or die(mysql_error());

        unset($sql);
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `funds` = `funds`-$Cost, `optmissioni` = 'Atk=($target)', `opttime` = '$EndTime', `optstart` = '$StartTime', `operation` = '$Opt_Name' WHERE `id` = '$Game[organization]' LIMIT 1;");
        mysql_query($sql);

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">战争发动了！<input type=submit value=\"返回\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        }

        else {echo "未定义动作！";}
}//End of CityAtk


elseif ($mode == 'TakeCity'){
        echo "<font style=\"font-size: 12pt\">佔领区域</font>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        if (!$Game['organization'] || $Game['rights'] != '1'){echo "你的权力不足。";postFooter;exit;}
        if ($Pl_Game['status']){echo "修理中，无法佔领区域。";postFooter();exit;}
        $Area = ReturnMap("$Gen[coordinates]");
        if ($Area["User"]["hp"] > 0){echo "无法佔领区域，仍然有敌军守备着。";postFooter();exit;}
        if (ereg_replace('(Atk=\()|\)','',$Pl_Org['optmissioni']) != $Gen['coordinates'] && $CFU_Time > $Pl_Org['opttime'])
        {echo "无法佔领区域，没有对此地区宣战。";postFooter();exit;}

        if ($Area["Sys"]["occprice"] > $Pl_Org['funds']){echo "组织资金不足！不能佔领区域。";postFooter();exit;}

        if ($actionb == 'A'){
        echo "<form action=organization.php?action=TakeCity method=post name=mainform>";
        echo "<input type=hidden value='B' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

        echo "<script language=\"Javascript\">";
        echo "function cfmOccupy(){";
        echo "if ($Pl_Org[funds] < ".$Area["Sys"]["occprice"]."){alert('组织资金不足！');return false;}";
        echo "else if (confirm('以 ".$Area["Sys"]["occprice"]." 佔地此地区, 可以吗？')==true){return true;}";
        echo "else {return false;}";
        echo "}</script>";
        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">佔领此区域: </b></td></tr>";

        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">区域: $Gen[coordinates]</b><br>";
        echo "组织资金: ".number_format($Pl_Org['funds'])."元<br>";
        echo "佔领费用: ".number_format($Area["Sys"]["occprice"])."元<br>";
        $Area_At = $Area["Sys"]["at"] + 20;
        $Area_De = $Area["Sys"]["de"] + 25;
        $Area_Ta = $Area["Sys"]["ta"] + 100;
        echo "要塞初期能力:<br>HP上限: ". $Area["Sys"]["hpmax"];
        echo "<br>攻击力: $Area_At 防卫力: $Area_De 命中: $Area_Ta<br>";
        GetWeaponDetails($Area["Sys"]["wepa"],'FortDfltWep');
        echo "防御武器: $FortDfltWep[name]<br>";
        echo "<input type=submit value=佔领此区域 onClicl=\"return cfmOccupy()\">";
        echo "</td></tr>";
        echo "</form></table>";
        }
        elseif ($actionb == 'B'){

        $HistoryWrite = "<font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> 成功\把 $Gen[coordinates] 区域占领了！";
        WriteHistory($HistoryWrite);

        unset($sql,$query);
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_map` SET `hpmax` = '".$Area["Sys"]["hpmax"]."' ,`hp`=`hpmax` ,`at` ='".$Area["Sys"]["at"]."', `de` ='".$Area["Sys"]["de"]."', `ta` ='".$Area["Sys"]["ta"]."', `wepa` ='".$Area["Sys"]["wepa"]."', `occupied` = '$Game[organization]' WHERE `map_id` = '$Gen[coordinates]' LIMIT 1;");
        $query = mysql_query($sql) or die(mysql_error());

        unset($sql);
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `funds` = `funds`-".$Area["Sys"]["occprice"].", `optmissioni` = '', `opttime` = '', `optstart` = '', `operation` = '' WHERE `id` = '$Game[organization]' LIMIT 1;");
        mysql_query($sql);unset($sql);
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `optmissioni` = '', `opttime` = '', `optstart` = '', `operation` = '' WHERE `optmissioni` = '$Gen[coordinates]'");
        mysql_query($sql);

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">成功\佔领了此区域！<input type=submit value=\"返回\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        }

        else {echo "未定义动作！";}
}//End of TakeCity

else {echo "未定义动作！";}
postFooter();
echo "</body>";
echo "</html>";
exit;
?>