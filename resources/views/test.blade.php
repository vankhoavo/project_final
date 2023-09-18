<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <title>Hello, world!</title>
</head>

<body>
    <div class="container-fuild mt-5 ml-5" id="content">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header" id="ten_san_pham">

                    </div>
                    <div class="card-body">
                        <img src="" style="width: 100%;" id="hinh_anh_san_pham"
                            class="img-thumbnail text-center">
                        <p class="text-justify" id="noi_dung">

                        </p>
                    </div>
                    <div class="card-footer text-right">
                        <a id="link_san_phams" class="btn btn-primary">Mua Sản Phẩm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.0/axios.min.js"></script>
<script>
    axios
        .get('/adminlte/san-pham/detail/1')
        .then((res) => {
            var sanpham = res.data.danh_sach;
            $("#ten_san_pham").html(sanpham.ten_san_pham);
            $("#noi_dung").html(sanpham.mo_ta_chi_tiet);
            $("#hinh_anh_san_pham").attr('src', sanpham.hinh_anh);
            $("#link_san_phams").attr('href', sanpham.id);
        });
</script>

</html>
