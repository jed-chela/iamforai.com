<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">

  </head>
  <body style="color:#777777; background: #f0f0f0;">
    <center data-parsed="" style="width: 100vw; min-width: 150px; max-width: 560px; margin: 0px auto; border: 1px solid #f2f2f2;">
    <table style="width:100%; background: #FFF; margin: 0; padding: 0; border-spacing: 0; margin-top: 20px;">
      <tr style="margin: 0; padding: 0;">
        <td align="center" valign="top" cell-padding=0 style="background-color:#333;padding: 15px; margin: 0;">
          <table style="width:100%; margin: 0; padding: 0; border-spacing: 0;">
            <tr style="margin: 0; padding: 0;">
              <td style=""><div class="header">
                <div class="logo">
                  <img src="<?= base_url(); ?>assets/img/logo3.png" alt="Logo" style="width: 170px; height: auto;" />
                </div>
              </div></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <table style="width:100%; background: #FFF;">
      <tr>
        <td>
          <table style="width:100%">
            <tr>
              <td>
                <div class="title">
                  <h3><center><?= $subject ?></center></h3>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="message" style="padding:40px; padding-top: 0;">
                  <p>Hi <?= $recipient ?>!</p>
                  <p>If you forgot you password,</p>
                  <p>Please <a href="<?= $link; ?>" style="color:#f7931d;">Click this link</a> to sign in.</p>
                  <div><!--<center><img src="<?= base_url(); ?>assets/img/collagepic4.png" style="width: auto; max-height: 30vh;"></center>--></div>
                  <p>At Humans, we transform brands and drive their growth by helping them create market-changing products, services and experiences that solve real problems.</p><center></center>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="footer">
                  <p><center>Copyright &#xA9; <?php echo date("Y"); ?> by Humans. All Rights Reserved.</center></p>
                </div>
              </td>
            </tr>

          </table>
        </td>
      </tr>
    </table>
  </center>
  </body>
</html>