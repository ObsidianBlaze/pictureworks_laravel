<section id="main">
    <header>
        @foreach($data as $user)
        <span class="avatar"><img src="{{asset('res/images/users/').'/'.$user->id. '.jpg'}}" alt="user image"/></span>

        <h1>{{$user->name}}</h1>
        <p>{{$user->comment}}</p>
        @endforeach
    </header>
</section>
