<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="ie=edge" http-equiv="x-ua-compatible" />
    <meta content="" name="description" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="content/assets/css/success.css" rel="stylesheet">
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
            <div class="success-page__body">
                <div class="success-page__body-wrapper">
                    <h3 class="success-page__text">
                        <span class="text-danger"><?php if (isset($_GET['error'])) echo $_GET['error']; ?></span>
                        </br>
                        Vui lòng kiểm tra thông tin của bạn:
                    </h3>
                    <div class="list-info">
                        <ul class="list-info__list">
                            <li class="list-info__item">
                                <span class="list-info__text">Họ và tên: </span>
                                <?= $_GET['order_name']; ?>
                            </li>
                            <li class="list-info__item">
                                <span class="list-info__text">Điện thoại: </span>
                                <?= $_GET['order_phone']; ?>
                            </li>
                        </ul>
                    </div>
                    <p class="success-page__message_fail">
                        <a class="success-page__message_fail__link" href="javascript:history.back()">
                            Nếu bạn đã nhập sai, hãy quay lại và điền lại vào biểu mẫu.
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>