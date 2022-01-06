<?php
    session_start();
        include_once("../DBConnection/Connect.php");
        $query=$pdo->query('SELECT * FROM dossierprof');
        $datas= $query->fetchAll();

?>
<!doctype html>
<html lang="fr">
<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>CHC-UEHL</title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="../images/favicon.png" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="../css/slick.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="../css/animate.css">
    
    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="../css/nice-select.css">
    
    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="../css/jquery.nice-number.min.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="../css/default.css">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="../css/style.css">
    
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="../css/responsive.css">
    
    <!--================= Forme du programme ==============--> 
    <link rel="stylesheet" href="../css/style-form-aca.css">

    <link href="../css/styleTableauDoss.css" rel="stylesheet">
    <link href="../css/fontawesome-free-5.15.4-web/css/all.min.css" rel="stylesheet">
  
  
</head>

<body>
   
    <!--====== PRELOADER PART START ======-->
    
    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>
    
    <!--====== PRELOADER PART START ======-->
   
    <!--====== HEADER PART START ======-->
    
    <header id="header-part">
       
        <div class="header-top d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact text-lg-left text-center">
                            <ul>
                                <li><img src="../images/all-icon/map.png" alt="icon"><span>Route Nationale #6 Limonade, Haiti</span></li>
                                <li><img src="../images/all-icon/email.png" alt="icon"><span>chcl@yourmail.com</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header-opening-time text-lg-right text-center">
                            <p>Opening Hours : Monday to Friday - 8 Am to 6 Pm</p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header top -->
            
            <div class="header-logo-support pt-30 pb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="logo">
                                <a href="../index2.php">
                                    <img src="../images/LOGOCH.png" alt="Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="support-button float-right d-none d-md-block">
                                <div class="support float-left">
                                    <div class="icon">
                                        <img src="../images/all-icon/support.png" alt="icon">
                                    </div>
                                    <div class="cont">
                                        <p>call me</p>
                                        <span>2222-2222</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- header logo support -->
            
            <div class="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                            <nav class="navbar navbar-expand-lg">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
    
                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item">
                                            <a href="../index2.php"> ACCUEIL </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="annee-academique.php">ANEEE ACADEMIQUES</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="active" href="#">DOSSIERS</a>
                                            <ul class="sub-menu">
                                                <li><a href="dossier-etudiant.php"> ETUDIANTS</a></li>
                                                <li><a class="active" href="dossier-professeur.php">PROFESSEURS</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="cours.php">COURS</a>
                                            <ul class="sub-menu">
                                                <li><a href="horaire.php">HORAIRES</a></li>
                                                <li><a href="matiere.php">MATIERES</a></li>
                                                <li><a href="notes.php">NOTES</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="palmares.php">PALMARES</a>
                                            <ul class="sub-menu">
                                                <li><a href="bulletin.php">BULLETINS</a></li>
                                                <li><a href="reveles-de-note.php">RELEVES DE NOTES</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="Utilisateur.php">UTILISATEURS</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav> <!-- nav -->
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                            <div class="right-icon text-right">
                                <ul>
                                    <li><a href="#" id="search"><i class="fa fa-search"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-bag"></i><span>0</span></a></li>
                                </ul>
                            </div> <!-- right icon -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div>
            
        </header>
         <!--====== HEADER PART ENDS ======-->
   
    <!--====== SEARCH BOX PART START ======-->
    
    <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- serach form -->
    </div>
    
    <!--====== SEARCH BOX PART ENDS ======-->
    
        <!--====== CONTACT PART START ======-->
    
        <section id="contact-page" class="pt-90 pb-120 gray-bg">
         <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="contact-from mt-30">
                        <div class="main-form pt-45">
                            <!-- tableau -->
                            <div class="table-wrapper">
                                <table class="fl-table">
                                    <thead>
                                        <!-- entete du tableau -->
                                        <tr>
                                            <th>Code</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Sexe</th>
                                            <th>Adresse</th>
                                            <th>Telephone</th>
                                            <th>Statut Matrimonial</th>
                                            <th>Lieu de naiss</th>
                                            <th>Date de naiss</th>
                                            <th>Niveau</th>
                                            <th>Cours a enseigner</th>
                                            <th>Filieres affectes</th>
                                            <th>Salaire</th>
                                            <th>Poste</th>
                                            <th>Email</th>
                                            <th>Nif Cin</th>
                                            <th>Etat</th>
                                            <th>Memo</th>
                                            <th><i class="fas fa-tasks"></i></th>
                                        </tr>
                                    </thead>
                                    <!-- contenu de notre tableau -->
                                    <tbody>
                                        <?php foreach($datas as $data) : ?>
                                            <tr>
                                                <td><?= $data['Code']?></td>
                                                <td><?= $data['Nom'] ?></td>
                                                <td><?= $data['Prenom'] ?></td>
                                                <td><?= $data['Sexe'] ?></td>
                                                <td><?= $data['Adresse'] ?></td>
                                                <td><?= $data['Telephone'] ?></td>
                                                <td><?= $data['Statut_Matrimonial'] ?></td>
                                                <td><?= $data['Lieu_de_naissance'] ?></td>
                                                <td><?= $data['Date_de_naissance'] ?></td>
                                                <td><?= $data['Niveau'] ?></td>
                                                <td><?= $data['Cours_a_enseigner'] ?></td>
                                                <td><?= $data['Filieres_affectes'] ?></td>
                                                <td><?= $data['Salaire'] ?></td>
                                                <td><?= $data['Poste'] ?></td>
                                                <td><?= $data['Email'] ?></td>
                                                <td><?= $data['Nif_Cin'] ?></td>
                                                <td><?= $data['Etat'] ?></td>
                                                <td><?= $data['Memo'] ?></td>
                                                <td>
                                                <a href="AllAction/action-suppr-professeur.php?id=<?=$data['id']?>"><button>Delete</i></button></a>
                                                </td>
                                               
                                            </tr>
                                            <?php endforeach ; ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- main form -->
                    </div> <!--  contact from -->
                </div>
                
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== CONTACT PART ENDS ======-->
   
    <!--====== FOOTER PART START ======-->
    
    <footer id="footer-part">
        <div class="footer-top pt-40 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-about mt-40">
                            <div class="logo">
                                <a href="#"><img src="../images/logo-2.png" alt="Logo"></a>
                            </div>
                            <p>
                                Un campus entiÃ¨rement neuf a Ã©tÃ© construit en six mois. La construction a coÃ»tÃ© 30 millions 
                                de dollars amÃ©ricains.

                            </p>
                            <ul class="mt-20">
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-link mt-40">
                            <div class="footer-title pb-25">
                                <h6> Nos pages </h6>
                            </div>
                            <ul>
                                <li><a href="../index.php"><i class="fa fa-angle-right"></i>Home</a></li>
                                <li><a href="annee-academique.php"><i class="fa fa-angle-right"></i>annee-academique</a></li>
                                <li><a href="dossier-etudiant.php"><i class="fa fa-angle-right"></i>Etudiants</a></li>
                                <li><a href="dossier-professeur.php"><i class="fa fa-angle-right"></i>Professeurs</a></li>
                                <li><a href="Utilisateur.php"><i class="fa fa-angle-right"></i>Utilisateur</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-link support mt-40">
                            <div class="footer-title pb-25">
                                <h6>Supports</h6>
                            </div>
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-right"></i>FAQS</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Privacy</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Policy</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Support</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Documentation</a></li>
                            </ul>
                        </div> <!-- support -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-address mt-40">
                            <div class="footer-title pb-25">
                                <h6>Contact </h6>
                            </div>
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p>Limonade, route nationale #6 </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p>+2222 22-22</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p>infochcl@yourmail.com</p>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- footer address -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer top -->
        
        <div class="footer-copyright pt-10 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright text-md-left text-center pt-15">
                            <p><a target="_blank" href="#">Developper By Edutools </a> </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="copyright text-md-right text-center pt-15">
                           
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>
    
    <!--====== FOOTER PART ENDS ======-->
   
    <!--====== BACK TO TOP PART START ======-->
    
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
    
    <!--====== BACK TO TOP PART ENDS ======-->
    
    <!--====== jquery js ======-->
    <script src="../js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="../js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="../js/bootstrap.min.js"></script>
    
    <!--====== Slick js ======-->
    <script src="../js/slick.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="../js/jquery.magnific-popup.min.js"></script>
    
    <!--====== Counter Up js ======-->
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>
    
    <!--====== Nice Select js ======-->
    <script src="../js/jquery.nice-select.min.js"></script>
    
    <!--====== Nice Number js ======-->
    <script src="../js/jquery.nice-number.min.js"></script>
    
    <!--====== Count Down js ======-->
    <script src="../js/jquery.countdown.min.js"></script>
    
    <!--====== Validator js ======-->
    <script src="../js/validator.min.js"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="../js/ajax-contact.js"></script>
    
    <!--====== Main js ======-->
    <script src="../js/main.js"></script>
    
    <!--====== Map js ======-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="../js/map-script.js"></script>

</body>
</html>