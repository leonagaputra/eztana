<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Bayar Listrik
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="<?php echo $base_url;?>">Eztana</a>
                            </li>
                            <li class="active">
                                Bayar Listrik
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6" id="content_page">

                        <form role="form" id="listrik_confirm" method="post" action="<?php echo $base_url?>index.php/listrik/confirm">                            

                            <div class="form-group">
                                <label>Biaya Listrik (+10.000 biaya administrasi)</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="listrik_bill" id="listrik_bill1" value="50000" checked>Rp 50.000
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="listrik_bill" id="listrik_bill2" value="100000">Rp 100.000
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="listrik_bill" id="listrik_bill3" value="150000">Rp 150.000
                                    </label>
                                </div>
                            </div>                            

                            <button type="submit" class="btn btn-default" >Pembayaran</button>
                            
                        </form>

                    </div>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->