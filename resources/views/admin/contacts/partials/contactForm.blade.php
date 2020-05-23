<div class="card text-dark bg-secondary border-dark shadow-lg mb-3">
    <div class="card-header text-light text-uppercase bg-dark font-weight-bold"><i class="fas fa-camera"></i> Foto</div>
    <div class="card-body py-5">
        <div class="fileinput-new row" data-provides="fileinput">
            <div class="col-sm-12 col-lg-10 col-xl-10 input-group">
                <div class="form-control" data-trigger="fileinput">
                    <i class="fas fa-file-image fileinput-exists"></i> <span class="fileinput-filename"></span>
                </div>
                <span class="input-group-addon btn btn-primary btn-file">
                    <span class="fileinput-new">Escolha a foto</span>
                    <span class="fileinput-exists">Troque a foto</span>
                    {!! Form::file('avatar', [
                        'class' => $errors->has('avatar') ? 'custom-file-input form-control is-invalid' : 'custom-file-input form-control',
                        'id' => 'avatar'
                    ]) !!}
                    <span class="invalid-feedback">
                        <strong>
                            @if ($errors->has('avatar'))
                                {{ $errors->first('avatar') }}
                            @endif
                        </strong>
                    </span>
                </span>
                <a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">Remova a foto</a>
            </div>
            <div class="col-sm-12 col-lg-2 col-xl-2 text-center d-none d-xl-block d-lg-block d-md-block">
                <div class="fileinput-new thumbnail">
                    @if ($contact)
                        @if ($contact->avatar)
                            <img class="img-fluid rounded-circle thumbnail-photo" src="{{ url("storage/{$contact->avatar}") }}" alt="Foto">
                        @else
                            @if ($contact->gender == 'M')
                                <i class="fas fa-male text-info" style="font-size:3em;"></i>
                            @elseif ($contact->gender == 'F')
                                <i class="fas fa-female text-danger" style="font-size:3em;"></i>
                            @else
                                <i class="fas fa-exclamation-triangle text-warning" style="font-size:3em;"></i>
                            @endif
                        @endif
                    @else
                        <i class="fas fa-exclamation-triangle text-warning" style="font-size:3em;"></i>
                    @endif
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail"></div>
            </div>
        </div>
    </div>
</div>

<div class="card text-dark bg-secondary border-dark shadow-lg mb-3">
    <div class="card-header text-light text-uppercase bg-dark font-weight-bold"><i class="fas fa-address-card"></i> Informações Pessoal</div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-sm-12 col-lg-4 col-xl-4 mb-2">
                {!! Form::label('first_name', 'Primeiro Nome*', null, ['class' => 'control-label']) !!}
                {!! Form::text('first_name', null, [
                    'class' => $errors->has('first_name') ? 'form-control is-invalid' : 'form-control',
                    'required' => ''
                ]) !!}
                <span class="invalid-feedback">
                    <strong>
                        @if ($errors->has('first_name'))
                            {{ $errors->first('first_name') }}
                        @else
                            O campo Primeiro Nome é obrigatório!
                        @endif
                    </strong>
                </span>
            </div>

            <div class="col-sm-12 col-lg-4 col-xl-4 mb-2">
                {!! Form::label('middle_name', 'Segundo Nome', null, ['class' => 'control-label']) !!}
                {!! Form::text('middle_name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="col-sm-12 col-lg-4 col-xl-4">
                {!! Form::label('last_name', 'Último Nome*', null, ['class' => 'control-label']) !!}
                {!! Form::text('last_name', null, [
                    'class' => $errors->has('last_name') ? 'form-control is-invalid' : 'form-control',
                    'required' => ''
                ]) !!}
                <span class="invalid-feedback">
                    <strong>
                        @if ($errors->has('last_name'))
                            {{ $errors->first('last_name') }}
                        @else
                            O campo Último Nome é obrigatório!
                        @endif
                    </strong>
                </span>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 col-lg-4 col-xl-4 mb-2">
                {!! Form::label('birthday', 'Data de nascimento*', null, ['class' => 'control-label']) !!}
                <div class="input-group">
                    {!! Form::text('birthday', ($contact) ? $contact->present()->getBirthday('format') : null, [
                        'class' => $errors->has('birthday') ? 'form-control birthday is-invalid' : 'form-control birthday',
                        'required' => ''
                    ]) !!}
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2">
                          <i class="fas fa-calendar-alt"></i>
                      </span>
                    </div>
                    <span class="invalid-feedback">
                        <strong>
                            @if ($errors->has('birthday'))
                                {{ $errors->first('birthday') }}
                            @else
                                O campo Data de nascimento é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4 col-xl-4 mb-2">
                {!! Form::label('gender', 'Sexo*', null, ['class' => 'control-label']) !!}
                {!! Form::select('gender', [
                    'M' => 'Masculino',
                    'F' => 'Feminino'
                ], null, [
                    'placeholder' => 'Escolha o Sexo',
                    'class' => $errors->has('gender') ? 'form-control custom-select is-invalid' : 'form-control custom-select',
                    'required' => ''
                ]) !!}
                <span class="invalid-feedback">
                    <strong>
                        @if ($errors->has('gender'))
                            {{ $errors->first('gender') }}
                        @else
                            O campo Sexo é obrigatório!
                        @endif
                    </strong>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="card text-dark bg-secondary border-dark shadow-lg mb-3">
    <div class="card-header text-light text-uppercase bg-dark font-weight-bold"><i class="fas fa-address-book"></i> Informações de Contato</div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-sm-12 col-lg-6 col-xl-6 mb-2">
                {!! Form::label('email', 'Email', null, ['class' => 'control-label']) !!}
                {!! Form::text('email', null, [
                    'class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control',
                    'required' => ''
                ]) !!}
                <span class="invalid-feedback">
                    <strong>
                        @if ($errors->has('email'))
                            {{ $errors->first('email') }}
                        @else
                            O campo Email é obrigatório!
                        @endif
                    </strong>
                </span>
            </div>
            <div class="col-sm-12 col-lg-3 col-xl-3 mb-2">
                {!! Form::label('phone1', 'Fixo', null, ['class' => 'control-label']) !!}
                {!! Form::text('phone1', ($contact) ? $contact->present()->getPhone(1) : null, ['class' => 'form-control phone1']) !!}
            </div>
            <div class="col-sm-12 col-lg-3 col-xl-3 mb-2">
                {!! Form::label('phone2', 'Celular', null, ['class' => 'control-label']) !!}
                {!! Form::text('phone2', ($contact) ? $contact->present()->getPhone(2) : null, ['class' => 'form-control phone2']) !!}
            </div>
        </div>
    </div>
</div>

<div class="card text-dark bg-secondary border-dark shadow-lg mb-3">
    <div class="card-header text-light text-uppercase bg-dark font-weight-bold"><i class="fas fa-map-marker"></i> Endereço</div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-sm-12 col-lg-2 col-xl-2 mb-2">
                {!! Form::label('zip_code', 'CEP', null, ['class' => 'control-label']) !!}
                {!! Form::text('zip_code', null, [
                    'class' => 'form-control zip_code',
                    'id' => 'zip_code'
                ]) !!}
            </div>
            <div class="col-sm-12 col-lg-8 col-xl-8 mb-2">
                {!! Form::label('address', 'Rua', null, ['class' => 'control-label']) !!}
                {!! Form::text('address', null, [
                    'class' => 'form-control',
                    'id' => 'address'
                ]) !!}
            </div>
            <div class="col-sm-12 col-lg-2 col-xl-2 mb-2">
                {!! Form::label('number', 'Número', null, ['class' => 'control-label']) !!}
                {!! Form::text('number', null, [
                    'class' => 'form-control',
                    'id' => 'number'
                ]) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 col-lg-5 col-xl-5 mb-2">
                {!! Form::label('complement', 'Complemento', null, ['class' => 'control-label']) !!}
                {!! Form::text('complement', null, ['class' => 'form-control',]) !!}
            </div>
            <div class="col-sm-12 col-lg-3 col-xl-3 mb-2">
                {!! Form::label('strict', 'Bairro', null, ['class' => 'control-label']) !!}
                {!! Form::text('strict', null, [
                    'class' => 'form-control',
                    'id' => 'strict'
                ]) !!}
            </div>
            <div class="col-sm-12 col-lg-2 col-xl-2 mb-2">
                {!! Form::label('city', 'Cidade', null, ['class' => 'control-label']) !!}
                {!! Form::text('city', null, [
                    'class' => 'form-control',
                    'id' => 'city'
                ]) !!}
            </div>
            <div class="col-sm-12 col-lg-2 col-xl-2 mb-2">
                {!! Form::label('state', 'Estado', null, ['class' => 'control-label']) !!}
                {!! Form::text('state', null, [
                    'class' => 'form-control',
                    'id' => 'state'
                ]) !!}
            </div>
        </div>
    </div>
</div>

<div class="card text-dark bg-secondary border-dark shadow-lg mb-3">
    <div class="card-header text-light text-uppercase bg-dark font-weight-bold">
        <i class="fas fa-briefcase-medical"></i> Informações de Saúde
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-12">
                {!! Form::label(null, 'Tipo Sanguíneo', null, ['class' => 'control-label']) !!}
                <br />
                <div>
                    {!! Form::text('anamnesis[blood][health]', 0, [
                        'class' => $errors->has('anamnesis.blood.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                        'hidden'
                    ]) !!}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[blood][description]',
                        'A',
                        (empty($contact)) ? null : $contact->present()->getValueCheck(0, 'A', 'description', $contact),
                        [
                            'class' => $errors->has('anamnesis.blood.description') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'description1',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('description1', 'A', [
                        'class' => 'custom-control-label',
                    ]) !!}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[blood][description]',
                        'B',
                        (empty($contact)) ? null : $contact->present()->getValueCheck(0, 'B', 'description', $contact),
                        [
                            'class' => $errors->has('anamnesis.blood.description') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'description2',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('description2', 'B', [
                        'class' => 'custom-control-label',
                    ]) !!}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[blood][description]',
                        'AB',
                        (empty($contact)) ? null : $contact->present()->getValueCheck(0, 'AB', 'description', $contact),
                        [
                            'class' => $errors->has('anamnesis.blood.description') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'description3',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('description3', 'AB', [
                        'class' => 'custom-control-label',
                    ]) !!}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[blood][description]',
                        'O',
                        (empty($contact)) ? null : $contact->present()->getValueCheck(0, 'O', 'description', $contact),
                        [
                            'class' => $errors->has('anamnesis.blood.description') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'description4',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('description4', 'O', [
                        'class' => 'custom-control-label',
                    ]) !!}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[blood][description]',
                        'Não sei',
                        (empty($contact)) ? true : $contact->present()->getValueCheck(0, 'Não sei', 'description', $contact),
                        [
                            'class' => $errors->has('anamnesis.blood.description') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'description5',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('description5', 'Não sei', [
                        'class' => 'custom-control-label pr-5',
                    ]) !!}
                    <span class="invalid-feedback" style="width:initial;">
                        <strong>
                            @if ($errors->has('anamnesis.blood.description'))
                                {{ $errors->first('anamnesis.blood.description') }}
                            @else
                                O campo Tipo Snaguíneo é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 col-lg-6 col-xl-6 mb-2">
                {!! Form::label(null, 'Sofre alguma alergia?', null, ['class' => 'control-label']) !!}
                <br />
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[allergy][health]',
                        0,
                        true,
                        [
                            'class' => $errors->has('anamnesis.allergy.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'allergy1',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('allergy1', 'Não', [
                        'class' => 'custom-control-label',
                    ]) !!}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[allergy][health]',
                        1,
                        (empty($contact)) ? null : $contact->present()->getValueCheck(1, 't', 'health', $contact),
                        [
                            'class' => $errors->has('anamnesis.allergy.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'allergy2',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('allergy2', 'Sim', [
                        'class' => 'custom-control-label pr-5',
                    ]) !!}
                    <span class="invalid-feedback" style="width:initial;">
                        <strong>
                            @if ($errors->has('anamnesis.allergy.health'))
                                {{ $errors->first('anamnesis.allergy.health') }}
                            @else
                                O campo Sofre alguma alergia é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
                <div class="pt-2">
                    {!! Form::text(
                        'anamnesis[allergy][description]',
                        (empty($contact)) ? null : $contact->present()->getValueCheck(1, '', 'description', $contact),
                        [
                            'class' => $errors->has('anamnesis.allergy.description') ? 'form-control is-invalid' : 'form-control',
                            'id' => 'allergyDisable',
                            'placeholder' => 'Quais Alergias?'
                        ]
                    ) !!}
                    <span class="invalid-feedback">
                        <strong>
                            @if ($errors->has('anamnesis.allergy.description'))
                                {{ $errors->first('anamnesis.allergy.description') }}
                            @else
                                O campo Quais Alergias é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-6 mb-2">
                {!! Form::label(null, 'Algum problema Dermatológico?', null, ['class' => 'control-label']) !!}
                <br />
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[skin][health]',
                        0,
                        true,
                        [
                            'class' => $errors->has('anamnesis.skin.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'skin1',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('skin1', 'Não', [
                        'class' => 'custom-control-label',
                    ]) !!}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[skin][health]',
                        1,
                        (empty($contact)) ? null : $contact->present()->getValueCheck(2, 't', 'health', $contact),
                        [
                            'class' => $errors->has('anamnesis.skin.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'skin2',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('skin2', 'Sim', [
                        'class' => 'custom-control-label pr-5',
                    ]) !!}
                    <span class="invalid-feedback" style="width:initial;">
                        <strong>
                            @if ($errors->has('anamnesis.skin.health'))
                                {{ $errors->first('anamnesis.skin.health') }}
                            @else
                                O campo Problema Dermatológico é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
                <div class="pt-2">
                    {!! Form::text(
                        'anamnesis[skin][description]',
                        (empty($contact)) ? null : $contact->present()->getValueCheck(2, '', 'description', $contact),
                        [
                            'class' => $errors->has('anamnesis.skin.description') ? 'form-control is-invalid' : 'form-control',
                            'id' => 'skinDisable',
                            'placeholder' => 'Quais problemas?'
                        ]
                    ) !!}
                    <span class="invalid-feedback">
                        <strong>
                            @if ($errors->has('anamnesis.skin.description'))
                                {{ $errors->first('anamnesis.skin.description') }}
                            @else
                                O campo Quais Problemas é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 col-lg-6 col-xl-6 mb-2">
                {!! Form::label(null, 'Portador de Hepatites?', null, ['class' => 'control-label']) !!}
                <br />
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[hepatitis][health]',
                        0,
                        true,
                        [
                            'class' => $errors->has('anamnesis.hepatitis.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'hepatitis1',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('hepatitis1', 'Não', [
                        'class' => 'custom-control-label',
                    ]) !!}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[hepatitis][health]',
                        1,
                        (empty($contact)) ? null : $contact->present()->getValueCheck(3, 't', 'health', $contact),
                        [
                            'class' => $errors->has('anamnesis.hepatitis.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'hepatitis2',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('hepatitis2', 'Sim', [
                        'class' => 'custom-control-label pr-5',
                    ]) !!}
                    <span class="invalid-feedback" style="width:initial;">
                        <strong>
                            @if ($errors->has('anamnesis.hepatitis.health'))
                                {{ $errors->first('anamnesis.hepatitis.health') }}
                            @else
                                O campo Portador de Hepatites é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
                <div class="pt-2">
                    {!! Form::text(
                        'anamnesis[hepatitis][description]',
                        (empty($contact)) ? null : $contact->present()->getValueCheck(3, '', 'description', $contact),
                        [
                            'class' => $errors->has('anamnesis.hepatitis.description') ? 'form-control is-invalid' : 'form-control',
                            'id' => 'hepatitisDisable',
                            'placeholder' => 'Quais?'
                        ]
                    ) !!}
                    <span class="invalid-feedback">
                        <strong>
                            @if ($errors->has('anamnesis.hepatitis.description'))
                                {{ $errors->first('anamnesis.hepatitis.description') }}
                            @else
                                O campo Quais é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-6 mb-2">
                {!! Form::label(null, 'Possuí Epilepsia?', null, ['class' => 'control-label']) !!}
                <br />
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[epilepsy][health]',
                        0,
                        true,
                        [
                            'class' => $errors->has('anamnesis.epilepsy.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'epilepsy1',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('epilepsy1', 'Não', [
                        'class' => 'custom-control-label',
                    ]) !!}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[epilepsy][health]',
                        1,
                        (empty($contact)) ? null : $contact->present()->getValueCheck(4, 't', 'health', $contact),
                        [
                            'class' => $errors->has('anamnesis.epilepsy.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'epilepsy2',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('epilepsy2', 'Sim', [
                        'class' => 'custom-control-label pr-5',
                    ]) !!}
                    <span class="invalid-feedback" style="width:initial;">
                        <strong>
                            @if ($errors->has('anamnesis.epilepsy.health'))
                                {{ $errors->first('anamnesis.epilepsy.health') }}
                            @else
                                O campo Possuí Epilepsia é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
                <div class="pt-2">
                    {!! Form::text(
                        'anamnesis[epilepsy][description]',
                        (empty($contact)) ? null : $contact->present()->getValueCheck(4, '', 'description', $contact),
                        [
                            'class' => $errors->has('anamnesis.epilepsy.description') ? 'form-control is-invalid' : 'form-control',
                            'id' => 'epilepsyDisable',
                            'placeholder' => 'Tipos de Crises?'
                        ]
                    ) !!}
                    <span class="invalid-feedback">
                        <strong>
                            @if ($errors->has('anamnesis.epilepsy.description'))
                                {{ $errors->first('anamnesis.epilepsy.description') }}
                            @else
                                O campo Tipos de Crises é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 col-lg-6 col-xl-6 mb-2">
                {!! Form::label(null, 'Possuí alguma DST?', null, ['class' => 'control-label']) !!}
                <br />
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[dst][health]',
                        0,
                        true,
                        [
                            'class' => $errors->has('anamnesis.dst.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'dst1',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('dst1', 'Não', [
                        'class' => 'custom-control-label',
                    ]) !!}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[dst][health]',
                        1,
                        (empty($contact)) ? null : $contact->present()->getValueCheck(5, 't', 'health', $contact),
                        [
                            'class' => $errors->has('anamnesis.dst.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'dst2',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('dst2', 'Sim', [
                        'class' => 'custom-control-label pr-5',
                    ]) !!}
                    <span class="invalid-feedback" style="width:initial;">
                        <strong>
                            @if ($errors->has('anamnesis.dst.health'))
                                {{ $errors->first('anamnesis.dst.health') }}
                            @else
                                O campo Possuí alguma DST é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
                <div class="pt-2">
                    {!! Form::text(
                        'anamnesis[dst][description]',
                        (empty($contact)) ? null : $contact->present()->getValueCheck(5, '', 'description', $contact),
                        [
                            'class' => $errors->has('anamnesis.dst.description') ? 'form-control is-invalid' : 'form-control',
                            'id' => 'dstDisable',
                            'placeholder' => 'Quais?'
                        ]
                    ) !!}
                    <span class="invalid-feedback">
                        <strong>
                            @if ($errors->has('anamnesis.dst.description'))
                                {{ $errors->first('anamnesis.dst.description') }}
                            @else
                                O campo Quais é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-6 mb-2">
                {!! Form::label(null, 'Problema Cardíaco / Circulatório?', null, ['class' => 'control-label']) !!}
                <br />
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[cardiac][health]',
                        0,
                        true,
                        [
                            'class' => $errors->has('anamnesis.cardiac.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'cardiac1',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('cardiac1', 'Não', [
                        'class' => 'custom-control-label',
                    ]) !!}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[cardiac][health]',
                        1,
                        (empty($contact)) ? null : $contact->present()->getValueCheck(6, 't', 'health', $contact),
                        [
                            'class' => $errors->has('anamnesis.cardiac.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'cardiac2',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('cardiac2', 'Sim', [
                        'class' => 'custom-control-label pr-5',
                    ]) !!}
                    <span class="invalid-feedback" style="width:initial;">
                        <strong>
                            @if ($errors->has('anamnesis.cardiac.health'))
                                {{ $errors->first('anamnesis.cardiac.health') }}
                            @else
                                O campo Cardíaco / Circulatório é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
                <div class="pt-2">
                    {!! Form::text(
                        'anamnesis[cardiac][description]',
                        (empty($contact)) ? null : $contact->present()->getValueCheck(6, '', 'description', $contact),
                        [
                            'class' => $errors->has('anamnesis.cardiac.description') ? 'form-control is-invalid' : 'form-control',
                            'id' => 'cardiacDisable',
                            'placeholder' => 'Quais?'
                        ]
                    ) !!}
                    <span class="invalid-feedback">
                        <strong>
                            @if ($errors->has('anamnesis.cardiac.description'))
                                {{ $errors->first('anamnesis.cardiac.description') }}
                            @else
                                O campo Quais é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 col-lg-6 col-xl-6 mb-2">
                {!! Form::label(null, 'Usa algum Medicamento?', null, ['class' => 'control-label']) !!}
                <br />
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[remedy][health]',
                        0,
                        true,
                        [
                            'class' => $errors->has('anamnesis.remedy.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'remedy1',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('remedy1', 'Não', [
                        'class' => 'custom-control-label',
                    ]) !!}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[remedy][health]',
                        1,
                        (empty($contact)) ? null : $contact->present()->getValueCheck(7, 't', 'health', $contact),
                        [
                            'class' => $errors->has('anamnesis.remedy.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'remedy2',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('remedy2', 'Sim', [
                        'class' => 'custom-control-label pr-5',
                    ]) !!}
                    <span class="invalid-feedback" style="width:initial;">
                        <strong>
                            @if ($errors->has('anamnesis.remedy.health'))
                                {{ $errors->first('anamnesis.remedy.health') }}
                            @else
                                O campo Usa algum Medicamento é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
                <div class="pt-2">
                    {!! Form::text(
                        'anamnesis[remedy][description]',
                        (empty($contact)) ? null : $contact->present()->getValueCheck(7, '', 'description', $contact),
                        [
                            'class' => $errors->has('anamnesis.remedy.description') ? 'form-control is-invalid' : 'form-control',
                            'id' => 'remedyDisable',
                            'placeholder' => 'Quais?'
                        ]
                    ) !!}
                    <span class="invalid-feedback">
                        <strong>
                            @if ($errors->has('anamnesis.remedy.description'))
                                {{ $errors->first('anamnesis.remedy.description') }}
                            @else
                                O campo Quais é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-6 mb-2">
                {!! Form::label(null, 'Fez / faz uso de drogas?', null, ['class' => 'control-label']) !!}
                <br />
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[drugs][health]',
                        0,
                        true,
                        [
                            'class' => $errors->has('anamnesis.drugs.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'drugs1',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('drugs1', 'Não', [
                        'class' => 'custom-control-label',
                    ]) !!}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[drugs][health]',
                        1,
                        (empty($contact)) ? null : $contact->present()->getValueCheck(8, 't', 'health', $contact),
                        [
                            'class' => $errors->has('anamnesis.drugs.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'drugs2',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('drugs2', 'Sim', [
                        'class' => 'custom-control-label pr-5',
                    ]) !!}
                    <span class="invalid-feedback" style="width:initial;">
                        <strong>
                            @if ($errors->has('anamnesis.drugs.health'))
                                {{ $errors->first('anamnesis.drugs.health') }}
                            @else
                                O campo Fez / faz uso de drogas é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
                <div class="pt-2">
                    {!! Form::text(
                        'anamnesis[drugs][description]',
                        (empty($contact)) ? null : $contact->present()->getValueCheck(8, '', 'description', $contact),
                        [
                        'class' => $errors->has('anamnesis.drugs.description') ? 'form-control is-invalid' : 'form-control',
                        'id' => 'drugsDisable',
                        'placeholder' => 'Quais?'
                    ]) !!}
                    <span class="invalid-feedback">
                        <strong>
                            @if ($errors->has('anamnesis.drugs.description'))
                                {{ $errors->first('anamnesis.drugs.description') }}
                            @else
                                O campo Quais é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 col-lg-6 col-xl-6 mb-2">
                {!! Form::label(null, 'É Gestante?', null, ['class' => 'control-label']) !!}
                <br />
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[pregnant][health]',
                        0,
                        true,
                        [
                            'class' => $errors->has('anamnesis.pregnant.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'pregnant1',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('pregnant1', 'Não', [
                        'class' => 'custom-control-label',
                    ]) !!}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[pregnant][health]',
                        1,
                        (empty($contact)) ? null : $contact->present()->getValueCheck(9, 't', 'health', $contact),
                        [
                            'class' => $errors->has('anamnesis.pregnant.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'pregnant2',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('pregnant2', 'Sim', [
                        'class' => 'custom-control-label pr-5',
                    ]) !!}
                    <span class="invalid-feedback" style="width:initial;">
                        <strong>
                            @if ($errors->has('anamnesis.pregnant.health'))
                                {{ $errors->first('anamnesis.pregnant.health') }}
                            @else
                                O campo É Gestante é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
                <div>
                    {!! Form::text('anamnesis[pregnant][description]', null, ['hidden']) !!}
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-6 mb-2">
                {!! Form::label(null, 'Se Alimentou / Hidratou bem?', null, ['class' => 'control-label']) !!}
                <br />
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[feed][health]',
                        0,
                        true,
                        [
                            'class' => $errors->has('anamnesis.feed.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'feed1',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('feed1', 'Não', [
                        'class' => 'custom-control-label',
                    ]) !!}
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio(
                        'anamnesis[feed][health]',
                        1,
                        (empty($contact)) ? null : $contact->present()->getValueCheck(10, 't', 'health', $contact),
                        [
                            'class' => $errors->has('anamnesis.feed.health') ? 'custom-control-input is-invalid' : 'custom-control-input',
                            'id' => 'feed2',
                            'required' => ''
                        ]
                    ) !!}
                    {!! Form::label('feed2', 'Sim', [
                        'class' => 'custom-control-label pr-5',
                    ]) !!}
                    <span class="invalid-feedback" style="width:initial;">
                        <strong>
                            @if ($errors->has('anamnesis.feed.health'))
                                {{ $errors->first('anamnesis.feed.health') }}
                            @else
                                O Se Alimentou / Hidratou bem é obrigatório!
                            @endif
                        </strong>
                    </span>
                </div>
                <div>
                    {!! Form::text('anamnesis[feed][description]', null, ['hidden']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card text-dark bg-secondary border-dark shadow-lg mb-3">
    <div class="card-header text-light text-uppercase bg-dark font-weight-bold"><i class="fas fa-clipboard-check"></i> Termo de Responsabilidade</div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-12">
                <div class="custom-control custom-checkbox">
                    {!! Form::checkbox('agree', null, null, [
                        'class' => $errors->has('agree') ? 'custom-control-input is-invalid' : 'custom-control-input',
                        'id' => 'agree',
                        'required' => ''
                    ]) !!}
                    {!! Form::label('agree', 'Declaro que todas as informações acima são verídicas, e estou ciente dos riscos, autorizando o artista a realizar o trabalho.*',[
                        'class' => 'custom-control-label',
                        'id' => 'agree'
                    ]) !!}
                    <span class="invalid-feedback">
                        <strong>
                            @if ($errors->has('agree'))
                                {{ $errors->first('agree') }}
                            @else
                                Aceite o termo de responsabilidade!
                            @endif
                        </strong>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
@include('layouts.scripts.date')
@include('layouts.scripts.mask')
@include('layouts.scripts.cep')
