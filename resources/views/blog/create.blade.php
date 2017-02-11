@if(count($errors)>0)
    <ul>
        @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
        @endforeach
    </ul>
@endif
<h1>create blog post</h1>

<form action="/blog" method="post">
    <input type="text" name="title" placeholder="judul"> <br>
    <textarea name="subject" cols="30" rows="10" placeholder="subject"></textarea>
    <input type="submit" value="post">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
</form>