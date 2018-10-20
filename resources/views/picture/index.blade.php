@extends('layouts.app')

@section('title', 'Pictures')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">{{ $result->total() }} {{ str_plural('Picture', $result->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_pictures')
                <a href="{{ route('pictures.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a>
            @endcan
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-striped table-hover" id="data-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Picture</th>
                <th>Tags</th>
                <th>Created At</th>
                @can('edit_pictures', 'delete_pictures')
                    <th class="text-center">Actions</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($result as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->image }}</td>
                    <td>{{ $item->tags }}</td>
                    <td>{{ $item->created_at->toFormattedDateString() }}</td>
                    @can('edit_pictures', 'delete_pictures')
                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'pictures',
                            'id' => $item->id
                        ])
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $result->links() }}
        </div>
    </div>

@endsection