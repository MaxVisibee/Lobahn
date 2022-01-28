$(document).ready(function() {

    var current_fs, next_fs, previous_fs;
    var opacity;

    $(".next").click(function() {

        current_fs = $(this).closest("fieldset");
        next_fs = $(this).closest("fieldset").next();

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
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
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({
                    'opacity': opacity
                });
            },
            duration: 600
        });
    });

    // Preferred School Select
    $('.preferred_school').click(function() {
        $("#preferred_school").val($(this).attr('value'));
    });
    $('.preferred_school-reset').click(function() {
        $("#preferred_school").val('');
    });

    // Industry Select
    $('.industry').click(function() {
        sectorReset();
        $("#industry").val($(this).attr('value'));
        sector($(this).attr('value'));
    });

    $('.industry-reset').click(function() {
        sectorReset();
        $("#industry").val('');
    });

    // Selector Select 
    function sector(id) {
        var url = "get-subsectors/" + id;
        $.ajax({
            type: "get",
            url: url,
            processData: false,
            contentType: false,
            success: function(response) {
                for (i = 0; i < response.sectors.length; i++) {
                    $('.sector-div').append(
                        "<span class='sector target_employer custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray' data-value=" +
                        response.sectors[i]['sub_sector_name'] + " value =" +
                        response.sectors[i]['id'] + ">" +
                        response.sectors[i]['sub_sector_name'] + "</span>");
                }
            }
        });
    }

    function sectorReset() {
        $('.sector-reset').attr('data-value', 'Sub Sector');
        $('.sector-menu').html("Sub Sector");
        $(".sector").remove();
        $("#sector").val("");
    }
    $(document).on("click", ".sector", function() {
        $("#sector").val($(this).attr('value'));
    });
    $('.sector-reset').click(function() {
        $("#sector").val('');
    });

    // Target Employer Select
    $('.target_employer').click(function() {
        $("#target_employer").val($(this).attr('value'));
    });
    $('.target_employer-reset').click(function() {
        $("#target_employer").val('');
    });

    // membership
    $('#package_id').val($(".selected_membership_id").val());
    $('#package_price').val($(".selected_membership_price").val());

    $('.membership').click(function() {
        $('#package_id').val($(this).attr('value'));
        $('#package_price').val($(this).next().val());
        
    }) 

     $(".eye-lash-icon").click((function() {
                var e = $(this).siblings(".profile-password");
                "password" === e.attr("type") ? (e.attr("type", "text"), $(this).attr("src", (
                    function() {
                        return "/./img/sign-up/eye-lash.svg"
                    }))) : (e.attr("type", "password"), $(this).attr("src", (function() {
                    return "/./img/sign-up/eye-lash-off.svg"
                })))

    }));

    $('#corporate-successful-popup').click(function() {
        $('#company-dashboard').click();   
    });

});