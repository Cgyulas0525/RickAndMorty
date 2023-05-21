<div class="table-responsive">
    <table class="table" id="characters-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Status</th>
        <th>Species</th>
        <th>Type</th>
        <th>Gender</th>
        <th>Origin Name</th>
        <th>Origin Url</th>
        <th>Location Name</th>
        <th>Location Url</th>
        <th>Image</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($characters as $characters)
            <tr>
                <td>{{ $characters->name }}</td>
            <td>{{ $characters->status }}</td>
            <td>{{ $characters->species }}</td>
            <td>{{ $characters->type }}</td>
            <td>{{ $characters->gender }}</td>
            <td>{{ $characters->origin_name }}</td>
            <td>{{ $characters->origin_url }}</td>
            <td>{{ $characters->location_name }}</td>
            <td>{{ $characters->location_url }}</td>
            <td>{{ $characters->image }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['characters.destroy', $characters->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('characters.show', [$characters->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('characters.edit', [$characters->id]) }}" class='btn btn-default btn-xs'>
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
