@extends('new.layouts.app')




@section('content')
    <div style="width:100% !important"> @include('layouts.slider_portfolio')</div>



    <div class="" style="width:70%">
        <div class="container">

            <?$i=0;$m=1;?>
        @foreach($rubrics as $rubric)
            <? $childs=\App\Domain\Customer\Models\ProductCategory::where('parent_id',$rubric->id)->get();
            $childs_count=count($childs);
            ?>
            @if($rubric->parent_id==0)
                <?
                $messages=[];
                $messagesCount=0;
                foreach($childs as $ch){
                    $messages[$ch->id]=count(\App\Domain\Customer\Models\Message::where('category_id',$ch->id)->get());
                    $messagesCount=$messagesCount+$messages[$ch->id];
                }
                ?>
                    @if($i==0 || $i%3==0)
                        <?
                        if($m>3){
                            $m=1;
                        }

                        ?>
                        <div class="row">
                        @endif
                    <div class="col-lg-4">
                        <div class="card-box-hover-rise card-box-hover card card-box-alt card-border-top border-success mb-5 pb-4" style="min-height:336px">

                            <div class="d-60 rounded-circle" style="position:absolute;top:10px;left:10px;background-image:url('{{$rubric->photo}}'); background-size: cover;">
                                <span ></span>
                            </div>

                            <h3 class="font-size-lg font-weight-bold mt-5 mb-4">{{$rubric->name}}</h3>
                            <?$a=0;?>

                                @foreach($childs as $child)


@if($a<7)
                                                    <a href="/category/{{$child->id}}" class="mt-1 d-block fs-sm fw-400 text-dark" style="">
                                                        <i class="fas {{$child->icon}} text-muted mr-2"></i> {{$child->name}} ({{$messages[$child->id]}})</a>

@endif


                                        <?$a++;?>
                                @endforeach

                            <a href="#" class="btn btn-link btn-link-first mb-2 p-0" title="Find out more">
                                <span>Find out more</span>
                            </a>
                        </div>
                    </div>
                            @if(($i+1)%3==0 && $m==3)
                                123
                    </div>
                @endif
            @endif
                <?$i++;$m++;?>
        @endforeach
    </div></div>



@endsection