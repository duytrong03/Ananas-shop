<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>product_details</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="..\style\product_details.css">
    <script>
    function restrictInput(input) {
      if (!input.value.trim()) {
        alert('Vui lòng nhập giá trị vào ô input.');
        input.value = 1;
      } else {
        const inputValue = parseInt(input.value);
        if (isNaN(inputValue) || inputValue < 1) {
          alert('Giá trị không hợp lệ. Vui lòng nhập số lớn hơn hoặc bằng 1.');
          input.value = 1;
        }
      }
    }
    </script>
  </head>
  <body>
    <header>
        <ul class="container-header">
          <li>
            <a href="#">
              <img
              src="https://ananas.vn/wp-content/themes/ananas/fe-assets/images/svg/icon_tra_cuu_don_hang.svg"
              alt=""
            />
              tra cứu đơn hàng</a>
          </li>
          <li>
            <a href="#">
            <img
            src="https://ananas.vn/wp-content/themes/ananas/fe-assets/images/svg/icon_tim_cua_hang.svg"
            alt=""
            />
            tìm cửa hàng</a>
          </li>
          <li><a href="#">
            <img
            src="https://ananas.vn/wp-content/themes/ananas/fe-assets/images/svg/icon_heart_header.svg"
            alt=""
            />
            yêu thích</a></li>
          <li>
            <a href="#">
            <img
            src="https://ananas.vn/wp-content/themes/ananas/fe-assets/images//svg/icon_dang_nhap.svg"
            alt=""
          />
            Đăng nhập</a>
          </li>
          <li>
            <a href="cart.html">
              <img
              src="https://ananas.vn/wp-content/themes/ananas/fe-assets/images/svg/icon_gio_hang.svg"
              alt=""
              />
              Giỏ hàng</a>
          </li>
        </ul>
        <div class="container">
          <div class="row p-3">
            <div class="col-md-2">
              <a href="file:///C:/Users/Admin/OneDrive/PhamTienChinh-2121051178/index.html"><img class="logo-img" src="img/Logo_Ananas_Header.png" alt="" /></a>
            </div>
            <div class="col-md-8">
              <ul>
                <a href="#"
                  ><b><li>SẢN PHẨM</li></b></a
                >
                <a href="#"
                  ><b><li>NAM</li></b></a
                >
                <a href="#"
                  ><b><li>NỮ</li></b></a
                >
                <a href="#"
                  ><b><li>SALE OFF</li></b></a
                >
                <a href="" class="icon-sanpham">
                  <li>
                    <img
                      class="header__sanpham-img"
                      src="https://ananas.vn/wp-content/themes/ananas/fe-assets/images/svg/DiscoverYOU.svg"
                      alt=""
                    />
                  </li>
                </a>
              </ul>
            </div>
            <div class="col-md-2">
              <div class="search-container">
                <div class="search-icon">
                  <img src="img/search-icon.jpg" alt="">
                </div>
                <input type="search" class="search-input" placeholder="Tìm kiếm">
              </div>
            </div>
          </div>
        </div>
        <div class=" bg-top ">
          <div class="boxcenter text-center">
            <i>FREE SHIPPING VỚI HÓA ĐƠN CHỈ 900K!</i>
          </div>
    </header>
    <?php
    require "../page/connect.php";
  
    $result = mysqli_query($conn, "SELECT*FROM products WHERE id_sp = ".$_GET['id_sp']);
    $product = mysqli_fetch_assoc($result);
    ?>

    <div class="container" style = "max-width: 1220px;">
        <div class="product-details" style="max-width: 50%;"> 
            <img src="<?= $product['image']?>" alt="">
            <div class="product-img-small">
                <img src="<?= $product['image']?>" alt="" style="width: 24.42%; margin-top: 10px;">
                <img src="<?= $product['image2']?>" alt="" style="width: 24.42%; margin-top: 10px;">
                <img src="<?= $product['image3']?>" alt="" style="width: 24.42%; margin-top: 10px;">
                <img src="<?= $product['image4']?>" alt="" style="width: 24.42%; margin-top: 10px;">
            </div>
        </div>
        <div class="produc-info" style="max-width: 50%;">
            <h1><b><?= $product['name']?></b></h1>
            <p>Mã sản phẩm: <span><b> <?= $product['maSP']?></b></span></p>
            <p class="product-price"><b><?= number_format($product['price'])?> VND</b></p>
            <form id = "add-to-cart" action="cart.php" method="post">
            <input type="number" value = "1" name="quanity[<?= $product['id_sp'] ?>]"  id="quantityInput" style="width: 50px; min= '1';"oninput="restrictInput(this)"><br>
            
            <input type="submit" name="submit" id="" value ="Mua sản phẩm" style ="  width: 30%; height: 60px; background-color: #f15e2c; border-radius: 3px;border: none; margin-top: 20px;">
            </form>
            <p><?= $product['describe_product']?></p>
        </div>
    </div>

    <footer>
      <div class="container-fluid footer-container">
        <div class="row footer-top">
          <div class="col-md-4 footer-house">
            <img src="img/Store.svg" alt="" class="img-house" />
          </div>
          <div class="col-md-2">
            <a class="footer-chinhsach" href="#">Sản Phẩm</a>
            <ul class="footer-hotro">
              <li><a class="footer-luachon" href="#">Giày Nam</a></li>
              <li><a class="footer-luachon" href="#">Giày Nữ</a></li>
              <li>
                <a class="footer-luachon" href="#">Thời trang & Phụ kiện</a>
              </li>
              <li><a class="footer-luachon" href="#">Sale-off</a></li>
            </ul>
          </div>
          <div class="col-md-2">
            <a class="footer-chinhsach" href="#">Về Công Ty</a>
            <ul class="footer-hotro">
              <li><a class="footer-luachon" href="#">Dứa tuyển dụng</a></li>
              <li>
                <a class="footer-luachon" href="#">Liên hệ nhượng quyền</a>
              </li>
              <li><a class="footer-luachon" href="#">Về Ananas</a></li>
            </ul>
          </div>
          <div class="col-md-2">
            <a class="footer-chinhsach" href="#">Hỗ Trợ</a>
            <ul class="footer-hotro">
              <li><a class="footer-luachon" href="#">FAQS</a></li>
              <li><a class="footer-luachon" href="#">Bảo mật thông tin</a></li>
              <li><a class="footer-luachon" href="#">Chính sách chung</a></li>
              <li><a class="footer-luachon" href="#">Tra cứu đơn hàng</a></li>
            </ul>
          </div>
          <div class="col-md-2">
            <a class="footer-chinhsach" href="#">Liên Hệ</a>
            <ul class="footer-hotro">
              <li><a class="footer-luachon" href="#">Email góp ý</a></li>
              <li><a class="footer-luachon" href="#">Hotline</a></li>
              <li><a class="footer-luachon" href="#">0963 429 729</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 footer-map">
            <form action="">
              <button class="box-map">TÌM CỬA HÀNG</button>
            </form>
          </div>

          <div class="col-md-2 footer-social">
            <h4>ANANAS SOCIAL</h4>
            <img class="img-social" src="img/360_F_392719944_L0LYv3e7QozB2tsj3CfUN0HPC8eZQOWb.jpg" alt="" />
          </div>
          <div class="col-md-2 footer-social">
            <p>ĐĂNG KÝ NHẬN MAIL</p>
            <input type="text" name="input-mail" id="" style="width: 100%" />
          </div>
          <div class="col-md-4 footer-logo">
            <img src="img/Logo_Ananas_Footer.svg" alt="" />
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div
              class="col-md-6"
            >
            </div>
            <div class="col-md-6 footer-end">
              Copyright © 2022 Ananas. All rights reserved.
            </div>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
