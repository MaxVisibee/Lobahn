function toggleModalClose(e){$(e).toggleClass("hidden")}function openModalBox(e){$(e).removeClass("hidden")}function openModalBoxSuccess(e){$("#member-connect-popup").addClass("hidden"),$(e).removeClass("hidden")}function removeCVFile(e){$(e).remove()}function memberChangePassword(){$(".changed-password-date").toggleClass("hidden"),$("#change-password-form").toggleClass("hidden")}function editCompanyDetail(){$("#edit-company-profile-btn").addClass("hidden"),$("#save-company-profile-btn").removeClass("hidden");var e=$("#company-website").text(),t=$("#view-description").text();$("#company-website,#view-description").addClass("hidden"),$("#edit-company-website,#edit-description").removeClass("hidden"),$("#edit-company-website").focus(),$("#edit-company-website").val(e),$("#edit-description").val(t)}function saveCompanyDetail(){$("#edit-company-profile-btn,#company-website,#view-description").removeClass("hidden"),$("#save-company-profile-btn,#edit-company-website,#edit-description").addClass("hidden");var e=$("#edit-company-website").val(),t=$("#edit-description").val();$("#company-website").text(e),$("#view-description").text(t),$("#edit-company-website").val(""),$("#edit-description").val("")}function editCorporateInformation(){$("#edit-corporate-info-btn,#company-profile-name,#company-profile-username,#company-profile-email,#company-profile-phone").addClass("hidden"),$("#edit-corporate-info-save,#edit-company-photo,#edit-company-name,#edit-username,#edit-company-email,#edit-company-phone").removeClass("hidden");var e=$("#company-profile-name").text(),t=$("#company-profile-username").text(),n=$("#company-profile-email").text(),o=$("#company-profile-phone").text();$("#edit-company-name").focus(),$("#edit-company-name").val(e),$("#edit-username").val(t),$("#edit-company-email").val(n),$("#edit-company-phone").val(o)}function saveCorporateInformation(){$("#edit-corporate-info-btn,#company-profile-name,#company-profile-username,#company-profile-email,#company-profile-phone").removeClass("hidden"),$("#edit-corporate-info-save,#edit-company-photo,#edit-company-name,#edit-username,#edit-company-email,#edit-company-phone").addClass("hidden");var e=$("#edit-company-name").val(),t=$("#edit-username").val(),n=$("#edit-company-email").val(),o=$("#edit-company-phone").val();$("#company-profile-name").text(e),$("#company-profile-username").text(t),$("#company-profile-email").text(n),$("#company-profile-phone").text(o)}function togglePasswordShow(){var e=document.getElementById("login-password"),t=document.getElementById("password-visible-icon");"password"===e.type?(e.type="text",t.src="./img/login/eye-line.png"):(e.type="password",t.src="./img/login/visible.png")}function showDropdownFilter(){$(".dashboard-dropdown-content").show()}window.addEventListener("click",(function(e){id=e.target.id,"corporate-successful-popup"!=id&&"email-verify"!=id&&"individual-successful-popup"!=id&&"member-connect-popup"!=id&&"member-connect-success-popup"!=id&&"share-socials"!=id||$("#"+id).addClass("hidden");const t=document.querySelector(".select-preferences");null!=t&&(t.contains(e.target)||t.classList.remove("open"))})),$(document).ready((function(){$(".eye-lash-icon").click((function(){var e=$(this).siblings(".profile-password");"password"===e.attr("type")?(e.attr("type","text"),$(this).attr("src",(function(){return"./img/sign-up/eye-lash.svg"}))):(e.attr("type","password"),$(this).attr("src",(function(){return"./img/sign-up/eye-lash-off.svg"})))})),$(".sign-up-form__fee").click((function(){$(this).siblings().removeClass("active-fee"),$(this).addClass("active-fee")})),null!=$(".select-wrapper")&&$(".select-wrapper").click((function(){$(this).find(".select-preferences").toggleClass("open");for(const e of document.querySelectorAll(".custom-option"))e.addEventListener("click",(function(){$(this).hasClass("selected")||($(this).parent().find(".custom-option.selected").removeClass("selected"),$(this).addClass("selected"),$(this).parent().siblings().find("span").text($(this).data("value")))}))}))})),$("#homeMenuBar").hover((function(){$(".homeMenuBarContent").show()}),(function(){$(".homeMenuBarContent").hide()})),$(".menu-searchBox").hover((function(){$(".menu-searchBox").show()}),(function(){$(".menu-searchBox").hide()})),$("#menuSearchBar").hover((function(){$(".menu-searchBox").show()}),(function(){})),$("#corporate-menu-icon").hover((function(){$(".corporate-menu-content").show()}),(function(){$(".corporate-menu-content").hide()})),$("#corporate-search-icon").hover((function(){$(".menu-searchBox").show()}),(function(){$(".menu-searchBox").hide()})),null!=$(".dashboard-select-wrapper")&&$(".dashboard-select-wrapper").hover((function(){$(this).find(".dashboard-select-preferences").toggleClass("open");for(const e of document.querySelectorAll(".dashboard-custom-option"))e.addEventListener("click",(function(){if(!$(this).hasClass("selected")){$(this).parent().find(".dashboard-custom-option.selected").removeClass("selected"),$(this).addClass("selected");var e=$(this).data("value");"Listing Date"==e?($(".checkedIcon1").show(),$(".checkedIcon2").hide(),$(".checkedIcon3").hide(),$(".checkedIcon1").removeClass("ml-6")):"Status"==e?($(".checkedIcon3").show(),$(".checkedIcon1").hide(),$(".checkedIcon2").hide(),$(".checkedIcon3").removeClass("ml-6")):($(".checkedIcon2").show(),$(".checkedIcon1").hide(),$(".checkedIcon3").hide(),$(".checkedIcon2").removeClass("ml-6")),$(this).parent().siblings().find("span").text(e)}}))})),null!=$(".activities-report-select-wrapper")&&$(".activities-report-select-wrapper").hover((function(){$(this).find(".activities-report-select-preferences").toggleClass("open");for(const e of document.querySelectorAll(".activities-report-custom-option"))e.addEventListener("click",(function(){if(!$(this).hasClass("selected")){$(this).parent().find(".activities-report-custom-option.selected").removeClass("selected"),$(this).addClass("selected");var e=$(this).data("value");$(this).children().siblings().find("img").show(),$(this).siblings().find("img").hide(),$(this).parent().siblings().find("span").text(e)}}))})),null!=$(".position-detail-select-wrapper")&&$(".position-detail-select-wrapper").click((function(){$(this).find(".position-detail-select-preferences").toggleClass("open");for(const e of document.querySelectorAll(".position-detail-custom-option"))e.addEventListener("click",(function(){if(!$(this).hasClass("selected")){$(this).parent().find(".position-detail-custom-option.selected").removeClass("selected"),$(this).addClass("selected");var e=$(this).data("value");$(this).parent().siblings().find("span").text(e)}}))}));var pagination1=document.getElementById("pagination1");null==pagination1&&null==pagination1||pagination1.classList.add("corporate-dashboard-pagination-btn-active");var discussionpagination1=document.getElementById("discussion-pagination1");null==discussionpagination1&&null==discussionpagination1||discussionpagination1.classList.add("discussion-pagination-btn-active");var paginations_list=[1,2,3,43,44,45];function changePagination(e){for(var t=0;t<paginations_list.length;t++){var n=document.getElementById("discussion-pagination"+paginations_list[t]);null==n&&null==n||(paginations_list[t]==e?n.classList.add("discussion-pagination-btn-active"):n.classList.remove("discussion-pagination-btn-active"))}}function changeDiscussionPagination(e){for(var t=0;t<paginations_list.length;t++){var n=document.getElementById("discussion-pagination"+paginations_list[t]);null==n&&null==n||(paginations_list[t]==e?n.classList.add("discussion-pagination-btn-active"):n.classList.remove("discussion-pagination-btn-active"))}}$(".dropdown-menu").css("background-color","red");var positiondetail_date=$("#expired-date");function loadDatePicker(){$("#expired-date").focus()}null==positiondetail_date&&null==positiondetail_date||$("#expired-date").datepicker();var pathname=window.location.pathname;function changeMemberType(e){"professional"==e?(addClassManual("professional-tab","title-underline-active"),addClassManual("corporate-tab","title-underline"),removeClassManual("professional-tab","title-underline"),removeClassManual("corporate-tab","title-underline-active")):"corporate"==e&&(addClassManual("professional-tab","title-underline"),addClassManual("corporate-tab","title-underline-active"),removeClassManual("professional-tab","title-underline-active"),removeClassManual("corporate-tab","title-underline"))}function addClassManual(e,t){document.getElementById(e).classList.add(t)}function removeClassManual(e,t){document.getElementById(e).classList.remove(t)}"/corporate-activities-report.html"==pathname?$(".corporate-member-menu-title").text("ACTIVITY REPORT"):"/member-professional-activities-report.html"==pathname?$(".professional-member-menu-title").text("ACTIVITY REPORT"):"/member-professional-setting.html"==pathname?$(".professional-member-menu-title").text("SETTINGS"):"/setting.html"==pathname?$(".corporate-member-menu-title").text("SETTINGS"):"/member-professional-youraccount.html"==pathname?$(".professional-member-menu-title").text("your account"):"/youraccount.html"==pathname?$(".corporate-member-menu-title").text("your account"):"/member-professional-dashboard.html"==pathname||"/member-professional-company-profile.html"==pathname?$(".professional-member-menu-title").text("member dashboard"):"/member-professional-profile.html"==pathname?$(".professional-member-menu-title").text("YOUR PROFILE"):"/corporate-member-dashboard.html"!=pathname&&"/position-listing.html"!=pathname&&"/position-detail.html"!=pathname&&"/position-detail-edit.html"!=pathname||$(".corporate-member-menu-title").text("Employer Dashboard"),"/sign-up.html"==window.location.pathname&&$(".homemenu-bg-div").css("background-color","#1A1A1A"),$(window).scroll((function(){$(window).scrollTop()>400||"/sign-up.html"==window.location.pathname?$(".homemenu-bg-div").css("background-color","#1A1A1A"):$(".homemenu-bg-div").css("background-color","transparent")}));var count=0;function addLanguagePostionEdit(){-1==count&&(count=0);document.createElement("div");count++,document.getElementById("languageDiv"+count).classList.remove("hidden"),showDropdownPositionDetail()}function showDropdownPositionDetail(){null!=$(".position-detail-select-wrapper")&&$(".position-detail-select-wrapper").click((function(){$(this).find(".position-detail-select-preferences").toggleClass("open");for(const e of document.querySelectorAll(".position-detail-custom-option"))e.addEventListener("click",(function(){if(!$(this).hasClass("selected")){$(this).parent().find(".position-detail-custom-option.selected").removeClass("selected"),$(this).addClass("selected");var e=$(this).data("value");$(this).parent().siblings().find("span").text(e)}}))}))}function changeDropdownRadio(e){console.log($("#rradio-dropdown"+e).checked("true"))}$(".position-detail-edit-languages").on("click",".languageDelete",(function(e){e.preventDefault(),$(this).parent("div").addClass("hidden"),count--})),$((function(){null==document.getElementById("example-optionClass")&&null==document.getElementById("example-optionClass")||$("#example-optionClass").multiselect({enableFiltering:!0,filterPlaceholder:"Search",enableCaseInsensitiveFiltering:!0}),null==document.getElementById("institutions-dropdown")&&null==document.getElementById("institutions-dropdown")||$("#institutions-dropdown").multiselect({enableFiltering:!0,filterPlaceholder:"Search",enableCaseInsensitiveFiltering:!0}),null==document.getElementById("geographical-dropdown")&&null==document.getElementById("geographical-dropdown")||$("#geographical-dropdown").multiselect({enableFiltering:!0,filterPlaceholder:"Search",enableCaseInsensitiveFiltering:!0}),null==document.getElementById("location-dropdown")&&null==document.getElementById("location-dropdown")||$("#location-dropdown").multiselect({}),null==document.getElementById("location-dropdown1")&&null==document.getElementById("location-dropdown1")||$("#location-dropdown1").multiselect({}),null==document.getElementById("contract-term-dropdown")&&null==document.getElementById("contract-term-dropdown")||$("#contract-term-dropdown").multiselect({onChange:function(e,t){var n=$("#contract-term-dropdown option:selected"),o=[];$(n).each((function(e,t){o.push($(this).val())})),1!=o.includes("1")&&1!=o.includes("2")||(document.getElementsByClassName("full-time-targetpay")[0].classList.remove("hidden"),document.getElementsByClassName("part-time-targetpay")[0].classList.add("hidden"),document.getElementsByClassName("freelance-targetpay")[0].classList.add("hidden")),1==o.includes("3")&&(document.getElementsByClassName("part-time-targetpay")[0].classList.remove("hidden"),document.getElementsByClassName("full-time-targetpay")[0].classList.add("hidden"),document.getElementsByClassName("freelance-targetpay")[0].classList.add("hidden")),1==o.includes("4")&&(document.getElementsByClassName("freelance-targetpay")[0].classList.remove("hidden"),document.getElementsByClassName("part-time-targetpay")[0].classList.add("hidden"),document.getElementsByClassName("full-time-targetpay")[0].classList.add("hidden")),1!=o.includes("1")&&1!=o.includes("2")||1!=o.includes("3")||(document.getElementsByClassName("full-time-targetpay")[0].classList.remove("hidden"),document.getElementsByClassName("part-time-targetpay")[0].classList.remove("hidden"),document.getElementsByClassName("freelance-targetpay")[0].classList.add("hidden")),1==o.includes("3")&&1==o.includes("4")&&(document.getElementsByClassName("full-time-targetpay")[0].classList.add("hidden"),document.getElementsByClassName("part-time-targetpay")[0].classList.remove("hidden"),document.getElementsByClassName("freelance-targetpay")[0].classList.remove("hidden")),1!=o.includes("1")&&1!=o.includes("2")||1!=o.includes("3")||1!=o.includes("4")||(document.getElementsByClassName("full-time-targetpay")[0].classList.remove("hidden"),document.getElementsByClassName("part-time-targetpay")[0].classList.remove("hidden"),document.getElementsByClassName("freelance-targetpay")[0].classList.remove("hidden"))}}),null==document.getElementById("contract-hour-dropdown")&&null==document.getElementById("contract-hour-dropdown")||$("#contract-hour-dropdown").multiselect({}),null==document.getElementById("software-dropdown")&&null==document.getElementById("software-dropdown")||$("#software-dropdown").multiselect({enableFiltering:!0,filterPlaceholder:"Search",enableCaseInsensitiveFiltering:!0}),null==document.getElementsByClassName("fieldstudy-dropdown")[0]&&null==document.getElementsByClassName("fieldstudy-dropdown")[0]||$(".fieldstudy-dropdown").multiselect({enableFiltering:!0,filterPlaceholder:"Search",enableCaseInsensitiveFiltering:!0}),null==document.getElementById("qualifications-dropdown")&&null==document.getElementById("qualifications-dropdown")||$("#qualifications-dropdown").multiselect({enableFiltering:!0,filterPlaceholder:"Search",enableCaseInsensitiveFiltering:!0}),null==document.getElementById("keystrength-dropdown")&&null==document.getElementById("keystrength-dropdown")||$("#keystrength-dropdown").multiselect({enableFiltering:!0,filterPlaceholder:"Search",enableCaseInsensitiveFiltering:!0}),null==document.getElementById("position-title-dropdown")&&null==document.getElementById("position-title-dropdown")||$("#position-title-dropdown").multiselect({enableFiltering:!0,filterPlaceholder:"Search",enableCaseInsensitiveFiltering:!0}),null==document.getElementById("industries-dropdown")&&null==document.getElementById("industries-dropdown")||$("#industries-dropdown").multiselect({enableFiltering:!0,filterPlaceholder:"Search",enableCaseInsensitiveFiltering:!0}),null==document.getElementById("Sub-sectors-dropdown")&&null==document.getElementById("Sub-sectors-dropdown")||$("#Sub-sectors-dropdown").multiselect({enableFiltering:!0,filterPlaceholder:"Search",enableCaseInsensitiveFiltering:!0}),null==document.getElementById("Functions-dropdown")&&null==document.getElementById("Functions-dropdown")||$("#Functions-dropdown").multiselect({enableFiltering:!0,filterPlaceholder:"Search",enableCaseInsensitiveFiltering:!0}),null==document.getElementById("Specialties-dropdown")&&null==document.getElementById("Specialties-dropdown")||$("#Specialties-dropdown").multiselect({enableFiltering:!0,filterPlaceholder:"Search",enableCaseInsensitiveFiltering:!0}),null==document.getElementById("Desirable-dropdown")&&null==document.getElementById("Desirable-dropdown")||$("#Desirable-dropdown").multiselect({enableFiltering:!0,filterPlaceholder:"Search",enableCaseInsensitiveFiltering:!0})}));var expanded=!1;function showCheckboxes(){var e=document.getElementById("checkboxes");expanded?(e.style.display="none",expanded=!1):(e.style.display="block",expanded=!0)}if($(".dropdown-menu").removeAttr("style"),"checked"==$(".management-level-dropdown a input").attr("checked")){var htmlText=` <div class="flex justify-between"><span class="text-lg font-book">${value=$(".management-level-dropdown a input").val()}</span>\n    <span class="custom-caret flex self-center"></span></div>`;$(".management-level-dropdown").closest(".dropdown").find(".dropdown-toggle").html(htmlText)}if("checked"==$(".year-dropdown a input").attr("checked")){htmlText=` <div class="flex justify-between"><span class="text-lg font-book">${value=$(".year-dropdown a input").val()}</span>\n    <span class="custom-caret flex self-center"></span></div>`;$(".year-dropdown").closest(".dropdown").find(".dropdown-toggle").html(htmlText)}if("checked"==$(".education-dropdown a input").attr("checked")){htmlText=` <div class="flex justify-between"><span class="text-lg font-book">${value=$(".education-dropdown a input").val()}</span>\n    <span class="custom-caret flex self-center"></span></div>`;$(".education-dropdown").closest(".dropdown").find(".dropdown-toggle").html(htmlText)}if("checked"==$(".people-management-dropdown a input").attr("checked")){htmlText=` <div class="flex justify-between"><span class="text-lg font-book">${value=$(".people-management-dropdown a input").val()}</span>\n    <span class="custom-caret flex self-center"></span></div>`;$(".people-management-dropdown").closest(".dropdown").find(".dropdown-toggle").html(htmlText)}if("checked"==$(".position-status-dropdown a input").attr("checked")){var value;htmlText=` <div class="flex justify-between"><span class="text-lg font-book">${value=$(".position-status-dropdown a input").val()}</span>\n    <span class="custom-caret flex self-center"></span></div>`;$(".position-status-dropdown").closest(".dropdown").find(".dropdown-toggle").html(htmlText)}$(".dropdown-menu").on("click","a",(function(){$(this).html();var e=$(this).children("input").val();$(this).children("input").attr("checked","checked"),console.log($(this).children("input").attr("checked"));var t=` <div class="flex justify-between"><span class="text-lg font-book">${e}</span>\n    <span class="custom-caret flex self-center"></span></div>`;$(this).closest(".dropdown").find(".dropdown-toggle").html(t)})),null!=$(".discussion-select-wrapper")&&$(".discussion-select-wrapper").hover((function(){$(".discussion-select-preferences").addClass("open");for(const e of document.querySelectorAll(".discussion-custom-option"))e.addEventListener("click",(function(){if(!$(this).hasClass("selected")){$(this).parent().find(".discussion-custom-option.selected").removeClass("selected"),$(this).addClass("selected");var e=$(this).data("value");$(this).children().siblings().find("img").show(),$(this).siblings().find("img").hide(),$(this).parent().siblings().find("span").text(e)}}))}),(function(){setTimeout((()=>{$(".discussion-select-preferences").removeClass("open")}),1e3)})),null!=$(".discussion-select-preferences")&&$(".discussion-select-wrapper").hover((function(){$(".discussion-select-preferences").addClass("open")}));