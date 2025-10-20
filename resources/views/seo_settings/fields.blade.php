<!-- Page Field -->
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('page', 'Page:',['class'=>'control-label']) !!}
        {!! Form::text('page', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    </div>
</div>


<!-- Title Field -->
<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('title', 'Title:',['class'=>'control-label']) !!}
        {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    </div>
</div>


<!-- Meta Description Field -->
<div class="col-md-12">
    <div class="form-group ">
        {!! Form::label('meta_description', 'Meta Description:',['class'=>'control-label']) !!}
        {!! Form::textarea('meta_description', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Meta Keywords Field -->
<div class="col-md-12">
    <div class="form-group ">
        {!! Form::label('meta_keywords', 'Meta Keywords:',['class'=>'control-label']) !!}
        {!! Form::textarea('meta_keywords', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12" style="text-align-last: right;">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('seoSettings.index') }}" class="btn btn-danger">Cancel</a>
</div>
