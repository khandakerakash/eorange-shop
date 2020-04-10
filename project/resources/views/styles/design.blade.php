@if($gs->rtl == 1)
<style type="text/css">
input, textarea, select, ul{
    direction: rtl;
}
.header-top-left-wrap li a,
.header-top-right-wrap li a,
.header-middle-right-wrap li a {
    border-left: 1px solid #ffffff;
    border-right: none;
}
.header-top-left-wrap li:last-child a,
.header-top-right-wrap li:last-child a,
.header-middle-right-wrap li:nth-child(3) a {border-left: none;}
.header-top-left-wrap li i.fa,
.header-top-right-wrap li i.fa {margin-left: 5px; margin-right: 0;}
.header-middle-right-wrap li a {
    border-color: #333333;
}
.cart-quantity {
    left: 3px;
    right: auto;
}
.addToMycart, .addToMycart1 {
    left: -3px;
    right: auto;
    text-align: right;
}

.header-search-box button {
    border-top-left-radius: 30px;
    border-bottom-left-radius: 30px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    margin-right: -3px;
}
.header-search-box input {
    border-top-right-radius: 30px;
    border-bottom-right-radius: 30px;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    padding-right: 10px;
}
.header-menu-wrap li ul {
    right: 0;
    left: auto;
    top: 45px;
    text-align: right;
}
.header-bottom-left-wrap h5 {
    text-align: right;
}
.header-bottom-left-wrap .fa-bars {margin-left: 10px;}
.header-bottom-left-wrap .fa-angle-down {
    left: 30px;
    right: auto;
    top: 0;
}
.header-bottom-left-wrap ul li .fa-angle-left {
    left: 0;
    right: auto;
    top: 50%;
}
.header-bottom-left-wrap ul li img {
    height: 15px; 
    width: 12px;
    margin-left: 10px;
    margin-right: 0;
}
.header-bottom-left-wrap ul li ul {
    right: 100%;
    left: auto;
    margin-left: 0;
    margin-right: 30px;
}
.subscribe-form input,
.subscribe-form button {
    padding-right:15px;
    padding-left: 0;
}
.subscribe-form button {
    margin-left: -0;
    margin-right: -35px;
    z-index: 9;
    position: relative;
}
.single-footer-wrap li span {
    position: absolute;
    right: 50px;
    left: 0;
    top: 10px;
    line-height: 1.4;
}
.single-footer-wrap.contact li span {right: 30px; left: 0;}
.single-footer-wrap.information li:hover {margin-right: 10px; margin-left: 0;}
.footer-social-links {text-align: left;}
.footer-copyright-area {text-align: right;}
.mean-container a.meanmenu-reveal {
    left: auto !important;
    right: 0 !important;
}
.product-filter-option ul li ul li i.fa-angle-left {
    margin-left: 10px;
    margin-right: 3px;
}
.product-filter-option ul li span i.fa {
    float: right;
    margin-left: 12px;
    margin-right: 0;
}

.styled-faq .panel .panel-heading h4 a span {margin-left: 0;margin-right: 25px;}

.styled-faq .panel .panel-heading h4 a i.fa {

    right: 15px;
    left: auto;
    top: 15px;
}
.news-list-meta {
    right: 0;
    left: auto;
}
.slicknav_btn {float: left;}
    @media only screen and (max-width: 767px) { 
        .header-middle-right-wrap li a { 
            border-left: none;
    }
    .footer-social-links, .footer-copyright-area {text-align: center;}
    .footer-social-links
    {
        margin-bottom: 5px;
    }
.slicknav_menu {
    display: inline-block;
    background-color: #f3f3f3;
    padding: 0;
    position: absolute;
    left: 0 !important;
    z-index: 999;
    width: 100%;
    right: auto;
}
.slicknav_btn {
    border-radius: 0;
    background: transparent;
    padding: 7px;
    text-shadow: none;
    z-index: 99;
    float: left;
}
.mean-container {
    position: relative;
}
.mean-container .mean-bar {
    background: transparent;
    padding: 0;
    position: absolute;
    z-index: 999;
    width: 90%;
    top: 0;
    right: 0;
    left: auto;
}
.mean-container a.meanmenu-reveal {
    background: #0163d2;
    padding: 12px;
    top: -1px;
    left: auto !important;
    right: 0 !important;
}
.mean-container .mean-nav {
    overflow-y: hidden;
}
.mean-container .mean-nav {
    margin-top: 42px;
}
.mean-container .mean-nav ul li a .fa-angle-left{
    display: none;
    }
.slicknav_arrow {
    float: left;
}
.header-search-box button {
    margin-left: 7px;
    margin-top: 15px;
}
.header-search-box input {
    float: right;
}
.header-searched-item-list-wrap {
    left: 20%;
}
}
</style>
@endif

<style type="text/css">

            #cover {
                background: url({{asset('assets/images/'.$gs->loader)}}) no-repeat scroll center center #FFF;
                position: fixed;
                height: 100%;
                width: 100%;
                z-index: 9999;
            }
            .featured_loader {
                background: url({{asset('assets/images/'.$gs->loader)}}) no-repeat scroll center center #FFF;
                position: absolute;
                height: 100%;
                width: 100%;
                z-index: 9999;
            }
            .gallery-overlay {
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .single-news-list::before {

                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};

            }
.overlay::after {
    background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
}
.scrollup {
    background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
}

            .header-middle-right-wrap li a {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .header-middle-mid-wrap a {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }        
            .header-search-box.mobile {
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .black-btn {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .black-btn:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}} !important;
            }
            .slicknav_menu .slicknav_icon {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .mean-container a.meanmenu-reveal {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
             .mean-container .mean-nav {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .client-logo-wrap .owl-prev,
            .client-logo-wrap .owl-next {
                box-shadow: 0 0 1px {{$gs->colors == null ? '#0163d2':$gs->colors}};
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .client-logo-wrap .owl-prev:hover,
            .client-logo-wrap .owl-next:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .review-carousel-wrap .owl-prev:hover,
            .review-carousel-wrap .owl-next:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .single-footer-wrap.information li:hover a {color: {{$gs->colors == null ? '#0163d2':$gs->colors}};}
            .single-footer-wrap.contact li i.fa {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }

            .subscribe-newsletter-text-area {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .product-type-tab .nav-tabs>li.active>a,
            .product-type-tab .nav-tabs>li.active>a:focus,
            .product-type-tab .nav-tabs>li.active>a:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .featured-tag span {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .featured-tag span:after {
                border-left: 10px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .featured-carousel .owl-prev:hover,
            .featured-carousel .owl-next:hover {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                border-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .single-product-area:hover {border-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};}
            .product-hover-area span {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .product-hover-area span:hover {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .addToCart-btn {
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .addToCart-btn:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .blog-comments-msg-area button {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .blog-comments-msg-area button:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .styled-faq .panel-title {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}}; 
            }
            .comments-form input[type="submit"], 
            .comments-form button[type="submit"]  {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .comments-form input[type="submit"]:hover, 
            button[type="submit"]:hover {
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .tab-list li.active a {
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};;
            }
            .tab-list li.active a:after {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};;
            }
            .btn-review {
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};;
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};;
            }
            .btn-review:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};;
            }
            .product-details-wrapper .productDetails-addCart-btn {
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .product-details-wrapper .productDetails-addCart-btn:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .product-checkOut-wrap .form-group .order-btn {
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .product-checkOut-wrap .form-group .order-btn:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .login-tab .nav-tabs>li.active>a, 
            .login-tab .nav-tabs>li.active>a:focus, 
            .login-tab .nav-tabs>li.active>a:hover {
                border-top: 5px solid {{$gs->colors == null ? '#0163d2':$gs->colors}} !important;
            }
            .login-form button {
                background: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .forgot-area {margin-top: 10px;}
            .forgot-area a {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .pagination>.disabled>a, 
            .pagination>.disabled>a:focus, 
            .pagination>.disabled>a:hover, 
            .pagination>.disabled>span, 
            .pagination>.disabled>span:focus, 
            .pagination>.disabled>span:hover {
                color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }

            .pagination>.disabled>a, 
            .pagination>.disabled>a:focus, 
            .pagination>.disabled>a:hover, 
            .pagination>.disabled>span, 
            .pagination>.disabled>span:focus, 
            .pagination>.disabled>span:hover {
                border-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }

            .pagination>.active>a, 
            .pagination>.active>a:focus, 
            .pagination>.active>a:hover, 
            .pagination>.active>span, 
            .pagination>.active>span:focus, 
            .pagination>.active>span:hover {
                background-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};
                border-color: {{$gs->colors == null ? '#0163d2':$gs->colors}};

            }
            .pagination>li>a, .pagination>li>span {
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};

            }
            .pagination>li>a, .pagination>li>span {
                color:{{$gs->colors == null ? '#0163d2':$gs->colors}};
                border: 1px solid {{$gs->colors == null ? '#0163d2':$gs->colors}};
            }
            .subscribe-newsletter-text-area:before {
                border-left: 29px solid {{$gs->colors == null ? '#024a9b':$gs->colors}};
            }
            .subscribe-newsletter-text-area:after {
                border-left: 29px solid {{$gs->colors == null ? '#024a9b':$gs->colors}};
            }
            .news-list-meta {
                background-color: {{$gs->colors == null ? '#0163D3':$gs->colors}}; 
            }
            .single-news-list:hover .news-list-button {color: {{$gs->colors == null ? '#0163D3':$gs->colors}};}
            .header-top-area {
                background: {{$gs->colors == null ? '#0363D1':$gs->colors}}; 

            }
            .header-top-right-wrap li ul {
                background: {{$gs->colors == null ? '#0363D1':$gs->colors}};
            }
            .header-bottom-left-wrap {
                background: {{$gs->colors == null ? '#0363D1':$gs->colors}};
            }
            .header-bottom-left-wrap ul {
                background: {{$gs->colors == null ? '#0363D1':$gs->colors}};
            }
            .header-menu-wrap li ul li:hover {background: {{$gs->colors == null ? '#0363D1':$gs->colors}};}
            .slicknav_nav {
                background: {{$gs->colors == null ? '#0363D1':$gs->colors}};
            }
            .service-icon-img {
                background: {{$gs->colors == null ? '#0363D1':$gs->colors}};
            }
            .count-down-button .btn {
                background: {{$gs->colors == null ? '#0363D1':$gs->colors}};
            }
            .header-search-box button {
                background: {{$gs->colors == null ? '#0165CB':$gs->colors}};
            }
            .cart-quantity {
                background: {{$gs->colors == null ? '#0F5EC2':$gs->colors}};
            }
            .product-price {
                color: {{$gs->colors == null ? '#0063d1':$gs->colors}};
            }
            .single-product-area::before {
                background: {{$gs->colors == null ? '#0063d1':$gs->colors}};
            }
</style>