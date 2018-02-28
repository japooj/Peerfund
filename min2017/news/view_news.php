<?php
  $sql = "SELECT * FROM tbl_news";
  $result = dbQuery($sql);

?>
      <div class="row">
                    <div class="col-md-12">
          <!-- MAP & BOX PANE -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">All News</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Body</th>
                   <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  while ($row = dbFetchAssoc($result)) {
                  extract($row);
                ?>
                <tr>
                  <td><?php echo $title ?></td>
                  <td><?php echo $description?></td>
                  <td><?php echo $date;?></td>
 
                </tr>
                <?php
                }
                ?>
              </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->