<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Comment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="feed-blog">
                    @foreach ($comment as $item)
                    <li>
                        <div class="feed-user-img">
                            <img src="{{asset('files/assets/images/avatar-4.jpg')}}" class="img-radius " alt="User-Profile-Image">
                        </div>
                        
                        <h6>{{$item->author_name($item->comment_author)}} <small class="text-muted">{{$item->diffForHumans($item->created_at)}}</small></h6>
                        <p class="m-b-15 m-t-15">{{$item->comment_text}}</p>
                        <div class="row m-l-5">
                            @for ($i = 0; $i < 5; $i++)
                                <a href="#!"><i class="fa fa-star f-18 {{$item->comment_rating <= $i ? 'text-default' : 'text-c-blue'}}"></i></a>
                            @endfor
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>