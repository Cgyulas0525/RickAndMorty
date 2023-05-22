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
                        <h4>{{ __('Epizódok') }}</h4>
                        <div class="form-group col-sm-6">
                            <div class="row">
                                <div class="mylabel col-sm-1">
                                    {!! Form::label('serie', 'Évad:') !!}
                                </div>
                                <div class="col-sm-2">
                                    {!! Form::select('serie', \App\Http\Controllers\SeriesController::DDDW(), null,
                                            ['class'=>'select2 form-control', 'id' => 'vmi']) !!}
                                </div>
                            </div>
                        </div>

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
                paging: false,
                ajax: "{{ route('serieEpisodsIndex') }}",
                columns: [
                    {title: 'Akció',
                        data: 'action', sClass: "text-center", width: '50px', name: 'action', orderable: false, searchable: false},
                    {title: 'Epizód', data: 'episode', name: 'episode'},
                    {title: 'Név', data: 'name', name: 'name'},
                    {title: 'Karakterek', data: 'characterNumber', render: $.fn.dataTable.render.number( '.', ',', 0), sClass: "text-right", width:'100px', name: 'characterNumber'},
                ],
                buttons: []
            });

            $('#vmi').change(function () {
                let vmi = $('#vmi').val() != 0 ? $('#vmi').val() : -9999;
                let url = '{{ route('serieEpisodsIndex', [":serie"]) }}';
                url = url.replace(':serie', vmi);
                table.ajax.url(url).load();
            });


        });
    </script>
@endsection


