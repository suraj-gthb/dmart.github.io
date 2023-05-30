@extends('header')

@section('content')
@php $page_title = "View Category"; $count=1; @endphp

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Category</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Category Status</th>
                                <th>Created at</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>@if($category->category_status==1) <div class="badge badge-success">Active</div> @else <div class="badge badge-danger">Inactive</div> @endif </td>
                                <td>{{$category->created_at}}</td>
                                <td>
                                    <form action="{{route('add-category.destroy', $category->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('view-category.edit', $category->id)}}">
                                        <input type="submit" value="Edit" class="btn btn-sm btn-warning">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection