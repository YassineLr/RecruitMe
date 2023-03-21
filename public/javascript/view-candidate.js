
function loadContent() {
    $.ajax({
        url: "/RecruitMe/controllers/candidat-forms/view-resume-rec.php",
        success: function(data) {
            $("#resume-content").html(data);
        }
    });
}



