<div class="table-responsive">
    <table class="table" id="episodes-table">
        <thead>
            <tr>
                <th>Serie Id</th>
        <th>Name</th>
        <th>Air Date</th>
        <th>Episode</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($episodes as $episodes)
            <tr>
                <td>{{ $episodes->serie_id }}</td>
            <td>{{ $episodes->name }}</td>
            <td>{{ $episodes->air_date }}</td>
            <td>{{ $episodes->episode }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['episodes.destroy', $episodes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('episodes.show', [$episodes->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('episodes.edit', [$episodes->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
