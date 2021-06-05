$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".test22").not(targetBox).hide();
        $(targetBox).show();
    });
});