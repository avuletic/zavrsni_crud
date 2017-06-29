<div class="form-group {{ $errors->has('question_id') ? 'has-error' : ''}}">
    {!! Form::label('question_id', 'Question Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('question_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('question_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('answer_id') ? 'has-error' : ''}}">
    {!! Form::label('answer_id', 'Answer Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('answer_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('answer_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('response') ? 'has-error' : ''}}">
    {!! Form::label('response', 'Response', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('response', null, ['class' => 'form-control']) !!}
        {!! $errors->first('response', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
