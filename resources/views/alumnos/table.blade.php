<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="alumnos-table">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($alumnos as $alumnos)
                <tr>
                    <td>{{ $alumnos->nombre }}</td>
                    <td>{{ $alumnos->ciudad }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['alumnos.destroy', $alumnos->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('alumnos.show', [$alumnos->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('alumnos.edit', [$alumnos->id]) }}"
                               class='btn btn-default btn-xs'>
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

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $alumnos])
        </div>
    </div>
</div>
