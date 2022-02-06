// Call the dataTables jQuery plugin
$(document).ready(function () {

    $('.dataTable').DataTable({
        responsive: true,
        'ColumnDefs': [{
                'ordering':false,
                'bSortable': false,
                'aTargets': ['no-sort']
            }]
    });
});
