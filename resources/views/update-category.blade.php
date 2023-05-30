@extends('header')

@section('content')
@php $page_title = "Update Category"; @endphp

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('view-category.update',$category->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            @if(session('status'))
                            <div class="alert alert-info">{{session('status')}}</div>
                            @endif
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control" name="category-name_txt" value="{{$category->category_name}}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection