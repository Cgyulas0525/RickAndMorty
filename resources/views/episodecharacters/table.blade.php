<div class="table-responsive">
    <table class="table" id="episodecharacters-table">
        <thead>
            <tr>
                <th>Episode Id</th>
        <th>Character Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($episodecharacters as $episodecharacters)
            <tr>
                <td>{{ $episodecharacters->episode_id }}</td>
            <td>{{ $episodecharacters->character_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['episodecharacters.destroy', $episodecharacters->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('episodecharacters.show', [$episodecharacters->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('episodecharacters.edit', [$episodecharacters->id]) }}" class='btn btn-default btn-xs'>
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
