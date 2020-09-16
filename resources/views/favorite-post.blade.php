@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('favorite Posts') }}</div>

                <div class="card-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th class="td_checkbox">
                                    #
                                </th>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Post Title
                                </th>
                                <th>
                                    Body
                                </th>  
                                 
                                <th>
                                    Favorite
                                </th>    
                                <th>
                                    Added On
                                </th>
                                <th>
                                    Completed?
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
                                            <img src="images/{{$post->postImage}}" height="50" width="50">
                                        </td>
                                        <td>
                                            {{ $post->postTitle }}
                                        </td>

                                        <td>
                                            {{ $post->post }}
                                        </td>  
                                        
                                        <td>
                                            <!-- fav star -->
                                            @if($post->status == 'FAVORITE')
                                                <i class="fa fa-star"></i>
                                            @else
                                                <i></i>
                                            @endif
                                        </td>
                                        <td>
                                            {{$post->created_at->diffForHumans()}}
                                        </td>  
                                        <td>
                                            <!-- complete or  not -->
                                            @if($post->sts == 'COMPLETE')
                                                <i class="fa fa-check"></i>
                                            @else
                                                <i class="fa fa-times"></i>
                                            @endif
                                        </td>
                                        <td>
                                            

                                            
                                            @if($post->status == 'FAVORITE')
                                            <a href="{{ route('unfav-post', $post->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('You want to unFavorite??');"><i class="fa fa-times"></i>
                                            </a>
                                            @else
                                            <a href="{{ route('fav-post', $post->id) }}" class="btn btn-warning btn-sm" onclick="return confirm('Is this Your Favorite??');"><i class="fa fa-star"></i>
                                            </a>
                                            @endif

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
