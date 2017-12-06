function ajaxCall(link, data, callback) {
    $.ajax({
        type: "GET",
        url: link,
        dataType: "json",
        data: data,
        success: function(data, status) { callback(data) },
        complete: function(data, status) { console.log(status) }
    });
}
ajaxCall("https://pixabay.com/api/", {
    "key": "6509294-00a280679ef09752f7c28ab6d",
    "q": keyword.value

}, function() {

})
//q=$keyword&image_type=$type&orientation=$orientation&safesearch=$safeSearch&per_page=$number&order=$order
