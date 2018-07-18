$('#file-btn').click(function() {
    $('#csvFile-btn').trigger('click');
});

$('#csvFile-btn').change(function(e) {
    $('#file-title').text(e.target.files[0].name);
    var csvfile = e.target.files[0];
    var filename = '';

    if (csvfile != undefined) {
        filename = csvfile.name;
    }

    $('#file-title').text(filename);
});
