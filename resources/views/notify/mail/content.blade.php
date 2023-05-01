<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notificacion</title>
    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>

<body style="background-color: #F5F5F5; padding-top: 7px; padding-bottom: 7px">
    <div
        style="background-color: #fff; width: 70%; margin-left: auto; margin-right: auto; border-radius: 4px; padding: 1.25rem;">
        <main style="text-align: center">
            {!! $data['content'] !!}
        </main>
        <footer style="margin-top:15vh; text-align: center">
            <a href="http://dev.org">
                <img src="https://github.com/JuanCirera/Video-Games-Vault/blob/main/public/img/logos/VGV_color.png?raw=true"
                    alt="logo" title="logo" style="width: 150px;">
            </a>
            <p>© 2023, VIDEO GAMES VAULT</p>
        </footer>
    </div>
</body>

</html>
