@extends('layouts.master')
    @section('navbar')
    
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <form method="GET" action="{{ route('Search') }}" >
                        @csrf
                        
                        <input type="text" name="title">
                        <input type="submit" value="Search">
                    </form>


                    <h1 class="text-center display-4">All Posts</h1>
                    
                    @foreach ($all_posts as $post)

                        <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
                            <div class="container position-relative px-4 px-lg-5">
                                <div class="row gx-4 gx-lg-5 justify-content-center">
                                    <div class="col-md-10 col-lg-8 col-xl-7">
                                        <div class="post-heading d-flex">
                                            <p class="d-inline m-3 h-3">{{ $loop->iteration }}</p>
                                            <p class="display-5">{{ $post->title }}</p>
                                        </div>
                                        <img src="{{ asset('images/'.$post->image) }}" alt="" class="ms-5 ps-5" width="300px">
                                    </div>
                                </div>
                            </div>
                        </header>

                        <article class="mb-4">
                            <div class="container px-4 px-lg-5">
                                <div class="row gx-4 gx-lg-5 justify-content-center">
                                    <div class="col-md-10 col-lg-8 col-xl-7 ms-5 ps-5">
                                        <p>{{ $post->content }}</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <br><br>
                        

                        <div class="row">
                            <div class="col-2">
                                
                            </div>
                            
                            
                            <div class="col-10">
                                <form method="POST" action="{{ url('/comments/create/'.$post->id) }}">
                                    @csrf
                                    <h1 style="display-5">Please post your comments here</h1>
                                    <div class="input-group mb-3" style="width:350px;">
                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="username">
                                    </div>

                                    <div class="form-floating">
                                        <textarea class="form-control " placeholder="Leave a comment here" id="floatingTextarea2" style="height: 80px; width: 600px;" name="comment"></textarea>
                                        <label for="floatingTextarea2">Comments</label>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            
                           
                            
                        </div>

                          <br><br>
                          @endforeach

                          <div class="row">
                              <div class="col-2"></div>
                              <div class="col-10">
                                <h1>Posted Comments</h1>
                              </div>
                          </div>
                          
                         @forelse ($post->comments as $single_comment)
                            
                            

                            <div class="row">
                                <div class="col-2">
                                    
                                </div>
                                
                                
                                <div class="col-10">
                                        
                                        <div class="input-group mb-3" style="width:350px;">
                                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="username" value="{{ $single_comment->username }}" disabled>
                                        </div>
                                      
                                        <div class="form-floating">
                                            <textarea class="form-control " placeholder="Leave a comment here" id="floatingTextarea2" style="height: 80px; width: 600px;" name="comment" disabled>{{ $single_comment->comment }}</textarea>
                                            <label for="floatingTextarea2">Comments</label>
                                        </div>
                                        <br> <br>
                                </div>
                          @empty
                              <p>No models count</p>
                          @endforelse


                    
                        {{ $all_posts->links() }}
                    
                </div>
            </div>
        </div>
        

        
        

@endsection

