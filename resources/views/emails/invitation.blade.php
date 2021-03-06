<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Invite a friend | Time Kulture 2018</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style type="text/css">
    html {
      width: 100%;
      background: #fff;
      font-family: "Lato", sans-serif;
    }

    h1 {
      font-family: 'Lato', sans-serif;
      color: #0070ba;
      font-size: 1.5em;
      margin-bottom: 1em;
      font-weight: 700;
    } 

    span {
      color: #1a1a1a;
      font-weight: 700;
      font-family: "Lato", sans-serif;
    }
  </style> 
</head>

<body style="margin: 0; padding: 0;">
  <table align="center" cellpadding="0" cellspacing="0" width="800" style="border-collapse: collapse;">
    <tr>
      <td align="left" bgcolor="#fff" style="padding: 0;">
        <img src="http://timekulture.swisswatchgallery.com.my/assets/img/tk/inviteedm-banner.jpg" style="display: block; width: 100%;" alt="Invite a friend | Time Kulture 2018">
      </td>
    </tr>


    <tr>
      <td align="left" bgcolor="#fff" style="padding:3em 6em ;background-color: #ffffff;">
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <td width="100%" valign="top" align="center">
              <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td width="260" valign="top" align="center">
                    <span style="color: #1a1a1a; font-weight: 400; font-size: 1em; line-height: 1.5;">Hi <?php echo $data['toName']; ?>, </span> <br><br>
                  </td>
                </tr>

                <tr>
                  <td width="260" valign="top" align="center">
                    <span style="color: #1a1a1a; font-weight: 400; font-size: 1em; line-height: 1.5;"><?php echo $data['introname']; ?> invited you to play "Race Against Time" puzzle game – Revolution by Time Kulture 2018 - to get extra points to the score. Click the link below and put pedal to the metal to stand a chance to win grand prizes worth up to RM5,000 in Swiss Watch Gallery Cash Vouchers.</span> <br><br><br><br>
                  </td>
                </tr>    

                <tr>
                  <td width="260" valign="top" align="center">
                    <a href="http://timekulture.swisswatchgallery.com.my/earnPoints/{{$data['uniqueToken']}}/{{$data['matchId']}}"" style="color: #000; background-color: #ffcb00; border: 2px solid #ffcb00; text-transform: uppercase; font-weight: 700; font-size: 18px; padding: 10px 30px; border-radius: 10px;  letter-spacing: 1px; text-decoration: none;">START YOUR ENGINE</a>
                  </td>
                </tr>    
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr> 
 
  </table>
</body>

</html>
