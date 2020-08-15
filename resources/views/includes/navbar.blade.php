@section('navbar')

<div class="row" style="background:#d66f07;">
    <div class="col-12">
        <div class="w-100 mx-auto d-flex justify-content-center">
          <img src="https://eg.jumia.is/cms/summer-2020/sticky-banner/Artboard_1_copy.png" alt="" >
        </div>
    </div>
</div>


<header>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="dropdownBars">
            <button class="btn dropbtnBars">
              <i class="fa fa-bars" style="font-size:20px"></i>
            </button>
            
            <div class="dropdown-content-bars">
                @foreach ($categories as $cat)
                  @if($cat->parent_id == 0 )
                      <a  href="{{route('one_main_category',$cat->name)}}">{{  $cat->name  }} </a>
                  @endif
                @endforeach  
            </div>
          </div>
          <a class="navbar-brand" href="{{route('main')}}"><img src="https://veekayproducts.com.ng/wp-content/uploads/2018/09/jumia-coupon-logo.fw_.png" alt="" style="width:170px"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-epanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0">
              <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                  <input class="form-control mr-sm-2" type="search" placeholder="Search products, brands and categories" aria-label="Search" style="width: 470px;">
              </div>
              <button class="btn my-2 my-sm-0" style="background-color:#f68b1e;color:#fff" type="submit" >SEARCH</button>
            </form>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span style="padding-right: 5px;font-size: 18px;"><i class="far fa-user"></i></span>
                  Login
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="btn dropdown-item login-btn" href="{{route('login')}}">Login</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item create_account_BTN" href="{{route('register')}}">CREAT AN ACCOUNT</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"> <div class="row"> <span class="col-2" style="padding-right: 5px;font-size: 14px;"><i class="far fa-user"></i></span> <div class="col-10">Account </div></div></a>
                  <a class="dropdown-item" href="#"><div class="row"> <span class="col-2" style="padding-right: 5px;font-size: 14px;"><i class="fas fa-store"></i></span> <div class="col-10">Orders </div></div></a>
                  <a class="dropdown-item" href="#"><div class="row"> <span  class="col-2" style="padding-right: 5px;font-size: 14px;"><i class="far fa-heart"></i></span> <div class="col-10">Saved Items</div></div></a>

                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span style="padding-right: 5px;font-size: 18px;"><i class="far fa-question-circle"></i></span>
                  Help
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">How to buy on Jumia?</a>
                  <a class="dropdown-item" href="#">How to pay on Jumia?</a>
                  <a class="dropdown-item" href="#">How to use a voucher?</a>
                  <a class="dropdown-item" href="#">How to return a product on Jumia?</a>
                  <a class="dropdown-item" href="#">Delivery timelines</a>
                  <a class="dropdown-item" href="#">Jumia Express</a>
                  <a class="dropdown-item" href="#">FAQs</a>
                  <a class="dropdown-item" href="#">Contact us</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" tabindex="-1" aria-disabled="true" href="{{route('get_cart')}}"><span style="padding-right: 5px;font-size: 18px;"><i class="fa fa-shopping-cart"><span class="dot"><div class="dot_text">0</div></span></i></span >Cart</a>
              </li>
              
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>


@endsection