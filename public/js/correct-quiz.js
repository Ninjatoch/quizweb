$(".correct-quiz").click(function(){
    var questions = JSON.parse($(this).attr("data-questions"));
    var answers = JSON.parse($(this).attr("data-answers"));
    var student = JSON.parse($(this).attr("data-student"));
    var responses = JSON.parse($(this).attr("data-responses"));
    //console.log(questions.length);
    //console.log(answers);
    //console.log(student);
    $(".correct_quiz").html("");
    $("h5.modal-title").html(student["name"]);
    var score = 0;
    var short_answer = 0;
    $.each(questions, function(index, question){
        if(question['quest_type'] === 'sa')
        {
            short_answer++;
            $(".correct_quiz").append(  
                "<div class='tab'>" +
                    "<div class='register_form_title'>"+ index + ", " + question['quest'] + "</div>" +
                    "<p>"+ index +", " + responses[index]['answer'] + "<p>" +
                    "<div class='form-group'>" +
                        "<input type='button' name='right' data-note='"+ question['id'] +"' style='margin-right: 10px' class='btn btn-primary' value='Right'/>" + 
                        "<input type='button' name='wrong' data-note='"+ question['id'] +"' class='btn btn-danger' value='Wrong'/>" + 
                    "</div>" +
                "</div>"
            );
        }
        else
        {
            score += parseInt(responses[index]['correction']);
        }
    });
    show_score(short_answer);
    $("input[name='right']").click(function(){
        var question_id = $(this).attr("data-note");
        $("input[data-note='" + question_id + "']").attr("disabled", "disabled");
        score++;
        short_answer--;
        show_score(short_answer);
    });
    $("input[name='wrong']").click(function(){
        var question_id = $(this).attr("data-note");
        $("input[data-note='" + question_id + "']").attr("disabled", "disabled");
        score--;
        short_answer--;
        show_score(short_answer);
    });
    
    function show_score(correction)
    {
        if(correction === 0)
        {
            $(".correct_quiz").html("");
            var elem;
            elem = $("<h3>Total Score: " + getScore(questions.length, score) + "</h3>").addClass("text-center");
            elem.attr("style", "color: green");
            $(".correct_quiz").append(elem);
        }
    }
});