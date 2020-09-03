<html>
    <head>
    <title>Hey</title>
    </head>
    <a href='https://www.bassinaaz.fr'>
    <header style='margin-bottom: 10px;'>
    <img   style='width: 100%' src='https://firebasestorage.googleapis.com/v0/b/test-df0b6.appspot.com/o/banniere5.png?alt=media&token=242015e5-d5fd-4081-9161-ff4ef1ecf7f1'/>
    </header>
    </a>
    <body style='padding: 0%; margin: 0; font-family: Helvetica, Arial , sans-serif'>
        <div style='background: #f7f7f7; padding: 5% 5% 5% 5%'>
            <div style='background: white; padding: 2%'>
                <p style='text-align: center; font-size: 18px'><b>Bonjour Stéphane, vous avez reçus un mail de la part de ".$_POST['email']."</b></p><br/>
                <p style='text-align: center; font-size: 18px'>Sujet : <b>".$_POST['sujet']."</b></p><br/>
                <span style='text-align: center; display: block; margin: auto'>
                   ".$_POST['message']."
                </span>
            </div>
            <div style='background: white; color: #666; padding: 1%; border-radius: 0 0 10px 10px; padding-top: 20px'>
                <b>
                    <span>© 2020 <a href='https://bassinaaz.fr' style='color:#666;outline:none;text-decoration: none;margin-bottom:5px'>Bassin A à Z, le tour de France de vos bassins</a></span>
                </b>
            </div>
        </div>
    </body>
</html>