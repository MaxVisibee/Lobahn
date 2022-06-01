// Industries

$(document).on('click', '.selected-industries-custom', function() {
    $(this).parent().parent().parent().next().val($(this).attr('data-value'))
});

var selectedCustomIndustries = [];

$('.selected-industries-custom').each(function() {
if ($(this).is(":checked")) {
    if (selectedCustomIndustries.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedCustomIndustries.push($(this).attr('data-value'));
    }
    //$(this).parent().parent().parent().next().val(selectedCustomIndustries);
}
});

$(document).on('click', '.selected-industries-custom', function() {
        if ($(this).is(":checked")) {
            if (selectedCustomIndustries.indexOf($(this).val()) !== -1) {
                //alert("Value already selected !")
            } else {
                //alert("Value does not select!")
                selectedCustomIndustries.push($(this).attr('data-value'));
            }
            $(this).parent().parent().parent().next().val(selectedCustomIndustries)
        } else if ($(this).is(":not(:checked)")) {
        var index = selectedCustomIndustries.indexOf($(this).attr('data-value'));
        if (index !== -1) {
            selectedCustomIndustries.splice(index, 1);
        }
        $(this).parent().parent().parent().next().val(selectedCustomIndustries)
    }
});



// Institutions

$(document).on('click', '.selected-institutions-custom', function() {
    $(this).parent().parent().parent().next().val($(this).attr('data-value'))
});

var selectedCustomInstitutions = [];

$('.selected-institutions-custom').each(function() {
if ($(this).is(":checked")) {
    if (selectedCustomInstitutions.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedCustomInstitutions.push($(this).attr('data-value'));
    }
    //$(this).parent().parent().parent().next().val(selectedCustomInstitutions);
}
});

$(document).on('click', '.selected-institutions-custom', function() {
        if ($(this).is(":checked")) {
            if (selectedCustomInstitutions.indexOf($(this).val()) !== -1) {
                //alert("Value already selected !")
            } else {
                //alert("Value does not select!")
                selectedCustomInstitutions.push($(this).attr('data-value'));
            }
            $(this).parent().parent().parent().next().val(selectedCustomInstitutions)
        } else if ($(this).is(":not(:checked)")) {
        var index = selectedCustomInstitutions.indexOf($(this).attr('data-value'));
        if (index !== -1) {
            selectedCustomInstitutions.splice(index, 1);
        }
        $(this).parent().parent().parent().next().val(selectedCustomInstitutions)
    }
});



// target-employer

$(document).on('click', '.selected-employers-custom', function() {
    $(this).parent().parent().parent().next().val($(this).attr('data-value'))
});

var selectedCustomEmployers = [];

$('.selected-employers-custom').each(function() {
if ($(this).is(":checked")) {
    if (selectedCustomEmployers.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedCustomEmployers.push($(this).attr('data-value'));
    }
    //$(this).parent().parent().parent().next().val(selectedCustomEmployers);
}
});


$(document).on('click', '.selected-employers-custom', function() {
        if ($(this).is(":checked")) {
            if (selectedCustomEmployers.indexOf($(this).val()) !== -1) {
                //alert("Value already selected !")
            } else {
                //alert("Value does not select!")
                selectedCustomEmployers.push($(this).attr('data-value'));
            }
            $(this).parent().parent().parent().next().val(selectedCustomEmployers)
        } else if ($(this).is(":not(:checked)")) {
        var index = selectedCustomEmployers.indexOf($(this).attr('data-value'));
        if (index !== -1) {
            selectedCustomEmployers.splice(index, 1);
        }
        $(this).parent().parent().parent().next().val(selectedCustomEmployers)
    }
});



// position-title

$(document).on('click', '.selected-jobtitles-custom', function() {
    $(this).parent().parent().parent().next().val($(this).attr('data-value'))
});

var selectedCustomJobTitles = [];

$('.selected-jobtitles-custom').each(function() {
if ($(this).is(":checked")) {
    if (selectedCustomJobTitles.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedCustomJobTitles.push($(this).attr('data-value'));
    }
    //$(this).parent().parent().parent().next().val(selectedCustomJobTitles);
}
});

$(document).on('click', '.selected-jobtitles-custom', function() {
        if ($(this).is(":checked")) {
            if (selectedCustomJobTitles.indexOf($(this).val()) !== -1) {
                //alert("Value already selected !")
            } else {
                //alert("Value does not select!")
                selectedCustomJobTitles.push($(this).attr('data-value'));
            }
            $(this).parent().parent().parent().next().val(selectedCustomJobTitles)
        } else if ($(this).is(":not(:checked)")) {
            alert("hi")
        var index = selectedCustomJobTitles.indexOf($(this).attr('data-value'));
        if (index !== -1) {
            selectedCustomJobTitles.splice(index, 1);
        }
        $(this).parent().parent().parent().next().val(selectedCustomJobTitles)
    }
});



// functional-area

$(document).on('click', '.selected-functional-custom', function() {
    $(this).parent().parent().parent().next().val($(this).attr('data-value'))
});

var selectedCustomFunctional = [];

$('.selected-functional-custom').each(function() {
if ($(this).is(":checked")) {
    if (selectedCustomFunctional.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedCustomFunctional.push($(this).attr('data-value'));
    }
    //$(this).parent().parent().parent().next().val(selectedCustomFunctional);
}
});


$(document).on('click', '.selected-functional-custom', function() {
        if ($(this).is(":checked")) {
            if (selectedCustomFunctional.indexOf($(this).val()) !== -1) {
                //alert("Value already selected !")
            } else {
                //alert("Value does not select!")
                selectedCustomFunctional.push($(this).attr('data-value'));
            }
            $(this).parent().parent().parent().next().val(selectedCustomFunctional)
        } else if ($(this).is(":not(:checked)")) {
        var index = selectedCustomFunctional.indexOf($(this).attr('data-value'));
        if (index !== -1) {
            selectedCustomFunctional.splice(index, 1);
        }
        $(this).parent().parent().parent().next().val(selectedCustomFunctional)
    }
});



// Keywords 

$(document).on('click', '.selected-keywords-custom', function() {
    $(this).parent().parent().parent().next().val($(this).attr('data-value'))
});

var selectedCustomKeywords = [];

$('.selected-keywords-custom').each(function() {
if ($(this).is(":checked")) {
    if (selectedCustomKeywords.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedCustomKeywords.push($(this).attr('data-value'));
    }
    //$(this).parent().parent().parent().next().val(selectedCustomKeywords);
}
});

$(document).on('click', '.selected-keywords-custom', function() {
        if ($(this).is(":checked")) {
            if (selectedCustomKeywords.indexOf($(this).val()) !== -1) {
                //alert("Value already selected !")
            } else {
                //alert("Value does not select!")
                selectedCustomKeywords.push($(this).attr('data-value'));
            }
            $(this).parent().parent().parent().next().val(selectedCustomKeywords)
        } else if ($(this).is(":not(:checked)")) {
        var index = selectedCustomKeywords.indexOf($(this).attr('data-value'));
        if (index !== -1) {
            selectedCustomKeywords.splice(index, 1);
        }
        $(this).parent().parent().parent().next().val(selectedCustomKeywords)
    }
});



// skill 

$(document).on('click', '.selected-skills-custom', function() {
    $(this).parent().parent().parent().next().val($(this).attr('data-value'))
});

var selectedCustomSkills = [];

$('.selected-skills-custom').each(function() {
if ($(this).is(":checked")) {
    if (selectedCustomSkills.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedCustomSkills.push($(this).attr('data-value'));
    }
    //$(this).parent().parent().parent().next().val(selectedCustomSkills);
}
});

$(document).on('click', '.selected-skills-custom', function() {
        if ($(this).is(":checked")) {
            if (selectedCustomSkills.indexOf($(this).val()) !== -1) {
                //alert("Value already selected !")
            } else {
                //alert("Value does not select!")
                selectedCustomSkills.push($(this).attr('data-value'));
            }
            $(this).parent().parent().parent().next().val(selectedCustomSkills)
        } else if ($(this).is(":not(:checked)")) {
        var index = selectedCustomSkills.indexOf($(this).attr('data-value'));
        if (index !== -1) {
            selectedCustomSkills.splice(index, 1);
        }
        $(this).parent().parent().parent().next().val(selectedCustomSkills)
    }
});



// Study Field 

$(document).on('click', '.selected-studies-custom', function() {
    $(this).parent().parent().parent().next().val($(this).attr('data-value'))
});

var selectedCustomStudies = [];

$('.selected-studies-custom').each(function() {
if ($(this).is(":checked")) {
    if (selectedCustomStudies.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedCustomStudies.push($(this).attr('data-value'));
    }
    //$(this).parent().parent().parent().next().val(selectedCustomStudies);
}
});

$(document).on('click', '.selected-studies-custom', function() {
        if ($(this).is(":checked")) {
            if (selectedCustomStudies.indexOf($(this).val()) !== -1) {
                //alert("Value already selected !")
            } else {
                //alert("Value does not select!")
                selectedCustomStudies.push($(this).attr('data-value'));
            }
            $(this).parent().parent().parent().next().val(selectedCustomStudies)
        } else if ($(this).is(":not(:checked)")) {
        var index = selectedCustomStudies.indexOf($(this).attr('data-value'));
        if (index !== -1) {
            selectedCustomStudies.splice(index, 1);
        }
        $(this).parent().parent().parent().next().val(selectedCustomStudies)
    }
});



// Qualifications 

$(document).on('click', '.selected-qualifications-custom', function() {
    $(this).parent().parent().parent().next().val($(this).attr('data-value'))
});

var selectedCustomQualifications = [];

$('.selected-qualifications-custom').each(function() {
if ($(this).is(":checked")) {
    if (selectedCustomQualifications.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedCustomQualifications.push($(this).attr('data-value'));
    }
    //$(this).parent().parent().parent().next().val(selectedCustomQualifications);
}
});

$(document).on('click', '.selected-qualifications-custom', function() {
        if ($(this).is(":checked")) {
            if (selectedCustomQualifications.indexOf($(this).val()) !== -1) {
                //alert("Value already selected !")
            } else {
                //alert("Value does not select!")
                selectedCustomQualifications.push($(this).attr('data-value'));
            }
            $(this).parent().parent().parent().next().val(selectedCustomQualifications)
        } else if ($(this).is(":not(:checked)")) {
        var index = selectedCustomQualifications.indexOf($(this).attr('data-value'));
        if (index !== -1) {
            selectedCustomQualifications.splice(index, 1);
        }
        $(this).parent().parent().parent().next().val(selectedCustomQualifications)
    }
});



// Keystrengths 

$(document).on('click', '.selected-keystrengths-custom', function() {
    $(this).parent().parent().parent().next().val($(this).attr('data-value'))
});

var selectedCustomKeyStrengths = [];

$('.selected-keystrengths-custom').each(function() {
if ($(this).is(":checked")) {
    if (selectedCustomKeyStrengths.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedCustomKeyStrengths.push($(this).attr('data-value'));
    }
    //$(this).parent().parent().parent().next().val(selectedCustomKeyStrengths);
}
});


$(document).on('click', '.selected-keystrengths-custom', function() {
        if ($(this).is(":checked")) {
            if (selectedCustomKeyStrengths.indexOf($(this).val()) !== -1) {
                //alert("Value already selected !")
            } else {
                //alert("Value does not select!")
                selectedCustomKeyStrengths.push($(this).attr('data-value'));
            }
            $(this).parent().parent().parent().next().val(selectedCustomKeyStrengths)
        } else if ($(this).is(":not(:checked)")) {
        var index = selectedCustomKeyStrengths.indexOf($(this).attr('data-value'));
        if (index !== -1) {
            selectedCustomKeyStrengths.splice(index, 1);
        }
        $(this).parent().parent().parent().next().val(selectedCustomKeyStrengths)
    }
});

