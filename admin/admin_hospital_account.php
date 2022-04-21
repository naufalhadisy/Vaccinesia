
<?php include("page_header.php"); ?>
            <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-5">
                            <br>
                            <br>
                            <h2 class="heading-section">Hospital Account Management</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-wrap">
                            <div class="bg-white p-5 border rounded">	
                                <?php 
                                            
                                            $cons = mysqli_connect('localhost', 'root', '');
                                            mysqli_select_db($cons, 'vaccinesia');
                                            $province = null;

                                            $result = mysqli_query($cons, "select * from hospital");
                                            $num = mysqli_num_rows($result);

                                            if ($num > 0) {
                                            ?>
                                                <h5><?php echo $num; ?> Result</h5><br>
                                                <table class="table table-responsive-xl">
                                                    <thead>
                                                        <tr>
                                                            <th>Hospital Name</th>
                                                            <th>Email</th>
                                                            <th>Hotline</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                            <?php
                                            while($d = mysqli_fetch_array($result)){
                                                ?>  
                                                <tbody>
                                                    <tr>
                                                        <td> <?php echo $d['HospitalName']; ?> </td>
                                                        <td> <?php echo $d['Email']; ?> </td>
                                                        <td> (021) <?php echo $d['Hotline']; ?> </td>      
                                                        <td><a href="admin_hospital_delete_account.php?hospitalid=<?php echo $d["HospitalID"]; ?>" name="delete" type="button" class="btn btn-danger">Delete</a></td>
                                                    </tr>
                                                </tbody>
                                                
                                            <?php 
                                            }
                                            } else {
                                                ?>
                                                    <h5>No Result</h5><br>
                                                <?php
                                            }
                                            ?>
                                    </table>
                                    <a href="admin_hospital_add_account.php" name="add" class="btn btn-success">Add</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

<?php include("page_footer.php"); ?>