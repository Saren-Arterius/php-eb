<?php
$mode = ( isset($_GET['action']) ) ? $_GET['action'] : $_POST['action'];
include('cfu.php');
postHead('');
AuthUser("$Pl_Value[USERNAME]","$Pl_Value[PASSWORD]");
if ($CFU_Time >= $TIMEAUTH+$TIME_OUT_TIME || $TIMEAUTH <= $CFU_Time-$TIME_OUT_TIME){echo "������ʱ��<br>�����µ��룡";exit;}
GetUsrDetails("$Pl_Value[USERNAME]",'Gen','Game');
if ($Game['organization'])
$Pl_Org = ReturnOrg("$Game[organization]");
//Special Commands GUI
if ($mode=='Start'){
        echo "<font style=\"font-size: 12pt\">������֯</font>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        if ($actionb == 'A'){
        echo "<form action=organization.php?action=Start method=post name=mainform>";
        echo "<input type=hidden value='B' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

        echo "<script language=\"Javascript\">";
        echo "function cfmStartOrg(){";
        echo "if ($OrganizingCost > $Gen[cash]){alert('��Ǯ���㡣');return false;}";
        echo "else if (mainform.org_name.value == ''){alert('����������֯���ơ�');return false;}";
        echo "else {if (confirm('������֯��Ҫ ". number_format($OrganizingCost) ." Ԫ��ȷ����')==true){return true;}";
        echo "else {return false;}}";
        echo "}</script>";

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">������֯��������: </b></td></tr>";
        echo "<tr><td align=left>������֯��Ҫ: ". number_format($OrganizingCost) ." Ԫ<br>";
        echo "��֯����: <input type=text name=org_name maxlength=32 size=27><br>(ע�ⲻ�������й�������һ��)<br>";
        echo "������ɫ: <br><center>";
        foreach ($MainColors as $TheColor){$br++;$ct_default++;
        echo "<input type=\"radio\" name=\"org_color\" value=#".$TheColor;
        if ($ct_default==1) echo " checked";
        echo "><font color=#".$TheColor.">��</font>    ";
        if ($br==6){echo"<br>";$br=0;}        }
        echo "<input type=submit value=\"ȷ��������֯\" onClick=\"return cfmStartOrg();\">";
        echo "</tr></td></form></table>";
        }

        if ($actionb == 'B'){
        if ($OrganizingCost > $Gen['cash']){echo "��Ǯ���㡣";postFooter();exit;}
        if ($Gen['fame'] < $OrganizingFame && $Gen['fame'] > $OrganizingNotor){echo "�������㡣";postFooter();exit;}

        $Gen['cash'] -= $OrganizingCost;
        $Gen['fame'] += 10;

        $HistoryWrite = "<font color=\"$Gen[color]\">$Game[gamename]</font> ���� <font color=\"$org_color\">$org_name</font> ��֯������ӭ���������ɼ��뼰�˳���";
        WriteHistory($HistoryWrite);
        //Enter Organization Info
        $sql = ("INSERT INTO ".$GLOBALS['DBPrefix']."phpeb_user_organization (id, name, color) VALUES('$CFU_Time','$org_name','$org_color')");
        mysql_query($sql) or die ('<br><center>δ�����ע��<br>ԭ��:' . mysql_error() . '<br>');

        $org_name = ereg_replace("\<([^\<\>]*)\>",'',$org_name);

        $sql = ("SELECT id FROM `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE name='". $org_name ."'");
        $query = mysql_query($sql) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');
        $New_Org = mysql_fetch_row($query);

        //���� Game Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '100000', `rights` = '1', `organization` = '$New_Org[0]' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
        $query = mysql_query($sql) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');

        //���� General Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `cash` = '$Gen[cash]', `fame` = '$Gen[fame]' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
        $query = mysql_query($sql) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">������֯����ˣ�<br>���µ���������10�㡣<input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        }
}
elseif($mode == 'Employ'){
        if ($actionb == 'C'){
        unset($CancelFlag);
        if (!$Employer){echo "�㱻˭����ѽ��";postFooter;exit;}
        elseif ($Game['rights']=='1'){echo "��ϯ���ܱ����롣";postFooter;exit;}
        else {$Og_Org=$Pl_Org;$Pl_Org = ReturnOrg($Employer);}if (!$Og_Org){$Og_Org =  ReturnOrg('0');}

        if(!ereg('(\!'.$Pl_Value['USERNAME'].'\, )+',$Pl_Org['request_list'])){$EmployMsg = "����֯û����������";$CancelFlag = '1';}
        else{$Pl_Org['request_list'] = ereg_replace('(\!'.$Pl_Value['USERNAME'].'\, )+','',$Pl_Org['request_list']);}

        //���� Org Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `request_list` = '$Pl_Org[request_list]' WHERE `id` = '".$Pl_Org[id]."' LIMIT 1");
        $query = mysql_query($sql) or die ('�޷�ȡ����֯��Ѷ, ԭ��:' . mysql_error() . '<br>');

        //���� General Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `request` = '' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
        $query = mysql_query($sql) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');

        if ($actionc == 'Accept' && !$CancelFlag){
        //���� Game Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '0', `rights` = '0', `organization` = '$Pl_Org[id]' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
        $query = mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
        $EmployMsg = "�ɹ�������֯��";
        $HistoryWrite = "<font color=\"$Og_Org[color]\">$Og_Org[name]</font> �� <font color=\"$Gen[color]\">$Game[gamename]</font> ��������� <font color=\"$Pl_Org[color]\">$Pl_Org[name]</font>��";
        WriteHistory($HistoryWrite);
        }

        elseif ($actionc == 'Refuse' && !$CancelFlag){
        $EmployMsg = "�ɹ��ܾ�������֯��";
        $HistoryWrite = "<font color=\"$Og_Org[color]\">$Og_Org[name]</font> �� <font color=\"$Gen[color]\">$Game[gamename]</font> �ܾ��˼��� <font color=\"$Pl_Org[color]\">$Pl_Org[name]</font>�����롣";
        WriteHistory($HistoryWrite);
        }

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\"><br><br><br>$EmployMsg<input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        postFooter();
        echo "</body>";
        echo "</html>";
        exit;
        } // End of Action C

        echo "<font style=\"font-size: 12pt\">��ļ�˲�</font>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        if ($actionb == 'A'){
        echo "<form action=organization.php?action=Employ method=post name=mainform>";
        echo "<input type=hidden value='B' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

        echo "<script language=\"Javascript\">";
        echo "function cfmEmploy(){";
        echo "if (mainform.EmployTar.value == ''){alert('��������Ҫ�������ˡ�');return false;}";
        echo "else {if (confirm('����Ŀ�������֯��ȷ����')==true){return true;}";
        echo "else {return false;}}";
        echo "}</script>";

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">��ļ�˲�: </b></td></tr>";

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
        echo "<tr><td align=left>�� <select name=EmployTar>$EmployOpt</select><br><input type=submit value=\"����\" onClick=\"return cfmEmploy();\"> ���������š�</td></tr>";

        if(!ereg('(\!'.$Pl_Value['USERNAME'].'\, )+',$Pl_Org['request_list'])){$EmployMsg = "����֯û����������";$CancelFlag = '1';}
        else{$Pl_Org['request_list'] = ereg_replace('(\!'.$Pl_Value['USERNAME'].'\, )+','',$Pl_Org['request_list']);}

        if ($Pl_Org['request_list']){
        echo "<tr><td align=left>δ�õ��ظ���������: <br>";

        $Pl_Org['request_list'] = ereg_replace('!| ','',$Pl_Org['request_list']);
        $List_of_Letters = explode(',',$Pl_Org['request_list']);
        unset($TargetName,$TarInfo);
        foreach($List_of_Letters as $TargetName){
        if ($TargetName){
        $sqle = ("SELECT `".$GLOBALS['DBPrefix']."phpeb_user_game_info`.`gamename`, `".$GLOBALS['DBPrefix']."phpeb_user_organization`.`name`, `".$GLOBALS['DBPrefix']."phpeb_user_organization`.`color` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info`, `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE `".$GLOBALS['DBPrefix']."phpeb_user_game_info`.`username`='". $TargetName ."' AND `".$GLOBALS['DBPrefix']."phpeb_user_game_info`.`organization` = `".$GLOBALS['DBPrefix']."phpeb_user_organization`.`id`");
        $querye = mysql_query($sqle) or die ('�޷�ȡ����Ѷ, ԭ��:' . mysql_error() . '<br>');
        $TarInfo = mysql_fetch_array($querye);
        echo "<font color=\"$TarInfo[color]\">$TarInfo[name] �� $TarInfo[gamename]</font><br>";}
        }
        echo "</td></tr>";
        }
        echo "</form></table>";
        } // End of Action A
        if ($actionb == 'B'){

        if (!$EmployTar || $EmployTar == $Pl_Value['USERNAME']){echo "��Ҫ����˭ѽ��";postFooter;exit;}

        $Pl_Org = ReturnOrg($Game['organization']);

        $Pl_Org['request_list'] .= '!'.$EmployTar.', ';

        //���� Org Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `request_list` = '$Pl_Org[request_list]' WHERE `id` = '".$Game['organization']."' LIMIT 1");
        $query = mysql_query($sql) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');

        $requesttx = "$Pl_Org[name] �� $Game[gamename] ��������������֯�������š�<br>��Ҫ������֯��<br>";
        $requesttx .= "<input type=hidden name=Employer value=\'$Pl_Org[id]\'>";

        //���� General Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `request` = '$requesttx' WHERE `username` = '".$EmployTar."' LIMIT 1");
        $query = mysql_query($sql) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">��֯�������ѷ�����<input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        } // End of Action B
}//End of Employ
elseif ($mode == 'LeaveOrg'){
        if (!$Game['organization'] || $Game['rights']){echo "��������ݲ���������֯��";postFooter;exit;}
        if ($actionb != 'A' && $actionb != 'B' && $actionb != 'C') {echo "δ���嶯����<br>";exit;}
        if ($actionb == 'A'){
                if ($Pl_Org['license'] == 1 || $Pl_Org['license'] == 3)
                        {echo "������֯��������˽�����룬��������뿪�����������ɡ�";postFooter;exit;}
        }
        else {
                if ($Pl_Org['license'] != 1 && $Pl_Org['license'] != 3)
                        {echo "������������";postFooter;exit;}
                if ($actionb == 'C') $Gen['fame'] -= 10;
                $Gen['fame'] = floor($Gen['fame']*0.9);
        }
        //���� Gen Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `fame` = '$Gen[fame]' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
        $query = mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');

        if (abs($Gen['fame']) >= 100){
        $HistoryWrite = "<font color=\"$Gen[color]\">$Game[gamename]</font> ���� <font color=\"$Pl_Org[color]\">$Pl_Org[name]</font>��";
        WriteHistory($HistoryWrite);}

        //���� Game Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '0', `rights` = '0', `organization` = '0' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
        $query = mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">��������֯��<input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        }
//End of LeaveOrg
elseif ($mode == 'LeavePlace'){
        echo "<font style=\"font-size: 12pt\">��λ</font>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        if (!$Game['organization'] || !$Game['rights']){echo "��������ݲ�����λ��";postFooter;exit;}

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
        echo "if (mainform.GiveTar.value == ''){alert('��������Ҫ�ø����ˡ�');return false;}";
        echo "else {if (confirm('��λ��Ŀ�����ȷ����')==true){return true;}";
        echo "else {return false;}}";
        echo "}</script>";

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">��λ����: </b></td></tr>";

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
        echo "<tr><td align=left>����Ȩ��: $RightsTitle <br>����λ������:<select name=GiveTar>$GiveTarOpt</select><br><input type=submit value=\"��λ\" onClick=\"return cfmLeavePlace();\"></td></tr>";
        else echo "<tr><td align=left>����Ȩ��: $RightsTitle <br>û���ʺϵ���ѡ��</td></tr>";
        echo "</form></table>";
        }// Action A End

        elseif ($actionb == 'B'){

        if (!$GiveTar){echo "����ָ��Ŀ�ꡣ";postFooter;exit;}

        $sqlgame = ("SELECT `gamename`,`color` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info`,`".$GLOBALS['DBPrefix']."phpeb_user_general_info` WHERE `".$GLOBALS['DBPrefix']."phpeb_user_game_info`.`username`='". $GiveTar ."'");
        $query_game = mysql_query($sqlgame) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
        $GiveTarOpt = mysql_fetch_array($query_game);

        $HistoryWrite = "<font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> �� <font color=\"$Gen[color]\">$Game[gamename]</font> �� $RightsTitle ֮Ȩ���ø� <font color=\"$GiveTarOpt[color]\">$GiveTarOpt[gamename]</font> ��";
        WriteHistory($HistoryWrite);

        //���� Game Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '100000', `rights` = '1', `organization` = '$Game[organization]' WHERE `username` = '".$GiveTar."' LIMIT 1");
        $query = mysql_query($sql) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');

        //���� Game Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rights` = '0', `organization` = '$Game[organization]' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
        $query = mysql_query($sql) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">��λ����ˣ�<input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";

        }// Action B End


        else {echo "δ���嶯����";}
}//End of LeavePlace

elseif ($mode == 'Break'){
if ($actionb = 'A'){
        if (!$Game['organization'] && $Game['rights'] != '1'){echo "��������ݲ��ܽ�ɢ��֯��";postFooter;exit;}

        $HistoryWrite = "<font color=\"$Gen[color]\">$Game[gamename]</font> �� <font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> ��ɢ�ˡ�";
        WriteHistory($HistoryWrite);

        //���� Game Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '0', `rights` = '0', `organization` = '0' WHERE `organization` = '".$Game['organization']."'");
        $query = mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
        //���� Map Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_map` SET `occupied` = '0' WHERE `occupied` = '".$Game['organization']."'");
        $query = mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
        //���� Org Info
        $sql = ("DELETE FROM `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE id='". $Game['organization'] ."' LIMIT 1");
        $query = mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">��֯�ѱ���ɢ��<input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        }// Action A End
}// End of Break Organization

elseif ($mode == 'Dismiss'){
        echo "<font style=\"font-size: 12pt\">���</font>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        if (!$Game['organization'] || !$Game['rights']){echo "��������ݲ��ܽ�������ˡ�";postFooter;exit;}

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
        echo "if (mainform.GiveTar.value == ''){alert('��������Ҫ��͵��ˡ�');return false;}";
        echo "else {if (confirm('���Ŀ�����ȷ����')==true){return true;}";
        echo "else {return false;}}";
        echo "}</script>";

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">�����Ա: </b></td></tr>";

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
        echo "<tr><td align=left>����Ȩ��: $RightsTitle <br>�ɽ�͵���:<select name=GiveTar>$GiveTarOpt</select><br><input type=submit value=\"���\" onClick=\"return cfmDismiss();\"></td></tr>";
        else echo "<tr><td align=left>����Ȩ��: $RightsTitle <br>û�п��Ա���͵��ˡ�</td></tr>";
        echo "</form></table>";
        }// Action A End

        elseif ($actionb == 'B'){

        if (!$GiveTar){echo "����ָ��Ŀ�ꡣ";postFooter;exit;}

        $sqlgame = ("SELECT `gamename` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` WHERE username='". $GiveTar ."'");
        $qgame = mysql_query($sqlgame) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
        $TarQ = mysql_fetch_array($qgame);

        $HistoryWrite = "<font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> �� <font color=\"$Gen[color]\">$Game[gamename]</font> ����֯�ڵ� <font color=\"$TarQ[color]\">$TarQ[gamename]</font> ����ˡ�";
        WriteHistory($HistoryWrite);


        //���� Game Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '0', `rights` = '0', `organization` = '0' WHERE `username` = '".$GiveTar."' LIMIT 1");
        $query = mysql_query($sql) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">�������ˣ�<input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";

        }// Action B End


        else {echo "δ���嶯����";}
}//End of Dismiss
elseif ($mode == 'JoinOrg'){
        echo "<font style=\"font-size: 12pt\">������֯</font>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        if ($Game['organization']){echo "��������������֯�ˡ�";postFooter;exit;}

        if ($actionb == 'A'){
        echo "<form action=organization.php?action=JoinOrg method=post name=mainform>";
        echo "<input type=hidden value='B' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

        echo "<script language=\"Javascript\">";
        echo "function cfmJoinOrg(){";
        echo "if (mainform.GiveTar.value == ''){alert('��������Ҫ�������֯��');return false;}";
        echo "else {if (confirm('����Ŀ����֯��ȷ����')==true){return true;}";
        echo "else {return false;}}";
        echo "}</script>";

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">������֯�����»�Ա����֯: </b></td></tr>";

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
        echo "<tr><td align=left>�ɼ������֯:<select name=GiveTar>$GiveTarOpt</select><br><input type=submit value=\"����\" onClick=\"return cfmJoinOrg();\"></td></tr>";
        else echo "<tr><td align=left>û�п��Ա��������֯��</td></tr>";
        echo "</form></table>";
        }// Action A End

        elseif ($actionb == 'B'){

        if (!$GiveTar){echo "����ָ��Ҫ�������֯��";postFooter;exit;}

        $Og_Org = ReturnOrg($Game['organization']);
        $Pl_Org = ReturnOrg($GiveTar);

        if (abs($Gen['fame']) >= 100){
        $HistoryWrite = "<font color=\"$Og_Org[color]\">$Og_Org[name]</font> �� <font color=\"$Gen[color]\">$Game[gamename]</font> ���� <font color=\"$Pl_Org[color]\">$Pl_Org[name]</font>��";
        WriteHistory($HistoryWrite);}

        //���� Game Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `rank` = '0', `rights` = '0', `organization` = '".$GiveTar."' WHERE `username` = '".$Pl_Value['USERNAME']."' LIMIT 1");
        $query = mysql_query($sql) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">������֯����ˣ�<input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";

        }// Action B End


        else {echo "δ���嶯����";}
}//End of JoinOrg
elseif ($mode == 'Settings'){
        echo "<font style=\"font-size: 12pt\">��֯�趨</font>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        if (!$Game['organization'] || $Game['rights'] != '1'){echo "���Ȩ�����㡣";postFooter;exit;}

        if ($actionb == 'A'){
        echo "<form action=organization.php?action=ModOrg method=post name=mainform>";
        echo "<input type=hidden value='' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

        echo "<script language=\"Javascript\">";
        echo "function cfmModOrgLi(){";
        echo "if (confirm('�޸���֯���ɶ�, ȷ����')==true){mainform.actionb.value='ModLi';return true;}";
        echo "else {return false;}";
        echo "}</script>";

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">�趨��֯��̬: </b></td></tr>";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">��֯�ʽ�: ".number_format($Pl_Org['funds'])."Ԫ</b></td></tr>";
        echo "<tr><td align=left>��֯���ɶ�:<br><input type=radio name=\"license\" checked value=\"0\">: ���ɼ��롢�˳�<br><input type=radio name=\"license\" value=\"1\">: ���ɼ��룬�����˳�<br><input type=radio name=\"license\" value=\"2\">: ���Ƽ��룬�����˳�<br><input type=radio name=\"license\" value=\"3\">: ���Ƽ��롢�˳�<br>";
        echo "<input type=submit value=\"�趨\" onClick=\"return cfmModOrgLi();\">";
        echo "</td></tr>";

        if ($Pl_Org['funds'] > 1000000){

        echo "<script language=\"Javascript\">";
        echo "function cfmModOrgC(){";
        echo "if (confirm('�� 1,000,000Ԫ �޸���֯����ɫ, ȷ����')==true){mainform.actionb.value='ModC';return true;}";
        echo "else {return false;}";
        echo "}</script>";

        echo "<tr><td align=left>��֯����ɫ:<br>�������ɫ��Ҫʹ�� 1,000,000Ԫ ��֯�ʽ�<br>";
        foreach ($MainColors as $TheColor){$br++;$ct_default++;
        echo "<input type=\"radio\" name=\"org_color\" value=#".$TheColor;
        if ($ct_default==1) echo " checked";
        echo "><font color=#".$TheColor.">��</font>    ";
        if ($br==6){echo"<br>";$br=0;}        }
        echo "<input type=submit value=\"�趨\" onClick=\"return cfmModOrgC();\">";
        echo "</td></tr>";
        }
        if ($Pl_Org['funds'] > 10000000){
        echo "<script language=\"Javascript\">";
        echo "function cfmModOrgN(){";
        echo "if (confirm('�� 10,000,000Ԫ �޸���֯����, ȷ����')==true){mainform.actionb.value='ModN';return true;}";
        echo "else {return false;}";
        echo "}</script>";

        echo "<tr><td align=left>��֯����:<br>������֯������Ҫʹ�� 10,000,000Ԫ ��֯�ʽ�<br>";
        echo "������: <input type=text name=NewOrgName maxlength=32>";
        echo "<input type=submit value=\"�趨\" onClick=\"return cfmModOrgN();\">";
        echo "</td></tr>";
        }
        echo "</form></table>";
        }// Action A End
        else {echo "δ���嶯����";}
}//End of Settings
elseif ($mode == 'ModOrg'){
        if (!$Game['organization'] || $Game['rights'] != '1'){echo "���Ȩ�����㡣";postFooter;exit;}

        if ($actionb == 'ModLi'){
        //���� Org Info
        if ($license > 3 || $license < 0){echo "Hacking Attempt.";postFooter;exit;}
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `license` = '$license' WHERE `id` = '".$Pl_Org['id']."' LIMIT 1");
        $query = mysql_query($sql) or die ('�޷�ȡ����֯��Ѷ, ԭ��:' . mysql_error() . '<br>');
        if ($license == 0) $LiText = "������<b>�����»�Ա</b>������һ�Ա����<b>��������</b>��֯";elseif ($license == 1) $LiText = "������<b>�����»�Ա<b>���뵫<b>���ƻ�Ա�����˳�</b>";
        elseif ($license == 2) $LiText = "������<b>���ٽ����»�Ա</b>���뵫��Ա����<b>��������</b>��֯";elseif ($license == 3) $LiText = "������<b>���ٽ����»�Ա</b>�������<b>���ƻ�Ա�����˳�</b>";
        $HistoryWrite = "<font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> �� <font color=\"$Gen[color]\">$Game[gamename]</font> ������֯".$LiText."��";
        WriteHistory($HistoryWrite);
        }// Action A End
        elseif ($actionb == 'ModC'){
        if (1000000 > $Pl_Org['funds']){echo "��֯�ʽ��㡣";postFooter();exit;}
        if (!$org_color){echo "����ѡ����ɫ��";postFooter();exit;}
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `color` = '$org_color', `funds` = `funds`-1000000 WHERE `id` = '".$Pl_Org['id']."' LIMIT 1");
        $query = mysql_query($sql) or die ('�޷�ȡ����֯��Ѷ, ԭ��:' . mysql_error() . '<br>');
        $Gen['cash']-=1000000;
        $HistoryWrite = "<font color=\"$org_color\">$Pl_Org[name]</font> �� <font color=\"$Gen[color]\">$Game[gamename]</font> ������֯���������ɫ��";
        WriteHistory($HistoryWrite);
        }
        elseif ($actionb == 'ModN'){
        if (10000000 > $Pl_Org['funds']){echo "��֯�ʽ��㡣";postFooter();exit;}
        if (!$NewOrgName){echo "����ѡ����֯���ơ�";postFooter();exit;}
        $NewOrgName = ereg_replace("\<([^\<\>]*)\>",'',$NewOrgName);
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `name` = '$NewOrgName', `funds` = `funds`-10000000 WHERE `id` = '".$Pl_Org['id']."' LIMIT 1");
        $query = mysql_query($sql) or die ('�޷�ȡ����֯��Ѷ, ԭ��:' . mysql_error() . '<br>');
        $HistoryWrite = "<font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> �� <font color=\"$Gen[color]\">$Game[gamename]</font> ������֯����Ϊ <font color=\"$Pl_Org[color]\">$NewOrgName</font> ��";
        WriteHistory($HistoryWrite);
        }
        else {echo "δ���嶯����";}
        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">��֯�趨����ˣ�<input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";

}//End of ModOrg
elseif ($mode == 'CityAtk'){
        echo "<font style=\"font-size: 12pt\">���Լƻ�</font>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        if (!$Game['organization'] || $Game['rights'] != '1'){echo "���Ȩ�����㡣";postFooter;exit;}

        if ($actionb == 'A'){
        echo "<form action=organization.php?action=CityAtk method=post name=mainform>";
        echo "<input type=hidden value='B' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

        echo "<script language=\"Javascript\">";
        echo "function changeDuration(){price.innerText= $Org_War_Cost * mainform.duration.value;}";
        echo "function cfmDeclare(){";
        echo "if ($Pl_Org[funds] < price.innerText){alert('��֯�ʽ��㣡');return false;}";
        echo "else if (confirm('��������ս��, ������')==true){return true;}";
        echo "else {return false;}";
        echo "}</script>";

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">�ƻ������򷢶�ս��: </b></td></tr>";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">��֯�ʽ�: ".number_format($Pl_Org['funds'])."Ԫ</b></td></tr>";
        echo "<tr><td align=left>��Ҫ�ʽ�: ÿСʱ ".number_format($Org_War_Cost)."Ԫ<br>����Ҫ: <span id=price>$Org_War_Cost</span> Ԫ<br>";


        unset($sql,$query,$AtTarPosblty,$nums);
        $sql = ("SELECT `map_id`,`name` FROM `".$GLOBALS['DBPrefix']."phpeb_user_map`,`".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE `occupied`=`id` AND `occupied` != ". $Pl_Org['id']);
        $query = mysql_query($sql) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');
        $nums = mysql_num_rows($query);
        if ($nums){
        while ($AtkInfo = mysql_fetch_array($query))
        {
        $AtTarPosblty .= "<option value='$AtkInfo[map_id]'>$AtkInfo[map_id] ($AtkInfo[name])";
        }

        echo "��<select name=sttimedelay><option value=0>0<option value=6>6<option value=7>7<option value=8>8<option value=9>9<option value=10>10<option value=11>11<option value=12>12<option value=13>13<option value=14>14<option value=15>15<option value=16>16<option value=17>17<option value=18>18</select>Сʱ��";
        echo "��<select name=target>$AtTarPosblty</select> ����<br>";
        echo "ά��<select name=duration onChange=\"changeDuration()\"><option value=1>1<option value=2>2<option value=3>3</select>Сʱ��ս��";
        $DefaultOName = $CFU_Date."��ս��";
        echo "<br>�ж�����: <input type=text name=Opt_Name maxlength=32 value='$DefaultOName'>";
        }
        else {echo "û�пɹ��Եĳ��С�"; $AtkDisabled = ' disabled';}
        echo "<Br><input type=submit value=\"��ս\"$AtkDisabled onClick=\"return cfmDeclare();\">";
        echo "</td></tr></table>";
        }
        elseif ($actionb == 'B'){
        if ($duration > 3){echo "ս��ʱ�����ع�����";postFooter();exit;}
        elseif ($duration < 0){echo "ս��ʱ�����س���";postFooter();exit;}
        if ($sttimedelay > 18 || $sttimedelay < 0){echo "ս����ʱʱ�ʳ���";postFooter();exit;}
        if ($Pl_Org['funds'] < ($Org_War_Cost * $duration)){echo "��֯�ʽ��㡣";postFooter();exit;}
        if ($Pl_Org['opttime'] > $CFU_Time){echo "��һ�ε�ս����û��ᣡ";postFooter();exit;}

        $StartTime = $CFU_Time + $sttimedelay * 3600;
        $EndTime = $StartTime + $duration * 3600;
        $Cost = $Org_War_Cost * $duration;
        if ($Cost < 0){echo "Hacking Attempt��";postFooter();exit;}

        $HistoryWrite = "<font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> �� $target ������ս��";
        WriteHistory($HistoryWrite);

        unset($sql,$query);
        $sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_map` WHERE `map_id` = '$target'");
        $query = mysql_query($sql) or die(mysql_error());

        unset($sql);
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `funds` = `funds`-$Cost, `optmissioni` = 'Atk=($target)', `opttime` = '$EndTime', `optstart` = '$StartTime', `operation` = '$Opt_Name' WHERE `id` = '$Game[organization]' LIMIT 1;");
        mysql_query($sql);

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">ս�������ˣ�<input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        }

        else {echo "δ���嶯����";}
}//End of CityAtk


elseif ($mode == 'TakeCity'){
        echo "<font style=\"font-size: 12pt\">��������</font>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        if (!$Game['organization'] || $Game['rights'] != '1'){echo "���Ȩ�����㡣";postFooter;exit;}
        if ($Pl_Game['status']){echo "�����У��޷���������";postFooter();exit;}
        $Area = ReturnMap("$Gen[coordinates]");
        if ($Area["User"]["hp"] > 0){echo "�޷�����������Ȼ�ео��ر��š�";postFooter();exit;}
        if (ereg_replace('(Atk=\()|\)','',$Pl_Org['optmissioni']) != $Gen['coordinates'] && $CFU_Time > $Pl_Org['opttime'])
        {echo "�޷���������û�жԴ˵�����ս��";postFooter();exit;}

        if ($Area["Sys"]["occprice"] > $Pl_Org['funds']){echo "��֯�ʽ��㣡���܁�������";postFooter();exit;}

        if ($actionb == 'A'){
        echo "<form action=organization.php?action=TakeCity method=post name=mainform>";
        echo "<input type=hidden value='B' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

        echo "<script language=\"Javascript\">";
        echo "function cfmOccupy(){";
        echo "if ($Pl_Org[funds] < ".$Area["Sys"]["occprice"]."){alert('��֯�ʽ��㣡');return false;}";
        echo "else if (confirm('�� ".$Area["Sys"]["occprice"]." �׵ش˵���, ������')==true){return true;}";
        echo "else {return false;}";
        echo "}</script>";
        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">���������: </b></td></tr>";

        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">����: $Gen[coordinates]</b><br>";
        echo "��֯�ʽ�: ".number_format($Pl_Org['funds'])."Ԫ<br>";
        echo "�������: ".number_format($Area["Sys"]["occprice"])."Ԫ<br>";
        $Area_At = $Area["Sys"]["at"] + 20;
        $Area_De = $Area["Sys"]["de"] + 25;
        $Area_Ta = $Area["Sys"]["ta"] + 100;
        echo "Ҫ����������:<br>HP����: ". $Area["Sys"]["hpmax"];
        echo "<br>������: $Area_At ������: $Area_De ����: $Area_Ta<br>";
        GetWeaponDetails($Area["Sys"]["wepa"],'FortDfltWep');
        echo "��������: $FortDfltWep[name]<br>";
        echo "<input type=submit value=��������� onClicl=\"return cfmOccupy()\">";
        echo "</td></tr>";
        echo "</form></table>";
        }
        elseif ($actionb == 'B'){

        $HistoryWrite = "<font color=\"$Pl_Org[color]\">$Pl_Org[name]</font> �ɹ�\�� $Gen[coordinates] ����ռ���ˣ�";
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
        echo "<p align=center style=\"font-size: 16pt\">�ɹ�\�����˴�����<input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        }

        else {echo "δ���嶯����";}
}//End of TakeCity

else {echo "δ���嶯����";}
postFooter();
echo "</body>";
echo "</html>";
exit;
?>