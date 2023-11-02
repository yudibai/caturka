<header id="header" class="fixed-top d-flex align-items-center " >
    <div class="col-lg-12 d-flex align-items-center justify-content-between" style="padding-right: 30px">
      <a class="navbar-brand" href="{{url('/')}}" style="display: flex;
   
      align-items: center;"> <img src="/assets/client/img/Screenshot_2023-06-21_at_23.55.06-removebg-preview.png" alt="" style="height: auto; width: 100%; max-width: 5vw; "> <span style="font-family: 'Montserrat'; font-weight: 1000; font-size: 2.5vw;font-weight: 500;margin-left:10px;">PT CATUR KREASI AKSARA </span> </a>
      <nav id="navbar" class="navbarResponsive" >
          <ul>
            <li>
              <a class="nav-link" href="{{url('/')}}">Home</a>
              <div class="text-left" id="mantabek" style="font-weight: 600;padding-left: 5px; padding-top: 8px; color: #6C5F5B; font-size: 15px">
                <span>Beranda</span>
              </div>
            </li>
            <li>
              <a class="nav-link" href="{{url('/product')}}">Product</a>
              <div class="text-left" id="mantabek" style="font-weight: 600;padding-left: 5px; padding-top: 8px; color: #6C5F5B; font-size: 15px">
                <span>Produk</span>
              </div>
             </li>
            <li><a class="nav-link" href="{{url('/equipment')}}">Equipment</a>
              <div class="text-left" id="mantabek" style="font-weight: 600;padding-left: 5px; padding-top: 8px; color: #6C5F5B; font-size: 15px">
                <span>Perlengkapan</span>
              </div>
            </li>
            <li><a class="nav-link" href="{{url('/contact')}}">Contact Us</a>
              <div class="text-left" id="mantabek" style="font-weight: 600;padding-left: 5px; padding-top: 8px; color: #6C5F5B; font-size: 15px">
                <span>Hubungi Kami</span>
              </div>
            </li>
            <li><a class="nav-link" href="{{url('/about')}}">Contact Us</a>
              <div class="text-left" id="mantabek" style="font-weight: 600;padding-left: 5px; padding-top: 8px; color: #6C5F5B; font-size: 15px">
                <span>Tentang Kami</span>
              </div>
            </li>
          </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>

  <style>
    .nav-link span {
      margin-top: 10px;
    }

    @media screen and (max-width: 990px) {
      #mantabek span {
        margin-left: 15px;
      }
    }
  </style>
