<?
//Settings
$HTTP_REFERER = '������е�˴�ս';		//��Set�����������ߵ�ַ,cfu.php�ڵġ�$Allow_AUC������
//End of Settings
$NoConnect=1;
$NoCheckRef=1;
include('cfu.php');
postHead('1');
$mode = ( isset($_GET['action']) ) ? $_GET['action'] : $_POST['action'];

$VERSION = "<span onmouseover=\"this.style.cursor='hand';window.status='';\" onmouseout=\"window.status=''\" onClick=\"window.open('http://v2alliance.no-ip.org')\">php-eb Version ". $cSpec ."</span>";
if ($vBdNum) $VERSION .= "�@&nbsp;&nbsp;&nbsp;&nbsp;<br><font style='font-size: 10px'>�����". $vBdNum ."</font>";
if ($sSpec) $VERSION .= "�@&nbsp;&nbsp;&nbsp;&nbsp;<br><span style='font-size: 10px' onmouseout=\"window.status=''\" onmouseover=\"this.style.cursor='hand';window.status='վ��\'".$WebMasterName."\'����վ'\" onClick=\"window.open('".$WebMasterSite."')\">". $sSpec ."</span>";

if (!$mode){

echo "<script type=\"text/JavaScript\">";
echo "if (screen.availWidth == 1024){";
echo "moveTo( screen.availWidth/8 , screen.availHeight/8);}";
echo "else {moveTo(0,0);}";
echo "resizeTo(800,620);";
echo "window.status='';";
echo "</script>";

echo "<link href='$General_Image_Dir/style.css' type=text/css rel=stylesheet>";
echo "<body oncontextmenu=\"return false;\" style=\"background-image: url('$General_Image_Dir/background/atmosphere/a2.jpg')\">";
echo "<base target=\"slfrm\">";

echo "<table width='750' height='520'><tr><td height='220'>";
//Name
echo "<div align=center style=\"font-size:70px;font-family: 'Monotype Corsiva';color:#505050;filter:alpha(opacity=100,finishopacity=0,style=2);height:60px;background-color:#fff0f0;\">";
echo "<b>��е�˴�ս</b></div>";
echo "<div align=center style=\"font-size:25px;font-family:'Monotype Corsiva','Comic Sans MS';color:#ffffff;\"><b>ȫ��PHP��</b></div>";

echo "<div align=right><p></p></div>";
echo "</td></tr>";
//<!---[Lower Part - Start]--->
echo "<tr height='300'><td><table width='800' height='300'><tr>";
echo "<td width=135 style=\"background-color: transparent;font-weight: Bold;filter: glow(color=#3366FF,strength=3);\">";
echo "<a href=\"?action=Login\" style='text-decoration: none'>&nbsp;&nbsp;��½��Ϸ</a><p>";
echo "<a href=\"?action=Pedia\" style='text-decoration: none'>&nbsp;&nbsp;��Ϸ����</a></p>";
//echo "<p><a href=\"stats.html\" style=\"text-decoration: none\">&nbsp;&nbsp;Game Statistics</a></p>";
echo "<p><a href=\"gen_info.php?action=history\" style='text-decoration: none'>&nbsp;&nbsp;��ʷ��Ϣ</a></p>";

echo "<td width=665>";
echo "<iframe name='slfrm' src='?action=Login' width='650' height='300' marginheight=0 marginwidth=0 frameborder=0 style=\"background: transparent;\">";
echo "</td>";


echo "</tr></table>";

//<!---[Lower Part - End]--->


echo "</td></tr></table></body></html></iframe>";
echo "<font style=\"color:blue; font-weight: Bold;\">";
PostFooter();
echo "</font>";
}
elseif ($mode == 'Login'){


echo "<link href='$General_Image_Dir/style.css' type=text/css rel=stylesheet>";

echo "<body oncontextmenu=\"return false;\"><table width='500' height='300'><tr><td>";
echo "<p align='center'><b>";
echo "<font face='Arial' style=\"font-size: 52px;filter: glow(color=#3366FF,strength=10); height:10px; color:white\">";
echo "��е�˴�սOL";
echo "</font></b></p>";
echo "<form action=\"gmscrn_main.php?action=proc\" method=post name=login target=_parent>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "<p align='center'>";
echo "�û�: <input type=text name=\"Pl_Value[USERNAME]\" style=\"height:21px; color:#ededed; font-size:16px; background: transparent; border:1px solid white; \" size=\"20\">";
echo "<br>";
echo "����: <input type=password name=\"Pl_Value[PASSWORD]\" style=\"height:21px; color:#ededed; font-size:16px; background: transparent; border:1px solid white; \" size=\"20\">";
echo "<p align='center'>";
echo "<input type='submit' value='����'><input type='reset' value='����'></p>";
echo "<center><font onClick=\"login.action='register.php';login.submit();\" style=\"font-size: 16px;font-weight: Bold;filter: glow(color=#3366FF,strength=3); height:10px; color:yellow;\"><a href=\"#\">&nbsp;�½��ʺ�!&nbsp;<br>&nbsp;����ע��&nbsp;</a></font>";
echo "</form></td></tr></table></body></html>";

}

elseif ($mode == 'Pedia'){
echo "<link href='$General_Image_Dir/style.css' type=text/css rel=stylesheet>";

echo "<center>";

echo "<br><br><br><br>
<table border=0 cellpadding=0 cellspacing=0 align=center style=\"border:1px solid #606060;font-size:16px;\">
	<tr>
	<td colspan=2>&nbsp;�ο�����</td>
	</tr>
	<tr>
	<td><a href=\"gen_info.php?action=weplist\" target=\"_blank\" style=\"font-size:20px;\"><b>�����б�</b></a></td>
	</tr>
	<tr>
	<td><a href=\"gen_info.php?action=mslist\" target=\"_blank\" style=\"font-size:20px;\"><b>�����б�</b></a></td>
	</tr>
	<tr>
	<td><a href=\"gen_info.php?action=calpt\" target=\"_blank\" style=\"font-size:20px;\"><b>Pt Cal</b></a></td>
	</tr>
	<tr>
	<td><a href=\"gen_info.php?action=cal\" target=\"_blank\" style=\"font-size:20px;\"><b>�����</b></a></td>
	</tr>
	<!--
	<tr>
	<td><a href=\"ava_list.php\" target=\"_blank\" style=\"font-size:20px;\"><b>Avatars</b></a></td>
	</tr>
	-->
	</table>
";

echo "</body>";
}
?>