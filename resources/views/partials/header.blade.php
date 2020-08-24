<section class="container-fluid sticky-top header">
    <div class="container">
      <div id="head">
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{route('soap.index')}}"><img class="logo-img" src="{{asset('img/icon/logo.png')}}"></a>
            <a class="title-link" href="{{route('soap.index')}}"><p class="nav-title">Wavesoap</p></a>
            <button class="navbar-toggler  navbar-light bg-lightn" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
              <ul class="navbar-nav ml-auto w-100 justify-content-end">
                <li class="nav-item active">
                  <a class="link nav-link pt-3" href="{{route('soap.index')}}"><h6>Home </h6><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pt-3" href="{{route('soap.about')}}"><h6>About</h6></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pt-3" href="{{route('soap.collection')}}"><h6>Products</h6></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pt-3" href="{{route('soap.cart')}}">
                  <h6>
                    <span>Cart</span>
                    <i class="fas fa-shopping-cart"></i>
                    @if(Session::has('cart'))
                    <span class="badge badge-warning" id="cartnum">
                    {{Session::get('cartNum')}}
                    </span>
                    @else
                    <span></span>
                    @endif
                  </h6>
                  </a>
                </li>
              </ul>
            </div>
          </nav>
       </div>
    </div>
  </section>