var json = (function() {
        var json = null;
        $.ajax({
            'async': false,
            'global': false,
            'url': "test.json",
            'dataType': "json",
            'success': function (data) {
                json = data;
            }
        });
        return json;
    })();
var markers = json;
console.log(markers.name)