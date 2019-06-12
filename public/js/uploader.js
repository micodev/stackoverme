(function(){
$(function(){

    $("input:file").change(function() {
        var files = $(this).get(0).files;
        var api="07330fd01957e18b1ad6a0e07954d026";
        var count = 0;
        $.each(files, function(i, file){
            count++;
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
                    content = '<img src="' + res.data.image.url +'"/>';
                    $(".upimages").append(content);
                   console.log(res.data.image.url);
                }


            });
        });

        //for (var i = 0; i < .length; ++i) {
          //  names.push(URL.createObjectURL($(this).get(0).files[i]));
       // }

    })
})
}).call(this);

