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
            {data: 'title', name: 'title', width: '200px'},
            {data: 'description', name: 'description'},
            {data: 'ADVISER', name: 'ADVISER'},
            {data: 'details', name: 'details', orderable: false},
            //{data: 'first_name', name: 'first_name', visible: false},
            //{data: 'middle_name', name: 'middle_name', visible: false},
            {data: 'expires', name: 'expires'},
            {data: 'action', name: 'action', orderable: false, searchable: false, width: '150px'}
        ]
    });
    $('#questionSets-table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[0, "desc"]],
        "ajax": "questionSets/data",
        "columns": [
            {data: 'id', name: 'id', visible: false, searchable: false},
            {data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: false, searchable: false, width: '150px'}
        ]
    });
    $('#questions-table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [[0, "desc"]],
        "ajax": "questions/data",
        "columns": [
            {data: 'id', name: 'id', visible: false, searchable: false},
            {data: 'question', name: 'question'}
        ]
    });
        $("#dataTableBuilder").DataTable({
            "serverSide":true,
            "processing":true,
            "ajax":null,
            "columns":[
                {"data":"order","name":"order","title":"Order","orderable":false,"searchable":false},
                {"data":"question","name":"question","title":"Question","orderable":true,"searchable":true}
            ]
        });

});

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');