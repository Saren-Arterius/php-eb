<?php
$mode = ( isset($_GET['action']) ) ? $_GET['action'] : $_POST['action'];
include('cfu.php');
postHead('');
AuthUser("$Pl_Value[USERNAME]","$Pl_Value[PASSWORD]");
if ($CFU_Time >= $TIMEAUTH+$TIME_OUT_TIME || $TIMEAUTH <= $CFU_Time-$TIME_OUT_TIME){echo "������ʱ��<br>�����µ��룡";exit;}
GetUsrDetails("$Pl_Value[USERNAME]",'Gen','Game');
$t_now = time();
if ($Gen['btltime'] == $t_now){echo "�������졣";postFooter();mysql_query("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `btltime` = ".intval($t_now+10)." WHERE `username` = '$Gen[username]' LIMIT 1;");exit;}
if ($Game['organization'])
$Pl_Org = ReturnOrg("$Game[organization]");

//Set DataTable
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_bank` WHERE username='". $Pl_Value['USERNAME'] ."'");
$query_bnk = mysql_query($sql);
$defineuserc = 0;
$defineuserc = mysql_num_rows($query_bnk);

if ($defineuserc == 0){
        $sqldfbk = ("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_bank` (username) VALUES('$Pl_Value[USERNAME]')");
        mysql_query($sqldfbk) or die ('<br><center>δ�ܽ�����������<br>ԭ��:' . mysql_error() . '<br>');
        $sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_bank` WHERE username='". $Pl_Value['USERNAME'] ."'");
        $query_bnk = mysql_query($sql) or die ('<br><center>δ�ܽ�����������<br>ԭ��:' . mysql_error() . '<br>');
}
$Bank = mysql_fetch_array($query_bnk);

//Bank GUI
if ($mode=='main' && $actionb=='none'){
        echo "����<hr>";
        echo "<br>";
        echo "<form action=bank.php?action=main method=post name=bkmainform>";
        echo "<input type=hidden value='none' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "<script language=\"Javascript\">";
        echo "function ConfirmBanking(){";
        echo "if (bkmainform.actionb.value == 'deposit'){";
        echo "if (bkmainform.d_amount.value > $Gen[cash]){alert('��û���Ƕ�Ǯ��...'+bkmainform.d_amount.value);bkmainform.banking.style.visibility='visible';return false;}";
        echo "else {if (confirm('ȷ��Ҫ�� '+bkmainform.d_amount.value+'Ԫ ����������') == true)";
        echo "{bkmainform.submit();return true}";
        echo "else {bkmainform.banking.style.visibility='visible';}}}";
        echo "else if(bkmainform.actionb.value == 'withdrawl'){";
        echo "if (bkmainform.w_amount.value > $Bank[savings]){alert('�㻧���eû���Ƕ�Ǯ��...');bkmainform.banking.style.visibility='visible';return false;}";
        echo "else {if(confirm('ȷ��Ҫ�� '+bkmainform.w_amount.value+'Ԫ ȡ������') == true){bkmainform.submit();return true}";
        echo "else {bkmainform.banking.style.visibility='visible';}}}";
        echo "else if(!bkmainform.actionb.value){alert('�㲻���������а�?');return false;}";
        echo "}function ConfirmAccValid(){";
        echo "if ($Gen[cash] < 1500000){alert('�������ֽ����أ�����Ͱɣ�');bkmainform.AccountValiding.style.visibility='visible';return false;}";
        echo "else if ($Game[level] < 30){alert('���ĵȲ����أ�����Ͱɣ�');bkmainform.AccountValiding.style.visibility='visible';return false;}";
        echo "else {if (confirm('ȷ��Ҫ��10�򿪻���') == true){bkmainform.submit();return true}";
        echo "else {bkmainform.AccountValiding.style.visibility='visible';return false;}}";
        echo "}function ConfirmRemit(){";
        echo "if ($Bank[savings] < bkmainform.c_amount.value){alert('���Ĵ����أ�');bkmainform.remit.style.visibility='visible';return false;}";
        echo "else if (bkmainform.c_amount.value <= 0){alert('�����������');bkmainform.remit.style.visibility='visible';return false;}";
        echo "else if (bkmainform.c_target.value == '0'){alert('����ָ����Ҫ���˭��');bkmainform.remit.style.visibility='visible';return false;}";
        echo "else {if (confirm('ȷ��Ҫ�� '+bkmainform.c_amount.value+'Ԫ��') == true){bkmainform.submit();return true}";
        echo "else {bkmainform.remit.style.visibility='visible';return false;}}";
        echo "}function ConfirmBounty(){";
        echo "if ($Bank[savings] < bkmainform.t_amount.value){alert('���Ĵ����أ�');bkmainform.bounty.style.visibility='visible';return false;}";
        echo "else if (bkmainform.t_amount.value <= 0){alert('�����������');bkmainform.bounty.style.visibility='visible';return false;}";
        echo "else if (bkmainform.t_target.value == '0'){alert('����ָ����Ҫͨ����˭��');bkmainform.bounty.style.visibility='visible';return false;}";
        echo "else {if (confirm('ȷ��Ҫ�� '+bkmainform.t_amount.value+'Ԫ ͨ����') == true){bkmainform.submit();return true}";
        echo "else {bkmainform.bounty.style.visibility='visible';return false;}}";
        echo "}</script>";
        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr align=center><td colspan=9><b style=\"font-size: 12        pt;\">���з����б�: </b></td></tr>";
        if($Bank['status']){
        echo "<tr align=center>";
        echo "<td width=\"100\"><b style=\"font-size: 12pt;\">���ڷ���</b></td>";
        echo "<td width=\"300\" align=left>�����ֽ�: ".number_format($Gen['cash']);
        echo "<br>���Ĵ��: ".number_format($Bank['savings'])."<hr align=center width=80%>";
        echo "��� <input type=radio name=actionc value=deposit onClick=\"bkmainform.actionb.value='deposit';banking.disabled=false;c_amount.disabled=true;remit.disabled=true;depamt.disabled=false;whdlamt.disabled=true;t_amount.disabled=true;bounty.disabled=true;\"> : <input id=depamt disabled type=text maxlength=10 name=d_amount value=0>";
        echo "<br>��� <input type=radio name=actionc value=withdrawl onClick=\"bkmainform.actionb.value='withdrawl';banking.disabled=false;c_amount.disabled=true;remit.disabled=true;whdlamt.disabled=false;depamt.disabled=true;t_amount.disabled=true;bounty.disabled=true;\"> : <input id=whdlamt disabled type=text maxlength=10 name=w_amount value=0>";
        echo "<br><input type=button disabled name=banking value=ȷ����ȡ onClick=\"banking.style.visibility='hidden';ConfirmBanking()\">";
        echo "</td>";
        echo "</tr>";
        echo "<tr align=center>";
        echo "<td width=\"100\"><b style=\"font-size: 12pt;\">������</b></td>";
        echo "<td width=\"300\" align=left>���Ĵ��: ".number_format($Bank['savings'])."<br>";
        echo "��<input type=text disabled name=c_amount value=0 maxlength=10 size=10>Ԫ���:<br><select name=c_target>";
        echo "<option value='0'>��������������ѡ�񡳣���������";
        if ($Game['organization'])
        echo "<option value='<����������֯>' style=\"background: $Pl_Org[color]\">$Pl_Org[name] (��֯�ʽ�)";
        unset($sql,$query,$BankUsers,$c_rcb);
        $sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_bank` WHERE `status` = '1' AND `username` != '$Bank[username]'");
        $query = mysql_query($sql);
        while ($BankUsers = mysql_fetch_array($query)){$c_rcb+=1;
                GetUsrDetails($BankUsers['username'],'','BankGame');
                echo "<option value='$BankGame[username]'>$BankGame[gamename]";
                unset($BankGame);
        }
        unset($sql,$query);
        echo "</select>";
        if (!$c_rcb)$remit_disabledtrue = 'disabled';
        echo "<br>ʹ�û�����<input type=radio $remit_disabledtrue name=actionc value=remit onClick=\"bkmainform.actionb.value='remit';c_amount.disabled=false;remit.disabled=false;t_amount.disabled=true;bounty.disabled=true;banking.disabled=true;depamt.disabled=true;whdlamt.disabled=true;\">";
        echo "<br><input type=button name=remit disabled value=ȷ����� onClick=\"remit.style.visibility='hidden';ConfirmRemit()\">";
        echo "</td>";
        echo "</tr>";
        echo "<tr align=center>";
        echo "<td width=\"100\"><b style=\"font-size: 12pt;\">ͨ������</b></td>";
        echo "<td width=\"300\" align=left>���Ĵ��: ".number_format($Bank['savings'])."<br>";
        echo "��<input type=text disabled name=t_amount value=0 maxlength=10 size=10>Ԫͨ��:<br><select name=t_target>";
        echo "<option value='0'>��������������ѡ�񡳣���������";
        unset($sql,$query,$BankUsers,$c_rcb);
        $sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_general_info` WHERE `username` != '$Bank[username]'");
        $query = mysql_query($sql);
        while ($BntyTrgt = mysql_fetch_array($query)){$c_rcb+=1;
                GetUsrDetails($BntyTrgt['username'],'','BntyTrgtGame');
                echo "<option value='$BntyTrgtGame[username]'>$BntyTrgtGame[gamename]";
                unset($BntyTrgtGame);
        }
        unset($sql,$query);
        echo "</select>";
        if (!$c_rcb)$bounty_disabledtrue = 'disabled';
        echo "<br>ʹ��ͨ������<input type=radio $bounty_disabledtrue name=actionc value=bounty onClick=\"bkmainform.actionb.value='bounty';t_amount.disabled=false;bounty.disabled=false;c_amount.disabled=true;remit.disabled=true;banking.disabled=true;depamt.disabled=true;whdlamt.disabled=true;\">";
        echo "<br><input type=button name=bounty disabled value=ȷ��ͨ�� onClick=\"bounty.style.visibility='hidden';ConfirmBounty()\">";
        echo "</td>";
        echo "</tr>";
        echo "<tr align=center>";
        echo "<td width=\"100\"><b style=\"font-size: 12pt;\">��¼����</b></td>";
        echo "<td width=\"300\" align=left>";
        echo "������м�¼: ";
        echo "<br><input type=submit value=��¼���� onClick=\"document.bkmainform.action='bank.php?action=CheckLog&actionb=0';bkmainform.actionb.value='GUI'\">";
        echo "</td>";
        echo "</tr>";
        echo "<tr align=center>";
        echo "<td width=\"100\"><b style=\"font-size: 12pt;\">���׷���</b></td>";
        echo "<td width=\"300\" align=left>";
        echo "�鷳�����뵽���տⲿ��: ";
        echo "<br><input type=submit value=���տⲿ�� onClick=\"document.bkmainform.action='bank.php?action=SafeHouse';bkmainform.actionb.value='GUI'\">";
        echo "</td>";
        echo "</tr>";
        }else {
        echo "<input type=hidden value='AccValidation' name=actionc>";
        echo "<tr align=center>";
        echo "<td width=\"100\"><b style=\"font-size: 12pt;\">��������</b></td>";
        echo "<td width=\"300\" align=left>�κεȼ��ﵽ".$BankRqLv."�����ֽ���".ceil($BankRqMoney/10000)."�� (".number_format($BankRqMoney).") ����Ҳ���Կ����л��ڵġ�<br>��������ȡ��һ���Ե�������".ceil($BankFee/10000)."�� (".number_format($BankFee).") ��֮������������ܱ����еķ���";
        echo "<br>�����ֽ�: ".number_format($Gen['cash'])."<hr align=center width=80%>";
        echo "<center><input type=submit name=AccountValiding value=ȷ������ onClick=\"AccountValiding.style.visibility='hidden';bkmainform.actionb.value='AccValidation';return ConfirmAccValid();\">";
        echo "</td>";
        echo "</tr>";
        }
        echo "</form></table>";
        
}//End GUI
elseif ($mode=='main' && $actionc == $actionb){


$log_amount = $log_tsaving = $log_tcash = $log_amount = $log_type = 0;
$log_target = $log_tg_name = (string) '';

if ($actionb == 'AccValidation'){
        if (1500000 > $Gen['cash']){echo "��Ǹ, ���Ľ�Ǯ���㡣";postFooter();exit;}
        if (30 > $Game['level']){echo "��Ǹ, ���ĵȼ����㡣";postFooter();exit;}
        $Gen['cash'] -= 100000;
        $log_type = 5;
        }
else{
        if($Bank['status'] == '0'){echo "��Ǹ, ��������ʱδ���ṩ�����δ��������ʿ��";postFooter();exit;}
        if($Bank['status'] == '-1'){echo "��Ǹ, ���µ������ʻ���ʱ�������ˡ�";postFooter();exit;}


if ($actionb == 'deposit'){
        if($d_amount>$Gen['cash']){echo "��Ǹ, ��������ʱδ���ṩ������, �����ǽ����ͻ��������ġ�";postFooter();exit;}
        if($d_amount <= 0){echo "�鷳�������������";postFooter();exit;}
        $d_amount = intval($d_amount);
        $Gen['cash'] -= $d_amount;
        $Bank['savings'] += $d_amount;
        $log_amount = $d_amount;
        $log_type = 1;
}
elseif ($actionb == 'withdrawl'){
        if($w_amount>$Bank['savings']){echo "��Ǹ, ��������ʱδ���ṩ������";postFooter();exit;}
        if($w_amount <= 0){echo "�鷳�������������";postFooter();exit;}
        $w_amount = intval($w_amount);
        $Gen['cash'] += $w_amount;
        $Bank['savings'] -= $w_amount;
        $log_amount = $w_amount;
        $log_type = 2;
}
elseif ($actionb == 'remit'){
        $c_amount = intval($c_amount);
        if($c_amount > $Bank['savings']){echo "��Ǹ, ���Ĵ���, �����޷������";postFooter();exit;}
        if($c_amount <= 0){echo "�鷳�������������";postFooter();exit;}
        if ($c_target && $c_target != '<����������֯>'){
        $sql = ("SELECT `bank`.`status` AS `AcStatus`, `gamename`, `savings`, `cash` FROM `".$GLOBALS['DBPrefix']."phpeb_user_general_info` `gen`,`".$GLOBALS['DBPrefix']."phpeb_user_bank` `bank`,`".$GLOBALS['DBPrefix']."phpeb_user_game_info` `game`  WHERE `bank`.`username` = `game`.`username` AND `bank`.`username` = `gen`.`username` AND `bank`.`username` = '$c_target'");
        $query = mysql_query($sql);
        $BankUser = mysql_fetch_array($query);
        }
        if ($c_target != '<����������֯>'){
        if ($BankUser['AcStatus'] != '1'){echo "��Ǹ, ��Ŀ�������û����Ч�������ʻ���$BankUser[AcStatus]";postFooter();exit;}
        $Bank['savings'] -= $c_amount;
        }
        $log_target = $c_target;
        $log_amount = $c_amount;
        $log_tsaving = $BankUser['savings'] + $c_amount;
        $log_tcash = $BankUser['cash'];
        $log_tg_name = $BankUser['gamename'];
        $log_type = 3;
}
elseif ($actionb == 'bounty'){
        $t_amount = intval($t_amount);
        if($t_amount > $Bank['savings']){echo "��Ǹ, ���Ĵ���, �����޷�������ͨ����";postFooter();exit;}
        if($t_amount <= 0){echo "�鷳�������������";postFooter();exit;}
        if($t_target == $Pl_Value['USERNAME']){echo "�鷳���²�Ҫ������";postFooter();exit;}
        $sql = ("SELECT `bounty`,`gamename` FROM `".$GLOBALS['DBPrefix']."phpeb_user_general_info` `gen`,`".$GLOBALS['DBPrefix']."phpeb_user_game_info` `game` WHERE `gen`.`username` = `game`.`username` AND `gen`.`username` = '$t_target'");
        $query = mysql_query($sql) or die(mysql_error());
        $BntyTrgt = mysql_fetch_array($query);
        GetUsrDetails($t_target,'','BntyTrgtGame');
        $Bank['savings'] -= $t_amount;
        $BntyTrgt['bounty'] += $t_amount;
        $log_target = $t_target;
        $log_amount = $t_amount;
        $log_tg_name = $BntyTrgt['gamename'];
        $log_type = 4;
}else{echo "δ���嶯����";postFooter();exit;}
}
if ($actionb == 'remit' && $c_target == '<����������֯>'){
$Bank['savings'] -= $c_amount;
        unset($sql);
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_organization` SET `funds` = `funds`+$c_amount WHERE `id` = '$Game[organization]' LIMIT 1;");
        mysql_query($sql);
}
        unset($sql);
        $sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `cash` = '$Gen[cash]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
        mysql_query($sql);unset($sql);
if ($actionb != 'AccValidation')
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_bank` SET `savings` = '$Bank[savings]' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
else
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_bank` SET `status` = '1' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
mysql_query($sql);unset($sql);
if ($actionb == 'remit' && $c_target != '<����������֯>'){
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_bank` SET `savings` = `savings`+'$c_amount' WHERE `username` = '$c_target' LIMIT 1;");
mysql_query($sql);unset($sql);}
if ($actionb == 'bounty'){
$sql = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `bounty` = '$BntyTrgt[bounty]' WHERE `username` = '$t_target' LIMIT 1;");
mysql_query($sql);unset($sql);}

$sql = ("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_bank_log` (`time`, `user`, `g_name`, `type`, `amount`, `cash`, `bankamt`, `t_cash`, `t_bankamt`, `target`, `tg_name`) VALUES ('".$CFU_Time."', '$Pl_Value[USERNAME]', '$Game[gamename]', '$log_type', '$log_amount', '$Gen[cash]', '$Bank[savings]', '$log_tcash', '$log_tsaving', '$log_target', '$log_tg_name');");
mysql_query($sql) or die(mysql_error());unset($sql);

        echo "<form action=bank.php?action=main method=post name=frmct target=Beta>";
        echo "<input type=hidden value='none' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">��ɣ�<br><input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"><input type=submit value=\"����ʹ������\" onClick=\"frmct.submit()\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
}
elseif($mode == 'SafeHouse' && $actionb=='GUI'){
        $Pl_WepB = explode('<!>',$Game['wepb']);
        $Pl_WepC = explode('<!>',$Game['wepc']);
        echo "���б��տ�<hr>";
        echo "<br>";
        echo "<form action=bank.php?action=SafeHouse method=post name=bkmainform>";
        echo "<input type=hidden value='none' name=actionb>";
        echo "<input type=hidden value='' name=actionc>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "<script langauge=\"Javascript\">";
        echo "function MakeDeal(){";
        echo "if (confirm('������һ�����ף�������')==true){bkmainform.actionb.value='MakeDeal';bkmainform.actionc.value= 'none';}";
        echo "else {return false}}";
        echo "function ConfirmDeal(deal){";
        echo "if (confirm('ȷ����һ�����ף�������')==true){bkmainform.actionb.value='PayDeal';bkmainform.actionc.value= deal;}";
        echo "else {return false}}";
        echo "function RejectDeal(deal){";
        echo "if (confirm('�ܾ���һ�����ף�������')==true){bkmainform.actionb.value='RejectDeal';bkmainform.actionc.value= deal;}";
        echo "else {return false}}";
        echo "function CancelDeal(deal){";
        echo "if (confirm('��ֹ��һ�����ף�������')==true){bkmainform.actionb.value='CancelDeal';bkmainform.actionc.value= deal;}";
        echo "else {return false}}</script>";
        echo "<table align=center width=600 border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr align=center><td colspan=3><b style=\"font-size: 12pt;\">Inbox: </b></td>";
        echo "</tr><tr valign=top>";
        $EmptyMsg = '<Br><center>û���κ���Ʒ</center><Br><Br>';
        echo "<td width=33%><b style=\"font-size: 12pt;\">һ����: </b><br>";
        if ($Pl_WepB[0] && $Pl_WepC[0])
        $disableOnFull = 'disabled';
        if ($Bank['sh_ina']){
                unset($query,$sql,$SafeIN,$SafeIN_Wep,$SafeIN_Dealer,$D_Specs);
                
                $SafeIN = explode('<#>',$Bank['sh_ina']);
                $SafeIN_Wep = explode('<!>',$SafeIN[2]);
                
                $sql = ("SELECT `gamename`,`name`,`atk`,`hit`,`rd`,`enc`,`w`.`spec`,`equip` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` `g`,`".$GLOBALS['DBPrefix']."phpeb_sys_wep` `w` WHERE `username`='". $SafeIN[0] ."' AND `id` = '". $SafeIN_Wep[0] ."'");
                $query = mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
                $SafeIN_Dealer = mysql_fetch_array($query);
                        if ($SafeIN_Wep[2]){
                                if ($SafeIN_Wep[2]==1) $SafeIN_Dealer['name'] = $SafeIN_Wep[3].$SafeIN_Dealer['name']."<sub>?</sub>";
                                else $SafeIN_Dealer['name'] = $SafeIN_Dealer['name'].$SafeIN_Wep[3]."<sub>?</sub>";
                                $SafeIN_Dealer['atk'] += $SafeIN_Wep[4];
                                $SafeIN_Dealer['hit'] += $SafeIN_Wep[5];
                                $SafeIN_Dealer['rd'] += $SafeIN_Wep[6];
                                $SafeIN_Dealer['enc'] = $SafeIN_Wep[7];
                        }
                echo "����: $SafeIN_Dealer[gamename]<br>����: ".number_format($SafeIN[1])."<br>װ��: $SafeIN_Dealer[name]<br>����: $SafeIN_Wep[1]<br>����: <br>";
                echo "��������: $SafeIN_Dealer[atk]����������: $SafeIN_Dealer[rd]<br>������: $SafeIN_Dealer[hit]������EN����: $SafeIN_Dealer[enc]<br>";
                $D_Specs = ReturnSpecs($SafeIN_Dealer['spec']);
                echo "����Ч��:";
                if ($SafeIN_Dealer['equip']) echo "����װ��<br>";
                if ($SafeIN_Dealer['spec']) echo $D_Specs;
                elseif(!$SafeIN_Dealer['spec'] && !$SafeIN_Dealer['equip']) echo "û���κ�����Ч��<br>";
                echo "<input type=submit $disableOnFull onClick=\"return ConfirmDeal('a')\" value=ȷ�Ͻ���>";
                echo "<input type=submit onClick=\"return RejectDeal('a')\" value=�ܾ�����>";
        }else
        echo "$EmptyMsg";
        echo "</td>";
        echo "<td width=34%><b style=\"font-size: 12pt;\">������: </b><br>";
        if ($Bank['sh_inb']){
                unset($query,$sql,$SafeIN,$SafeIN_Wep,$SafeIN_Dealer,$D_Specs);
                
                $SafeIN = explode('<#>',$Bank['sh_inb']);
                $SafeIN_Wep = explode('<!>',$SafeIN[2]);
                
                $sql = ("SELECT `gamename`,`name`,`atk`,`hit`,`rd`,`enc`,`w`.`spec`,`equip` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` `g`,`".$GLOBALS['DBPrefix']."phpeb_sys_wep` `w` WHERE `username`='". $SafeIN[0] ."' AND `id` = '". $SafeIN_Wep[0] ."'");
                $query = mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
                $SafeIN_Dealer = mysql_fetch_array($query);
                        if ($SafeIN_Wep[2]){
                                if ($SafeIN_Wep[2]==1) $SafeIN_Dealer['name'] = $SafeIN_Wep[3].$SafeIN_Dealer['name']."<sub>?</sub>";
                                else $SafeIN_Dealer['name'] = $SafeIN_Dealer['name'].$SafeIN_Wep[3]."<sub>?</sub>";
                                $SafeIN_Dealer['atk'] += $SafeIN_Wep[4];
                                $SafeIN_Dealer['hit'] += $SafeIN_Wep[5];
                                $SafeIN_Dealer['rd'] += $SafeIN_Wep[6];
                                $SafeIN_Dealer['enc'] = $SafeIN_Wep[7];
                        }
                echo "����: $SafeIN_Dealer[gamename]<br>����: ".number_format($SafeIN[1])."<br>װ��: $SafeIN_Dealer[name]<br>����: $SafeIN_Wep[1]<br>����: <br>";
                echo "��������: $SafeIN_Dealer[atk]����������: $SafeIN_Dealer[rd]<br>������: $SafeIN_Dealer[hit]������EN����: $SafeIN_Dealer[enc]<br>";
                $D_Specs = ReturnSpecs($SafeIN_Dealer['spec']);
                echo "����Ч��:";
                if ($SafeIN_Dealer['equip']) echo "����װ��<br>";
                if ($SafeIN_Dealer['spec']) echo $D_Specs;
                else echo "û���κ�����Ч��<br>";
                echo "<input type=submit $disableOnFull onClick=\"return ConfirmDeal('b')\" value=ȷ�Ͻ���>";
                echo "<input type=submit onClick=\"return RejectDeal('b')\" value=�ܾ�����>";
        }else
        echo "$EmptyMsg";
        echo "</td>";
        echo "<td width=33%><b style=\"font-size: 12pt;\">������: </b><br>";
        if ($Bank['sh_inc']){
                unset($query,$sql,$SafeIN,$SafeIN_Wep,$SafeIN_Dealer,$D_Specs);
                
                $SafeIN = explode('<#>',$Bank['sh_inc']);
                $SafeIN_Wep = explode('<!>',$SafeIN[2]);
                
                $sql = ("SELECT `gamename`,`name`,`atk`,`hit`,`rd`,`enc`,`w`.`spec`,`equip` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` `g`,`".$GLOBALS['DBPrefix']."phpeb_sys_wep` `w` WHERE `username`='". $SafeIN[0] ."' AND `id` = '". $SafeIN_Wep[0] ."'");
                $query = mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
                $SafeIN_Dealer = mysql_fetch_array($query);
                        if ($SafeIN_Wep[2]){
                                if ($SafeIN_Wep[2]==1) $SafeIN_Dealer['name'] = $SafeIN_Wep[3].$SafeIN_Dealer['name']."<sub>?</sub>";
                                else $SafeIN_Dealer['name'] = $SafeIN_Dealer['name'].$SafeIN_Wep[3]."<sub>?</sub>";
                                $SafeIN_Dealer['atk'] += $SafeIN_Wep[4];
                                $SafeIN_Dealer['hit'] += $SafeIN_Wep[5];
                                $SafeIN_Dealer['rd'] += $SafeIN_Wep[6];
                                $SafeIN_Dealer['enc'] = $SafeIN_Wep[7];
                        }
                echo "����: $SafeIN_Dealer[gamename]<br>����: ".number_format($SafeIN[1])."<br>װ��: $SafeIN_Dealer[name]<br>����: $SafeIN_Wep[1]<br>����: <br>";
                echo "��������: $SafeIN_Dealer[atk]����������: $SafeIN_Dealer[rd]<br>������: $SafeIN_Dealer[hit]������EN����: $SafeIN_Dealer[enc]<br>";
                $D_Specs = ReturnSpecs($SafeIN_Dealer['spec']);
                echo "����Ч��:";
                if ($SafeIN_Dealer['equip']) echo "����װ��<br>";
                if ($SafeIN_Dealer['spec']) echo $D_Specs;
                else echo "û���κ�����Ч��<br>";
                echo "<input type=submit $disableOnFull onClick=\"return ConfirmDeal('c')\" value=ȷ�Ͻ���>";
                echo "<input type=submit onClick=\"return RejectDeal('c')\" value=�ܾ�����>";
        }else
        echo "$EmptyMsg";
        echo "</td>";
        echo "</tr>";
        echo "<tr align=center><td colspan=3><b style=\"font-size: 12pt;\">Outbox: </b></td>";
        echo "</tr><tr valign=top>";
        echo "<td width=33%><b style=\"font-size: 12pt;\">һ����: </b><br>";
        if ($Bank['sh_outa']){
                unset($query,$sql,$SafeOUT,$SafeOUT_Wep,$SafeOUT_Dealer,$D_Specs);
                
                $SafeOUT = explode('<#>',$Bank['sh_outa']);
                $SafeOUT_Wep = explode('<!>',$SafeOUT[2]);
                
                $sql = ("SELECT `gamename`,`name`,`atk`,`hit`,`rd`,`enc`,`w`.`spec`,`equip` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` `g`,`".$GLOBALS['DBPrefix']."phpeb_sys_wep` `w` WHERE `username`='". $SafeOUT[0] ."' AND `id` = '". $SafeOUT_Wep[0] ."'");
                $query = mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
                $SafeOUT_Dealer = mysql_fetch_array($query);
                        if ($SafeOUT_Wep[2]){
                                if ($SafeOUT_Wep[2]==1) $SafeOUT_Dealer['name'] = $SafeOUT_Wep[3].$SafeOUT_Dealer['name']."<sub>?</sub>";
                                else $SafeOUT_Dealer['name'] = $SafeOUT_Dealer['name'].$SafeOUT_Wep[3]."<sub>?</sub>";
                                $SafeOUT_Dealer['atk'] += $SafeOUT_Wep[4];
                                $SafeOUT_Dealer['hit'] += $SafeOUT_Wep[5];
                                $SafeOUT_Dealer['rd'] += $SafeOUT_Wep[6];
                                $SafeOUT_Dealer['enc'] = $SafeOUT_Wep[7];
                        }
                echo "Ŀ�����: $SafeOUT_Dealer[gamename]<br>�ۼ�: ".number_format($SafeOUT[1])."<br>װ��: $SafeOUT_Dealer[name]<br>����: $SafeOUT_Wep[1]<br>����: <br>";
                echo "��������: $SafeOUT_Dealer[atk]����������: $SafeOUT_Dealer[rd]<br>������: $SafeOUT_Dealer[hit]������EN����: $SafeOUT_Dealer[enc]<br>";
                $D_Specs = ReturnSpecs($SafeOUT_Dealer['spec']);
                echo "����Ч��:";
                if ($SafeOUT_Dealer['equip']) echo "����װ��<br>";
                if ($SafeOUT_Dealer['spec']) echo $D_Specs;
                else echo "û���κ�����Ч��<br>";
                echo "<input type=submit $disableOnFull onClick=\"return CancelDeal('a')\" value=��ֹ����>";
        }else
        echo "$EmptyMsg";
        echo "</td>";
        echo "<td width=34%><b style=\"font-size: 12pt;\">������: </b><br>";
        if ($Bank['sh_outb']){
                unset($query,$sql,$SafeOUT,$SafeOUT_Wep,$SafeOUT_Dealer,$D_Specs);
                
                $SafeOUT = explode('<#>',$Bank['sh_outb']);
                $SafeOUT_Wep = explode('<!>',$SafeOUT[2]);
                
                $sql = ("SELECT `gamename`,`name`,`atk`,`hit`,`rd`,`enc`,`w`.`spec`,`equip` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` `g`,`".$GLOBALS['DBPrefix']."phpeb_sys_wep` `w` WHERE `username`='". $SafeOUT[0] ."' AND `id` = '". $SafeOUT_Wep[0] ."'");
                $query = mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
                $SafeOUT_Dealer = mysql_fetch_array($query);
                        if ($SafeOUT_Wep[2]){
                                if ($SafeOUT_Wep[2]==1) $SafeOUT_Dealer['name'] = $SafeOUT_Wep[3].$SafeOUT_Dealer['name']."<sub>?</sub>";
                                else $SafeOUT_Dealer['name'] = $SafeOUT_Dealer['name'].$SafeOUT_Wep[3]."<sub>?</sub>";
                                $SafeOUT_Dealer['atk'] += $SafeOUT_Wep[4];
                                $SafeOUT_Dealer['hit'] += $SafeOUT_Wep[5];
                                $SafeOUT_Dealer['rd'] += $SafeOUT_Wep[6];
                                $SafeOUT_Dealer['enc'] = $SafeOUT_Wep[7];
                        }
                echo "Ŀ�����: $SafeOUT_Dealer[gamename]<br>�ۼ�: ".number_format($SafeOUT[1])."<br>װ��: $SafeOUT_Dealer[name]<br>����: $SafeOUT_Wep[1]<br>����: <br>";
                echo "��������: $SafeOUT_Dealer[atk]����������: $SafeOUT_Dealer[rd]<br>������: $SafeOUT_Dealer[hit]������EN����: $SafeOUT_Dealer[enc]<br>";
                $D_Specs = ReturnSpecs($SafeOUT_Dealer['spec']);
                echo "����Ч��:";
                if ($SafeOUT_Dealer['equip']) echo "����װ��<br>";
                if ($SafeOUT_Dealer['spec']) echo $D_Specs;
                else echo "û���κ�����Ч��<br>";
                echo "<input type=submit $disableOnFull onClick=\"return CancelDeal('b')\" value=��ֹ����>";
        }else
        echo "$EmptyMsg";
        echo "</td>";
        echo "<td width=33%><b style=\"font-size: 12pt;\">������: </b><br>";
        if ($Bank['sh_outc']){
                unset($query,$sql,$SafeOUT,$SafeOUT_Wep,$SafeOUT_Dealer,$D_Specs);
                
                $SafeOUT = explode('<#>',$Bank['sh_outc']);
                $SafeOUT_Wep = explode('<!>',$SafeOUT[2]);
                
                $sql = ("SELECT `gamename`,`name`,`atk`,`hit`,`rd`,`enc`,`w`.`spec`,`equip` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` `g`,`".$GLOBALS['DBPrefix']."phpeb_sys_wep` `w` WHERE `username`='". $SafeOUT[0] ."' AND `id` = '". $SafeOUT_Wep[0] ."'");
                $query = mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
                $SafeOUT_Dealer = mysql_fetch_array($query);
                        if ($SafeOUT_Wep[2]){
                                if ($SafeOUT_Wep[2]==1) $SafeOUT_Dealer['name'] = $SafeOUT_Wep[3].$SafeOUT_Dealer['name']."<sub>?</sub>";
                                else $SafeOUT_Dealer['name'] = $SafeOUT_Dealer['name'].$SafeOUT_Wep[3]."<sub>?</sub>";
                                $SafeOUT_Dealer['atk'] += $SafeOUT_Wep[4];
                                $SafeOUT_Dealer['hit'] += $SafeOUT_Wep[5];
                                $SafeOUT_Dealer['rd'] += $SafeOUT_Wep[6];
                                $SafeOUT_Dealer['enc'] = $SafeOUT_Wep[7];
                        }
                echo "Ŀ�����: $SafeOUT_Dealer[gamename]<br>�ۼ�: ".number_format($SafeOUT[1])."<br>װ��: $SafeOUT_Dealer[name]<br>����: $SafeOUT_Wep[1]<br>����: <br>";
                echo "��������: $SafeOUT_Dealer[atk]����������: $SafeOUT_Dealer[rd]<br>������: $SafeOUT_Dealer[hit]������EN����: $SafeOUT_Dealer[enc]<br>";
                $D_Specs = ReturnSpecs($SafeOUT_Dealer['spec']);
                echo "����Ч��:";
                if ($SafeOUT_Dealer['equip']) echo "����װ��<br>";
                if ($SafeOUT_Dealer['spec']) echo $D_Specs;
                else echo "û���κ�����Ч��<br>";
                echo "<input type=submit $disableOnFull onClick=\"return CancelDeal('c')\" value=��ֹ����>";
        }else
        echo "$EmptyMsg";
        echo "</td>";
        echo "</tr>";
        echo "</table>";
        echo "<hr width=80% style=\"filter:alpha(opacity=100,finishopacity=40,style=2)\"><br>";
        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        echo "<tr><td align=left width=250><b style=\"font-size: 10pt;\">��������: </b></td></tr>";
        echo "<tr><td align=left><b>��</b><br>";
        if ($Pl_WepB[0]){
        GetWeaponDetails($Pl_WepB[0],'Pl_WepBS');
        if ($Pl_WepB[2]){
        if ($Pl_WepB[2]==1) $Pl_WepBS['name'] = $Pl_WepB[3].$Pl_WepBS['name']."<sub>?</sub>";
        else $Pl_WepBS['name'] = $Pl_WepBS['name'].$Pl_WepB[3]."<sub>?</sub>";
        $Pl_WepBS['atk'] += $Pl_WepB[4];
        $Pl_WepBS['hit'] += $Pl_WepB[5];
        $Pl_WepBS['rd'] += $Pl_WepB[6];
        $Pl_WepBS['enc'] = $Pl_WepB[7];
        }

        echo "����������һ:<br>����".$Pl_WepBS['name']." <input type=radio value='wepb' name=sellslot>";
        }
        if ($Pl_WepB[0] && $Pl_WepC[0])
        echo "<br>";
        if ($Pl_WepC[0]){
        GetWeaponDetails($Pl_WepC[0],'Pl_WepCS');
        if ($Pl_WepC[2]){
        if ($Pl_WepC[2]==1) $Pl_WepCS['name'] = $Pl_WepC[3].$Pl_WepCS['name']."<sub>?</sub>";
        else $Pl_WepCS['name'] = $Pl_WepCS['name'].$Pl_WepC[3]."<sub>?</sub>";
        $Pl_WepCS['atk'] += $Pl_WepC[4];
        $Pl_WepCS['hit'] += $Pl_WepC[5];
        $Pl_WepCS['rd'] += $Pl_WepC[6];
        $Pl_WepCS['enc'] = $Pl_WepC[7];
        }
        echo "������������:<br>����".$Pl_WepCS['name']." <input type=radio value='wepc' name=sellslot>";
        }
        echo "<br><b>����</b><br>";
        
        unset($sql,$query,$BankUsers,$c_rcb);
        $Exch_Avail = '';
        $sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_bank` WHERE `status` = '1' AND `username` != '$Bank[username]' AND (!`sh_ina` OR !`sh_inb` OR !`sh_inc`)");
        $query = mysql_query($sql);
        while ($BankUsers = mysql_fetch_array($query)){$c_rcb+=1;
                GetUsrDetails($BankUsers['username'],'','BankGame');
                $Exch_Avail .= "<option value='$BankGame[username]'>$BankGame[gamename]";
                unset($BankGame);
        }
        unset($sql,$query);
        if (!$c_rcb)$exch_disabledtrue = 'disabled';
        echo "<select name=exch_target $exch_disabledtrue>";
        echo "<option value='0'>��������������ѡ�񡳣���������";
        echo "$Exch_Avail";
        echo "</select>";
        echo "<br><b>����:</b><br><input type=text name=price_sell maxlength=10 size=10><br>";
        echo "<input type=submit onClick=\"return MakeDeal()\" value=��������>";
        echo "</td></tr>";
        echo "</table>";
        echo "</form>";
}

elseif($mode == 'SafeHouse' && $actionb && $actionc){
        $Pl_WepB = explode('<!>',$Game['wepb']);
        $Pl_WepC = explode('<!>',$Game['wepc']);
        
        if ($actionb=='PayDeal'){
        
        if (!$Pl_WepB[0]){$FreeSlot = 'wepb';}
        elseif (!$Pl_WepC[0]){$FreeSlot = 'wepc';}
        else {echo "<center>������װ���������ˣ��޷���ȫ���ס�";postFooter();exit;}

        if ($actionc=='a'){$SafeIN = explode('<#>',$Bank['sh_ina']);$InS = 'sh_ina';}
        elseif ($actionc=='b'){$SafeIN = explode('<#>',$Bank['sh_inb']);$InS = 'sh_inb';}
        elseif ($actionc=='c'){$SafeIN = explode('<#>',$Bank['sh_inc']);$InS = 'sh_inc';}
        else {echo "��Ǹ, δ���ҵ���Ҫ����Ѷ��";postFooter();exit;}
        
        if ($Bank['savings'] < $SafeIN[1]){echo "<center>���Ĵ��㣬�޷���ȫ���ס�";postFooter();exit;}
        if (!$SafeIN || !$SafeIN[0] || !$SafeIN[1] || !$SafeIN[2] || !$SafeIN[3])
        {echo "<center>��Ǹ, δ���ҵ���Ҫ����Ѷ��";postFooter();exit;}

                $sql = ("SELECT `bank`.`status` AS `status`,`$SafeIN[3]`,`gamename`,`savings`,`cash` FROM `".$GLOBALS['DBPrefix']."phpeb_user_bank` `bank`, `".$GLOBALS['DBPrefix']."phpeb_user_game_info` `game`, `".$GLOBALS['DBPrefix']."phpeb_user_general_info` `gen` WHERE `game`.`username`= `bank`.`username` AND `gen`.`username`= `bank`.`username` AND `bank`.`username`='". $SafeIN[0] ."'");
                $query = mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
                $SafeIN_Dealer = mysql_fetch_array($query);
        
        if (!$SafeIN_Dealer[0] || !$SafeIN_Dealer[1]){echo "<center>��Ǹ, δ���ҵ���Ҫ����Ѷ��";postFooter();exit;}
        else $DealerOUT = explode('<#>',$SafeIN_Dealer[1]);
        
        if ($DealerOUT[0] != $Game['username']){echo "<center>��Ǹ, �Է���ʾ����Ʒ�����۸����ġ�";postFooter();exit;}
        if ($DealerOUT[1] != $SafeIN[1]){echo "<center>��Ǹ, �Է���ʾ�˼�Ǯ�޷���ɽ��ס�";postFooter();exit;}
        if ($DealerOUT[2] != $SafeIN[2]){echo "<center>��Ǹ, �Է���ʾ���ǳ��۴���Ʒ��";postFooter();exit;}
        if ($DealerOUT[3] != $InS){echo "<center>��Ǹ, ���տ��λ�ó���";postFooter();exit;}
        
        //Input Data
        
        unset($sql);
        $sql =        ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_bank` SET `savings` = `savings`-".$SafeIN[1].", `$InS` = '' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
        mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');unset($sql);
        $sql =        ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_bank` SET `savings` = `savings`+".$DealerOUT[1].", `$SafeIN[3]` = '' WHERE `username` = '$SafeIN[0]' LIMIT 1;");
        mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');unset($sql);
        $sql =        ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `$FreeSlot` = '".$SafeIN[2]."' WHERE `username` = '$Game[username]' LIMIT 1;");
        mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');unset($sql);
        $sql = ("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_bank_log` (`time`, `user`, `g_name`, `type`, `amount`, `cash`, `bankamt`, `t_cash`, `t_bankamt`, `target`, `tg_name`, `safehouse`) VALUES ('".$CFU_Time."', '$Pl_Value[USERNAME]', '$Game[gamename]', '6', '$SafeIN[1]', '$Gen[cash]', '".intval($Bank['savings']-$SafeIN[1])."', '$SafeIN_Dealer[cash]', '".intval($SafeIN_Dealer['savings']+$SafeIN[1])."', '$SafeIN[0]', '$SafeIN_Dealer[gamename]', '$Bank[$InS]');");
        mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');unset($sql);
        
        $Message = "����˳����ɣ�";
        
        }
        
        elseif ($actionb=='CancelDeal'){
                
        if ($actionc=='a'){$SafeOUT = explode('<#>',$Bank['sh_outa']);$OutS = 'sh_outa';}
        elseif ($actionc=='b'){$SafeOUT = explode('<#>',$Bank['sh_outb']);$OutS = 'sh_outb';}
        elseif ($actionc=='c'){$SafeOUT = explode('<#>',$Bank['sh_outc']);$OutS = 'sh_outc';}
        else {echo "��Ǹ, δ���ҵ���Ҫ����Ѷ��";postFooter();exit;}
        
        if (!$SafeOUT || !$SafeOUT[0] || !$SafeOUT[1] || !$SafeOUT[2] || !$SafeOUT[3])
        {echo "<center>��Ǹ, δ���ҵ���Ҫ����Ѷ��";postFooter();exit;}


        if (!$Pl_WepB[0]){$FreeSlot = 'wepb';}
        elseif (!$Pl_WepC[0]){$FreeSlot = 'wepc';}
        else {echo "<center>������װ���������ˣ��޷���ֹ���ס�";postFooter();exit;}

                $sql = ("SELECT `gamename` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` WHERE `username`='". $SafeOUT[0] ."'");
                $query = mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
                $SafeOUT_Dealer = mysql_fetch_array($query);

        //Input Data
        
        unset($sql);
        $sql =        ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_bank` SET `$OutS` = '' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
        mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');unset($sql);
        $sql =        ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_bank` SET  `$SafeOUT[3]` = '' WHERE `username` = '$SafeOUT[0]' LIMIT 1;");
        mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');unset($sql);
        $sql =        ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET `$FreeSlot` = '".$SafeOUT[2]."' WHERE `username` = '$Game[username]' LIMIT 1;");
        mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');unset($sql);
        $sql = ("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_bank_log` (`time`, `user`, `g_name`, `type`, `target`, `tg_name`) VALUES ('".$CFU_Time."', '$Pl_Value[USERNAME]', '$Game[gamename]', '7', '$SafeOUT[0]', '$SafeOUT_Dealer[gamename]');");
        mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');unset($sql);
        $Message = "��ֹ������ɣ�";
        }
        
        elseif ($actionb=='RejectDeal'){
        if ($actionc=='a'){$SafeIN = explode('<#>',$Bank['sh_ina']);$InS = 'sh_ina';}
        elseif ($actionc=='b'){$SafeIN = explode('<#>',$Bank['sh_inb']);$InS = 'sh_inb';}
        elseif ($actionc=='c'){$SafeIN = explode('<#>',$Bank['sh_inc']);$InS = 'sh_inc';}
        else {echo "��Ǹ, δ���ҵ���Ҫ����Ѷ��";postFooter();exit;}
        
        if (!$SafeIN || !$SafeIN[0] || !$SafeIN[1] || !$SafeIN[2] || !$SafeIN[3])
        {echo "<center>��Ǹ, δ���ҵ���Ҫ����Ѷ��";postFooter();exit;}

                $sql = ("SELECT `gamename` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` WHERE `username`='". $SafeIN[0] ."'");
                $query = mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
                $SafeIN_Dealer = mysql_fetch_array($query);

        //Input Data
        
        unset($sql);
        $sql =        ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_bank` SET `$InS` = '' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
        mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');unset($sql);
        $sql = ("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_bank_log` (`time`, `user`, `g_name`, `type`, `target`, `tg_name`) VALUES ('".$CFU_Time."', '$Pl_Value[USERNAME]', '$Game[gamename]', '8', '$SafeIN[0]', '$SafeIN_Dealer[gamename]');");
        mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');unset($sql);
        
        $Message = "�ܾ�������ɣ�";
        }
        
        elseif($actionb=='MakeDeal'){
        $price_sell = intval($price_sell);
        if ($sellslot !='wepb' && $sellslot !='wepc'){echo "��Ǹ, δ���ҵ���Ҫ����Ѷ��";postFooter();exit;}
        if ($price_sell <= 0){echo "��Ǹ, ��Ǯ�������������";postFooter();exit;}
        if (!$exch_target){echo "�鷳��������Ŀ�������л������";postFooter();exit;}
        if ($exch_target == $Pl_Value['USERNAME']){echo "�鷳��Ҫ���⵷�ң���л������";postFooter();exit;}
        
        $sql = ("SELECT `bank`.`status` AS `status`, `sh_ina`, `sh_inb`, `sh_inc`, `gamename`, `savings`, `cash` FROM `".$GLOBALS['DBPrefix']."phpeb_user_bank` `bank`, `".$GLOBALS['DBPrefix']."phpeb_user_game_info` `game`, `".$GLOBALS['DBPrefix']."phpeb_user_general_info` `gen` WHERE `game`.`username`= `bank`.`username` AND `gen`.`username`= `bank`.`username` AND `bank`.`username`='$exch_target'");
        $query = mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
        $BankUser = mysql_fetch_array($query);

        if ($BankUser['status'] != '1'){echo "��Ǹ, ��Ŀ�������û����Ч�������ʻ���";postFooter();exit;}
        
        unset($PlaceSlotIN,$PlaceSlotOUT);
        if (!$BankUser['sh_ina']){$PlaceSlotIN = 'sh_ina';}
        elseif (!$BankUser['sh_inb']){$PlaceSlotIN = 'sh_inb';}
        elseif (!$BankUser['sh_inc']){$PlaceSlotIN = 'sh_inc';}
        else {echo "��Ǹ, ��Ŀ������ﱣ�տ��û�пռ��ˡ�";postFooter();exit;}
        
        if (!$Bank['sh_outa']){$PlaceSlotOUT = 'sh_outa';}
        elseif (!$Bank['sh_outb']){$PlaceSlotOUT = 'sh_outb';}
        elseif (!$Bank['sh_outc']){$PlaceSlotOUT = 'sh_outc';}
        else {echo "��Ǹ, ��ֻ��ͬʱ�����������ס�";postFooter();exit;}

        //Input Data
        unset($sql);
        $sql =        ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_bank` SET `$PlaceSlotOUT` = '".$exch_target."<#>".$price_sell."<#>".$Game[$sellslot]."<#>$PlaceSlotIN' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
        mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');unset($sql);
        $sql =        ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_bank` SET  `$PlaceSlotIN` = '".$Pl_Value['USERNAME']."<#>".$price_sell."<#>".$Game[$sellslot]."<#>$PlaceSlotOUT' WHERE `username` = '$exch_target' LIMIT 1;");
        mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');unset($sql);
        $sql =        ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET  `$sellslot` = '0<!>0' WHERE `username` = '$Pl_Value[USERNAME]' LIMIT 1;");
        mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');unset($sql);
        $sql = ("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_user_bank_log` (`time`, `user`, `g_name`, `type`, `target`, `tg_name`) VALUES ('".$CFU_Time."', '$Pl_Value[USERNAME]', '$Game[gamename]', '9', '$exch_target', '$BankUser[gamename]');");
        mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');unset($sql);
        $Message = "��ɽ������ף�";
                }
        else  {$Message = "δ���嶯����";}


        echo "<form action=bank.php?action=SafeHouse method=post name=frmct target=Beta>";
        echo "<input type=hidden value='GUI' name=actionb>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        echo "<form action=gmscrn_main.php?action=proc method=post name=frmreturn target=Alpha>";
        echo "<p align=center style=\"font-size: 16pt\">$Message<br><input type=submit value=\"����\" onClick=\"parent.Beta.location.replace('gen_info.php')\"><input type=submit value=\"����ʹ�ñ��տ�\" onClick=\"frmct.submit()\"></p>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";
        echo "</form>";
        
}
elseif($mode == 'CheckLog' && $actionb >= 0){
        echo "������־��¼<hr>";
        echo "<br>";

        $L_Lim = intval($actionb)*$Bank_SLog_Entries;
        $U_Lim = $L_Lim + $Bank_SLog_Entries;
        
        if ($Gen['acc_status'] >= 0) $SQL = ("SELECT `id`, `time`, `user`, `g_name`, `type`, `amount`, `cash`, `bankamt`, `t_cash`, `t_bankamt`, `target`, `tg_name` FROM `".$GLOBALS['DBPrefix']."phpeb_user_bank_log` WHERE `user` = '$Pl_Value[USERNAME]' OR (`target` = '$Pl_Value[USERNAME]' AND `type` != 4) ORDER BY `time` DESC Limit $L_Lim,$U_Lim");
        else $SQL = ("SELECT `id`, `time`, `user`, `g_name`, `type`, `amount`, `cash`, `bankamt`, `t_cash`, `t_bankamt`, `target`, `tg_name` FROM `".$GLOBALS['DBPrefix']."phpeb_user_bank_log` ORDER BY `time` DESC Limit $L_Lim,$U_Lim");
        
        $SQL_Query = mysql_query($SQL) or die(mysql_error());
        
        echo "<table align=center border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
        
        echo "<form action=bank.php?action=CheckLog method=post name=frmcl target=Beta>";
        echo "<input type=hidden value='".intval($actionb+1)."' name=actionb>";
        echo "<input type=hidden value='' name=log_id>";
        echo "<input type=hidden value='$Pl_Value[USERNAME]' name=Pl_Value[USERNAME]>";
        echo "<input type=hidden value='$Pl_Value[PASSWORD]' name=Pl_Value[PASSWORD]>";
        echo "<input type=hidden name=\"TIMEAUTH\" value=\"$CFU_Time\">";

        echo "<tr align=center><td width=225>����ʱ��</td>";
        echo "<td width=150>֧����</td>";
        echo "<td width=70>����</td>";
        echo "<td width=150>��� ($)</td>";
        echo "<td width=140>�ֽ���N ($)</td>";
        echo "<td width=140>�ʻ����N ($)</td>";
        echo "<td width=150>�����ʺ�</td>";
        echo "</tr>";
        
        function TypeBanking($act){
                switch($act){
                        case 1: $ActionL = '���';break;
                        case 2: $ActionL = '���';break;
                        case 3: $ActionL = '���';break;
                        case 4: $ActionL = 'ͨ��';break;
                        case 5: $ActionL = '����';break;
                        case 6: $ActionL = '��ɽ���';break;
                        case 7: $ActionL = 'ȡ������';break;
                        case 8: $ActionL = '�ܾ�����';break;
                        case 9: $ActionL = '�������';break;
                        default : $ActionL = 'δָ��';break;
                }
        return $ActionL;
        }

while($Logs = mysql_fetch_array($SQL_Query)){
        echo "<tr align=center><td>".cfu_time_convert($Logs['time'])."</td>";
        if ($Gen['acc_status'] < 0) echo "<td>$Logs[g_name]<br>($Logs[user])</td>";
        else echo "<td>$Logs[g_name]</td>";
        if ($Logs['type'] == 6)
        echo "<td style=\"cursor: hand\" onClick=\"frmcl.action='bank.php?action=CheckSHLog';frmcl.log_id.value=$Logs[id];frmcl.submit();\">".TypeBanking($Logs['type'])."</td>";
        else        
        echo "<td>".TypeBanking($Logs['type'])."</td>";
        if (($Logs['type'] >= 7 && $Logs['type'] <= 9))
        echo "<td>N/A</td>";        
        else
        echo "<td>".number_format($Logs['amount'])."</td>";
        if (($Logs['type'] == 3 || $Logs['type'] == 6) && $Logs['target'] == $Pl_Value['USERNAME']){
                echo "<td>".number_format($Logs['t_cash'])."</td>";
                echo "<td>".number_format($Logs['t_bankamt'])."</td>";
        }
        elseif ($Logs['type'] >= 7 && $Logs['type'] <= 9){
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
        }
        else {
                echo "<td>".number_format($Logs['cash'])."</td>";
                echo "<td>".number_format($Logs['bankamt'])."</td>";
        }
        if ($Logs['type'] >= 3) {
                        if ($Gen['acc_status'] < 0) echo "<td>$Logs[tg_name]<br>($Logs[target])</td>";
                        else echo "<td>$Logs[tg_name]</td>";
        }
        else echo "<td>N/A</td>";
        echo "</tr>";        
}
        echo "<tr align=center>";
        echo "<td colspan=7>";
        if (intval($actionb > 0))
        echo "<input type=button value=\"��һҳ\" onClick=\"frmcl.actionb.value='".intval($actionb-1)."';frmcl.submit();\">";
        echo "��<input type=text maxlength=2 style=\"font-size: 10pt; color: #ffffff; background-color: #000000;text-align: center\" size=2 value='".intval($actionb+1)."' onChange=\"frmcl.actionb.value=Math.round(this.value-1);frmcl.submit();\">ҳ";        
        echo "<input type=button value=\"��һҳ\" onClick=\"frmcl.submit();\">";
        echo "</td>";
        echo "</tr>";
        echo "</table>";
        echo "</form>";
}

elseif($mode == 'CheckSHLog' && isset($log_id)){
        echo "���б��տ⽻����Ŀ��¼<hr>";
        echo "<br>";
        $log_id = intval($log_id);
        
                unset($query,$sql,$SafeIN,$SafeIN_Wep,$SafeIN_Dealer,$D_Specs);
                $sql = ("SELECT `g_name`,`tg_name`,`safehouse` FROM `".$GLOBALS['DBPrefix']."phpeb_user_bank_log` WHERE `id` = '".$log_id."'");
                $query = mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
                $SafeInf = mysql_fetch_array($query);
                
                $SafeIN = explode('<#>',$SafeInf['safehouse']);
                $SafeIN_Wep = explode('<!>',$SafeIN[2]);
                                
                $sql = ("SELECT `name`,`atk`,`hit`,`rd`,`enc`,`spec`,`equip` FROM `".$GLOBALS['DBPrefix']."phpeb_sys_wep` WHERE `id` = '". $SafeIN_Wep[0] ."'");
                $query = mysql_query($sql) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
                $SafeIN_Dealer = mysql_fetch_array($query);
                        if ($SafeIN_Wep[2]){
                                if ($SafeIN_Wep[2]==1) $SafeIN_Dealer['name'] = $SafeIN_Wep[3].$SafeIN_Dealer['name']."<sub>?</sub>";
                                else $SafeIN_Dealer['name'] = $SafeIN_Dealer['name'].$SafeIN_Wep[3]."<sub>?</sub>";
                                $SafeIN_Dealer['atk'] += $SafeIN_Wep[4];
                                $SafeIN_Dealer['hit'] += $SafeIN_Wep[5];
                                $SafeIN_Dealer['rd'] += $SafeIN_Wep[6];
                                $SafeIN_Dealer['enc'] = $SafeIN_Wep[7];
                        }
                echo "<table align=center width=200 border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse;font-size: 10pt;\" bordercolor=\"#FFFFFF\">";
                echo "<tr align=center><td colspan=3><b style=\"font-size: 12pt;\">��������: </b></td>";
                echo "</tr><tr valign=top><td>";
        
                echo "����: $SafeInf[tg_name]<br>���: $SafeInf[g_name]<br>����: ".number_format($SafeIN[1])."<br>װ��: $SafeIN_Dealer[name]<br>����: $SafeIN_Wep[1]<br>����: <br>";
                echo "��������: $SafeIN_Dealer[atk]����������: $SafeIN_Dealer[rd]<br>������: $SafeIN_Dealer[hit]������EN����: $SafeIN_Dealer[enc]<br>";
                $D_Specs = ReturnSpecs($SafeIN_Dealer['spec']);
                echo "����Ч��:";
                if ($SafeIN_Dealer['equip']) echo "����װ��<br>";
                if ($SafeIN_Dealer['spec']) echo $D_Specs;
                elseif(!$SafeIN_Dealer['spec'] && !$SafeIN_Dealer['equip']) echo "û���κ�����Ч��<br>";
                echo "</td></tr>";
                echo "</table>";
}


else {echo "δ���嶯����";}
postFooter();exit;
?>