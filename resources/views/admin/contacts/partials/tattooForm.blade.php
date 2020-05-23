{!! Form::open([
    'route' => 'admin.contacts.tattoo.storeTattoo',
    'method' => 'post',
    'class' => 'form-horizontal',
    'id' => 'needs-validation',
    'novalidate'
]) !!}
    <div class="modal-body">
        <div class="row">
            <div class="col-12">
                {!! Form::label('name', 'Nome*', null, ['class' => 'control-label']) !!}
                {!! Form::text('name', null, [
                    'class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control',
                    'required' => ''
                ]) !!}
                <span class="invalid-feedback">
                    <strong>
                        @if ($errors->has('name'))
                            {{ $errors->first('name') }}
                        @else
                            O campo Nome é obrigatório!
                        @endif
                    </strong>
                </span>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-sm-12 col-lg-6 col-xl-6 mb-2">
                {!! Form::label('status', 'Andamento*', null, ['class' => 'control-label']) !!}
                {!! Form::select('status', [
                    'Andamento' => 'Andamento',
                    'Finalizado' => 'Finalizada'
                ], null, [
                    'placeholder' => 'Escolha o Andamento',
                    'class' => $errors->has('status') ? 'form-control custom-select is-invalid' : 'form-control custom-select',
                    'required' => ''
                ]) !!}
                <span class="invalid-feedback">
                    <strong>
                        @if ($errors->has('status'))
                            {{ $errors->first('status') }}
                        @else
                            O campo Andamento é obrigatório!
                        @endif
                    </strong>
                </span>
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-6 mb-2">
                {!! Form::label('date', 'Data*', null, ['class' => 'control-label']) !!}
                <div class="input-group date">
                    {!! Form::text('date', null, [
                        'class' => $errors->has('date') ? 'form-control date-tattoo is-invalid' : 'form-control date-tattoo',
                        'required' => ''
                    ]) !!}
                    <div class="input-group-append input-group-addon">
                      <span class="input-group-text">
                          <i class="fas fa-calendar-alt"></i>
                      </span>
                    </div>
                    <span class="invalid-feedback">
                        <strong>
                            @if ($errors->has('date'))
                                {{ $errors->first('date') }}
                            @else
                                O campo Data é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
        {!! Form::submit('Adicionar', ['class' => 'btn btn-primary btn-sm']) !!}
        {!! Form::text('id', $contact->id, ['hidden']) !!}
        <span class="invalid-feedback">
            <strong>
                @if ($errors->has('id'))
                    {{ $errors->first('id') }}
                @endif
            </strong>
        </span>
    </div>
{!! Form::close() !!}
