<?php
$mode = ( isset($_GET['action']) ) ? $_GET['action'] : $_POST['action'];
include('cfu.php');
postHead('');
AuthUser("$Pl_Value[USERNAME]","$Pl_Value[PASSWORD]");
if ($CFU_Time >= $TIMEAUTH+$TIME_OUT_TIME || $TIMEAUTH <= $CFU_Time-$TIME_OUT_TIME){echo "������ʱ��<br>�����µ��룡";exit;}
GetUsrDetails("$Pl_Value[USERNAME]",'Gen','Game');
$t_now = time();
if ($t_now - $Gen['btltime'] <= 1){echo "�������졣";postFooter();mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `btltime` = ".intval($t_now+10)." WHERE `username` = '$Gen[username]' LIMIT 1;");exit;}

$Otp_Area_Sql = ("SELECT `name`,`color`,`opttime`,`optstart` FROM `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE `optmissioni` = 'Atk=($Gen[coordinates])' AND `opttime` > '$CFU_Time' ORDER BY `optstart` ASC LIMIT 1");
$Otp_Area_Q = mysql_query($Otp_Area_Sql) or die(mysql_error());
$Otp_A_ITar = mysql_fetch_array($Otp_Area_Q);

if ($Otp_A_ITar){
if ($Otp_A_ITar['optstart'] > $CFU_Time){
$TimeTSSec = $Otp_A_ITar['optstart'] - $CFU_Time;
$TimetS['hours'] = floor($TimeTSSec/3600);
$TimetS['minutes'] = floor(($TimeTSSec - ($TimetS['hours']*3600))/60);
$TimetS['seconds'] = floor($TimeTSSec - ($TimetS['hours']*3600) - ($TimetS['minutes']*60));
$Otp_TellTime = "����$TimetS[hours]Сʱ$TimetS[minutes]����$TimetS[seconds]�뿪ʼս����";
}
else{
$TimeTSSec = $Otp_A_ITar['opttime'] - $CFU_Time;
$TimetS['hours'] = floor($TimeTSSec/3600);
$TimetS['minutes'] = floor(($TimeTSSec - ($TimetS['hours']*3600))/60);
$TimetS['seconds'] = floor($TimeTSSec - ($TimetS['hours']*3600) - ($TimetS['minutes']*60));
$Otp_TellTime = "����$TimetS[hours]Сʱ$TimetS[minutes]����$TimetS[seconds]��ս���������ˡ�";}
}

if ($Otp_A_ITar && $Otp_A_ITar['optstart'] < $CFU_Time){echo "<center>��������ս��״̬�����ɿ�ر��Զ��ս����<br>$Otp_TellTime";postFooter();exit;}

$UsrWepA = explode('<!>',$Game['wepa']);
$UsrWepB = explode('<!>',$Game['wepb']);
$UsrWepC = explode('<!>',$Game['wepc']);
$UsrWepD = explode('<!>',$Game['eqwep']);
$UsrWepE = explode('<!>',$Game['p_equip']);
GetWeaponDetails("$UsrWepA[0]",'UsWep_A');
if ($UsrWepA[2]){
if ($UsrWepA[2]==1) $UsWep_A['name'] = $UsrWepA[3].$UsWep_A['name']."<sub>?</sub>";
else $UsWep_A['name'] = $UsWep_A['name'].$UsrWepA[3]."<sub>?</sub>";
$UsWep_A['atk'] += $UsrWepA[4];
$UsWep_A['hit'] += $UsrWepA[5];
$UsWep_A['rd'] += $UsrWepA[6];
$UsWep_A['enc'] = $UsrWepA[7];
}
$UsWepSpec_A = ReturnSpecs("$UsWep_A[spec]");
GetWeaponDetails("$UsrWepB[0]",'UsWep_B');
if ($UsrWepB[2]){
if ($UsrWepB[2]==1) $UsWep_B['name'] = $UsrWepB[3].$UsWep_B['name']."<sub>?</sub>";
else $UsWep_B['name'] = $UsWep_B['name'].$UsrWepB[3]."<sub>?</sub>";
$UsWep_B['atk'] += $UsrWepB[4];
$UsWep_B['hit'] += $UsrWepB[5];
$UsWep_B['rd'] += $UsrWepB[6];
$UsWep_B['enc'] = $UsrWepB[7];
}
$UsWepSpec_B = ReturnSpecs("$UsWep_B[spec]");
GetWeaponDetails("$UsrWepC[0]",'UsWep_C');
if ($UsrWepC[2]){
if ($UsrWepC[2]==1) $UsWep_C['name'] = $UsrWepC[3].$UsWep_C['name']."<sub>?</sub>";
else $UsWep_C['name'] = $UsWep_C['name'].$UsrWepC[3]."<sub>?</sub>";
$UsWep_C['atk'] += $UsrWepC[4];
$UsWep_C['hit'] += $UsrWepC[5];
$UsWep_C['rd'] += $UsrWepC[6];
$UsWep_C['enc'] = $UsrWepC[7];
}
$UsWepSpec_C = ReturnSpecs("$UsWep_C[spec]");

GetWeaponDetails("$UsrWepD[0]",'UsWep_D');
if ($UsrWepD[2]){
if ($UsrWepD[2]==1) $UsWep_D['name'] = $UsrWepD[3].$UsWep_D['name']."<sub>?</sub>";
else $UsWep_D['name'] = $UsWep_D['name'].$UsrWepD[3]."<sub>?</sub>";
$UsWep_D['atk'] += $UsrWepD[4];
$UsWep_D['hit'] += $UsrWepD[5];
$UsWep_D['rd'] += $UsrWepD[6];
$UsWep_D['enc'] = $UsrWepD[7];
}
$UsWepSpec_D = ReturnSpecs("$UsWep_D[spec]");

GetWeaponDetails("$UsrWepE[0]",'UsWep_E');
if ($UsrWepE[2]){
if ($UsrWepE[2]==1) $UsWep_E['name'] = $UsrWepE[3].$UsWep_E['name']."<sub>?</sub>";
else $UsWep_E['name'] = $UsWep_E['name'].$UsrWepE[3]."<sub>?</sub>";
$UsWep_E['atk'] += $UsrWepE[4];
$UsWep_E['hit'] += $UsrWepE[5];
$UsWep_E['rd'] += $UsrWepE[6];
$UsWep_E['enc'] = $UsrWepE[7];
}
$UsWepSpec_E = ReturnSpecs("$UsWep_E[spec]");

//Hangar GUI
if ($mode=='main'){

        $SQL_Main = ("SELECT `h_id`, `h_user`, `h_msuit`, `h_hp`, `h_hpmax`, `h_en`, `h_enmax`, `h_ms_custom`, `h_wepa`, `h_wepb`, `h_wepc`, `h_eqwep`, `h_p_equip`, `msname`, `atf`, `def`, `ref`, `taf`  FROM `".$GLOBALS['DBPrefix']."phpeb_user_hangar` `h`, `".$GLOBALS['DBPrefix']."phpeb_sys_ms` `ms` WHERE `h_user` = '$Pl_Value[USERNAME]' AND `id` = `h_msuit` ORDER BY `h_id` ASC;");
        $SQL_Query_Main = mysql_query($SQL_Main) or die(mysql_error());
        $NumHangarMS = mysql_num_rows($SQL_Query_Main);

if ($mode=='main' && $actionb == 'procget'){
        $actionc = intval($actionc);
        if ($Gen['msuit']){$ErrorMsg = '���Ȱ��ú�����ʹ�õĻ���!!';}
        elseif ($Game['wepa'] != '0<!>0' || $Game['wepb'] != '0<!>0' || $Game['wepc'] != '0<!>0' || $Game['eqwep'] != '0<!>0'){$ErrorMsg = '���Ȱ��úñ����е�������װ��!!';}
        elseif (!$actionc){$ErrorMsg = '����ѡ��Ŀ�����!!';}
        else {
                $sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_hangar` WHERE `h_id` = '$actionc' AND `h_user` = '$Pl_Value[USERNAME]' LIMIT 1;");
                $sql_query = mysql_query($sql) or die(mysql_error());
                $CountResults = mysql_num_rows($sql_query);
                if ($CountResults != 1) $ErrorMsg = '�Ҳ������塣';
                else {
                        $Hangar = mysql_fetch_array($sql_query);

                        $Eq = explode('<!>',$Hangar['h_eqwep']);
                        $P_Eq = explode('<!>',$Hangar['h_p_equip']);

                        $sql = ("SELECT `spec` FROM `".$GLOBALS['DBPrefix']."phpeb_sys_wep` WHERE id='". $Eq[0] ."'");
                        $query_r = mysql_query($sql);
                        $SyEq = mysql_fetch_array($query_r);

                        $sql = ("SELECT `spec` FROM `".$GLOBALS['DBPrefix']."phpeb_sys_wep` WHERE id='". $P_Eq[0] ."'");
                        $query_r = mysql_query($sql);
                        $SyP_Eq = mysql_fetch_array($query_r);

                        $sql = ("SELECT `spec` FROM `".$GLOBALS['DBPrefix']."phpeb_sys_ms` WHERE id='". $Hangar['h_msuit'] ."'");
                        $query_r = mysql_query($sql);
                        $SyMs = mysql_fetch_array($query_r);

                        if ((ereg('(EXAMSystem)+',$SyEq['spec']) || ereg('(EXAMSystem)+',$SyP_Eq['spec']) || ereg('(EXAMSystem)+',$SyMs['spec'])) && !ereg('(EXAMSystem)+',$Game['spec']) && ereg('(nat|enh|ext)+',$Gen['typech'])) {
                        $Game['spec'] .= 'EXAMSystem, ';
                        $EXAM_String = ("`spec` = '$Game[spec]', ");
                        }else $EXAM_String = '';

                        $SQL = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `msuit` = '$Hangar[h_msuit]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
                        mysql_query($SQL) or die(mysql_error());
                        $SQL = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET $EXAM_String `hp` = '$Hangar[h_hp]', `hpmax` = '$Hangar[h_hpmax]', `en` = '$Hangar[h_en]', `enmax` = '$Hangar[h_enmax]', `ms_custom` = '$Hangar[h_ms_custom]', `wepa` = '$Hangar[h_wepa]', `wepb` = '$Hangar[h_wepb]', `wepc` = '$Hangar[h_wepc]', `eqwep` = '$Hangar[h_eqwep]', `p_equip` = '$Hangar[h_p_equip]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
                        mysql_query($SQL) or die(mysql_error());
                        $SQL = ("DELETE FROM `".$GLOBALS['DBPrefix']."phpeb_user_hangar` WHERE `h_id` = '$actionc' AND `h_user` = '$Pl_Value[USERNAME]' LIMIT 1;");
                        mysql_query($SQL) or die(mysql_error());
                }
        }
        if (!$ErrorMsg)$ErrorMsg ='�ɹ�\ȡ�������װ���ˣ�';
        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">$ErrorMsg<br><input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";

        postFooter();exit;
}
if ($mode=='main' && $actionb == 'prockeep'){

        if (!$Gen['msuit']){$ErrorMsg = '��û�л�����Դ�����ɿ�!!';}
        elseif ($NumHangarMS >= $Hangar_Limit) {$ErrorMsg = '���ɿ�ռ䲻�㣡<Br>�Ѿ�ʹ����$NumHangarMS/$Hangar_Limit���ռ䡣';}
        elseif ($Gen['cash'] - $Hangar_Price < 0) {$ErrorMsg = '��Ǯ���㣡';}
        else {
                $sql = ("SELECT `spec` FROM `".$GLOBALS['DBPrefix']."phpeb_sys_ms` WHERE id='". $Gen['msuit'] ."'");
                $query_r = mysql_query($sql);
                $SyMs = mysql_fetch_array($query_r);
                $hypmd_sql = '';
                $hypmd = 0;

                if ( ( ereg('(EXAMSystem)+',$SyMs['spec']) || ereg('(EXAMSystem)+',$UsWep_D['spec']) || ereg('(EXAMSystem)+',$UsWep_E['spec']) ) && ereg('(EXAMSystem)+',$Game['spec'])) {
                $Game['spec'] = str_replace('EXAMSystem, ','',$Game['spec']);
                $EXAM_String = ("`spec` = '$Game[spec]', ");
                }else $EXAM_String  = '';

                //Remove EXAM Activation
                if ($Gen['hypermode'] >= 4 && $Gen['hypermode'] <= 6){
                        switch($Gen['hypermode']){
                        case 4: $hypmd = 0; break;
                        case 5: $hypmd = 1; break;
                        case 6: $hypmd = 2; break;
                        }
                        $TFlag = 1;
                        $hypmd_sql = ", `hypermode` = $hypmd ";
                }

                $sql = ("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_hangar` VALUES('','$Pl_Value[USERNAME]','$Gen[msuit]','$Game[hp]','$Game[hpmax]','$Game[en]','$Game[enmax]','$Game[ms_custom]','$Game[wepa]','$Game[wepb]','$Game[wepc]','$Game[eqwep]','$Game[p_equip]');");
                mysql_query($sql) or die(mysql_error());
                $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET $EXAM_String `hp` = 0, `hpmax` = 0, `en` = 0 , `enmax` = 0, `ms_custom` = '', `wepa` = '0<!>0', `wepb` = '0<!>0', `wepc` = '0<!>0', `eqwep` = '0<!>0', `p_equip` = '0<!>0' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
                mysql_query($sql) or die(mysql_error());
                $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `msuit` = 0 $hypmd_sql, `cash` = `cash`-$Hangar_Price WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
                mysql_query($sql) or die(mysql_error());
        }
        if (!$ErrorMsg)$ErrorMsg ='�ɹ�\��������װ���ˣ�';
        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">$ErrorMsg<br><input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";

        postFooter();exit;
        }

echo "<font style=\"font-size: 12pt\">���ɿ�<hr>";
if ($Otp_TellTime){echo "$Otp_TellTime<hr>";}
echo "</font><br>";
echo "<form action=hangar.php?action=main method=post name=hnmainform>";
echo "<input type=hidden value='' name=actionb>";
echo "<input type=hidden value='' name=actionc>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"650\">";
        echo "<tr align=center><td colspan=9><b>װ�������б�: </b></td></tr>";
        echo "<tr align=center>";
        echo "<td width=\"20\">No.</td>";
        echo "<td width=\"195\">��������</td>";
        echo "<td width=\"80\">������</td>";
        echo "<td width=\"30\">����</td>";
        echo "<td width=\"30\">����</td>";
        echo "<td width=\"40\">EN����</td>";
        echo "<td width=\"120\">����Ч��</td>";
        echo "<td width=\"85\">��Ǯ</td>";
        echo "<td width=\"50\">����</td>";
        echo "</tr>";

        if ($UsrWepA[0]){
        echo "<tr align=center>";
        echo "<td width=\"20\">��</td>";
        echo "<td width=\"195\">$UsWep_A[name]</td>";
        echo "<td width=\"80\">". number_format($UsWep_A['atk']) ."</td>";
        echo "<td width=\"30\">$UsWep_A[hit]</td>";
        echo "<td width=\"30\">$UsWep_A[rd]</td>";
        echo "<td width=\"40\">$UsWep_A[enc]</td>";
        echo "<td width=\"120\">$UsWepSpec_A</td>";
        echo "<td width=\"85\">". number_format($UsWep_A['price']) ."</td>";
        echo "<td width=\"50\">$UsrWepA[1]</td>";
        echo "</tr>";}
        if ($UsrWepB[0]){
        echo "<tr align=center>";
        echo "<td width=\"20\">һ</td>";
        echo "<td width=\"195\">$UsWep_B[name]</td>";
        echo "<td width=\"80\">". number_format($UsWep_B['atk']) ."</td>";
        echo "<td width=\"30\">$UsWep_B[hit]</td>";
        echo "<td width=\"30\">$UsWep_B[rd]</td>";
        echo "<td width=\"40\">$UsWep_B[enc]</td>";
        echo "<td width=\"120\">$UsWepSpec_B</td>";
        echo "<td width=\"85\">". number_format($UsWep_B['price']) ."</td>";
        echo "<td width=\"50\">$UsrWepB[1]</td>";
        $b_sel = "<option value='wepb'>����һ: $UsWep_B[name]";
        echo "</tr>";}
        if ($UsrWepC[0]){
        echo "<tr align=center>";
        echo "<td width=\"20\">��</td>";
        echo "<td width=\"195\">$UsWep_C[name]</td>";
        echo "<td width=\"80\">". number_format($UsWep_C['atk']) ."</td>";
        echo "<td width=\"30\">$UsWep_C[hit]</td>";
        echo "<td width=\"30\">$UsWep_C[rd]</td>";
        echo "<td width=\"40\">$UsWep_C[enc]</td>";
        echo "<td width=\"120\">$UsWepSpec_C</td>";
        echo "<td width=\"85\">". number_format($UsWep_C['price']) ."</td>";
        echo "<td width=\"50\">$UsrWepC[1]</td>";
        $c_sel = "<option value='wepc'>���ö�: $UsWep_C[name]";
        echo "</tr>";}
        if ($UsrWepD[0]){
        echo "<tr align=center>";
        echo "<td width=\"20\">��</td>";
        echo "<td width=\"195\">$UsWep_D[name]</td>";
        echo "<td width=\"80\">". number_format($UsWep_D['atk']) ."</td>";
        echo "<td width=\"30\">$UsWep_D[hit]</td>";
        echo "<td width=\"30\">$UsWep_D[rd]</td>";
        echo "<td width=\"40\">$UsWep_D[enc]</td>";
        echo "<td width=\"120\">$UsWepSpec_D</td>";
        echo "<td width=\"85\">". number_format($UsWep_D['price']) ."</td>";
        echo "<td width=\"50\">$UsrWepD[1]</td>";
        $c_sel = "<option value='WepD'>����װ��: $UsWep_D[name]";
        echo "</tr>";}
        if ($UsrWepE[0]){
        echo "<tr align=center>";
        echo "<td width=\"20\">��</td>";
        echo "<td width=\"195\">$UsWep_E[name]</td>";
        echo "<td width=\"80\">". number_format($UsWep_E['atk']) ."</td>";
        echo "<td width=\"30\">$UsWep_E[hit]</td>";
        echo "<td width=\"30\">$UsWep_E[rd]</td>";
        echo "<td width=\"40\">$UsWep_E[enc]</td>";
        echo "<td width=\"120\">$UsWepSpec_E</td>";
        echo "<td width=\"85\">". number_format($UsWep_E['price']) ."</td>";
        echo "<td width=\"50\">$UsrWepD[1]</td>";
        $c_sel = "<option value='WepD'>����װ��: $UsWep_E[name]";
        echo "</tr>";}
        echo "</table>";

        echo "<script language=\"Javascript\">";
        echo "function cfmKeep(){
                if (confirm('�� $".number_format($Hangar_Price)." ����Ż�����') == true){hnmainform.actionb.value='prockeep';return true;}
                else {return false;}";
        echo "}</script>";


        echo "<hr width=85%>";
        if (!$Gen['msuit']){echo '<center>��û�л�����Դ�����ɿ⡣';}
        elseif ($NumHangarMS > $Hangar_Limit){echo '<center>���ɿ�̫������ˣ������ٴ�����ɿ⡣';}
        else {
        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"200\">";
        echo "<tr><td align=center>������ɿ�:<br>";
        echo "<input type=submit value=ȷ����� onClick=\"return cfmKeep()\"></td></tr>";
        echo "</table>";}


        echo "<hr width=85%>";
//In Hangar

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"980\">";
        echo "<tr align=center><td colspan=15><b>���ɿ��ڵĻ���: </b></td></tr>";

        echo "<tr align=center>";
        echo "<td width=\"80\">���ɿ� ID</td>";
        echo "<td width=\"200\">��������</td>";
        echo "<td width=\"50\">Attacking����</td>";
        echo "<td width=\"50\">Defending����</td>";
        echo "<td width=\"50\">Reacting����</td>";
        echo "<td width=\"50\">Targeting����</td>";
        echo "<td width=\"50\">HP</td>";
        echo "<td width=\"50\">HP����</td>";
        echo "<td width=\"50\">EN</td>";
        echo "<td width=\"50\">EN����</td>";
        echo "<td width=\"50\">����</td>";
        echo "<td width=\"50\">����һ</td>";
        echo "<td width=\"50\">���ö�</td>";
        echo "<td width=\"50\">����װ��</td>";
        echo "<td width=\"50\">����װ��</td>";
        echo "</tr>";

        echo "<script language=\"Javascript\">
function setLayer(posX,posY,Width,Height,msgText){
        var X = posX + document.body.scrollLeft + 10;
        var Y = posY + document.body.scrollTop + 10;
        if(eval(posX + Width + 30) > document.body.clientWidth){
                X = eval(posX - Width + document.body.scrollLeft - 20);
        }if(eval(posY + Height + 30) > document.body.clientHeight){
                Y = eval(posY - Height + document.body.scrollTop - 20);
        }if(X<0){
                X = 0;
        }if(Y<0){
                Y = 0;
        }

        tmpTxt = eval(msgText);

        document.getElementById(\"wepinfo\").style.width = Width;
        document.getElementById(\"wepinfo\").style.height = Height;
        document.getElementById(\"wepinfo\").style.backgroundColor = \"ffffdd\";
        document.getElementById(\"wepinfo\").style.padding = 10;
        document.getElementById(\"wepinfo\").innerHTML = tmpTxt;
        document.getElementById(\"wepinfo\").style.border = \"solid 1px #000000\";
        document.getElementById(\"wepinfo\").style.left = X;
        document.getElementById(\"wepinfo\").style.top  = Y;
}

function offLayer(){
        document.getElementById(\"wepinfo\").style.width = 0;
        document.getElementById(\"wepinfo\").style.height = 0;
        document.getElementById(\"wepinfo\").innerHTML = \"\";
        document.getElementById(\"wepinfo\").style.backgroundColor = \"transparent\";
        document.getElementById(\"wepinfo\").style.border = 0;
}

function confirmTake(h_id){
        if ($Gen[msuit] != 0){alert('���Ȱ��ú�����ʹ�õĻ���');}
        else if ('$Game[wepa]' != '0<!>0' || '$Game[wepb]' != '0<!>0' || '$Game[wepc]' != '0<!>0' || '$Game[eqwep]' != '0<!>0'){alert('���Ȱ��úñ����е�������װ��!!');}
        else if (confirm('Ҫȡ��ID: '+h_id+' �Ļ�����?\\n��ע��, ������Դ�͸���װ�׻����ڵĻ�, ���ᱻ����!') == true) {hnmainform.actionb.value='procget';hnmainform.actionc.value=h_id;hnmainform.submit();}
}
</script>
";

        $TakeOptions = '';
        while($Hangar = mysql_fetch_array($SQL_Query_Main)){

        if ($Hangar['h_ms_custom']){
                $MS_CFix = split('<!>',$Hangar['h_ms_custom']);
                $Hangar['msname'] = $MS_CFix[0];
                $Hangar['atf'] += $MS_CFix[1];
                $Hangar['def'] += $MS_CFix[2];
                $Hangar['ref'] += $MS_CFix[3];
                $Hangar['taf'] += $MS_CFix[4];
        }
        $TakeOptions .= "<option value='$Hangar[h_id]'>$Hangar[h_id]";
        echo "<tr align=center style=\"cursor: hand\" onClick=\"confirmTake('$Hangar[h_id]');\" onMouseOver=\"this.style.color='yellow'\" onMouseOut=\"this.style.color='white'\">";
        echo "<td>$Hangar[h_id]</td>";
        echo "<td>$Hangar[msname]</td>";
        echo "<td>$Hangar[atf]</td>";
        echo "<td>$Hangar[def]</td>";
        echo "<td>$Hangar[ref]</td>";
        echo "<td>$Hangar[taf]</td>";
        echo "<td>$Hangar[h_hp]</td>";
        echo "<td>$Hangar[h_hpmax]</td>";
        echo "<td>$Hangar[h_en]</td>";
        echo "<td>$Hangar[h_enmax]</td>";
        unset($I);
        $Eq_Listing = Array('A' => 'h_wepa','B' => 'h_wepb','C' => 'h_wepc','D' => 'h_eqwep','E' => 'h_p_equip');
        foreach($Eq_Listing as $I => $V){
                $H_Wep = 'H_Wep'.$I;
                $H_SyWep = 'H_SyWep'.$I;
                $W_Inf = 'W_Inf'.$I;
                if ($Hangar[$V] && $Hangar[$V] != '0<!>0') {
                        $$H_Wep = split('<!>',$Hangar[$V]);
                        GetWeaponDetails(${$H_Wep}[0],$H_SyWep);
                        if (${$H_Wep}[2]){
                                if (${$H_Wep}[2]==1) ${$H_SyWep}['name'] = ${$H_Wep}[3].${$H_SyWep}['name']."<sub>?</sub>";
                                else ${$H_SyWep}['name'] = ${$H_SyWep}['name'].${$H_Wep}[3]."<sub>?</sub>";
                                ${$H_SyWep}['atk'] += ${$H_Wep}[4];
                                ${$H_SyWep}['hit'] += ${$H_Wep}[5];
                                ${$H_SyWep}['rd'] += ${$H_Wep}[6];
                                ${$H_SyWep}['enc'] = ${$H_Wep}[7];
                        }
                        $$W_Inf = ${$H_SyWep}['name']."<br>����: ".${$H_Wep}[1]."<hr width=95%>����:<br>";
                        $$W_Inf .= "��������: ".${$H_SyWep}['atk']."����������: ".${$H_SyWep}['rd']."<br>������: ".${$H_SyWep}['hit']."������EN����: ".${$H_SyWep}['enc']."<br>";
                        $$W_Inf .= "����Ч��:<br>";
                        if (${$H_SyWep}['equip']) $$W_Inf .= "����װ��<br>";
                        if (${$H_SyWep}['spec']) $$W_Inf .= ReturnSpecs(${$H_SyWep}['spec']);
                        echo "<td OnMouseOver=\"setLayer(event.clientX,event.clientY,200,100,'\'".$$W_Inf."\'')\" OnMouseOut=\"offLayer()\">��</td>";
                }
                else echo "<td>�w</td>";
        }
        echo "</tr>";

        }
        if ($TakeOptions)
        echo "<tr><td colspan=15 align=center>ȡ������: <select name=take_id>$TakeOptions</select> <input type=button onClick=confirmTake(hnmainform.take_id.value) value=\"ȡ��\"></td></tr>";
        echo "</table>";
        echo "<hr width=85%>";
echo "</form>";
echo "<div id=wepinfo style=\"position:absolute; z-index:10;color: black;\" align=left></div>";
}//End GUI

else {echo "δ���嶯����";}
postFooter();exit;
?>