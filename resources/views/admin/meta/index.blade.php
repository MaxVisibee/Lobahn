@extends('admin.layouts.master')
@section('content')
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">CMS</a></li>
        <li class="breadcrumb-item active">Meta</li>
    </ol>
    <h4 class="bold content-header"> Meta Management<small> </small></h4>
    <div id="footer" class="footer" style="margin-left: 0px"></div>
    <div class="row m-b-10">
        <div class="col-lg-12">
            <div>
                <a class="btn btn-primary" href="{{ route('meta.create') }}"><i class="fa fa-plus"></i> Create
                    Meta Data</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse">
                <div class="panel-body">
                    <table id="data-table-responsive" class="table table-striped table-bordered table-td-valign-middle">
                        <thead>
                            <tr>
                                <th width="1%">No.</th>
                                <th class="text-nowrap">Page Name</th>
                                <th class="text-nowrap">Page URL</th>
                                <th class="text-nowrap">Meta Title</th>
                                <th class="text-nowrap">Meta Description</th>
                                <th class="text-nowrap" width="13%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $meta)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $meta->page_name ?? '-' }}</td>
                                    <td>{{ $meta->page_url ?? '-' }}</td>
                                    <td>{{ $meta->title ?? '-' }}</td>
                                    <td>{{ $meta->description ?? '-' }}</td>
                                    <td>
                                        <a class="btn btn-success btn-icon btn-circle"
                                            href="{{ route('meta.show', $meta->id) }}"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-warning btn-icon btn-circle"
                                            href="{{ route('meta.edit', $meta->id) }}"> <i class="fa fa-edit"></i></a>
                                        <form action="{{ route('meta.destroy', $meta->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure to Delete?');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-danger btn-icon btn-circle"
                                                data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class='fas fa-times'></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
            class="fa fa-angle-up"></i></a>
    </div>
@endsection
