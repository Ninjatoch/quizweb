$("a[data-room]").click(function(){
    var room = JSON.parse($(this).attr("data-room"));
    console.log(room);
    $("h5.modal-title").html(room["name"]);
    $("input:hidden[name='user_id']").val(room["user_id"]);
    $("input:hidden[name='quiz_id']").val(room["quiz_id"]);
    $("input:hidden[name='room_id']").val(room["id"]);
    $("#take-quiz").attr("data-room", $(this).attr("data-room"));
});
$("#take-quiz").click(function(){
    var room = JSON.parse($(this).attr("data-room"));
    var nickname = $("input[name='nickname']").val();
    if(nickname === "")
    {
        $("input[name='nickname']").attr("placeholder", "Please enter your nickname");
        /*
        swal({
            title: "Warning!",
            text: "Please enter your nickname!",
            icon: "warning",
            button: "Okay",
        });
        */
       console.log(room);
    }
    else
    {
        $.ajax({
            type: "GET",
            url: "/quizzes/take",
            data: {
                user_id: room["user_id"], 
                quiz_id: room["quiz_id"], 
                room_id: room["id"], 
                nickname: nickname 
            },
            success: function(){
                swal("Thank You", "Your request has been submitted", "success")
                .then((value) => { location.href = "/index" });
            }
        });

        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

    }
});

$("input:button[value='TRUE']").click(function(){
    var name = $(this).attr("data-name");
    $("input.answer-false[data-name='" + name + "']").removeAttr("checked");
    $("input.answer-true[data-name='" + name + "']").attr("checked", "checked");
    $(this).removeClass("btn-light");
    $(this).addClass("btn-success", true);
    $("input:button[value='FALSE']").removeClass("btn-danger");
    $("input:button[value='FALSE']").addClass("btn-light");
});

$("input:button[value='FALSE']").click(function(){
    var name = $(this).attr("data-name");
    $("input.answer-true[data-name='" + name + "']").removeAttr("checked");
    $("input.answer-false[data-name='" + name + "']").attr("checked", "checked");
    $(this).removeClass("btn-light");
    $(this).addClass("btn-danger");
    $("input:button[value='TRUE']").removeClass("btn-success");
    $("input:button[value='TRUE']").addClass("btn-light");
});

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab
//

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        $("#nextBtn").val("Submit");
    } else {
        $("#nextBtn").val("Next");
    }
}

function nextPrev(n) {
    if(n > 0 && $("input[name='answer-" + currentTab +"']").attr("type") === "radio")
    {
        if($("input[name='answer-" + currentTab +"']:checked").val() !== undefined)
            sub_nextPrev(n);
        else
            event.preventDefault();
    }
    else
    {
        if($("input[name='answer-" + currentTab + "']").val().trim() === "")
        {
            $("input[name='answer-" + currentTab + "']").val("");
            $("input[name='answer-" + currentTab + "']").focus();
            $("input[name='answer-" + currentTab + "']").attr("placeholder", "this field is required");
            event.preventDefault();
        }
        else
            sub_nextPrev(n);
    }
  }
function sub_nextPrev(n)
{
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
    // ... the form gets submitted:
        $("#btn").hide();
        var answers = [];
        var quiz_id = $("input[name='quiz_id']").val();
        for(var index = 0; index  < x.length; index ++)
        {
            var question_id = $("input[name='question-id-" + index + "']").val();
            if($("input[name='answer-" + index +"']").attr("type") === "radio")
                var response = $("input[name='answer-" + index + "']:checked").val();
            else 
                var response = $("input[name='answer-" + index + "']").val();
            var correct = $("input[name='answer-" + index + "']").attr("data-correct");
            var answer = {
                question_id: question_id,
                answer: response,
                correct: correct
            }
            answers.push(answer);
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/responses",
            data: { answers: answers, quiz_id: quiz_id} ,
            success: function(data)
            {
                console.log(data);
                // swal("THANK YOU","Your answers have been submitted", "success").then(
                //     (value) => { location.href = "/index"; } 
                // );
                    
            }
        });
        //return false;
        event.preventDefault();
    }
    else
    // Otherwise, display the correct tab:
        showTab(currentTab);
}