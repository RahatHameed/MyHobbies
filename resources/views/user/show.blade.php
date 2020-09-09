@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div style="font-size: 150%;" >{{$user->name}}</div>

                    <div class="card-body">
                        <b>My Motto:<br>{{$user->motto}}</b>
                        <p class="mt-2"><b>About me:</b><br>{{$user->about_me}}</p>

                        @if($user->hobbies->count() > 0)
                                <h5>Hobbies of {{$user->name}} ({{$user->hobbies->count()}})</h5>

                            <ul class="list-group my-2">
                                @foreach($user->hobbies as $hobby)
                                    <li class="list-group-item">
                                        <a title="Show Details" href="/hobby/{{ $hobby->id }}">{{ $hobby->name }}</a>
                                        <span class="float-right mx-2">{{ $hobby->created_at->diffForHumans() }}</span>
                                        <br>
                                        @foreach($hobby->tags as $tag)
                                            <a href="{{route('FilterHobbiesByTagID', ['tag_id' => $tag->id])}}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                                        @endforeach
                                    </li>
                                @endforeach
                            </ul>

                        @else
                        <p>{{$user->name}} has not created any hobbies yet.</p>
                        @endif

                    </div>
                </div>

                <div class="mt-4">
                    <a class="btn btn-primary btn-sm" href="{{ URL::previous() }}"><i class="fas fa-arrow-circle-up"></i> Back to Overview</a>
                </div>
            </div>
        </div>
    </div>
@endsection