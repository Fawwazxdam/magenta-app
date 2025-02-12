<script>
    $(document).ready(function() {
        let employeeTable = $('#employee-table')
        let employeeDatatable = employeeTable.DataTable({
            ajax: {
                url: '{{ route('api.employee.datatable') }}',
                data: function(data) {
                    data.search = {
                        name: $('#name').val(),
                    }
                }
            },
            serverSide: true,
            processing: true,
            deferRender: true,
            // scroller: true,
            // scrollCollapse: false,
            // scrollY: 200,
            columnDefs: [
                {
                    targets: 0,
                    render: function(data, type, full, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1
                    }
                },
                {
                    targets: 1,
                    data: 'name',
                    render: function(data, type, full, meta) {
                        return full['name'];
                    }
                },
                {
                    targets: 2,
                    render: function(data, type, full, meta) {
                        return full['whatsapp'] ?? '-'
                    }
                },
                {
                    targets: 3,
                    render: function(data, type, full, meta) {
                        return full['address'] ?? '-';
                    }
                },
                {
                    targets: -1,
                    render: function(data, type, full, meta) {
                        return `<div class="text-center flex gap-3">
                                    <a href="employee/detail/${full['uuid']}" class="text-gray-600"><i class="fa fa-file"></i></a>
                                    <a href="employee/edit/${full['uuid']}" class="text-gray-600"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="text-gray-600 btn-delete-employee" data-id="${full['uuid']}" onclick="openDeleteModal('${full['uuid']}')"><i class="fa fa-trash"></i></button>
                                </div>`
                    }
                },
            ],
            dom: `t
                    <"flex items-center border-t py-4 "
                        <"w-full md:w-1/2 text-sm "i>
                        <"w-full md:w-1/2 flex items-center justify-end gap-2"
                            <"text-sm p-1 dropdown relative" l>
                            <"text-sm" p>
                        >
                    >`,

        });
        $('.btn-search').on('click', function() {
            employeeDatatable.draw()
        })
    });
    function openDeleteModal(uuid) {
            let deleteUrl = `/employee/delete/${uuid}`; // Sesuaikan dengan route Laravel Anda
            document.getElementById("confirmDeleteBtn").setAttribute("href", deleteUrl);
            
            // Buka modal
            document.getElementById("deleteEmployee").showModal();
        }
</script>
