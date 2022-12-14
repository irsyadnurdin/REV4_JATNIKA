<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>

    <body>
        <div>
            <div style="font-size: 26px;font-weight: 700;letter-spacing: -0.02em;line-height: 32px;color: #41637e;font-family: sans-serif;text-align: center; border-bottom: double; margin-bottom: 20px;" align="center" id="emb-email-header">
                <img style="border: 0;-ms-interpolation-mode: bicubic;display: block;Margin-left: auto;Margin-right: auto;max-width: 152px" src="<?= base_url('img/logo.png') ?>" alt="" width="100%">
            </div>

            <p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px">
                Username    : <?php echo $username;?>
            </p>

            <p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px">
                Reset Password URL  : <?php echo (base_url('login/reset_password/'.$token)) ?>
            </p>

            <p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px">
                Please open the URL in the same browser where you initiated the Reset Password request.
            </p>
        </div>
    </body>

</html>