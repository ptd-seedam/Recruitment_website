<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function(event) {
                if (!confirm('Bạn có chắc chắn muốn xóa chứ?')) {
                    event.preventDefault();
                }
            });
        });
    });
</script>
<!-- ============================================================== -->
<script src="{{ asset('dashboard/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('dashboard/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/extra-libs/sparkline/sparkline.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('dashboard/dist/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('dashboard/dist/js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('dashboard/dist/js/custom.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/custom_js.js') }}"></script>


<script src="{{ asset('dashboard/assets/libs/flot/excanvas.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/flot/jquery.flot.time.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/flot/jquery.flot.crosshair.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('dashboard/dist/js/pages/chart/chart-page-init.js') }}"></script>
<script src="{{ asset('dashboard/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
<script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $(document).ready(function() {
        $('#zero_config').DataTable({
            "language": {
                "decimal": "",
                "emptyTable": "Không có dữ liệu trong bảng",
                "info": "Hiển thị _START_ đến _END_ trong _TOTAL_ mục",
                "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                "infoFiltered": "(lọc từ _MAX_ tổng số mục)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Hiển thị _MENU_ mục",
                "loadingRecords": "Đang tải...",
                "processing": "Đang xử lý...",
                "search": "Tìm kiếm:",
                "zeroRecords": "Không tìm thấy kết quả",
                "paginate": {
                    "first": "Đầu tiên",
                    "last": "Cuối cùng",
                    "next": "Tiếp theo",
                    "previous": "Trước đó"
                },
                "aria": {
                    "sortAscending": ": sắp xếp tăng dần",
                    "sortDescending": ": sắp xếp giảm dần"
                }
            }
        });
    });
</script>
