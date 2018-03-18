$(document).ready(
    function () {
        $("#col-fields h3").toggle(
            function () {
                $(this).toggleClass("minus");
                $(this).next().show();  //object chaining
            },
            function () {
                $(this).toggleClass("minus");
                $(this).next().hide();
            }
        );
    }
);
