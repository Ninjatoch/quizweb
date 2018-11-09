function disableQuestionForm()
{
    $("#form-question").prop("hidden", "hidden");
    $("#qcm").prop("hidden", "hidden");
    $("#tnf").prop("hidden", "hidden");
    $("#sa").prop("hidden", "hidden");
}
function enableQuestion(){
    $("button[name='question_type']").removeAttr("disabled");
    $("button[value='qcm']").html("Multiple Choice");
    $("button[value='tnf']").html("True & False");
    $("button[value='sa']").html("Short Answers");
}
function clearQuestionForm()
{
    $("#photo").val("");
    $("input[name='question']").val("");
    for(var index = 0; index < 4; index ++)
    {
        $("input[name='" + index + "']").val("");
        $("input[name='correct']:checked").removeAttr("checked");
    }
    $("input[data-answer]").removeAttr("data-answer");
    $("input[name='answer']").val("");
}
$("button[name='question_type']").click(function(event){
    var value = $(this).val();
    $(this).html("In process");
    $("button[name='question_type']").prop("disabled", "disabled");
    $("#form-question").removeAttr("hidden");
    if(value === "qcm")
    {
        $("button[name='save']").attr("data-type", "qcm");
        $("#qcm").removeAttr("hidden");
    }
    else if(value === "tnf")
    {
        $("button[name='save']").attr("data-type", "tnf");
        $("#tnf").removeAttr("hidden");
    }
    else if(value === "sa")
    {
        $("button[name='save']").attr("data-type", "sa");
        $("#sa").removeAttr("hidden");
    }
    else
    {
        event.preventDefault();
    }
});
$("button[type='reset']").click(function(){
    if(confirm("Are you sure you want to cancel it?"))
    {
        disableQuestionForm();
        enableQuestion();
    }
    
});
$("input[name='tnf']").click(function(){
    var bool = $(this).val();
    if(bool === "TRUE")
    {
        $(this).attr("data-answer", "1");
        $(this).removeClass("btn-light");
        $(this).addClass("btn-success");
        $("input[data-answer='0']").removeClass("btn-danger");
        $("input[data-answer='0']").addClass("btn-light");
        $("input[data-answer='0']").removeAttr("data-answer");
    }
    else
    {
        $(this).attr("data-answer", "0");
        $(this).removeClass("btn-light");
        $(this).addClass("btn-danger");
        $("input[data-answer='1']").removeClass("btn-success");
        $("input[data-answer='1'").addClass("btn-light");
        $("input[data-answer='1']").removeAttr("data-answer");
    }
});

$("button[name='save']").click(function(){
    var type = $(this).attr("data-type");
    var user_id = $("input[name='user_id']").val();
    var quiz_id = $("input[name='quiz_id']").val();
    var files = $('#photo')[0].files;
    var question = $("input[name='question']").val();
    
    var formData = new FormData();
    formData.append("user_id", user_id);
    formData.append("quiz_id", quiz_id);
    formData.append("photo",files[0]);
    formData.append("question", question);
    formData.append("type_quest", type);
    
    if(type === "qcm")
    {
        var answers = [];
        for(var index = 0; index < 4; index++)
        {
            answers[index] = $("input[name='" + index + "']").val();
            formData.append("answers[]",answers[index]);
        }
        var correct = $("input[name='correct']:checked").attr("data-correct");
        formData.append("correct", correct);
    }
    else if(type === "tnf")
    {
        var answer = $("input[data-answer]").attr("data-answer");
        if(answer === 0) answer = "False";
        else answer = "True";
        formData.append("answer", answer);
    }
    else 
    {
        var answer = $("input[name='answer']").val();
        formData.append("answer", answer);
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        type: "POST",
        url: "questions",
        data: formData,
        contentType: false, 
        processData: false,
        success: function()
        {
            disableQuestionForm();
            enableQuestion();
            clearQuestionForm();
        }
    });
});