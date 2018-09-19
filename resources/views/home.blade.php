@extends('layouts.app')

@section('content')
<div class="container-fluid" style="position: relative;">
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Search for tweets</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div class="wrapper wrapper-content animated fadeInRight">
   
    <div class="row" id="row-main">
        <div class="col-md-8 social-feed-list">
            <div class="social-feed-box">             
                <div class="social-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabs-container">
                               
                                <div class="tab-content">
                                    <div id="tab-3" class="tab-pane active">
                                        <div class="panel-body">
                                            
                                            <textarea class="form-control description" style="width:100%;" placeholder="What's on your mind?" rows="3"></textarea>
                                            <br />
                                            <div class="btn-group pull-right">
                                                <button onClick="load_news_feeds($('.description').val(),'You search for');" class="btn btn-white btn-sm search"><i class="fa fa-file"></i> Search</button>
                                                <button onClick="load_random();" class="btn btn-white btn-sm search"><i class="fa fa-file"></i> I’m feeling lucky</button>
                                                <button onClick="postTweets($('.description').val());" class="btn btn-white btn-sm search"><i class="fa fa-file"></i> Post Tweet</button>
 
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-5" class="tab-pane">
                                        <div class="panel-body">
                                            <textarea class="form-control" style="width:100%;" placeholder="Ask something..." rows="2"></textarea>
                                            <br />
                                            <div class="input-group m-b"><span class="input-group-addon"> <input type="checkbox"> </span> <input class="form-control" type="text"></div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="post-list"></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
           
        </div>

       
    </div>

    
    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="module" style="position: absolute; right: 10px; width: 25%; top: 0;">
        <div class="card">
            <div class="card-header">
                Activity Log 
            </div>
            <div class="card-body">
            @foreach($activity_logs as $activity_log)
                <p> {{$activity_log->activity}} {{$activity_log->created_at->diffForHumans()}} </p>
            @endforeach
            </div>
        </div>
    </div>

</div>


<div id="myAwesomeForm" method="post" class="module" style="position: absolute; left: 10px; width: 20%; top: 0;">
        <div class="card">
            <div class="card-header">
                Profile
            </div>
            <div class="card-body">
            <div class="col-md-12">
                                    <div class="row">
                                        <div class="text-center">
                                            <img style="width:120px;height:120px;" title="Profile Image" class="img-circle profile-user-img" alt="...">
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class=text-center>
                                            <a class='btn btn-success btn-sm' id="btn_img" href='javascript:;'>
                                                <input type="file" id="imgInp" enctype="multipart/form-data" style='position:absolute;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40">
                                                <i class="fa fa-upload"></i>&nbsp;Upload Image

                                            </a>
                                        </div>
                                    </div>
                                </div>
            </div>
        </div>
    </div>

</div>


@endsection
