@section('css')
    <link rel="stylesheet" href="pubic/css/app.css">
    @include('layouts.datatables_css')
    @include('layouts.costumcss')
@endsection

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Species Field -->
<div class="form-group col-sm-6">
    {!! Form::label('species', 'Species:') !!}
    {!! Form::text('species', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::text('gender', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Origin Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('origin_name', 'Origin Name:') !!}
    {!! Form::text('origin_name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Origin Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('origin_url', 'Origin Url:') !!}
    {!! Form::text('origin_url', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Location Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location_name', 'Location Name:') !!}
    {!! Form::text('location_name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Location Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location_url', 'Location Url:') !!}
    {!! Form::text('location_url', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

@if (isset($characters))
    <div class="form-group col-lg-3 col-md-6 col-sm-12">
        <img src={{ URL::asset($characters->image) }} alt="User Image">
    </div>
@endif

<div class="form-group col-lg-9 col-md-6 col-sm-12">
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
                ajax: "{{ route('characterEpisodesIndex', $characters->id) }}",
                columns: [
                    {title: 'Akció',
                        data: 'action', sClass: "text-center", width: '50px', name: 'action', orderable: false, searchable: false},
                    {title: 'Epizód', data: 'episode', name: 'episode'},
                    {title: 'Név', data: 'name', name: 'name'},
                    {title: 'Adás', data: 'air_date', render: function (data, type, row) { return data ? moment(data).format('YYYY.MM.DD') : ''; }, sClass: "text-center", width:'150px', name: 'air_date'},
                    {title: 'Karakterek', data: 'characterNumber', render: $.fn.dataTable.render.number( '.', ',', 0), sClass: "text-right", width:'100px', name: 'characterNumber'},
                ],
                buttons: [],
            });

        });
    </script>
@endsection
