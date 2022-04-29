

$('.single-select').click(function() {
$(this).parent().parent().find("input[type=hidden]").val($(this).attr('data-value'));
});
$('.single-select').each(function() {
    if ($(this).is(":checked")) {
        $(this).parent().parent().find("input[type=hidden]").val($(this).attr('data-value'));
    }
});

var selectedCountries = [];
$('.selected-countries').click(function() {
if ($(this).is(":checked")) {
    if (selectedCountries.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedCountries.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedCountries);
} else if ($(this).is(":not(:checked)")) {
    var index = selectedCountries.indexOf($(this).attr('data-value'));
    if (index !== -1) {
        selectedCountries.splice(index, 1);
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedCountries);
}
});
$('.selected-countries').each(function() {
if ($(this).is(":checked")) {
    if (selectedCountries.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedCountries.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedCountries);
} 
});

var selectedIndustries = [];
$('.selected-industries').click(function() {
if ($(this).is(":checked")) {
    if (selectedIndustries.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedIndustries.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedIndustries);
} else if ($(this).is(":not(:checked)")) {
    var index = selectedIndustries.indexOf($(this).attr('data-value'));
    if (index !== -1) {
        selectedIndustries.splice(index, 1);
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedIndustries);
}
});
$('.selected-industries').each(function() {
if ($(this).is(":checked")) {
    if (selectedIndustries.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedIndustries.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedIndustries);
}
});

var selectedFunctionals = [];
$('.selected-functional').click(function() {
if ($(this).is(":checked")) {
    if (selectedFunctionals.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedFunctionals.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedFunctionals);
} else if ($(this).is(":not(:checked)")) {
    var index = selectedFunctionals.indexOf($(this).attr('data-value'));
    if (index !== -1) {
        selectedFunctionals.splice(index, 1);
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedFunctionals);
}
});
$('.selected-functional').each(function() {
if ($(this).is(":checked")) {
    if (selectedFunctionals.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedFunctionals.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedFunctionals);
} 
});

var selectedJobTypes = [];
$('.selected-jobtypes').click(function() {
if ($(this).is(":checked")) {
    if (selectedJobTypes.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedJobTypes.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedJobTypes);
} else if ($(this).is(":not(:checked)")) {
    var index = selectedJobTypes.indexOf($(this).attr('data-value'));
    if (index !== -1) {
        selectedJobTypes.splice(index, 1);
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedJobTypes);
}
});
$('.selected-jobtypes').each(function() {
if ($(this).is(":checked")) {
    if (selectedJobTypes.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedJobTypes.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedJobTypes);
} 
});

var selectedJobTitles = [];
$('.selected-jobtitles').click(function() {
if ($(this).is(":checked")) {
    if (selectedJobTitles.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedJobTitles.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedJobTitles);
} else if ($(this).is(":not(:checked)")) {
    var index = selectedJobTitles.indexOf($(this).attr('data-value'));
    if (index !== -1) {
        selectedJobTitles.splice(index, 1);
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedJobTitles);
}
});
$('.selected-jobtitles').each(function() {
if ($(this).is(":checked")) {
    if (selectedJobTitles.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedJobTitles.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedJobTitles);
}
});


var selectedKeywords = [];
$('.selected-keywords').click(function() {
if ($(this).is(":checked")) {
    if (selectedKeywords.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedKeywords.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedKeywords);
} else if ($(this).is(":not(:checked)")) {
    var index = selectedKeywords.indexOf($(this).attr('data-value'));
    if (index !== -1) {
        selectedKeywords.splice(index, 1);
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedKeywords);
}
});
$('.selected-keywords').each(function() {
if ($(this).is(":checked")) {
    if (selectedKeywords.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedKeywords.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedKeywords);
}
});

// var selectedKeywords = [];
// $('.selected-keywords').click(function() {
// if ($(this).is(":checked")) {
//     if (selectedKeywords.indexOf($(this).val()) !== -1) {
//         //alert("Value already selected !")
//     } else {
//         //alert("Value does not select!")
//         selectedKeywords.push($(this).attr('data-value'));
//     }
//     $(this).parent().parent().find("input[type=hidden]").val(selectedKeywords);
// } else if ($(this).is(":not(:checked)")) {
//     var index = selectedKeywords.indexOf($(this).attr('data-value'));
//     if (index !== -1) {
//         selectedKeywords.splice(index, 1);
//     }
//     $(this).parent().parent().find("input[type=hidden]").val(selectedKeywords);
// }
// });
// $('.selected-keywords').each(function() {
// if ($(this).is(":checked")) {
//     if (selectedKeywords.indexOf($(this).val()) !== -1) {
//         //alert("Value already selected !")
//     } else {
//         //alert("Value does not select!")
//         selectedKeywords.push($(this).attr('data-value'));
//     }
//     $(this).parent().parent().find("input[type=hidden]").val(selectedKeywords);
// }
// });

var selectedSkills = [];
$('.selected-skills').click(function() {
if ($(this).is(":checked")) {
    if (selectedSkills.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedSkills.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedSkills);
} else if ($(this).is(":not(:checked)")) {
    var index = selectedSkills.indexOf($(this).attr('data-value'));
    if (index !== -1) {
        selectedSkills.splice(index, 1);
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedSkills);
}
});
$('.selected-skills').each(function() {
if ($(this).is(":checked")) {
    if (selectedSkills.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedSkills.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedSkills);
}
});

var selectedGeos = [];
$('.selected-geographical').click(function() {
if ($(this).is(":checked")) {
    if (selectedGeos.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedGeos.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedGeos);
    console.log($(this).parent().parent().find("input[type=hidden]").val());
} else if ($(this).is(":not(:checked)")) {
    var index = selectedGeos.indexOf($(this).attr('data-value'));
    if (index !== -1) {
        selectedGeos.splice(index, 1);
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedGeos);
}
});
$('.selected-geographical').each(function() {
if ($(this).is(":checked")) {
    if (selectedGeos.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedGeos.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedGeos);
}
});

var selectedInstitutions = [];
$('.selected-institutions').click(function() {
if ($(this).is(":checked")) {
    if (selectedInstitutions.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedInstitutions.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedInstitutions);
} else if ($(this).is(":not(:checked)")) {
    var index = selectedInstitutions.indexOf($(this).attr('data-value'));
    if (index !== -1) {
        selectedInstitutions.splice(index, 1);
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedInstitutions);
}
});
$('.selected-institutions').each(function() {
if ($(this).is(":checked")) {
    if (selectedInstitutions.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedInstitutions.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedInstitutions);
} 
});


var selectedStudies = [];
$('.selected-studies').click(function() {
if ($(this).is(":checked")) {
    if (selectedStudies.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedStudies.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedStudies);
} else if ($(this).is(":not(:checked)")) {
    var index = selectedStudies.indexOf($(this).attr('data-value'));
    if (index !== -1) {
        selectedStudies.splice(index, 1);
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedStudies);
}
});
$('.selected-studies').each(function() {
if ($(this).is(":checked")) {
    if (selectedStudies.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedStudies.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedStudies);
} 
});

var selectedQualifications = [];
$('.selected-qualifications').click(function() {
if ($(this).is(":checked")) {
    if (selectedQualifications.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedQualifications.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedQualifications);
    console.log($(this).parent().parent().find("input[type=hidden]").val());
} else if ($(this).is(":not(:checked)")) {
    var index = selectedQualifications.indexOf($(this).attr('data-value'));
    if (index !== -1) {
        selectedQualifications.splice(index, 1);
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedQualifications);
}
});
$('.selected-qualifications').each(function() {
if ($(this).is(":checked")) {
    if (selectedQualifications.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedQualifications.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedQualifications);
}
});


var selectedKeystrengths = [];
$('.selected-keystrengths').click(function() {
if ($(this).is(":checked")) {
    if (selectedKeystrengths.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedKeystrengths.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedKeystrengths);
    console.log($(this).parent().parent().find("input[type=hidden]").val());
} else if ($(this).is(":not(:checked)")) {
    var index = selectedKeystrengths.indexOf($(this).attr('data-value'));
    if (index !== -1) {
        selectedKeystrengths.splice(index, 1);
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedKeystrengths);
}
});
$('.selected-keystrengths').each(function() {
if ($(this).is(":checked")) {
    if (selectedKeystrengths.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedKeystrengths.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedKeystrengths);
} 
});

var selectedJobShifts = [];
$('.selected-jobshift').click(function() {
if ($(this).is(":checked")) {
    if (selectedJobShifts.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedJobShifts.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedJobShifts);
    console.log($(this).parent().parent().find("input[type=hidden]").val());
} else if ($(this).is(":not(:checked)")) {
    var index = selectedJobShifts.indexOf($(this).attr('data-value'));
    if (index !== -1) {
        selectedJobShifts.splice(index, 1);
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedJobShifts);
}
});
$('.selected-jobshift').each(function() {
if ($(this).is(":checked")) {
    if (selectedJobShifts.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedJobShifts.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedJobShifts);
    console.log($(this).parent().parent().find("input[type=hidden]").val());
}
});


var selectedSpecilities = [];
$('.selected-specialties').click(function() {
if ($(this).is(":checked")) {
    if (selectedSpecilities.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedSpecilities.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedSpecilities);
} else if ($(this).is(":not(:checked)")) {
    var index = selectedSpecilities.indexOf($(this).attr('data-value'));
    if (index !== -1) {
        selectedSpecilities.splice(index, 1);
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedSpecilities);
}
});
$('.selected-specialties').each(function() {
    if ($(this).is(":checked")) {
    if (selectedSpecilities.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedSpecilities.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedSpecilities);
}
});

var selectedEmployers = [];
$('.selected-employers').click(function() {
if ($(this).is(":checked")) {
    if (selectedEmployers.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedEmployers.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedEmployers);
} else if ($(this).is(":not(:checked)")) {
    var index = selectedEmployers.indexOf($(this).attr('data-value'));
    if (index !== -1) {
        selectedEmployers.splice(index, 1);
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedEmployers);
}
});
$('.selected-employers').each(function() {
    if ($(this).is(":checked")) {
    if (selectedEmployers.indexOf($(this).val()) !== -1) {
        //alert("Value already selected !")
    } else {
        //alert("Value does not select!")
        selectedEmployers.push($(this).attr('data-value'));
    }
    $(this).parent().parent().find("input[type=hidden]").val(selectedEmployers);
}
});

