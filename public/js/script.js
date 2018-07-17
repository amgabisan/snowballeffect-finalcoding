$('#file-btn').click(function() {
    $('#csvFile-btn').trigger('click');
});

$('#csvFile-btn').change(function(e) {
    $('#file-title').text(e.target.files[0].name);
});
