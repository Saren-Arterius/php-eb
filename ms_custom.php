<?php
$mode = ( isset($_GET['action']) ) ? $_GET['action'] : $_POST['action'];
include('cfu.php');
postHead('');
AuthUser("$Pl_Value[USERNAME]","$Pl_Value[PASSWORD]");
if ($CFU_Time >= $TIMEAUTH+$TIME_OUT_TIME || $TIMEAUTH <= $CFU_Time-$TIME_OUT_TIME){echo "连线逾时！<br>请重新登入！";exit;}
GetUsrDetails("$Pl_Value[USERNAME]",'Gen','Game');

mt_srand ((double) microtime()*1000000);

if(!$Gen['msuit']){echo "你没有机体！不能进行改造工程！";exit;}
else{

GetMsDetails("$Gen[msuit]",'Pl_Ms');
        //Set DataTable
        $sql = ("SELECT `c_point` FROM `".$GLOBALS['DBPrefix']."phpeb_user_tactfactory` WHERE username='". $Pl_Value['USERNAME'] ."'");
        $query_ttf = mysql_query($sql);$defineuserc = 0;
        $defineuserc = mysql_num_rows($query_ttf);
        
        if ($defineuserc == 0){
                $sqldftf = ("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_tactfactory` (username,time) VALUES('$Pl_Value[USERNAME]','$CFU_Time')");
                mysql_query($sqldftf) or die ('<br><center>未能建立兵器製造工场资料<br>原因:' . mysql_error() . '<br>');
                $sql = ("SELECT `c_point` FROM `".$GLOBALS['DBPrefix']."phpeb_user_tactfactory` WHERE username='". $Pl_Value['USERNAME'] ."'");
                $query_ttf = mysql_query($sql) or die ('<br><center>未能取得兵器製造工场资料<br>原因:' . mysql_error() . '<br>');
                $TactFactory['time'] -= 2;
        }
$TactFactory = mysql_fetch_array($query_ttf);
if (($CFU_Time - $TactFactory['time']) < 1){echo "你实在按的太快了。请于两秒后再按。<br>多谢合作！";exit;}

}


if ($mode=='ms_custom' && $actionb == 'GUI'){

if ($Game['ms_custom']){echo "已经进行过基本改造工程！";exit;}

        echo "机体专用化工场 - 基本改造工程<hr>";
        echo "<form action=ms_custom.php method=post name=mainform target=Beta>";
        echo "<input type=hidden value='ms_custom' name=action>";
        echo "<input type=hidden value='Process' name=actionb>";
        echo "<input type=hidden value='none' name=actionc>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

//Start Table -- User's Information
echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"style=\"font-size: 12pt\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"400\" id=\"AutoNumber1\">";
echo "<tr><td width=400 colspan=2><b>说明</b></td></tr>";
echo "<tr><td width=400 colspan=2>当您有一定的资金、资源和胜利积分时，就可以为您的机体进行基本改造工程，以提升机体的能力值。";
echo "<br>改造的方式与规限如下:<br>";
echo " - 改造幅度和成功率会随着机体等级下降。<br>";
echo " - 每部机体只能进行一次改造。<br>";
echo " - 更改机体名称时，请慎重用字，以免被删除机体。<br>";
echo " - 改造会消耗原料(即改造点数), 资金和胜利积分。<br>";
echo " - 基本成功率为 ".$Mod_MS_base_success."% 。<br>";
echo " - 每增加一点「改造度」, 会:<br>";
echo " 　 - 消耗 $".number_format($Mod_MS_cpt_cost)." 资金,<br>";
echo " 　 - 消耗 ".number_format($Mod_MS_vpt_cost)."点 胜利绩分,<br>";
echo " 　 - 成功率下降 $Mod_MS_cpt_penalty%。<br>";
echo " - 每使用多一点「改造点数」, 成功率上升 $Mod_MS_cpt_bonus%。<br>";
echo " - 改造失败的话, 原料(即改造点数)和机体都会毁掉, 胜利积分会保留。<br>";
echo " - 可以在兵器製造工场置放原料，转化为改造点数。<br>您的改造点数: ".number_format($TactFactory['c_point'])."点 <br>你的胜利绩分: ".number_format($Game['v_points'])."点 <br>您的现金: $".number_format($Gen['cash']);
echo "<hr></td></tr>";

echo "<tr><td colspan=6>";
echo "<table align=center border=\"0\" width=\"100%\">";
echo "<tr>";
echo "<td width=50%>";
echo "<b>已使用的改造点数: </b><span style=\"color: blue\" id=pt_left>0</span> / $TactFactory[c_point]";
echo "</td><td><b>改造成功\率: </b><span id=successpc>$Mod_MS_base_success</span>%";
echo "</td></tr><tr>";
echo "<td width=50%>";
echo "<b>已使用的胜利积分: </b><span style=\"color: blue\" id=vp_left>0</span> / $Game[v_points]";
echo "</td><td><b>改造价格: </b>$<span id=custom_price>0</span>";
echo "</td></tr><tr>";
echo "<script language=\"JavaScript\">
function useC_pt(val){
        val = val.replace(/[a-zA-Z\-+&!?=,<>@#$%\^\*\#\/\\\\[\]\{\}\'\"]+/,'');
        mainform.c_pt.value = Math.round(val);
}

function custom(type) {
        var atcpt = Math.round(mainform.atc_pt.value);
        var decpt = Math.round(mainform.dec_pt.value);
        var recpt = Math.round(mainform.rec_pt.value);
        var tacpt = Math.round(mainform.tac_pt.value);
        var CriticalPenalty = 0;
        var CriticalSuccess = 0;
        if(type == 'at'){
                var showatc = $Pl_Ms[atf]*mainform.atc_pt.value*0.01;
                atc.innerText = $Pl_Ms[atf]+Math.round(showatc);
                if (atcpt == (100-$Pl_Ms[needlv])) atc.style.color='yellow';
                else atc.style.color='blue';
                }
        else if(type == 'de'){
                var showdec = $Pl_Ms[def]*mainform.dec_pt.value*0.01;
                dec.innerText = $Pl_Ms[def]+Math.round(showdec);
                if (decpt == (100-$Pl_Ms[needlv])) dec.style.color='yellow';
                else dec.style.color='blue';
                }
        else if(type == 're'){
                var showrec = $Pl_Ms[ref]*mainform.rec_pt.value*0.01;
                rec.innerText = $Pl_Ms[ref]+Math.round(showrec);
                if (recpt == (100-$Pl_Ms[needlv])) rec.style.color='yellow';
                else rec.style.color='blue';
                }
        else if(type == 'ta'){
                var showtac = $Pl_Ms[taf]*mainform.tac_pt.value*0.01;
                tac.innerText = $Pl_Ms[taf]+Math.round(showtac);
                if (tacpt == (100-$Pl_Ms[needlv])) tac.style.color='yellow';
                else tac.style.color='blue';
                }
                if (atc.innerText >= 20) {CriticalPenalty += 5;CriticalSuccess +=5;}
                if (atc.innerText >= 25) CriticalPenalty += 5;
                if (atc.innerText >= 30) {CriticalPenalty += 5;CriticalSuccess +=5;}
                if (atc.innerText >= 35) {CriticalPenalty += 5;CriticalSuccess +=5;}
                if (dec.innerText >= 20) {CriticalPenalty += 5;CriticalSuccess +=5;}
                if (dec.innerText >= 25) CriticalPenalty += 5;
                if (dec.innerText >= 30) {CriticalPenalty += 5;CriticalSuccess +=5;}
                if (dec.innerText >= 35) {CriticalPenalty += 5;CriticalSuccess +=5;}
                if (rec.innerText >= 20) {CriticalPenalty += 5;CriticalSuccess +=5;}
                if (rec.innerText >= 25) CriticalPenalty += 5;
                if (rec.innerText >= 30) {CriticalPenalty += 5;CriticalSuccess +=5;}
                if (rec.innerText >= 35) {CriticalPenalty += 5;CriticalSuccess +=5;}
                if (tac.innerText >= 20) {CriticalPenalty += 5;CriticalSuccess +=5;}
                if (tac.innerText >= 25) CriticalPenalty += 5;
                if (tac.innerText >= 30) {CriticalPenalty += 5;CriticalSuccess +=5;}
                if (tac.innerText >= 35) {CriticalPenalty += 5;CriticalSuccess +=5;}
        
        var c_total = atcpt+decpt+recpt+tacpt;
        c_pt_total.innerText = c_total;
        
        custom_price.innerText = c_total*$Mod_MS_cpt_cost;
        vp_left.innerText = c_total*$Mod_MS_vpt_cost;
        
        var extrapt = 0;
        extrapt += Math.round(mainform.c_pt.value);
        if(mainform.secureCustom.checked == true) extrapt += ($Pl_Ms[needlv]*2);
        
        var SuccessPc;
        pt_left.innerText = extrapt;
        SuccessPc = Math.round( ( $Mod_MS_base_success - (c_total*$Mod_MS_cpt_penalty*($Pl_Ms[needlv]-1)/50 + CriticalPenalty) + (mainform.c_pt.value*$Mod_MS_cpt_bonus) )*100 )/100;
        if (SuccessPc < 0) SuccessPc = 0;
        else if (SuccessPc > (100-CriticalSuccess)) SuccessPc = (100-CriticalSuccess);
        
        if (vp_left.innerText > $Game[v_points]) vp_left.style.color = 'red';
        else vp_left.style.color = 'blue';
        if (pt_left.innerText > $TactFactory[c_point]) pt_left.style.color = 'red';
        else pt_left.style.color = 'blue';

        successpc.innerText = SuccessPc;
        
}

function ModName(val){
        val = val.replace(/[&!?=.,<>@#$%\^\*\#\/\\\\[\]\{\}\'\"]+/,'');
        mainform.fixedname.value=val;
        mscname.innerText=val;
}

function confirmCustom(){
        if (pt_left.innerText > $TactFactory[c_point]){alert('改造点数不足！\\n无法进行改造。');return false;}
        else if (vp_left.innerText > $Game[v_points]){alert('胜利积分不足！\\n无法进行改造。');return false;}
        else if (custom_price.innerText > $Gen[cash]){alert('所持金不足！\\n无法进行改造。');return false;}
        else {
                if (confirm('即将进行改造，请确保所有资料正确。\\n可以开始改造吗？')==true){return true;}
                else {return false;}
        }
}

</script>";

echo "<td width=50%>";
echo "使用改造点数<input type=text name=c_pt value=0  size=3 maxlength=5 onChange=\"useC_pt(this.value);custom('c_pt');\" style=\"font-size: 10pt; color: #ffffff; background-color: #000000;text-align: center\">点";
echo "</td><td><b>改造值: </b><span id=c_pt_total>0</span>";
echo "</td></tr><tr><td>";

$AtMax = round($Pl_Ms['atf']*(((100-$Pl_Ms['needlv'])/100)+1));
echo "<b style=\"color: yellow\">攻击力强化: </b><br>$Pl_Ms[atf] => <b style=\"color: blue\" id=atc>$Pl_Ms[atf]</b> (上限: $AtMax)<br>改造度: <select name=\"atc_pt\" onchange=\"custom('at');\" style=\"font-size: 10pt; color: #ffffff; background-color: #000000;\">";
for($PtUse_At=0;$PtUse_At <= (100-$Pl_Ms['needlv']);$PtUse_At++){
echo "<option value=$PtUse_At>$PtUse_At";}
echo "</select>点";
echo "</td><td>";
$DeMax = round($Pl_Ms['def']*(((100-$Pl_Ms['needlv'])/100)+1));
echo "<b style=\"color: yellow\">防御力强化: </b><br>$Pl_Ms[def] => <b style=\"color: blue\" id=dec>$Pl_Ms[def]</b> (上限: $DeMax)<br>改造度: <select name=\"dec_pt\" onchange=\"custom('de');\" style=\"font-size: 10pt; color: #ffffff; background-color: #000000;\">";
for($PtUse_De=0;$PtUse_De <= (100-$Pl_Ms['needlv']);$PtUse_De++){
echo "<option value=$PtUse_De>$PtUse_De";}
echo "</select>点";
echo "</td></tr><tr><td>";
$ReMax = round($Pl_Ms['ref']*(((100-$Pl_Ms['needlv'])/100)+1));
echo "<b style=\"color: yellow\">运动性强化: </b><br>$Pl_Ms[ref] => <b style=\"color: blue\" id=rec>$Pl_Ms[ref]</b> (上限: $ReMax)<br>改造度: <select name=\"rec_pt\" onchange=\"custom('re');\" style=\"font-size: 10pt; color: #ffffff; background-color: #000000;\">";
for($PtUse_Re=0;$PtUse_Re <= (100-$Pl_Ms['needlv']);$PtUse_Re++){
echo "<option value=$PtUse_Re>$PtUse_Re";}
echo "</select>点";
echo "</td><td>";
$TaMax = round($Pl_Ms['taf']*(((100-$Pl_Ms['needlv'])/100)+1));
echo "<b style=\"color: yellow\">命中力强化: </b><br>$Pl_Ms[taf] => <b style=\"color: blue\" id=tac>$Pl_Ms[taf]</b> (上限: $TaMax)<br>改造度: <select name=\"tac_pt\" onchange=\"custom('ta');\" style=\"font-size: 10pt; color: #ffffff; background-color: #000000;\">";
for($PtUse_Ta=0;$PtUse_Ta <= (100-$Pl_Ms['needlv']);$PtUse_Ta++){
echo "<option value=$PtUse_Ta>$PtUse_Ta";}
echo "</select>点";
echo "</td></tr><tr><td>";
echo "机体名称更变: <input type=text value=\"$Pl_Ms[msname]\" name=fixedname maxlength=32 onChange=\"ModName(this.value);\" style=\"font-size: 10pt; color: #ffffff; background-color: #000000;\">";
echo "</td><td>名称预览:<br><span id=mscname>$Pl_Ms[msname]</span><sub>?</sub>";
echo "</td></tr><tr>";
echo "<td>保险机制: <input type=checkbox name=secureCustom onClick=custom() value=true> (消耗 ".($Pl_Ms['needlv']*2)." 点改造点数)</td><td>保险机制能消耗一定的改造点数，失败时挽回损坏的机体。</td>";
echo "</tr><td colspan=2 align=center><input type=submit value='确认改造' onClick='return confirmCustom()'>";
echo "</td></tr></table>";
echo "</td></tr>";

echo "</table></form><hr><br><br><br><br>";
}


elseif ($mode=='ms_custom' && $actionb == 'Process'){
if ($Game['ms_custom']){echo "已经进行过基本改造工程！";postFooter();exit;}
if (!$Game['p_equip']) $Game['p_equip'] = '0<!>0';
$Pl_EqWep = explode('<!>',$Game['p_equip']);
GetWeaponDetails("$Pl_EqWep[0]",'Pl_SyEqWep');
if (!$Game['eqwep']) $Game['eqwep'] = '0<!>0';
$Pl_Eq = explode('<!>',$Game['eqwep']);
GetWeaponDetails("$Pl_Eq[0]",'Pl_SyEq');


$Lv_Limitation = (100-$Pl_Ms['needlv']);

$atc_pt = intval($atc_pt); if ($atc_pt < 0) $atc_pt = 0; if ($atc_pt > $Lv_Limitation) $atc_pt = $Lv_Limitation;
$dec_pt = intval($dec_pt); if ($dec_pt < 0) $dec_pt = 0; if ($dec_pt > $Lv_Limitation) $dec_pt = $Lv_Limitation;
$rec_pt = intval($rec_pt); if ($rec_pt < 0) $rec_pt = 0; if ($rec_pt > $Lv_Limitation) $rec_pt = $Lv_Limitation;
$tac_pt = intval($tac_pt); if ($tac_pt < 0) $tac_pt = 0; if ($tac_pt > $Lv_Limitation) $tac_pt = $Lv_Limitation;
$c_pt = intval($c_pt); if ($c_pt < 0) $c_pt = 0;

if ($c_pt > $TactFactory['c_point']){echo "改造点数不足！";postFooter();exit;}

if (isset($secureCustom)){
        $secureCustom = 1;
        if ($c_pt+($Pl_Ms['needlv']*2) > $TactFactory['c_point']){echo "改造点数不足！";postFooter();exit;}
}
else $secureCustom = 0;


$fixedname = ereg_replace("[\&\!\?\=\.\,\<\>\@\#\$\%\^\*\#\/\\\[\]\{\}\'\"]+",'',$fixedname);
if(ereg('(--)+',$fixedname)){echo "专用名称出错！";postFooter();exit;}
if(ereg('(<|>|\'|\")+',$fixedname)){echo "专用名称出错！";postFooter();exit;}
if(strlen($fixedname) > 32){echo "专用名称过长！";postFooter();exit;}

$AtF = Round($Pl_Ms['atf']*$atc_pt*0.01);
$DeF = Round($Pl_Ms['def']*$dec_pt*0.01);
$ReF = Round($Pl_Ms['ref']*$rec_pt*0.01);
$TaF = Round($Pl_Ms['taf']*$tac_pt*0.01);

$CriticalPenalty = $CriticalSuccess = $SuccessPc = 0;

        if ($AtF+$Pl_Ms['atf'] >= 20) {$CriticalPenalty += 5;$CriticalSuccess +=5;}
        if ($AtF+$Pl_Ms['atf'] >= 25) $CriticalPenalty += 5;
        if ($AtF+$Pl_Ms['atf'] >= 30) {$CriticalPenalty += 5;$CriticalSuccess +=5;}
        if ($AtF+$Pl_Ms['atf'] >= 35) {$CriticalPenalty += 5;$CriticalSuccess +=5;}
        if ($DeF+$Pl_Ms['def'] >= 20) {$CriticalPenalty += 5;$CriticalSuccess +=5;}
        if ($DeF+$Pl_Ms['def'] >= 25) $CriticalPenalty += 5;
        if ($DeF+$Pl_Ms['def'] >= 30) {$CriticalPenalty += 5;$CriticalSuccess +=5;}
        if ($DeF+$Pl_Ms['def'] >= 35) {$CriticalPenalty += 5;$CriticalSuccess +=5;}
        if ($ReF+$Pl_Ms['ref'] >= 20) {$CriticalPenalty += 5;$CriticalSuccess +=5;}
        if ($ReF+$Pl_Ms['ref'] >= 25) $CriticalPenalty += 5;
        if ($ReF+$Pl_Ms['ref'] >= 30) {$CriticalPenalty += 5;$CriticalSuccess +=5;}
        if ($ReF+$Pl_Ms['ref'] >= 35) {$CriticalPenalty += 5;$CriticalSuccess +=5;}
        if ($TaF+$Pl_Ms['taf'] >= 20) {$CriticalPenalty += 5;$CriticalSuccess +=5;}
        if ($TaF+$Pl_Ms['taf'] >= 25) $CriticalPenalty += 5;
        if ($TaF+$Pl_Ms['taf'] >= 30) {$CriticalPenalty += 5;$CriticalSuccess +=5;}
        if ($TaF+$Pl_Ms['taf'] >= 35) {$CriticalPenalty += 5;$CriticalSuccess +=5;}

        $c_total = $atc_pt+$dec_pt+$rec_pt+$tac_pt;

        $custom_price = $c_total*$Mod_MS_cpt_cost;
        $vp_cost = $c_total*$Mod_MS_vpt_cost;
        
        $CriticalSuccess *= 100;
        
        $SuccessPc = round( ( $Mod_MS_base_success - ($c_total*$Mod_MS_cpt_penalty*($Pl_Ms['needlv']-1)/50 + $CriticalPenalty) + ($c_pt*$Mod_MS_cpt_bonus) )*100 );
        if ($SuccessPc < 0) $SuccessPc = 0;
        elseif ($SuccessPc > (10000-$CriticalSuccess)) $SuccessPc = (10000-$CriticalSuccess);
        
        if ($vp_cost > $Game['v_points'] || $vp_cost < 0) {echo "胜利积分不足或出错！";postFooter();exit;}
        if ($custom_price > $Gen['cash'] || $custom_price < 0){echo "所持金不足或费用出错！";postFooter();exit;}



$Result_Success = mt_rand(0,10000);
$MS_Result = $MS_ResultG = $Result_Custom = (string) '';

if($Result_Success <= $SuccessPc){
        $Result_Custom .= $fixedname.'<!>';
        $Result_Custom .= $AtF.'<!>';
        $Result_Custom .= $DeF.'<!>';
        $Result_Custom .= $ReF.'<!>';
        $Result_Custom .= $TaF;
        $Message = "成功\改造了！<br>效果值: ".($Result_Success/100)."% < 成功\率: ".($SuccessPc/100)."%";
        $MS_ResultG = "`v_points` = `v_points`-$vp_cost, ";
}
else {
        $Message = "改造失败了。<br>效果值: ".($Result_Success/100)."% > 成功\率: ".($SuccessPc/100)."%";
        $HP_Sub = $EN_Sub = 0;
        if (ereg('(ExtHP)+',$Pl_SyEqWep['spec'])){$a = ereg_replace('.*ExtHP<','',$Pl_SyEqWep['spec']);$HP_Sub = intval($a);}
        if (ereg('(ExtEN)+',$Pl_SyEqWep['spec'])){$a = ereg_replace('.*ExtEN<','',$Pl_SyEqWep['spec']);$EN_Sub = intval($a);}
        $hypmd_sql = $hypmd_sql_gen = '';
        if (ereg('(EXAMSystem)+',$Game['spec']) && !ereg('(EXAMSystem)+',$Pl_SyEq['spec'])) {
        $Game['spec'] = str_replace('EXAMSystem, ','',$Game['spec']);
        $hypmd_sql = ("`spec` = '$Game[spec]', ");
        $hypmd = 0;
        if ($Gen['hypermode'] >= 4 && $Gen['hypermode'] <= 6){
                switch($Gen['hypermode']){
                case 4: $hypmd = 0; break;
                case 5: $hypmd = 1; break;
                case 6: $hypmd = 2; break;
                }
                $hypmd_sql_gen = "`hypermode` = $hypmd , ";
        }
        }
        if (!$secureCustom){
        $MS_Result = "`msuit` = '0', ".$hypmd_sql_gen;
        $MS_ResultG = "`hpmax` = `hpmax`-$Pl_Ms[hpfix]-$HP_Sub, `enmax` = `enmax`-$Pl_Ms[enfix]-$EN_Sub, `p_equip` = '0<!>0', ".$hypmd_sql;
        }else $Message .= "<br>工程师们成功\修好损坏了的机体";
}

if($secureCustom)
$c_pt += ($Pl_Ms['needlv']*2);

$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET $MS_ResultG `ms_custom` = '$Result_Custom' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
$sql = ereg_replace("(--)+",'',$sql);
mysql_query($sql);
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_tactfactory` SET `time` = '$CFU_Time', `c_point`=`c_point`-$c_pt WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql) or die(mysql_error());
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET $MS_Result `cash` = `cash`-$custom_price WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql) or die(mysql_error());
unset($sql);

echo "机体专用化工场 - 基本改造工程<hr>";
echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
echo "<p align=center style=\"font-size: 16pt\">$Message<br><input type=submit value=\"返回\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
echo "</form>";        

}
elseif ($mode=='ms_pequip' && $actionb == 'GUI'){
if ($Game['p_equip'] != '0<!>0'){echo "已经进行过机体装备合成工程！";postFooter();exit;}
elseif ($Game['eqwep'] == '0<!>0' || !$Game['eqwep']){echo "请先装备辅助装备！";postFooter();exit;}
else{
        $Pl_EqWep = explode('<!>',$Game['eqwep']);
        GetWeaponDetails("$Pl_EqWep[0]",'Pl_SyEqWep');
}
        echo "机体专用化工场 - 机体装备合成工程<hr>";
        echo "<form action=ms_custom.php method=post name=mainform target=Beta>";
        echo "<input type=hidden value='ms_pequip' name=action>";
        echo "<input type=hidden value='Process' name=actionb>";
        echo "<input type=hidden value='none' name=actionc>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        //Start Table -- User's Information
        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"style=\"font-size: 12pt\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"400\" id=\"AutoNumber1\">";
        echo "<tr><td width=400 colspan=2><b>说明</b></td></tr>";
        echo "<tr><td width=400 colspan=2>当您想把辅助装备合成在机体的时，您可以进行机体装备合成工程。";
        echo "<br>合成的方式与规限如下:<br>";
        echo " - 成功率会随着机体等级下降。<br>";
        $PercentageDisplay = ((100-$Pl_Ms['needlv'])*$Mod_MS_pequip_c);
        if ($PercentageDisplay > 100) $PercentageDisplay = 100;
        elseif ($PercentageDisplay < 0) $PercentageDisplay = 0;
        echo " - 您的机体的成功率为 ".$PercentageDisplay."% 。<br>";
        echo " - 合成失败的话, 辅助装备和机体都会毁掉。<br>";
        echo " - 保险机制能消耗一定的改造点数，失败时挽回损坏的武器和机体。";
        echo "您的辅助装备: $Pl_SyEqWep[name]<br>您的改造点数: $TactFactory[c_point]";
        echo "<hr></td></tr>";
        echo "<script language=\"JavaScript\">
        function confirmCustom(){
                if (confirm('即将进行合，机率为".$PercentageDisplay."%。\\n可以开始改造吗？')==true){return true;}
                else {return false;}
        }
        </script>";
        echo "<tr><td>保险机制: <input type=checkbox name=secureCustom value=true";
        if (($Pl_SyEqWep['grade']*10 + $Pl_Ms['needlv']*2) > $TactFactory['c_point'])echo " disabled";
        echo "> (消耗 ".($Pl_SyEqWep['grade']*10 + $Pl_Ms['needlv']*2)." 点改造点数) ";
        echo "</td></tr>";
        echo "<tr><td align=center><input type=submit value='合成确认' onClick='return confirmCustom()'>";
        echo "</td></tr>";
        echo "</table></form><hr><br><br><br><br>";
}
elseif ($mode=='ms_pequip' && $actionb == 'Process'){
if ($Game['p_equip'] != '0<!>0'){echo "已经进行过机体装备合成工程！";postFooter();exit;}
elseif ($Game['eqwep'] == '0<!>0' || !$Game['eqwep']){echo "请先装备辅助装备！";postFooter();exit;}
else{
        $Pl_EqWep = explode('<!>',$Game['eqwep']);
        GetWeaponDetails("$Pl_EqWep[0]",'Pl_SyEqWep');
}
if (isset($secureCustom)){
        $secureCustom = 1;
        if (($Pl_SyEqWep['grade']*10 + $Pl_Ms['needlv']*2) > $TactFactory['c_point']){echo "改造点数不足！";postFooter();exit;}
}
else $secureCustom = 0;

$PercentageDisplay = ((100-$Pl_Ms['needlv'])*$Mod_MS_pequip_c)*100;
if ($PercentageDisplay > 10000) $PercentageDisplay = 10000;
elseif ($PercentageDisplay < 0) $PercentageDisplay = 0;

$SuccessPc = round( $PercentageDisplay );
$Result_Success = mt_rand(0,10000);

$MS_ResultG = (string) '';

if($Result_Success <= $SuccessPc){
        $Message = "成功\改造了！<br>效果值: ".($Result_Success/100)."% < 成功\率: ".($SuccessPc/100)."%";
        $MS_ResultG = "`p_equip` = '$Game[eqwep]', `eqwep` = '0<!>0' ";
}
else {
        $Message = "改造失败了。<br>效果值: ".($Result_Success/100)."% > 成功\率: ".($SuccessPc/100)."%";
        if (!$secureCustom){
        $HP_Sub = $EN_Sub = 0;
        if (ereg('(ExtHP)+',$Pl_SyEqWep['spec'])){$a = ereg_replace('.*ExtHP<','',$Pl_SyEqWep['spec']);$HP_Sub = intval($a);}
        if (ereg('(ExtEN)+',$Pl_SyEqWep['spec'])){$a = ereg_replace('.*ExtEN<','',$Pl_SyEqWep['spec']);$EN_Sub = intval($a);}
        $hypmd_sql = $hypmd_sql_gen = '';
        if (!ereg('(EXAMSystem)+',$Pl_Ms['spec']) && ereg('(EXAMSystem)+',$Game['spec'])) {
        $Game['spec'] = str_replace('EXAMSystem, ','',$Game['spec']);
        $hypmd_sql = ("`spec` = '$Game[spec]', ");
        $hypmd = 0;
        if ($Gen['hypermode'] >= 4 && $Gen['hypermode'] <= 6){
                switch($Gen['hypermode']){
                case 4: $hypmd = 0; break;
                case 5: $hypmd = 1; break;
                case 6: $hypmd = 2; break;
                }
                $hypmd_sql_gen = ", `hypermode` = $hypmd ";
        }
        }
        $MS_ResultG = "`hpmax` = `hpmax`-$Pl_Ms[hpfix]-$HP_Sub, `enmax` = `enmax`-$Pl_Ms[enfix]-$EN_Sub, `eqwep` = '0<!>0', `p_equip` = '0<!>0',$hypmd_sql `ms_custom` = '' ";
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `msuit` = '0' $hypmd_sql_gen WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
        mysql_query($sql) or die(mysql_error());
        unset($sql);
        }else {$Message .= '<br>工程师们成功\修好损坏了的装备和机体。';$MS_ResultG = "`p_equip` = '0<!>0'";}
}

if ($secureCustom){
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_tactfactory` SET `time` = '$CFU_Time', `c_point`=`c_point`-".intval($Pl_SyEqWep['grade']*10 + $Pl_Ms['needlv']*2)."  WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);
}

$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET $MS_ResultG WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
$sql = ereg_replace("(--)+",'',$sql);
mysql_query($sql);

echo "机体专用化工场 - 机体装备合成工程<hr>";
echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
echo "<p align=center style=\"font-size: 16pt\">$Message<br><input type=submit value=\"返回\" onClick=\"parent.Beta.location.replace('gen_info.php')\"></p>";
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