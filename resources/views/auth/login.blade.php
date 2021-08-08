
  @extends('layouts.master_home')

  @section('home_content')

  <section id="login" class="services section-bg">
    <div class="container">
       
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('login') }}">
                                  @csrf

                                  <div class="row">
                                    <div class="form-group col-md-12 mb-4">
                                      <input type="email" class="form-control input-lg" aria-describedby="emailHelp" placeholder="Email" name="email">
                                    </div>
                                    <div class="form-group col-md-12 ">
                                      <input type="password" class="form-control input-lg" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-md-12">
                                      <div class="d-flex my-2 justify-content-between">
                                        <div class="d-inline-block mr-3">
                                          <label class="control control-checkbox">Remember me
                                            <input type="checkbox" />
                                            <div class="control-indicator"></div>
                                          </label>
                                  
                                        </div>
                                        
                                      </div>
                                      <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Sign In</button>
                                      <hr>
                                      <div class="text-center">
                                          <a class="small" href="{{ route('password.request') }}">Mot de passe oubliée?</a>
                                      </div>
                                      <div class="text-center">
                                          <a class="small" href="{{ route('register') }}">S'inscrire!</a>
                                      </div>
                                  </div>
                                    </div>
                                  </div>
                                </form>
                                   
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </section>
   
   
   
    @endsection