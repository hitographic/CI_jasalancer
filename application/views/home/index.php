 <!-- jumbotron -->
 <div class="jumbotron jumbotron-fluid jumboheader">
     <div class="container">
         <h1 class="display-4">Temukan <span style="color:#FFC857;" class="typewrite" data-period="2000"
                 data-type='[ "Jodo . . .", "Freelancer", "Jasa"]'>

                 <span class="wrap"></span>
             </span><br> terbaikmu di sini
         </h1>
         <div class="row justify-content-center pt-3">
             <div class="col-6">
                 <form action="<?= base_url('cariFreelancer')?>" method="post">
                     <div class="input-group mb-3 ">
                         <input type="text" class="form-control" placeholder="Cari Freelancer. . ." name="keyword"
                             autocomplete="off" autofocus>
                         <div class="input-group-append">
                             <input class="btn btn-warning" type="submit" name="submit" value="cari">
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 </div>

 <!-- akhir jumbotron -->