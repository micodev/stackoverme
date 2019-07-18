(function(){
$(function(){

    /**
      <div class="item">
                        <a class="ui teal image medium label">
                            <img src="https://fomantic-ui.com/images/avatar/small/joe.jpg">
                            image_1
                        </a>
                    </div>
     */
    $("input:file").change(function() {
        var files = $(this).get(0).files;
        var elements =0;
        var api="07330fd01957e18b1ad6a0e07954d026";
        var count = 0;
        $.each(files, function(i, file){
            var content = '<div class="item"><a class="ui teal image medium label"><img src="https://fomantic-ui.com/images/avatar/small/joe.jpg"><div class="ui teal double loading button" style="padding:0 !important">upload</div><div class="ui dimmer transition hidden"></div></a></div>';
            $(".upimages").append(content);
            count++;
        });
        $.each(files, function(i, file){
            form = new FormData();
            form.append('image', file);
            $.ajax({
                url: 'https://api.imgbb.com/1/upload?key='+api,
                type: 'POST',
                data: form,
                cache: false,
                contentType: false,
                processData: false
            }).always(function(jqXHR){

                count--;
                if(jqXHR.status != 200 ) {
                    res = $.parseJSON(jqXHR.responseText);
                }else{
                    res = jqXHR;
                }

                if(res.data.error) {
                    alert("error");
                } else {
                    content = '<div class="item"><a class="ui teal image medium label"> <img style="width: 50px !important;" src="'+res.data.thumb.url+'" thumb="'+res.data.image.url+'" onclick=lightit(this)>'+res.data.id+'</a></div>';
                    $($(".upimages").children()[elements]).replaceWith(content);
                    elements++;
                    //$(".upimages").append(content);
                   console.log(res.data.image.url);
                }


            });
        });

        //for (var i = 0; i < .length; ++i) {
          //  names.push(URL.createObjectURL($(this).get(0).files[i]));
       // }

    })
    $(".post_issue,.post_comment").click(function(){

        $("#body_problem").val($(".simditor-body").html()+"<p><br></p>");
        $('.tags_input').val($(".tags").dropdown("get value")[1]);
        var imges = "";
        $('.upimages').children('.item').each(function () {

             imges=imges + "src=" + $(this).find( "img" ).attr("src") +" thumb=" + $(this).find( "img" ).attr("thumb")+ ","; // "this" is the current element in the loop
        });
          $(".images_input").val(imges);
        //console.log( $("#body_problem").val());
        document.forms["createissue"].submit();
        // $(".ui.relaxed.divided.list").children().remove();
        // $(".ui.relaxed.divided.list").append($(".simditor-body").children());
    })
    // copy to clipboard

    $("#copyButton").click( function() {
        console.log("somne");
        var value= `<input value="${ $(this).attr("copy")}" id="selVal" style="position:absolute;top:-300px;" />`;
        $('body').append(value);
        $("#selVal").select();
        document.execCommand("Copy");
        $('body').find("#selVal").remove();
    });


})
}).call(this);

