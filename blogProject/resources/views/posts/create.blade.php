@extends('layouts.master')

    @section('navbar')

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Create Posts</h1>
                    <form method="POST" action="{{ route('postsStore') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="title" class="form-label">Title</label>
                          <input type="text" class="form-control" id="title" name="title">                        
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Content</label>
                            <textarea class="form-control mb-3" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>                    
                            <input class="form-control" type="file" name="image">
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
        

@endsection