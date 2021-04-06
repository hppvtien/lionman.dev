<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');
/* Param render footer js */
$_footer_js = '';

$_order = null;
parse_str($_SERVER['QUERY_STRING'], $_url_params);
foreach ($_url_params as $key => $value) {
    if (base64_decode($key) == 'success') {
        $_order_decode = explode('|', base64_decode($value));
        $_order['order_name'] = $_order_decode[0];
        $_order['order_phone'] = $_order_decode[1];
        $_order['time'] = $_order_decode[2];
        break;
    }
}

$_has_order = ($_order['order_name'] && $_order['order_phone'] && $_order['time']) ? true : false;
$_update_msg = '';
/*** process after form submit ***/
if ($_has_order && $_POST) {
    if (isset($_POST['order_name']) && $_POST['order_name']!='' && 
        isset($_POST['order_phone']) && $_POST['order_phone']!='') {
        include('includes/functions.php');

        $_update_data            = $_POST;
        $_update_data['key']     = _KEY;
        $_update_data['landing'] = _LANDING_URL;
        $_update_data['time']    = $_order['time'];

        $request = json_decode(request_post_api(_UPDATE_ORDER_URL, $_update_data), true);

        if (isset($request['success'])) {
            $_order = $request['order'];
            $_update_msg = 'Cập nhật đơn hàng thành công';
        } else if (isset($request['error'])) {
            $_update_msg = $request['error'];
        }
        /*** end form submit ***/
    } else {
        $_footer_js = '<script type="text/javascript">alert("Tên và số điện thoại : không được để trống");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="ie=edge" http-equiv="x-ua-compatible" />
    <meta content="" name="description" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="content/assets/css/success.css" rel="stylesheet">

    <script type="text/javascript">
        (function() {
            var d = document,
                w = window;
            w.MgSensorData = w.MgSensorData || [];
            w.MgSensorData.push({
                cid: 121443,
                lng: "us",
                project: "a.mgid.com"
            });
            var l = "a.mgid.com";
            var n = d.getElementsByTagName("script")[0];
            var s = d.createElement("script");
            s.type = "text/javascript";
            s.async = true;
            var dt = !Date.now ? new Date().valueOf() : Date.now();
            s.src = "https://" + l + "/mgsensor.js?d=" + dt;
            n.parentNode.insertBefore(s, n);
        })();
    </script>
    <!-- /Mgid Sensor -->

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="content/assets/desktop/js/districts.min.js" defer></script>

    <script defer>
        function renderCitySelect() {
            $('.js-city').each(function() {
                citySelect = $(this);
                cities.forEach(function(item, index) {
                    citySelect.append("<option value='" + item + "' data-index='" + index + "'>" + item + "</option>");
                });
            })
        }

        function renderDistrictSelect(districtSelect, cityIndex) {
            if (cityIndex != undefined && cityIndex !== '' && cityIndex >= 0) {
                distr[cityIndex].forEach(function(item, index) {
                    districtSelect.append("<option value='" + item + "' data-index='" + index + "'>" + item + "</option>");
                });
            } else {
                dis += `<option value='' data-index=''>Quận/ Huyện</option>`;
                districtSelect.html("<option value='' data-index=''>Quận/ Huyện</option>");
            }
        }
        $(function() {
            renderCitySelect();
            $('.js-city').on('change', function() {
                districtSelect = $(this).parent().find('.js-district').html(`<option value='' data-index=''>Quận/ Huyện</option>`);
                renderDistrictSelect(districtSelect, $(this).find(":selected").data('index'));
            })
        })
    </script>
</head>

<body>
    <div class="mod success-page">
        <div class="container">
            <?php if ($_update_msg != '') : ?>
                <div class="success-page__header">
                    <div class="success-page__header-wrapper">
                        <div class="success-page__header-check <?php echo isset($request['error']) ? 'failure' : '' ?>"></div>
                        <h2 class="success-page__title">
                            <?= $_update_msg ?>
                        </h2>
                        <p class="success-page__message_success">
                            <br>
                            <a class="" href="index.php?<?= $_SERVER['QUERY_STRING'] ?>">Đặt đơn hàng mới</a>
                        </p>
                    </div>
                </div>
            <?php elseif ($_has_order) : ?>
                <div class="success-page__header">
                    <div class="success-page__header-wrapper">
                        <div class="success-page__header-check"></div>
                        <h2 class="success-page__title">
                            <span><?= $_order['order_name'] ?></span>, cảm ơn bạn đã đặt hàng!
                        </h2>
                        <p class="success-page__message_success">
                            <br>
                            Bưu kiện của bạn hiện đang được chuyển đến. Hãy chắc chắn bạn đã nhập chính xác số điện thoại và
                            chờ cuộc gọi xác nhận từ người quản lý của chúng tôi.
                        </p>
                    </div>
                </div>
                <div class="success-page__body">
                    <div class="success-page__body-wrapper">
                        <h3 class="success-page__text">Vui lòng kiểm tra thông tin của bạn:</h3>
                        <div class="list-info">
                            <ul class="list-info__list">
                                <li class="list-info__item">
                                    <span class="list-info__text">Họ và tên: </span>
                                    <?= $_order['order_name'] ?>
                                </li>
                                <li class="list-info__item">
                                    <span class="list-info__text">Điện thoại: </span>
                                    <?= $_order['order_phone'] ?>
                                </li>
                            </ul>
                        </div>
                        <h3 class="success-page__text" id="lowerH">
                            Để tăng tốc quá trình đặt hàng, hãy điền địa chỉ giao hàng của bạn:
                        </h3>
                        <div class="form">
                            <form action="success.php?<?= $_SERVER['QUERY_STRING'] ?>" class="success-page__form" id="details" method="post">
                                <div class="success-page__form__container">
                                    <label for="" class="success-page__form__label">Họ và tên</label>
                                    <input class="success-page__form__input" name="order_name" placeholder="Họ và tên" type="text" value="<?= $_order['order_name'] ?>" required />

                                    <label for="" class="success-page__form__label">Điện thoại</label>
                                    <input class="success-page__form__input" name="order_phone" placeholder="Số điện thoại" type="text" value="<?= $_order['order_phone'] ?>" required />

                                    <label for="" class="success-page__form__label">Tỉnh, thành phố</label>
                                    <select class="success-page__form__input js-city" name="order_province" value="" placeholder="Tỉnh/ Thành phố">
                                        <option value="">Tỉnh/ Thành phố</option>
                                    </select>

                                    <label for="" class="success-page__form__label">Quận, huyện, thị trấn</label>
                                    <select class="success-page__form__input js-district" name="order_district" value="" placeholder="Quận/ Huyện">
                                        <option value="">Quận/ Huyện</option>
                                    </select>

                                    <label for="" class="success-page__form__label">Phường, xã</label>
                                    <input class="success-page__form__input" name="order_commune" placeholder="Phường 12 " type="text" />

                                    <label for="" class="success-page__form__label">Địa chỉ (số nhà, đường/phố, xóm, thôn)</label>
                                    <textarea class="success-page__form__input" name="order_address" placeholder="20 đường Cộng Hòa " type="text" rows="5"></textarea>

                                    <button type="submit" class="success-page__form__button">Gửi
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    <?php else : ?>
        <div class="success-page__header">
            <div class="success-page__header-wrapper">
                <div class="success-page__header-check failure"></div>
                <h2 class="success-page__title">
                    Thông tin order không chính xác!
                </h2>
                <p class="success-page__message_success">
                    <br>
                    <a class="" href="javascript:history.back()">
                        Nếu bạn đã nhập sai, hãy quay lại và điền lại vào biểu mẫu.
                    </a>
                </p>
            </div>
        </div>
    <?php endif; ?>
    </div>
</body>

<?php echo $_footer_js; ?>

</html>