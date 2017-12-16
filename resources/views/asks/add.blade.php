@extends('layouts.app') 
@section('content') 
    <form action="{{ url('/asks/myasks/add') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="form-group">
                <label for="title">Title
                    <span class="text-danger font-weight-bold">*</span>
                </label>
                <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title"
                    value="" placeholder="" required /> @if($errors->has('title'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('title') }}</strong>
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="category_id">Category
                    <span class="text-danger font-weight-bold">*</span>
                </label>
                <select class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" id="category_id" name="category_id"
                    required>
                    <option value="">--Select category--</option>
                    @foreach($categories as $value)
                    <option value="{{ $value->id }}">{{ $value->name_category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('category_id') }}</strong>
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="content">Content ask
                    <span class="text-danger font-weight-bold">*</span>
                </label>
                <textarea class="ckeditor form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" id="content" name="content"
                    placeholder="" required></textarea>
                @if($errors->has('content'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('content') }}</strong>
                </div>
                @endif
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Ask</button>
        </div>
    </form>

    @if($errors->has('title')) $('#myModal').modal('show');@endif 
    @if($errors->has('content')) $('#myModal').modal('show'); @endif
@endsection