
<style>
    html, body {
        height: 100%;
        margin: 0;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .wrapper {
        flex: 1 0 auto;
    }

    footer {
        margin-top: auto;
        background-color: #222;
        padding: 20px 0;
    }

    footer a {
        color: #00bcd4;
        text-decoration: none;
    }

    footer a:hover {
        text-decoration: underline;
    }

    .link-active {
        color: #fff;
        font-weight: bold;
        margin-bottom: 0.75rem;
    }

    .footer-contact i {
        color: #00bcd4;
        margin-right: 0.5rem;
    }

    .footer-contact p {
        margin: 0.5rem 0;
    }

    /* Nút nổi bên phải */
    .nav-fixed {
        position: fixed;
        bottom: 100px;
        right: 20px;
        list-style: none;
        z-index: 1000;
    }

    .nav-fixed li {
        margin: 10px 0;
        background-color: #0084ff;
        border-radius: 50%;
        width: 48px;
        height: 48px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .nav-fixed li:hover {
        transform: scale(1.1);
    }

    .nav-fixed li a i {
        color: #fff;
    }

    .footer-mailchimp-container {
        width: 100%;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #444;
    }
    
    .footer-mailchimp {
        background: white;
        padding: 15px;
        border-radius: 5px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        height: 100%;
    }
    
    /* Nút subscribe */
    .footer-mailchimp #mc-embedded-subscribe {
        background: #00bcd4;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 4px;
        cursor: pointer;
    }
    
    /* Input fields */
    .footer-mailchimp input[type="email"],
    .footer-mailchimp input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    
    /* Ẩn các phần không cần thiết */
    .footer-mailchimp .indicates-required,
    .footer-mailchimp .mc-field-group label,
    .footer-mailchimp .optionalParent,
    .footer-mailchimp .refferal_badge {
        display: none;
    }
    
    /* Tiêu đề form */
    .footer-mailchimp h2 {
        font-size: 16px;
        margin-top: 0;
        margin-bottom: 15px;
        color: #222;
    }
</style>

<footer class="sticky-footer">
    <div class="container-lg">
        <h2 class="guide__title mt-3">
            <a href="#"><img src="" style="margin-top: -8px;height: 45px"></a>
        </h2>
        <div class="row">
            <section class="col-12 col-lg-4">
                <div class="h h4 link-active">Về chúng tôi</div>
                <p class="mt-3 small">Shop chuyên cung cấp tài khoản game, hỗ trợ nhanh chóng và uy tín.</p>
            </section>

            <section class="col-12 col-lg-4">
                <div class="h h4 link-active">Quyền lợi khách hàng</div>
                <p>Chúng tôi luôn đặt quyền lợi khách hàng lên hàng đầu và hỗ trợ nhiệt tình để bạn có trải nghiệm tốt nhất.</p>
            </section>

            <section class="col-12 col-lg-4 footer-contact">
                <i class="fab fa-facebook-square fa-2x mr-2">
                </i>
                <i class="fab fa-youtube fa-2x"></i>
                <p class="mt-3 fw-bold"><i class="fa fa-phone mr-2"></i>Hotline: 0858823948</p>
                <p class="fw-bold"><i class="fa fa-clock mr-2"></i>Work time: 24/7</p>
                <p class="fw-bold"><i class="fa fa-map-marked-alt mr-2"></i>Address: Tp.Hồ Chí Minh</p>
            </section>

            <div class="col-12 col-lg-4 footer-mailchimp-container">
                <div class="footer-mailchimp">
                    <div id="mc_embed_signup">
                        <form action="https://gmail.us2.list-manage.com/subscribe/post?u=7f1f66efcc0431b5d74ca3fcb&amp;id=69e5b46739&amp;f_id=00a7c2e1f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                            <div id="mc_embed_signup_scroll">
                                <h2>Đăng ký nhận tin</h2>
                                <div class="mc-field-group">
                                    <input type="email" name="EMAIL" class="required email" id="mce-EMAIL" required="" placeholder="Email của bạn">
                                </div>
                                <div class="mc-field-group">
                                    <input type="text" name="FNAME" class="text" id="mce-FNAME" placeholder="Tên của bạn (không bắt buộc)">
                                </div>
                                <div aria-hidden="true" style="position: absolute; left: -5000px;">
                                    <input type="text" name="b_7f1f66efcc0431b5d74ca3fcb_69e5b46739" tabindex="-1" value="">
                                </div>
                                <div class="clear">
                                    <input type="submit" name="subscribe" id="mc-embedded-subscribe" class="button" value="Đăng ký">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<ul class="nav-fixed">
 <li class="nav-fixed-zalo"> <a target="_blank" href="https://zalo.me/<?=$CMSNT->site('hotline_zalo')?>"><img src="../../assets/img/images/icon/zalo.png" alt=""></a></li>
    <li class="nav-fixed-face"> 
        <a target="_blank" href="<?=$CMSNT->site('facebook_url')?>">
            <i class="fab fa-facebook-f fa-lg"></i>
        </a>
    </li>
    <li class="nav-fixed-phone"> 
        <a href="tel:0587289023">
            <i class="fa fa-phone fa-lg"></i>
        </a>
    </li>
</ul>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<!-- jQuery -->
<script src="/style/plugins/jquery/jquery.min.js" type="text/javascript"></script>
<!-- Bootstrap 4 -->
<script src="/style/plugins/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="/style/dist/js/adminlte.min.js" type="text/javascript"></script>
<!-- Lightbox JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>


<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });

    // sweet alert
</script>
<!-- <script src="https://www.paypal.com/sdk/js?client-id=AbSfMuKK5xjIy5doAJ84SPEmFXCLF72Avoxg5xCjFdpXFfg0mOnf7Ncu89otqWU0f8OOuYjuhb0C-NlB&currency=USD"></script>
<script>
    paypal.Buttons({
        style: {
            layout: 'horizontal',
            color:  'blue',
            shape:  'rect',
            label:  'paypal'
        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '5.00' 
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Thanh toán thành công cho ' + details.payer.name.given_name);
                
            });
        }
    }).render('#paypal-button-container');
</script> -->

<script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script><script type="text/javascript">(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';fnames[6]='COMPANY';ftypes[6]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script></div>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6889293da35cbd1929172d3b/1j1bsi75a';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<!--End of Tawk.to Script-->
<!--End of Tawk.to Script-->
<!-- Google tag (gtag.js) -->
<!-- Google tag (gtag.js) -->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-40RYY6YBQD"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-40RYY6YBQD');
</script>

<!-- Đánh dấu JSON-LD được tạo bởi Trình trợ giúp đánh dấu dữ liệu có cấu trúc của Google. -->
<script type="application/ld+json">
[
  {
    "@context": "http://schema.org",
    "@type": "Product",
    "name": "SHOP ACC GAME",
    "image": [
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/images/2024-07-30/genshin-qD.webp",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/images/2024-07-30/zzz-NK.webp",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/images/2024-07-30/sr-U0.webp",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/images/2024-07-30/ww-4R.webp",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/WW%20VIP%20GIF.gif",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/images/2024-10-25/IMG_20241025_214305-MA.webp",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/gif%20acc%20vip%20zzz.gif",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/gif%20acc%20normal%20zzz%20(1).gif",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/gif%20acc%20reroll%20zzz.gif",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/GS%20VIP%20GIF.gif",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/GS%20REROLL%20GIF.gif",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/images/2024-02-28/RANDOM%20(1)-0N.png",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/GIF-ACC-VIP-720p.gif",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/GIF%20ACC%20STARTER%20720p.gif",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/live/52954974470_9a463baec9_o.png",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/imgur/OkMBCaB.jpeg",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/images/2024-06-14/z5537410205444_50cb5e6176987408ff9e29152b89594b-97.webp",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/live/52955242018_0e3c2c3304_o.png",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/live/52955242013_8c9a6c27b5_o.png"
    ],
    "description": "Về chúng tôi</DIV>\n                <P class=\"mt-3 small\">Shop chuyên cung cấp tài khoản game, hỗ trợ nhanh chóng và uy tín"
  },
  {
    "@context": "http://schema.org",
    "@type": "Product",
    "name": "SHOP ACC GAME",
    "image": [
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/images/2024-07-30/genshin-qD.webp",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/images/2024-07-30/zzz-NK.webp",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/images/2024-07-30/sr-U0.webp",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/images/2024-07-30/ww-4R.webp",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/WW%20VIP%20GIF.gif",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/images/2024-10-25/IMG_20241025_214305-MA.webp",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/gif%20acc%20vip%20zzz.gif",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/gif%20acc%20normal%20zzz%20(1).gif",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/gif%20acc%20reroll%20zzz.gif",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/GS%20VIP%20GIF.gif",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/GS%20REROLL%20GIF.gif",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/images/2024-02-28/RANDOM%20(1)-0N.png",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/GIF-ACC-VIP-720p.gif",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/GIF%20ACC%20STARTER%20720p.gif",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/live/52954974470_9a463baec9_o.png",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/imgur/OkMBCaB.jpeg",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/shop/file/73/images/2024-06-14/z5537410205444_50cb5e6176987408ff9e29152b89594b-97.webp",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/live/52955242018_0e3c2c3304_o.png",
      "https://shopgametheboys.infinityfreeapp.com/assets/img/live/52955242013_8c9a6c27b5_o.png"
    ],
    "description": "Quyền lợi khách hàng</DIV>\n                <P>Chúng tôi luôn đặt quyền lợi khách hàng lên hàng đầu và hỗ trợ nhiệt tình để bạn có trải nghiệm tốt nhất."
  }
]
</script>
</body>