@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="pubic/css/app.css">
    @include('layouts.datatables_css')
    @include('layouts.costumcss')
@endsection

@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary" >
            <div class="box-body">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <section class="content-header">
                        <h4>Karakterek</h4>
                    </section>
                    @include('flash::message')
                    <div class="clearfix"></div>
                    <div class="box box-primary">
                        <div class="box-body"  >
                            <table class="table table-hover table-bordered partners-table w-100"></table>
                        </div>
                    </div>
                    <div class="text-center"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                ajax: "{{ route('characters.index') }}",
                columns: [

                    {title: 'Akció', data: 'action', sClass: "text-center", width: '50px', name: 'action', orderable: false, searchable: false},
                    {title: 'Név', data: 'name', name: 'name'},
                    {title: 'Kép', data: "image", "render": function (data) {
                            if ( data == null ) {
                                return '<img src="public/img/noAviableImage.jpg" style="height:40px;width:40px;object-fit:cover;"/>';
                            }
                            return '<img src="' + data + '" style="height:40px;width:40px;object-fit:cover;"/>';
                        }
                    },
                    {title: 'Státusz', data: 'status', name: 'status'},
                    {title: 'Faj', data: 'species', name: 'species'},
                    {title: 'Típus', data: 'type', name: 'type'},
                    {title: 'Nem', data: 'gender', name: 'gender'},
                    {title: 'Epizódok', data: 'episodeNumber', render: $.fn.dataTable.render.number( '.', ',', 0), sClass: "text-right", width:'100px', name: 'episodeNumber'},

                ],
                buttons: []
            });

        });
    </script>
@endsection


