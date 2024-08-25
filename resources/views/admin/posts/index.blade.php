@extends('admin.app')

@section('content')
    <div>
        <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary my-3"><i class="fa fa-pencil"></i> New Post</a>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <svg class="svg-inline--fa fa-table me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="table"
                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor"
                    d="M64 256V160H224v96H64zm0 64H224v96H64V320zm224 96V320H448v96H288zM448 256H288V160H448v96zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z">
                </path>
            </svg><!-- <i class="fas fa-table me-1"></i> Font Awesome fontawesome.com -->
            Posts Data

        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table datatable-table">
                <thead>
                    <tr>
                        <th><a href="#">#</a></th>
                        <th><a href="#">Date</a></th>
                        <th><a href="#">Title</a></th>
                        <th><a href="#">Slug</a></th>
                        <th><a href="#">Excerp</a></th>
                        <th><a href="#">Action</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $post)
                        <tr data-index="0">
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>{{ Str::substr($post->body, 0, 100) }}</td>
                            <td>
                                @can('post.update', $post)
                                    <a href="{{ route('posts.edit', ['post' => $post->slug]) }}"><i
                                            class="fa fa-edit text-primary"></i></a>
                                @endcan
                                @can('admin')
                                    <form id="deleteData" method="POST"
                                        action="{{ route('posts.destroy', ['post' => $post->slug]) }} ">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link p-0 m-0">
                                            <i class="fa fa-trash text-danger"></i>
                                        </button>

                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $data->links() }}
        </div>
    </div>
@endsection
