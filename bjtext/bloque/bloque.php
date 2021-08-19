<?php
  
  include('../../config.php');
        Include('../../vue/admin/actualite.php');
        //include('../../modele/ajouter.php');
        include('../../service.php');

    $erreur="";

    if(isset($_POST['submit1'])){
            $titre= verifierInput($_POST['titre']);
            $description= verifierInput($_POST['description']);
            $contenu= verifierInput($_POST['com']);
            $image= verifierInput($_FILES['image']['name']);
            $imagePath = '../../asset/images'.basename($image);
            $image_ext = pathinfo($imagePath, PATHINFO_EXTENSION);
            $isSuccess = true;
            $isUploadSuccess = false;

            if(empty($titre)|| empty($description) || empty($contenu) || empty($image)){
                    $erreur = "Veillez Remplir tous les champs!";
                    $isSuccess = false;
            }
            
            else
            {
                    $isUploadSuccess = true;
                    if($image_ext !="png" && $image_ext !="jpg" && $image_ext !="jpeg" && $image_ext !="gif")
                    {
                            $erreur = "Les fichiers autorisés sont : .png, .jpeg, .gif, .jpg";
                            $isUploadSuccess = false;
                    }
                    if(file_exists($imagePath))
                    {
                            $erreur = "L'image existe dejà";
                            $isUploadSuccess = false;
                    }
                    if($_FILES["image"]["size"] > 500000)
                    {
                            $erreur = "La taille de l'image dépasse 5Mo";
                            $isUploadSuccess = false;
                    }
                    if($isUploadSuccess)
                    {
                            if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath))
                            {
                                    $erreur= "il y a eu une erreur lors de téléchargement";
                                    $isUploadSuccess = false;
                            }
                    }
            }
            if($isSuccess && $isUploadSuccess){
                $requete = $bdd->prepare("INSERT INTO abw_news (news_titre, news_description, news_contenutext, news_image, news_date,slug) VALUES (?,?,?,?,?,?)");
                $resultat = $requete->execute(array($titre, $description, $contenu, $image, date("Y-m-d H:i:s"), mettreslug($titre))); 

            }


        }
        

// if(isset($_POST['submit1'])){
//         ajouter($bdd, $image);

?>













<?php
session_start();
if(!isset($_SESSION['mdp'])){
    header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Site de bjtext</title>
        <link href="/bjtext/asset/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Administrateur BJTEXT</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Settings</a></li>
                            <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="#!">Logout</a></li>
                        </ul>
                    </li>
                </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light bg-success" bg-success id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Connecté en tant que:</div>
                        Administrateur BJTEXT
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-header text-danger"><h3 class="text-center font-weight-light my-4">Ajouter de nouvelles actualités</h3></div>
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="titre" placeholder="Titre" />
                                            <label for="description">Titre</label>
                                            <span class = "help-inline text-danger"><?php $erreur; ?></span>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="description" placeholder="Description" />
                                            <label for="description">Description</label>
                                            <span class = "help-inline text-danger"><?php $erreur; ?></span>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" name="contenu" placeholder="Contenu"></textarea>
                                            <label for="contenu">Contenu</label>
                                            <span class = "help-inline text-danger"><?php $erreur; ?></span>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="image" accept="image" placeholder="Image" type="file" />
                                            <label for="image">Image</label>
                                            <span class = "help-inline text-danger"><?php $erreur; ?></span>
                                        </div>
                                        <div class="d-flex align-items-right justify-content-between mt-4 mb-0">
                                            <a class="small" ></a>
                                            <a class="btn btn-primary" href="actualite.php" class="ajout">Ajouter une nouvelle actualité</a>
                                            <input class="btn btn-primary" type="submit" name="submit1" value="Publier l'actualité"/>
                                            <a class="btn btn-primary" href="index.php" >Retour sur actualités</a>
                                            <a class="btn btn-primary" href="logout.php" >Se déconnecter</a>
                                        </div> 
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/bjtext/asset/js/scripts.js"></script>

    </body>
</html>







//mon