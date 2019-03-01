var data;
$.ajax({
    url: "data/data2014.json",
    dataType: 'json',
    async: false,
    success: function (result) {
        data = result;
    },
    error: function (jqXHR, textStatus, errorThrown) {
        console.log("request failed " + textStatus);
    }
});