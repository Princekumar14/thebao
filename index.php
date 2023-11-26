<?php require("top.php"); ?>




<header>
  <!-- Animated navbar-->
  <nav class="navbar navbar-expand-lg fixed-top navbar-scroll">
    <div class="container-fluid">
      <button class="navbar-toggler ps-0" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="d-flex justify-content-start align-items-center">
          <i class="fas fa-bars"></i>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="#intro">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" rel="nofollow" target="_blank">Learn Bootstrap 5</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/docs/standard/" target="_blank">Download MDB UI KIT</a>
          </li>
        </ul>

        <ul class="navbar-nav flex-row">
          <!-- Icons -->
          <li class="nav-item">
            <a class="nav-link pe-2" href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" rel="nofollow" target="_blank">
              <i class="fab fa-youtube"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-2" href="https://www.facebook.com/mdbootstrap" rel="nofollow" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-2" href="https://twitter.com/MDBootstrap" rel="nofollow" target="_blank">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link ps-2" href="https://github.com/mdbootstrap/mdb-ui-kit" rel="nofollow" target="_blank">
              <i class="fab fa-github"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Animated navbar -->

  <!-- Background image -->
  <div id="intro" class="bg-image" style="
              background-image: url(https://mdbcdn.b-cdn.net/img/new/fluid/city/113.jpg);
              height: 100vh;
              ">
    <div class="mask text-white" style="background-color: rgba(0, 0, 0, 0.8)">
      <div class="container d-flex align-items-center text-center h-100">
        <div class="h-100">
          <h1 class="mb-5">This is title</h1>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis molestiae
            laboriosam numquam expedita ullam saepe ipsam, deserunt provident corporis,
            sit non accusamus maxime, magni nulla quasi iste ipsa architecto? Autem!
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- Background image -->
</header>
<div class="container">
        <div class="card mb-3 itemss" style="background-color: rgb(18, 18, 18);">

            <!-- <div class="row no-gutters game-card pc new" data-videoorderid=1> -->
            <div class="row no-gutters game-card  pc new mb-3" data-videoorderid=1 style="background-color: black;">
                <div class="col-md-4 game-card-left">
                    <a href="#" class="" data-toggle="modal" data-target="#videoModal"
                        data-videourl="https://www.youtube-nocookie.com/embed/nsANTXmxSYk">
                        <div class="overlay">
                            <i class="fa fa-play fa-3x text-white"></i>
                        </div>
                        <img src="https://thebao.xyz/admin/assets/img/Weixin-Image_20231123212119cc.jpg"
                            class="card-img" alt="...">
                    </a>
                </div>
                <div class="col-md-8 game-card-right">
                    <div class="card-body">
                        <h5 class="card-title text-white short-hr-left">Colton Haynes Portrait</h5>
                        <p class="card-text text-white game-description">Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Ad cumque asperiores obcaecati nostrum suscipit eum, vel iure ex quisquam
                            minus fugiat quasi, necessitatibus dicta quis.</p>
                    </div>
                </div>
                <div class="container">
                    <div class="modal" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-body bg-dark p-0" id="modelbody">
                                    <div class="spinner-border spinner-border-lg text-white text-danger " role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe allowfullscreen="true" style="height: 100%; width: 100%;"
                                            frameborder="0" id="videoIframe"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters game-card  pc new mb-3" data-videoorderid=2 style="background-color: black;">
                <div class="col-md-4 game-card-left">
                    <a href="#" class="" data-toggle="modal" data-target="#videoModal"
                        data-videourl="https://www.youtube-nocookie.com/embed/nsANTXmxSYk">
                        <div class="overlay">
                            <i class="fa fa-play fa-3x text-white"></i>
                        </div>
                        <img src="https://thebao.xyz/admin/assets/img/Weixin-Image_20231123212119cc.jpg"
                            class="card-img" alt="...">
                    </a>
                </div>
                <div class="col-md-8 game-card-right">
                    <div class="card-body">
                        <h5 class="card-title text-white short-hr-left">Colton Haynes Portrait</h5>
                        <p class="card-text text-white game-description">Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Ad cumque asperiores obcaecati nostrum suscipit eum, vel iure ex quisquam
                            minus fugiat quasi, necessitatibus dicta quis.</p>
                    </div>
                </div>
                <div class="container">
                    <div class="modal" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-body bg-dark p-0" id="modelbody">
                                    <div class="spinner-border spinner-border-lg text-white text-danger " role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe allowfullscreen="true" style="height: 100%; width: 100%;"
                                            frameborder="0" id="videoIframe"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters game-card  pc new mb-3" data-videoorderid=3 style="background-color: black;">
                <div class="col-md-4 game-card-left">
                    <a href="#" class="" data-toggle="modal" data-target="#videoModal"
                        data-videourl="https://www.youtube-nocookie.com/embed/nsANTXmxSYk">
                        <div class="overlay">
                            <i class="fa fa-play fa-3x text-white"></i>
                        </div>
                        <img src="https://thebao.xyz/admin/assets/img/Weixin-Image_20231123212119cc.jpg"
                            class="card-img" alt="...">
                    </a>
                </div>
                <div class="col-md-8 game-card-right">
                    <div class="card-body">
                        <h5 class="card-title text-white short-hr-left">Colton Haynes Portrait</h5>
                        <p class="card-text text-white game-description">Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Ad cumque asperiores obcaecati nostrum suscipit eum, vel iure ex quisquam
                            minus fugiat quasi, necessitatibus dicta quis.</p>
                    </div>
                </div>
                <div class="container">
                    <div class="modal" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-body bg-dark p-0" id="modelbody">
                                    <div class="spinner-border spinner-border-lg text-white text-danger " role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe allowfullscreen="true" style="height: 100%; width: 100%;"
                                            frameborder="0" id="videoIframe"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters game-card  pc new mb-3" data-videoorderid=3 style="background-color: black;">
                <div class="col-md-4 game-card-left">
                    <a href="#" class="" data-toggle="modal" data-target="#videoModal"
                        data-videourl="https://www.youtube-nocookie.com/embed/nsANTXmxSYk">
                        <div class="overlay">
                            <i class="fa fa-play fa-3x text-white"></i>
                        </div>
                        <img src="https://thebao.xyz/admin/assets/img/Weixin-Image_20231123212119cc.jpg"
                            class="card-img" alt="...">
                    </a>
                </div>
                <div class="col-md-8 game-card-right">
                    <div class="card-body">
                        <h5 class="card-title text-white short-hr-left">Colton Haynes Portrait</h5>
                        <p class="card-text text-white game-description">Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Ad cumque asperiores obcaecati nostrum suscipit eum, vel iure ex quisquam
                            minus fugiat quasi, necessitatibus dicta quis.</p>
                    </div>
                </div>
                <div class="container">
                    <div class="modal" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-body bg-dark p-0" id="modelbody">
                                    <div class="spinner-border spinner-border-lg text-white text-danger " role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe allowfullscreen="true" style="height: 100%; width: 100%;"
                                            frameborder="0" id="videoIframe"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters game-card  pc new mb-3" data-videoorderid=3 style="background-color: black;">
                <div class="col-md-4 game-card-left">
                    <a href="#" class="" data-toggle="modal" data-target="#videoModal"
                        data-videourl="https://www.youtube-nocookie.com/embed/nsANTXmxSYk">
                        <div class="overlay">
                            <i class="fa fa-play fa-3x text-white"></i>
                        </div>
                        <img src="https://thebao.xyz/admin/assets/img/Weixin-Image_20231123212119cc.jpg"
                            class="card-img" alt="...">
                    </a>
                </div>
                <div class="col-md-8 game-card-right">
                    <div class="card-body">
                        <h5 class="card-title text-white short-hr-left">Colton Haynes Portrait</h5>
                        <p class="card-text text-white game-description">Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Ad cumque asperiores obcaecati nostrum suscipit eum, vel iure ex quisquam
                            minus fugiat quasi, necessitatibus dicta quis.</p>
                    </div>
                </div>
                <div class="container">
                    <div class="modal" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-body bg-dark p-0" id="modelbody">
                                    <div class="spinner-border spinner-border-lg text-white text-danger " role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe allowfullscreen="true" style="height: 100%; width: 100%;"
                                            frameborder="0" id="videoIframe"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters game-card  pc new mb-3" data-videoorderid=3 style="background-color: black;">
                <div class="col-md-4 game-card-left">
                    <a href="#" class="" data-toggle="modal" data-target="#videoModal"
                        data-videourl="https://www.youtube-nocookie.com/embed/nsANTXmxSYk">
                        <div class="overlay">
                            <i class="fa fa-play fa-3x text-white"></i>
                        </div>
                        <img src="https://thebao.xyz/admin/assets/img/Weixin-Image_20231123212119cc.jpg"
                            class="card-img" alt="...">
                    </a>
                </div>
                <div class="col-md-8 game-card-right">
                    <div class="card-body">
                        <h5 class="card-title text-white short-hr-left">Colton Haynes Portrait</h5>
                        <p class="card-text text-white game-description">Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Ad cumque asperiores obcaecati nostrum suscipit eum, vel iure ex quisquam
                            minus fugiat quasi, necessitatibus dicta quis.</p>
                    </div>
                </div>
                <div class="container">
                    <div class="modal" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-body bg-dark p-0" id="modelbody">
                                    <div class="spinner-border spinner-border-lg text-white text-danger " role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe allowfullscreen="true" style="height: 100%; width: 100%;"
                                            frameborder="0" id="videoIframe"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters game-card  pc new mb-3" data-videoorderid=3 style="background-color: black;">
                <div class="col-md-4 game-card-left">
                    <a href="#" class="" data-toggle="modal" data-target="#videoModal"
                        data-videourl="https://www.youtube-nocookie.com/embed/nsANTXmxSYk">
                        <div class="overlay">
                            <i class="fa fa-play fa-3x text-white"></i>
                        </div>
                        <img src="https://thebao.xyz/admin/assets/img/Weixin-Image_20231123212119cc.jpg"
                            class="card-img" alt="...">
                    </a>
                </div>
                <div class="col-md-8 game-card-right">
                    <div class="card-body">
                        <h5 class="card-title text-white short-hr-left">Colton Haynes Portrait</h5>
                        <p class="card-text text-white game-description">Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Ad cumque asperiores obcaecati nostrum suscipit eum, vel iure ex quisquam
                            minus fugiat quasi, necessitatibus dicta quis.</p>
                    </div>
                </div>
                <div class="container">
                    <div class="modal" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-body bg-dark p-0" id="modelbody">
                                    <div class="spinner-border spinner-border-lg text-white text-danger " role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe allowfullscreen="true" style="height: 100%; width: 100%;"
                                            frameborder="0" id="videoIframe"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters game-card  pc new mb-3" data-videoorderid=3 style="background-color: black;">
                <div class="col-md-4 game-card-left">
                    <a href="#" class="" data-toggle="modal" data-target="#videoModal"
                        data-videourl="https://www.youtube-nocookie.com/embed/nsANTXmxSYk">
                        <div class="overlay">
                            <i class="fa fa-play fa-3x text-white"></i>
                        </div>
                        <img src="https://thebao.xyz/admin/assets/img/Weixin-Image_20231123212119cc.jpg"
                            class="card-img" alt="...">
                    </a>
                </div>
                <div class="col-md-8 game-card-right">
                    <div class="card-body">
                        <h5 class="card-title text-white short-hr-left">Colton Haynes Portrait</h5>
                        <p class="card-text text-white game-description">Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Ad cumque asperiores obcaecati nostrum suscipit eum, vel iure ex quisquam
                            minus fugiat quasi, necessitatibus dicta quis.</p>
                    </div>
                </div>
                <div class="container">
                    <div class="modal" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-body bg-dark p-0" id="modelbody">
                                    <div class="spinner-border spinner-border-lg text-white text-danger " role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe allowfullscreen="true" style="height: 100%; width: 100%;"
                                            frameborder="0" id="videoIframe"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters game-card  pc new mb-3" data-videoorderid=3 style="background-color: black;">
                <div class="col-md-4 game-card-left">
                    <a href="#" class="" data-toggle="modal" data-target="#videoModal"
                        data-videourl="https://www.youtube-nocookie.com/embed/nsANTXmxSYk">
                        <div class="overlay">
                            <i class="fa fa-play fa-3x text-white"></i>
                        </div>
                        <img src="https://thebao.xyz/admin/assets/img/Weixin-Image_20231123212119cc.jpg"
                            class="card-img" alt="...">
                    </a>
                </div>
                <div class="col-md-8 game-card-right">
                    <div class="card-body">
                        <h5 class="card-title text-white short-hr-left">Colton Haynes Portrait</h5>
                        <p class="card-text text-white game-description">Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Ad cumque asperiores obcaecati nostrum suscipit eum, vel iure ex quisquam
                            minus fugiat quasi, necessitatibus dicta quis.</p>
                    </div>
                </div>
                <div class="container">
                    <div class="modal" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-body bg-dark p-0" id="modelbody">
                                    <div class="spinner-border spinner-border-lg text-white text-danger " role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe allowfullscreen="true" style="height: 100%; width: 100%;"
                                            frameborder="0" id="videoIframe"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mb-0 load-more text-white" id="loadMore" style="font-size: 2rem; cursor: pointer;"> Load More Videos
            <!-- <i class="fa fa-arrow-circle-down text-white" id="loadarrow" aria-hidden="true"> Load More Videos</i> -->
        </div>








    </div>

<?php require("footer.php"); ?>