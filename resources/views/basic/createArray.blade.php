<span>Ilość wierszy {{ $rows }}</span><br />
<span>Ilość kolumn {{ $cols }}</span>
<br />
<br />
{!! Form::open(array('url' => URL::to('basic/result'), 'method' => 'post', 'class' => 'bf')) !!}
    {!! Form::hidden('cols', $cols) !!}
    {!! Form::hidden('rows', $rows) !!}
    @for ($x = 0; $x < $rows; $x++)
        {!! Form::text('row' . $x, $x, array('class' => 'form-control')) !!}
        @for ($i = 1; $i < $cols; $i++)
            {!! Form::text('col' . $i . 'row' . $x, $x . $i, array('class' => 'form-control')) !!}
        @endfor
        <br />
    @endfor
    
    <br />
    <button type="submit" class="btn btn-sm btn-success">
        <span class="glyphicon glyphicon-ok-circle"></span>
            {{trans("oblicz") }}
    </button>
{!! Form::close() !!}