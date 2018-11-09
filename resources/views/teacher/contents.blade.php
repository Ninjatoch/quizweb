@extends("shared.teacher-dashboard")
@section("content")
<div style="height: 100px;"></div>
<div class="home">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="row" style="margin-bottom: 40px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="#">
                            <div class="round">
                                <i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i>
                            </div>
                            <h3 class="center">Quiz</h3>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="">
                            <div class="round">
                                <i class="fa fa-folder-o fa-2x" aria-hidden="true"></i>
                            </div>
                            <h3 class="center">Room</h3>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a href="#">
                            <div class="round">
                                <i class="fa fa-file-o fa-2x" aria-hidden="true"></i>
                            </div>
                            <h3 class="center">Report</h3>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <a href="">
                                <div class="round">
                                    <i class="fa fa-file-o fa-2x" aria-hidden="true"></i>
                                </div>
                                <h3 class="center">Result</h3>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <a href="#">
                                <div class="round">
                                    <i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>
                                </div>
                                <h3 class="center">Exit</h3>
                            </a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection