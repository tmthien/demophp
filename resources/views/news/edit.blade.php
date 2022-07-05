@extends('layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thêm mới danh mục</h3>
                    </div>
                    <div class="col-md-6">
                           <a class="btn btn-info float-end" href="{{route('news.index')}}">Danh sách danh mục</a> 
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row" style="margin-bottom:8px">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Tên danh mục</strong>
                                <input required type="text" value="{{ $news->title }}" name="title" class="form-control" placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <strong>Danh mục</strong>
                                <select class="form-control" name="category_id">
                                    @foreach($category as $item)
                                        <option value="{{ $item->id }}" {{ $news->category_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Nội dung</strong>
                                <textarea name="content" class="form-control" aria-label="With textarea">{{ $news->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <strong>Mô tả</strong>
                                <textarea name="description" class="form-control" aria-label="With textarea">{{ $news->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <strong>Kích Hoạt</strong>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="1" type="radio" id="active" name="active">
                                    <label for="active" class="custom-control-label">Có</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                                    <label for="no_active" class="custom-control-label">Không</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Hình ảnh</strong>
                                <input type="file" name="file_upload" class="form-control" placeholder="Nhập tên danh mục">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
@endsection