
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
<link rel="stylesheet" href="/css/custom.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	@extends("shared.header")
	<div style="height:90px"></div>
	
	@yield("content")

	<!-- Footer -->
	@extends("shared.footer")	
	<!-- Modal -->
	<form action="/quizzes/take" method="GET">
		<div class="modal fade" id="join-room" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="room_id"/>
						<input type="hidden" name="user_id"/>
						<input type="hidden" name="quiz_id"/>
						<input type="text" name="nickname" class="form-control" placeholder="Nick name" autocomplete="off" required/>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/popper.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="/plugins/easing/easing.js"></script>
<script src="/js/custom.js"></script>
<script src="/js/ownjs.js"></script>
</body>
</html>