


<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
      <!-- Aplication Brand -->
      <div class="app-brand">
        <a href="/index.html">
          
          <span class="brand-name">Admin Dashboard</span>
        </a>
      </div>
      <!-- begin sidebar scrollbar -->
      <div class="sidebar-scrollbar">

        <!-- sidebar menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">
          

          
            <li  class="has-sub active expand" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                aria-expanded="false" aria-controls="dashboard">
                <i class="mdi mdi-view-dashboard-outline"></i>
                <span class="nav-text">Home</span> <b class="caret"></b>
              </a>
              <ul  class="collapse show"  id="dashboard"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
    
                    <li  class="active" >
                      <a class="sidenav-item-link" href="{{ route('home.sliders')}}">
                        <span class="nav-text">Slider</span>
                        
                      </a>
                    </li>

                    <li  class="active" >
                      <a class="sidenav-item-link" href="{{ route('home.about')}}">
                        <span class="nav-text">Home About</span>
                        
                      </a>
                    </li>

                    <li  class="active" >
                      <a class="sidenav-item-link" href="{{ route('multi.image')}}">
                        <span class="nav-text">Home Portfolio</span>
                        
                      </a>
                    </li>

                    <li  class="active" >
                      <a class="sidenav-item-link" href=" {{ route('all.Brand')}} ">
                        <span class="nav-text">Home Brand</span>
                        
                      </a>
                    </li>

                    <li  class="active" >
                      <a class="sidenav-item-link" href=" {{ route('all.Contact')}} ">
                        <span class="nav-text">Contact Message</span>
                        
                      </a>
                    </li>
                
                </div>
              </ul>
            </li>
        </ul>

      </div>

      <hr class="separator" />
      <div class="sidebar-footer">
        
      </div>
    </div>
  </aside>