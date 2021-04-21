<nav class="navbar navbar-light" style="background-color: #1f5881; height: 50px;">
<div class="container-fluid NavbarContainer">
    <!-- <a class="navbar-brand">Navbar</a> -->

    <span class="material-icons hidden_sidebar_icon" onclick = "openSideBar()">
      menu
    </span>
    <h3 class="SiteTitle otherfont">მორიკა</h3>

    
    <!-- <div> -->
      <form class="d-flex">
          <input class="form-control me-2 Searchinput" type="search" id="search" data-modul="adminpage" placeholder="Search" aria-label="Search">
      </form>
    <!-- </div> -->
    <span class="material-icons SearchIcon">search</span>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end NavMenu">
  
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn"><span class="material-icons NavMenuSpan">more_vert</span></button>
            <div id="myDropdown" class="dropdown-content">
                <a class="addCategoryBtn" href="#home"  data-bs-toggle="modal" data-bs-target=".addCategoryModal" data-bs-whatever="@addCategory"><span class="material-icons logoutIcon">add</span>&nbsp;კატეგორიის დამატება</a>
                <!-- <a href="#about" data-bs-toggle="modal" data-bs-target=".addProductModal" data-bs-whatever="@addProduct"><span class="material-icons logoutIcon">add</span>&nbsp;პროდუქტის დამატება</a> -->
                <a href="#contact"><span class="material-icons logoutIcon">logout</span>&nbsp;გასვლა</a>
            </div>
        </div>
    </div>
    
  </div>
</nav>

<div class="d-flex flex-column p-3 text-white bg-dark CategoryBar " >
<h3 class="otherfont">კატეგორია</h3>
  <ul class="nav nav-pills flex-column mb-auto BothCategory adminCategoryList">

  </ul>
</div>