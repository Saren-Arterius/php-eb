<?php
$mode = ( isset($_GET['action']) ) ? $_GET['action'] : $_POST['action'];
include('cfu.php');
postHead('');
AuthUser("$Pl_Value[USERNAME]","$Pl_Value[PASSWORD]");
if ($CFU_Time >= $TIMEAUTH+$TIME_OUT_TIME || $TIMEAUTH <= $CFU_Time-$TIME_OUT_TIME){echo "������ʱ��<br>�����µ��룡";exit;}
if ($mode == 'equip'){
include('equip_wep.php');
}//equipwep
elseif ($mode == 'equipwep' && $actionb == 'equip'){
GetUsrDetails("$Pl_Value[USERNAME]",'','GameVal');

$Pl_Settings_Query = ("SELECT `gen_img_dir`,`unit_img_dir`,`base_img_dir`,`btltime` FROM `".$GLOBALS['DBPrefix']."phpeb_user_settings` s,`".$GLOBALS['DBPrefix']."phpeb_user_general_info` g WHERE s.username='". $GameVal['username'] ."' AND s.username=g.username");
$Pl_Settings = mysql_fetch_array(mysql_query ($Pl_Settings_Query));
$t_now = time();
if ($Pl_Settings['btltime'] == $t_now){echo "������������죬ǿ��ֹͣ����1Сʱ��";postFooter();mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `btltime` = ".intval($t_now+3600)." WHERE `username` = '$GameVal[username]' LIMIT 1;");exit;}
elseif ($t_now - $Pl_Settings['btltime'] <= 1){echo "�������졣";postFooter();mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `btltime` = ".intval($t_now+10)." WHERE `username` = '$GameVal[username]' LIMIT 1;");exit;}

//Adjust to user's setting
if ($Pl_Settings['gen_img_dir'])
$General_Image_Dir = $Pl_Settings['gen_img_dir'];
if ($Pl_Settings['unit_img_dir'])
$Unit_Image_Dir = $Pl_Settings['unit_img_dir'];
if ($Pl_Settings['base_img_dir'])
$Base_Image_Dir = $Pl_Settings['base_img_dir'];

if (isset($GameVal[$slot_sw])){
$O_Wep = $GameVal['wepa'];
$GameVal['wepa'] = $GameVal[$slot_sw];
$GameVal[$slot_sw] = $O_Wep;}
else {echo "δ����Ķ�����";postFooter();exit;}

$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `wepa` = '$GameVal[wepa]', `wepb` = '$GameVal[wepb]', `wepc` = '$GameVal[wepc]', `eqwep` = '$GameVal[eqwep]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);

echo "<form action=equip.php?action=equip method=post name=frmeq target=Beta>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
echo "<p align=center style=\"font-size: 16pt\">װ������ˣ�<br><input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"><input type=submit value=\"����װ��\" onClick=\"frmeq.submit()\"></p>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
        postFooter();
        }
elseif ($mode == 'buywep' && $actionb == 'process'){
GetUsrDetails("$Pl_Value[USERNAME]",'GenVal','GameVal');
GetWeaponDetails("$BuyWepDesired",'BuyWepS');
$UsrWepA = explode('<!>',$GameVal['wepa']);
$UsrWepB = explode('<!>',$GameVal['wepb']);
$UsrWepC = explode('<!>',$GameVal['wepc']);
$ERROR_Buy_Wep = '';$Pos_Flag='';
if ($GenVal['cash'] - $BuyWepS['price'] < 0){echo "��Ǯ����!!<br>";PostFooter();exit;}
if (!ereg('.*B.*',$BuyWepS['kind'])){echo "���ܹ����������<br>";PostFooter();exit;}
if (ereg('(CannotEquip)+',$syswepbuyinfo['spec']) && !$UsrWepA[0]){echo "���ܹ����������<br>";PostFooter();exit;}
$GenVal['cash'] = $GenVal['cash'] - $BuyWepS['price'];

if($UsrWepA[0] == '0') {$UsrWepA[0] = $BuyWepS['id'];$UsrWepA[1] = 0;$Pos_Flag='��������ʹ�����µ�������';}
elseif($UsrWepB[0] == '0') {$UsrWepB[0] = $BuyWepS['id'];$UsrWepB[1] = 0;$Pos_Flag='�µ�����װ���ڱ���һ��';}
elseif($UsrWepC[0] == '0') {$UsrWepC[0] = $BuyWepS['id'];$UsrWepC[1] = 0;$Pos_Flag='�µ�����װ���ڱ��ö���';}
else $ERROR_Buy_Wep = 'True';

if ($ERROR_Buy_Wep){echo "����ʱ�������󣬹�����ֹ��<br>";PostFooter();exit;}

$GameVal['wepa'] = implode('<!>',$UsrWepA);
$GameVal['wepb'] = implode('<!>',$UsrWepB);
$GameVal['wepc'] = implode('<!>',$UsrWepC);

$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `wepa` = '$GameVal[wepa]', `wepb` = '$GameVal[wepb]', `wepc` = '$GameVal[wepc]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `cash` = '$GenVal[cash]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);
echo "<form action=equip.php?action=equip method=post name=frmeq target=Beta>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
echo "<p align=center style=\"font-size: 16pt\">��������ˣ�$Pos_Flag<br><input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"><input type=submit value=\"����װ��\" onClick=\"frmeq.submit()\"></p>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
        postFooter();
        }
elseif ($mode == 'sellwep' && $actionb == 'process' && $actionc =='validcode'){
GetUsrDetails("$Pl_Value[USERNAME]",'GenVal','GameVal');

if ($SellWepDesired == 'WepA'){$SLOTWEP='wepa';
$UsrWepA = explode('<!>',$GameVal['wepa']);
GetWeaponDetails("$UsrWepA[0]",'SellWepS');
if (!$UsrWepA[0]){echo "���������ڡ�";PostFooter();exit;}
}
elseif ($SellWepDesired == 'WepB'){$SLOTWEP='wepb';
$UsrWepB = explode('<!>',$GameVal['wepb']);
GetWeaponDetails("$UsrWepB[0]",'SellWepS');
if (!$UsrWepB[0]){echo "���������ڡ�";PostFooter();exit;}
}
elseif ($SellWepDesired == 'WepC'){$SLOTWEP='wepc';
$UsrWepC = explode('<!>',$GameVal['wepc']);
GetWeaponDetails("$UsrWepC[0]",'SellWepS');
if (!$UsrWepC[0]){echo "���������ڡ�";PostFooter();exit;}
}
else {echo '����';exit;}
$SellP = Floor(($SellWepS['price']*0.5 + $SellWepS['price']*0.1)/10000)*10000;
$GenVal['cash'] = $GenVal['cash'] + $SellP;
$GameVal[$SLOTWEP] = '0<!>0';

$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `$SLOTWEP` = '$GameVal[$SLOTWEP]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `cash` = '$GenVal[cash]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);
echo "<form action=equip.php?action=equip method=post name=frmeq target=Beta>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
echo "<p align=center style=\"font-size: 16pt\">�۳�����ˣ�<br>��õ����ʽ� $SellP Ԫ��<br><input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"><input type=submit value=\"����װ��\" onClick=\"frmeq.submit()\"></p>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
        postFooter();
        }
//�ŵ������г�
//Provided and Written By Kermit
//Debug & Amendments By: IE�� Website: http://www.iewan.com/
//php-eb v0.25Final SP2 Alterations Officially Made By: v2Alliance
elseif ($mode == 'sellwep2' && $actionb == 'process' && $actionc =='validcode'){
GetUsrDetails("$Pl_Value[USERNAME]",'GenVal','GameVal');

if(!is_numeric($price) || $price < 1){echo "�۸�Ƿ���";PostFooter();exit;}

if ($SellWepDesired2 == 'WepA'){$SLOTWEP='wepa';
$UsrWepA = explode('<!>',$GameVal['wepa']);
GetWeaponDetails("$UsrWepA[0]",'SellWepS');
if (!$UsrWepA[0]){echo "���������� ";PostFooter();exit;}
}
elseif ($SellWepDesired2 == 'WepB'){$SLOTWEP='wepb';
$UsrWepB = explode('<!>',$GameVal['wepb']);
GetWeaponDetails("$UsrWepB[0]",'SellWepS');
if (!$UsrWepB[0]){echo "���������� ";PostFooter();exit;}
}
elseif ($SellWepDesired2 == 'WepC'){$SLOTWEP='wepc';
$UsrWepC = explode('<!>',$GameVal['wepc']);
GetWeaponDetails("$UsrWepC[0]",'SellWepS');
if (!$UsrWepC[0]){echo "���������� ";PostFooter();exit;}
}
else {echo '����';exit;}

$SellP=$price;
$today = time();
$sql = ("INSERT `".$GLOBALS['DBPrefix']."phpeb_user_market` SET `owner` = '$Pl_Value[USERNAME]', `price` = '$SellP', `wepid` = '$GameVal[$SLOTWEP]', `name` = '$SellWepS[name]', `atk` = '$SellWepS[atk]', `hit` = '$SellWepS[hit]', `rd` = '$SellWepS[rd]', `enc` = '$SellWepS[enc]', `spec` = '$SellWepS[spec]', `time` = '$today';");
mysql_query($sql);
$GameVal[$SLOTWEP] = '0<!>0';
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `$SLOTWEP` = '$GameVal[$SLOTWEP]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);

echo "<form action=equip.php?action=equip method=post name=frmeq target=Beta>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=main>";
echo "<p align=center style=\"font-size: 16pt\">��������ˣ�Ҫ�������Ӷ����г����������۵���Ʒ�Ż���ʡ�<br><input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"><input type=submit value=\"����װ��\" onClick=\"frmeq.submit()\"></p>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
    postFooter();
    }
//�����г� -��-
//Equip Equipments
elseif ($mode == 'equipwep' && $actionb == 'equipdef'){
GetUsrDetails("$Pl_Value[USERNAME]",'GenVal','GameVal');
if($GenVal['msuit'])
GetMsDetails("$GenVal[msuit]",'NowMS');
$O_Wep = $GameVal['eqwep'];
if ($GameVal[$slot_sw] && $GameVal[$slot_sw] != '0<!>0' && $slot_sw != 'eqwep'){
        if ($slot_sw == 'wepa'){echo "�������԰�װ���е�����װ�븨��װ����";postFooter();exit;}
        $GameVal['eqwep'] = $GameVal[$slot_sw];
        $GameVal[$slot_sw] = $O_Wep;
}
elseif($GameVal[$slot_sw] && $slot_sw == 'eqwep'){
        if ($GameVal['wepb'] == '0<!>0'){$GameVal['wepb']=$GameVal['eqwep'];$GameVal['eqwep']='0<!>0';}
        elseif ($GameVal['wepc'] == '0<!>0'){$GameVal['wepc']=$GameVal['eqwep'];$GameVal['eqwep']='0<!>0';}
        else {echo "û�п�λж��װ����";postFooter();exit;}
        unset($SRFlag,$TFlag);
}
else {echo "δ����Ķ�����";postFooter();exit;}

$Equ_Id = explode('<!>',$GameVal['eqwep']);
$Equ_Prep = ("SELECT `spec` FROM `".$GLOBALS['DBPrefix']."phpeb_sys_wep` WHERE id='". $Equ_Id[0] ."'");
$Equ_Query = mysql_query($Equ_Prep);
$Equ = mysql_fetch_array($Equ_Query);
if (ereg('(ExtHP)+',$Equ['spec'])){$a = ereg_replace('.*ExtHP<','',$Equ['spec']);$GameVal['hpmax'] += intval($a);$SRFlag = 1;}
if (ereg('(ExtEN)+',$Equ['spec'])){$a = ereg_replace('.*ExtEN<','',$Equ['spec']);$GameVal['enmax'] += intval($a);$SRFlag = 1;}

$Eq_Id = explode('<!>',$O_Wep);
$Eq_Prep = ("SELECT `spec` FROM `".$GLOBALS['DBPrefix']."phpeb_sys_wep` WHERE id='". $Eq_Id[0] ."'");
$Eq_Query = mysql_query($Eq_Prep);
$Eq = mysql_fetch_array($Eq_Query);
if (ereg('(HPPcRec)+',$Eq['spec'])){$GameVal['hp'] = 0;$GameVal['status'] = 1;$SRFlag = 1;$TFlag = 1;}
if (ereg('(ENPcRec)+',$Eq['spec'])){$GameVal['en'] = 0;$SRFlag = 1;$TFlag = 1;}
if (ereg('(ExtHP)+',$Eq['spec'])){$a = ereg_replace('.*ExtHP<','',$Eq['spec']);$GameVal['hpmax'] -= intval($a);$SRFlag = 1;}
if (ereg('(ExtEN)+',$Eq['spec'])){$a = ereg_replace('.*ExtEN<','',$Eq['spec']);$GameVal['enmax'] -= intval($a);$SRFlag = 1;}

if (!ereg('(EXAMSystem)+',$NowMS['spec']) && !ereg('(EXAMSystem)+',$P_Equ['spec']) && ereg('(EXAMSystem)+',$GameVal['spec'])) {
$SRFlag = 1;
$GameVal['spec'] = str_replace('EXAMSystem, ','',$GameVal['spec']);
$hypmd_sql = '';
$hypmd = 0;
if ($GenVal['hypermode'] >= 4 && $GenVal['hypermode'] <= 6){
        switch($GenVal['hypermode']){
        case 4: $hypmd = 0; break;
        case 5: $hypmd = 1; break;
        case 6: $hypmd = 2; break;
        }
        $TFlag = 1;
        $hypmd_sql = ", `hypermode` = $hypmd ";
}
}

if (ereg('(EXAMSystem)+',$Equ['spec']) && !ereg('(EXAMSystem)+',$GameVal['spec']) && ereg('(nat|enh|ext)+',$GenVal['typech']))
{
        $GameVal['spec'] .= 'EXAMSystem, ';
        $SRFlag = 1;
}

$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `eqwep` = '$GameVal[eqwep]', `wepa` = '$GameVal[wepa]', `wepb` = '$GameVal[wepb]', `wepc` = '$GameVal[wepc]'");

if ($SRFlag)
$sql .= (", `spec` = '$GameVal[spec]', `hp` = '$GameVal[hp]', `hpmax` = '$GameVal[hpmax]', `status` = '$GameVal[status]', `en` = '$GameVal[en]', `enmax` = '$GameVal[enmax]'");
$sql .= (" WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);
unset($sql);
if ($TFlag){
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `time1` = '$CFU_Time'");
if ($hypmd_sql) $sql .= $hypmd_sql;
$sql .= (" WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);}

echo "<form action=equip.php?action=equip method=post name=frmeq target=Beta>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
echo "<p align=center style=\"font-size: 16pt\">װ������ˣ�<br><input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"><input type=submit value=\"����װ��\" onClick=\"frmeq.submit()\"></p>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
        postFooter();
        }
//
elseif ($mode == 'buyms' && ($actionb == 'buyms' || !$actionb)){
GetUsrDetails("$Pl_Value[USERNAME]",'GenVal','GameVal');
        echo "��ӭ����������������������<hr>";
        echo "<center><b>ѡ������: </b><br>";
        echo "<hr width=75% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
        echo "<a name=imagetop><img src=$Unit_Image_Dir/none.gif name=ms_sel onClick=\"buymsform.buymsbutton.click();\" style=\"cursor:url('$Base_Image_Dir/dollarsign.cur')\"></a><br><span id=msnamesel align=center style='font-size: 16px;font-weight: Bold';>�޻���</span><span id=priceselctd style=\"visibility: hidden;position: absolute;\">100</span>";
        echo "<hr width=75% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 9pt;\" bordercolor=\"#FFFFFF\" width=\"740\">";
echo "<tr align=center>";
echo "<td width=\"20\">No.</td>";
echo "<td width=\"195\">��������</td>";
echo "<td width=\"50\">��������</td>";
echo "<td width=\"50\">��������</td>";
echo "<td width=\"50\">��Ӧ����</td>";
echo "<td width=\"50\">��������</td>";
echo "<td width=\"50\">�����ӳ�</td>";
echo "<td width=\"55\">�����ظ�</td>";
echo "<td width=\"50\">�����ӳ�</td>";
echo "<td width=\"55\">�����ظ�</td>";
echo "<td width=\"30\">Ҫ��ȼ�</td>";
echo "<td width=\"85\">��Ǯ</td>";
echo "</tr>";
$c=0;
$sqlsysms = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_sys_ms` WHERE `price` <= $GenVal[cash]+100000 AND `needlv` <= $GameVal[level]+10  AND id != '0' ORDER BY needlv DESC, price DESC");
$sysms_q =mysql_query("$sqlsysms");
$thequery = $sysms_q;
$allmsnum = mysql_num_rows($sysms_q);
if ($allmsnum>1){
echo "<style>.buymslist{cursor:url('$Base_Image_Dir/3dgarro.cur')}</style>";

unset($SysMsDetail,$c);
$SWITCHMSIMGFUNCTION = "function switchmsImg(){";
while ($SysMsDetail = mysql_fetch_array($sysms_q)){$c+=1;
if (intval($SysMsDetail['hprec']) >= 1)$ShowHpRec=(intval($SysMsDetail['hprec'])+$HP_BASE_RECOVERY).'/��';
elseif ($SysMsDetail['hprec'] < 1 && $SysMsDetail['hprec'] != 0)$ShowHpRec=($SysMsDetail['hprec']*100).'% /��';
else $ShowHpRec='����ظ�';

if ($SysMsDetail['enrec'] >= 1)$ShowEnRec=(intval($SysMsDetail['enrec'])+$EN_BASE_RECOVERY).'/��';
elseif ($SysMsDetail['enrec'] < 1 && $SysMsDetail['enrec'] != 0)$ShowEnRec=($SysMsDetail['enrec']*100).'% /��';
else $ShowEnRec='����ظ�';

echo "<tr align=center class=buymslist onMouseover=\"this.style.color='yellow';\" onMouseout=\"this.style.color=''\"><span onClick=\"location.replace('#imagetop');buymsform.BuyMsDesired.value='$SysMsDetail[id]';switchmsImg();alert('��������:\\n$SysMsDetail[msname]\\n-------------------------\\nHP: $SysMsDetail[hpfix]\\tEN: $SysMsDetail[enfix]\\n��: $SysMsDetail[atf]\\t��: $SysMsDetail[def]\\n����: $SysMsDetail[taf]\\t��Ӧ: $SysMsDetail[ref]\\n-------------------------\\nHP�ظ���: $SysMsDetail[hprec]\\nEN�ظ���: $SysMsDetail[enrec]')\">";
echo "<td width=\"20\">$c</td>";
echo "<td width=\"195\" id=ms_".$SysMsDetail['id']."_name>$SysMsDetail[msname]</td>";

$AtfClr = colorConvert("$SysMsDetail[atf]",'30');
$DefClr = colorConvert("$SysMsDetail[def]",'30');
$RefClr = colorConvert("$SysMsDetail[ref]",'30');
$TafClr = colorConvert("$SysMsDetail[taf]",'30');

echo "<td width=\"50\" style=\"color: $AtfClr\">$SysMsDetail[atf]</td>";
echo "<td width=\"50\" style=\"color: $DefClr\">$SysMsDetail[def]</td>";
echo "<td width=\"50\" style=\"color: $RefClr\">$SysMsDetail[ref]</td>";
echo "<td width=\"50\" style=\"color: $TafClr\">$SysMsDetail[taf]</td>";

echo "<td width=\"50\">$SysMsDetail[hpfix]</td>";
echo "<td width=\"55\">$ShowHpRec</td>";
echo "<td width=\"50\">$SysMsDetail[enfix]</td>";
echo "<td width=\"55\">$ShowEnRec</td>";
echo "<td width=\"30\">$SysMsDetail[needlv]</td>";
echo "<td width=\"85\">$SysMsDetail[price]</td>";
echo "</span></tr>";
$SWITCHMSIMGFUNCTION .= "if (document.buymsform.BuyMsDesired.value == '$SysMsDetail[id]'){document.ms_sel.src='$Unit_Image_Dir/$SysMsDetail[image]';msnamesel.innerText=ms_".$SysMsDetail[id]."_name.innerText;priceselctd.innerText='$SysMsDetail[price]'}";
$BuyMsPossibilities .= "<option value=$SysMsDetail[id]>$SysMsDetail[msname]";
unset($SysMsDetail);
        }

//End Repeat

echo "<script language=\"Javascript\">";
echo $SWITCHMSIMGFUNCTION;
echo "}</script>";

echo "<form action=equip.php?action=buyms method=post name=buymsform><tr align=center valign=bottom><td colspan=12>";
echo "<input type=hidden value='process' name=actionb>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";


echo "ѡ������: <select onChange=\"switchmsImg();location.replace('#imagetop')\" name=BuyMsDesired";
if ($GenVal['msuit']) {echo " disabled = true"; $additionaltext = "<br><font style=\"font-size: 14px;color: red\"><b>�����л��壬������������ٹ��롣</b>";}
echo ">";
echo "<option value=''>---ѡ�����---$BuyMsPossibilities</select>";
echo "<script language='Javascript'>";
echo "function returncheckbuyms(){";
echo "if(document.buymsform.BuyMsDesired.selectedIndex == ''){alert('û��ѡ�û��塣');return false;}";
echo "if(priceselctd.innerText > $GenVal[cash]){alert('��Ǯ����!!');return false;}";
echo "else{if (confirm('����'+msnamesel.innerText+'��Ҫ '+priceselctd.innerText+'Ԫ��\\nȷ��Ҫ������') == true){return true;}else{return false;}}";
echo "}</script>";
echo "<input name=buymsbutton type=submit onClick=\"return returncheckbuyms();\" value='����'";
if ($GenVal['msuit']) echo " disabled = true";
echo ">";
}else echo "<tr align=center><td colspan=12>û�пɹ���Ļ���";
echo "$additionaltext</td></tr></form></table>";
if ($GenVal['msuit']){
GetMsDetails("$GenVal[msuit]",'NowMS');
echo "<br><hr width=75%><br>";
echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"300\">";
echo "<form action=equip.php?action=buyms method=post name=sellmsform>";
echo "<input type=hidden value='process' name=actionb>";
echo "<input type=hidden value='sell' name=actionc>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "<script language=\"Javascript\">";
        echo "function cfmsell(){";
        echo "if (confirm('ȷ��Ҫ������') == true){sellmsform.submit()}else{return false}";
        echo "}";
        echo "</script>";
echo "<tr align=center valign=bottom><td><b>�������</b></td></tr>";
echo "<tr height=250><td valign=bottom align=center><img src='".$Unit_Image_Dir."/$NowMS[image]'><p>$NowMS[msname]</p></td></tr>";
$SellPrice = Floor($NowMS['price']/2 + $NowMS['price']*0.2);
echo "<tr><td>�Ѵ˻�������ܹ�����ʽ� $SellPrice Ԫ��<br>���н���: <input type=button value='ȷ��' onclick='cfmsell();'></td></tr>";
echo "</form></table>";
}
postFooter();
}
//Start Evolution System
elseif ($mode == 'evolution' && $evfrom && $evto){
$evtolen=strlen($evto);
GetUsrDetails("$Pl_Value[USERNAME]",'Gen','Game');
$Wep_SlotEV = explode('<!>',$Game[$evfrom]);
GetWeaponDetails("$Wep_SlotEV[0]",'EV_From');
$RegExpStr='['.$evto.']{'.$evtolen.'}';
$FlagUnable=1;
if ($actionb=='evolution')
if (eregi("$RegExpStr", $EV_From['nextev']) && $Wep_SlotEV[1] >= 1000){$FlagUnable=0;}
if ($actionb=='sevolution')
if (eregi("$RegExpStr", $EV_From['specev']) && $Wep_SlotEV[1] >= 2000){$FlagUnable=0;}

if (!$FlagUnable){
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `$evfrom` = '$evto<!>0' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);
echo "<form action=equip.php?action=equip method=post name=frmeq target=Beta>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
echo "<p align=center style=\"font-size: 16pt\">��������ˣ�<br><input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"><input type=submit value=\"����װ��\" onClick=\"frmeq.submit()\"></p>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
postFooter();
}else {echo "�������޷������Ŀ���������ʹ�������ľ��鲻�㣡";postFooter();exit;}

}//End Evolution System
//���������
elseif ($mode == 'buyms' && $actionb == 'process'){
GetUsrDetails("$Pl_Value[USERNAME]",'GenVal','GameVal');
if ($actionc != 'sell'){
if ($GenVal['msuit']){echo "�Ѿ��л���!!<br>";PostFooter();exit;}
GetMsDetails("$BuyMsDesired",'BuyMsDVal');
if ($GenVal['cash'] - $BuyMsDVal['price'] < 0){echo "��Ǯ����!!<br>";PostFooter();exit;}
if ($GameVal['level'] < $BuyMsDVal['needlv']){echo "�ȼ�����!!<br>";PostFooter();exit;}
$GenVal['cash'] = $GenVal['cash'] - $BuyMsDVal['price'];
$GenVal['msuit'] = $BuyMsDVal['id'];
$GameVal['hpmax'] = $GameVal['hpmax'] + $BuyMsDVal['hpfix'];
$GameVal['enmax'] = $GameVal['enmax'] + $BuyMsDVal['enfix'];
$GameVal['hp'] = $GameVal['hp'] + $BuyMsDVal['hpfix'];
$GameVal['en'] = $GameVal['en'] + $BuyMsDVal['enfix'];

$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `hpmax` = '$GameVal[hpmax]',
`enmax` = $GameVal[enmax], `hp` = '$GameVal[hp]', ");
if (ereg('(EXAMSystem)+',$BuyMsDVal['spec']) && !ereg('(EXAMSystem)+',$GameVal['spec']) && ereg('(nat|enh|ext)+',$GenVal['typech'])) {
$GameVal['spec'] .= 'EXAMSystem, ';
$sql .= ("`spec` = '$GameVal[spec]', ");
}
$sql .= ("`en` = $GameVal[en] WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `cash` = '$GenVal[cash]',
`msuit` = $GenVal[msuit] WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);
echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
echo "<p align=center style=\"font-size: 16pt\">��������ˣ�<br><input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
}
elseif($actionc == 'sell'){
GetMsDetails("$GenVal[msuit]",'NowMS');
$Pl_WepD = explode('<!>',$GameVal['eqwep']);
GetWeaponDetails("$Pl_WepD[0]",'Pl_SyWepD');
$Pl_WepE = explode('<!>',$GameVal['p_equip']);
GetWeaponDetails("$Pl_WepE[0]",'Pl_SyWepE');
if (!$GenVal['msuit']){echo "��û�л���!!<br>";PostFooter();exit;}
$SellPrice = Floor($NowMS['price']/2 + $NowMS['price']*0.2);
$GenVal['cash'] = $GenVal['cash'] + $SellPrice;
$GameVal['hpmax'] = $GameVal['hpmax'] - $NowMS['hpfix'];
$GameVal['enmax'] = $GameVal['enmax'] - $NowMS['enfix'];
$GenVal['msuit'] = '0';

$HP_Sub = $EN_Sub = 0;
if (ereg('(ExtHP)+',$Pl_SyWepE['spec'])){$a = ereg_replace('.*ExtHP<','',$Pl_SyWepE['spec']);$HP_Sub = intval($a);}
if (ereg('(ExtEN)+',$Pl_SyWepE['spec'])){$a = ereg_replace('.*ExtEN<','',$Pl_SyWepE['spec']);$EN_Sub = intval($a);}
$GameVal['hpmax'] -= $HP_Sub;
$GameVal['enmax'] -= $EN_Sub;
echo "$HP_Sub - HP_Sub, $EN_Sub - EN_Sub<hr>";

$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `p_equip` = '0<!>0', `ms_custom` = '', `hpmax` = '$GameVal[hpmax]', `status` = '0',
`enmax` = $GameVal[enmax], `hp` = '0',");
if (ereg('(EXAMSystem)+',$GameVal['spec']) && !ereg('(EXAMSystem)+',$Pl_SyWepD['spec'])) {
$GameVal['spec'] = str_replace('EXAMSystem, ','',$GameVal['spec']);
$sql .= ("`spec` = '$GameVal[spec]', ");
$hypmd_sql = '';
$hypmd = 0;
if ($GenVal['hypermode'] >= 4 && $GenVal['hypermode'] <= 6){
        switch($GenVal['hypermode']){
        case 4: $hypmd = 0; break;
        case 5: $hypmd = 1; break;
        case 6: $hypmd = 2; break;
        }
        $hypmd_sql = ", `hypermode` = $hypmd ";
}
}
$sql .= ("`en` = '0' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `cash` = '$GenVal[cash]'");
if ($hypmd_sql) $sql .= $hypmd_sql;
$sql .= (", `msuit` = $GenVal[msuit] WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);
echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
echo "<p align=center style=\"font-size: 16pt\">��������ˣ�<br>��õ��ʽ� $SellPrice Ԫ��<input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";

}
else {echo "<br><br><br>undefined subaction";postFooter();exit;}
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
postFooter();
}

else {echo "<br><br><br>undefined subaction";postFooter();}
?>