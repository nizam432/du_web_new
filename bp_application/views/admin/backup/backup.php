<div class="col-sm-12">
    <div class="box box-primary" >
        <div class="box-header ">
            <h3 class="box-title">Backup DB Table</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">      
            <form action="<?php echo base_url()?>backend_database_backup/backup_table" method="post">
                <input type="hidden" name="backup_type" id="backup_type" value="">
                <div class="form-group">
                    <label class="col-sm-2 form-label">Database table</label>
                    <div class="col-sm-4">
                        <select name="table_name"  class="form-control">
                            <option value="">Please select</option>
                            <?php foreach($table_list as $value):?>
                            <option value="<?php echo $value; ?>"><?php echo $value; ?></option>	
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" value="1" onmouseover="backuptype(this.value)" class="btn btn-primary" name="submit"> <span class="fa fa-download"></span> &nbsp; Download DB Table</button>
                        &nbsp;&nbsp;&nbsp; <button type="submit" value="2" onmouseover="backuptype(this.value)"  class="btn btn-success" > <span class="fa fa-download"></span> &nbsp; Download Full DB</button>
                    </div><br><br>                 
                </div>

            </form> 
        </div>
    </div>
</div>

<script>
    function backuptype(val)
    {
        $('#backup_type').val(val);
    }
</script>