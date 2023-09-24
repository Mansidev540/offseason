$(".drop-toggle").click(function(e) {
    e.preventDefault();
    $(this).siblings(".drop-div").toggle();
});

/* menu */
$('.menu-icon').click(function() {
    $(this).toggleClass('cross');
    $('.left-panel').toggleClass('menu-slide');
})





/* datepicker js */
// $('.datepicker').datepicker({
//     format: 'dd-mm-yyyy',
//     autoclose: true,
//     startDate: '0d',
//     var selected = $(this).datepicker("getDate");
//     alert(selected);
    
// });
$(function() {
    $(".datepicker").datepicker({ 
        dateFormat: "yy-mm-dd", 
        onSelect: function(){
            var selected = $(this).datepicker("getDate");
            alert(selected);
        }
    });
});

 	

$( ".cell" ).on( "click", function() {
    //$('.cell').removeClass('select');
    
    var time = $(this).toggleClass('select');
    var arr = $('.select').map(function () {
        return $.trim($(this).text()); // Use trim to remove leading and trailing spaces
    }).get();
    $("#time").val(arr);
});



