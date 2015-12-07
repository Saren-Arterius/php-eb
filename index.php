<?
include("cfu.php");
postHead('1');
?>
<script language='JavaScript'>
function startgame(destination) {
window.open(destination,'Alpha','top=20,left=50,width=800,height=620');
window.opener=null;
window.close();
}
</script>
<body bgcolor="#000000" text="#FFFFFF" leftmargin="0" topmargin="2" marginwidth="0" marginheight="0">
<table width="649" height="579" border="0" align="center" cellpadding="0" cellspacing="0" id="__01">
  <tr>
    <td colspan="3"> <img src="begin/images/begin_01.gif" width="649" height="374" alt=""></td>
  </tr>
  <tr>
    <td rowspan="2"> <img src="begin/images/begin_02.gif" width="228" height="205" alt=""></td>
    <td width="156" height="49" background="begin/images/begin_03.gif"><div align="center">
      <input name="button" type=button onClick=startgame('index2.php') value="¿ªÊ¼ÓÎÏ·"> 
    </div></td>
    <td rowspan="2"> <img src="begin/images/begin_04.gif" width="265" height="205" alt=""></td>
  </tr>
  <tr>
    <td> <img src="begin/images/begin_05.gif" width="156" height="156" alt=""></td>
  </tr>
</table>
</body>
</html>
<?
exit;
echo "		<frameset rows=\"50%,*\" frameborder=\"no\" border=\"0\" framespacing=\"0\">
		<frame name=\"Alpha\" src=\"login.php\" noresize>
		<frame name=\"Beta\" src=\"gen_info.php\" noresize>
		</frameset>
		</html>
";
?>		