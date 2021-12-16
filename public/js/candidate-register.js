$(document).ready(function() {

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;

$(".next").click(function() {

    current_fs = $(this).closest("fieldset");
    next_fs = $(this).closest("fieldset").next();

    //show the next fieldset
    next_fs.show();
    //console.log(next_fs);
    //hide the current fieldset with style
    current_fs.animate({
        opacity: 0
    }, {
        step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
                'display': 'none'
            });
            next_fs.css({
                'opacity': opacity
            });
        },
        duration: 600
    });
});

$(".previous").click(function() {

    current_fs = $(this).closest("fieldset");
    previous_fs = $(this).closest("fieldset").prev();

    //show the previous fieldset
    previous_fs.show();

    //hide the current fieldset with style
    current_fs.animate({
        opacity: 0
    }, {
        step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
                'display': 'none'
            });
            previous_fs.css({
                'opacity': opacity
            });
        },
        duration: 600
    });
});

// Custom Select 

$('.location').click(function() {
    $("#location_id").val($(this).attr('value'));
});
$('.location-reset').click(function() {
    $("#location_id").val('');
});

// Position Title 

$('.position_title').click(function() {
    $("#position_title_id").val($(this).attr('value'));
});
$('.location-reset').click(function() {
    $("#position_title_id").val('');
});

// industry

$('.industry').click(function() {
    $("#industry_id").val($(this).attr('value'));
});
$('.industry-reset').click(function() {
    $("#industry_id").val('');
});

// pay 

$('.pay').click(function() {
    $("#pay_id").val($(this).attr('value'));
});
$('.pay-reset').click(function() {
    $("#pay_id").val('');
});

// employment terms 

$('.contract_term').click(function() {
    $("#contract_term_id").val($(this).attr('value'));
});
$('.contract_term-reset').click(function() {
    $("#contract_term_id").val('');
});

//employer

$('.employer').click(function() {
    $("#employer_id").val($(this).attr('value'));
});
$('.employer-reset').click(function() {
    $("#employer_id").val('');
});

//functional_area_id

$('.functional_area').click(function() {
    $("#functional_area_id").val($(this).attr('value'));
});
$('.functional_area-reset').click(function() {
    $("#functional_area_id").val('');
});

// membership

$('.membership').click(function() {
    $('#package_id').val($(this).attr('value'));
})





//onclick="openModalBox('#individual-successful-popup')""



});