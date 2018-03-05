<!-- include the header of the document -->
<?php include "includes/header.inc.php"; ?>

<!-- the carousel -->
<section class="row intro-row">
    <section class="col-md-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="assets/img/carousholder1.png" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="assets/img/carousholder01.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="assets/img/carousholder2.png" alt="Third slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="assets/img/carousholder8.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="assets/img/carousholder4.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="assets/img/carousholder0.png" alt="Third slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="assets/img/carousholder9.png" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
</section>



<section class="container-fluid">
    <section class="row recently-added-row">
        <!-- display recently added items for desktop -->
        <section class="col-md-12 col-sm-12">
            <h5 class="text-center item-title">Recently Added</h5><br/>
            <section class="row recent-items-lg-div"></section>
            <p class="text-center"><a onclick="viewMoreItems()" class="custom-text-color" style="cursor:pointer"><small>View More</small> <i class="fa fa-chevron-right"></i></a></p>
        </section>
    </section>
</section>

<!-- how it works row -->

<section class="container-fluid process-div">
    <h5 class="text-center item-title">How It Works</h5><br/>

    <p class="text-center"><strong><small>Buying</small></strong></p>
    <section class="container process-row">
        <section class="process-item">
            <section class="process-item-icon-div">
                <h1 class="text-center process-item-icon"><i class="fa fa-search"></i></h1>
            </section>
            <h5 class="text-center process-item-title"> Search Item</h5>
            <p class="text-center process-item-sub-title hide-on-med-and-down">Search Items Posted By Verified Users</p>
        </section>

        <section class="process-item">
            <section class="process-item-icon-div">
                <h1 class="text-center process-item-icon"><i class="fa fa-phone"></i></h1>
            </section>
            <h5 class="text-center process-item-title"> Contact Seller</h5>
            <p class="text-center process-item-sub-title hide-on-med-and-down">Call Or Send The Seller A Message</p>
        </section>

        <section class="process-item">
            <section class="process-item-icon-div">
                <h1 class="text-center process-item-icon"><i class="fa fa-handshake-o"></i></h1>
            </section>
            <h5 class="text-center process-item-title"> Close Deal</h5>
            <p class="text-center process-item-sub-title hide-on-med-and-down">Close The Deal With The Seller In Person</p>
        </section>
    </section>

    <p class="text-center"><strong><small>Selling</small></strong></p>
    <section class="container process-row">
        <section class="process-item">
            <section class="process-item-icon-div">
                <h1 class="text-center process-item-icon"><i class="fa fa-paper-plane"></i></h1>
            </section>
            <h5 class="text-center process-item-title"> Post Item</h5>
            <p class="text-center process-item-sub-title hide-on-med-and-down">Post Item For Millions Of People To See</p>
        </section>

        <section class="process-item">
            <section class="process-item-icon-div">
                <h1 class="text-center process-item-icon"><i class="fa fa-mobile"></i></h1>
            </section>
            <h5 class="text-center process-item-title"> Receive Clent's Call</h5>
            <p class="text-center process-item-sub-title hide-on-med-and-down">Receive Call From People Interested In Your Item</p>
        </section>

        <section class="process-item">
            <section class="process-item-icon-div">
                <h1 class="text-center process-item-icon"><i class="fa fa-handshake-o"></i></h1>
            </section>
            <h5 class="text-center process-item-title"> Close Deal</h5>
            <p class="text-center process-item-sub-title hide-on-med-and-down">Close The Deal With The Buyer In Person</p>
        </section>
    </section>
      <!--

        <section class="row">
          <h6 class="text-center item-title">Selling</h6><br/>
          <section class="buyingAndSelling">
            <section class="col s12 m4 l4">
                <section class="process-item">
                  <section class="icon-round">
                    <h1 class="text-center process-item-icon"><i class="fa fa-paper-plane"></i></h1>
                  </section>
                    <h5 class="text-center process-item-title"> Post Item</h5>
                    <p class="text-center process-item-sub-title hide-on-med-and-down">Post Item For Millions Of People To See</p>
                </section>
            </section>

            <section class="col s12 m4 l4">
                <section class="process-item">
                  <section class="icon-round">
                    <h1 class="text-center process-item-icon"><i class="fa fa-mobile"></i></h1>
                  </section>
                    <h5 class="text-center process-item-title"> Receive Client Call</h5>
                    <p class="text-center process-item-sub-title hide-on-med-and-down">Receive Call From People Interested In Your Item</p>
                </section>
            </section>

            <section class="col s12 m4 l4">
                <section class="process-item">
                  <section class="icon-round">
                    <h1 class="text-center process-item-icon"><i class="fa fa-handshake-o"></i></h1>
                  </section>
                    <h5 class="text-center process-item-title"> Close Deal</h5>
                    <p class="text-center process-item-sub-title hide-on-med-and-down">Close The Deal With The Buyer In Person</p>
                </section>
            </section>
          </section>
        </section> -->
</section>

<!-- display Category items for desktop -->
<section class="col-md-12 col-xs-12 col-sm-12">
    <h5 class="item-title text-center">Why StudentHub?</h5><br/>
    <section class="reasons-div">
        <section class="reason-div">
            <section class="reason-icon-div bg-info">
                <h1 class="text-center reason-icon"><i class="fa fa-lock"></i></h1>
            </section>
            <p class="text-center process-item-title">Secure</p>
        </section>

        <section class="reason-div">
            <section class="reason-icon-div bg-warning">
                <h1 class="text-center reason-icon"><i class="fa fa-calendar"></i></h1>
            </section>
            <p class="text-center process-item-title">Daily Deals</p>
        </section>

        <section class="reason-div">
            <section class="reason-icon-div bg-danger">
                <h1 class="text-center reason-icon">&#8358;</h1>
            </section>
            <p class="text-center process-item-title">Rewards</p>
        </section>

        <section class="reason-div">
            <section class="reason-icon-div bg-primary">
                <h1 class="text-center reason-icon"><i class="fa fa-balance-scale"></i></h1>
            </section>
            <p class="text-center process-item-title">Price Match</p>
        </section>

        <section class="reason-div">
            <section class="reason-icon-div bg-success">
                <h1 class="text-center reason-icon"><i class="fa fa-angellist"></i></h1>
            </section>
            <p class="text-center process-item-title">Super Friendly</p>
        </section>
    </section>

</section><br>

<br/><br/><br/>


<!-- reviews row -->
<!-- <section class="row reviews-row">
    <h5 class="text-center item-title">Reviews From Happy Clients</h5><br/>
    <section class="row">

        <section class="col s12 m4 l4">
            <section class="review-item">
                <img src="assets/img/profile-placeholder.jpg" class="review-item-img"><br/>

                <p class="text-center review-item-name">Person Name<br/>
                    <span class="review-item-position" style="color:rgba(227, 240, 10, 0.9)">
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </span>
                </p>
                <p class="text-center review-item-quote">
                    <span class="review-quote-sign"><i class="fa fa-quote-left"></i></span>
                    <span>Lorem Ipsum sit amet lorem ipsum Lorem Ipsum sit amet lorem ipsum Lorem Ipsum sit amet. lorem ipsum Lorem Ipsum sit amet lorem ipsum Lorem Ipsum sit amet lorem ipsum. Lorem Ipsum sit amet lorem ipsum Lorem Ipsum sit amet lorem ipsum</span>
                    <span class="review-quote-sign"><i class="fa fa-quote-right"></i></span>
                </p>
            </section>
        </section>

        <section class="col s12 m4 l4">
            <section class="review-item">
                <img src="assets/img/profile-placeholder.jpg" class="review-item-img"><br/>

                <p class="text-center review-item-name">Person Name<br/>
                    <span class="review-item-position">
                      <i class="fa fa-star" aria-hidden="true" style="color:rgba(227, 240, 10, 0.9)"></i>
                      <i class="fa fa-star" aria-hidden="true" style="color:rgba(227, 240, 10, 0.9)"></i>
                      <i class="fa fa-star" aria-hidden="true" style="color:rgba(227, 240, 10, 0.9)"></i>
                      <i class="fa fa-star" aria-hidden="true" style="color:rgba(227, 240, 10, 0.9)"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </span>
                </p>
                <p class="text-center review-item-quote">
                    <span class="review-quote-sign"><i class="fa fa-quote-left"></i></span>
                    <span>Lorem Ipsum sit amet lorem ipsum Lorem Ipsum sit amet lorem ipsum Lorem Ipsum sit amet. lorem ipsum Lorem Ipsum sit amet lorem ipsum Lorem Ipsum sit amet lorem ipsum. Lorem Ipsum sit amet lorem ipsum Lorem Ipsum sit amet lorem ipsum</span>
                    <span class="review-quote-sign"><i class="fa fa-quote-right"></i></span>
                </p>
            </section>
        </section>

        <section class="col s12 m4 l4">
            <section class="review-item">
                <img src="assets/img/profile-placeholder.jpg" class="review-item-img"><br/>

                <p class="text-center review-item-name">Person Name<br/>
                    <span class="review-item-position" style="color:rgba(227, 240, 10, 0.9)">
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </span>
                </p>
                <p class="text-center review-item-quote">
                    <span class="review-quote-sign"><i class="fa fa-quote-left"></i></span>
                    <span>Lorem Ipsum sit amet lorem ipsum Lorem Ipsum sit amet lorem ipsum Lorem Ipsum sit amet. lorem ipsum Lorem Ipsum sit amet lorem ipsum Lorem Ipsum sit amet lorem ipsum. Lorem Ipsum sit amet lorem ipsum Lorem Ipsum sit amet lorem ipsum</span>
                    <span class="review-quote-sign"><i class="fa fa-quote-right"></i></span>
                </p>
            </section>
        </section>

    </section>
</section> -->


<!-- include the footer of the document -->
<?php include "includes/index-footer.inc.php"; ?>
<script>
    function navigateSearchCategories(categoryObj) {
        localStorage.setItem('categoryName',categoryObj.categoryName);
        localStorage.setItem('categoryId',categoryObj.categoryId);
        window.location.href = "search";
    }

    function viewMoreItems() {
        localStorage.setItem('categoryName','all');
        localStorage.setItem('categoryId',0);
        window.location.href = "search";
    }
</script>
