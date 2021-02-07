<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://player.vimeo.com/api/player.js"></script>
    <form id="form1" runat="server">
        <div>
            <iframe id="player1" src="https://player.vimeo.com/video/76979871?api=1&player_id=player1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            <iframe width="560" height="315" src="//player.vimeo.com/video/5705212?api=1&player_id=video1" id="video1"></iframe>
        </div>
    </form>
    <script>

        $(document).ready(function () {
            var x = document.querySelectorAll("iframe");
            var nodelist = x.length;
            alert(nodelist);

            for (i = 0; i < nodelist; i++) {

                var player = new Vimeo.Player(x[i]);

                player.on('play', function () {
                    console.log('played the video!');
                });

                player.on('ended', function () {
                    console.log('ended the video!');
                });
            }
        });

    </script>
</body>
</html>