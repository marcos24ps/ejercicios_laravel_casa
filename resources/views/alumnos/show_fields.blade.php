<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $alumnos->nombre }}</p>
</div>

<!-- Ciudad Field -->
<div class="col-sm-12">
    {!! Form::label('ciudad', 'Ciudad:') !!}
    <p>{{ $alumnos->ciudad }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $alumnos->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $alumnos->updated_at }}</p>
</div>

