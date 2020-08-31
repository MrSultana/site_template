    <?php include("topbit.php"); 
        $find_sql = "SELECT * FROM `game_details` 
        JOIN genre ON (game_details.GenreID = genre.GenreID)
        JOIN developer ON (game_details.DeveloperID = developer.DeveloperID)";
        $find_query = mysqli_query($dbconnect, $find_sql);
        $find_rs = mysqli_fetch_assoc($find_query);
        $count = mysqli_num_rows($find_query);
    ?>
			
			<div class="box main">
				<h2>All Results</h2>
				
				<?php
                    if($count < 1) {

                        ?>

                        <div class="error">
                            Sorry! There are no results that match your search.
                            Please use the search box in the side bar to try again.
                        </div> <!-- and error -->
                
                <?php
                    } else {
                        do {
                            ?>

                            <!-- Results go here -->
                            <div class="results">

                            <!-- Heading and Subtitle -->
                            <div class="flex-container">
                                <div>
                                    <span class="sub_heading">
                                        <a href="<?php echo $find_rs['URL']?>">
                                            <?php echo $find_rs['Name']; ?>
                                        </a>
                                </div> <!-- Title -->

                                <?php
                                    if($find_rs["Subtitle"] != "") {
                                        ?>
                                        <div>
                                            &nbsp; &nbsp; | &nbsp; &nbsp;
                                            <?php echo $find_rs["Subtitle"]?>
                                        </div>
                                        <?php

                                        
                                    }
                                ?>
                            </div>

                            <!-- /Heading and Subtitle -->

                                <br />

                                <p>
                                    <b>Genre</b>:
                                    <?php echo $find_rs["Genre"]?>

                                    <br />

                                    <b>Developer</b>:
                                    <?php echo $find_rs["Developer"]?>

                                    <br />

                                    <b>Rating</b>:
                                    <?php echo $find_rs["User Rating"]?> (based on <?php echo $find_rs["Rating Count"]?> votes)

                                </p>

                                <hr />
                                <?php echo $find_rs["Description"]?>
                            </div>

                            <br />

                        <?php

                        } // end results 'do'

                        while($find_rs=mysqli_fetch_assoc($find_query));
                    
                    }

                ?>
			</div> <!-- / main -->
			
	<?php include("bottombit.php") ?>