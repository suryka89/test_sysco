
<div class="form-group{{ $errors->has('user') ? 'has-error' : ''}}">
    {!! Form::label('user', __('Name'), ['class' => 'control-label']) !!}
    {!! Form::text('user', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required','placeholder' => __('Name')] : ['class' => 'form-control','placeholder' => __('Name')]) !!}
    {!! $errors->first('user', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('json_producs') ? 'has-error' : ''}}">
    {!! Form::label('json_producs', __('Products'), ['class' => 'control-label']) !!}
    <span id="btnGetProd" onclick="getProducts()" class="form-control btn btn-info">
        {{__('Select products')}}
    </span>
    <textarea id="json_producs" name="json_producs" style="display:none" value="{{isset($menu)?$menu->json_producs:''}}">{{isset($menu)?$menu->json_producs:''}}</textarea>
    {!! $errors->first('json_producs', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? __('Update') : __('Create'), ['class' => 'btn btn-primary validatedir']) !!}
</div>
