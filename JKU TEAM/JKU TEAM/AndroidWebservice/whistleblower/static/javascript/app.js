function postReport() {
    var message = $('#message').val();
    var sector = $('#sector').val();
    var source = $('#source').val();

    if(sector === 'no_choice') {
        alert("You must select a sector");
        return;
    }

    $.ajax({
        url: '/api/report',
        type: 'post',
        data: { message: message, sector: sector, source: source }});

}

//function deleteReport(id) {
//
//    $.ajax({
//        url: '/api/delete_report',
//        type: 'post',
//        data: { id: id }})
//        .success(function (data) {
//            alert("successful");
//        })
//        .error(function(data) {
//            alert("error");
//        });
//
//}
//function saveReport(id) {
//
//
//    $.ajax({
//        url: '/api/save_report',
//        type: 'post',
//        data: { id: id }})
//        .success(function (data) {
//            alert("successful");
//        })
//        .error(function(data) {
//            alert("error");
//        });
//
//}