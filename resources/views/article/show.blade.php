@extends('layouts.app')

@section('content')

    <div class="container">
        <br/>
        <div class="col-md-12">
            <a class="btn btn-primary btn-lg" href="{{route('article.edit', $article->id)}}" role="button">Update
                article</a>
        </div>
        <div class="col-md-12">
            <h2>{{$article->name}}</h2>
            @foreach($article->categories as $category)
                <small><a href="{{route('categories.show', $category->id)}}">{{$category->name }}</a></small>
            @endforeach
            <br/>
            <small><b>{{$article->user->name }}</b></small>
            <br/>
            <h7>{{$article->created_at->format('d-m-Y')}}</h7>
            <p>{{  $article->content }}</p>


        </div>


        <hr>

        <div class="col-md-12">
            <form method="POST" action="javascript:send();">
                {!! csrf_field() !!}
                <input name="author" id="author" placeholder="Author" class="form-control"><br/>
                <textarea name="content" id="content" placeholder="Content" class="form-control"></textarea><br/>
                <input hidden name="article_id" id="article_id" value="{{$article->id}}">
                <button class="btn btn-primary" id="add_comment">Add Comment</button>
            </form>

            <script>
                $(function () {
                    $('#add_comment').click(function () {
                        var author = $("#author").val();
                        var content = $("#content").val();
                        var article_id = "{{$article->id}}";
                        var token = "{{csrf_token()}}";
                        var date = new Date();

                        $.ajax({
                            type: "POST",
                            url: "{{route('commentary.store')}}",
                            data: {
                                "author": author,
                                "content": content,
                                "article_id": article_id,
                                "_token": token
                            },
                            success: function (data) {
                                $("#commentaries").append(' <h3>' + author + '</h3>\n' +
                                    '                    <small><b>' + date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear() + '</b></small>\n' +
                                    '                    <p>' + content + '</p>');
                                $("#author").val('');
                                $("#content").val('');
                            }
                        });

                    });
                });
            </script>
        </div>
        <div class="clearfix"></div>

        <div class="col-md-12">
            <div id="commentaries">
                @foreach($commentaries as $commentary)
                    <h3>{{$commentary->author}}</h3>
                    <small><b>{{$commentary->created_at->format('d-m-Y') }}</b></small>
                    <p>{{  $commentary->content }}</p>
                @endforeach
            </div>
        </div>
        <div class="clearfix"></div>

    </div> <!-- /container -->


@endsection