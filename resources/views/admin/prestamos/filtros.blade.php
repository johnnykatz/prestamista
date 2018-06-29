@section('scripts')
    <script>
        {{--window.onload = function () {--}}
        {{--$('#btn-exportar-excel').click(function () {--}}
                {{--$('#form_listado').attr('target', '_blank');--}}
                {{--$('#form_listado').attr('action', '{!! route('ProductosDistribuidoresGenerarExcel') !!}');--}}
                {{--$('#form_listado').submit();--}}
                {{--$('#form_listado').removeAttr('target');--}}
                {{--$('#form_listado').removeAttr('action');--}}

            {{--});--}}
        {{--}--}}
    </script>

@endsection


{!! Form::model($filtro,['route'=>'admin.prestamos.index','method'=>'GET','class'=>'form-horizontal','id'=>'form_listado']) !!}

<div class="form-group">
    {!! Form::label('comodin', 'Buscar:',['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::text('comodin',(isset($filtro['comodin']))? $filtro['comodin']:'',['class'=>'form-control']) !!}

    </div>
</div>

<div class="form-group col-sm-3 pull-right ">
    {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
    {{--<button class="btn btn-success btn-label-left" type="button" id="btn-exportar-excel" title="exportar excel">--}}
                                {{--<span>--}}
                                    {{--<i class="fa fa-file-excel-o"></i>--}}
                                {{--</span>--}}
    {{--</button>--}}
</div>
{!! Form::close() !!}