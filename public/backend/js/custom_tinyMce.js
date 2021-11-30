//content ZH
var editor_config = {
    path_absolute : "/",
    selector: ".content_ZH",
    allow_html_in_named_anchor: false,
    plugins: [
    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen",
    "insertdatetime nonbreaking save table contextmenu directionality",
    "emoticons template paste textcolor colorpicker textpattern"
    ],
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
relative_urls: false,
setup: function(ed) {
    ed.on('keyup', function(e) {
        var val = ed.getContent();
        var div = document.createElement("div");
        div.innerHTML = val;
        var text = div.textContent || div.innerText || "";
        var count = 100;
        var result = text.slice(0, count) + (text.length > count ? "..." : ""); 
        $('.meta_ZH').val(result);
    });
},
file_browser_callback : function(field_name, url, type, win) {
  var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
  var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

  var cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;
  if (type == 'media') {
    cmsURL = cmsURL + "&type=Images";
  } else {
    cmsURL = cmsURL + "&type=Files";
  }

  tinyMCE.activeEditor.windowManager.open({
    file : cmsURL,
    title : 'Filemanager',
    width : x * 0.8,
    height : y * 0.8,
    resizable : "yes",
    close_previous : "no"
  });
}
};

//content CN
var editor_config_cn = {
    path_absolute : "/",
    selector: ".content_CN",
    allow_html_in_named_anchor: false,
    plugins: [
    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen",
    "insertdatetime nonbreaking save table contextmenu directionality",
    "emoticons template paste textcolor colorpicker textpattern"
    ],
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
relative_urls: false,
setup: function(ed) {
    ed.on('keyup', function(e) {
        var val = ed.getContent();
        var div = document.createElement("div");
        div.innerHTML = val;
        var text = div.textContent || div.innerText || "";
        var count = 100;
        var result = text.slice(0, count) + (text.length > count ? "..." : ""); 
        $('.meta_CN').val(result);
    });
},
file_browser_callback : function(field_name, url, type, win) {
  var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
  var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

  var cmsURL = editor_config_cn.path_absolute + 'filemanager?field_name=' + field_name;
  if (type == 'media') {
    cmsURL = cmsURL + "&type=Images";
  } else {
    cmsURL = cmsURL + "&type=Files";
  }

  tinyMCE.activeEditor.windowManager.open({
    file : cmsURL,
    title : 'Filemanager',
    width : x * 0.8,
    height : y * 0.8,
    resizable : "yes",
    close_previous : "no"
  });
}
};

//content EN
var editor_config_en = {
    path_absolute : "/",
    selector: ".content_EN",
    allow_html_in_named_anchor: false,
    plugins: [
    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen",
    "insertdatetime nonbreaking save table contextmenu directionality",
    "emoticons template paste textcolor colorpicker textpattern"
    ],
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
relative_urls: false,
setup: function(ed) {
    ed.on('keyup', function(e) {
        var val = ed.getContent();
        var div = document.createElement("div");
        div.innerHTML = val;
        var text = div.textContent || div.innerText || "";
        var count = 100;
        var result = text.slice(0, count) + (text.length > count ? "..." : ""); 
        $('.meta_EN').val(result);
    });
},
file_browser_callback : function(field_name, url, type, win) {
  var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
  var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

  var cmsURL = editor_config_en.path_absolute + 'filemanager?field_name=' + field_name;
  if (type == 'media') {
    cmsURL = cmsURL + "&type=Images";
  } else {
    cmsURL = cmsURL + "&type=Files";
  }

  tinyMCE.activeEditor.windowManager.open({
    file : cmsURL,
    title : 'Filemanager',
    width : x * 0.8,
    height : y * 0.8,
    resizable : "yes",
    close_previous : "no"
  });
}
};
//default
var editor_config_default = {
    path_absolute : "/",
    selector: ".hsEditor",
    force_p_newlines : false,
    forced_root_block : "",
    allow_html_in_named_anchor: false,
    plugins: [
    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen",
    "insertdatetime nonbreaking save table contextmenu directionality",
    "emoticons template paste textcolor colorpicker textpattern"
    ],
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
relative_urls: false,
setup: function(ed) {
    ed.on('keyup', function(e) {
        var val = ed.getContent();
        var div = document.createElement("div");
        div.innerHTML = val;
        var text = div.textContent || div.innerText || "";
        var count = 100;
        var result = text.slice(0, count) + (text.length > count ? "..." : ""); 
        $('.meta_EN').val(result);
    });
},
file_browser_callback : function(field_name, url, type, win) {
  var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
  var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

  var cmsURL = editor_config_default.path_absolute + 'filemanager?field_name=' + field_name;
  if (type == 'media') {
    cmsURL = cmsURL + "&type=Images";
  } else {
    cmsURL = cmsURL + "&type=Files";
  }

  tinyMCE.activeEditor.windowManager.open({
    file : cmsURL,
    title : 'Filemanager',
    width : x * 0.8,
    height : y * 0.8,
    resizable : "yes",
    close_previous : "no"
  });
}
};

tinymce.init(editor_config);
tinymce.init(editor_config_cn);
tinymce.init(editor_config_en);
tinymce.init(editor_config_default);