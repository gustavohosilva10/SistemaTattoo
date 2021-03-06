{!! Form::open([
    'route' => 'admin.contacts.session.storeSession',
    'method' => 'post',
    'class' => 'form-horizontal',
    'id' => 'needs-validation-1',
    'novalidate'
]) !!}
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-12 col-lg-6 col-xl-6 mb-2">
                {!! Form::label('date', 'Data*', null, ['class' => 'control-label']) !!}
                <div class="input-group date">
                    {!! Form::text('date', null, [
                        'class' => $errors->has('date') ? 'form-control date-session is-invalid' : 'form-control date-session',
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
            <div class="col-sm-12 col-lg-6 col-xl-6 mb-2">
                {!! Form::label('time', 'Horário*', null, ['class' => 'control-label']) !!}
                <div class="input-group">
                    {!! Form::time('time', null, [
                        'class' => $errors->has('time') ? 'form-control is-invalid px-3' : 'form-control px-3',
                        'required' => ''
                    ]) !!}
                    <div class="input-group-append input-group-addon">
                      <span class="input-group-text">
                          <i class="fas fa-clock"></i>
                      </span>
                    </div>
                    <span class="invalid-feedback">
                        <strong>
                            @if ($errors->has('time'))
                                {{ $errors->first('time') }}
                            @else
                                O campo Horário é obrigatório!
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
