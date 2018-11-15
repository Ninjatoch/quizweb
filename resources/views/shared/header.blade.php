<header class="header">
			
  <!-- Top Bar -->
  <div class="top_bar">
    <div class="top_bar_container">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
              <div class="top_bar_phone"><span class="top_bar_title">phone:</span>0965 369 639</div>
              <div class="top_bar_right ml-auto">

                <!-- Social -->
                <div class="top_bar_social">
                  <span class="top_bar_title social_title">follow us</span>
                  <ul>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>				
  </div>

  <header class="header">
    
    <!-- Top Bar -->
    <div class="top_bar">
      <div class="top_bar_container">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                <div class="top_bar_phone"><span class="top_bar_title">phone:</span>0965 369 639</div>
                <div class="top_bar_right ml-auto">

                  <!-- Social -->
                  <div class="top_bar_social">
                    <span class="top_bar_title social_title">follow us</span>
                    <ul>
                      <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>				
    </div>

    <!-- Header Content -->
    <div class="header_container">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="header_content d-flex flex-row align-items-center justify-content-start">
              <div class="logo_container mr-auto">
                <a href="#">
                  <div class="logo_text">QuizWeb</div>
                </a>
              </div>
              <nav class="main_nav_contaner">
                <ul class="main_nav">
                  <li><a href="/">Home</a></li>
                  <li><a href="#">Get Help</a></li>
                  <li><a href="/login">Login</a></li>
                  <li><a href="/register">Register</a></li>
                </ul>
              </nav>
              <div class="header_content_right ml-auto text-right">
                <div class="header_search">
                  <div class="search_form_container">
                    <form action="/rooms/search" method="POST"  id="search_form" class="search_form trans_400">
                      @csrf
                      <input type="search" autocomplete="off" name="room_name" class="header_search_input trans_400" placeholder="Search Room" required="required">
                      <div class="search_button">
                        <i class="fa fa-search" aria-hidden="true"></i>
                      </div>
                    </form>
                  </div>
                </div>

                <!-- Hamburger -->

                <div class="user"><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></div>
                <div class="hamburger menu_mm">
                  <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </header>

  @extends("shared.menu")
</header>