@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Manage') }}</div>

                <div class="card-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th class="td_checkbox">
                                    #
                                </th>

                                <th>
                                    Post Title
                                </th>
                                <th>
                                    Body
                                </th>  
                                         
                                <th>
                                    Added On
                                </th>
                                
                                <th data-hide="phone">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <!-- to be looped for getting all categories -->
                            @if( $posts->count() >= 1 )
                            
                                @foreach ( $posts as $post )

                                    <tr class="table_row">
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $post->postTitle }}
                                        </td>

                                        <td>
                                            {{ $post->post }}
                                        </td>  
                                        
                                        <td>
                                            {{$post->created_at->diffForHumans()}}
                                        </td>  
                                        
                                        <td>
                                            <a href="{{ route('edit-post', $post->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('delete-post', $post->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure??');"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
