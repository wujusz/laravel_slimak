{!! Form::open(array('url' => URL::to('basic/array'), 'method' => 'post', 'class' => 'bf')) !!}
    {!! Form::label('rows', trans("Ilość wierszy"), array('class' => 'control-label')) !!}
    {!! Form::input('number', 'rows', null, array('class' => 'form-control')) !!}
    <br/>
    {!! Form::label('cols', trans("Ilość kolumn"), array('class' => 'control-label', 'type' => 'number')) !!}
    {!! Form::input('number', 'cols', null, array('class' => 'form-control')) !!}
    <br />
    <button type="submit" class="btn btn-sm btn-success">
        <span class="glyphicon glyphicon-ok-circle"></span>
            {{trans("zapisz") }}
    </button>
{!! Form::close() !!}