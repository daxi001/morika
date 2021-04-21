<nav class="navbar navbar-light" style="background-color: #1f5881; height: 50px;">
<div class="container-fluid NavbarContainer">
<span class="material-icons hidden_sidebar_icon" onclick="openSideBar()">
      menu
    </span>
  <h3 class="SiteTitle">მორიკა</h3>
    <form class="d-flex">
      <input class="form-control me-2 Searchinput" type="search" id="search" data-modul="userpage" placeholder="Search" aria-label="Search">
      <span class="material-icons SearchIcon">search</span>
    </form>
    <span class="material-icons userIcon" data-bs-toggle="modal" data-bs-target=".AutorizationModal">account_circle</span>
  </div>
</nav>
<div class="d-flex flex-column p-3 text-white bg-dark CategoryBar" >
    <h3 class="otherfont">კატეგორია</h3>
    <ul class="nav nav-pills flex-column mb-auto BothCategory userCategoryList">
        
    </ul>
</div>