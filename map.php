<?php
$mode = ( isset($_GET['action']) ) ? $_GET['action'] : $_POST['action'];
include('cfu.php');
postHead('');
AuthUser("$Pl_Value[USERNAME]","$Pl_Value[PASSWORD]");
if ($CFU_Time >= $TIMEAUTH+$TIME_OUT_TIME || $TIMEAUTH <= $CFU_Time-$TIME_OUT_TIME){echo "连线逾时！<br>请重新登入！";exit;}
GetUsrDetails("$Pl_Value[USERNAME]",'Gen','Game');
if (($CFU_Time - $Gen['btltime']) < $Move_Intv){echo "距离上次攻击或移动的时间太短了！<br>请在 ".($Move_Intv-($CFU_Time - $Gen['btltime']))." 秒后再移动！";exit;}
else{
if ($Gen['msuit']){
        $Pl_Repaired = AutoRepair("$Gen[username]");
        $Game['hp'] = $Pl_Repaired['hp'];
        $Game['en'] = $Pl_Repaired['en'];
        $Game['sp'] = $Pl_Repaired['sp'];
        $Game['status'] = $Pl_Repaired['status'];
        }
else {echo "<center>你没有机体，不能移动。";postFooter();exit;}
if ($Game['status']){echo "<center>修理中，无法移动。";postFooter();exit;}
}



$Area = ReturnMap("$Gen[coordinates]");
$AreaLandForm = ReturnMType($Area["Sys"]["type"]);

if ($Game['organization'])
$Pl_Org = ReturnOrg("$Game[organization]");
//Special Commands GUI
if ($mode=='Move' && $actionb == 'A'){
        echo "<font style=\"font-size: 12pt\">移动</font>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\">";   

        echo "<form action=map.php?action=Move method=post name=mainform>";
        echo "<input type=hidden value='Process' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        
        
        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";

        echo "<tr><td align=left width=250><b style=\"font-size: 10pt;\">现在位置: $AreaLandForm </b></td></tr>";
        echo "<tr><td align=center>";
        echo "<div align=left><b>宇宙地图:</b></div>";



echo "<table align=center border=0 background=unitimg/space.gif cellpadding=0 cellspacing=0 style=\"color: white; border-collapse: collapse bordercolor=#111111\" width=90% id=AutoNumber1 height=90%>";
echo "<tr align=center valign=center>";

//Start Non Intelligent mode


$Area = ReturnMap("$Gen[coordinates]");
//$Area_Org = ReturnOrg($Area["User"]["occupied"]);

//$Movements = explode("\n",$Area["Sys"]["movement"]);

echo "</tr><tr align=center valign=center>";


echo "<td width=100 align=center style=\"background: ". $C1_Org[color] ."\"><input type=radio name=destination";
if(!ereg('(C1)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='C1'><br>所罗门宇宙海</td>";
echo "<td width=100 align=right style=\"background: ". $A2_Org[color] ."\"><input type=radio name=destination";
if(!ereg('(A2)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='A2'><br>火星基地</td>";
echo "<td width=120 align=right style=\"background: ". $A3_Org[color] ."\"><input type=radio name=destination";
if(!ereg('(A3)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='A3'><br>L3-X18999</td>";

echo "</tr><tr align=center valign=center>";

echo "<td width=100 align=left style=\"background: ". $B1_Org[color] ."\"><input type=radio name=destination";
if(!ereg('(B1)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='B1'><br>阿·巴瓦·库</td>";
echo "<td width=70 align=right style=\"background: ". $B2_Org[color] ."\"><input type=radio name=destination";
if(!ereg('(B2)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='B2'><br>SIDE3</td>";
echo "<td width=100 style=\"background: ". $B3_Org[color] ."\"><input type=radio name=destination";
if(!ereg('(B3)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='B3'><br>迈锡尼帝国</td>";

echo "</tr><tr align=center valign=center>";

echo "<td width=100 align=right style=\"background= ". $A1_Org[color] ."\"><input type=radio name=destination";
if(!ereg('(A1)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='A1'><br>冯布朗市</td>";
echo "<td width=100 valign=top align=right style=\"background: ". $C2_Org[color] ."\"><input type=radio name=destination";
if(!ereg('(C2)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='C2'><br>茨之园</td>";
echo "<td width=130 align=right style=\"background: ". $C3_Org[color] ."\"><input type=radio name=destination";
if(!ereg('(C3)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='C3'><br>天顶星帝国</td>";
echo "</tr></table>";

echo "<table align=center border=1 background= cellpadding=0 cellspacing=0 style=\"color: white; border-collapse: collapse bordercolor=#111111\" width=90% id=AutoNumber1 height=90%>";
echo "<tr align=center valign=center>";
echo "<td width=33% align=left style=\"background= ". $E1_Org[color] ."\"><input type=radio name=destination";
if(!ereg('(E1)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='E1'><br>进入太空</td>";
echo "<td width=33% align=right style=\"background: ". $E2_Org[color] ."\"><input type=radio name=destination";
if(!ereg('(E2)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='E2'><br>降落地球</td>";
echo "</tr></table>";

echo "<tr><td align=center>";
	echo "<div align=left><b>世界地图:</b></div>";


echo "<table align=center border=0 background=unitimg/earth.gif cellpadding=0 cellspacing=0 style=\"color: white; border-collapse: collapse bordercolor=#111111\" width=90% id=AutoNumber1 height=90%>";
echo "<tr align=center valign=center>";

//Start Non Intelligent mode


$Area = ReturnMap("$Gen[coordinates]");
//$Area_Org = ReturnOrg($Area["User"]["occupied"]);

//$Movements = explode("\n",$Area["Sys"]["movement"]);

echo "</tr><tr align=center valign=center>";

echo "<td width=100 align=right style=\"background: ". $D1_Org[color] ."\"><input type=radio name=destination";
if(!ereg('(D1)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='D1'><br>格陵兰大陆</td>";
echo "<td width=30% style=\"background: ". $D2_Org[color] ."\"><input type=radio name=destination";
if(!ereg('(D2)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='D2'><br>设德兰群岛</td>";
echo "<td width=120 align=right style=\"background: ". $D3_Org[color] ."\"><input type=radio name=destination";
if(!ereg('(D3)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='D3'><br>摩尔曼斯克军港</td>";

echo "</tr><tr align=center valign=center>";

echo "<td width=70 valign=bottom align=right style=\"background: ". $D4_Org[color] ."\"><input type=radio name=destination";
if(!ereg('(D4)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='D4'><br>休斯顿基地</td>";
echo "<td width=90 valign=top style=\"background: ". $D5_Org[color] ."\"><input type=radio name=destination";
if(!ereg('(D5)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='D5'><br>直布罗陀海峡</td>";
echo "<td width=40 valign=top style=\"background: ". $D6_Org[color] ."\">
<input type=radio name=destination";
if(!ereg('(D6)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='D6'><br>帕米尔高原</td>";

echo "<td width=40 align=left style=\"background: ". $D10_Org[color] ."\">
";
if(!ereg('(D10)+',$Area["Sys"]["movement"])) echo "<img src=images/star.gif>";
echo "<br></td>";
echo "</tr><tr align=center valign=center>";


echo "<td width=33% align=left style=\"background= ". $D7_Org[color] ."\"><input type=radio name=destination";
if(!ereg('(D7)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='D7'><br>珊瑚海海域</td>";
echo "<td width=80 align=right style=\"background: ". $D8_Org[color] ."\"><input type=radio name=destination";
if(!ereg('(D8)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='D8'><br>乞力马扎罗</td>";
echo "<td width=90 style=\"background: ". $D9_Org[color] ."\"><input type=radio name=destination";
if(!ereg('(D9)+',$Area["Sys"]["movement"])) echo " disabled";
echo " value='D9'><br>东南亚基地</td>";

echo "</tr></table>";


	echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\"><input type=submit value=移动>";
	echo "</tr></td></form></table>";
//End Non Intelligent Mode
}
elseif ($mode=='Move' && $actionb == 'Process'){

$Area = ReturnMap("$Gen[coordinates]");
//$Area_Org = ReturnOrg($Area["User"]["occupied"]);
if (!$destination){echo "错误！请先指定要移动到的目的地。";postFooter();exit;}
if(!ereg('('.$destination.')+',$Area["Sys"]["movement"])){echo "错误！";postFooter();exit;}

        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `coordinates` = '$destination',`btltime` = '$CFU_Time' WHERE `username` = '".$Gen['username']."' LIMIT 1");
        $query = mysql_query($sql) or die ('无法取得组织资讯, 原因:' . mysql_error() . '<br>');

        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">移动完成了！<input type=submit value=\"返回\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";

}
else {echo "未定义动作！";}
postFooter();
echo "</body>";
echo "</html>";
exit;
?>