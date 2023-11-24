<?php

?>
<style>
    .container {
        padding-right: 20px;
    }


    .title {
        font-size: 20px;
        font-weight: bolder;
    }

    #email {
        width: 250px;
    }
</style>
<section>
    <div class="container">
        <p class="title">Тут ви можете перевірити надходження сертифікатів</p>
        <div class="import-certificate">
            <a id="import-certificate" class="button-primary">Імпортувати нові надходження сертифікаів</a>
            <span id="result" class="status"></span>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <p class="title">Зробити сертифікат(Може бути користно якщо стався технічний збій і система не записала нові
            надходження)</p>
        <div class="import-certificate">
            <input id="email" type="email" name="email" placeholder="Почта клієнта">
            <input id="price" type="text" name="price" placeholder="Ціна">
            <a id="create-certificate" class="button-primary">Створити сертифікат</a>
            <span id="creation-result" class="status"></span>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <p class="title">Secret key(Ключ який встановлено не демонструється)</p>
        <div class="import-certificate">
            <label for="secret-key"></label><input id="secret-key" type="text" name="secret-key" placeholder="Secret key">
            <a id="update-secret-key" class="button-primary">Update Secret key</a>
            <span id="update-status" class="status"></span>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        const btn = $('#update-secret-key');
        const result = $('#update-status');

        btn.on('click', function () {
            const secretKey = $('#secret-key').val();
            updateSecretKey(secretKey);
        });

        function updateSecretKey(secretKey) {
            const action = 'update_secret_key';

            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    action: action,
                    secretKey: secretKey,
                },
                beforeSend: function () {
                    result.text('Процесс...');
                },
                success: function (response) {
                    if (response.success === true) {
                       result.text('Таємний ключ оновлено')
                    } else if (response.success === false) {
                        result.text('Помилка')
                    }
                },
                error: function () {
                    result.text('Помилка');
                },
                complete: function () {
                    console.log('Done');
                }
            });
        }
    });
</script>
<script>
    $(document).ready(function () {
        const btn = $('#create-certificate');
        const result = $('#creation-result');

        btn.on('click', function () {
            const email = $('#email').val();
            const price = $('#price').val()
            createCertificate(email, price);
        });

        function createCertificate(email, price) {
            const action = 'create_certificate';

            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    action: action,
                    email: email,
                    price: price,
                },
                beforeSend: function () {
                    result.text('Процесс...');
                },
                success: function (response) {
                    if (response.success === true) {
                        console.log('succes')
                        result.text('Ceртифікат створено: ' + response.data);
                    } else if (response.success === false) {
                        result.text('Помилка, можливо ви не ввели пошту')
                    }
                },
                error: function () {
                    result.text('Помилка');
                },
                complete: function () {
                    console.log('Done');
                }
            });
        }
    });
</script>
<script>
    $(document).ready(function () {
        const btn = $('#import-certificate');
        const result = $('#result');
        btn.on('click', function () {
            importCertificate();
        });

        function importCertificate() {

            const action = 'import_certificate';

            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    action: action,

                },
                beforeSend: function () {
                    result.text('Процесс...');
                },
                success: function (response) {
                    result.text('Імпортовано');
                },
                error: function () {
                    result.text('Помилка')
                },
                complete: function () {
                    console.log('Done');
                }
            });
        }
    });
</script>

