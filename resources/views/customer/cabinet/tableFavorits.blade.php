@if(!count($messages))

    <div class="card bg-primary text-white text-center p-3">
        <blockquote class="blockquote mb-0">
            <p>Прямо сейчас у вас отсутствуют какие либо объявления</p>
            <footer class="blockquote-footer text-white">
                <button onclick="localStorage.setItem('personalBadegeCustomerId',0);/*reloadPage()*/localStorage.setItem('openAddMessageModal',1);window.location.href='/'">
                    Желаете запостить одно ?
                </button>
            </footer>
        </blockquote>
    </div>
    </div>

    @else
    @foreach($messages as $message)
        <?
        //$category=\App\ProductCategory::where('id',$message->category_id)->first()->parent_id;
        ?>
        <div class="card border mb-0">
            <!-- notice the additions of utility paddings and display properties on .card-header -->
            <div class="card-header @if($message->active) bg-success-500 @else bg-trans-gradient @endif d-flex pr-2 align-items-center flex-wrap">
                <!-- we wrap header title inside a span tag with utility padding -->

                <div class="card-title col-md-3">@if($message->active) Live @else <span style="color:white">On moderate</span> @endif</div>
                <div class="col-md-6 " style="color:white">{{$message->title}}</div>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                <img src="/storage/pictures/{{$message->pictures->photo}}" class="card-img-top" alt="..."></div>
                <p class="card-text">{{$message->message}}</p>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-2">
                        <b>AdID:</b> {{$message->id}}
                    </div>
                    <div class="col-md-3">
                        <b>Last posted:</b> {{$message->updated_at}}
                    </div>
                    <div class="col-md-1">
                        <b>Views:</b> 0
                    </div>
                    <div class="col-md-2">
                        <b>Appeared in search:</b> 0
                    </div>
                    <div class="col-md-2">
                        <b>Some Item:</b> 0
                    </div>
                    <div class="col-md-2">

                        <a href="javascript:void(0);" onclick="deleteFromFavorites('{{$message->id}}');" class="btn btn-info">Удалить из избранного</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
@endif

<script>

    function deleteFromFavorites(message_id){

        $.ajax({
            method: 'POST',
            dataType: 'html',
            async:false,
            url: '/cabinet/deleteFromFavorites',
            data: {id:message_id,active:0
            },
            beforeSend: function() {
            },
            complete: function() {
                reloadFavorits();
            },
            success: function (data) {

            }
        });



    }


</script>





