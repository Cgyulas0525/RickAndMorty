@section('css')
    <link rel="stylesheet" href="pubic/css/app.css">
    @include('layouts.datatables_css')
    @include('layouts.costumcss')
@endsection

<div class="form-group col-sm-12">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered partners-table w-100"></table>
            </div>
        </div>
    </div>
    <div class="text-center">

    </div>

</div>

@section('scripts')
    @include('layouts.datatables_js')

    <script type="text/javascript">
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.partners-table').DataTable({
                serverSide: true,
                scrollY: 450,
                scrollX: true,
                order: [[1, 'asc']],
                paging: false,
                ajax: "{{ route('serieEpisodsIndex', $series->id) }}",
                columns: [
                    {title: 'Akció',
                        data: 'action', sClass: "text-center", width: '50px', name: 'action', orderable: false, searchable: false},
                    {title: 'Név', data: 'name', name: 'name'},
                    {title: 'Adás', data: 'air_date', render: function (data, type, row) { return data ? moment(data).format('YYYY.MM.DD') : ''; }, sClass: "text-center", width:'150px', name: 'air_date'},
                    {title: 'Karakterek', data: 'characterNumber', render: $.fn.dataTable.render.number( '.', ',', 0), sClass: "text-right", width:'100px', name: 'characterNumber'},
                    {title: 'Epizód', data: 'episode', name: 'episode'},
                ],
                buttons: [],
            });

        });
    </script>
@endsection

