@extends('layouts.user')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ trans('global.create') }} {{ trans('cruds.task.title_singular') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route("user.tasks.store") }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">{{ trans('cruds.task.fields.name') }}</label>
                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                       name="name" id="name" value="{{ old('name', '') }}">
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.task.fields.name_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="description">{{ trans('cruds.task.fields.description') }}</label>
                                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                       type="text" name="description" id="description"
                                       value="{{ old('description', '') }}">
                                @if($errors->has('description'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.task.fields.description_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger" type="submit">
                                    {{ trans('global.save') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
