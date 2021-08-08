
<header id="header" class="fixed-top">
  <div class="container-fluid d-flex">

      <div class="logo mr-auto">
          <!-- <h1 class="text-light"><a href="index.html"><span>ZENTOPIA</span></a></h1> -->
          <!-- Uncomment below if you prefer to use an image logo -->
          <a href="/"><img src="{{ asset('img/logotext.png') }}" alt="" class="img-fluid"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
          <ul>
              <li><a href="/  ">Home</a></li>


              <li><a href="#about">About Us</a></li>
              <li><a href="#services">Nos Services</a></li>

              <li><a href="/mentorlist">Nos Mentors</a></li>
              <li class="drop-down"><a href="">Nos Features</a>
                  <ul>

                      <li><a href="#">Nos recettes</a></li>
                      <li><a href="#">Nos cours</a></li>
                      <li><a href="#">Nos evenements</a></li>
                  </ul>
              </li>
              <li><a href="#contact">Contact Us</a></li>
              @if (Auth::check())
                  <!-- Nav Item - User Information -->
                  <li class="drop-down"><a href="#" id="userDropdown" role="button"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="mr-2 d-none d-lg-inline medium">{{ Auth::user()->name }}</span>
                          <img class="img-profile rounded-circle"  src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                      </a>
                      <ul>
                         
                          <li><a href="/admin/dashboard">Espace Admin</a></li>
                          <li><a href="/admin/profile">Profil</a></li>  
                          <form method="POST" action="{{ route('logout') }}">
                            @csrf
        
                            <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-responsive-nav-link>
                        </form>

                      </ul>
                  </li>

              @else
              <li><a href="{{ route('login') }}">Se Connecter</a></li>
              <li class="get-started"><a href="{{ route('register') }}">S'inscrire</a></li>
             @endif
          </ul>
      </nav><!-- .nav-menu -->

  </div>
</header><!-- End Header -->