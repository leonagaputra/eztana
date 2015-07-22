var main = {
    base_url : null,
    base_app : null,
    overlay : null,
    temp : null,
    tmp_param : null
}

function show_message(str, title, width)
{
    if(title == undefined)title = "Pesan"
    var html = "<div id='message'>";
    html += str;
    html += "</div>";

    $("#message").unbind();
    $("#message").remove();
    $("body").append(html);
    $("#message").dialog({
        title :title,
        resizable:false,
        modal : true,
        draggable : false,
        width : width ? width : 300
    });
}

function show_loading() {
    var opts = {
		lines: 13, // The number of lines to draw
		length: 11, // The length of each line
		width: 5, // The line thickness
		radius: 17, // The radius of the inner circle
		corners: 1, // Corner roundness (0..1)
		rotate: 0, // The rotation offset
		color: '#FFF', // #rgb or #rrggbb
		speed: 1, // Rounds per second
		trail: 60, // Afterglow percentage
		shadow: false, // Whether to render a shadow
		hwaccel: false, // Whether to use hardware acceleration
		className: 'spinner', // The CSS class to assign to the spinner
		zIndex: 2e9, // The z-index (defaults to 2000000000)
		top: 'auto', // Top position relative to parent in px
		left: 'auto' // Left position relative to parent in px
	};
	var target = document.createElement("div");
	document.body.appendChild(target);
	var spinner = new Spinner(opts).spin(target);
	this.overlay = iosOverlay({
		text: "Loading",
		spinner: spinner
	});

}

//hide loading
function hide_overlay(){
    window.setTimeout(function() {
            this.overlay.hide();
    }, 1000);
}

//success/error message loading
function show_success_loading(status){
    var img = main.base_url+"img/check.png";
    var text = "Success";
    if(status != 1){
        img = main.base_url+"img/cross.png";
        text = "Error";
    }
    this.overlay.update({
            icon: img,
            text: text
    });
    
    hide_overlay();
}

function show_home(){
    $.ajax({
        type:"POST",
        //data:"id="+id,
        dataType:"html",
        url:main.base_url+"index.php/menu/show_beranda",
        success:function(msg){            
            $("#right").empty();
            var html = msg;
            
            $("#right").append(html);
            html = null;
        }
    });
}

function listrik_confirm_page(){
    var param = "";
    param = $("#listrik_confirm").serialize();
    
    show_loading();
    $.ajax({
        type: "POST",
        dataType: "JSON",
        data: param,
        url: main.base_url + "index.php/listrik/confirm",
        error: function (jqxhr, exc) {
            show_success_loading(0);
        },
        success: function (msg) {
            //msgs = $.parseJSON(msg);
            //console.log(msg);
            console.log(msg.biaya_admin);
            hide_overlay();
            //show_success_loading(1);            
        }
    });
}

function save_edit(obj) {
    $(".editbutton").show();
    $(".updatebutton").hide();
    var hdr_id = $("#hdr_id").val();
    var dtl_id = $("#dtl_id").val();
    var title = $("#dtl_title").val();
    var desc = $("#dtl_desc").code();
    var result = "";
    result += "hdr_id=" + hdr_id;
    result += "&dtl_id=" + dtl_id;
    result += "&title=" + title;
    result += "&desc=" + desc.replace(/&nbsp;/g," ");

    show_loading();
    $.ajax({
        type: "POST",
        dataType: "JSON",
        data: result,
        url: main.base_url + "index.php/backend/update_detail",
        error: function (jqxhr, exc) {
            show_success_loading(0);
        },
        success: function (msg) {
            //msgs = $.parseJSON(msg);
            //console.log(msg);
            show_success_loading(1);
            $($(obj).parent().parent().children()[0]).html(title);
            $($(obj).parent().parent().children()[1]).html(desc);
        }
    });
}

function submit_header(obj) {
    var result = "";

    result += "id=";
    result += $("#hdr input[name=id]").val();
    result += "&";
    result += "title=";
    result += $("#hdr input[name=title]").val();
    result += "&";
    result += "desc=";
    result += $(".summernote").code().replace(/&nbsp;/g," ");
    result += "&";

    //alert(result);
    //return;
    //console.log(result);
    show_loading();
    $.ajax({
        type: "POST",
        dataType: "JSON",
        data: result,
        url: main.base_url + "index.php/backend/update_header",
        error: function (jqxhr, exc) {
            show_success_loading(0);
        },
        success: function (msg) {
            //msgs = $.parseJSON(msg);
            //console.log(msg);
            show_success_loading(1);
        }
    });
}

function reset_header(obj) {
    var result = "";
    result += "id=";
    result += $("#hdr input[name=id]").val();
    show_loading();
    $.ajax({
        type: "POST",
        dataType: "JSON",
        data: result,
        url: main.base_url + "index.php/backend/reset_header",
        error: function (jqxhr, exc) {
            show_success_loading(0);
        },
        success: function (msg) {
            //msgs = $.parseJSON(msg);
            //console.log(msg);
            $("#hdr input[name=title]").val(msg.VTITLE);
            $("#hdr_desc").code(msg.VDESC);
            hide_overlay();
        }
    });
}

function update_information(obj) {
    var result = $("#information_form").serialize();
    
    show_loading();
    $.ajax({
        type: "POST",
        dataType: "JSON",
        data: result,
        url: main.base_url + "index.php/backend/update_information",
        error: function (jqxhr, exc) {
            show_success_loading(0);
        },
        success: function (msg) {
            //msgs = $.parseJSON(msg);
            //console.log(msg);
            $("#hdr input[name=title]").val(msg.VTITLE);
            $("#hdr_desc").code(msg.VDESC);
            show_success_loading(1);
        }
    });
}

