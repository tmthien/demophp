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
                           <a class="btn btn-info float-end" href="{{route('category.index')}}">Danh sách danh mục</a> 
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="row" style="margin-bottom:8px">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Tên danh mục</strong>
                                <input required type="text" name="title" class="form-control" placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <strong>Mô tả danh mục</strong>
                                <textarea name="description" class="form-control" aria-label="With textarea"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Kích Hoạt</label>
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
                    </div>
                    <button type="submit" class="btn btn-success">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
@endsection