@extends('layouts.base')

@section('content')

        <main class="container" style="display: block">
            <div class="container">
                <div class="row gx-0">


                    <!-- Navigation links -->
                    <div role="tablist">
                        <a href="#chat-1" class="nav-link text-start" id="chat-1-tab" data-bs-toggle="pill" role="tab" aria-selected="true">Chat 1</a>
                        <a href="#chat-2" class="nav-link text-start" id="chat-2-tab" data-bs-toggle="pill" role="tab" aria-selected="true">Chat 2</a>
                        <a href="#chat-3" class="nav-link text-start" id="chat-3-tab" data-bs-toggle="pill" role="tab" aria-selected="true">Chat 3</a>
                    </div>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="fade tab-pane h-100" id="chat-1" role="tabpanel" aria-labelledby="chat-1-tab">Chat 1 Content</div>
                        <div class="fade tab-pane h-100" id="chat-2" role="tabpanel" aria-labelledby="chat-2-tab">Chat 2 Content</div>
                        <div class="fade tab-pane h-100" id="chat-3" role="tabpanel" aria-labelledby="chat-3-tab">Chat 3 Content</div>
                    </div>

                </div> <!-- Row END -->
                <!-- =======================
                Chat END -->

            </div>
        </main>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const tabs = document.querySelectorAll('.nav-link');
                const tabPanes = document.querySelectorAll('.tab-pane');

                tabs.forEach(tab => {
                    tab.addEventListener('click', function (event) {
                        event.preventDefault();

                        // Remove 'show' and 'active' classes from all tab panes
                        tabPanes.forEach(pane => {
                            pane.classList.remove('show', 'active');
                        });

                        // Add 'show' and 'active' classes to the clicked tab's pane
                        const targetPaneId = this.getAttribute('href');
                        const targetPane = document.querySelector(targetPaneId);
                        targetPane.classList.add('show', 'active');

                        // Remove 'active' class from all nav links
                        tabs.forEach(t => {
                            t.classList.remove('active');
                        });

                        // Add 'active' class to the clicked nav link
                        this.classList.add('active');
                    });
                });
            });
        </script>

    @endsection
