<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap"
            rel="stylesheet"
        />
        <!--  -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
            crossorigin="anonymous"
        />

        <script
            src="https://cdn.tiny.cloud/1/68ciiht3te3d1erk0blb60tq6j4lkakbw7pdmn85lx4fffpv/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"
        ></script>
        <script>
            tinymce.init({
                selector: "#mytextarea",
            });
        </script>

        <!-- ui kit -->
        <!-- UIkit CSS -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/css/uikit.min.css"
        />

        <!-- Styles -->
        <style>
            a {
                text-decoration: none;
            }
            a:hover {
                text-decoration: none !important;
            }
            .button {
                font-size: 20px;
                padding-block: 5px;
                border: 0;
                background: none;
            }
            .uk-active {
                border: 0;
                border-bottom: 2px solid rgb(67, 110, 228);
            }
            /* fire */

            .fire-text {
                font-size: 5rem;
                font-weight: 900;
                color: transparent;
                background-clip: text;
                -webkit-background-clip: text;
                color: transparent;
                background-size: 70% 132%;
                background-image: url("https://thumbs.gfycat.com/DisloyalRareConey-size_restricted.gif");
                -webkit-text-stroke: unset;
                animation: unset;
                animation: watereffect 9s infinite normal linear;

                -webkit-text-stroke: 1px #000000;
            }
            @keyframes watereffect {
                0% {
                    background-position: 0 10px;
                }
                5% {
                    background-position: 5% 5px;
                }
                10% {
                    background-position: 10% -10px;
                }
                15% {
                    background-position: 15% -20px;
                }
                20% {
                    background-position: 20% -30px;
                }
                25% {
                    background-position: 25% -40px;
                }
                30% {
                    background-position: 30% -50px;
                }
                40% {
                    background-position: 35% -55px;
                }
                50% {
                    background-position: 40% -55px;
                }
                60% {
                    background-position: 50% -55px;
                }
                70% {
                    background-position: 60% -55px;
                }
                80% {
                    background-position: 70% -55px;
                }
                90% {
                    background-position: 80% -55px;
                }
                100% {
                    background-position: 90% -55px;
                }
            }
        </style>
    </head>
    <body class="antialiased">
        <nav>
            <div
                style="width: 20%"
                class="offcanvas offcanvas-start show"
                data-bs-scroll="true"
                data-bs-backdrop="false"
                tabindex="-1"
                id="offcanvasScrolling"
                aria-labelledby="offcanvasScrollingLabel"
            >
                <div class="offcanvas-header">
                    <div class="mt-5 border-bottom w-100 text-center">
                        <h2 class="fire-text">Pulsirat</h2>
                    </div>
                </div>
                <div class="offcanvas-body">
                    <div class="list-group" id="list-group">
                        <a
                            href="{{ url('/') }}"
                            class="list-group-item list-group-item-action"
                            aria-current="true"
                        >
                            All Files
                        </a>
                        <a
                            role="button"
                            data-bs-toggle="modal"
                            data-bs-target="#modal"
                            class="list-group-item list-group-item-action"
                            >Add Case</a
                        >
                        <a
                            role="button"
                            data-bs-target="#searchModal"
                            class="list-group-item list-group-item-action"
                            >Search Case</a
                        >
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div
                class="modal fade"
                id="searchModal"
                tabindex="-1"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                Search Case
                            </h1>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <input
                                type="text"
                                class="form-control"
                                name="searchCase"
                            />
                            <div class="d-flex justify-content-end">
                                <button
                                    class="btn btn-primary mt-3"
                                    type="submit"
                                >
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <main>@yield('content')</main>
        <!-- create file modal -->
        <div
            class="modal fade"
            id="modal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            File Title
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <!-- from -->
                        <form action="{{ route('title.store') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <span class="input-group-text">Title</span>
                                <input
                                    type="text"
                                    name="title"
                                    aria-label="First name"
                                    class="form-control"
                                    required
                                />
                            </div>
                            <div class="mt-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    Next
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- create file modal -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"
        ></script>
        <script>
            // Add active class to the current button (highlight it)
            var header = document.getElementById("table-button-group");
            var btns = document.getElementsByClassName("button");
            console.log(btns);
            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click", function () {
                    var current = document.getElementsByClassName("active");
                    current[0].className = current[0].className.replace(
                        " active",
                        ""
                    );
                    this.className += " active";
                });
            }
        </script>
        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/js/uikit-icons.min.js"></script>
    </body>
</html>
