function editForm(edit , type)
{
    $("form[data-edit='"+ edit +"']").attr("style", "background:#edeeef; padding: 10px; margin: 20px;");
    $("#view-question[data-edit='" + edit + "']").hide();
    $("#pic[data-edit='" + edit + "']").removeAttr("hidden");
    $("button[data-edit='" + edit + "'][name='cancel']").removeAttr("hidden");
    $("button:submit[data-edit='" + edit + "']").removeAttr("hidden");
    $("button[name='edit'][data-edit='" + edit + "']").attr("hidden", "hidden");
    if(type === "qcm")
        enableQCM(edit);
    else if(type === "tnf")
        enableTNF(edit);
    else
        enableSA(edit);
}

function cancelForm(edit, type)
{
    $("form[data-edit='"+ edit +"']").removeAttr("style");
    $("#view-question[data-edit='" + edit + "']").show();
    $("#pic[data-edit='" + edit + "']").attr("hidden", "hidden");
    $("button[data-edit='" + edit + "'][name='cancel']").attr("hidden", "hidden");
    $("button:submit[data-edit='" + edit + "']").attr("hidden", "hidden");
    $("button[name='edit'][data-edit='" + edit + "']").removeAttr("hidden");

    if(type === "qcm")
        disableQCM(edit);
    else if(type === "tnf")
        disableTNF(edit);
    else
        disableSA(edit);
}

function enableQCM(edit)
{
    $("#qcm[data-edit='" + edit + "']").removeAttr("hidden");
    $("#tnf[data-edit='" + edit + "']").empty();
    $("#sa[data-edit='" + edit + "']").empty();
}

function enableTNF(edit)
{
    $("#tnf[data-edit='" + edit + "']").removeAttr("hidden");
    $("#qcm[data-edit='" + edit + "']").empty();
    $("#sa[data-edit='" + edit + "']").empty();
}

function enableSA(edit)
{
    $("#sa[data-edit='" + edit + "']").removeAttr("hidden");
    $("#qcm[data-edit='" + edit + "']").empty();
    $("#tnf[data-edit='" + edit + "']").empty();
}

function disableQCM(edit)
{
    $("#qcm[data-edit='" + edit + "']").attr("hidden", "hidden");
    $("#tnf[data-edit='" + edit + "']").empty();
    $("#sa[data-edit='" + edit + "']").empty();
}

function disableTNF(edit)
{
    $("#tnf[data-edit='" + edit + "']").attr("hidden", "hidden");
    $("#qcm[data-edit='" + edit + "']").empty();
    $("#sa[data-edit='" + edit + "']").empty();
}

function disableSA(edit)
{
    $("#sa[data-edit='" + edit + "']").attr("hidden", "hidden");
    $("#qcm[data-edit='" + edit + "']").empty();
    $("#tnf[data-edit='" + edit + "']").empty();
}

$("button[name='edit']").click(function(){
    var edit = $(this).attr("data-edit");
    var type = $(this).attr("data-type");
    editForm(edit, type);

});

$("button[name='cancel']").click(function(){
    var edit = $(this).attr("data-edit");
    var type = $(this).attr("data-type");
    if(confirm("Are you sure you want to cancel?"))
    {
        cancelForm(edit, type);
    }
});

$("input[name='TNF']").click(function(){
    var bool = $(this).val();
    var edit = $(this).attr("data-edit");
    if(bool === "TRUE")
    {
        $(this).attr("data-answer", "True");
        $(this).removeClass("btn-light");
        $(this).addClass("btn-success");
        $("input[data-answer='False'][data-edit='" + edit + "']").removeClass("btn-danger");
        $("input[data-answer='False'][data-edit='" + edit + "']").addClass("btn-light");
        $("input[data-answer='False'][data-edit='" + edit + "']").removeAttr("data-answer");
    }
    else
    {
        $(this).attr("data-answer", "False");
        $(this).removeClass("btn-light");
        $(this).addClass("btn-danger");
        $("input[data-answer='True'][data-edit='" + edit + "']").removeClass("btn-success");
        $("input[data-answer='True'][data-edit='" + edit + "']").addClass("btn-light");
        $("input[data-answer='True'][data-edit='" + edit + "']").removeAttr("data-answer");
    }
});

$("button:submit[name='update']").click(function(){
    
    var edit = $(this).attr("data-edit");
    var type = $(this).attr("data-type");
    var user_id = $("input[name='user_id']").val();
    var quiz_id = $("input[name='quiz_id']").val();
    var file = $("input[name='photo'][data-edit='" + edit + "']")[0].files;
    var question = $("input[name='question'][data-edit='" + edit + "']").val();
    var old_photo = $("input[name='old-photo'][data-edit='" + edit + "']").val();
    
    var formData = new FormData();
    formData.append("id", edit);
    formData.append("user_id", user_id);
    formData.append("quiz_id", quiz_id);
    formData.append("file", file[0]);
    formData.append("old_photo", old_photo);
    formData.append("question", question);
    formData.append("quest_type", type);

    if(type === "qcm")
    {
        var answers = [];
        for(var index = 0; index < 4; index++)
        {
            answers[index] = $("input[name='" + index + "'][data-edit='" + edit + "']").val();
            formData.append("answers[]",answers[index]);
        }
        var correct = $("input[name='correct'][data-edit='" + edit + "']:checked").attr("data-correct");
        formData.append("correct", correct);
    }
    else if(type === "tnf")
    {
        var answer = $("input[data-answer][data-edit='" + edit + "']").attr("data-answer");
        formData.append("answer", answer)
    }
    else if(type === "sa")
    {
        
        var answer = $("input[name='answer'][data-edit='" + edit + "']").val();
        formData.append("answer", answer);
    }
    else {}
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: "/questions/update",
        data: formData,
        contentType: false, 
        processData: false,
        success: function()
        {
            cancelForm(edit, type);
        }
    });

});