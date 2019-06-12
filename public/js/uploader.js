(function(){
$(function(){

    $("input:file").change(function() {
        var files = $(this).get(0).files;
        $.each(files, function(i, file){
            count++;
            form = new FormData();
            form.append('image', file);
            $.ajax({
                url: 'https://api.imgur.com/3/image',
                headers: { Authorization: "Client-ID " + ClientId },
                type: 'POST',
                data: form,
                cache: false,
                contentType: false,
                processData: false
            }).always(function(jqXHR){
                count--;
                $placeholder.text(count + editor.lang.imgur.uploading).toggle(count != 0);

                if(jqXHR.status != 200 ) {
                    res = $.parseJSON(jqXHR.responseText);
                }else{
                    res = jqXHR;
                }

                if(res.data.error) {
                    alert(editor.lang.imgur.failToUpload + res.data.error);
                } else {
                    content = '<img src="' + res.data.link +'"/>';
                    var element = CKEDITOR.dom.element.createFromHtml(content);
                    editor.insertElement(element);
                }


            });
        });
        var names = [];
        //for (var i = 0; i < .length; ++i) {
          //  names.push(URL.createObjectURL($(this).get(0).files[i]));
       // }
        console.log(names);
    })
})
}).call(this);

