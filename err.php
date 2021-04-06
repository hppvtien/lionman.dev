<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="ie=edge" http-equiv="x-ua-compatible" />
    <meta content="" name="description" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Đặt hàng không thành công!</title>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-62034121-18"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-62034121-18');
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #F4F9FD;
            font-family: "Montserrat", sans-serif;
            font-size: 14px;
            font-weight: 400;
            color: #2E2E2E;
            line-height: 1.5;
        }

        img {
            max-width: 100%;
            border: 0;
        }

        ul {
            margin: 0;
            list-style: none;
        }

        .text-danger {
            color: red;
        }

        .container {
            max-width: 794px;
            margin: auto;
            margin-top: 75px;
            margin-bottom: 230px;
            background: #FFFFFF;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        }

        .success-page__header {
            background-color: #28A6EA;
            background: url('data:image/png;base64,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') no-repeat center bottom,
                #28A6EA linear-gradient(81.52deg, #28A6EA 35.1%, #127CDE 72.28%);
            padding: 45px 10px 65px;
            text-align: center;
            color: #fff;
        }

        .success-page__header-wrapper {
            max-width: 528px;
            margin: auto;
        }

        .success-page__header-check {
            background: #3CD654;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            position: relative;
            margin: auto;
            margin-bottom: 25px;
        }

        .success-page__header-check.failure {
            background: #dc3545;
        }

        .success-page__header-check::after,
        .success-page__header-check::before {
            content: "";
            background: #fff;
            position: absolute;
        }

        .success-page__header-check::before {
            width: 14px;
            height: 4px;
            left: 19px;
            top: 37px;
            transform: rotate(45deg);
        }

        .success-page__header-check::after {
            width: 28px;
            height: 4px;
            left: 26px;
            top: 34px;
            transform: rotate(135deg);
        }

        .success-page__header-check.failure::after,
        .success-page__header-check.failure::before {
            width: 35px;
            left: 17px;
            top: 34px;
        }

        .success-page__title {
            font-weight: bold;
            font-size: 30px;
            margin-bottom: 15px;
        }

        .success-page__title span {
            text-transform: uppercase;
        }

        .success-page__message_success {
            font-weight: 500;
            line-height: 1.57;
        }

        .success-page__body {
            background: #fff;
            margin-top: -1px;
            padding: 85px 10px 65px;
        }

        .success-page__body-wrapper {
            max-width: 385px;
            margin: auto;
        }

        .success-page__text {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 18px;
        }

        .list-info {
            background: #F4F9FD;
            padding: 20px;
            margin-bottom: 15px;
        }

        .list-info__text {
            color: #000;
            font-weight: 600;
            margin-right: 10px;
        }

        .success-page__message_fail__link {
            color: #147FDF;
            margin-bottom: 40px;
            display: inline-block;
        }

        .success-page__message_fail__link:hover {
            text-decoration: none;
        }

        .success-page__text {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 30px;
        }

        .success-page__form__input {
            font-family: "Montserrat",
                sans-serif;
            outline: none;
            height: 52px;
            padding: 20px;
            border: 1px solid #B8B8B8;
            border-radius: 10px;
            width: 100%;
            margin-bottom: 25px;
        }

        .success-page__form__label {
            display: block;
            margin-bottom: 10px;
        }

        input::-webkit-input-placeholder {
            color: #B8B8B8;
        }

        input::-moz-placeholder {
            color: #B8B8B8;
        }

        input:-moz-placeholder {
            color: #B8B8B8;
        }

        input:-ms-input-placeholder {
            color: #B8B8B8;
        }

        .success-page__form__button {
            font-size: 16px;
            background: #3CD654;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.15);
            color: #fff;
            text-align: center;
            width: 100%;
            font-weight: 700;
            border-radius: 10px;
            padding: 15px;
            transition: .3s;
            cursor: pointer;
            border: none;
            outline: none;
        }

        .success-page__form__button:hover {
            box-shadow: none;
            background: #27ac3b;
        }

        @media(max-width:795px) {
            .container {
                margin-top: 0;
                margin-bottom: 0;
            }

            .success-page__header {
                padding-top: 55px;
            }

            .success-page__title {
                font-size: 24px;
            }

            .success-page__body {
                padding: 30px 10px 130px;
            }

            .success-page__text {
                font-size: 14px;
                margin-bottom: 20px;
            }
        }
    </style>

</head>

<body>

    <div class="mod success-page">
        <div class="container">
            <div class="success-page__header">
                <div class="success-page__header-wrapper">
                    <div class="success-page__header-check failure"></div>
                    <h2 class="success-page__title">
                        Có lỗi xảy ra trong quá trình đặt hàng!
                    </h2>
                    <p class="success-page__message_success">
                        <br>
                        Một lỗi không xác định vừa xảy ra trong quá trình đặt hàng. Bạn vui lòng thử lại sau ít phút.
                    </p>
                </div>
            </div>
            
        </div>
    </div>

</body>

</html>