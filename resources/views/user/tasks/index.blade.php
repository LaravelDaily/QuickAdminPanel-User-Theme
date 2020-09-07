@extends('layouts.user')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @can('task_create')
                    <div style="margin-bottom: 10px;" class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-success" href="{{ route('user.tasks.create') }}">
                                {{ trans('global.add') }} {{ trans('cruds.task.title_singular') }}
                            </a>
                        </div>
                    </div>
                @endcan
                <div class="card">
                    <div class="card-header">
                        {{ trans('cruds.task.title_singular') }} {{ trans('global.list') }}
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-Task">
                                <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.task.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.task.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.task.fields.description') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $key => $task)
                                    <tr data-entry-id="{{ $task->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $task->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $task->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $task->description ?? '' }}
                                        </td>
                                        <td>
                                            @can('task_show')
                                                <a class="btn btn-xs btn-primary"
                                                   href="{{ route('user.tasks.show', $task->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('task_edit')
                                                <a class="btn btn-xs btn-info"
                                                   href="{{ route('user.tasks.edit', $task->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('task_delete')
                                                <form action="{{ route('user.tasks.destroy', $task->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                      style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger"
                                                           value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
