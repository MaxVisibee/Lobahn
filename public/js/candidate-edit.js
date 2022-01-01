$(document).ready(function() {
    // Update Description Highlight
    $('#save-professional-candidate-profile-btn').click(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'update-employment-description',
            data: {
                "_token": "{{ csrf_token() }}",
                'remark': $('textarea#edit-professional-profile-description').val(),
                'highlight1': $('#edit-professional-highlight1').val(),
                'highlight2': $('#edit-professional-highlight2').val(),
                'highlight3': $('#edit-professional-highlight3').val(),
            },
            success: function(data) {
                location.reload();
            }
        });
    });

    // Employment History
    $('#btn-add-employment-history').click(function(e) {
        e.preventDefault();
        $('.add-employment-history-form').removeClass('hidden');
    });
    $("#add-employment-history-btn").click(function(e) {
        e.preventDefault();
        if ($("#employer_name").val().length != 0) {
            $.ajax({
                type: 'POST',
                url: 'add-employment-history',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'employer_name': $('#employer_name').val(),
                    'position_title': $("#position_title").val(),
                    'from': $('#from').val(),
                    'to': $('#to').val()
                },
                success: function(data) {
                    location.reload();
                }
            });
        } else {
            alert("Please enter data");
        }

    });

    $(".update-employment-history-btn").click(function(e) {
        e.preventDefault();
        if ($("#edit-employment-position").val().length != 0) {
            $.ajax({
                type: 'POST',
                url: 'update-employment-history',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': $('#edit-employment-id').val(),
                    'position_title': $('#edit-employment-position').val(),
                    'employer_name': $('#edit-employment-employername').val(),
                    'from': $('#edit-employment-from').val(),
                    'to': $('#edit-employment-to').val(),
                },
                success: function(data) {
                    location.reload();
                }
            });
        } else {
            alert("Please enter position title");
        }
    });

    $(".delete-em-history").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'delete-employment-history',
            data: {
                "_token": "{{ csrf_token() }}",
                'id': $(this).next().val()
            },
            success: function(data) {
                location.reload();
            }
        });
    });

    // Education History
    $('#btn-add-education-history').click(function(e) {
        e.preventDefault();
        $('.add-education-history-form').removeClass('hidden');
    });
    $("#add-employment-education-btn").click(function(e) {
        e.preventDefault();
        if ($("#education-degree").val().length != 0) {

            $.ajax({
                type: 'POST',
                url: 'add-education-history',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'level': $('#education-degree').val(),
                    'field': $('#education-fieldofstudy').val(),
                    'institution': $('#education-institution').val(),
                    'location': $('#education-location').val(),
                    'year': $('#education-year').val()
                },
                success: function(data) {
                    location.reload();
                }
            });
        } else {
            alert("Please enter degree name");
        }

    });

    $('.update-employment-education-btn').click(function() {
        if ($("#edit-education-level").val().length != 0) {
            $.ajax({
                type: 'POST',
                url: 'update-education-history',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': $(this).parent().find('#edit-eduction-id').val(),
                    'level': $(this).parent().find('#edit-education-level').val(),
                    'field': $(this).parent().find('#edit-education-field').val(),
                    'institution': $(this).parent().find('#edit-education-institution')
                        .val(),
                    'location': $(this).parent().find('#edit-education-location').val(),
                    'year': $(this).parent().find('#edit-education-year').val()
                },
                success: function(data) {
                    location.reload();
                }
            });
        } else {
            alert("Please enter degree name");
        }
    });

    $('.delete-employment-education-btn').click(function() {
        $.ajax({
            type: 'POST',
            url: 'delete-education-history',
            data: {
                "_token": "{{ csrf_token() }}",
                'id': $(this).parent().parent().next().find('#edit-eduction-id').val(),
            },
            success: function(data) {
                location.reload();
            }
        });
    });

    // Update Password
    $('#change-password-btn').click(function() {
        if ($('#newPassword').val().length != 0) {
            if ($('#newPassword').val() == $('#confirmPassword').val()) {
                // Password match
                $.ajax({
                    type: 'POST',
                    url: 'candidate-repassword',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'password': $('#newPassword').val()
                    }
                });
            } else {
                // Password do not match
                alert("Pasword do not match !")
            }
        }

    });

    // CV Files
    $("#professional-cvfile-input").on("change", function(e) {
        e.preventDefault();
        if ($("#professional-cvfile-input").val() !== "") {
            var form = $('#cvForm')[0];
            var data = new FormData(form);
            data.append("_token", "{{ csrf_token() }}");
            $.ajax({
                type: "POST",
                url: 'cv-add',
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == true) {
                        location.reload();
                    } else {
                        alert(response.msg);
                    }
                }
            });
        }
    });

    $('.del-cv').click(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'cv-delete',
            data: {
                "_token": "{{ csrf_token() }}",
                'id': $(this).parent().next().val()
            },
            success: function(data) {
                location.reload();
            }
        });

    });

    // Update Rigthside Fields
    $('.update-field').on('change', function(e) {
        e.preventDefault();
        if ($(this).val() !== "") {
            $.ajax({
                type: 'POST',
                url: 'update-field',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'name': $(this).attr('name'),
                    'value': $(this).val()
                },
                success: function(data) {
                    location.reload();
                }
            });
        }
    });

    $('.update-mupti-field ').on('change', function(e) {
        e.preventDefault();
        // alert("change");
        $.ajax({
            type: 'POST',
            url: 'update-multi-field',
            data: {
                "_token": "{{ csrf_token() }}",
                'keywords': $(this).val()
            }
        });

    });

});