<?php
$mode = ( isset($_GET['action']) ) ? $_GET['action'] : $_POST['action'];
include('cfu.php');
postHead('');
AuthUser("$Pl_Value[USERNAME]","$Pl_Value[PASSWORD]");
if ($CFU_Time >= $TIMEAUTH+$TIME_OUT_TIME || $TIMEAUTH <= $CFU_Time-$TIME_OUT_TIME){echo "������ʱ��<br>�����µ��룡";exit;}
GetUsrDetails("$Pl_Value[USERNAME]",'Gen','Game');
if ($Game['organization'])
$Pl_Org = ReturnOrg("$Game[organization]");

$Area = ReturnMap("$Gen[coordinates]");
//$AreaLandForm = ReturnMType($Area["Sys"]["type"]);
$Ar_Org = ReturnOrg($Area["User"]["occupied"]);
//Special Commands GUI
if ($mode=='ModFort'){
        
        if ($Area["User"]["occupied"] != $Game['organization'] || $Game['rights'] != '1')
        {echo "����";postFooter();exit;}

        $Otp_Area_Sql = ("SELECT `opttime`,`optstart` FROM `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE `optmissioni` = 'Atk=($Gen[coordinates])' AND `opttime` > '$CFU_Time' ORDER BY `optstart` ASC LIMIT 1");
        $Otp_Area_Q = mysql_query($Otp_Area_Sql) or die(mysql_error());
        $Otp_A_ITar = mysql_fetch_array($Otp_Area_Q);
        
        echo "<font style=\"font-size: 12pt\">ǿ������</font>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        
        $At_Cost = Floor(($Area["User"]["at"]+5)*75000);
        if ($Area["User"]["at"]+5 > 75) $At_Cost *= 2;
        $De_Cost = Floor(($Area["User"]["de"]+5)*125000);
        if ($Area["User"]["de"]+5 > 75) $De_Cost *= 2;
        $Ta_Cost = Floor(($Area["User"]["ta"]+5)*50000);
        if ($Area["User"]["ta"]+5 > 75) $Ta_Cost *= 2;
        $HpMax_Cost = Floor(($Area["User"]["hpmax"]+10000)*1.5);
        
        if ($actionb == 'A'){
        echo "<form action=city.php?action=ModFort method=post name=mainform>";
        echo "<input type=hidden value='B' name=actionb>";
        echo "<input type=hidden value='C' name=actionc>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

        echo "<script language=\"Javascript\">";
        echo "function cfmModFort(type){";
        echo "if (type == 'at' && (".$At_Cost." > $Pl_Org[funds])){alert('��֯�ʽ��㡣');return false;}";
        echo "else if (type == 'de' && (".$De_Cost." > $Pl_Org[funds])){alert('��֯�ʽ��㡣');return false;}";
        echo "else if (type == 'ta' && (".$Ta_Cost." > $Pl_Org[funds])){alert('��֯�ʽ��㡣');return false;}";
        echo "else if (type == 'hpmax' && (".$HpMax_Cost." > $Pl_Org[funds])){alert('��֯�ʽ��㡣');return false;}";
        echo "else if (type == 'ehp' && (50000 > $Pl_Org[funds])){alert('��֯�ʽ��㡣');return false;}";
        echo "else if (type == 'shp' && (100000 > $Pl_Org[funds])){alert('��֯�ʽ��㡣');return false;}";
        echo "else if (type == 'lhp' && (200000 > $Pl_Org[funds])){alert('��֯�ʽ��㡣');return false;}";
        echo "else {if (confirm('ȷ��Ҫǿ��������')==true){mainform.actionc.value=type;return true;}";
        echo "else {return false;}}";
        echo "}</script>";

        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr><td align=left width=280><b style=\"font-size: 10pt;\">ǿ�� $Gen[coordinates]���� �ĳ���: </b></td></tr>";
        echo "<tr><td>��֯�ʽ�: ".number_format($Pl_Org['funds'])."Ԫ";
        if ($Area["User"]["at"]+5 <= 145) echo "<br>ǿ��Ҫ��������: <input type=submit value=\"ǿ��5��AT\" onClick=\"return cfmModFort('at');\"> �����Ǯ: $". number_format($At_Cost);
        if ($Area["User"]["de"]+5 <= 145) echo "<br>ǿ��Ҫ��������: <input type=submit value=\"ǿ��5��DE\" onClick=\"return cfmModFort('de');\"> �����Ǯ: $". number_format($De_Cost);
        if ($Area["User"]["ta"]+5 <= 145) echo "<br>ǿ��Ҫ����������: <input type=submit value=\"ǿ��5��TA\" onClick=\"return cfmModFort('ta');\"> �����Ǯ: $". number_format($Ta_Cost);
        if ($Area["User"]["hpmax"]+10000 <= 5000000) echo "<br>ǿ��Ҫ��װ���;ö�: <input type=submit value=\"����10000HP\" onClick=\"return cfmModFort('hpmax');\"> �����Ǯ: $". number_format($HpMax_Cost);
        
        if ($Otp_A_ITar)
        echo "<br>����ά��: <input type=submit value=\"�ظ�5000��HP\" onClick=\"return cfmModFort('ehp');\"> �����Ǯ: $".number_format(50000);
        else{
        echo "<br>�ظ�����HP: <input type=submit value=\"�ظ�50000��\" onClick=\"return cfmModFort('shp');\"> �����Ǯ: $".number_format(100000);
        echo "<br>�ظ�����HP: <input type=submit value=\"�ظ�100000��\" onClick=\"return cfmModFort('lhp');\"> �����Ǯ: $".number_format(200000);
        }
        echo "</tr></td>";
        echo "<tr><td>";
        echo "����Ҫ����������: (�ѿ۳����������ļ�Ǯ)";
        
        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"600\">";
        echo "<tr align=center><td colspan=8><b>�����б�: </b></td></tr>";
        echo "<tr align=center>";
        echo "<td width=\"20\">��</td>";
        echo "<td width=\"195\">��������</td>";
        echo "<td width=\"80\">������</td>";
        echo "<td width=\"30\">����</td>";
        echo "<td width=\"30\">����</td>";
        echo "<td width=\"40\">EN����</td>";
        echo "<td width=\"120\">����Ч��</td>";
        echo "<td width=\"85\">��Ǯ</td>";
        echo "</tr>";
        
        GetWeaponDetails($Area["User"]["wepa"],'Ar_Wep');
        
        $wepsqlsel = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_sys_wep` WHERE `spec` REGEXP '(FortressOnly)+' AND `id` != '".$Area["User"]["wepa"]."' ORDER BY price");
        $reswep = mysql_query($wepsqlsel);
        $syswepbuyinfo = mysql_fetch_array($reswep);
        $syswepbuynumsrows = mysql_num_rows($reswep);
        if ($syswepbuynumsrows > 0){
        $wepbuyoptions='';
        do
        {
        echo "<tr align=center>";
        echo "<td width=\"20\"><input type=radio name=FortWep value='$syswepbuyinfo[id]'></td>";
        echo "<td width=\"195\">$syswepbuyinfo[name]</td>";
        echo "<td width=\"80\">". number_format($syswepbuyinfo['atk']) ."</td>";
        echo "<td width=\"30\">$syswepbuyinfo[hit]</td>";
        echo "<td width=\"30\">$syswepbuyinfo[rd]</td>";
        echo "<td width=\"40\">$syswepbuyinfo[enc]</td>";
        $syswepbuyinfospecs = ReturnSpecs($syswepbuyinfo['spec']);
        echo "<td width=\"120\">$syswepbuyinfospecs</td>";
        $ExchangePrice = ceil($syswepbuyinfo['price'] - $Ar_Wep['price']/2);
        if ($ExchangePrice < 0)$ExchangePrice = 0;
        echo "<td width=\"85\">". number_format($ExchangePrice) ."</td>";
        echo "</tr>";
        }
        while ( $syswepbuyinfo = mysql_fetch_array($reswep) );
        }
        echo "</table><input type=submit value=\"����\" onClick=\"return cfmModFort('wep');\"></tr></td></form></table>";
        }
        elseif($actionb == 'B' && $actionc){
        unset($InsufFundsFlag);
        if ($actionc == 'at' && (Floor(($Area["User"]["at"]+5)*75000) > $Pl_Org['funds'])){$InsufFundsFlag = 1;}
        if ($actionc == 'de' && (Floor(($Area["User"]["de"]+5)*125000) > $Pl_Org['funds'])){$InsufFundsFlag = 1;}
        if ($actionc == 'ta' && (Floor(($Area["User"]["ta"]+5)*50000) > $Pl_Org['funds'])){$InsufFundsFlag = 1;}
        if ($actionc == 'hpmax' && (Floor(($Area["User"]["hpmax"]+10000)*1.5) > $Pl_Org['funds'])){$InsufFundsFlag = 1;}
        if ($actionc == 'ehp' && (50000 > $Pl_Org['funds'])){$InsufFundsFlag = 1;}
        if ($actionc == 'shp' && (100000 > $Pl_Org['funds'])){$InsufFundsFlag = 1;}
        if ($actionc == 'lhp' && (200000 > $Pl_Org['funds'])){$InsufFundsFlag = 1;}
        
        if ($InsufFundsFlag == 1){echo "<center>��֯�ʽ��㡣";postFooter();exit;}
        
        unset($sql,$sqlSet,$Cost);
                
        if ($actionc == 'at'){
                if ($Area["User"]["at"]+5 > 145){
                        echo "<center>�����ټ�ǿҪ����������";
                        postFooter();
                        exit;
                }
                if (!$Otp_A_ITar || $Area["User"]["hp"] > 0){
                        $sqlSet = ("`at` = `at`+5");
                        $Cost = $At_Cost;
                }
                else{echo "<center>���ڲ��ܼ�ǿҪ����";postFooter();exit;}
        }
        elseif($actionc == 'de'){
                if ($Area["User"]["de"]+5 > 145){
                        echo "<center>�����ټ�ǿҪ����������";
                        postFooter();
                        exit;
                }
                if (!$Otp_A_ITar || $Area["User"]["hp"] > 0){
                        $sqlSet = ("`de` = `de`+5");
                        $Cost = $De_Cost;
                }
                else{echo "<center>���ڲ��ܼ�ǿҪ����";postFooter();exit;}
        }
        elseif($actionc == 'ta'){
                if ($Area["User"]["ta"]+5 > 145){
                        echo "<center>�����ټ�ǿҪ����������";
                        postFooter();
                        exit;
                }
                if (!$Otp_A_ITar || $Area["User"]["hp"] > 0){
                        $sqlSet = ("`ta` = `ta`+5");
                        $Cost = $Ta_Cost;
                }
                else{echo "<center>���ڲ��ܼ�ǿҪ����";postFooter();exit;}
        }
        elseif($actionc == 'hpmax'){
                if ($Area["User"]["hpmax"]+10000 > 5000000){
                        echo "<center>�����ټ�ǿҪ��HP��";
                        postFooter();
                        exit;
                }
                if (!$Otp_A_ITar || $Area["User"]["hp"] > 0){
                        $sqlSet = ("`hpmax` = `hpmax`+10000, `hp` = `hp`+10000");
                        $Cost = $HpMax_Cost;
                }else{echo "<center>���ڲ��ܼ�ǿҪ����";postFooter();exit;}
        }
        elseif($actionc == 'ehp' && $Area["User"]["hp"] > 0){
                if ($Area["User"]["hp"] + 5000 > $Area["User"]["hpmax"])
                $sqlSet = ("`hp` = `hpmax`");
                else
                $sqlSet = ("`hp` = `hp`+5000");
        $Cost = 50000;
        }
        elseif($actionc == 'shp' && !$Otp_A_ITar){
                if ($Area["User"]["hp"] + 50000 > $Area["User"]["hpmax"])
                $sqlSet = ("`hp` = `hpmax`");
                else
                $sqlSet = ("`hp` = `hp`+50000");
        $Cost = 100000;
        }
        elseif($actionc == 'lhp' && !$Otp_A_ITar){
                if ($Area["User"]["hp"] + 100000 > $Area["User"]["hpmax"])
                $sqlSet = ("`hp` = `hpmax`");
                else
                $sqlSet = ("`hp` = `hp`+100000");
        $Cost = 200000;
        }
        elseif($actionc =='wep'&& !$Otp_A_ITar && $Area["User"]["hp"] > 0){
                if (!$FortWep){echo "<center>����ѡ��Ҫ���ɵ�������";postFooter();exit;}
                else{
                unset($Ex_Wep,$Ar_Wep);
                GetWeaponDetails($FortWep,'Ex_Wep');
                GetWeaponDetails($Area["User"]["wepa"],'Ar_Wep');
                $ExchangePrice = ceil($Ex_Wep['price'] - $Ar_Wep['price']/2);
                if ($ExchangePrice < 0)$ExchangePrice = 0;
                if (!ereg('(FortressOnly)+',$Ex_Wep['spec'])){echo "�ⲻ��Ҫ��ר��������";postFooter();exit;}
                elseif($ExchangePrice > $Pl_Org['funds']){echo "<center>��֯�ʽ��㡣";postFooter();exit;}
                else{$Cost = $ExchangePrice;$sqlSet = "`wepa` = '$Ex_Wep[id]'";}
                }
        }
        elseif($Otp_A_ITar){
                echo "ս�Խ����У�δ��ǿ��Ҫ����";
                postFooter();exit;
        }
        elseif($Area["User"]["hp"] <= 0){
                echo "Ҫ�������ݣ�";
                postFooter();exit;
        }
        else {echo "δ���嶯����";postFooter();exit;}
        //���� Map Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_map` SET $sqlSet WHERE `occupied` = '".$Game['organization']."' AND `map_id` = '".$Gen['coordinates']."'");
        $query = mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
        
        //���� Org Info
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `funds` = `funds`-$Cost WHERE `id` = '".$Game['organization']."' LIMIT 1");
        $query = mysql_query($sql) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');
        
        unset($sql,$sqlSet,$Cost);

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">����ǿ������ˣ�<input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        }
}
else {echo "δ���嶯����";}
postFooter();
echo "</body>";
echo "</html>";
exit;
?>