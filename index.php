<?php
    session_start ();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

    <header></header>
    <main>
        <section class="chat">
            <form action="" class="form">
                <label for="" class="form__label-name">
                    Your Nickname:
                    <input type="text" name="name" class="form__input-name">
                </label>
                <label for="" class="form__label-age">
                    Your age:
                    <input type="text" name="age" class="form__input-age">
                </label>
                <input type="submit" value="Submit" class="form__input-submit">
            </form>
        </section>
    </main>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script>

        $('#load').on('click', loadFriends);

        function geturl(method, params){
            if (!method) throw new Error('Вы не указали метод!');
            params = params || {};
            params['access_token'] = '309703b429d88180eafa333933d8a58ef14028a164600a152ca3474636e2f33f563f6b2b05eb65b6e238b';
            return 'https://api.vk.com/method/' + method + '?' + $.param(params) + '&' + 'v=5.2';
        }

        function sendRequest(method, params, func){
            $.ajax({
                url: geturl(method, params),
                method: 'GET',
                dataType: 'JSONP',
                success: func
            });
        }

        function loadFriends() {
            sendRequest('account.getProfileInfo', {}, function (data) {
                console.log(data);
            });
        }

    </script>
</body>
</html>
