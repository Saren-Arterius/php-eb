<?

include('cfu.php');
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<title>�����˴�սOnlineע�����</title>
</head>
<?
if (!ereg("(index2.php|register.php){1}",$HTTP_REFERER)){ //Anti-Direct Connection
echo "Unauthorized Connection Detected<br>Referer: $HTTP_REFERER<br>";
echo "IP: $REMOTE_ADDR Logged<br>";
postFooter();
$contents = '/*'."Date: `$CFU_Date' \n Logged Username: `$Pl_Value[USERNAME]' \t\t Logged Password: `$Pl_Value[PASSWORD]'\n";
$contents .= "IP: `$REMOTE_ADDR' \t\t Referer: `$HTTP_REFERER'\n";
$contents .= "REQUEST_METHOD: `$REQUEST_METHOD' \t\t SCRIPT_FILENAME: `$SCRIPT_FILENAME' \nQUERY_STRING: `$QUERY_STRING '\n";
$contents .= '_______________________________________________________';
$contents .= '_______________________________________________________*/'."\n";
$fp = fopen($AUC_Log,"r+");
fwrite($fp,$contents);
fclose($fp);
exit;
}
if ($MAX_PLAYERS){
$NumPlSQL = ("SELECT count(username) FROM `".$GLOBALS['DBPrefix']."phpeb_user_general_info` LIMIT $MAX_PLAYERS");
$NumPlSQL_Query = mysql_query($NumPlSQL);
$NumPl = mysql_fetch_row($NumPlSQL_Query);
	if ($NumPl[0] >= $MAX_PLAYERS){
		echo "<center><br><br>��¼����̫�ࡣ<br>�ֵ�¼����: $OnlinePlNum[0]<br>��¼��������: $MAX_PLAYERS<br><a href=\"index2.php\" target='_top' style=\"text-decoration: none\">�ص���ҳ</a><br><br>";
		postFooter();exit;
	}
}
if ($OLimit){
$Online_Time = time() - $Offline_Time;
$OnlineSQL = ("SELECT count(time2) FROM `".$GLOBALS['DBPrefix']."phpeb_user_general_info` WHERE `time2` > '$Online_Time'");
$OnlineSQL_Query = mysql_query($OnlineSQL);
$OnlinePlNum = mysql_fetch_row($OnlineSQL_Query);
	if ($OnlinePlNum[0] >= $OLimit){
		echo "<center><br><br>��������̫�ࡣ<br>����������: $OnlinePlNum[0]<br>������������: $OLimit<br><a href=\"index2.php\" target='_top' style=\"text-decoration: none\">�ص���ҳ</a><br><br>";
		postFooter();exit;
	}
}
if (!$REGISTER_S1){
if ($CFU_Time >= $TIMEAUTH+$TIME_OUT_TIME || $TIMEAUTH <= $CFU_Time-$TIME_OUT_TIME){echo "���߳�ʱ��<br><a href=\"index2.php\" target='_top' style=\"text-decoration: none\">�ص���ҳ</a>";exit;}
echo "<script langauge=\"Javascript\">";
echo "window.status ='";
if ($MAX_PLAYERS)
echo "����¼����: ".$NumPl[0]."/".$MAX_PLAYERS;
if ($OLimit)
echo "����������: ".$OnlinePlNum[0]."/".$OLimit;
echo "';";
echo "
function checkC(str){
		var word = str;
		for(var c = 0 ; c < word.length ; c++){
			var code = word.charAt(c);
			if((code >= '0') && (code <= '9')){
				continue;
			}
			else if((code >= 'a') && (code <= 'z')){
				continue;
			}
			else if((code >= 'A') && (code <= 'Z')){
				continue;
			}
			else{
				return false;
			}
		}
		return true;
	}
function checkRegister(){
	if (document.regform.reg_username.value ==''){alert('������ʹ��������');return false}
	else if(document.regform.reg_gamename.value ==''){alert('��������Ϸ�ڵ�����');return false}
	else if(document.regform.reg_password.value ==''){alert('����������');return false}
	else if(checkC(document.regform.reg_username.value) == false){alert('ʹ��������ֻ������Ӣ����ĸ���������');return false;}
	else if(checkC(document.regform.reg_username.value) == false){alert('����ֻ������Ӣ����ĸ���������');return false;}
	else if(document.regform.reg_password.value != document.regform.reg_passwordconf.value){alert('������������벻��ͬ������������');return false;}
	else if(pt_cal.innerText != 22){alert('���������ϼƲ���22');return false;}
	else {if (confirm('�������Ͻ���ȷ�����Կ�ʼ��¼��') == true){return true}else {return false}}
}
function calstatpt(){
	var At = 1*(document.regform.reg_at.value);
	var De = 1*(document.regform.reg_de.value);
	var Ta = 1*(document.regform.reg_ta.value);
	var Re = 1*(document.regform.reg_re.value);
	var statsum = At;
	statsum += De;
	statsum += Ta;
	statsum += Re;
	pt_cal.innerText = statsum;
	pt_cal.style.color='blue';
	if (statsum > 22){pt_cal.style.color='red';}
	if (statsum == 4){pt_cal.style.color='white';}
	if (statsum == 22){pt_cal.style.color='yellow';}
	}
</script>
<body bgcolor=\"#000000\" text=#dcdcdc link=#dcdcdc style=\"margin:0px 0px 0px 0px;\" style=\"font-family: Arial\" oncontextmenu=\"return false;\">
<p align=\"center\" style=\"font-size: 18pt;font-weight: 800\">ע��</p>
<form action=register.php method=POST name=regform>
<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">
  <center>
  <table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"80%\" id=\"AutoNumber1\">
    <tr>
      <td width=\"33%\" style=\"font-size: 12pt;font-weight: 800\">ע���ʺ�:<br><input type=text name=reg_username maxlength=16></td>
      <td width=\"33%\" rowspan=\"4\">&#12288;</td>
      <td width=\"34%\" rowspan=\"4\">&#12288;</td>
    </tr>
    <tr>
      <td width=\"33%\" style=\"font-size: 12pt;font-weight: 800\">��Ϸ����:<br><input type=text name=reg_gamename maxlength=16></td>
    </tr>
    <tr>
      <td width=\"33%\" style=\"font-size: 12pt;font-weight: 800\">��������:<br><input type=password name=reg_password maxlength=16></td>
    </tr>
    <tr>
      <td width=\"33%\" style=\"font-size: 12pt;font-weight: 800\">�ظ�����:<br><input type=password name=reg_passwordconf maxlength=16></td>
    </tr>
  </table>
  </center>
  <center>
  <table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"95%\" id=\"AutoNumber2\">
    <tr>
      <td width=\"100%\" style=\"font-size: 12pt;font-weight: 800\">��Ϸ�ʺ�: ";
if ($CFU_CheckRegKey)
echo "<input type=text name=reg_key maxlength=10>";
echo "</td>
    </tr>
  </table>

  </center>
<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"100%\" id=\"AutoNumber3\">
  <tr rowspan=2>
    <td width=\"50%\" rowspan=\"3\" valign=top style=\"font-size: 12pt;font-weight: 800\">��ɫ:<br>";
$br=0;$ct_default=0;
foreach ($MainColors as $CVAL){$br++;$ct_default++;
echo "<input type=\"radio\" name=\"REG_VAL[COLOR]\" value=#".$CVAL;
if ($ct_default==1) echo " checked";
echo "><font color=#".$CVAL.">��</font>&nbsp;";
if ($br==6){echo"<br>";$br=0;}
}
echo "</td>
    <td width=\"33%\" style=\"font-size: 12pt;font-weight: 800\">����:<br><select size=6 name=\"REG_VAL[TYPE]\">
    <option value=nat1 selected>�@��H
    <option value=ext1>Extended
    <option value=enh1>ǿ���ˤH
    <option value=psy1>����O
    <option value=nt1>NT
    <option value=co1>Coordinator
    </select></td>
  </tr>
    <tr>
    <td width=\"34%\"><span lang=\"zh-tw\" style=\"font-size: 12pt;font-weight: 800\">��������(�ϼ���ҪΪ22��):</span><br>��������: <select size=1 name=\"reg_at\"  onChange=\"calstatpt()\">
    <option value='1'>1<option value='2'>2<option value='3'>3<option value='4'>4<option value='5'>5<option value='6'>6<option value='7'>7<option value='8'>8<option value='9'>9<option value='10'>10
    </select><br>��������: <select size=1 name=\"reg_de\" onChange=\"calstatpt()\">
    <option value=1>1<option value=2>2<option value=3>3<option value=4>4<option value=5>5<option value=6>6<option value=7>7<option value=8>8<option value=9>9<option value=10>10
    </select><br>��������: <select size=1 name=\"reg_ta\" onChange=\"calstatpt()\">
    <option value=1>1<option value=2>2<option value=3>3<option value=4>4<option value=5>5<option value=6>6<option value=7>7<option value=8>8<option value=9>9<option value=10>10
    </select><br>��Ӧ�ٶ�: <select size=1 name=\"reg_re\" onChange=\"calstatpt()\">
    <option value=1>1<option value=2>2<option value=3>3<option value=4>4<option value=5>5<option value=6>6<option value=7>7<option value=8>8<option value=9>9<option value=10>10
    </select><br>�ϼ�ֵ: <span id=pt_cal style>4</span>
    </td>
  </tr>
</table>
<center><input type=\"submit\" name=\"Form[Submitbutton]\" value =\"ע��\" onClick=\"return checkRegister()\">
<input type=hidden name=REGISTER_S1 value='1'>
</form>
</body>
";
}
elseif ($REGISTER_S1){
echo "<body bgcolor=\"#000000\" text=#dcdcdc link=#dcdcdc style=\"margin:0px 0px 0px 0px;\" oncontextmenu=\"return false;\" style=\"font-family: Arial\">";
if ($reg_password != $reg_passwordconf) {echo "���벻���";
exit;
}
//$reg_username = ereg_replace("[������]+",'&nbsp;',$reg_username);
//$reg_username = eregi_replace("((f.ck)|(fu.k)|(fuc.)|(sh.t)|(sucker)|(bitch)|(asshole))+",'',$reg_username);
if ($reg_username == '<AttackFort>'){echo "���Ʋ�������Ҫ����";exit;}
if($CFU_CheckRegKey){
	if ($reg_key != $NPC_RegKey){
unset($sql);
$sql= ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_regkeys` WHERE `regkey` = ".$reg_key." ");
$RegKeyQuery = mysql_query($sql);
$numsRKey = mysql_num_rows($RegKeyQuery);
if (!$numsRKey){echo "δ��ȡ��ע�������Ѷ��";postFooter();exit;}
$RegKeyData = mysql_fetch_array($RegKeyQuery);
if ($RegKeyData['status']){echo "ע�����Ѿ���ʹ�á�";postFooter();exit;}
if($CFU_CheckIP){
$sql= ("SELECT count(*) FROM `".$GLOBALS['DBPrefix']."phpeb_regkeys` WHERE `ip` = ".$REMOTE_ADDR." ");
$ReadyReg = 0;
$RegKeyQuery = mysql_query($sql) or $ReadyReg = 1;
if(!$ReadyReg)
$RegKeyIPCheck = mysql_fetch_row($RegKeyQuery);
if ($RegKeyIPCheck >= 1){echo "IP�Ѿ���ʹ�á�";postFooter();exit;}
}
}}
$statusptmax=22;
if ($reg_at+$reg_de+$reg_ta+$reg_re != $statusptmax){
echo "���������ܺͲ��� $statusptmax ��";postFooter();exit;
}
$CASH_BASE=120000;
$CASH=$CASH_BASE;
if ($CFU_Time >= $TIMEAUTH+$TIME_OUT_TIME || $TIMEAUTH <= $CFU_Time-$TIME_OUT_TIME){echo "������ʱ��";exit;}
if ($REG_VAL['TYPE'] == 'nat1') $CASH=$CASH_BASE*5;
elseif ($REG_VAL['TYPE'] == 'ext1' || $REG_VAL['TYPE'] == 'enh1') $CASH=$CASH_BASE*4;
elseif ($REG_VAL['TYPE'] == 'psy1') $CASH=$CASH_BASE*3;
elseif ($REG_VAL['TYPE'] == 'nt1' || $REG_VAL['TYPE'] == 'co1')$CASH=$CASH_BASE*2;
else {echo "ϵͳδ��ȷ���������ͣ����������ԡ�";postFooter();exit;}
if ($reg_at>10 || $reg_de>10 || $reg_ta>10 || $reg_re>10){echo "�������ߣ�";postFooter();exit;}
if ($reg_at<=0 || $reg_de<=0 || $reg_ta<=0 || $reg_re<=0){echo "�������ͣ�";postFooter();exit;}
$CASH=floor($CASH);
$t_now=time();
//Analyze Coordinates
mt_srand ((double) microtime()*1000000);
switch(mt_rand(0,$StartZoneRestriction)){
case 0: $CoordinatesSt='A1';break;
case 1: $CoordinatesSt='A2';break;
case 2: $CoordinatesSt='A3';break;
case 3: $CoordinatesSt='B1';break;
case 4: $CoordinatesSt='B2';break;
case 5: $CoordinatesSt='B3';break;
case 6: $CoordinatesSt='C1';break;
case 7: $CoordinatesSt='C2';break;
case 8: $CoordinatesSt='C3';break;
default : $CoordinatesSt='A1';break;
}
	//Enter General Info
	$sql = ("INSERT INTO ".$GLOBALS['DBPrefix']."phpeb_user_general_info (username, password, regkey,cash,color,avatar,msuit,typech,growth,time1,time2,btltime,coordinates) VALUES('$reg_username',md5('$reg_password'),'$REG_VAL[REGKEY]','$CASH','$REG_VAL[COLOR]','nil','0','$REG_VAL[TYPE]','0','$t_now' ,'$t_now' ,'','$CoordinatesSt')");
	mysql_query($sql) or die ('<br><center>δ�����ע�� (Location ID: Register01)<br>ԭ��:' . mysql_error() . '<br>');
	//Enter Game Info
	$sql = ("INSERT INTO ".$GLOBALS['DBPrefix']."phpeb_user_game_info (username, gamename,attacking,defending,reacting,targeting) VALUES('$reg_username','$reg_gamename','$reg_at','$reg_de','$reg_re','$reg_ta')");
	mysql_query($sql) or die ('<br><center>δ�����ע�� (Location ID: Register02)<br>ԭ��:' . mysql_error() . '<br>');
	//Enter Settings
	$sql = ("INSERT INTO ".$GLOBALS['DBPrefix']."phpeb_user_settings (username) VALUES('$reg_username')");
	mysql_query($sql) or die ('<br><center>δ�����ע�� (Location ID: Register05)<br>ԭ��:' . mysql_error() . '<br>');
	//Enter Log
	$sql = ("INSERT INTO ".$GLOBALS['DBPrefix']."phpeb_user_log (username,log1, time1) VALUES('$reg_username','��ӭ����php-eb�����磡',UNIX_TIMESTAMP())");
	mysql_query($sql) or die ('<br><center>δ�����ע�� (Location ID: Register03)<br>ԭ��:' . mysql_error() . '<br>');
	//Enter Bank
	$sql = ("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_bank` (username) VALUES('$reg_username')");
	mysql_query($sql) or die ('<br><center>δ�����ע�� (Location ID: Register04)<br>ԭ��:' . mysql_error() . '<br>');
	if($CFU_CheckRegKey){
	//Update Reg Key
	$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_regkeys` SET `username` = '$reg_username',`status`  = '1', `ip` = '$REMOTE_ADDR' WHERE  `regkey` = '$RegKeyData[regkey]' LIMIT 1 ;");
	mysql_query($sql) or die ('<br><center>ע��ɹ���<br>��]:' . mysql_error() . '<br>');
	}
	echo "<p align=center>Register Complete!<br>��¼ID: $reg_username<br>�������ĵ�¼ID!";
	echo "<br><br><br><font color=".$REG_VAL['COLOR'].">������Ĵ�����ɫ��</font>";
	?>
<form action=index2.php method=post>
<center><input type=submit value=���� name=backtoindex>
</form>
<?
}
?>
</html>