<h1>ALL POST</h1><br>
{{ Session::get('pesan') }}
<br>
@foreach($blogs as $blog)
    <a href="/blog/{{$blog->slug}}">
        <p> {{ $blog->title}} </p>
    </a>
    <p> {{ $blog->subject}} </p>
    {{ date('F d, Y', strtotime($blog->created_at))}}
    <br><br>
    <a href="/blog/{{$blog->id}}/edit"> EDIT</a>
    <form action="/blog/{{$blog->id}}" method="post">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <input type="hidden" value="delete" name="_method">
        <input type="submit" value="delete">
    </form>
    <hr>
@endforeach


{!! $blogs->links() !!}