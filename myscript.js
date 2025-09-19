$(document).ready(function(){
    $(".edit_teacher").click(function(){
        let teacherId = $(this).data("id");
        window.location.href = "edit_teacher.php?user_id=" + teacherId;
    });

    $(".delete_teacher").click(function(){
        let teacherId = $(this).data("id");

        if(confirm("Are you sure you want to delete this teacher?")) {
            $.ajax({
                url: "delete_teacher.php",
                type: "POST",
                data: { user_id: teacherId }, // Use user_id instead of id
                success: function(response) {
                    alert(response);
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.log("AJAX Error:", status, error);
                }
            });
        }
    });
});
