<?php
//-------------------------//-------------------------//-------------------------//
//----------------------------   Core Function Unit   ---------------------------//
//----------------------------   phpeb Version 0.30   ---------------------------//
//---------------------------   Official Open Build    --------------------------//
//-------------------------//-------------------------//-------------------------//
//_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_//
//Detection of Process Time                                //                         //
global $gmcfu_time, $cfu_stime;                                //                         //
$gmcfu_time = explode(' ', microtime());                //    �ⲿ�������趨.         //
$cfu_stime = $gmcfu_time[1] + $gmcfu_time[0];                //    �޸�ǰ��С��,         //
//Register Globals - Provided By winglunk                //    ��Ϊ����ĸ���,         //
if (!ini_get('register_globals'))                        //    ���ܻ�ʹ������ʽ,         //
{extract($_POST);extract($_GET);extract($_SERVER);        //    �޷���������!         //
extract($_FILES);extract($_ENV);extract($_COOKIE);        //                         //
if (isset($_SESSION)){extract($_SESSION);}}                //                         //
error_reporting(1);  //�رղ��ݴ���ر�: PHP5 ����ѡ��        //                         //
//-------------------------//-------------------------//-------------------------//
//Configs - ��Ϸ��ϵͳ�趨

//�汾��Ѷ
global $cSpec, $vBdNum;
$cSpec = '0.30';                                        //�汾����, �汾���ƻ�����ʶ����;, ����ʹ�ùٷ����������, ��������!
$vBdNum = '';                                                //�޶��汾, ͬ��

//��Ѷ�趨
global $sSpec, $WebMasterName, $WebMasterSite;
$sSpec = 'Official Version';                                //�����汾��Ѷ, ����������޸�
$WebMasterName = '��˫';                                //վ������
$WebMasterSite = '';        //������ַ, ���� "$sSpec" ʱ����������ҳ
$bbsurl = 'http://localhost/';                                 //��̳��ַ,����������Ե�ַ��Ĭ�ϵľͲ��ø��ġ�

//Database Configs ���Ͽ��趨
global $DBHost, $DBUser, $DBPass, $DBName, $DBPrefix;

$DBHost = 'localhost';                //���Ͽ�λ��, �� localhost, 127.0.0.1, [url]www.yourdomain.com[/url]
$DBUser = 'root';                     //���Ͽ�ʹ��������
$DBPass = '';                  //���Ͽ�����
$DBName = 'ebfordz';                   //���Ͽ�����
$DBPrefix = 'vsqa_';                //���ϱ�ǰ׺��, ���������!!

//Setting Configs
global $MAX_PLAYERS, $Offline_Time, $TIME_OUT_TIME, $RepairHPCost, $RepairENCost, $OrganizingCost, $HP_BASE_RECOVERY, $EN_BASE_RECOVERY;
global $General_Image_Dir, $Unit_Image_Dir, $Base_Image_Dir, $Org_War_Cost, $Max_Wep_Exp, $ControlSEED;
global $Mod_HP, $Mod_HP_Cost, $Mod_HP_UCost, $Mod_EN, $Mod_EN_Cost, $Mod_EN_UCost,$TFDCostCons;

//�����趨
$TIME_OUT_TIME = 3600;                //��ʱʱ��, ����
$Offline_Time =  600;                //�ж�Ϊ����Ϣ�С�, ���ߵ�ʱ��, ����
$MAX_PLAYERS = 500;                //��¼��������, �����趨���趨Ϊ��, �˲�������Ч
$HP_BASE_RECOVERY = 0;                //HP�����ظ���
$EN_BASE_RECOVERY = 0;                //EN�����ظ���
$OLimit = 250;                        //������������, �����趨���趨Ϊ��, �˲�������Ч

//ͼ��λ���趨
$General_Image_Dir = 'images';        //����ͼƬλ��(����ͼƬ)
$Unit_Image_Dir = 'unitimg';        //����ͼƬλ��
$Base_Image_Dir = 'img1';        //ϵͳͼƬλ��

//�����ȴ�ʱ���趨
$Btl_Intv = 3;                        //ս���ȴ�ʱ��, ���ŷ�������������, �����һ��, �Լ���ϵͳ��Դ����
$Move_Intv = 3;                //�ƶ��ȴ�ʱ��, ����ͼ��Ļ�, ��������һ��, ����ע���սʱ������ʹ��

//�����趨
$BankRqLv = 30;                        //���п�������ȼ� -- ������� 26 ��, �Է�ֹ���� Account ��Ǯ
$BankRqMoney = 1500000;                //���п�������Ҫ�ĳ����ֽ� -- ������� 150��, ԭ��ͬ��
$BankFee = 100000;                //����������
$Bank_SLog_Entries = 30;        //��¼ÿҳ��ʾ����Ŀ, ���鲻Ҫ����30

//��֯����趨
$OrganizingCost = '1000000';        //������֯��Ǯ
$OrganizingFame = '2';                //������֯����Ҫ���� -- �����ߺͶ�����Ҳ���Խ�����֯Ĭ��25
$OrganizingNotor = '-2';        //������֯����Ҫ���� (��Ϊ����) -- �����ߺͶ�����Ҳ���Խ�����֯ 
$Org_War_Cost = 0;                //ս��1Сʱ�����Ǯ

//�����趨
$Max_Wep_Exp = 25000;                //������������

//��������趨
$Max_HP = 30000;                //HP ����, �������%�ظ�HP�Ļ����ǿ�Ļ�����̫��
$Max_EN = 5000;                        //EN ����, ��������EN�ܹ�Ļ�, �������һ��(5000�Ѻܸ�)
//��������趨
$Mod_HP_Cost = 75000;                //��������HP�ļ�Ǯ
$Mod_HP_UCost = 200000;                //��HP������HP�ļ�Ǯ, �����޸ߵĻ�, ���԰��� Set ��һ��
$Mod_EN_Cost = 75000;                //��������EN�ļ�Ǯ, ��������EN�ܹ�Ļ�, �������һ��
$Mod_EN_UCost = 200000;                //��EN������EN�ļ�Ǯ, ͬ��
//���塸�������칤�̡����
$Mod_MS_base_success = 0;        //�����ɹ���, ���� 0 �� 100, �������Ϊ���������100
$Mod_MS_cpt_cost = 250000;        //ÿ�����ֵ���Ľ�Ǯ
$Mod_MS_vpt_cost = 10;                //ÿ�����ֵ����ʤ������
$Mod_MS_cpt_penalty = 0.25;        //ÿ�����ֵ�۳��Ļ����ɹ���(��Ϊ�ٷֱ�, 0.25 �� 0.25%)
$Mod_MS_cpt_bonus = 0.25;        //ÿ���������Ļ����ɹ��ʼӳ�(ͬ��)
//���塸����װ���ϳɹ��̡����
$Mod_MS_pequip_c = 2.5;                //�ɹ���ϵ��, �ɹ��ʵĹ�ʽΪ: ��((100-����ȼ�)*ϵ��/100)*100%��

//���ɿ�����趨
$Hangar_Price = 400000;                //���ɿ�Ĵ��Ǯ(ÿ�μǴ�), ��������õ����, ��Ӽ�...
$Hangar_Limit = 20;                //���ɿ��������(ÿλ���), ���ɿ���ʮ������ϵͳ��Դ��һ��ϵͳ, ���鲻Ҫ̫��

//�����趨
$RepairHPCost = '5';                //�����ظ�1 HP�����Ǯ, 5 ���ڹ��
$RepairENCost = '5';                //�����ظ�1 EN�����Ǯ, 5 ���ڱȽϱ���

//�����趨 - ����
$VPt2AlloyReq = 1000;                //����ʤ�����ֲ��ܶһ�һ���Ͻ�
$AlloyID = '969<!>0';                //�Ͻ�ID (v0.3�� �Ͻ��������ϱ�ID: 969)
$ControlSEED = 1;                //ֻ��Ϊ 0 �� 1 :        0 -> ���������ӳ�����ǿ�ƽ���/���� SEED Mode
                                //                        1 -> �������ӳ�����ǿ�ƽ���/���� SEED Mode, SEED Mode ����SP -- �� v0.24Alpha ��ʼ, php-eb �����ⷽʽ��Ϊ������չ, ����ʹ��!!
                                //������İ�װ����չָ��

$TFDCostCons = 20000;                //����ϳɷ����ļ�Ǯϵ��, ��ʽ: [2^(����)]*��Ǯϵ��

$NotoriousIgnore = -25;                //����(����Ϊ����)��������(���ǰ����������), �Զ�ȡ������������Ҿ���

$ModChType_Cost = 1000000;        //���ָ���ļ۸�

//Chatroom Configs - �������趨
$SpeakIntv = 5;                        //�������ʱ��, ����
$ChatShow = 30;                        //������ʾ����Ŀ
$ChatSave = 0;               //������Ѷ��������, ���÷���ʽ,��(24*3600)��Ϊһ��һҹ, ���趨����Ϊ 0 �����ñ���
$ChatAutoRefresh = 65;                //������Ѷ�Զ�ˢ�µ�����, ���鲻Ҫ�ٹ� 60 ��

//Other System Configs - ����ϵͳ�趨
global $LogEntries, $Show_ptime, $ChatShow, $ChatSave, $ChatAutoRefresh, $StartZoneRestriction, $dbcharset, $BStyleA, $BStyleB;
$NPC_RegKey = '';                //������ע����ֵ, ��Ҫ��SQL Server��������
$Show_ptime = 1;                //��ʾ��ʽ����ʱ��, ��Ϊ 0 ����ʾ
$LogEntries = 5;                //ս����¼��Ŀ����, ������ '0' �� '5', ���������ر�ս����¼ϵͳ, ���������5, ����ϵͳ����
                                //ƽ��������������10�˵Ļ�, �������3������, �Լ�����������
$StartZoneRestriction = 0;        //��ҿ�ʼʱ������, �������, ������Ϊ '0' �� '8'
                                //��Ϊ 0 ʱ�ض����� A1 ��ʼ��Ϸ
                                //��Ϊ 2 ʱ���� A1 �� A3 �������, �������
                                //����Ϊ 5 ʱ���� A1 �� B3 �������, 
                                //��Ϊ 8 ʱ���� A1 �� C3 �������, ��߿���Ϊ8
                                //��ο� register.php Line 233 �� Line 244
$dbcharset = 'GB2312';                //���Ͽ��ŷ�������У�� - ����� php-eb �������
$BStyleA = 'font-size: 10pt; color: #000000; background: url(unitimg/anliu/niu.gif) '; //������İ�ť��ʽ
$BStyleC = 'font-size: 10pt; color: #FFFFFF; background: url(unitimg/anliu/niu2.gif) '; 
$BStyleB = "onmouseover=\"this.style.color='yellow'\" onmouseout=\"this.style.color='000000'\"";        //ͬ��, �����ƹ�ʱ��תɫ���﷨

//Registering Config                //ע���趨
global $CFU_CheckRegKey, $CFU_CheckIP;
$CFU_CheckRegKey = '0';                //If True, Enabled        <-���ע����, 0Ϊ�����, 1Ϊ���, ��ȷ�� Portal ϵͳ����������
$CFU_CheckIP = '0';                //As above                <-���IPλ��, 0Ϊ�����, 1Ϊ���

//Anti Unauthorized Connection Settings
$disabled_AUC = 1;                        //��ֹ����ϵͳ����Ч������: 0Ϊ������ֹ����ϵͳ, 1�ǹرշ�ֹ����ϵͳ
$AUC_Log = "unauthorizedlog.php";        //��ֹ����ϵͳ�ļ�¼������, ����ʹ�á�.php����β

$Allow_AUC = "(vsqa.no\-ip.com|dai\-ngai.net|phpebs.frwonline.com)+";
//��Ϊ��������λ��
//�뵽 index2.php �޸� $HTTP_REFERER ����
//��Regular Expression���, һ���ڡ�(���롸)+��֮������php-eb��Ŀ¼λ�ñ��
//��:        (vsqa.no\-ip.com)+
//        (dai\-ngai.net)+
//        (phpebs.frwonline.com)+
//
//�������һ���ط�, ���������:
//        (vsqa.no\-ip.com|dai\-ngai.net|phpebs.frwonline.com)+
//����ַ��Ŀ¼֮��ӡ�|�������
//���ڡ�-��ǰ���롸\��, ��������
//_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_//
/*
Account Status:
-1: Administrator
0: Normal
1: Quartine        // Not in Use
2: Lock
*/
//_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_//
//Connect

if(empty($NoConnect)){
mysql_connect ($GLOBALS['DBHost'], $GLOBALS['DBUser'], $GLOBALS['DBPass']) or die ('Could not access database because: ' . mysql_error());
if(mysql_get_server_info() > '4.1') {
        global $charset;
        $charset = 'GB2312'; //�ŷ�������У�� - ����� php-eb �������
        if(!$dbcharset && in_array(strtolower($charset), array('GB2312', 'big5', 'utf-8'))) {
                $dbcharset = str_replace('-', '', $charset);
        }
        if($dbcharset) {
                mysql_query("SET NAMES '$dbcharset'");
        }
}
if(mysql_get_server_info() > '5.0.1') {
        mysql_query("SET sql_mode=''");
}

//-------------------------//
//--------Select DB--------//
//-------------------------//

mysql_select_db ($GLOBALS['DBName']);
}
//_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_//

global $ConvColors;
$ConvColors=array(
        "#FFFF00","#FFFF78",
        "#FF0000","#FF2828","#FF5050",
        "#FFBF00","#FFCE3C","#FFDD78",
        "#00FF00","#3CFF3C","#78FF78",
        "#0000FF","#3C3CFF","#7878FF",
        "#FF3CFF","#FF00FF","#E100E1",
        "#FF3CAE","#FF0095","#E10083");

global $ConvGrades;
$ConvGrades=array(
        "ACE",        "S",
        "A+",        "A",        "A-",
        "B+",        "B",        "B-",
        "C+",        "C",        "C-",
        "D+",        "D",        "D-",
        "E+",        "E",        "E-",
        "F+",        "F",        "F-");

global $MainColors;
$MainColors = array(                                                        //Rainbow Swatches By v2Alliance Gary
        "FF5050", "FF2828", "FF0000", "E10000", "C30000", "A50000",         //Red
        "FFDD78", "FFCE3C", "FFBF00", "EBB000", "D7A100", "C39200",         //Orange
        "FFFF78", "FFFF3C", "FFFF00", "EBEB00", "D7D700", "C3C300",         //Yellow
        "78FF78", "3CFF3C", "00FF00", "00E100", "00C300", "00A500",         //Green
        "78FFD2", "3CFFBE", "00FFAA", "00E196", "00C382", "00A56E",         //Light Green
        "78DDFF", "3CCEFF", "00BFFF", "00A9E1", "0092C3", "007CA5",         //Light Blue
        "7878FF", "3C3CFF", "0000FF", "0000E1", "0000C3", "0000A5",         //Blue
        "D278FF", "BE3CFF", "AA00FF", "9600E1", "8200C3", "6E00A5",         //Purple
        "FF78FF", "FF3CFF", "FF00FF", "E100E1", "C300C3", "A500A5",         //Indigo
        "FF78C7", "FF3CAE", "FF0095", "E10083", "C30072", "A50060",         //Violet
);

global $MainRanks;
$MainRanks = array(
'־Ը��','���ȱ�','һ�ȱ�','�ϵȱ�','����',
'��ʿ','��ʿ','��ʿ','�ܳ�','׼ξ',
'��ξ','��ξ','��ξ','��У','��У',
'��У','׼��','�ٽ�','�н�','�����Ͻ�',
'�����Ͻ�','Ԫ˧','��˾��');

global $RightsClass;
$RightsClass = array("Major" => 'ͳ˧',"Leader" => '�ӳ�');

global $CFU_Time;
$CFU_Time=time();
//Start Time Convert Function
function cfu_time_convert($The_Time){
$DateTime = getdate($The_Time);
switch($DateTime['wday']){case 0: $DateTime['wday']='��';break;
case 1: $DateTime['wday']='һ';break;case 2: $DateTime['wday']='��';break;
case 3: $DateTime['wday']='��';break;case 4: $DateTime['wday']='��';break;
case 5: $DateTime['wday']='��';break;case 6: $DateTime['wday']='��';break;
}if (strlen($DateTime['minutes']) == 1){$DateTime['minutes']='0'.$DateTime['minutes'];}
if (strlen($DateTime['seconds']) == 1){$DateTime['seconds']='0'.$DateTime['seconds'];}
if($DateTime['hours'] > 12){$DateTime['period'] = '����';$DateTime['hours']-=12;}
else $DateTime['period'] = '����';
if($DateTime['hours'] == 0){$DateTime['hours']=12;}
$FormatDate = "$DateTime[year]��$DateTime[mon]��$DateTime[mday]��, ����$DateTime[wday], $DateTime[period] $DateTime[hours]:$DateTime[minutes]:$DateTime[seconds]";
return $FormatDate;}
//End Time Convert Function
global $CFU_Date;
$CFU_Date = cfu_time_convert($CFU_Time); //convert the present time

//Anti-Unauthorized Connection
if (!$disabled_AUC){
if (!ereg($Allow_AUC,$HTTP_REFERER)){ //Anti-Direct Connection
echo "Unauthorized Connection Detected<br>Referer: $HTTP_REFERER<br>";
echo "IP: $REMOTE_ADDR Logged<br>";
postFooter();
$contents = '/*'."Date: `$CFU_Date' \n Logged Username: `$Pl_Value[USERNAME]' \t\t Logged Password: `$Pl_Value[PASSWORD]'\n";
$contents .= "IP: `$REMOTE_ADDR' \t\t Referer: `$HTTP_REFERER'\n";
$contents .= "REQUEST_METHOD: `$REQUEST_METHOD' \t\t SCRIPT_FILENAME: `$SCRIPT_FILENAME' \nQUERY_STRING: `$QUERY_STRING '\n";
$contents .= '_______________________________________________________';
$contents .= '_______________________________________________________*/'."\n";
$fp = fopen($AUC_Log,"r+");
fwrite($fp,$contents) or die('123');
fclose($fp);
exit;
}
}
//_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_//

//Update Time
$CFU_TIME_USER = 0;
if (isset($session_un)) $CFU_TIME_USER = "$session_un";
elseif (isset($Pl_Value['USERNAME']))$CFU_TIME_USER="$Pl_Value[USERNAME]";
if ($CFU_TIME_USER){
$CFU_Time_UpDate_Q = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `time2` = '$CFU_Time' WHERE `username` = '$CFU_TIME_USER' LIMIT 1;");
mysql_query($CFU_Time_UpDate_Q);}
//End of Time Updating
function postFooter(){
        $mcfu_time = explode(' ', microtime());
        $cfu_ptime = number_format(($mcfu_time[1] + $mcfu_time[0] - $GLOBALS['cfu_stime']), 6);
        if ($GLOBALS['Show_ptime'])
        echo "<font style=\"font-size: 7pt\"></font></p>";
}
function postHead($withoutbody=''){
                // Date in the past
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                // always modified
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
                // HTTP/1.1
                header("Cache-Control: no-store, no-cache, must-revalidate");
                header("Cache-Control: post-check=0, pre-check=0", false);
                // HTTP/1.0
                header("Pragma: no-cache");
                session_name("php-eb_Session");
                session_set_cookie_params(0,mktime(0,0,0,12,31,2010),"/","php-eb_Gen_Session_hd47ula");
                session_save_path("phpeb_session_dir");
                session_start();
                session_register("session_un");
                session_register("session_pwd");
                session_destroy();
                echo "<html>";
                echo "<head>";
                echo "<meta http-equiv=\"Pragma\" content=\"no-cache\">";
                echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=GB2312\">";
                echo "<title>������е�˴�սOL</title>";
                echo "</head>";
                echo "<style type=\"text/css\">BODY {FONT-SIZE: 10px; FONT-FAMILY: \"Arial\",  \"��ϸ����\"; cursor:default}TD {FONT-SIZE: 9pt; FONT-FAMILY: \"Arial\", \"��ϸ����\"}A:visited {COLOR: #FFFFFF;}</style>";
                if (!$withoutbody) echo "<body bgcolor=\"#000000\" text=#dcdcdc link=#dcdcdc style=\"margin:0px 0px 0px 0px;\" oncontextmenu=\"return false;\">";
                //if (!$withoutbody) echo "<body bgcolor=\"#000000\" text=#dcdcdc link=#dcdcdc style=\"margin:0px 0px 0px 0px;\" style=\"font-family: Arial;font-size: 10pt\">";
}
function AuthUser($U,$P){
                $sql_ugnrli = ("SELECT username, password, acc_status FROM `".$GLOBALS['DBPrefix']."phpeb_user_general_info` WHERE username='". $U ."'");
                $UsrGenrl_Qr = mysql_query ($sql_ugnrli) or die ('����<br>δ�����ӵ�SQL���Ͽ�(PHPEB_ERROR: 001)'.$GLOBALS['DBPrefix'].':' . mysql_error());
                $UsrGenrl = mysql_fetch_array($UsrGenrl_Qr);
                if (!$UsrGenrl['username'] || ($UsrGenrl['password'] != md5($P) && $UsrGenrl['password'] != $P) || $UsrGenrl['username'] != $U){
                echo "<center><br><br>ʹ�������ƻ��������<br><br><a href=\"index2.php\" target='_top' style=\"text-decoration: none\">�ص���ҳ</a>";
                postFooter();
                exit;}
                if ($UsrGenrl['acc_status'] == 2){
                echo "<center><br><br>�ʺű������������Ա���磡<br><br><a href=\"index2.php\" target='_top' style=\"text-decoration: none\">�ص���ҳ</a>";
                postFooter();
                exit;}
}
function GetWeaponDetails($WepId,$AssignedVarible){
global $$AssignedVarible;
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_sys_wep` WHERE id='". $WepId ."'");
$query_r = mysql_query($sql);
$$AssignedVarible = mysql_fetch_array($query_r);
}
function ReturnSpecs($Specs){$SpecsTag='';
if (!$Specs)$SpecsTag='û��';
else{
//Weapon Specs
if(ereg('(DamA)+',$Specs))$SpecsTag .='������<br>';
if(ereg('(DamB)+',$Specs))$SpecsTag .='ս������<br>';
if(ereg('(MobA)+',$Specs))$SpecsTag .='����<br>';
if(ereg('(MobB)+',$Specs))$SpecsTag .='��ǰ<br>';
if(ereg('(MobC)+',$Specs))$SpecsTag .='����<br>';
if(ereg('(MobD)+',$Specs))$SpecsTag .='����<br>';
if(ereg('(Moba)+',$Specs))$SpecsTag .='���ƽ�<br>';
if(ereg('(Mobb)+',$Specs))$SpecsTag .='ǿ���ƽ�<br>';
if(ereg('(Mobc)+',$Specs))$SpecsTag .='��ѻ��ƽ�<br>';
if(ereg('(Mobd)+',$Specs))$SpecsTag .='�߼��ƽ�<br>';
if(ereg('(Mobe)+',$Specs))$SpecsTag .='�����ƽ�<br>';
if(ereg('(TarA)+',$Specs))$SpecsTag .='У׼<br>';
if(ereg('(TarB)+',$Specs))$SpecsTag .='��׼<br>';
if(ereg('(TarC)+',$Specs))$SpecsTag .='����<br>';
if(ereg('(TarD)+',$Specs))$SpecsTag .='Ԥ��<br>';
if(ereg('(Tara)+',$Specs))$SpecsTag .='�Զ�����<br>';
if(ereg('(Tarb)+',$Specs))$SpecsTag .='�߼�У׼<br>';
if(ereg('(Tarc)+',$Specs))$SpecsTag .='����У׼<br>';
if(ereg('(Tard)+',$Specs))$SpecsTag .='��������<br>';
if(ereg('(Tare)+',$Specs))$SpecsTag .='��������<br>';
if(ereg('(DefA)+',$Specs))$SpecsTag .='�򵥷���<br>';
if(ereg('(DefB)+',$Specs))$SpecsTag .='��������<br>';
if(ereg('(DefC)+',$Specs))$SpecsTag .='ǿ������<br>';
if(ereg('(DefD)+',$Specs))$SpecsTag .='�߼�����<br>';
if(ereg('(DefE)+',$Specs))$SpecsTag .='���շ���<br>';
if(ereg('(Defa)+',$Specs))$SpecsTag .='��<br>';
if(ereg('(Defb)+',$Specs))$SpecsTag .='����<br>';
if(ereg('(Defc)+',$Specs))$SpecsTag .='����<br>';
if(ereg('(Defd)+',$Specs))$SpecsTag .='���<br>';
if(ereg('(Defe)+',$Specs))$SpecsTag .='�ռ����λ��<br>';
if(ereg('(PerfDef)+',$Specs))$SpecsTag .='��ȫ����<br>';
if(ereg('(AntiDam)+',$Specs))$SpecsTag .='�Զ��޸�<br>';
if(ereg('(DoubleExp)+',$Specs))$SpecsTag .='����˫��<br>';
if(ereg('(DoubleMon)+',$Specs))$SpecsTag .='��Ǯ˫��<br>';
if(ereg('(DefX)+',$Specs))$SpecsTag .='����<br>';
if(ereg('(AtkA)+',$Specs))$SpecsTag .='�˷�<br>';
if(ereg('(MeltA)+',$Specs))$SpecsTag .='�۽�<br>';
if(ereg('(MeltB)+',$Specs))$SpecsTag .='�۽�<br>';
if(ereg('(Cease)+',$Specs))$SpecsTag .='����<br>';
if(ereg('(AntiPDef)+',$Specs))$SpecsTag .='�ᴩ<br>';
if(ereg('(AntiMobS)+',$Specs))$SpecsTag .='�������<br>';
if(ereg('(AntiTarS)+',$Specs))$SpecsTag .='�״����<br>';
if(ereg('(MirrorDam)+',$Specs))$SpecsTag .='��<br>';
if(ereg('(NTCustom)+',$Specs))$SpecsTag .='������ר��<br>';
if(ereg('(NTRequired)+',$Specs))$SpecsTag .='��Ҫ����������<br>';
if(ereg('(COCustom)+',$Specs))$SpecsTag .='Coordinatorר��<br>';
if(ereg('(PsyRequired)+',$Specs))$SpecsTag .='���ר��<br>';
if(ereg('(SeedMode)+',$Specs))$SpecsTag .='SEED Mode<br>';
if(ereg('(EXAMSystem)+',$Specs))$SpecsTag .='EXAMϵͳ��������<br>';
if(ereg('(CostSP)+',$Specs)){$a = ereg_replace('.*CostSP<','',$Specs);$a = intval($a);$SpecsTag .="����SP($a)<br>";}
//����װ��ר�õ�����Ч��
if(ereg('(HPPcRecA)+',$Specs))$SpecsTag .='HP�ظ�<br>';
if(ereg('(ENPcRecA)+',$Specs))$SpecsTag .='EN�ظ�(С)<br>';
if(ereg('(ENPcRecB)+',$Specs))$SpecsTag .='EN�ظ�(��)<br>';
if(ereg('(ExtHP)+',$Specs)){$a = ereg_replace('.*ExtHP<','',$Specs);$a = intval($a);$SpecsTag .="HP����($a)<br>";}
if(ereg('(ExtEN)+',$Specs)){$a = ereg_replace('.*ExtEN<','',$Specs);$a = intval($a);$SpecsTag .="EN����($a)<br>";}
//Others
if(ereg('(FortressOnly)+',$Specs))$SpecsTag .='Ҫ��ר��<br>';
if(ereg('(RawMaterials)+',$Specs))$SpecsTag .='ԭ��<br>';
if(ereg('(CannotEquip)+',$Specs))$SpecsTag .='�޷�װ��<br>';
//Attacking Type
if(ereg('(DoubleStrike)+',$Specs))$SpecsTag .='������<br>';
if(ereg('(TripleStrike)+',$Specs))$SpecsTag .='������<br>';
if(ereg('(AllWepStirke)+',$Specs))$SpecsTag .='ȫ������<br>';
if(ereg('(CounterStrike)+',$Specs))$SpecsTag .='����<br>';
if(ereg('(FirstStrike)+',$Specs))$SpecsTag .='���ƹ���<br>';

}
return $SpecsTag;
}
function GetMsDetails($MsId,$AssignedVarible){
global $$AssignedVarible;
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_sys_ms` WHERE id='". $MsId ."'");
$query_r = mysql_query($sql);
$$AssignedVarible = mysql_fetch_array($query_r);
}
function GetTactics($TactId='0'){
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_sys_tactics` WHERE id='". $TactId ."'");
$query_r = mysql_query($sql);
return mysql_fetch_array($query_r);
}
function GetUsrDetails($username,$AssignedforGen,$AssignedforGame=''){
global $$AssignedforGen;global $$AssignedforGame;
if ($AssignedforGen){
$sqlgen = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_general_info` WHERE username='". $username ."'");
$query_gen = mysql_query($sqlgen) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');
$$AssignedforGen = mysql_fetch_array($query_gen);}
if ($AssignedforGame){
$sqlgame = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` WHERE username='". $username ."'");
$query_game = mysql_query($sqlgame) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
$$AssignedforGame = mysql_fetch_array($query_game);}
}
function WriteHistory($Con){
$sql = ("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_game_history` (`time`, `history`) VALUES (UNIX_TIMESTAMP(), '$Con');");
mysql_query($sql);
}
function GetUsrLog($username){
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_log` WHERE username='". $username ."'");
$query = mysql_query($sql) or die ('�޷�ȡ�ü�¼��Ѷ, ԭ��:' . mysql_error() . '<br>');
$Results = mysql_fetch_array($query);
return $Results;
}
function GetChType($Chtypeinput){
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` WHERE id='". $Chtypeinput ."'");
$query = mysql_query($sql) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');
$Assigned = mysql_fetch_array($query);
return $Assigned;
}
//End Get ChTypeFunction
//Start Get Organization Infos
function ReturnOrg($Org){
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE id='". $Org ."'");
$query = mysql_query($sql) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');
return mysql_fetch_array($query);
}
//End Get Organization Infos
//Start Get Map Fucntions
function ReturnMType($Type){
switch($Type){
    case 0: $ReturnType = '��������½';break;
    case 1: $ReturnType = 'ɺ��������';break;
    case 2: $ReturnType = '����';break;
    case 3: $ReturnType = '����';break;
    case 4: $ReturnType = 'ֳ����';break;
    case 5: $ReturnType = '����';break;
    case 6: $ReturnType = 'ֱ�����Ӻ�Ͽ';break;
    case 7: $ReturnType = '��˹�ٻ���';break;
    case 8: $ReturnType = '���׶���ԭ';break;
    case 9: $ReturnType = '�����Ⱥ��';break;
    case 10: $ReturnType = 'Ħ����˹�˾���';break;
    case 11: $ReturnType = '����������';break;
    case 12: $ReturnType = '�����ǻ���';break;
    case 13: $ReturnType = '���ػ���1';break;
    case 14: $ReturnType = '���ػ���2';break;
    case 15: $ReturnType = '���ػ���3';break;
    case 16: $ReturnType = '���ػ���4';break;
    case 20: $ReturnType = '�벼����';break;
    case 21: $ReturnType = '�������ߡ���';break;
    case 22: $ReturnType = '���������溣';break;
    case 23: $ReturnType = '���ǻ���';break;
    case 24: $ReturnType = 'SIDE3';break;
    case 25: $ReturnType = '��֮԰';break;
    case 26: $ReturnType = 'L3-X18999';break;
    case 27: $ReturnType = '������۹�';break;
    case 28: $ReturnType = '�춥�ǵ۹�';break;
    
}return $ReturnType;
}
function ReturnMBg($Type){
switch($Type){
    case 0: $ReturnType = '/background/��������½/';break;
    case 1: $ReturnType = '/background/ɺ��������/';break;
    case 2: $ReturnType = '/background/����/';break;
    case 3: $ReturnType = '/background/����/';break;
    case 4: $ReturnType = '/background/ֳ����/';break;
    case 5: $ReturnType = '/background/����/';break;
    case 6: $ReturnType = '/background/ֱ�����Ӻ�Ͽ/';break;
    case 7: $ReturnType = '/background/��˹�ٻ���/';break;
    case 8: $ReturnType = '/background/���׶���ԭ/';break;
    case 9: $ReturnType = '/background/�����Ⱥ��/';break;
    case 10: $ReturnType = '/background/Ħ����˹�˾���/';break;
    case 11: $ReturnType = '/background/����������/';break;
    case 12: $ReturnType = '/background/�����ǻ���/';break;
    case 13: $ReturnType = '/background/���ػ���/';break;
    case 14: $ReturnType = '/background/���ػ���/';break;
    case 15: $ReturnType = '/background/���ػ���/';break;
    case 16: $ReturnType = '/background/���ػ���/';break;
    case 20: $ReturnType = '/background/�벼����/';break;
    case 21: $ReturnType = '/background/�������ߡ���/';break;
    case 22: $ReturnType = '/background/���������溣/';break;
    case 23: $ReturnType = '/background/���ǻ���/';break;
    case 24: $ReturnType = '/background/SIDE3/';break;
    case 25: $ReturnType = '/background/��֮԰/';break;
    case 26: $ReturnType = '/background/L3-X18999/';break;
    case 27: $ReturnType = '/background/������۹�/';break;
    case 28: $ReturnType = '/background/�춥�ǵ۹�/';break;
}return $ReturnType;
}
function ReturnMap($MapID){

$sqls = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_sys_map` WHERE map_id='". $MapID ."'");
$querys = mysql_query($sqls) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');
$Sys = mysql_fetch_array($querys);

$sqlu = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_map` WHERE map_id='". $MapID ."'");
$queryu = mysql_query($sqlu) or die ('�޷�ȡ�û�����Ѷ, ԭ��:' . mysql_error() . '<br>');
$User = mysql_fetch_array($queryu);

return Array("Sys" => $Sys, "User" => $User);
}
//End Get Map Functions
//Start Converting Functions
function rankConvert($Num,$Bold='Bold'){
$NumRanks = count($GLOBALS["MainRanks"]);
$IndF = ($Num / 100000) * 20;
$Index = floor(20 - $IndF);
if ($Index < 0)$Index = 0;
if ($Index > 19)$Index = 19;
$IndF2 = ($Num / 100000) * $NumRanks;
$Index2 = ceil($IndF2);
if ($Index2 < 0)$Index2 = 0;
if ($Index2 > $NumRanks)$Index2 = $NumRanks;
$Index2-=1;
$VarA = $GLOBALS["ConvColors"];
$VarB = $GLOBALS["MainRanks"];
$NVar = "<font style=\"font-weight: $Bold; color: ".$VarA[$Index]."\">".$VarB[$Index2]."</font>";
Return $NVar;
}
function colorConvert($Num,$Max='100'){
if ($Num > $Max)$Num = $Max;
$ClrIndF = $Num / $Max * 20;
$ClrIndex = floor(20 - $ClrIndF);
if ($ClrIndex < 0)$ClrIndex = 0;
if ($ClrIndex > 19)$ClrIndex = 19;
$Var = $GLOBALS["ConvColors"];
Return $Var[$ClrIndex];
}
function gradeConvert($Num,$Max='100'){
if ($Num > $Max)$Num = $Max;
$GrdIndF = $Num / $Max * 20;
$GrdIndex = floor(20 - $GrdIndF);
if ($GrdIndex < 0)$GrdIndex = 0;
if ($GrdIndex > 19)$GrdIndex = 19;
$Var = $GLOBALS["ConvGrades"];
Return $Var[$GrdIndex];
}
function dualConvert($Num,$Max='100',$Bold='Bold'){
if ($Num > $Max)$Num = $Max;
$IndF = $Num / $Max * 20;
$Index = floor(20 - $IndF);
if ($Index < 0)$Index = 0;
if ($Index > 19)$Index = 19;
$VarA = $GLOBALS["ConvColors"];
$VarB = $GLOBALS["ConvGrades"];
$NVar = "<font style=\"font-weight: $Bold; color: ".$VarA[$Index]."\">".$VarB[$Index]."</font>";
Return $NVar;
}
//End Converting Functions

//Start Auto Repairing Function
function AutoRepair($username){
$sqlgame = ("SELECT `msuit`,`time1`,`hp`,`sp`,`en`,`hpmax`,`spmax`,`enmax`,`eqwep`,`status`,`hypermode` FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` a,`".$GLOBALS['DBPrefix']."phpeb_user_general_info` b WHERE a.username='". $username ."' AND a.username=b.username");
$query_game = mysql_query($sqlgame) or die ('�޷�ȡ����Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
$Game = mysql_fetch_array($query_game);
if ($Game['status']){$RepairFlag = 1;}
elseif ($Game['hp'] < $Game['hpmax'] || $Game['sp'] < $Game['spmax'] || $Game['en'] < $Game['enmax']){$RepairFlag = 1;}

if (isset($RepairFlag)){
$Use_Time = time();
$ihp = $Game['hp'];
$isp = $Game['sp'];
$ien = $Game['en'];
$Time_Difference=$Use_Time-$Game['time1'];
if ($Time_Difference >= 3) {
$sql = ("SELECT `hprec`,`enrec` FROM `".$GLOBALS['DBPrefix']."phpeb_sys_ms` WHERE id='". $Game['msuit'] ."'");
$query_r = mysql_query($sql);
$MS = mysql_fetch_array($query_r);

if ($MS['hprec'] >= 1){$Game['hp'] += $Time_Difference*$MS['hprec'];}//Constant HP Recovery
if ($MS['hprec'] < 1 && $MS['hprec'] >= 0.0001){$Game['hp'] += $Time_Difference*($MS['hprec']*$Game['hpmax']);}//Percentage HP Recovery

if ($MS['enrec'] >= 1){$Game['en'] += $Time_Difference*$MS['enrec'];}//Constant EN Recovery
if ($MS['enrec'] < 1 && $MS['enrec'] >= 0.0001){$Game['en'] += $Time_Difference*($MS['enrec']*$Game['enmax']);}//Percentage EN Recovery


if ($Game['eqwep'] != '0<!>0' && $Game['eqwep']){
$Eq_Id = explode('<!>',$Game['eqwep']);
$Eq_Prep = ("SELECT `spec` FROM `".$GLOBALS['DBPrefix']."phpeb_sys_wep` WHERE id='". $Eq_Id[0] ."'");
$Eq_Query = mysql_query($Eq_Prep);
$Eq = mysql_fetch_array($Eq_Query);
if (ereg('(HPPcRecA)+',$Eq['spec']) && $MS['hprec'] >= 1){$Game['hp'] += $Time_Difference*(0.005*$Game['hpmax']);}
if (ereg('(ENPcRecB)+',$Eq['spec']) && $MS['enrec'] >= 1){$Game['en'] += $Time_Difference*(0.015*$Game['enmax']);}
elseif (ereg('(ENPcRecA)+',$Eq['spec']) && $MS['enrec'] >= 1){$Game['en'] += $Time_Difference*(0.0075*$Game['enmax']);}
}

$SP_RecSpd = $Time_Difference * (0.004*$Game['spmax']);
if ($Game['hypermode'] == 2 || $Game['hypermode'] == 6) $SP_RecSpd *= 2;
$Game['sp'] += $SP_RecSpd;

if ($Game['hp'] >= $Game['hpmax'] && $Game['status'] == 1){$Game['status'] = 0;$Game['hp'] = $Game['hpmax'];}
if ($Game['hp'] > $Game['hpmax']) $Game['hp'] = $Game['hpmax'];
if ($Game['en'] > $Game['enmax']) $Game['en'] = $Game['enmax'];
if ($Game['sp'] > $Game['spmax']) $Game['sp'] = $Game['spmax'];
$sqlg = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_game_info` SET ");
$sqlg .=("`hp` = '$Game[hp]' ,");
$sqlg .=("`en` = '$Game[en]' ,");
$sqlg .=("`sp` = '$Game[sp]' ,");
$sqlg .=("`status` = '$Game[status]' WHERE `username` = '$username' LIMIT 1;");
mysql_query($sqlg) or die ('�޷�������Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>');
$sqln = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `time1` = '$Use_Time' WHERE `username` = '$username' LIMIT 1;");
mysql_query($sqln) or die ('�޷�������Ϸ��Ѷ, ԭ��:' . mysql_error() . '<br>����2');
}
}
$Assigned = array("hp" => $Game['hp'],"en" => $Game['en'],"sp" => $Game['sp'],"status" => $Game['status']);
Return $Assigned;
}//End Auto Repairing Function
//Start Status Point Calculation
function CalcStatPt($Prefix,$Lv_N){
$Stat_Gain=3;
for($Lv=1;$Lv<=$Lv_N;$Lv++){
        if ($Lv%5 == 0)$Stat_Gain++;
        }
$AssignmentStat_Gain ="$Prefix".'_Stat_Gain';
global $$AssignmentStat_Gain;
$$AssignmentStat_Gain=$Stat_Gain;
}//EndGain
function CalcStatReq($Prefix,$Stat_N){//Req
$Stat_Req=2;
for($Stat=1;$Stat<=$Stat_N;$Stat++){
        if (($Stat-1)%10 == 0 && $Stat>1)$Stat_Req++;
        }
$AssignmentStat_Req ="$Prefix".'_Stat_Req';
global $$AssignmentStat_Req;
$$AssignmentStat_Req=$Stat_Req;

}//End Stat Point Function




//Start Calc Exp Functions
function CalcExp ($NowLv='',$AssignVar='UserNextLvExp',$ShowFlag=''){
if ($ShowFlag == 1){
        $Lv=1;$Exp=0;
        $i= 0;$n= 0;
        $C[0] = 0;
        echo "Lv --- Exp --- �ܾ���<br>";
        while ($Lv <= 99){

                $n=$i;
                $i = $i + 1;

                if (($Lv%9) == 0){
                $Exp=ceil($Lv*($Lv*2) + $Exp*1.2);}
                elseif(($Lv%33) == 0){
                $Exp=ceil($Lv*($Lv*2.5) + $Exp*2 + 150);}
                else{
                $Exp=ceil($Lv*($Lv*0.5) + $Exp*1.05015781);
                }
                if($Lv >= 90){
                $Exp=ceil($Exp*1.035 + 150);}
                $ShowExp =number_format($Exp);
                echo "$Lv --- $ShowExp --- ";

                $D=$Exp + $C[$n];
                $C[$i]=$D;
                $ShowD = number_format($D);
                echo "$ShowD<br>";
                $Lv=$Lv + 1;
                if ($Lv%50 == 0){
                        echo "Lv --- Exp --- �ܾ���<br>";
                        }

                }
                echo "$C[1]";
        }
else        {
        $Lv=1;
        $Exp=0;
        $i= 0;
        $n= 0;
        global $$AssignVar;

        while ($Lv <= $NowLv){

                $n=$i;
                $i = $i + 1;

                if (($Lv%9) == 0){
                $Exp=ceil($Lv*($Lv*2) + $Exp*1.2);}
                elseif(($Lv%33) == 0){
                $Exp=ceil($Lv*($Lv*2.5) + $Exp*2 + 150);}
                else{
                $Exp=ceil($Lv*($Lv*0.5) + $Exp*1.05015781);
                }
                if($Lv >= 90){
                $Exp=ceil($Exp*1.035 + 150);}

                $D=$Exp + $C[$n];
                $C[$i]=$D;
                if ($Lv == $NowLv) $$AssignVar = $Exp;
                $Lv=$Lv + 1;

                }
}
}//EndOfOldCalcFunction

?>