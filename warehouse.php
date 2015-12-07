<?php
$mode = ( isset($_GET['action']) ) ? $_GET['action'] : $_POST['action'];
include('cfu.php');
postHead('');
AuthUser("$Pl_Value[USERNAME]","$Pl_Value[PASSWORD]");
if ($CFU_Time >= $TIMEAUTH+$TIME_OUT_TIME || $TIMEAUTH <= $CFU_Time-$TIME_OUT_TIME){echo "连线逾时！<br>请重新登入！";exit;}
GetUsrDetails("$Pl_Value[USERNAME]",'Gen','Game');
$t_now = time();
if ($Gen['btltime'] == $t_now){echo "动作过快。";postFooter();mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `btltime` = ".intval($t_now+10)." WHERE `username` = '$Gen[username]' LIMIT 1;");exit;}

$UsrWepA = explode('<!>',$Game['wepa']);
$UsrWepB = explode('<!>',$Game['wepb']);
$UsrWepC = explode('<!>',$Game['wepc']);
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
//Set DataTable
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_warehouse` WHERE username='". $Pl_Value['USERNAME'] ."'");
$query_whr = mysql_query($sql);$defineuserc = 0;
$defineuserc = mysql_num_rows($query_whr);
if ($defineuserc == 0){
        $sqldfwh = ("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_warehouse` (username) VALUES('$Pl_Value[USERNAME]')");
        mysql_query($sqldfwh) or die ('<br><center>未能建立仓库资料<br>原因:' . mysql_error() . '<br>');
        $sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_warehouse` WHERE username='". $Pl_Value['USERNAME'] ."'");
        $query_whr = mysql_query($sql) or die ('<br><center>未能取得仓库资料<br>原因:' . mysql_error() . '<br>');
}
$Warehouse = mysql_fetch_row($query_whr);
$WarehseWeps = explode("\n",$Warehouse[1]);
$Countnumwhwp = count($WarehseWeps);
if (($CFU_Time - $Warehouse[2]) <= 1){echo "你实在按的太快了。请于两秒后再按。<br>多谢合作！";exit;}

if ($mode == 'selection'){
        echo "<font style=\"font-size: 12pt\">仓库</font>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";

        echo "<form action=warehouse.php?action=main method=post name=mainform>";
        echo "<input type=hidden value='none' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr><td align=center width=250><b style=\"font-size: 10pt;\">仓库</b></td></tr>";
        echo "<tr><td align=left>";
        echo "武器库<Br>　- 免费提供武器、装备的寄存服务<br>　- 战争期间也能使用<br>　- 没机体的情况下可以寄存使用中武器<br>";
        echo "格纳库<Br>　- 提供收费的机体的寄存服务<br>　- 价格为 $".number_format($Hangar_Price)."<br>　- 战争期间不能使用<br>　- 身上有装备、武器不能领回机体<br>";
        echo "<center><input type=\"submit\" value='武器库'><input type=\"submit\" value='格纳库' onClick=\"mainform.action='hangar.php?action=main';\">";
        echo "</center></tr></td></form></table>";
}

//Warehouse GUI
elseif ($mode=='main'){

if ($mode=='main' && $actionb == 'procget'){
        if ($UsrWepB[0] && $UsrWepC[0]){$ErrorMsg = '你没有空位装备！';}
        elseif ($getwep == 'none'){$ErrorMsg = '请指定要取出的装备。';}
        else {
        
        $WChacheArrays = explode("\n",$Warehouse[1]);
        sort($WChacheArrays);
        $Warehouse[1] = implode("\n",$WChacheArrays);
        $Warehouse[1] = trim($Warehouse[1]);
        
        unset($GetWarehseWeps);
        $GetWarehseWeps = explode("\n",$Warehouse[1]);
        unset($sql,$dest);
        if (!$UsrWepB[0]){$dest='wepb';unset($UsWep_B,$UsrWepB);
        $UsWepSpec_B = ReturnSpecs("$UsWep_B[spec]");}
        elseif (!$UsrWepC[0]){$dest='wepc';unset($UsWep_C,$UsrWepC);
        $UsWepSpec_C = ReturnSpecs("$UsWep_C[spec]");}        
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `$dest` = '$GetWarehseWeps[$getwep]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
        mysql_query($sql);unset($sql);
        unset($GetWarehseWeps[$getwep]);
        sort($GetWarehseWeps);
        $Warehouse[1] = implode("\n",$GetWarehseWeps);
        $Warehouse[1] = trim($Warehouse[1]);
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_warehouse` SET `warehouse` = '$Warehouse[1]', `timelast` = '$CFU_Time' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
        mysql_query($sql);
        unset($sql,$dest,$GetWepDe,$Gen,$Game,$UsrWepB,$UsrWepC,$UsWep_B,$UsWep_C,$UsWepSpec_B,$UsWepSpec_C);}
        if (!$ErrorMsg)$ErrorMsg ='成功\取出装备了！';
        echo "<form action=warehouse.php?action=main method=post name=frmct target=Beta>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">$ErrorMsg<br><input type=submit value=\"返回\" onClick=\"parent.Beta.location.replace('gen_info.php')\"><input type=submit value=\"继续使用武器库\" onClick=\"frmct.submit()\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        
        postFooter();exit;
}
if ($mode=='main' && $actionb == 'prockeep'){
        if (!$UsrWepB[0] && $keepwep=='wepb'){$ErrorMsg = '找不到你的装备!!';}
        elseif (!$UsrWepC[0] && $keepwep=='wepc'){$ErrorMsg = '找不到你的装备!!';}
        elseif ($keepwep=='wepa' && $Gen['msuit']){$ErrorMsg = '不能把使用中武器放入仓库！';}
        elseif (!$keepwep){$ErrorMsg = '找不到你的装备!!';}
        elseif ($Countnumwhwp > 100){$ErrorMsg = '仓库太多武器了！';}
        else {
                $Warehouse[1] .="\n$Game[$keepwep]";
                $WChacheArrays = explode("\n",$Warehouse[1]);
                sort($WChacheArrays);
                $Warehouse[1] = implode("\n",$WChacheArrays);
                $Warehouse[1] = trim($Warehouse[1]);
                unset($sql);
                $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_warehouse` SET `warehouse` = '$Warehouse[1]', `timelast` = '$CFU_Time' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
                mysql_query($sql);unset($sql);
                $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `$keepwep` = '0<!>0' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
                mysql_query($sql);
                unset($Gen,$Game,$UsrWepB,$UsrWepC,$UsWep_B,$UsWep_C);
        if (!$ErrorMsg)$ErrorMsg ='成功\存入装备了！';
        echo "<form action=warehouse.php?action=main method=post name=frmct target=Beta>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">$ErrorMsg<br><input type=submit value=\"返回\" onClick=\"parent.Beta.location.replace('gen_info.php')\"><input type=submit value=\"继续使用武器库\" onClick=\"frmct.submit()\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        
        postFooter();exit;
        }
}


echo "武器库<hr>";
echo "<br>";
echo "<form action=warehouse.php?action=main method=post name=whmainform>";
echo "<input type=hidden value='' name=actionb>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"650\">";
        echo "<tr align=center><td colspan=9><b>装备武器列表: </b></td></tr>";
        echo "<tr align=center>";
        echo "<td width=\"20\">No.</td>";
        echo "<td width=\"195\">武器名称</td>";
        echo "<td width=\"80\">攻击力</td>";
        echo "<td width=\"30\">命中</td>";
        echo "<td width=\"30\">回数</td>";
        echo "<td width=\"40\">EN消费</td>";
        echo "<td width=\"120\">特殊效果</td>";
        echo "<td width=\"85\">价钱</td>";
        echo "<td width=\"50\">经验</td>";
        echo "</tr>";
        
        if ($UsrWepA[0]){
        echo "<tr align=center>";
        echo "<td width=\"20\">现</td>";
        echo "<td width=\"195\">$UsWep_A[name]</td>";
        echo "<td width=\"80\">". number_format($UsWep_A['atk']) ."</td>";
        echo "<td width=\"30\">$UsWep_A[hit]</td>";
        echo "<td width=\"30\">$UsWep_A[rd]</td>";
        echo "<td width=\"40\">$UsWep_A[enc]</td>";
        echo "<td width=\"120\">$UsWepSpec_A</td>";
        echo "<td width=\"85\">". number_format($UsWep_A['price']) ."</td>";
        echo "<td width=\"50\">$UsrWepA[1]</td>";
        if(!$Gen['msuit']) $a_sel = "<option value='wepa'>备用一: $UsWep_A[name]";
        else $a_sel = '';
        echo "</tr>";}
        if ($UsrWepB[0]){
        echo "<tr align=center>";
        echo "<td width=\"20\">一</td>";
        echo "<td width=\"195\">$UsWep_B[name]</td>";
        echo "<td width=\"80\">". number_format($UsWep_B['atk']) ."</td>";
        echo "<td width=\"30\">$UsWep_B[hit]</td>";
        echo "<td width=\"30\">$UsWep_B[rd]</td>";
        echo "<td width=\"40\">$UsWep_B[enc]</td>";
        echo "<td width=\"120\">$UsWepSpec_B</td>";
        echo "<td width=\"85\">". number_format($UsWep_B['price']) ."</td>";
        echo "<td width=\"50\">$UsrWepB[1]</td>";
        $b_sel = "<option value='wepb'>备用一: $UsWep_B[name]";
        echo "</tr>";}
        if ($UsrWepC[0]){
        echo "<tr align=center>";
        echo "<td width=\"20\">二</td>";
        echo "<td width=\"195\">$UsWep_C[name]</td>";
        echo "<td width=\"80\">". number_format($UsWep_C['atk']) ."</td>";
        echo "<td width=\"30\">$UsWep_C[hit]</td>";
        echo "<td width=\"30\">$UsWep_C[rd]</td>";
        echo "<td width=\"40\">$UsWep_C[enc]</td>";
        echo "<td width=\"120\">$UsWepSpec_C</td>";
        echo "<td width=\"85\">". number_format($UsWep_C['price']) ."</td>";
        echo "<td width=\"50\">$UsrWepC[1]</td>";
        $c_sel = "<option value='wepc'>备用二: $UsWep_C[name]";
        echo "</tr>";}
        echo "</table><hr width=85% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        $Disable_Keep_Msg = '';
        if (!$UsrWepB[0] && !$UsrWepC[0]){
                if (!$Gen['msuit'] && !$UsrWepA[0]) $Disable_Keep_Msg .= '<center>你没有装备能存入仓库。</center>';
                elseif ($Gen['msuit'] && !$UsrWepA[0]) $Disable_Keep_Msg .= '<center>你没有装备能存入仓库。</center>';
                elseif ($Gen['msuit'] && $UsrWepA[0]) $Disable_Keep_Msg .= '<center>你没有装备能存入仓库。</center>';
        }
        if ($Countnumwhwp > 100){$Disable_Keep_Msg .= '<center>仓库太多武器了！不能再存入仓库。</center><br>';}
        if ($Disable_Keep_Msg) echo $Disable_Keep_Msg;
        else {
        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"300\">";
        echo "<tr><td>存放武器:";
        echo "<center><select name='keepwep'><option value=0>－－－－－－－－－－〔请选择〕－－－－－－－－－－ $a_sel $b_sel $c_sel </select><br><input type=submit value=确定存放 onClick=\"whmainform.actionb.value='prockeep'\"></center></td></tr>";
        echo "</table>";}
        echo "<hr width=85% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
//In Warehouse

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"650\">";
        echo "<tr align=center><td colspan=9><b>仓库内的武器: </b></td></tr>";
        echo "<tr align=center>";
        echo "<td width=\"20\">No.</td>";
        echo "<td width=\"195\">武器名称</td>";
        echo "<td width=\"80\">攻击力</td>";
        echo "<td width=\"30\">命中</td>";
        echo "<td width=\"30\">回数</td>";
        echo "<td width=\"40\">EN消费</td>";
        echo "<td width=\"120\">特殊效果</td>";
        echo "<td width=\"85\">价钱</td>";
        echo "<td width=\"50\">经验</td>";
        echo "</tr>";
        $SelWepOpt = '';

        if ($Countnumwhwp > 0 && $Warehouse[1] != ''){
        for($ctwp=0;$ctwp<$Countnumwhwp;$ctwp++){unset($WhThisInfoSys,$WhThisInfo,$WhThisSpec);
        $WhThisInfo = explode('<!>',$WarehseWeps[$ctwp]);
        GetWeaponDetails("$WhThisInfo[0]",'WhThisInfoSys');
        $WhThisSpec = ReturnSpecs($WhThisInfoSys['spec']);
        
        if ($WhThisInfo[2]){
        if ($WhThisInfo[2]==1) $WhThisInfoSys['name'] = $WhThisInfo[3].$WhThisInfoSys['name']."<sub>?</sub>";
        else $WhThisInfoSys['name'] = $WhThisInfoSys['name'].$WhThisInfo[3]."<sub>?</sub>";
        $WhThisInfoSys['atk'] += $WhThisInfo[4];
        $WhThisInfoSys['hit'] += $WhThisInfo[5];
        $WhThisInfoSys['rd'] += $WhThisInfo[6];
        $WhThisInfoSys['enc'] = $WhThisInfo[7];
        }

        $SelWepOpt .= "<option value = $ctwp>(No. $ctwp) $WhThisInfoSys[name] (经验: $WhThisInfo[1])";
        echo "<tr align=center>";
        echo "<td width=\"20\">$ctwp</td>";
        echo "<td width=\"195\">$WhThisInfoSys[name]</td>";
        echo "<td width=\"80\">". number_format($WhThisInfoSys['atk']) ."</td>";
        echo "<td width=\"30\">$WhThisInfoSys[hit]</td>";
        echo "<td width=\"30\">$WhThisInfoSys[rd]</td>";
        echo "<td width=\"40\">$WhThisInfoSys[enc]</td>";
        echo "<td width=\"120\">$WhThisSpec</td>";
        echo "<td width=\"85\">". number_format($WhThisInfoSys['price']) ."</td>";
        echo "<td width=\"50\">$WhThisInfo[1]</td>";
        echo "</tr>";unset($WhThisInfoSys,$WhThisInfo,$WhThisSpec);}
        echo "</table><hr width=85% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        if ($UsrWepB[0] && $UsrWepC[0]){echo '<center>你没有空位从仓库拿出装备。';}
        else {
        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"300\">";
        echo "<tr><td>取出武器:<br>";
        echo "<center><select name='getwep'><option value='none'>－－－－－－－－－－〔请选择〕－－－－－－－－－－ $SelWepOpt </select><br><input type=submit value=确定取出 onClick=\"whmainform.actionb.value='procget'\"></center></td></tr>";
        echo "</table>";}}else {echo "<tr align=center><td colspan=9>仓库中没有武器</td></tr></table>";}
        echo "<hr width=85% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
echo "</form>";
}//End GUI

else {echo "未定义动作！";}
postFooter();exit;
?>