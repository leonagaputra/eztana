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

                        <form role="form" id="listrik_confirm" method="post" action="<?php echo $base_url?>index.php/listrik/last">                                                                                       
                            <input class="form-control" type="hidden" name="listrik_bill" style="text-align: right" value="<?php echo $listrik_bill;?>">
                            <div class="form-group">
                                <label>Total Biaya </label> 
                                <input class="form-control" type="input" name="total_bill" style="text-align: right" disabled="" value="<?php echo ($admin_bill + $listrik_bill);?>">
                            </div>                           
                            
                            <div class="jumbotron">                                
                                <p>Transfer ke Rek BCA
                                    <br/>
                                    <table class="table">
                                        <tr>
                                            <td>No. Rek BCA</td>      
                                            <td>:</td> 
                                            <td>xxxx</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pemilik Rek BCA</td>   
                                            <td>:</td> 
                                            <td>yyyy</td>
                                        </tr>
                                    </table>                               
                                </p>                                
                            </div>
                            <div class="form-group">
                                <label>No. Rek BCA Pengirim </label> 
                                <input class="form-control" type="input" name="no_rek" >
                            </div>
                            <div class="form-group">
                                <label>Nama Pemilik Rek BCA </label> 
                                <input class="form-control" type="input" name="nama_rek" >
                            </div>
                            <div class="alert alert-warning">
                                <p>Silahkan transfer sesuai dengan total biaya dari nomor rekening Anda ke nomor rekening yang tertera di atas.  Proses pembayaran yang dilakukan <b>sebelum jam 12 siang akan diproses pada hari yang sama, selebihnya akan diproses hari esok</b> (sesuai jam kerja kantor administrasi apartemen).</p>
                            </div>
                            
                            <button type="submit" class="btn btn-default" >Pembayaran Selesai</button>
                            
                        </form>

                    </div>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->