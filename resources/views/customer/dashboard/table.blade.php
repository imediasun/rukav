<div id="vertical-timeline" class="vertical-container light-timeline no-margins">

@if($messages)
    @foreach($messages as $message)
    <div class="vertical-timeline-block">
        <div class="vertical-timeline-icon navy-bg" style="width:100px;height:100px;background-image: url('/storage/badges/{{$message['badge']['photo']}}') !important;background-position: center;background: 100% 100% no-repeat;background-size: cover;">
            <i class="fa fa-briefcase"></i>
        </div>

        <div class="vertical-timeline-content" style="@if($last[0]->id==$message['id']) background-color: #0f619f;color:#fff @endif">
            @if($last[0]->id==$message['id'])
            <h2>Получен новый бейдж</h2>
            @endif

            <p>От {{$message['get_sender']['name']}}
            </p>

                <p> {{$message['title']}}
                </p>
            <span class="vertical-date">
             <br>
             <small>{{$message['created_at']}}</small>
             </span>
        </div>
    </div>
@endforeach
@endif
</div>

