<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', __('Name'), ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:'.__('message').'</p>') !!}
</div>
<div class="form-group{{ $errors->has('link') ? 'has-error' : ''}}">
    {!! Form::label('link', __('Link'), ['class' => 'control-label']) !!}
    {!! Form::text('link', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('link', '<p class="help-block">:'.__('message').'</p>') !!}
</div>
<div class="form-group{{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', __('Description'), ['class' => 'control-label']) !!}
    {!! Form::text('description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('description', '<p class="help-block">:'.__('message').'</p>') !!}
</div>
<div class="form-group{{ $errors->has('url_image') ? 'has-error' : ''}}">
    {!! Form::label('url_image', __('Image'), ['class' => 'control-label']) !!}
    {!! Form::file('url_image', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('url_image', '<p class="help-block">:'.__('message').'</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? __('Update') : __('Create'), ['class' => 'btn btn-primary']) !!}
</div>
