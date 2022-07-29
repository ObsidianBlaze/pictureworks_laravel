@section('content')

    <link rel="stylesheet" href="{{asset('res/css/form.css')}}"/>

    <div class="container">

        @if(session('errorMsg'))
            <div class="alert alert-error" role="alert">

                {{session('errorMsg')}}

            </div>
        @endif

    @foreach($data as $user)

        <form action="{{route('append_comment',$user->id)}}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}



            <div class="input-box">
                <label for="comment" style="color: #00e4ff">Comment<sup class="ast-important">*</sup></label>
{{--                <input type="text" name="comment" id="comment" value="{{old('comment') }}">--}}
                <textarea name="comment" class="feedback-input" value="{{old('comment')}}" placeholder="Comment"></textarea>

                {{--Catching any error if comment Name is missing.--}}
                @if($errors->has('comment'))
                    <div class="errors" style="color: #b85151; font-size: small">{{ $errors->first('comment') }}</div>
                @endif
            </div>

            <div class="input-box">
                <label for="password" style="color: #00e4ff">Password<sup class="ast-important">*</sup></label>
                <input type="password" name="password" id="password" class="feedback-input" placeholder="password">
                {{--Catching any error if password is missing.--}}
                @if($errors->has('password'))
                    <div class="errors" style="color: #b85151; font-size: small; padding-bottom: 50px;">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <button type="submit">Append Comment</button>


        </form>

        @endforeach

    </div>
