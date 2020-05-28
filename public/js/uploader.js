(function() {
    $(function() {
        $(".editProfileModal")
            .modal({
                blurring: true
            })
            .modal("setting", "transition", "vertical flip")
            .modal("attach events", ".editProfileButton", "show");
        $(".cancelModalProfile").click(function() {
            $(".editProfileModal").modal("hide");
        });
        $(".editProfileButton").click(function() {
            $(".edit_errors").children().remove()
            $(".editname").val($(".profname").text());
            $(".editusername").val($(".profusername").text());
            $(".editemail").val($(".profemail").text());
        });
        var request;
        $(".okModalProfile").click(function() {
            event.preventDefault();

            // Abort any pending request
            if (request) {
                request.abort();
            }
            // setup some local variables
            var $form = $(".editProfileModal");

            // Let's select and cache all the fields
            var $inputs = $form.find("input");

            // Serialize the data in the form
            var serializedData = $inputs.serialize();
            // Let's disable the inputs for the duration of the Ajax request.
            // Note: we disable elements AFTER the form data has been serialized.
            // Disabled form elements will not be serialized.
            $inputs.prop("disabled", true);

            // Fire off the request to /form.php
            request = $.ajax({
                url: "/editprofile",
                type: "post",
                data: serializedData
            });

            // Callback handler that will be called on success
            request.done(function(response, textStatus, jqXHR) {
                // Log a message to the console
                console.log(response);
                location.reload();
            });

            // Callback handler that will be called on failure
            request.fail(function(jqXHR, textStatus, errorThrown) {
                $form.children(".edit_errors").children().remove()//.remove();
                var result = Object.entries(jqXHR.responseJSON.errors);
                var splited = result.toString().split(",");
                splited = splited.filter(function(split) {
                    return split.endsWith(".");
                });
                var list = $("<ol/>", {
                    class: "ui ordered list"
                });

                for (let index = 0; index < splited.length; index++) {
                    list.append(
                        $("<li/>", {
                            class: ""
                        }).append("<span class='ui inverted red text'>"+splited[index]+"</span>")
                    );
                }

                list.appendTo(".edit_errors");
            });

            // Callback handler that will be called regardless
            // if the request failed or succeeded
            request.always(function() {
                // Reenable the inputs
                $inputs.prop("disabled", false);
            });
        });
        /**
      <div class="item">
                        <a class="ui teal image medium label">
                            <img src="https://fomantic-ui.com/images/avatar/small/joe.jpg">
                            image_1
                        </a>
                    </div>
     */

        $(".EditCommentFile").change(function() {
            var files = $(this).get(0).files;
            var elements = 0;
            var count = 0;
            var api = "07330fd01957e18b1ad6a0e07954d026";
            $(".upeditimages")
                .children()
                .remove();
            $.each(files, function(i, file) {
                var content =
                    '<div class="item"><a class="ui teal image medium label"><img src="https://fomantic-ui.com/images/avatar/small/joe.jpg"><div class="ui teal double loading button" style="padding:0 !important">upload</div><div class="ui dimmer transition hidden"></div></a></div>';
                $(".upeditimages").append(content);
                count++;
            });
            $.each(files, function(i, file) {
                form = new FormData();
                form.append("image", file);
                $.ajax({
                    url: "https://api.imgbb.com/1/upload?key=" + api,
                    type: "POST",
                    data: form,
                    cache: false,
                    contentType: false,
                    processData: false
                }).always(function(jqXHR) {
                    count--;
                    if (jqXHR.status != 200) {
                        res = $.parseJSON(jqXHR.responseText);
                    } else {
                        res = jqXHR;
                    }

                    if (res.data.error) {
                        alert("error");
                    } else {
                        content =
                            '<div class="item"><a class="ui teal image medium label"> <img style="width: 50px !important;" src="' +
                            res.data.thumb.url +
                            '" thumb="' +
                            res.data.image.url +
                            '" onclick=lightit(this)>' +
                            res.data.id +
                            "</a></div>";
                        $($(".upeditimages").children()[elements]).replaceWith(
                            content
                        );
                        elements++;
                        //$(".upimages").append(content);
                        console.log(res.data.image.url);
                    }
                });
            });
        });

        $(".commentFile").change(function() {
            console.log("here2");
            var files = $(this).get(0).files;
            var elements = 0;
            var api = "07330fd01957e18b1ad6a0e07954d026";
            var count = 0;
            $.each(files, function(i, file) {
                var content =
                    '<div class="item"><a class="ui teal image medium label"><img src="https://fomantic-ui.com/images/avatar/small/joe.jpg"><div class="ui teal double loading button" style="padding:0 !important">upload</div><div class="ui dimmer transition hidden"></div></a></div>';
                $(".upimages").append(content);
                count++;
            });
            $.each(files, function(i, file) {
                form = new FormData();
                form.append("image", file);
                $.ajax({
                    url: "https://api.imgbb.com/1/upload?key=" + api,
                    type: "POST",
                    data: form,
                    cache: false,
                    contentType: false,
                    processData: false
                }).always(function(jqXHR) {
                    count--;
                    if (jqXHR.status != 200) {
                        res = $.parseJSON(jqXHR.responseText);
                    } else {
                        res = jqXHR;
                    }

                    if (res.data.error) {
                        alert("error");
                    } else {
                        content =
                            '<div class="item"><a class="ui teal image medium label"> <img style="width: 50px !important;" src="' +
                            res.data.thumb.url +
                            '" thumb="' +
                            res.data.image.url +
                            '" onclick=lightit(this)>' +
                            res.data.id +
                            "</a></div>";
                        $($(".upimages").children()[elements]).replaceWith(
                            content
                        );
                        elements++;
                        //$(".upimages").append(content);
                        console.log(res.data.image.url);
                    }
                });
            });

            //for (var i = 0; i < .length; ++i) {
            //  names.push(URL.createObjectURL($(this).get(0).files[i]));
            // }
        });
        $(".posteditFile").change(function() {
            console.log("test");
            var files = $(this).get(0).files;
            var elements = 0;
            var count = 0;
            var api = "07330fd01957e18b1ad6a0e07954d026";
            $(".upeditpost")
                .children()
                .remove();
            $.each(files, function(i, file) {
                var content =
                    '<div class="item"><a class="ui teal image medium label"><img src="https://fomantic-ui.com/images/avatar/small/joe.jpg"><div class="ui teal double loading button" style="padding:0 !important">upload</div><div class="ui dimmer transition hidden"></div></a></div>';
                $(".upeditpost").append(content);
                count++;
            });
            $.each(files, function(i, file) {
                form = new FormData();
                form.append("image", file);
                $.ajax({
                    url: "https://api.imgbb.com/1/upload?key=" + api,
                    type: "POST",
                    data: form,
                    cache: false,
                    contentType: false,
                    processData: false
                }).always(function(jqXHR) {
                    count--;
                    if (jqXHR.status != 200) {
                        res = $.parseJSON(jqXHR.responseText);
                    } else {
                        res = jqXHR;
                    }

                    if (res.data.error) {
                        alert("error");
                    } else {
                        content =
                            '<div class="item"><a class="ui teal image medium label"> <img style="width: 50px !important;" src="' +
                            res.data.thumb.url +
                            '" thumb="' +
                            res.data.image.url +
                            '" onclick=lightit(this)>' +
                            res.data.id +
                            "</a></div>";
                        $($(".upeditpost").children()[elements]).replaceWith(
                            content
                        );
                        elements++;
                        //$(".upimages").append(content);
                        console.log(res.data.image.url);
                    }
                });
            });
        });
        $(".post_issue,.post_comment,.editPostButton").click(function() {
            if ($(".editPostButton").length) {
                $("#body_problem").val($(".simditor-body").html());
            } else $("#body_problem").val($(".simditor-body").html() + "<p><br></p>");
            console.log($(".keyword").dropdown("get value"));
            $(".tags_input").val($(".tags").dropdown("get value")[1]);
            $(".keywords_input").val($(".keyword").dropdown("get value"));
            var imges = "";
            $(".upimages")
                .children(".item")
                .each(function() {
                    imges =
                        imges +
                        "src=" +
                        $(this)
                            .find("img")
                            .attr("src") +
                        " thumb=" +
                        $(this)
                            .find("img")
                            .attr("thumb") +
                        ","; // "this" is the current element in the loop
                });
            $(".images_input").val(imges);
            //console.log( $("#body_problem").val());
            document.forms["createissue"].submit();
            // $(".ui.relaxed.divided.list").children().remove();
            // $(".ui.relaxed.divided.list").append($(".simditor-body").children());
        });
        // copy to clipboard

        $("#copyButton").click(function() {
            console.log("somne");
            var value = `<input value="${$(this).attr(
                "copy"
            )}" id="selVal" style="position:absolute;top:-300px;" />`;
            $("body").append(value);
            $("#selVal").select();
            document.execCommand("Copy");
            $("body")
                .find("#selVal")
                .remove();
        });
    });
}.call(this));
