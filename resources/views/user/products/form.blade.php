<style>
.navbar .navbar-mini .fixed-top 
{
    position: inherit!important;
    left: -10px!important;
    background: none!important;
    font-weight: 400;
    transition: background 0.25s ease;
    -webkit-transition: background 0.25s ease;
    -moz-transition: background 0.25s ease;
    -ms-transition: background 0.25s ease;
    background-size: cover;
    width: auto;
}
</style>
<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', __('Name'), ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', __('Description'), ['class' => 'control-label']) !!}
    {!! Form::text('description', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('price', __('Price'), ['class' => 'control-label']) !!}
    {!! Form::number('price', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('image') ? 'has-error' : ''}}">
    {!! Form::label('image', __('Image'), ['class' => 'control-label']) !!}
    <input style="display:none" type="text" value="" id="blob_file" name="blob_file" />
    <div class="col-sm-6 files_list" id="files2">
    <div class="files row">
    <span  id="fileEditor" class="pull-left btn btn-default btn-info">{{__('Select image')}}
    </span>
    </div>
    <div class="row" id="previewImg" >
        @if(isset($product))
        <div style="float:left;border:4px solid #303641;padding:5px;margin:5px;"><img height="80" src="{{ $product['image'] }}" />
        @endif
    </div>
    </div> 
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? __('Update') : __('Create'), ['class' => 'btn btn-primary']) !!}
</div>

