<?php
    $id_tempat = $id;
    $query = mysqli_query($config,"SELECT * FROM tb_tempat_menara WHERE id_tempat='$id_tempat'");
    $query2 = mysqli_fetch_array($query); 
?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Keterangan Tolak Menara</h4>
                    </div>
                    <div class="modal-body">
                    <form action="../aksi/admin/aksi_tolak_pengajuan.php" method="POST">

                        <input type="hidden" name="id_tempat" value="<?php echo $query2['id_tempat']?>">
                        <input type="hidden" name="status_tempat" value="<?php echo $query2['status_tempat']?>">
                        <input type="hidden" name="id_form" value="<?php echo $query2['id_form'] ?>">

                        <div class="form-group">
                            <label for="alamat">Alamat :</label>
                            <input type="text" class="form-control" id="alamat" value="<?php echo $query2['alamat'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="comment">Alasan :</label>
                            <textarea class="form-control" rows="5" id="comment" name="keterangan"></textarea>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="simpan btn btn-primary" name="submit" onclick="return confirm('Anda yakin mau menolak lokasi ini ?')">Submit</button>
                        </form>
                    </div>
                     
                </div>
            </div>
        </div>