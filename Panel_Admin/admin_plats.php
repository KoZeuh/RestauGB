<?php
	include 'functions.php';
    include 'database.php';
  
    VerifAuthentification();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Restau GB - Gestion Admin</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="CSS/style_plats.css">

    
  </head>

    <body class="d-flex flex-column min-vh-100">
      <div class="container-fluid rgba-gradient">
        <!-- example 5 left and center only with empty space right -->
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark flex-nowrap fixed">
            <button class="navbar-toggler mr-2" type="button" data-toggle="collapse" data-target="#navbar5">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span class="navbar-brand">Restau' GB</span>
            <div class="navbar-collapse collapse w-100 justify-content-center" id="navbar5">
                <ul class="navbar-nav mx-auto">
                  <?php
                    LoadPageAccess();
                  ?>
                </ul>
            </div>
            <span class="navbar-text active btn btn-success"><a href="deconnexion.php">Deconnexion</a></span>
            
        </nav>

        <br>
        <h3 class="text-center">Liste des Entrées</h3>
        <br>
        <form action="./admin_plats.php" enctype="multipart/form-data" method="post">
        <section>
            <div class="container">
            <div class="row clearfix">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card product_item">
                            <div class="body">
                                <div class="cp_img">
                                    <img src="https://archzine.fr/wp-content/uploads/2016/05/feuilles-d-endive-avec-des-noix-fraises-fromage-feta-et-feuilels-de-basilic-idee-de-entre%CC%81e-froide-originale.jpg" alt="Product" class="img-fluid">
                                </div>
                                <div class="product_details">
                                    <h5><a href="ec-product-detail.html">Entrée #1</a></h5>
                                    <input type="checkbox" class="radio" value="1" name="entree" /></label>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card product_item">
                            <div class="body">
                                <div class="cp_img">
                                    <img src="https://archzine.fr/wp-content/uploads/2016/05/feuilles-d-endive-avec-des-noix-fraises-fromage-feta-et-feuilels-de-basilic-idee-de-entre%CC%81e-froide-originale.jpg" alt="Product" class="img-fluid">
                                </div>
                                <div class="product_details">
                                    <h5><a href="ec-product-detail.html">Entrée #2</a></h5>
                                    <input type="checkbox" class="radio" value="2" name="entree" /></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card product_item">
                            <div class="body">
                                <div class="cp_img">
                                    <img src="https://archzine.fr/wp-content/uploads/2016/05/feuilles-d-endive-avec-des-noix-fraises-fromage-feta-et-feuilels-de-basilic-idee-de-entre%CC%81e-froide-originale.jpg" alt="Product" class="img-fluid">
                                </div>
                                <div class="product_details">
                                    <h5><a href="ec-product-detail.html">Entrée #3</a></h5>
                                    <input type="checkbox" class="radio" value="3" name="entree" /></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card product_item">
                            <div class="body">
                                <div class="cp_img">
                                    <img src="https://archzine.fr/wp-content/uploads/2016/05/feuilles-d-endive-avec-des-noix-fraises-fromage-feta-et-feuilels-de-basilic-idee-de-entre%CC%81e-froide-originale.jpg" alt="Product" class="img-fluid">
                                </div>
                                <div class="product_details">
                                    <h5><a href="ec-product-detail.html">Entrée #4</a></h5>
                                    <input type="checkbox" class="radio" value="4" name="entree" /></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            


                <hr>
                <h3 class="text-center">Liste des Plats</h3>

                <div class="row clearfix">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card product_item">
                            <div class="body">
                                <div class="cp_img">
                                    <img src="https://www.leporc.com/sites/default/files/recettes/plat_mijote_facon_english_breakfast.jpg" alt="Product" class="img-fluid">
                                </div>
                                <div class="product_details">
                                    <h5><a href="ec-product-detail.html">Plat #1</a></h5>
                                    <input type="checkbox" class="radio" value="1" name="plat" /></label>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card product_item">
                            <div class="body">
                                <div class="cp_img">
                                    <img src="https://www.leporc.com/sites/default/files/recettes/plat_mijote_facon_english_breakfast.jpg" alt="Product" class="img-fluid">
                                </div>
                                <div class="product_details">
                                    <h5><a href="ec-product-detail.html">Plat #2</a></h5>
                                    <input type="checkbox" class="radio" value="2" name="plat" /></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card product_item">
                            <div class="body">
                                <div class="cp_img">
                                    <img src="https://www.leporc.com/sites/default/files/recettes/plat_mijote_facon_english_breakfast.jpg" alt="Product" class="img-fluid">
                                </div>
                                <div class="product_details">
                                    <h5><a href="ec-product-detail.html">Plat #3</a></h5>
                                    <input type="checkbox" class="radio" value="3" name="plat" /></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card product_item">
                            <div class="body">
                                <div class="cp_img">
                                    <img src="https://www.leporc.com/sites/default/files/recettes/plat_mijote_facon_english_breakfast.jpg" alt="Product" class="img-fluid">
                                </div>
                                <div class="product_details">
                                    <h5><a href="ec-product-detail.html">Plat #4</a></h5>
                                    <input type="checkbox" class="radio" value="4" name="plat" /></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <h3 class="text-center">Liste des Desserts</h3>

                <div class="row clearfix">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card product_item">
                            <div class="body">
                                <div class="cp_img">
                                    <img src="https://www.finedininglovers.fr/sites/g/files/xknfdk1291/files/styles/recipes_1200_1200_fallback/public/2020-05/ricette_dessert_0.jpg?itok=BcsQRdmo" alt="Product" class="img-fluid">
                                </div>
                                <div class="product_details">
                                    <h5><a href="ec-product-detail.html">Dessert #1</a></h5>
                                    <input type="checkbox" class="radio" value="1" name="dessert" /></label>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card product_item">
                            <div class="body">
                                <div class="cp_img">
                                    <img src="https://www.finedininglovers.fr/sites/g/files/xknfdk1291/files/styles/recipes_1200_1200_fallback/public/2020-05/ricette_dessert_0.jpg?itok=BcsQRdmo" alt="Product" class="img-fluid">
                                </div>
                                <div class="product_details">
                                    <h5><a href="ec-product-detail.html">Dessert #2</a></h5>
                                    <input type="checkbox" class="radio" value="2" name="dessert" /></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card product_item">
                            <div class="body">
                                <div class="cp_img">
                                    <img src="https://www.finedininglovers.fr/sites/g/files/xknfdk1291/files/styles/recipes_1200_1200_fallback/public/2020-05/ricette_dessert_0.jpg?itok=BcsQRdmo" alt="Product" class="img-fluid">
                                </div>
                                <div class="product_details">
                                    <h5><a href="ec-product-detail.html">Dessert #3</a></h5>
                                    <input type="checkbox" class="radio" value="3" name="dessert" /></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card product_item">
                            <div class="body">
                                <div class="cp_img">
                                    <img src="https://www.finedininglovers.fr/sites/g/files/xknfdk1291/files/styles/recipes_1200_1200_fallback/public/2020-05/ricette_dessert_0.jpg?itok=BcsQRdmo" alt="Product" class="img-fluid">
                                </div>
                                <div class="product_details">
                                    <h5><a href="ec-product-detail.html">Dessert #4</a></h5>
                                    <input type="checkbox" class="radio" value="4" name="dessert" /></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <br>
        <section>
              <div class="container">
                <div class="row">
                  <div class="col-sm-12 content justify-content-start" data-aos="fade-left">
                    <form action="./admin_plats.php" enctype="multipart/form-data" method="post">
                      <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="start-date">Date de début</label>
                            <input type="date" id="start" name="start-date" class="form-control" value="2022-03-01" min="2018-01-01" max="2023-01-01" required>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="fin-date">Date de fin</label>
                            <input type="date" id="start" name="fin-date" class="form-control" value="2022-03-01" min="2018-01-01" max="2023-01-01" required>
                          </div>
                      </div>
                      <div class="d-flex justify-content-center">
                        <button class="btn btn-primary" type="submit" name="valid_plat" >Valider</button>
                      </div>
                    </form>
                  </div>
                </div>
        
              </div>
        </section><!-- Fin A Propos Section -->
        
      </div>

      <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50 mt-auto">
        <div class="container text-center">
            <small>Copyright &copy; Restau' GB</small>
        </div>
      </footer>

      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
      <script>
        $("input:checkbox").on('click', function() {
        var $box = $(this);
        if ($box.is(":checked")) {
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            $(group).prop("checked", false);
            $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
        }
        });
    </script>

  
    </body>

  
</html>
