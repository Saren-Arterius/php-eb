<?php
$mode = ( isset($_GET['action']) ) ? $_GET['action'] : $_POST['action'];
include('cfu.php');
postHead('');
AuthUser("$Pl_Value[USERNAME]","$Pl_Value[PASSWORD]");
if ($CFU_Time >= $TIMEAUTH+$TIME_OUT_TIME || $TIMEAUTH <= $CFU_Time-$TIME_OUT_TIME){echo "连线逾时！<br>请重新登入！";exit;}
GetUsrDetails("$Pl_Value[USERNAME]",'Gen','Game');
if ($mode=='addstat' && $actionb){
        switch($actionb){
        case 'at': if ($Game['attacking'] >= 100){echo "能力过高！";exit;}$NextStatPt_At=$Game['attacking']+1;CalcStatReq('AtAdd',"$NextStatPt_At");if ($Gen['growth']-$AtAdd_Stat_Req < 0){echo "点数不足！";exit;}$Gen['growth']-=$AtAdd_Stat_Req;$Game['attacking']=$NextStatPt_At;$ShowCompl="攻击技术变成 $Game[attacking] 了。";break;
        case 'de': if ($Game['defending'] >= 100){echo "能力过高！";exit;}$NextStatPt_De=$Game['defending']+1;CalcStatReq('DeAdd',"$NextStatPt_De");if ($Gen['growth']-$DeAdd_Stat_Req < 0){echo "点数不足！";exit;}$Gen['growth']-=$DeAdd_Stat_Req;$Game['defending']=$NextStatPt_De;$ShowCompl="防御能力变成 $Game[defending] 了。";break;
        case 're': if ($Game['reacting'] >= 100){echo "能力过高！";exit;}$NextStatPt_Re=$Game['reacting']+1; CalcStatReq('ReAdd',"$NextStatPt_Re");if ($Gen['growth']-$ReAdd_Stat_Req < 0){echo "点数不足！";exit;}$Gen['growth']-=$ReAdd_Stat_Req;$Game['reacting'] =$NextStatPt_Re;$ShowCompl="反应变成 $Game[reacting] 了。";break;
        case 'ta': if ($Game['targeting'] >= 100){echo "能力过高！";exit;}$NextStatPt_Ta=$Game['targeting']+1;CalcStatReq('TaAdd',"$NextStatPt_Ta");if ($Gen['growth']-$TaAdd_Stat_Req < 0){echo "点数不足！";exit;}$Gen['growth']-=$TaAdd_Stat_Req;$Game['targeting']=$NextStatPt_Ta;$ShowCompl="命中能力变成 $Game[targeting] 了。";break;
        default : echo "未定义操作！";
        }
        $sqlgen = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `growth` = '$Gen[growth]' WHERE `username` = '$Gen[username]' LIMIT 1;");
        mysql_query($sqlgen) or die ('无法取得基本资讯, 原因1:' . mysql_error() . '<br>' . postFooter());
        $sqlgame = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET ");
        switch($actionb){
        case 'at': $sqlgame .=("`attacking` = '$Game[attacking]' ");break;
        case 'de': $sqlgame .=("`defending` = '$Game[defending]' ");break;
        case 're': $sqlgame .=("`reacting` = '$Game[reacting]' ");break;
        case 'ta': $sqlgame .=("`targeting` = '$Game[targeting]' ");break;
        default : echo "未定义操作！";
        }
        $sqlgame .=("WHERE `username` = '$Game[username]' LIMIT 1;");
        mysql_query($sqlgame) or die ('无法取得游戏资讯, 原因2:' . mysql_error() . '<br>' . postFooter());
        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">完成了！<br>现在你的$ShowCompl<input type=submit value=\"返回\"></p>";
        


        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        }
if ($mode == 'modms'){
        echo "机体改造<hr>";
        if(!$Gen['msuit']){echo "你没有机体！不能进行改造工程！";exit;}

        echo "<br><table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"300\">";
        echo "<form action=statsmod.php?action=prcmodms method=post name=modmsform>";
        echo "<input type=hidden value='' name=actionb>";
        echo "<input type=hidden value='validcode2' name=slot_sw>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        GetMsDetails("$Gen[msuit]",'Pl_Ms');

        if ($Game['eqwep'] && $Game['eqwep'] != "0<!>0"){
                unset($Eq_Id,$Eq_Prep,$Eq_Query,$Eq,$a);
                $Eq_Id = explode('<!>',$Game['eqwep']);
                $Eq_Prep = ("SELECT `spec` FROM `".$GLOBALS['DBPrefix']."phpeb_sys_wep` WHERE id='". $Eq_Id[0] ."'");
                $Eq_Query = mysql_query($Eq_Prep);
                $Eq = mysql_fetch_array($Eq_Query);
                if (ereg('(ExtHP)+',$Eq['spec'])){$a = ereg_replace('.*ExtHP<','',$Eq['spec']);$Pl_Ms['hpfix'] += intval($a);}
                if (ereg('(ExtEN)+',$Eq['spec'])){$a = ereg_replace('.*ExtEN<','',$Eq['spec']);$Pl_Ms['enfix'] += intval($a);}
        }
        if ($Game['p_equip'] && $Game['p_equip'] != "0<!>0"){
                unset($P_Eq_Id,$P_Eq_Prep,$P_Eq_Query,$P_Eq,$a);
                $P_Eq_Id = explode('<!>',$Game['p_equip']);
                $P_Eq_Prep = ("SELECT `spec` FROM `".$GLOBALS['DBPrefix']."phpeb_sys_wep` WHERE id='". $P_Eq_Id[0] ."'");
                $P_Eq_Query = mysql_query($P_Eq_Prep);
                $P_Eq = mysql_fetch_array($P_Eq_Query);
                if (ereg('(ExtHP)+',$P_Eq['spec'])){$a = ereg_replace('.*ExtHP<','',$P_Eq['spec']);$Pl_Ms['hpfix'] += intval($a);}
                if (ereg('(ExtEN)+',$P_Eq['spec'])){$a = ereg_replace('.*ExtEN<','',$P_Eq['spec']);$Pl_Ms['enfix'] += intval($a);}
        }

        if($Game['hpmax']-$Pl_Ms['hpfix'] >= 1000){
        $HP_Mod_Base_Price = ($Game['hpmax']-$Pl_Ms['hpfix'])*30+$Mod_HP_Cost;}
        elseif($Game['hpmax']-$Pl_Ms['hpfix'] >= 10000){$HP_Mod_Base_Price = ($Game['hpmax']-$Pl_Ms['hpfix'])*50+$Mod_HP_UCost;}
        else $HP_Mod_Base_Price = $Mod_HP_Cost;$modhp_dis='';
        if ($HP_Mod_Base_Price > $Gen['cash']){$modhp_dis='disabled';}
        
        if($Game['enmax']-$Pl_Ms['enfix'] >= 100){
        $EN_Mod_Base_Price = ($Game['enmax']-$Pl_Ms['enfix'])*300+$Mod_EN_Cost;}
        elseif($Game['enmax']-$Pl_Ms['enfix'] >= 1000){$EN_Mod_Base_Price = ($Game['enmax']-$Pl_Ms['enfix'])*500+$Mod_EN_UCost;}
        else $EN_Mod_Base_Price = $Mod_EN_Cost;$moden_dis='';
        if ($EN_Mod_Base_Price > $Gen['cash']){$moden_dis='disabled';}
        
        echo "<script langauge=\"Javascript\">";
        echo "function calchp(){";
        echo "var pricemt = document.modmsform.mod_hp_muiltiple.value;";
        echo "var price = pricemt * '$HP_Mod_Base_Price';";
        echo "hpmodprice.innerText = price;";
        echo "hpmodprice.style.color='blue';";
        echo "if (price > $Gen[cash]){hpmodprice.style.color='red';document.modmsform.hp_mod_submit.disabled=true;}";
        echo "else{document.modmsform.hp_mod_submit.disabled=false;}";
        echo "if (price == $Gen[cash]){hpmodprice.style.color='yellow';}";
        echo "}function calcen(){";
        echo "var pricemt = document.modmsform.mod_en_muiltiple.value;";
        echo "var price = pricemt * '$EN_Mod_Base_Price';";
        echo "enmodprice.innerText = price;";
        echo "enmodprice.style.color='blue';";
        echo "if (price > $Gen[cash]){enmodprice.style.color='red';document.modmsform.en_mod_submit.disabled=true;}";
        echo "else{document.modmsform.en_mod_submit.disabled=false;}";
        echo "if (price == $Gen[cash]){enmodprice.style.color='yellow';}}";
        echo "function returnCheckHP(){var resulthpadd=(document.modmsform.mod_hp_muiltiple.value)*100;";
        echo "if (hpmodprice.innerText > $Gen[cash]){alert('金钱不足！');return false;}";
        echo "if (document.modmsform.mod_hp_muiltiple.value > 10){alert('金钱不足！');return false;}";
        echo "if (confirm('用'+hpmodprice.innerText+'元改造'+resulthpadd+'点HP\\n碓定吗？') == true){document.modmsform.actionb.value='hpmodding';return true;}else{return false;}";
        echo "}function returnCheckEN(){var resultenadd=(document.modmsform.mod_en_muiltiple.value)*10;";
        echo "if (enmodprice.innerText > $Gen[cash]){alert('金钱不足！');return false;}";
        echo "if (document.modmsform.mod_en_muiltiple.value > 10){alert('金钱不足！');return false;}";
        echo "if (confirm('用'+enmodprice.innerText+'元改造'+resultenadd+'点EN\\n碓定吗？') == true){document.modmsform.actionb.value='enmodding';return true;}else{return false;}";
        echo "}</script>";        
        echo "<tr align=center><td><b>机体改造: </b></td></tr>";
        if($Game['hpmax']-$Pl_Ms['hpfix'] < $Max_HP){
        echo "<tr align=left>";
        echo "<td width=\"300\"><b>附加装甲:</b><br>每付加一次增加100点HP<br>";
        echo "所需金钱: $<span id=hpmodprice>$HP_Mod_Base_Price</span><br>";
        echo "改造次数: <select size=1 name=\"mod_hp_muiltiple\" onChange=\"calchp()\">";
        echo "<option value='1'>1<option value='2'>2<option value='3'>3<option value='4'>4<option value='5'>5<option value='6'>6<option value='7'>7<option value='8'>8<option value='9'>9<option value='10'>10";
        echo "</select>次";
        echo "<input type=submit name=hp_mod_submit $modhp_dis value='确认改造' onClick=\"return returnCheckHP()\">";
        echo "</td>";
        echo "</tr>";}
        else echo "<tr align=left><td width=\"300\">你的机体不能再进行附加装甲工程了！<input type=hidden name=\"mod_hp_muiltiple\" value=1></td></tr>";
        if($Game['enmax']-$Pl_Ms['enfix'] < $Max_EN){
        echo "<tr align=left>";
        echo "<td width=\"300\"><b>附加能源CAP:</b><br>每付加一次增加10点EN<br>";
        echo "所需金钱: $<span id=enmodprice>$EN_Mod_Base_Price</span><br>";
        echo "改造次数: <select size=1 name=\"mod_en_muiltiple\" onChange=\"calcen()\">";
        echo "<option value='1'>1<option value='2'>2<option value='3'>3<option value='4'>4<option value='5'>5<option value='6'>6<option value='7'>7<option value='8'>8<option value='9'>9<option value='10'>10";
        echo "</select>次";
        echo "<input type=submit name=en_mod_submit $modhp_dis value='确认改造' onClick=\"return returnCheckEN()\">";
        echo "</td>";
        echo "</tr>";}
        else echo "<tr align=left><td width=\"300\">你的机体不能再进行能源CAP工程了！<input type=hidden name=\"mod_en_muiltiple\" value=1></td></tr>";
        
        //MS Customization & Permanant Equipment
        echo "<tr align=left>";
        echo "<td width=\"300\"><b>专用化改造:</b><br>专用化改造工程分为两项:<br>";
        echo "1: 基本改造工程<br>　　- 透过一些技术, 改良机体, 提升的能力<br>";
        echo "2: 机体装备合成工程<br>　　- 把辅助装备, 永久合成在机体上<br>　　- 可使机体可以多持一种辅助装备<br>";
        echo "两项工程无直接关係, 可以同时採用, <Br>但每部机体每项工程<b>只能进行一次</b><br>";
        echo "<input type=submit name=ms_custom_submit value='基本改造工程' onClick=\"modmsform.action='ms_custom.php?action=ms_custom';modmsform.actionb.value='GUI';\">";
        echo "<input type=submit name=ms_pequip_submit value='机体装备合成工程' onClick=\"modmsform.action='ms_custom.php?action=ms_pequip';modmsform.actionb.value='GUI';\">";
        echo "</td>";
        echo "</tr>";
        
        echo "</form></table>";
postFooter();exit;
}
elseif ($mode == 'prcmodms' && $actionb && $mod_hp_muiltiple && $mod_en_muiltiple){
if ($mod_hp_muiltiple > 10 || $mod_en_muiltiple > 10){echo "一之过最多只能改十次!!<br>";PostFooter();exit;}
if ($mod_hp_muiltiple <= 0 || $mod_en_muiltiple <= 0){echo "改造次数出了问题!!<br>";PostFooter();exit;}
GetMsDetails("$Gen[msuit]",'Pl_Ms');

if ($Game['eqwep'] && $Game['eqwep'] != "0<!>0"){
        unset($Eq_Id,$Eq_Prep,$Eq_Query,$Eq,$a);
        $Eq_Id = explode('<!>',$Game['eqwep']);
        $Eq_Prep = ("SELECT `spec` FROM `".$GLOBALS['DBPrefix']."phpeb_sys_wep` WHERE id='". $Eq_Id[0] ."'");
        $Eq_Query = mysql_query($Eq_Prep);
        $Eq = mysql_fetch_array($Eq_Query);
        if (ereg('(ExtHP)+',$Eq['spec'])){$a = ereg_replace('.*ExtHP<','',$Eq['spec']);$Pl_Ms['hpfix'] += intval($a);}
        if (ereg('(ExtEN)+',$Eq['spec'])){$a = ereg_replace('.*ExtEN<','',$Eq['spec']);$Pl_Ms['enfix'] += intval($a);}
}

if ($Game['p_equip'] && $Game['p_equip'] != "0<!>0"){
        unset($P_Eq_Id,$P_Eq_Prep,$P_Eq_Query,$P_Eq,$a);
        $P_Eq_Id = explode('<!>',$Game['p_equip']);
        $P_Eq_Prep = ("SELECT `spec` FROM `".$GLOBALS['DBPrefix']."phpeb_sys_wep` WHERE id='". $P_Eq_Id[0] ."'");
        $P_Eq_Query = mysql_query($P_Eq_Prep);
        $P_Eq = mysql_fetch_array($P_Eq_Query);
        if (ereg('(ExtHP)+',$P_Eq['spec'])){$a = ereg_replace('.*ExtHP<','',$P_Eq['spec']);$Pl_Ms['hpfix'] += intval($a);}
        if (ereg('(ExtEN)+',$P_Eq['spec'])){$a = ereg_replace('.*ExtEN<','',$P_Eq['spec']);$Pl_Ms['enfix'] += intval($a);}
}

if ($actionb == 'hpmodding'){
if (($Game['hpmax']-$Pl_Ms['hpfix']) > $Max_HP){
echo "<center>HP改造达到上限了。<br></center>";PostFooter();exit;
}
if($Game['hpmax']-$Pl_Ms['hpfix'] >= 1000){$HP_Mod_Base_Price = ($Game['hpmax']-$Pl_Ms['hpfix'])*30+$Mod_HP_Cost;}
elseif($Game['hpmax']-$Pl_Ms['hpfix'] >= 10000){$HP_Mod_Base_Price = ($Game['hpmax']-$Pl_Ms['hpfix'])*50+$Mod_HP_UCost;}
else $HP_Mod_Base_Price = $Mod_HP_Cost;
if (($Gen['cash'] - ($mod_hp_muiltiple*$HP_Mod_Base_Price)) < 0){echo "金钱不足!!<br>";PostFooter();exit;}
if ((($Game['hpmax']-$Pl_Ms['hpfix'])+($mod_hp_muiltiple*100)) > $Max_HP){$mod_hp_muiltiple=floor(($Max_HP-($Game['hpmax']-$Pl_Ms['hpfix']))/100);}
$Gen['cash'] -= ($mod_hp_muiltiple*$HP_Mod_Base_Price);
$Game['hpmax'] += ($mod_hp_muiltiple*100);
}
if ($actionb == 'enmodding'){
if (($Game['enmax']-$Pl_Ms['enfix']) > $Max_EN){
echo "<center>EN改造达到上限了。<br></center>";PostFooter();exit;
}

if($Game['enmax']-$Pl_Ms['enfix'] >= 100){$EN_Mod_Base_Price = ($Game['enmax']-$Pl_Ms['enfix'])*300+$Mod_EN_Cost;}
elseif($Game['enmax']-$Pl_Ms['enfix'] >= 1000){$EN_Mod_Base_Price = ($Game['enmax']-$Pl_Ms['enfix'])*500+$Mod_EN_UCost;}
else $EN_Mod_Base_Price = $Mod_EN_Cost;
if (($Gen['cash'] - ($mod_en_muiltiple*$EN_Mod_Base_Price)) < 0){echo "金钱不足!!<br>";PostFooter();exit;}
if ((($Game['enmax']-$Pl_Ms['enfix'])+($mod_en_muiltiple*10)) >= $Max_EN){$mod_en_muiltiple=floor(($Max_EN-($Game['enmax']-$Pl_Ms['enfix']))/10);}
$Gen['cash']-=($mod_en_muiltiple*$EN_Mod_Base_Price);
$Game['enmax'] += ($mod_en_muiltiple*10);
}
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `hpmax` = '".($Game['hpmax'])."', `enmax` = '".($Game['enmax'])."' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql) or die(mysql_error());
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `cash` = '".($Gen['cash'])."' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);
echo "<form action=statsmod.php?action=modms method=post name=frmmodms target=Beta>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
echo "<p align=center style=\"font-size: 16pt\">改造完成了！<br><input type=submit value=\"返回\" onClick=\"parent.Beta.location.replace('gen_info.php')\"><input type=submit value=\"继续改造\" onClick=\"frmmodms.submit()\"></p>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
        postFooter();
}//End MS
elseif ($mode == 'repairms' && $actionb == 'sel'){

$Otp_Area_Sql = ("SELECT `name`,`color`,`opttime`,`optstart` FROM `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE `optmissioni` = 'Atk=($Gen[coordinates])' AND `opttime` > '$CFU_Time' ORDER BY `optstart` ASC LIMIT 1");
$Otp_Area_Q = mysql_query($Otp_Area_Sql) or die(mysql_error());
$Otp_A_ITar = mysql_fetch_array($Otp_Area_Q);

if ($Otp_A_ITar){
if ($Otp_A_ITar['optstart'] > $CFU_Time){
$TimeTSSec = $Otp_A_ITar['optstart'] - $CFU_Time;
$TimetS['hours'] = floor($TimeTSSec/3600);
$TimetS['minutes'] = floor(($TimeTSSec - ($TimetS['hours']*3600))/60);
$TimetS['seconds'] = floor($TimeTSSec - ($TimetS['hours']*3600) - ($TimetS['minutes']*60));
$Otp_TellTime = "还有$TimetS[hours]小时$TimetS[minutes]分钟$TimetS[seconds]秒开始战争。";
}
else{
$TimeTSSec = $Otp_A_ITar['opttime'] - $CFU_Time;
$TimetS['hours'] = floor($TimeTSSec/3600);
$TimetS['minutes'] = floor(($TimeTSSec - ($TimetS['hours']*3600))/60);
$TimetS['seconds'] = floor($TimeTSSec - ($TimetS['hours']*3600) - ($TimetS['minutes']*60));
$Otp_TellTime = "还有$TimetS[hours]小时$TimetS[minutes]分钟$TimetS[seconds]秒战争宣告终了。";}
}

if ($Otp_A_ITar && $Otp_A_ITar['optstart'] < $CFU_Time){echo "<center>此区域处于战争状态，修理公厂关闭以躲避战争！<br>$Otp_TellTime";postFooter();exit;}
        $AreaORG_Prepare = ("SELECT `occupied` FROM `".$GLOBALS['DBPrefix']."phpeb_user_map` WHERE `map_id` = '$Gen[coordinates]'");
        $AreaORG_Query = mysql_query($AreaORG_Prepare) or die(mysql_error());
        $AreaORG = mysql_fetch_array($AreaORG_Query);
        $showOccupied = '';
        if ($Game['organization'] == $AreaORG['occupied']){
                $RepairHPCost = ceil($RepairHPCost * 0.5);
                $RepairENCost = ceil($RepairENCost * 0.5);
                $showOccupied = '本地居民亦可享有50%折扣优惠。<br>';
        }
        
        echo "修理工场<hr>";
        if ($Otp_TellTime){echo "$Otp_TellTime<hr>";}
        if(!$Gen['msuit']){echo "<center>你没有机体！不能进行修理！";exit;}
        echo "<br><table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"400\">";
        echo "<form action=statsmod.php?action=repairms method=post name=repairmsform>";
        echo "<input type=hidden value='reppro' name=actionb>";
        echo "<input type=hidden value='reppro' name=actionc>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "<tr align=center><td><b>修理机体</b></td></tr>";
        GetMSDetails($Gen['msuit'],'NowMS');
        echo "<tr><td>你的机体:<br><p align=center><img src='".$Unit_Image_Dir."/$NowMS[image]'><br>$NowMS[msname]</p>";
        echo "本工场有国战时不会开启，".$showOccupied."回复价钱如下:<br>回复1点HP需要 $RepairHPCost 元。<br>回复1点EN需要 $RepairHPCost 元。";
        echo "</td></tr>";
        echo "<script langauge=\"Javascript\">function CheckRepHP(){if (hprepcost.innerText > $Gen[cash]){alert('金钱不足！');return false;}if (confirm('回复HP，确定修理吗？') == true){repairmsform.actionc.value='hprec';return true}else {return false}}";
        echo "function ChangePriceHP(typerepair){if (typerepair == 'pc'){var rephpamt = ($Game[hpmax] - $Game[hp]) * document.repairmsform.hp_rep_pc_amount.value ;hppcrep.innerText = Math.round(rephpamt);var rehpprc = Math.round($RepairHPCost * rephpamt);";
        echo "hprepcost.innerText = rehpprc;}if (typerepair == 'pt'){var rephpamt = document.repairmsform.hp_rep_amount.value;if (rephpamt > ($Game[hpmax] - $Game[hp])){rephpamt = ($Game[hpmax] - $Game[hp]);}var rehpprc = Math.round($RepairHPCost * rephpamt);";
        echo "hprepcost.innerText = rehpprc;}}</script>";
        if ($Game['hp'] < $Game['hpmax']){
        echo "<tr><td><b>回复HP:</b><br>HP: $Game[hp] / $Game[hpmax]<br>以百分比回复餘下的 <input type=radio name='hp_rep_type' value='pc' OnClick=\"hp_rep_pc_amount.disabled=false;hp_rep_amount.disabled=true;hprepcost.innerText='0';hp_rep_pc_amount.value='0';\">: 回复 <select name='hp_rep_pc_amount' disabled onChange=\"ChangePriceHP('pc')\"><option value=0 selected>--选择--<option value=0.1>10%<option value=0.2>20%<option value=0.3>30%<option value=0.4>40%<option value=0.5>50%<option value=0.6>60%<option value=0.7>70%<option value=0.8>80%<option value=0.9>90%<option value=1.0>100%</select>(<span id=hppcrep>0</span>点)";
        echo "<br>手动输入回复量 <input type=radio value='pt' name='hp_rep_type' OnClick=\"hp_rep_pc_amount.disabled=true;hp_rep_amount.disabled=false;hprepcost.innerText='0';hppcrep.innerText='0';\">: 回复 <input type=text size=4 maxlength=5 name='hp_rep_amount' value=0 disabled onChange=\"ChangePriceHP('pt')\">点";
        echo "<br>所需金钱: <span id=hprepcost>0</span> 元。<br><input type=submit name=hp_rep_submit value='回复HP' onClick=\"return CheckRepHP();\">";
        echo "</td></tr>";
        }else{echo "<tr><td>你无需回复HP</td></tr>";}
        echo "<script langauge=\"Javascript\">function CheckRepEN(){if (enrepcost.innerText > $Gen[cash]){alert('金钱不足！');return false;}if (confirm('回复EN，确定修理吗？') == true){repairmsform.actionc.value='enrec';return true}else {return false}}";
        echo "function ChangePriceEN(typerepair){if (typerepair == 'pc'){var repenamt = ($Game[enmax] - $Game[en]) * document.repairmsform.en_rep_pc_amount.value ;enpcrep.innerText = Math.round(repenamt);var reenprc = Math.round($RepairENCost * repenamt);";
        echo "enrepcost.innerText = reenprc;}if (typerepair == 'pt'){var repenamt = document.repairmsform.en_rep_amount.value;if (repenamt > ($Game[enmax] - $Game[en])){repenamt = ($Game[enmax] - $Game[en]);}var reenprc = Math.round($RepairENCost * repenamt);";
        echo "enrepcost.innerText = reenprc;}}</script>";        
        if ($Game['en'] < $Game['enmax']){
        echo "<tr><td><b>回复EN:</b><br>EN: $Game[en] / $Game[enmax]<br>以百分比回复餘下的 <input type=radio name='en_rep_type' value='pc' OnClick=\"en_rep_pc_amount.disabled=false;en_rep_amount.disabled=true;enrepcost.innerText='0';en_rep_pc_amount.value='0';\">: 回复 <select name='en_rep_pc_amount' disabled onChange=\"ChangePriceEN('pc')\"><option value=0 selected>--选择--<option value=0.1>10%<option value=0.2>20%<option value=0.3>30%<option value=0.4>40%<option value=0.5>50%<option value=0.6>60%<option value=0.7>70%<option value=0.8>80%<option value=0.9>90%<option value=1.0>100%</select>(<span id=enpcrep>0</span>点)";
        echo "<br>手动输入回复量 <input type=radio value='pt' name='en_rep_type' OnClick=\"en_rep_pc_amount.disabled=true;en_rep_amount.disabled=false;enrepcost.innerText='0';enpcrep.innerText='0';\">: 回复 <input type=text size=4 maxlength=5 name='en_rep_amount' value=0 disabled onChange=\"ChangePriceEN('pt')\">点";
        echo "<br>所需金钱: <span id=enrepcost>0</span> 元。<br><input type=submit name=en_rep_submit value='回复EN' onClick=\"return CheckRepEN();\">";
        echo "</td></tr>";
        }else{echo "<tr><td>你无需回复EN</td></tr>";}
        echo "</form></table>";
postFooter();exit;
}//End Repair Form
elseif ($mode == 'repairms' && $actionb == 'reppro'){

$Otp_Area_Sql = ("SELECT `name`,`color`,`opttime`,`optstart` FROM `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE `optmissioni` = 'Atk=($Gen[coordinates])' AND `opttime` > '$CFU_Time' ORDER BY `optstart` ASC LIMIT 1");
$Otp_Area_Q = mysql_query($Otp_Area_Sql) or die(mysql_error());
$Otp_A_ITar = mysql_fetch_array($Otp_Area_Q);

$AreaORG_Prepare = ("SELECT `occupied` FROM `".$GLOBALS['DBPrefix']."phpeb_user_map` WHERE `map_id` = '$Gen[coordinates]'");
        $AreaORG_Q = mysql_query($AreaORG_Prepare) or die(mysql_error());
        $AreaORG = mysql_fetch_array($AreaORG_Q);
        if ($Game['organization'] == $AreaORG['occupied']){
                $RepairHPCost = ceil($RepairHPCost * 0.5);
                $RepairENCost = ceil($RepairENCost * 0.5);echo "<hr>";
        }

if ($Otp_A_ITar){
if ($Otp_A_ITar['optstart'] > $CFU_Time){
$TimeTSSec = $Otp_A_ITar['optstart'] - $CFU_Time;
$TimetS['hours'] = floor($TimeTSSec/3600);
$TimetS['minutes'] = floor(($TimeTSSec - ($TimetS['hours']*3600))/60);
$TimetS['seconds'] = floor($TimeTSSec - ($TimetS['hours']*3600) - ($TimetS['minutes']*60));
$Otp_TellTime = "还有$TimetS[hours]小时$TimetS[minutes]分钟$TimetS[seconds]秒开始战争。";
}
else{
$TimeTSSec = $Otp_A_ITar['opttime'] - $CFU_Time;
$TimetS['hours'] = floor($TimeTSSec/3600);
$TimetS['minutes'] = floor(($TimeTSSec - ($TimetS['hours']*3600))/60);
$TimetS['seconds'] = floor($TimeTSSec - ($TimetS['hours']*3600) - ($TimetS['minutes']*60));
$Otp_TellTime = "还有$TimetS[hours]小时$TimetS[minutes]分钟$TimetS[seconds]秒战争宣告终了。";}
}

if ($Otp_A_ITar && $Otp_A_ITar['optstart'] < $CFU_Time){echo "<center>此区域处于战争状态，修理公厂关闭以躲避战争！<br>$Otp_TellTime";postFooter();exit;}

        $RepairAmt=0;$PriceRepair=0;
        if ($actionc == 'hprec' && ($Game['hpmax'] != $Game['hp'])){
                if ($hp_rep_type == 'pc'){if ($hp_rep_pc_amount > 1.0 || $hp_rep_pc_amount <= 0 ){echo "回复量出错";postFooter();exit;}$RepairAmt = floor(($Game['hpmax'] - $Game['hp']) * $hp_rep_pc_amount);if ($RepairAmt > ($Game['hpmax'] - $Game['hp']))$RepairAmt = ($Game['hpmax'] - $Game['hp']);
                $PriceRepair = floor($RepairAmt * $RepairHPCost);
                }elseif ($hp_rep_type == 'pt'){
                if ($hp_rep_amount > $Game['hpmax'] || $hp_rep_amount <= 0 ){echo "回复量出错";postFooter();exit;}
                $RepairAmt = $hp_rep_amount; if ($RepairAmt > ($Game['hpmax'] - $Game['hp']))$RepairAmt = ($Game['hpmax'] - $Game['hp']);
                $PriceRepair = floor($RepairAmt * $RepairHPCost);
                }else {echo "不明的指令！";postFooter();exit;}
                if ($PriceRepair < 0)$PriceRepair = 0;
                if ($Gen['cash'] - $PriceRepair < 0){echo "金钱不足！";postFooter();exit;}
                $Gen['cash'] -= $PriceRepair;
                $Game['hp'] += $RepairAmt;
                if ($Game['hp'] > $Game['hpmax'])$Game['hp'] = $Game['hpmax'];
                $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `hp` = '$Game[hp]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
                mysql_query($sql) or die (mysql_error());
                $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `cash` = '$Gen[cash]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
                mysql_query($sql) or die (mysql_error());
                $RepMsg = "以 $PriceRepair 元回复了 $RepairAmt 点HP。";
                }
        elseif ($actionc == 'hprec' && ($Game['hpmax'] <= $Game['hp'])){echo "HP已经满了！";postFooter();exit;}
        elseif ($actionc == 'enrec' && ($Game['enmax'] != $Game['en'])){
                if ($en_rep_type == 'pc'){if ($en_rep_pc_amount > 1.0 || $en_rep_pc_amount <= 0 ){echo "回复量出错";postFooter();exit;}$RepairAmt = floor(($Game['enmax'] - $Game['en']) * $en_rep_pc_amount);if ($RepairAmt > ($Game['enmax'] - $Game['en']))$RepairAmt = ($Game['enmax'] - $Game['en']);
                $PriceRepair = floor($RepairAmt * $RepairENCost);
                }elseif ($en_rep_type == 'pt'){
                if ($en_rep_amount > $Game['enmax'] || $en_rep_amount <= 0 ){echo "回复量出错";postFooter();exit;}
                $RepairAmt = $en_rep_amount; if ($RepairAmt > ($Game['enmax'] - $Game['en']))$RepairAmt = ($Game['enmax'] - $Game['en']);
                $PriceRepair = floor($RepairAmt * $RepairENCost);
                }else {echo "不明的指令！";postFooter();exit;}
                if ($PriceRepair < 0)$PriceRepair = 0;
                if ($Gen['cash'] - $PriceRepair < 0){echo "金钱不足！";postFooter();exit;}
                $Gen['cash'] -= $PriceRepair;
                $Game['en'] += $RepairAmt;
                if ($Game['en'] > $Game['enmax'])$Game['en'] = $Game['enmax'];
                $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `en` = '$Game[en]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
                mysql_query($sql) or die (mysql_error());
                $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `cash` = '$Gen[cash]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
                mysql_query($sql) or die (mysql_error());
                $RepMsg = "以 $PriceRepair 元回复了 $RepairAmt 点EN。";
                }
        elseif ($actionc == 'enrec' && ($Game['enmax'] <= $Game['en'])){echo "EN已经满了！";postFooter();exit;}
        else {echo "HP/EN已经满了！";postFooter();exit;}

echo "<form action=statsmod.php?action=repairms method=post name=frmrp target=Beta>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='sel' name=actionb>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
echo "<p align=center style=\"font-size: 16pt\">修理完成了！<br>$RepMsg<br><input type=submit value=\"返回\" onClick=\"parent.Beta.location.replace('gen_info.php')\"><input type=submit value=\"继续修理\" onClick=\"frmrp.submit()\"></p>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";

postFooter();exit;        

}//End Repair Mode

//Start Character Type Modding

elseif ($mode == 'modtypech' && $actionb == 'A'){
        echo "人种改造<hr>";
        if(!ereg('nat',$Gen['typech'])){echo "你不是一般人！不能进行改造！";exit;}
        
        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#FFFFFF\" width=\"300\">";
        
        echo "<form action=statsmod.php?action=modtypech method=post name=modchform>";
        echo "<input type=hidden value='B' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        
        echo "<script langauge=\"Javascript\">function cfmModCh(){";
        echo "if ($Gen[cash] < $ModChType_Cost) {alert('现金不足!!');return false;}";
        echo "else if (confirm('真的要进行改造吗？') == true) {return true;} else {return false;}";
        echo "}</script>";
        
        echo "<tr><td align=center><b>人种改造</b></td></tr>";
        echo "<tr><td>";
        echo "<b>简介:</b><br>人种改造是一个为类型(Type)为 一般(Natural) 的人，<br>改造身体，使自己成为:<br><br>1. Enhanced (强化人间)<br>或<br>2. Extended (延伸人)<br>";
        echo "<br>改造有什麽好处？<br>看你会不会认为Enhanced或Extended比一般人强吧！<Br>但请紧记，一经改造，无法还原，亦无法再改造！";
        echo "</td></tr>";
        
        echo "<tr><td>";
        echo "<b>人种改造:</b><br>";
        echo "改造为:<br>";
        echo "<input type=radio name=dtype value=1 checked> Enhanced (强化人间)<br><input type=radio name=dtype value=2> Extended (延伸人)<br>";
        echo "<b>费用:</b> ".number_format($ModChType_Cost)." 元<br>";
        echo "</td></tr>";
        echo "<tr><td align=center>";
        echo "<input type=submit value=改造确定 onClick=\"return cfmModCh();\">";
        echo "</td></tr>";

        echo "</form></table>";
postFooter();exit;        
}
elseif ($mode == 'modtypech' && $actionb == 'B'){
        echo "人种改造<hr>";
        $Dest_Type = $ModChMsg = (string) '';
        switch($dtype){
                case 1: $Dest_Type = 'enh'; $ModChMsg = '强化人间';break;
                case 2: $Dest_Type = 'ext'; $ModChMsg = 'Extended';break;
                default: echo "目标人种出错!!";exit;
        }
        if(!ereg('nat',$Gen['typech'])){echo "你不是一般人！不能进行改造！";exit;}
        else {
                if($Gen['cash'] < $ModChType_Cost){echo "现金不足!!";exit;}
                else {
                        $Gen['cash'] -= $ModChType_Cost;
                        $Gen['typech'] = str_replace('nat',$Dest_Type,$Gen['typech']);
                        $SQL = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `cash` = '$Gen[cash]', `typech` = '$Gen[typech]', `hypermode` = 0 ");
                        $SQL .= ("WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
                        mysql_query($SQL) or die(mysql_error());
                }
                
        }

echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
echo "<p align=center style=\"font-size: 16pt\">改造完成了！<br>你已改造成 $ModChMsg ！<br><input type=submit value=\"返回\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";
postFooter();exit;        
}
//End Character Type Modding

elseif ($mode == 'custom'){
$IncThread = "mscust_200702191832";
include('ms_custom.php');
}
?>