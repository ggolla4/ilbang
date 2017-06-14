<?php
/* * INIlite_receipt.php
 *	���ݿ����� ������
 */

	/**************************
	 * 1. ���̺귯�� ��Ŭ��� *
	 **************************/
	require("../libs/INILiteLib.php");
	
	
	/***************************************
	 * 2. INILite Ŭ������ �ν��Ͻ� ���� *
	 ***************************************/
	$inipay = new INILite;


	/*********************
	 * 3. ���� ���� ���� *
	 *********************/
	$inipay->m_inipayHome = "/usr/local/www/INILite_php/"; 	//���� ���� �ʿ�
	$inipay->m_key = $merchantkey;  		//���� �����ڿ��� �߱޵� �������� ��ĪŰ�� ���� �մϴ�.(merchantkey)
	$inipay->m_pgId = "INIphpCASH";      				// ���� (���� ���� �Ұ�)
	$inipay->m_ssl = "true"; 					//ssl�����ϸ� true�� ������ �ּ���.
	$inipay->m_type = "receipt"; 					// ���� (���� ���� �Ұ�) // ���ݿ����� : receipt
	$inipay->m_log = "true";              				// true�� �����ϸ� �αװ� ������(���ر���)
	$inipay->m_debug = "true";              			// �α׸��("true"�� �����ϸ� �󼼷αװ� ������. ���ر���)
	$inipay->m_mid = $mid; 						// �������̵�
	$inipay->m_uip = getenv("REMOTE_ADDR"); 			// ���� (���� ���� �Ұ�)
	$inipay->m_currency = $currency;				// ȭ�����
	$inipay->m_price = $cr_price;					// ����ұݾ�
	$inipay->m_goodName = $goodname;                          	// ��ǰ��
  $inipay->m_sup_price = $sup_price;                         	// ���ް���
  $inipay->m_tax = $tax;                                          // �ΰ���
  $inipay->m_srvc_price = $srvc_price;                        	// �����
  $inipay->m_buyerName = $buyername;                         	// ������ ����
  $inipay->m_buyerEmail = $buyeremail;                        	// ������ �̸��� �ּ�
  $inipay->m_buyerTel = $buyertel;                          	// ������ ��ȭ��ȣ
  $inipay->m_reg_num = $reg_num;                                  // ���ݰ����� �ֹε�Ϲ�ȣ
  $inipay->m_useopt = $useopt;                                    // ���ݿ����� ����뵵 ("0" - �Һ��� �ҵ������, "1" - ����� ������>
	$inipay->m_payMethod = $paymethod;
	$inipay->m_encrypted = $encrypted;


	/****************
	 * 4. ���� ��û *
	 ****************/
	$inipay->startAction();

?>


<!-------------------------------------------------------------------------------------------------------
 *  													*
 *       												*
 *        												*
 *	�Ʒ� ������ ���� ����� ���� ��� ������ �����Դϴ�. 				                *
 *													*
 *													*
 *													*
 -------------------------------------------------------------------------------------------------------->
 
<html>
<head>
<title>INILITE-INIAPI PHP ���ݿ����� ���� ����</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" href="css/group.css" type="text/css">
<style>
body, tr, td {font-size:10pt; font-family:����,verdana; color:#433F37; line-height:19px;}
table, img {border:none}

/* Padding ******/ 
.pl_01 {padding:1 10 0 10; line-height:19px;}
.pl_03 {font-size:20pt; font-family:����,verdana; color:#FFFFFF; line-height:29px;}

/* Link ******/ 
.a:link  {font-size:9pt; color:#333333; text-decoration:none}
.a:visited { font-size:9pt; color:#333333; text-decoration:none}
.a:hover  {font-size:9pt; color:#0174CD; text-decoration:underline}

.txt_03a:link  {font-size: 8pt;line-height:18px;color:#333333; text-decoration:none}
.txt_03a:visited {font-size: 8pt;line-height:18px;color:#333333; text-decoration:none}
.txt_03a:hover  {font-size: 8pt;line-height:18px;color:#EC5900; text-decoration:underline}
</style>

<script>
	var openwin=window.open("childwin.html","childwin","width=299,height=149");
	openwin.close();
	
</script>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>
<body bgcolor="#FFFFFF" text="#242424" leftmargin=0 topmargin=15 marginwidth=0 marginheight=0 bottommargin=0 rightmargin=0><center> 
<table width="632" border="0" cellspacing="0" cellpadding="0">
  <tr> 
  <?    // ���� ���ܿ� ���� ��� �̹����� ����ȴ�.
   	$background_img = "img/spool_top.gif";    //default image
   	
   	if ($inipay->m_resultCode =="01"){
   	    $background_img = "img/card.gif";
   	}
?>
    <td height="83" background="<?=$background_img?>"style="padding:0 0 0 64">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="3%" valign="top"><img src="img/title_01.gif" width="8" height="27" vspace="5"></td>
          <td width="97%" height="40" class="pl_03"><font color="#FFFFFF"><b>���ݰ��� ������ �߱ް��</b></font></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td align="center" bgcolor="6095BC">
      <table width="620" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td bgcolor="#FFFFFF" style="padding:0 0 0 56">
		  <table width="510" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="7"><img src="img/life.gif" width="7" height="30"></td>
                <td background="img/center.gif"><img src="img/icon03.gif" width="12" height="10">
                 <b>
	                 <?
		                 if($inipay->m_resultCode == "00"){
		             ?>
		                 	�����Բ��� ��û�Ͻ� ���ݿ����� �߱��� �����Ǿ����ϴ�.
		             <?  }else{?>
		                	�����Բ��� ��û�Ͻ� ���ݿ����� �߱��� ���еǾ����ϴ�.
		             <? }?>
                 </b></td>
                <td width="8"><img src="img/right.gif" width="8" height="30"></td>
              </tr>
            </table>
            <br>
            <table width="510" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="407"  style="padding:0 0 0 9"><img src="img/icon.gif" width="10" height="11"> 
                  <strong><font color="433F37">�� �� �� ��</font></strong></td>
                <td width="103">&nbsp;</td>                
              </tr>
              <tr> 
                <td colspan="2"  style="padding:0 0 0 23">
		  <table width="470" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td width="18" align="center"><img src="img/icon02.gif" width="7" height="7"></td>
                      <td width="109" height="26">�� �� �� ��</td>
                      <td width="343"><?php echo($inipay->m_resultCode); ?></td>
                    </tr>
                     <tr> 
                      <td height="1" colspan="3" align="center"  background="img/line.gif"></td>
                    </tr>
                    <tr> 
                      <td width="18" align="center"><img src="img/icon02.gif" width="7" height="7"></td>
                      <td width="109" height="25">�� �� �� ��</td>
                      <td width="343"><?php echo($inipay->m_resultMsg); ?></td>
                    </tr>
                    <tr> 
                      <td height='1' colspan='3' align='center'  background='img/line.gif'></td>
                    </tr>
                    <tr> 
                      <td width="18" align="center"><img src="img/icon02.gif" width="7" height="7"></td>
                      <td width="109" height="25">�� �� �� ȣ</td>
                      <td width="343"><?php echo($inipay->m_tid); ?></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="3" align="center"  background="img/line.gif"></td>
                    </tr>
                    <tr> 
                      <td width='18' align='center'><img src='img/icon02.gif' width='7' height='7'></td>
                      <td width='109' height='25'>�� �� �� ȣ</td>
                      <td width='343'><?php echo($inipay->m_applnum); ?></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="3" align="center"  background="img/line.gif"></td>
                    </tr>
                    <tr> 
                      <td width='18' align='center'><img src='img/icon02.gif' width='7' height='7'></td>
                      <td width='109' height='25'>�� �� �� ¥</td>
                      <td width='343'><?php echo($inipay->m_pgAuthDate); ?></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="3" align="center"  background="img/line.gif"></td>
                    </tr>
                    <tr> 
                      <td width='18' align='center'><img src='img/icon02.gif' width='7' height='7'></td>
                      <td width='109' height='25'>�� �� �� ��</td>
                      <td width='343'><?php echo($inipay->m_pgAuthTime); ?></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="3" align="center"  background="img/line.gif"></td>
                    </tr>
                    <tr> 
                      <td width='18' align='center'><img src='img/icon02.gif' width='7' height='7'></td>
                      <td width='109' height='25'>�� ���ݰ����ݾ�</td>
                      <td width='343'><?php echo($inipay->m_cshr_applprice); ?></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="3" align="center"  background="img/line.gif"></td>
                    </tr>
                    <tr> 
                      <td width='18' align='center'><img src='img/icon02.gif' width='7' height='7'></td>
                      <td width='109' height='25'>�� �� �� ��</td>
                      <td width='343'><?php echo($inipay->m_cshr_supplyprice); ?></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="3" align="center"  background="img/line.gif"></td>
                    </tr>
                    <tr> 
                      <td width='18' align='center'><img src='img/icon02.gif' width='7' height='7'></td>
                      <td width='109' height='25'>�� �� ��</td>
                      <td width='343'><?php echo($inipay->m_cshr_tax); ?></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="3" align="center"  background="img/line.gif"></td>
                    </tr>
                    <tr> 
                      <td width='18' align='center'><img src='img/icon02.gif' width='7' height='7'></td>
                      <td width='109' height='25'>�� �� ��</td>
                      <td width='343'><?php echo($inipay->m_cshr_serviceprice); ?></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="3" align="center"  background="img/line.gif"></td>
                    </tr>
                    <tr> 
                      <td width='18' align='center'><img src='img/icon02.gif' width='7' height='7'></td>
                      <td width='109' height='25'>�� �� �� ��</td>
                      <td width='343'><b><font color=blue>(<?
                      				if($inipay->m_cshr_type == "0"){
                      				?>
                      					�Һ��� �ҵ������
                      				<?}else{?>
                      					����� ����������
                      				<?}?>)</font></b></td>
                    </tr>
                    <tr> 
                      <td height='1' colspan='3' align='center'  background='img/line.gif'></td>
                    </tr>
                   </table></td>
              </tr>
            </table>
            <br>
          </td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td><img src="img/bottom01.gif" width="632" height="13"></td>
  </tr>
</table>
</center></body>
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                