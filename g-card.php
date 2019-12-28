<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>抽卡片</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom styles for this template -->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <form action="place.php" method="post">
                <div class="row">
                    <select name="place" id="place" class="form-control">
                        <option value="1">交誼廳</option>
                        <option value="2">主臥室</option>
                        <option value="3">廚房</option>
                        <option value="4">其他</option>
                        <option value="5">浴室</option>
                    </select>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="type" value="1" id="type" class="custom-control-input">
                    <label class="custom-control-label" for="type">
                        清翔指定要搜尋物品
                    </label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="is_home" value="1" id="is_home" class="custom-control-input">
                    <label class="custom-control-label" for="is_home">
                        浩二指定要拿取房屋物品
                    </label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="is_money" value="1" id="is_money" class="custom-control-input">
                    <label class="custom-control-label" for="is_money">
                        病蘿指定要拿取財富相關線索
                    </label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="is_truth" value="1" id="is_truth" class="custom-control-input">
                    <label class="custom-control-label" for="is_truth">
                        阿翔(或ZETA使用技能)搜尋時打開
                    </label>
                </div>
                <div class="row">
                    <button class="btn btn-info" type="button" onclick="ajaxCard()">送出</button>
                </div>
            </form>
            <div class="row" id="result">

            </div>
        </div>

    </div>

</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script>
    function ajaxCard() {
        $.ajax({
            type: "POST",
            url: "ajax-data.php",
            dataType: "json",
            data: {
                place: $('#place').val(),
                type: $('#type:checked').val(),
                is_home: $('#is_home:checked').val(),
                is_money: $('#is_money:checked').val(),
                is_truth: $('#is_truth:checked').val(),
            },
            success: function(data) {
                var html = '類型:';
                if (data.type == 1) {
                    html += '物品';
                } else {
                    html += '靈感';
                }
                html += '<BR>地點:';
                switch (data.place) {
                    case 1:
                        html += '交誼廳';
                        break;
                    case 2:
                        html += '主臥室';
                        break;
                    case 3:
                        html += '廚房';
                        break;
                    case 4:
                        html += '其他';
                        break;
                    case 5:
                        html += '浴室';
                        break;
                }
                html += '<BR>' + data.name;
                $('#result').html(html);
            },
            error: function (jqXHR) {

            }
        })
    }
</script>
</body>
</html>
