@extends('layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>{{ $title }}</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('news.create')}}" class="btn btn-success float-end">Thêm mới</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('thongbao'))
                    <div class="alert alert-success">
                        {{Session::get('thongbao')}}
                    </div>
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Thumbnail</th>
                            <th>Content</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Active</th>
                            <th>Updated</th>
                            <th style="width:90px;">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->thumbnail }}</td>
                                <td>{{ $item->content }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ optional($item->category)->title }}</td>
                                <td>{!! \App\Helpers\Helper::active($item->active) !!}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td style="display:flex;">
                                    <a style="margin: 0 4px;" class="btn btn-info btn-sm" href="{{ route('news.edit', $item->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('news.destroy', $item->id) }}" onclick="return confirm('Bạn có thực sự muốn xoá?');">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $news->links() }}
            </div>
        </div>
    </div>
@endsection