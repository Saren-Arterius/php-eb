<?php

$mode = ( isset($_GET['action']) ) ? $_GET['action'] : $_POST['action'];
include('cfu.php');
postHead('');
AuthUser("$Pl_Value[USERNAME]","$Pl_Value[PASSWORD]");
if ($CFU_Time >= $TIMEAUTH+$TIME_OUT_TIME || $TIMEAUTH <= $CFU_Time-$TIME_OUT_TIME){echo "������ʱ��<br>�����µ��룡";exit;}
mt_srand ((double) microtime()*1000000);
GetUsrDetails("$Pl_Value[USERNAME]",'Pl_Gen','Pl_Game');
$Pl_Settings_Query = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_settings` WHERE username='". $Pl_Gen['username'] ."'");
$Pl_Settings = mysql_fetch_array(mysql_query ($Pl_Settings_Query));
if (($CFU_Time - $Pl_Gen['btltime']) < $Btl_Intv){echo "�����ϴι������ƶ���ʱ��̫���ˣ�<br>���� ".($Btl_Intv-($CFU_Time - $Pl_Gen['btltime']))." ����ٽ��й�����";exit;}
$Pl_WepA = explode('<!>',$Pl_Game['wepa']);
$Pl_WepB = explode('<!>',$Pl_Game['wepb']);
$Pl_WepC = explode('<!>',$Pl_Game['wepc']);
$Pl_WepD = explode('<!>',$Pl_Game['eqwep']);
$Pl_WepE = explode('<!>',$Pl_Game['p_equip']);

//Adjust to user's setting
if ($Pl_Settings['gen_img_dir'])
$General_Image_Dir = $Pl_Settings['gen_img_dir'];
if ($Pl_Settings['unit_img_dir'])
$Unit_Image_Dir = $Pl_Settings['unit_img_dir'];
if ($Pl_Settings['base_img_dir'])
$Base_Image_Dir = $Pl_Settings['base_img_dir'];

$Area = ReturnMap("$Pl_Gen[coordinates]");
//$AreaLandForm = ReturnMType($Area["Sys"]["type"]);

$Area_Org = ReturnOrg($Area["User"]["occupied"]);
$Pl_Org = ReturnOrg($Pl_Game['organization']);

$Pl_LocalOrgFlag = 0;
if ($Pl_Org == $Area_Org) $Pl_LocalOrgFlag = 1;

$Area_At = $Area["User"]["at"] + 20;
$Area_De = $Area["User"]["de"] + 25;
$Area_Ta = $Area["User"]["ta"] + 100;

unset($WarMessage,$AttackFort);
if (ereg_replace('(Atk=\()|\)','',$Pl_Org['optmissioni']) == $Pl_Gen['coordinates'] && $CFU_Time < $Pl_Org['opttime']){
$WarMessage = "<font color=red>[����Ŀ��]</font> ";
if ($CFU_Time > $Pl_Org['optstart'])
$AttackFort = 'True';
}

if ($Area["User"]["hp"] <= 0)$FortDestoryedMsg = "<br><font color=red><b>Ҫ���Ѿ����ݣ�</b></font>";

if ($mode == 'battle_sel')
{
echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
echo "<div align=center style=\"font-size: 11pt; color: $Area_Org[color];\">$WarMessage$Area_Org[name]�����: ". $Area["Sys"]["map_id"] ."����";
echo "<br><a href=\"Javascript:showfort();\" id=fbtn style=\"text-decoration: none\">Ҫ��״̬</a></div>";
echo "<script language=\"JavaScript\">";
echo "function showfort(){fortstat.style.visibility='visible';fortstat.style.position='relative';fbtn.href=\"Javascript:hidefort();\"}";
echo "function hidefort(){fortstat.style.visibility='hidden';fortstat.style.position='absolute';fbtn.href=\"Javascript:showfort();\"}";
echo "</script>";
echo "<div align=center style=\"font-size: 10pt; color: $Area_Org[color];visibility: hidden;position: absolute\" id=fortstat>HP: ". $Area["User"]["hp"]. "/" .$Area["User"][hpmax];
echo "<br>������: $Area_At ������: $Area_De ����: $Area_Ta$FortDestoryedMsg";
echo "</div><hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";

GetWeaponDetails("$Pl_WepA[0]",'Pl_SyWepA');
if ($Pl_WepA[2]){
if ($Pl_WepA[2]==1) $Pl_SyWepA['name'] = $Pl_WepA[3].$Pl_SyWepA['name']."<sub>?</sub>";
else $Pl_SyWepA['name'] = $Pl_SyWepA['name'].$Pl_WepA[3]."<sub>?</sub>";
$Pl_SyWepA['atk'] += $Pl_WepA[4];
$Pl_SyWepA['hit'] += $Pl_WepA[5];
$Pl_SyWepA['rd'] += $Pl_WepA[6];
$Pl_SyWepA['enc'] = $Pl_WepA[7];
}

GetWeaponDetails("$Pl_WepD[0]",'Pl_SyWepD');
if ($Pl_WepD[2]){
if ($Pl_WepD[2]==1) $Pl_SyWepD['name'] = $Pl_WepD[3].$Pl_SyWepD['name']."<sub>?</sub>";
else $Pl_SyWepD['name'] = $Pl_SyWepD['name'].$Pl_WepD[3]."<sub>?</sub>";
$Pl_SyWepD['atk'] += $Pl_WepD[4];
$Pl_SyWepD['hit'] += $Pl_WepD[5];
$Pl_SyWepD['rd'] += $Pl_WepD[6];
$Pl_SyWepD['enc'] = $Pl_WepD[7];
}

GetWeaponDetails("$Pl_WepE[0]",'Pl_SyWepE');
if ($Pl_WepE[2]){
if ($Pl_WepE[2]==1) $Pl_SyWepE['name'] = $Pl_WepE[3].$Pl_SyWepE['name']."<sub>?</sub>";
else $Pl_SyWepE['name'] = $Pl_SyWepE['name'].$Pl_WepE[3]."<sub>?</sub>";
$Pl_SyWepE['atk'] += $Pl_WepE[4];
$Pl_SyWepE['hit'] += $Pl_WepE[5];
$Pl_SyWepE['rd'] += $Pl_WepE[6];
$Pl_SyWepE['enc'] = $Pl_WepE[7];
}

if ($Pl_Gen['msuit']){
        $Pl_Repaired = AutoRepair("$Pl_Gen[username]");
        $Pl_Game['hp'] = $Pl_Repaired['hp'];
        $Pl_Game['en'] = $Pl_Repaired['en'];
        $Pl_Game['sp'] = $Pl_Repaired['sp'];
        $Pl_Game['status'] = $Pl_Repaired['status'];
        }
else {echo "<center>��û�л��壬���ܳ�����";postFooter();exit;}
if ($Pl_Game['status']){echo "<center>�����У��޷�������";postFooter();exit;}
if (!$Pl_WepA[0]) {echo "<center>��û��װ�����������ܳ�����";postFooter();exit;}
elseif ($Pl_Game['en'] < ($Pl_SyWepA['enc']+$Pl_SyWepD['enc']+$Pl_SyWepE['enc'])) {echo "EN���㣬�޷�������";postFooter();exit;}
switch(mt_rand(1,2)){
        case 1: $torder = 'ASC';break;
        case 2: $torder = 'DESC';break;
}
if($Pl_Settings['battle_def_filter'])        include('battle-dfilter.php');
else                                         include('battle-cfilter.php');
PostFooter();
}if ($mode == 'attack_target')                include('battle-2.php');

?>