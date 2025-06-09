<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Contact Form Test</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
</head>

<body>
    <main>
        <div class="thanks-form">
            <div class="thanks-form__title">
                <h2>お問い合せありがとうございました</h2>
            </div>
            <div class="thanks-button">
                <a class="thanks-button__link" href="/">HOME</a>
            </div>
        </div>
    </main>
</body>