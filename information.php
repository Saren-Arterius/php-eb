<?php
$mode = ( isset($_GET['action']) ) ? $_GET['action'] : $_POST['action'];
include('cfu.php');
postHead('');
AuthUser("$Pl_Value[USERNAME]","$Pl_Value[PASSWORD]");
if ($CFU_Time >= $TIMEAUTH+$TIME_OUT_TIME || $TIMEAUTH <= $CFU_Time-$TIME_OUT_TIME){echo "������ʱ��<br>�����µ��룡";exit;}
GetUsrDetails("$Pl_Value[USERNAME]",'Gen','Game');

$Pl_Settings_Query = ("SELECT `gen_img_dir`,`unit_img_dir`,`base_img_dir` FROM `".$GLOBALS['DBPrefix']."phpeb_user_settings` WHERE username='". $UsrGenrl['username'] ."'");
$Pl_Settings = mysql_fetch_array(mysql_query ($Pl_Settings_Query));

//Adjust to user's setting
if ($Pl_Settings['gen_img_dir'])
$General_Image_Dir = $Pl_Settings['gen_img_dir'];
if ($Pl_Settings['unit_img_dir'])
$Unit_Image_Dir = $Pl_Settings['unit_img_dir'];
if ($Pl_Settings['base_img_dir'])
$Base_Image_Dir = $Pl_Settings['base_img_dir'];
if ($Game['organization'])
$Pl_Org = ReturnOrg("$Game[organization]");
//Special Commands GUI
if ($mode == 'Main'){
echo "<form action=information.php?action=Main method=post name=typerkfrm>";
echo "<input type=hidden name=\"InfSbAct\" value='none'>";
echo "<input type=hidden name=\"Extra\" value=''>";
echo "<input type=hidden name=\"ExtraB\" value=''>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "<table width=100% height=100%><tr><td align=center>";
echo "<table cellspacing=2 cellpadding=3>";
echo "<tr><td colspan=3><center><b>�鱨</b></center></td></tr>";
echo "<tr><td align=center>�����鱨</td>";
echo "<td style=\"font-size:12px;\">�ۿ�����������Ѷ</td>";
echo "<td><input type=submit value=\"��ѯ\" onClick=\"typerkfrm.InfSbAct.value='Area'\"></td>";
echo "</tr>";
echo "<tr><td align=center>��֯�鱨</td>";
echo "<td style=\"font-size:12px;\">��ѯ����֯�Ļ�����Ѷ</td>";
echo "<td><input type=submit value=\"��ѯ\" onClick=\"typerkfrm.InfSbAct.value='Organization'\"></td>";
echo "</tr>";
echo "<tr><td align=center>����鱨</td>";
echo "<td style=\"font-size:12px;\">��ѯ����ҵĻ�����Ѷ</td>";
echo "<td><input type=submit value=\"��ѯ\" onClick=\"typerkfrm.InfSbAct.value='Player'\"></td>";
echo "</tr>";
echo "<tr><td align=center>ȫ��ʷ</td>";
echo "<td style=\"font-size:12px;\">�ۿ�ȫ������ʷ</td>";
echo "<td><input type=submit value=\"��ѯ\" onClick=\"typerkfrm.InfSbAct.value='History'\"></td>";
echo "</tr>";
echo "<tr><td align=center>�������</td>";
echo "<td style=\"font-size:12px;\">���ϵ����</td>";
echo "<td><input type=submit value=\"��ѯ\" onClick=\"typerkfrm.InfSbAct.value='OnlinePpl'\"></td>";
echo "</tr>";
echo "</table>";        
echo "</td></tr>";
echo "<script language=\"JavaScript\">";
echo "function getInfo(act,a,b){";
echo "        typerkfrm.action='information.php?action=Main';";
echo "        typerkfrm.InfSbAct.value=act;";
echo "        typerkfrm.Extra.value=a;";
echo "        typerkfrm.ExtraB.value=b;";
echo "        typerkfrm.submit();";
echo "        }</script>";
if ($InfSbAct == 'Area'){
echo "<tr><td>";
echo "<table align=center width=600 height=100% cellspacing=2 cellpadding=3 style=\"font-size:16px;\" border=1>";
echo "<tr><td><center><b>�����鱨</b></center></td></tr>";

unset($sql,$query,$AreaInf);
$sql = ("
SELECT `s`.`map_id`,`s`.`type`,`s`.`occprice`,`u`.`hp`,`s`.`hpmax`,`u`.`hpmax`,`s`.`at`,`u`.`at`,`s`.`de`,`u`.`de`,`s`.`ta`,`u`.`ta`,
`u`.`aname` ,`o`.`name` ,`o`.`color` ,`w`.`name`,`sw`.`name`
FROM `".$GLOBALS['DBPrefix']."phpeb_user_map` `u`,`".$GLOBALS['DBPrefix']."phpeb_sys_map` `s`,`".$GLOBALS['DBPrefix']."phpeb_user_organization` `o`,`".$GLOBALS['DBPrefix']."phpeb_sys_wep` `w`,`".$GLOBALS['DBPrefix']."phpeb_sys_wep` `sw`
WHERE `u`.`map_id` = `s`.`map_id` AND `o`.`id` = `u`.`occupied` AND `w`.`id` = `u`.`wepa` AND `sw`.`id` = `s`.`wepa`
");
$query = mysql_query($sql) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');
$AreaInf = mysql_fetch_row($query);
do{
echo "<tr><td><b style=\"color: $AreaInf[14];font-size: 16pt\">$AreaInf[0]����";
if ($AreaInf[0]=='D1'){echo "(��������½)";}
if ($AreaInf[0]=='D2'){echo "(�����Ⱥ��)";}
if ($AreaInf[0]=='D3'){echo "(Ħ����˹�˾���)";}
if ($AreaInf[0]=='D4'){echo "(��˹�ٻ���)";}
if ($AreaInf[0]=='D5'){echo "(ֱ�����Ӻ�Ͽ)";}
if ($AreaInf[0]=='D6'){echo "(���׶���ԭ)";}
if ($AreaInf[0]=='D7'){echo "(ɺ��������)";}
if ($AreaInf[0]=='D8'){echo "(����������)";}
if ($AreaInf[0]=='D9'){echo "(�����ǻ���)";}
if ($AreaInf[0]=='D10'){echo "(���ػ���1)";}
if ($AreaInf[0]=='D11'){echo "(���ػ���2)";}
if ($AreaInf[0]=='D12'){echo "(���ػ���3)";}
if ($AreaInf[0]=='D13'){echo "(���ػ���4)";}
if ($AreaInf[0]=='A1'){echo "(�벼����)";}
if ($AreaInf[0]=='B1'){echo "(�������ߡ���)";}
if ($AreaInf[0]=='C1'){echo "(���������溣)";}
if ($AreaInf[0]=='A2'){echo "(���ǻ���)";}
if ($AreaInf[0]=='B2'){echo "(SIDE3)";}
if ($AreaInf[0]=='C2'){echo "(��֮԰)";}
if ($AreaInf[0]=='A3'){echo "(L3-X18999)";}
if ($AreaInf[0]=='B3'){echo "(������۹�)";}
if ($AreaInf[0]=='C3'){echo "(�춥�ǵ۹�)";}
if ($AreaInf[0]=='E1'){echo "(����̫��)";}
if ($AreaInf[0]=='E2'){echo "(�������)";}
echo "����";

if ($AreaInf[12]) echo " -- $AreaInf[12]";
echo "</b><hr width=90% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
$sqlc = ("SELECT `coordinates` FROM `".$GLOBALS['DBPrefix']."phpeb_user_general_info` WHERE `coordinates` = '$AreaInf[0]'");
$queryc = mysql_query($sqlc) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');
$NumPPl = mysql_num_rows($queryc);
$AreaInf[17] = $NumPPl;
echo "<center>ͳ�ι�: <b style=\"color: $AreaInf[14];font-size: 12pt\">$AreaInf[13]</b>         ��������: $AreaInf[17]";
unset($NumPPl);
$AreaInf[6]+=20;$AreaInf[7]+=20;$AreaInf[8]+=25;
$AreaInf[9]+=25;$AreaInf[10]+=100;$AreaInf[11]+=100;
echo "</center><b style=\"font-size: 12pt\">Ҫ����Ѷ:</b><br>";
echo "����ֵ: $AreaInf[3] / $AreaInf[5]     At: $AreaInf[7]     De: $AreaInf[9]     Ta: $AreaInf[11]";
echo "<br>ʹ������: $AreaInf[15]<hr width=90% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
echo "<b style=\"font-size: 12pt\">������Ѷ:</b><br>�������: $AreaInf[2]<br>";
echo "��ʼ����: $AreaInf[4]     ��ʼAt: $AreaInf[6]     ��ʼDe: $AreaInf[8]     ��ʼTa: $AreaInf[10]";
echo "<br>��ʼ����: $AreaInf[16]";
if ($AreaInf[17] > 0)
echo "<hr width=90% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\"><input type=submit value=\"�鿴����������\" onClick=\"typerkfrm.InfSbAct.value='Player';typerkfrm.Extra.value='Area';typerkfrm.ExtraB.value='$AreaInf[0]';\">";
echo "</tr></td>";
}
while($AreaInf = mysql_fetch_row($query));
echo "</table>";
echo "</tr></td>";
}

elseif ($InfSbAct == 'Organization'){
echo "<tr><td>";
echo "<table align=center width=600 height=100% cellspacing=2 cellpadding=3 style=\"font-size:16px;\" border=1>";
echo "<tr><td colspan=6><center><b>��֯�鱨</b></center></td></tr>";
$sql = ("SELECT `o`.`license`,`o`.`funds`,`o`.`color`,`o`.`name`,COUNT(*) FROM `".$GLOBALS['DBPrefix']."phpeb_user_organization` `o`, `".$GLOBALS['DBPrefix']."phpeb_user_game_info` `g` WHERE `g`.`organization` = `o`.`id` GROUP BY `g`.`organization` ORDER BY `id`");
$query = mysql_query($sql) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');
$OrgInf = mysql_fetch_array($query);
do{
echo "<tr><td><b style=\"color: $OrgInf[color];font-size: 16pt\">$OrgInf[name]</b><br>";
switch($OrgInf['license']){
case 0: $LiText = "���ɼ��룬�����˳�";break;
case 1: $LiText = "���ɼ��룬�����˳�";break;
case 2: $LiText = "���Ƽ��룬�����˳�";break;
case 3: $LiText = "���Ƽ��룬�����˳�";break;}
echo "��Ա����: ".$LiText;
echo "<br> ���л�Ա: $OrgInf[4]";
echo "<br> ��֯����: $OrgInf[funds]";
echo "<br> <input type=submit value=\"�鿴�ڴ���֯�Ļ�Ա\" onClick=\"typerkfrm.InfSbAct.value='Player';typerkfrm.Extra.value='Org';typerkfrm.ExtraB.value='$OrgInf[name]';\">";
}
while($OrgInf = mysql_fetch_array($query));
echo "</table>";echo "</tr></td>";
}

elseif ($InfSbAct == 'Player'){
echo "<tr><td>";
echo "<table align=center width=500 height=100% cellspacing=2 cellpadding=3 style=\"font-size:16px;\" border=1>";
echo "<tr><td colspan=2><center><b>����鱨</b></center></td></tr>";
echo "<tr><td colspan=2><center><b>����Ŀ�����: </b><input type=text id=searchpl><input type=button value=��Ѱ onClick=\"location.replace('#'+searchpl.value);alert('��Ѱ��ϣ�');\"></center></td></tr>";
if ($Extra == 'Org')
$SQL_Ex_Str = "AND `o`.`name` = '$ExtraB'";
elseif ($Extra == 'Area')
$SQL_Ex_Str = "AND `gn`.`coordinates` = '$ExtraB'";
elseif ($Extra == 'Single')
$SQL_Ex_Str = "AND `gm`.`gamename` = '$ExtraB'";


$sql = ("
SELECT `gn`.`fame`, `gn`.`coordinates`, `gn`.`color`, `gn`.`bounty`, `gn`.`typech`, `gn`.`hypermode`, 
`gm`.`gamename`, `gm`.`hp`, `gm`.`hpmax`, `gm`.`en`, `gm`.`enmax`, `gm`.`level`, `gm`.`attacking`, `gm`.`defending`, `gm`.`reacting`, `gm`.`targeting`, `gm`.`rank`, `gm`.`rights`, `gm`.`victory`,`gm`.`v_points`, `gm`.`status`,
`gm`.`wepa`, `gm`.`eqwep`, `gm`.`p_equip`, `gm`.`organization`, `gm`.`ms_custom`, 
`type`.`atf` AS `t_atf`, `type`.`def` AS `t_def`, `type`.`ref` AS `t_ref`, `type`.`taf` AS `t_taf`, `type`.`name` AS `t_name`, 
`o`.`name`, `o`.`color`,
`ms`.`atf` AS `ms_atf`, `ms`.`def` AS `ms_def`, `ms`.`ref` AS `ms_ref`, `ms`.`taf` AS `ms_taf`, `ms`.`msname`, `ms`.`image`
FROM `".$GLOBALS['DBPrefix']."phpeb_user_general_info` `gn`, `".$GLOBALS['DBPrefix']."phpeb_user_game_info` `gm`, `".$GLOBALS['DBPrefix']."phpeb_sys_ms` `ms`, `".$GLOBALS['DBPrefix']."phpeb_user_organization` `o`, `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` `type`
WHERE `gn`.`username` = `gm`.`username` AND `o`.`id` = `gm`.`organization` AND `ms`.`id` = `gn`.`msuit` AND `type`.`id` = `gn`.`typech` $SQL_Ex_Str
");
$query = mysql_query($sql) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');
$PlayerInf = mysql_fetch_array($query);
do{
if($PlayerInf['rank'] && $PlayerInf['organization']){
$Rank = ' '.rankConvert($PlayerInf['rank']);
if ($PlayerInf['rights'] == '1')
$Rank .= "<font style=\"color: yellow;font-weight: Bold;\"> ".$RightsClass['Major']."</font>";
}
else $Rank = '';

if ($PlayerInf['ms_custom']) $Pl_CFix = explode('<!>',$PlayerInf['ms_custom']);
else $Pl_CFix = array(0,0,0,0,0);
if ($Pl_CFix[0]) $PlayerInf['msname'] = $Pl_CFix[0]."<sub>?</sub>";

$Pl_ATF=$PlayerInf['ms_atf']+$PlayerInf['t_atf']+$Pl_CFix[1];
$Pl_DEF=$PlayerInf['ms_def']+$PlayerInf['t_def']+$Pl_CFix[2];
$Pl_REF=$PlayerInf['ms_ref']+$PlayerInf['t_ref']+$Pl_CFix[3];
$Pl_TAF=$PlayerInf['ms_taf']+$PlayerInf['t_taf']+$Pl_CFix[4];

if ($PlayerInf['hypermode'] >= 4 && $PlayerInf['hypermode'] <= 6){
        //Natural
        if (ereg('(nat)+',$PlayerInf['typech'])) {
                $Pl_ATF += 5;
                $Pl_DEF += 5;
                $Pl_REF += 5;
                $Pl_TAF += 5;
                }
        //Enhanced
        elseif (ereg('(enh)+',$PlayerInf['typech'])) {
                $Pl_ATF += 5;
                $Pl_DEF += 1;
                $Pl_REF += 2;
                $Pl_TAF += 7;
                }
        //Extended
        elseif (ereg('(ext)+',$PlayerInf['typech'])) {
                $Pl_ATF += 5;
                $Pl_REF += 3;
                $Pl_TAF += 2;
                }
}
echo "<tr><td><b style=\"color: $PlayerInf[2];font-size: 16pt\"><a name=#$PlayerInf[gamename]>$PlayerInf[gamename]</a> <font color=$PlayerInf[color]>($PlayerInf[name])</font>$Rank</b><br>";
echo "<table align=center width=90% border=0><tr><td width=67%>";
echo "����ֵ: $PlayerInf[hp] / $PlayerInf[hpmax]<Br>";
echo "����ֵ: $PlayerInf[en] / $PlayerInf[enmax]<Br>";
echo "�ȼ�: $PlayerInf[level]<Br>";
echo "����: ";

echo "<b";
if ($PlayerInf['hypermode'] == 1 || ($PlayerInf['hypermode'] >= 4 && $PlayerInf['hypermode'] <= 6))
echo " style=\"filter: glow(color: 0000FF,strength=2)\"";
echo ">$PlayerInf[t_name]";
if ($PlayerInf['hypermode'] == 1 || $PlayerInf['hypermode'] == 5)
echo "<br><font style=\"color: FFFF00;font-weight: bold\">SEED Mode</font>";
if ($PlayerInf['hypermode'] >= 4 && $PlayerInf['hypermode'] <= 6)
echo "<br><font style=\"color: FF0000;font-weight: bold\">EXAM Activated</font>";
echo "</b><br>";

$PrInf_WepA = explode('<!>',$PlayerInf['wepa']);
$PrInf_WepD = explode('<!>',$PlayerInf['eqwep']);
$PrInf_WepE = explode('<!>',$PlayerInf['p_equip']);
GetWeaponDetails("$PrInf_WepA[0]",'Pr_SyWepA');
        if ($PrInf_WepA[2]){
        if ($PrInf_WepA[2]==1) $Pr_SyWepA['name'] = $PrInf_WepA[3].$Pr_SyWepA['name']."<sub>?</sub>";
        else $Pr_SyWepA['name'] = $Pr_SyWepA['name'].$PrInf_WepA[3]."<sub>?</sub>";
        }
GetWeaponDetails("$PrInf_WepD[0]",'Pr_SyWepD');
        if ($PrInf_WepD[2]){
        if ($PrInf_WepD[2]==1) $Pr_SyWepD['name'] = $PrInf_WepD[3].$Pr_SyWepD['name']."<sub>?</sub>";
        else $Pr_SyWepD['name'] = $Pr_SyWepD['name'].$PrInf_WepD[3]."<sub>?</sub>";
        }
if($PrInf_WepE[0]){
GetWeaponDetails("$PrInf_WepE[0]",'Pr_SyWepE');
        if ($PrInf_WepE[2]){
        if ($PrInf_WepE[2]==1) $Pr_SyWepE['name'] = $PrInf_WepE[3].$Pr_SyWepE['name']."<sub>?</sub>";
        else $Pr_SyWepE['name'] = $Pr_SyWepE['name'].$PrInf_WepE[3]."<sub>?</sub>";
        }
}
echo "ʹ������: $Pr_SyWepA[name]<br>";
echo "����װ��: $Pr_SyWepD[name]<br>";
if ($PrInf_WepE[0])echo "����װ��: $Pr_SyWepE[name]<br>";
echo "</td><td align=center>";
echo "<img src=\"".$Unit_Image_Dir."/$PlayerInf[image]\"><br>$PlayerInf[msname]";
echo "</td></tr></table>";
echo "<hr width=90% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";
echo "<center>��������: ".dualConvert($PlayerInf['attacking'])." (+$Pl_ATF)   ��������: ".dualConvert($PlayerInf['defending']);
echo " (+$Pl_DEF)   ��Ӧ����: ".dualConvert($PlayerInf['reacting'])." (+$Pl_REF)   ���м���: ".dualConvert($PlayerInf['targeting']);
echo " (+$Pl_TAF) <br>";
switch ($PlayerInf['status']){case 0: $StatusShow="����"; $StatusColor='#00CD00';break; case 1: $StatusShow="������"; $StatusColor='#FF2200';break;}
echo "ʤ������/����: $PlayerInf[v_points]/$PlayerInf[victory]                     ״̬: <font color=$StatusColor>$StatusShow</font>                     ��������: $PlayerInf[coordinates]<br>";
if ($PlayerInf['fame'] >= 0)$TypeFame = '����';
else $TypeFame = '����';
$ShowFame = abs($PlayerInf['fame']);
echo "$TypeFame : $ShowFame                     ���ͽ�: $PlayerInf[bounty]<br>";
echo "</tr></td>";
unset($Pr_SyWepA,$Pr_SyWepD,$PrInf_WepA,$PrInf_WepD,$PlayerInf);
}
while($PlayerInf = mysql_fetch_array($query));

echo "</table>";
echo "</tr></td>";

}

elseif ($InfSbAct == 'History'){
echo "<tr><td>";
echo "<table align=center width=100% height=100% cellspacing=2 cellpadding=3 style=\"font-size:16px;\" border=1>";
echo "<tr><td colspan=6><center><b>������ʷ�б�</b></center></td></tr>";
echo "<tr><td>";

echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"70%\">";

echo "<tr><td align=center style=\"font-size:16px;\"><b>��ʷ<b></tr></td>";

$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_game_history` ORDER BY `time` DESC");
$query = mysql_query($sql);
$HistoryEntries = mysql_num_rows($query);

for($CountHist=1;$CountHist <= $HistoryEntries;$CountHist++){
$History = mysql_fetch_array($query);
$History['DateTime'] = cfu_time_convert($History['time']);
echo "<tr><td align=left style=\"font-size:10px;\"><b style=\"font-size:12px;\">$History[DateTime]</b><br>";
echo "$History[history]";
echo "</tr></td>";
}

echo "</tr></td>";
echo "</table>";

echo "</tr></td></table>";
echo "</tr></td>";
}

elseif ($InfSbAct == 'OnlinePpl'){
echo "<tr><td>";
echo "<table width=100% cellspacing=2 cellpadding=3 style=\"font-size:11px;\" border=1>";
echo "<tr><td colspan=6><center><b>�������</b></center></td></tr>";
echo "<tr><td>���</td><td>��ʹԱ����</td><td>��������</td><td>�ȼ�</td><td>���ڵ���</td></tr>";
$sqlgen  = ("SELECT `gamename`,`level`,`coordinates`,org.name As oname FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` game,`".$GLOBALS['DBPrefix']."phpeb_user_general_info` gen,`".$GLOBALS['DBPrefix']."phpeb_user_organization` org WHERE ($CFU_Time - `time2`) < ".$GLOBALS['Offline_Time']." AND gen.username = game.username AND org.id = organization ORDER BY organization DESC,coordinates,level DESC");
$query_gen = mysql_query($sqlgen) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');
$counter = 0;
while($R_Inf = mysql_fetch_array($query_gen)){
$counter++;
$level = abs($R_Inf['level']);
echo "<tr><td>$counter</td><td><a href=# style=\"text-decoration: none\" onClick=\"getInfo('Player','Single','$R_Inf[gamename]')\">$R_Inf[gamename]</a></td><td>$R_Inf[oname]</td><td>$R_Inf[level]</td><td>$R_Inf[coordinates]</td></tr>";
}
echo "</table>";
echo "</tr></td>";
}

echo "</table>";
}
else {echo "δ���嶯����";}
postFooter();
echo "</form></body>";
echo "</html>";
exit;
?>