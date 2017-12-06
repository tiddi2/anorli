    $("#nameIncludes").keyup(search);
    $("input").change(search);
    $("#category").change(search);
    search();

    function search() {
        ajaxCall("search.php", {
                "nameIncludes": document.getElementById("nameIncludes").value,
                "category": document.getElementById("category").value,
                "orderBy": $('input[name=orderBy]:checked').val()
            },
            function(data) { $("#dataWrapper").html(data.responseText); })
    }

    function ajaxCall(link, data, callback) {
        $.ajax({
            type: "GET",
            url: link,
            dataType: "json",
            data: data,
            complete: function(data, status) { callback(data) }
        });
    }
    