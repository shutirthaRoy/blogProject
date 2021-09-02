@extends('layouts.master')
    @section('navbar')
    

    <div class="w3-row" style="text-align:center;">
        <div class="w3-col m2 w3-center"><p></p></div> 
            <div class="w3-col m8 s12">
                <!-- Blog entry -->
                <div class="w3-margin w3-white">
                <img src="{{ asset('images/'.$single_post->image) }}" alt="" style="width:90%">
                <div class="w3-container">
                    <h3><b><a class="display-5" href="#">{{ $single_post->title }}</a></b></h3>
                    <h5>Created {{ $single_post->created_at->diffForHumans() }} <span class="w3-opacity">Updated {{ $single_post->updated_at->diffForHumans() }}</span></h5>
                </div>
            
                <div class="w3-container">
                    <p>{{ $single_post->content }}</p>
                </div>
            </div>   
       </div>
    </div>

    <div class="row">
        <div class="w3-col s12">
            <form  method="POST" action="{{ url('/comments/create/'.$single_post->id) }}" class="w3-container " style="text-align: center; margin: 0 auto;">
                @csrf
                <h2 class="w3-center">Please post your comments here</h2>
                
                <p><input class="w3-input w3-hover-white" name="username" type="text" placeholder="Enter Your Name"></p>
                <p></p><textarea class="w3-input w3-hover-white" name="comment" id="" cols="30" rows="5" placeholder="Write Comments"></textarea></p>
                <button type="submit" class="w3-btn w3-padding-large w3-black">Submit</button>
            </form>
        </div>
        
    </div>
    
    

    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">COMMENTS</h1>

    
    @forelse ($single_post->comments as $single_comment)
        <div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="menu">
            <div class="w3-content">
                <div id="Pizza" class="w3-container menu w3-padding-32 w3-white">
                    <h1><b>{{ $single_comment->username }}</b> <span class="w3-right w3-tag w3-dark-grey w3-round"></span></h1>
                    <p class="w3-text-grey" style="word-wrap: break-word;">{{ $single_comment->comment }}</p>
                </div>
            </div>
        </div>
    @empty
            <p>No models count</p>
    @endforelse
    
      

    @endsection