<!DOCTYPE html>
<html>
	<head>
        <title>Anytown Civic Center</title>
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scrolable=no">
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script>
            $(document).on("click", ".show-page-loading-msg", function() {
                var $this = $(this),
                    theme = $this.jqmData("theme") || $.mobile.loader.prototype.options.theme,
                    msgText = "Loading Events",
                    textVisible = $this.jqmData("textvisible") || $.mobile.loader.prototype.options.textVisible,
                    textonly = !!$this.jqmData("textonly"),
                    html = $this.jqmData("html") || "";
                $.mobile.loading("show", {
                    text: msgText,
                    textVisible: textVisible,
                    theme: theme,
                    textonly: textonly,
                    html: html
                });
                setTimeout(function() {
                    $.mobile.loading("hide");
                    $("#eventregister").popup("open");
                }, 1000);
            });
        </script>
    </head>
	<body>
		<?php
			include 'db.php';
		?>
		<div data-role="page" id="event">
	        <div data-role="popup" id="eventregister5" data-overlay-theme="b" data-theme="b" data-dismissible="false">
	            <div data-role="header" data-theme="a">
	                <h1>Current Events</h1>
	            </div>
	            <div role="main" class="ui-content">
	                <ul data-role="listview" data-inset="true" data-theme="a">
	                    <?php
	                        // Check connection
	                        if (!$conn) {
	                            die("Connection failed: " . mysqli_connect_error());
	                        }
	                        $sql = "SELECT Event_ID, Event_Name FROM Events_Catalog";
	                        $result = mysqli_query($conn, $sql);

	                        if (mysqli_num_rows($result) > 0) {
	                            // output data of each row
	                            while($row = mysqli_fetch_assoc($result)) {
	                                $Event_ID = $row['Event_ID'];
	                                echo "<li><a href='event.php?id=$Event_ID'>" . $row["Event_Name"] . "</a></li>";
	                            }
	                        }
	                        else {
	                            echo "<h3 class='ui-title'>Sorry, currently there are no scheduled events.</h3>";
	                        }
	                    ?>
	                </ul>
	                <a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">Close</a>
	            </div>
	        </div>

	        <div data-role="header">
	            <a href="#home" class="ui-btn-left ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-b ui-btn-icon-left ui-icon-home">Home</a>
	            <h1>Welcome to Anytown Civic Center!</h1>
	            <a href="#eventregister5" data-position-to="window" data-transition="pop" class="ui-btn-right ui-btn-b ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-icon-calendar show-page-loading-msg" data-textonly="false" data-textvisible="true" data-msgtext="" data-inline="true">Events</a>
	            <div data-role="navbar">
	                <ul>
	                    <li><a href="#about" data-transition="flip">About Us</a></li>
	                    <li><a href="#facilities" data-ajax="false">Facilities</a></li>
	                    <li><a href="#catering">Catering</a></li>
	                </ul>
	            </div><!-- /navbar -->
	        </div><!-- /header -->

	        <div data-role="panel" id="contactpanel" data-display="push" data-dismissible="true" data-theme="a">
	            <div>
	                <p>Contact Us!</p>
	                <a href="tel:555-555-5555">(555)555-5555</a>
	                <p>1234 First Avenue</p>
	                <p>Anytown, Anystate 12345</p>
	                <a href="mailto:contact@anytownciviccenter.com">contact@anytownciviccenter.com</a>
	            </div>
	        </div><!-- /panel -->

	        <div class="ui-content" role="main">
	            <p>
					<?php
					    // Check connection
					    if (!$conn) {
					        die("Connection failed: " . mysqli_connect_error());
					    }
					    $event_id = $_GET['id'];
					    $sql = "SELECT Event_Name, Event_Description, Event_Loc_Facilities, Event_Organizer_Name FROM Events_Catalog WHERE Event_ID=$event_id";

					    $result = mysqli_query($conn, $sql);

					    if (mysqli_num_rows($result) > 0) {
					        // output data of this row
					        $row = mysqli_fetch_assoc($result);
				            echo "<b>Event: </b><br />" . $row['Event_Name'] . "<br /><br />" .
				            	 "<b>Organized By: </b><br />" . $row['Event_Organizer_Name'] . "<br /><br />" .
				            	 "<b>Event Location: </b><br />" . $row['Event_Loc_Facilities'] . "<br /><br />" .
				            	 "<b>Brief Description: </b><br />" . $row['Event_Description'];
					    }
					    else {
					        echo "<h3 class='ui-title'>Sorry, event details are unavailable.</h3>";
					    }
					    mysqli_close($conn);
					?>
	            </p>
	        </div><!-- /content -->

	        <div data-role="footer">
	            <h2>
	                <a href="#contactpanel" data-rel="panel" class="ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-b ui-btn-icon-left ui-icon-phone">Contact Us</a>
	            </h2>
	        </div>
	    </div><!-- /page -->
	    <!-- Home page ends -->
	</body>
</html>