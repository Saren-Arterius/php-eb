<?php
//-------------------------//-------------------------//-------------------------//
//----------------------------   Core Function Unit   ---------------------------//
//----------------------------   phpeb Version 0.30   ---------------------------//
//---------------------------   Official Open Build    --------------------------//
//-------------------------//-------------------------//-------------------------//
//_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_//
//Detection of Process Time                                //                         //
global $gmcfu_time, $cfu_stime;                                //                         //
$gmcfu_time = explode(' ', microtime());                //    这部份无需设定.         //
$cfu_stime = $gmcfu_time[1] + $gmcfu_time[0];                //    修改前请小心,         //
//Register Globals - Provided By winglunk                //    因为错误的更改,         //
if (!ini_get('register_globals'))                        //    可能会使整个程式,         //
{extract($_POST);extract($_GET);extract($_SERVER);        //    无法正常运作!         //
extract($_FILES);extract($_ENV);extract($_COOKIE);        //                         //
if (isset($_SESSION)){extract($_SESSION);}}                //                         //
error_reporting(1);  //关闭部份错误回报: PHP5 建议选项        //                         //
//-------------------------//-------------------------//-------------------------//
//Configs - 游戏及系统设定

//版本资讯
global $cSpec, $vBdNum;
$cSpec = '0.30';                                        //版本名称, 版本名称会用作识别用途, 如想使用官方插件、更新, 请避免更改!
$vBdNum = '';                                                //修订版本, 同上

//资讯设定
global $sSpec, $WebMasterName, $WebMasterSite;
$sSpec = 'Official Version';                                //其他版本资讯, 这项可自由修改
$WebMasterName = '无双';                                //站长名称
$WebMasterSite = '';        //网名网址, 按下 "$sSpec" 时所开启的网页
$bbsurl = 'http://localhost/';                                 //论坛地址,可以输入绝对地址。默认的就不用更改。

//Database Configs 资料库设定
global $DBHost, $DBUser, $DBPass, $DBName, $DBPrefix;

$DBHost = 'localhost';                //资料库位置, 如 localhost, 127.0.0.1, [url]www.yourdomain.com[/url]
$DBUser = 'root';                     //资料库使用者名称
$DBPass = '';                  //资料库密码
$DBName = 'ebfordz';                   //资料库名称
$DBPrefix = 'vsqa_';                //资料表前缀名, 不建议更改!!

//Setting Configs
global $MAX_PLAYERS, $Offline_Time, $TIME_OUT_TIME, $RepairHPCost, $RepairENCost, $OrganizingCost, $HP_BASE_RECOVERY, $EN_BASE_RECOVERY;
global $General_Image_Dir, $Unit_Image_Dir, $Base_Image_Dir, $Org_War_Cost, $Max_Wep_Exp, $ControlSEED;
global $Mod_HP, $Mod_HP_Cost, $Mod_HP_UCost, $Mod_EN, $Mod_EN_Cost, $Mod_EN_UCost,$TFDCostCons;

//基本设定
$TIME_OUT_TIME = 3600;                //逾时时间, 秒数
$Offline_Time =  600;                //判定为「休息中」, 离线的时间, 秒数
$MAX_PLAYERS = 500;                //登录人数上限, 若不设定或设定为零, 此参数则无效
$HP_BASE_RECOVERY = 0;                //HP基本回复率
$EN_BASE_RECOVERY = 0;                //EN基本回复率
$OLimit = 250;                        //上线人数上限, 若不设定或设定为零, 此参数则无效

//图像位置设定
$General_Image_Dir = 'images';        //基本图片位置(背景图片)
$Unit_Image_Dir = 'unitimg';        //机体图片位置
$Base_Image_Dir = 'img1';        //系统图片位置

//基本等待时间设定
$Btl_Intv = 3;                        //战斗等待时间, 若伺服器上线人数多, 请设大一点, 以减少系统资源消耗
$Move_Intv = 3;                //移动等待时间, 若版图大的话, 可以设少一点, 但请注意国战时工厂的使用

//银行设定
$BankRqLv = 30;                        //银行开户所需等级 -- 建议高于 26 级, 以防止多重 Account 倒钱
$BankRqMoney = 1500000;                //银行开户所需要的持有现金 -- 建议高于 150万, 原因同上
$BankFee = 100000;                //开户手续费
$Bank_SLog_Entries = 30;        //纪录每页显示的数目, 建议不要超过30

//组织相关设定
$OrganizingCost = '1000000';        //建立组织价钱
$OrganizingFame = '2';                //建立组织所需要名声 -- 名声高和恶名高也可以建立组织默认25
$OrganizingNotor = '-2';        //建立组织所需要恶名 (需为负数) -- 名声高和恶名高也可以建立组织 
$Org_War_Cost = 0;                //战争1小时所需价钱

//武器设定
$Max_Wep_Exp = 25000;                //武器经验上限

//机体相关设定
$Max_HP = 30000;                //HP 上限, 如果不想%回复HP的机体过强的话别设太高
$Max_EN = 5000;                        //EN 上限, 如果附款回EN很贵的话, 可以设高一点(5000已很高)
//机体改造设定
$Mod_HP_Cost = 75000;                //基本改造HP的价钱
$Mod_HP_UCost = 200000;                //高HP量改造HP的价钱, 如上限高的话, 可以把这 Set 高一点
$Mod_EN_Cost = 75000;                //基本改造EN的价钱, 如果附款回EN很贵的话, 可以设低一点
$Mod_EN_UCost = 200000;                //高EN量改造EN的价钱, 同上
//机体「基本改造工程」相关
$Mod_MS_base_success = 0;        //基本成功率, 建议 0 至 100, 但亦可设为负数或大于100
$Mod_MS_cpt_cost = 250000;        //每点改造值所耗金钱
$Mod_MS_vpt_cost = 10;                //每点改造值所耗胜利积分
$Mod_MS_cpt_penalty = 0.25;        //每点改造值扣除的基本成功率(此为百分比, 0.25 即 0.25%)
$Mod_MS_cpt_bonus = 0.25;        //每点改造点数的基本成功率加成(同上)
//机体「机体装备合成工程」相关
$Mod_MS_pequip_c = 2.5;                //成功率系数, 成功率的公式为: 「((100-机体等级)*系数/100)*100%」

//格纳库相关设定
$Hangar_Price = 400000;                //格纳库寄存价钱(每次记存), 如出现滥用的情况, 请加价...
$Hangar_Limit = 20;                //格纳库机体上限(每位玩家), 格纳库是十分消耗系统资源的一个系统, 建议不要太多

//修理设定
$RepairHPCost = '5';                //工厂回复1 HP所需价钱, 5 属于贵的
$RepairENCost = '5';                //工厂回复1 EN所需价钱, 5 属于比较便宜

//其他设定 - 基本
$VPt2AlloyReq = 1000;                //多少胜利绩分才能兑换一个合金
$AlloyID = '969<!>0';                //合金ID (v0.3版 合金武器资料表ID: 969)
$ControlSEED = 1;                //只能为 0 或 1 :        0 -> 不允许种子持有者强制进入/脱离 SEED Mode
                                //                        1 -> 允许种子持有者强制进入/脱离 SEED Mode, SEED Mode 消耗SP -- 由 v0.24Alpha 开始, php-eb 就以这方式作为基础发展, 建议使用!!
                                //详情参阅安装及发展指引

$TFDCostCons = 20000;                //购买合成方法的价钱系数, 公式: [2^(级数)]*价钱系数

$NotoriousIgnore = -25;                //名声(负数为恶名)多少以下(不是包括这个数字), 自动取消攻击在线玩家警告

$ModChType_Cost = 1000000;        //人种改造的价格

//Chatroom Configs - 聊天室设定
$SpeakIntv = 5;                        //发言相隔时间, 秒数
$ChatShow = 30;                        //聊天显示的数目
$ChatSave = 0;               //聊天资讯保留秒数, 可用方程式,「(24*3600)」为一日一夜, 不设定或设为 0 会永久保留
$ChatAutoRefresh = 65;                //聊天资讯自动刷新的秒数, 建议不要少过 60 秒

//Other System Configs - 其他系统设定
global $LogEntries, $Show_ptime, $ChatShow, $ChatSave, $ChatAutoRefresh, $StartZoneRestriction, $dbcharset, $BStyleA, $BStyleB;
$NPC_RegKey = '';                //无限型注册码值, 需要到SQL Server自行制作
$Show_ptime = 1;                //显示程式运作时间, 设为 0 则不显示
$LogEntries = 5;                //战斗纪录数目上限, 请输入 '0' 至 '5', 输入零则会关闭战斗纪录系统, 请勿设大于5, 以免系统出错
                                //平均在线人数多于10人的话, 建议减至3则以下, 以减低资料消耗
$StartZoneRestriction = 0;        //玩家开始时的区域, 随机分区, 可以设为 '0' 至 '8'
                                //设为 0 时必定会在 A1 开始游戏
                                //设为 2 时会在 A1 至 A3 随机出现, 如此类推
                                //如设为 5 时会在 A1 至 B3 随机出现, 
                                //设为 8 时会在 A1 至 C3 随机出现, 最高可设为8
                                //请参考 register.php Line 233 至 Line 244
$dbcharset = 'GB2312';                //资料库伺服器文字校对 - 繁体版 php-eb 无需更改
$BStyleA = 'font-size: 10pt; color: #000000; background: url(unitimg/anliu/niu.gif) '; //主画面的按钮样式
$BStyleC = 'font-size: 10pt; color: #FFFFFF; background: url(unitimg/anliu/niu2.gif) '; 
$BStyleB = "onmouseover=\"this.style.color='yellow'\" onmouseout=\"this.style.color='000000'\"";        //同上, 滑鼠移过时会转色的语法

//Registering Config                //注册设定
global $CFU_CheckRegKey, $CFU_CheckIP;
$CFU_CheckRegKey = '0';                //If True, Enabled        <-检查注册码, 0为不检查, 1为检查, 请确认 Portal 系统正常运作中
$CFU_CheckIP = '0';                //As above                <-检查IP位置, 0为不检查, 1为检查

//Anti Unauthorized Connection Settings
$disabled_AUC = 1;                        //防止盗连系统的无效化参数: 0为开启防止盗连系统, 1是关闭防止盗连系统
$AUC_Log = "unauthorizedlog.php";        //防止盗连系统的纪录档名称, 建议使用「.php」结尾

$Allow_AUC = "(vsqa.no\-ip.com|dai\-ngai.net|phpebs.frwonline.com)+";
//此为正常连线位置
//请到 index2.php 修改 $HTTP_REFERER 参数
//以Regular Expression表达, 一般于「(」与「)+」之间输入php-eb的目录位置便可
//如:        (vsqa.no\-ip.com)+
//        (dai\-ngai.net)+
//        (phpebs.frwonline.com)+
//
//如想多于一个地方, 请如此输入:
//        (vsqa.no\-ip.com|dai\-ngai.net|phpebs.frwonline.com)+
//在网址或目录之间加「|」便可以
//请在「-」前加入「\」, 否则会出错
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
        $charset = 'GB2312'; //伺服器文字校对 - 繁体版 php-eb 无需更改
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
'志愿兵','二等兵','一等兵','上等兵','兵长',
'下士','中士','上士','曹长','准尉',
'少尉','中尉','上尉','少校','中校',
'上校','准将','少将','中将','四星上将',
'五星上将','元帅','总司令');

global $RightsClass;
$RightsClass = array("Major" => '统帅',"Leader" => '队长');

global $CFU_Time;
$CFU_Time=time();
//Start Time Convert Function
function cfu_time_convert($The_Time){
$DateTime = getdate($The_Time);
switch($DateTime['wday']){case 0: $DateTime['wday']='日';break;
case 1: $DateTime['wday']='一';break;case 2: $DateTime['wday']='二';break;
case 3: $DateTime['wday']='三';break;case 4: $DateTime['wday']='四';break;
case 5: $DateTime['wday']='五';break;case 6: $DateTime['wday']='六';break;
}if (strlen($DateTime['minutes']) == 1){$DateTime['minutes']='0'.$DateTime['minutes'];}
if (strlen($DateTime['seconds']) == 1){$DateTime['seconds']='0'.$DateTime['seconds'];}
if($DateTime['hours'] > 12){$DateTime['period'] = '下午';$DateTime['hours']-=12;}
else $DateTime['period'] = '上午';
if($DateTime['hours'] == 0){$DateTime['hours']=12;}
$FormatDate = "$DateTime[year]年$DateTime[mon]月$DateTime[mday]日, 星期$DateTime[wday], $DateTime[period] $DateTime[hours]:$DateTime[minutes]:$DateTime[seconds]";
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
                echo "<title>超级机械人大战OL</title>";
                echo "</head>";
                echo "<style type=\"text/css\">BODY {FONT-SIZE: 10px; FONT-FAMILY: \"Arial\",  \"新细明体\"; cursor:default}TD {FONT-SIZE: 9pt; FONT-FAMILY: \"Arial\", \"新细明体\"}A:visited {COLOR: #FFFFFF;}</style>";
                if (!$withoutbody) echo "<body bgcolor=\"#000000\" text=#dcdcdc link=#dcdcdc style=\"margin:0px 0px 0px 0px;\" oncontextmenu=\"return false;\">";
                //if (!$withoutbody) echo "<body bgcolor=\"#000000\" text=#dcdcdc link=#dcdcdc style=\"margin:0px 0px 0px 0px;\" style=\"font-family: Arial;font-size: 10pt\">";
}
function AuthUser($U,$P){
                $sql_ugnrli = ("SELECT username, password, acc_status FROM `".$GLOBALS['DBPrefix']."phpeb_user_general_info` WHERE username='". $U ."'");
                $UsrGenrl_Qr = mysql_query ($sql_ugnrli) or die ('错误！<br>未能连接到SQL资料库(PHPEB_ERROR: 001)'.$GLOBALS['DBPrefix'].':' . mysql_error());
                $UsrGenrl = mysql_fetch_array($UsrGenrl_Qr);
                if (!$UsrGenrl['username'] || ($UsrGenrl['password'] != md5($P) && $UsrGenrl['password'] != $P) || $UsrGenrl['username'] != $U){
                echo "<center><br><br>使用者名称或密码错误。<br><br><a href=\"index2.php\" target='_top' style=\"text-decoration: none\">回到首页</a>";
                postFooter();
                exit;}
                if ($UsrGenrl['acc_status'] == 2){
                echo "<center><br><br>帐号被锁，请与管理员联络！<br><br><a href=\"index2.php\" target='_top' style=\"text-decoration: none\">回到首页</a>";
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
if (!$Specs)$SpecsTag='没有';
else{
//Weapon Specs
if(ereg('(DamA)+',$Specs))$SpecsTag .='机体损坏<br>';
if(ereg('(DamB)+',$Specs))$SpecsTag .='战斗不能<br>';
if(ereg('(MobA)+',$Specs))$SpecsTag .='加速<br>';
if(ereg('(MobB)+',$Specs))$SpecsTag .='超前<br>';
if(ereg('(MobC)+',$Specs))$SpecsTag .='闪避<br>';
if(ereg('(MobD)+',$Specs))$SpecsTag .='逃离<br>';
if(ereg('(Moba)+',$Specs))$SpecsTag .='简单推进<br>';
if(ereg('(Mobb)+',$Specs))$SpecsTag .='强力推进<br>';
if(ereg('(Mobc)+',$Specs))$SpecsTag .='最佳化推进<br>';
if(ereg('(Mobd)+',$Specs))$SpecsTag .='高级推进<br>';
if(ereg('(Mobe)+',$Specs))$SpecsTag .='极级推进<br>';
if(ereg('(TarA)+',$Specs))$SpecsTag .='校准<br>';
if(ereg('(TarB)+',$Specs))$SpecsTag .='瞄准<br>';
if(ereg('(TarC)+',$Specs))$SpecsTag .='集中<br>';
if(ereg('(TarD)+',$Specs))$SpecsTag .='预测<br>';
if(ereg('(Tara)+',$Specs))$SpecsTag .='自动锁定<br>';
if(ereg('(Tarb)+',$Specs))$SpecsTag .='高级校准<br>';
if(ereg('(Tarc)+',$Specs))$SpecsTag .='无误校准<br>';
if(ereg('(Tard)+',$Specs))$SpecsTag .='多重锁定<br>';
if(ereg('(Tare)+',$Specs))$SpecsTag .='完美锁定<br>';
if(ereg('(DefA)+',$Specs))$SpecsTag .='简单防御<br>';
if(ereg('(DefB)+',$Specs))$SpecsTag .='正常防御<br>';
if(ereg('(DefC)+',$Specs))$SpecsTag .='强化防御<br>';
if(ereg('(DefD)+',$Specs))$SpecsTag .='高级防御<br>';
if(ereg('(DefE)+',$Specs))$SpecsTag .='最终防御<br>';
if(ereg('(Defa)+',$Specs))$SpecsTag .='格挡<br>';
if(ereg('(Defb)+',$Specs))$SpecsTag .='抗衡<br>';
if(ereg('(Defc)+',$Specs))$SpecsTag .='干涉<br>';
if(ereg('(Defd)+',$Specs))$SpecsTag .='坚壁<br>';
if(ereg('(Defe)+',$Specs))$SpecsTag .='空间相对位移<br>';
if(ereg('(PerfDef)+',$Specs))$SpecsTag .='完全防御<br>';
if(ereg('(AntiDam)+',$Specs))$SpecsTag .='自动修复<br>';
if(ereg('(DoubleExp)+',$Specs))$SpecsTag .='经验双倍<br>';
if(ereg('(DoubleMon)+',$Specs))$SpecsTag .='金钱双倍<br>';
if(ereg('(DefX)+',$Specs))$SpecsTag .='底力<br>';
if(ereg('(AtkA)+',$Specs))$SpecsTag .='兴奋<br>';
if(ereg('(MeltA)+',$Specs))$SpecsTag .='熔解<br>';
if(ereg('(MeltB)+',$Specs))$SpecsTag .='熔解<br>';
if(ereg('(Cease)+',$Specs))$SpecsTag .='禁锢<br>';
if(ereg('(AntiPDef)+',$Specs))$SpecsTag .='贯穿<br>';
if(ereg('(AntiMobS)+',$Specs))$SpecsTag .='网络干扰<br>';
if(ereg('(AntiTarS)+',$Specs))$SpecsTag .='雷达干扰<br>';
if(ereg('(MirrorDam)+',$Specs))$SpecsTag .='镜<br>';
if(ereg('(NTCustom)+',$Specs))$SpecsTag .='新人类专用<br>';
if(ereg('(NTRequired)+',$Specs))$SpecsTag .='需要新人类力量<br>';
if(ereg('(COCustom)+',$Specs))$SpecsTag .='Coordinator专用<br>';
if(ereg('(PsyRequired)+',$Specs))$SpecsTag .='念动力专用<br>';
if(ereg('(SeedMode)+',$Specs))$SpecsTag .='SEED Mode<br>';
if(ereg('(EXAMSystem)+',$Specs))$SpecsTag .='EXAM系统启动可能<br>';
if(ereg('(CostSP)+',$Specs)){$a = ereg_replace('.*CostSP<','',$Specs);$a = intval($a);$SpecsTag .="消耗SP($a)<br>";}
//辅助装备专用的特殊效果
if(ereg('(HPPcRecA)+',$Specs))$SpecsTag .='HP回复<br>';
if(ereg('(ENPcRecA)+',$Specs))$SpecsTag .='EN回复(小)<br>';
if(ereg('(ENPcRecB)+',$Specs))$SpecsTag .='EN回复(大)<br>';
if(ereg('(ExtHP)+',$Specs)){$a = ereg_replace('.*ExtHP<','',$Specs);$a = intval($a);$SpecsTag .="HP附加($a)<br>";}
if(ereg('(ExtEN)+',$Specs)){$a = ereg_replace('.*ExtEN<','',$Specs);$a = intval($a);$SpecsTag .="EN附加($a)<br>";}
//Others
if(ereg('(FortressOnly)+',$Specs))$SpecsTag .='要塞专用<br>';
if(ereg('(RawMaterials)+',$Specs))$SpecsTag .='原料<br>';
if(ereg('(CannotEquip)+',$Specs))$SpecsTag .='无法装备<br>';
//Attacking Type
if(ereg('(DoubleStrike)+',$Specs))$SpecsTag .='二连击<br>';
if(ereg('(TripleStrike)+',$Specs))$SpecsTag .='三连击<br>';
if(ereg('(AllWepStirke)+',$Specs))$SpecsTag .='全弹发射<br>';
if(ereg('(CounterStrike)+',$Specs))$SpecsTag .='反击<br>';
if(ereg('(FirstStrike)+',$Specs))$SpecsTag .='先制攻击<br>';

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
$query_gen = mysql_query($sqlgen) or die ('无法取得基本资讯, 原因:' . mysql_error() . '<br>');
$$AssignedforGen = mysql_fetch_array($query_gen);}
if ($AssignedforGame){
$sqlgame = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_game_info` WHERE username='". $username ."'");
$query_game = mysql_query($sqlgame) or die ('无法取得游戏资讯, 原因:' . mysql_error() . '<br>');
$$AssignedforGame = mysql_fetch_array($query_game);}
}
function WriteHistory($Con){
$sql = ("INSERT INTO `".$GLOBALS['DBPrefix']."phpeb_game_history` (`time`, `history`) VALUES (UNIX_TIMESTAMP(), '$Con');");
mysql_query($sql);
}
function GetUsrLog($username){
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_log` WHERE username='". $username ."'");
$query = mysql_query($sql) or die ('无法取得纪录资讯, 原因:' . mysql_error() . '<br>');
$Results = mysql_fetch_array($query);
return $Results;
}
function GetChType($Chtypeinput){
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_sys_chtype` WHERE id='". $Chtypeinput ."'");
$query = mysql_query($sql) or die ('无法取得基本资讯, 原因:' . mysql_error() . '<br>');
$Assigned = mysql_fetch_array($query);
return $Assigned;
}
//End Get ChTypeFunction
//Start Get Organization Infos
function ReturnOrg($Org){
$sql = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_organization` WHERE id='". $Org ."'");
$query = mysql_query($sql) or die ('无法取得基本资讯, 原因:' . mysql_error() . '<br>');
return mysql_fetch_array($query);
}
//End Get Organization Infos
//Start Get Map Fucntions
function ReturnMType($Type){
switch($Type){
    case 0: $ReturnType = '格陵兰大陆';break;
    case 1: $ReturnType = '珊瑚海海域';break;
    case 2: $ReturnType = '空中';break;
    case 3: $ReturnType = '宇宙';break;
    case 4: $ReturnType = '殖民星';break;
    case 5: $ReturnType = '月面';break;
    case 6: $ReturnType = '直布罗陀海峡';break;
    case 7: $ReturnType = '休斯顿基地';break;
    case 8: $ReturnType = '帕米尔高原';break;
    case 9: $ReturnType = '设德兰群岛';break;
    case 10: $ReturnType = '摩尔曼斯克军港';break;
    case 11: $ReturnType = '乞力马扎罗';break;
    case 12: $ReturnType = '东南亚基地';break;
    case 13: $ReturnType = '神秘基地1';break;
    case 14: $ReturnType = '神秘基地2';break;
    case 15: $ReturnType = '神秘基地3';break;
    case 16: $ReturnType = '神秘基地4';break;
    case 20: $ReturnType = '冯布朗市';break;
    case 21: $ReturnType = '阿·巴瓦·库';break;
    case 22: $ReturnType = '所罗门宇宙海';break;
    case 23: $ReturnType = '火星基地';break;
    case 24: $ReturnType = 'SIDE3';break;
    case 25: $ReturnType = '茨之园';break;
    case 26: $ReturnType = 'L3-X18999';break;
    case 27: $ReturnType = '迈锡尼帝国';break;
    case 28: $ReturnType = '天顶星帝国';break;
    
}return $ReturnType;
}
function ReturnMBg($Type){
switch($Type){
    case 0: $ReturnType = '/background/格陵兰大陆/';break;
    case 1: $ReturnType = '/background/珊瑚海海域/';break;
    case 2: $ReturnType = '/background/空中/';break;
    case 3: $ReturnType = '/background/宇宙/';break;
    case 4: $ReturnType = '/background/殖民星/';break;
    case 5: $ReturnType = '/background/月面/';break;
    case 6: $ReturnType = '/background/直布罗陀海峡/';break;
    case 7: $ReturnType = '/background/休斯顿基地/';break;
    case 8: $ReturnType = '/background/帕米尔高原/';break;
    case 9: $ReturnType = '/background/设德兰群岛/';break;
    case 10: $ReturnType = '/background/摩尔曼斯克军港/';break;
    case 11: $ReturnType = '/background/乞力马扎罗/';break;
    case 12: $ReturnType = '/background/东南亚基地/';break;
    case 13: $ReturnType = '/background/神秘基地/';break;
    case 14: $ReturnType = '/background/神秘基地/';break;
    case 15: $ReturnType = '/background/神秘基地/';break;
    case 16: $ReturnType = '/background/神秘基地/';break;
    case 20: $ReturnType = '/background/冯布朗市/';break;
    case 21: $ReturnType = '/background/阿·巴瓦·库/';break;
    case 22: $ReturnType = '/background/所罗门宇宙海/';break;
    case 23: $ReturnType = '/background/火星基地/';break;
    case 24: $ReturnType = '/background/SIDE3/';break;
    case 25: $ReturnType = '/background/茨之园/';break;
    case 26: $ReturnType = '/background/L3-X18999/';break;
    case 27: $ReturnType = '/background/迈锡尼帝国/';break;
    case 28: $ReturnType = '/background/天顶星帝国/';break;
}return $ReturnType;
}
function ReturnMap($MapID){

$sqls = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_sys_map` WHERE map_id='". $MapID ."'");
$querys = mysql_query($sqls) or die ('无法取得基本资讯, 原因:' . mysql_error() . '<br>');
$Sys = mysql_fetch_array($querys);

$sqlu = ("SELECT * FROM `".$GLOBALS['DBPrefix']."phpeb_user_map` WHERE map_id='". $MapID ."'");
$queryu = mysql_query($sqlu) or die ('无法取得基本资讯, 原因:' . mysql_error() . '<br>');
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
$query_game = mysql_query($sqlgame) or die ('无法取得游戏资讯, 原因:' . mysql_error() . '<br>');
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
mysql_query($sqlg) or die ('无法更新游戏资讯, 原因:' . mysql_error() . '<br>');
$sqln = ("UPDATE `".$GLOBALS['DBPrefix']."phpeb_user_general_info` SET `time1` = '$Use_Time' WHERE `username` = '$username' LIMIT 1;");
mysql_query($sqln) or die ('无法更新游戏资讯, 原因:' . mysql_error() . '<br>错误2');
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
        echo "Lv --- Exp --- 总经验<br>";
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
                        echo "Lv --- Exp --- 总经验<br>";
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