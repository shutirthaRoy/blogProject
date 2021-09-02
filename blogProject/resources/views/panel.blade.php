@extends('layouts.master')
    @section('navbar')
    <div class="w3-container w3-display-middle	">
        

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">    
                          
                @if (Auth::user()->name=="Admin")
                    <h1>Panel</h1>  
                    <a href="{{ route('postsCreate') }}" class="btn btn-danger display-5">Create Posts</a>
                    <a href="{{ route('postsPreEdit') }}" class="btn btn-danger display-5">Click to Edit or Delete Posts</a>
                    <a href="{{ route('allComments') }}" class="btn btn-danger display-5">Click to Delete Comments</a>
                @else
                    <h1>Panel</h1>  
                    <h1>Check out all posts or Post Contents</h1>
                    <a href="{{ route('postsCreate') }}" class="btn btn-danger display-5">Create Posts</a>
                @endif

            </div>
        </div>
    </div>

    @endsection
