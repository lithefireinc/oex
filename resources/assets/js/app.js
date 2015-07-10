$(function(){
    $("#faculty_id").select2({
        theme: "bootstrap"
    });
    $("#start").on("dp.change", function (e) {
        $('#end').data("DateTimePicker").minDate(e.date);
    });
    $("#end").on("dp.change", function (e) {
        $('#start').data("DateTimePicker").maxDate(e.date);
    });
        $('#surveys-table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[0, "desc"]],
            "ajax": "surveys/data",
            "columns": [
                {data: 'id', name: 'id', visible: false, searchable: false},
                {data: 'description', name: 'description', width: '200px'},
                {data: 'ADVISER', name: 'ADVISER'},
                {data: 'details', name: 'details', orderable: false},
                {data: 'expires', name: 'expires'},
                {data: 'action', name: 'action', orderable: false, searchable: false, width: '150px'}
            ]
        });

});

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');