<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quiz Website</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="description" content="Quiz Website">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
  <link href="/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/animate.css">
  <link rel="stylesheet" type="text/css" href="/css/main_styles.css">
  <link rel="stylesheet" type="text/css" href="/css/responsive.css">
  <link rel="stylesheet" href="/css/dashboard.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

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
                            <li><a href="/quiz">Quizzes</a></li>
                            <li><a href="/room">Rooms</a></li>
                            <li><a href="/report">Reports</a></li>
                            <li><a href="/result">Result</a></li>
                          </ul>
                        </nav>
                          <!-- Hamburger -->
                        <div class="header_content_right ml-auto text-right">
                            <div><a href="#" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">Log out</a></div>
                              <form id="logout-form" style="display: none;" action="/logout" method="POST">
                                @csrf 
                              </form>
                            <div class="hamburger menu_mm">
                                <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                            </div>
                        </div>
                      </div>
          
                    </div>
                  </div>
                </div>
              </div>
            
         
          
        @extends("shared.menu")
    </header>
	<div style="height: 90px"></div>
	
  @yield("content")
  
  <!-- Modal -->
	<form action="#" method="GET">
	    <div class="modal fade" id="correction-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			        <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
				    </div>
			        <div class="modal-body">
                        <div class="correct_quiz"></div>
				    </div>
			        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="takequiz" class="btn btn-primary">Take Quiz</button>
			    	</div>
		        </div>
			</div>
		</div>
	</form>
</div>

<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/popper.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="/plugins/easing/easing.js"></script>
<script src="/js/custom.js"></script>
<script src="/js/quiz.js"></script>
<script src="/js/question.js"></script>
<script src="/js/correct-quiz.js"></script>
<script src="/js/utilise.js"></script>
</body>
</html>