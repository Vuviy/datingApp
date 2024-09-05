@extends('layouts.base')

@section('content')

        <main class="container" style="display: block">
            <div class="container">
                <div class="row gx-0">
                    <!-- Sidebar START -->
                    <div class="col-lg-4 col-xxl-3" id="chatTabs" role="tablist">

                        <!-- Divider -->
                        <div class="d-flex align-items-center mb-4 d-lg-none">
                            <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                                <span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
                                <span class="h6 mb-0 fw-bold d-lg-none ms-2">Chats</span>
                            </button>
                        </div>
                        <!-- Advanced filter responsive toggler END -->
                        <div class="card card-body border-end-0 border-bottom-0 rounded-bottom-0">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h1 class="h5 mb-0">Active chats <span
                                        class="badge bg-success bg-opacity-10 text-success">6</span></h1>
                                <!-- Chat new create message item START -->
                                <div class="dropend position-relative">
                                    <div class="nav">
                                        <a class="icon-md rounded-circle btn btn-sm btn-primary-soft nav-link toast-btn"
                                           data-target="chatToast" href="#"> <i class="bi bi-pencil-square"></i> </a>
                                    </div>
                                </div>
                                <!-- Chat new create message item END -->
                            </div>
                        </div>

                        <nav class="navbar navbar-light navbar-expand-lg mx-0">

                            <div class="mt-4 h-100">
                                <div class="os-content" style="padding: 0px; height: 100%; width: 100%;">
                                    <ul class="nav flex-column nav-pills nav-pills-soft" role="tablist">


                                        @foreach($chats as $chat)

                                            <li data-bs-dismiss="offcanvas">
                                                <!-- Chat user tab item -->
                                                <a href="#chat-1" class="nav-link text-start" id="chat-{{$chat->id}}-tab"
                                                   data-bs-toggle="pill" role="tab" aria-selected="true">
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0 avatar avatar-story me-2 status-online">
                                                            <img class="avatar-img rounded-circle"
                                                                 src="https://via.placeholder.com/40" alt="">
                                                        </div>
                                                        <div class="flex-grow-1 d-block">
                                                            <h6 class="mb-0 mt-1">
                                                                @if(auth()->id() == $chat->recipient_id)
                                                                   {{$chat->sender->name}}
                                                                @else
                                                                    {{$chat->recipient->name}}
                                                                @endif
                                                            </h6>
                                                            <div class="small text-secondary">{{$chat->body}}</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                        @endforeach


                                    </ul>
                                </div>
                            </div>
                            <!-- Chat list tab END -->
                        </nav>
                    </div>
                    <!-- Sidebar START -->

                    <!-- Chat conversation START -->
                    <div class="col-lg-8 col-xxl-9">
                        <div class="card card-chat rounded-start-lg-0 border-start-lg-0">
                            <div class="card-body h-100">
                                <div class="tab-content py-0 mb-0 h-100" id="chatTabsContent">


                                    @foreach($chats as $chat)


                                    <!-- Conversation item START -->
                                    <div class="fade tab-pane h-100" id="chat-{{$chat->id}}" role="tabpanel"
                                         aria-labelledby="chat-{{$chat->id}}-tab">
                                        <!-- Top avatar and status START -->
                                        <div class="d-sm-flex justify-content-between align-items-center">
                                            <div class="d-flex mb-2 mb-sm-0">
                                                <div class="flex-shrink-0 avatar me-2">
                                                    <img class="avatar-img rounded-circle"
                                                         src="https://via.placeholder.com/40" alt="">
                                                </div>
                                                <div class="d-block flex-grow-1">
                                                    <h6 class="mb-0 mt-1">

                                                        @if(auth()->id() == $chat->recipient_id)
                                                            {{$chat->sender->name}}
                                                        @else
                                                            {{$chat->recipient->name}}
                                                        @endif

                                                    </h6>
                                                    <div class="small text-secondary"><i
                                                            class="fa-solid fa-circle text-success me-1"></i>Online
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <!-- Call button -->
                                                <a href="#!"
                                                   class="icon-md rounded-circle btn btn-primary-soft me-2 px-2"
                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                   aria-label="Audio call" data-bs-original-title="Audio call"><i
                                                        class="bi bi-telephone-fill"></i></a>
                                                <a href="#!"
                                                   class="icon-md rounded-circle btn btn-primary-soft me-2 px-2"
                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                   aria-label="Video call" data-bs-original-title="Video call"><i
                                                        class="bi bi-camera-video-fill"></i></a>
                                                <!-- Card action START -->
                                                <div class="dropdown">
                                                    <a class="icon-md rounded-circle btn btn-primary-soft me-2 px-2"
                                                       href="#" id="chatcoversationDropdown" role="button"
                                                       data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                                       aria-expanded="false"><i
                                                            class="bi bi-three-dots-vertical"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="chatcoversationDropdown">
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-check-lg me-2 fw-icon"></i>Mark as read</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-mic-mute me-2 fw-icon"></i>Mute
                                                                conversation</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-person-check me-2 fw-icon"></i>View
                                                                profile</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-trash me-2 fw-icon"></i>Delete chat</a>
                                                        </li>
                                                        <li class="dropdown-divider"></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-archive me-2 fw-icon"></i>Archive chat</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Card action END -->
                                            </div>
                                        </div>
                                        <!-- Top avatar and status END -->
                                        <hr>






                                        <!-- Chat conversation START -->
                                        <div
                                            class="chat-conversation-content custom-scrollbar os-host os-theme-dark os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
                                            <div class="os-resize-observer-host observed">
                                                <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
                                            </div>
                                            <div class="os-size-auto-observer observed"
                                                 style="height: calc(100% + 1px); float: left;">
                                                <div class="os-resize-observer"></div>
                                            </div>
                                            <div class="os-content-glue"
                                                 style="margin: 0px; width: 839px; height: 79px;"></div>
                                            <div class="os-padding">
                                                <div class="os-viewport os-viewport-native-scrollbars-invisible os-viewport-native-scrollbars-overlaid"
                                                    style="height: calc(100vh - 50vh);">

{{--                                                <div class="os-viewport os-viewport-native-scrollbars-invisible os-viewport-native-scrollbars-overlaid"--}}
{{--                                                    style="overflow-y: scroll;">--}}
                                                    <div class="os-content"
                                                         style="padding: 0px; width: 100%; height: 100%; overflow-y: scroll;">
                                                        <!-- Chat time -->
                                                        <div class="text-center small my-2">Jul 16, 2022, 06:15 am</div>
                                        @foreach($chat->messages as $message)



                                                        @if(auth()->id() !== $message->chat->recipient_id)

                                                            <!-- Chat message left -->
                                                            <div class="d-flex mb-1">
                                                                {{--  <div class="flex-shrink-0 avatar avatar-xs me-2">--}}
                                                                {{--  <img class="avatar-img rounded-circle"--}}
                                                                {{--src="https://via.placeholder.com/40" alt="">--}}
                                                                {{--</div>--}}
                                                                <div class="flex-grow-1">
                                                                    <div class="w-100">
                                                                        <div class="d-flex flex-column align-items-start">
                                                                            <div
                                                                                class="bg-light text-secondary p-2 px-3 rounded-2">

                                                                                {{$message->body}}
                                                                            </div>
                                                                            <div class="small my-2">6:15 AM</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <!-- Chat message right -->
                                                            <div class="d-flex justify-content-end text-end mb-1">
                                                                <div class="w-100">
                                                                    <div class="d-flex flex-column align-items-end">
                                                                        <div
                                                                            class="bg-primary text-white p-2 px-3 rounded-2">
                                                                            {{$message->body}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif

                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Chat conversation END -->
                                    </div>
                                    <!-- Conversation item END -->


                                    @endforeach



                                </div>
                            </div>
                            <div class="card-footer">

                                <div class="d-sm-flex align-items-end">
                                    <textarea class="form-control mb-sm-0 mb-3" data-autoresize=""
                                              placeholder="Type a message" rows="1"></textarea>
                                    <button class="btn btn-primary">send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Chat conversation END -->
                </div> <!-- Row END -->
                <!-- =======================
                Chat END -->

            </div>
        </main>



    @endsection
