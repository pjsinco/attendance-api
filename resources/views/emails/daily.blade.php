<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
  <title>

  </title>
  <!--[if !mso]><!-- -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--<![endif]-->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    #outlook a {
      padding: 0;
    }

    .ReadMsgBody {
      width: 100%;
    }

    .ExternalClass {
      width: 100%;
    }

    .ExternalClass * {
      line-height: 100%;
    }

    body {
      margin: 0;
      padding: 0;
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    table,
    td {
      border-collapse: collapse;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    img {
      border: 0;
      height: auto;
      line-height: 100%;
      outline: none;
      text-decoration: none;
      -ms-interpolation-mode: bicubic;
    }

    p {
      display: block;
      margin: 13px 0;
    }
  </style>
  <!--[if !mso]><!-->
  <style type="text/css">
    @media only screen and (max-width:480px) {
      @-ms-viewport {
        width: 320px;
      }
      @viewport {
        width: 320px;
      }
    }
  </style>
  <!--<![endif]-->
  <!--[if mso]>
        <xml>
        <o:OfficeDocumentSettings>
          <o:AllowPNG/>
          <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
  <!--[if lte mso 11]>
        <style type="text/css">
          .outlook-group-fix { width:100% !important; }
        </style>
        <![endif]-->

  <!--[if !mso]><!-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">
  <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);
  </style>
  <!--<![endif]-->

  <style type="text/css">
    @media only screen and (min-width:480px) {
      .mj-column-per-100 {
        width: 100% !important;
      }
    }
  </style>


  <style type="text/css">
  </style>
</head>

<body>
  <div>
    <!--[if mso | IE]>
      <table
         align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;" width="600"
      >
        <tr>
          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
      <![endif]-->

    <div style="Margin:0px auto;max-width:600px;">
      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
        <tbody>
          <tr>
            <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
              <!--[if mso | IE]>
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                
        <tr>
      
            <td
               style="vertical-align:top;width:600px;"
            >
          <![endif]-->

              <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                  <tr>
                    <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                      <div style="font-family:Open Sans, helvetica;font-size:36px;line-height:1;text-align:center;color:#4a4a4a;">
                        MLB Attendance Report
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                      <div style="font-family:Open Sans, helvetica;font-size:18px;line-height:1;text-align:center;color:#9b9b9b;">
                        {{ $date }}
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td style="font-size:0px;padding:10px 25px;padding-bottom:20px;word-break:break-word;">
                      <p style="border-top:solid 1px lightgrey;font-size:1;margin:0px auto;width:100%;"></p>

                      <!--[if mso | IE]>
        <table
           align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 1px lightgrey;font-size:1;margin:0px auto;width:550px;" role="presentation" width="550px"
        >
          <tr>
            <td style="height:0;line-height:0;">
              &nbsp;
            </td>
          </tr>
        </table>
      <![endif]-->
                    </td>
                  </tr>


                  @foreach ($games as $game)
                  <tr>
                    <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                      <div style="font-family:Open Sans, helvetica;font-size:18px;line-height:0;text-align:left;color:#4a4a4a;">
                        <span style="font-weight: 700;">{{ $game->getHomeNickname() }}</span> vs {{ $game->getAwayNickname() }}
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td align="center" style="font-size:0px;padding:10px 25px;padding-bottom:10px;word-break:break-word;">
                      <div style="font-family:Open Sans, helvetica;font-size:34px;line-height:40px;text-align:left;color:#4a4a4a;">
                        {{ $game->attendance }}&nbsp;<span style="color: {{ $game->colorDelta }}; font-weight: 300; opacity: .6;">{{ $game->delta }}</span>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td align="left" style="font-size:0px;padding:10px 25px;padding-bottom:40px;word-break:break-word;">
                      <div style="font-family:Open Sans, Helvetica, Arial, sans-serif;font-size:14px;letter-spacing:1px;line-height:0px;text-align:left;text-transform:uppercase;color:#000000;font-weight:300;">
                        {{ $game->dateTime }}
                      </div>

                    </td>
                  </tr>

                  @endforeach


                </table>
              </div>
              <!--[if mso | IE]>
            </td>
        </tr>
                  </table>
                <![endif]-->
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!--[if mso | IE]>
          </td>
        </tr>
      </table>
      <![endif]-->
  </div>
</body>
</html>
