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
        <!-- Home page begins -->
        <div data-role="page" id="home">
            <div data-role="popup" id="eventregister" data-overlay-theme="b" data-theme="b" data-dismissible="false">
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
                <a href="#eventregister" data-position-to="window" data-transition="pop" class="ui-btn-right ui-btn-b ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-icon-calendar show-page-loading-msg" data-textonly="false" data-textvisible="true" data-msgtext="" data-inline="true">Events</a>
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
                <p>Welcome to the website for Anytown Civic Center. We have a lot of great upcoming events for you to check out.</p>
                <p>If you wish to make reservations to avail a facility at the Civic Center, please fill out the <a href="#contact">contact form</a>, and we will reach you!</p>
            </div><!-- /content -->

            <div data-role="footer">
                <h2>
                    <a href="#contactpanel" data-rel="panel" class="ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-b ui-btn-icon-left ui-icon-phone">Contact Us</a>
                </h2>
            </div>
        </div><!-- /page -->
        <!-- Home page ends -->

        <!-- About page begins -->
        <div data-role="page" id="about">
            <div data-role="popup" id="eventregister2" data-overlay-theme="b" data-theme="b" data-dismissible="false">
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
                <a href="#eventregister2" data-rel="popup" data-position-to="window" data-transition="pop" class="ui-btn-right ui-btn-b ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-icon-calendar">Events</a>
                <div data-role="navbar">
                    <ul>
                        <li><a href="#about">About Us</a></li>
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
                <p>Founded in 2014, Anytown Civic Center plans to be the premier venue for the hottest concerts, the greatest sports events, the best conferences and the most extravagant weddings.</p>
            </div><!-- /content -->

            <div data-role="footer">
                <h2>
                    <a href="#contactpanel" data-rel="panel" class="ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-b ui-btn-icon-left ui-icon-phone">Contact Us</a>
                </h2>
            </div>
        </div><!-- /page -->
        <!-- About page ends -->

        <!-- Facilities page beigns-->
        <div data-role="page" id="facilities">
            <div data-role="popup" id="eventregister3" data-overlay-theme="b" data-theme="b" data-dismissible="false">
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
                <a href="#eventregister3" data-rel="popup" data-position-to="window" data-transition="pop" class="ui-btn-right ui-btn-b ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-icon-calendar">Events</a>
                <div data-role="navbar">
                    <ul>
                        <li><a href="#about">About Us</a></li>
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
                <p>At Anytown Civic Center we have the following facilities at your disposal:<br />
                    <!--<ul>
                        <li>3 Banquet Halls</li>
                        <li>1 Sports Arena</li>
                        <li>25 Conference Rooms of various sizes</li>
                        <li>2 Ballrooms</li>
                    </ul>-->
                    <div data-role="collapsibleset">
                        <div data-role="collapsible">
                            <h3>Banquet Halls</h3>
                            <p>
                                <span>
                                    We have 3 huge banquet halls named after 3 most celebrated Chef's from across the world.
                                </span>
                                <ul data-role="listview" data-inset="true">
                                    <li>
                                        <a href="#">Gordon Ramsay</a>
                                    </li>
                                    <li>
                                        <a href="#">Anthony Bourdain</a>
                                    </li>
                                    <li>
                                        <a href="#">Sanjeev Kapoor</a>
                                    </li>
                                </ul>
                            </p>

                        </div>
                        <div data-role="collapsible">
                            <h3>Sports Arena</h3>
                            <p>
                                <span>
                                    We have 3 huge sport arenas named after 3 most celebrated sport personalities from across the world.
                                </span>
                                <ul data-role="listview" data-inset="true">
                                    <li>
                                        <a href="#">Sachin Tendulkar</a>
                                    </li>
                                    <li>
                                        <a href="#">Roger Federer</a>
                                    </li>
                                    <li>
                                        <a href="#">Usain Bolt</a>
                                    </li>
                                </ul>
                            </p>
                        </div>
                        <div data-role="collapsible">
                            <h3>Conference Rooms</h3>
                            <p>
                                <span>
                                    We have 3 huge conference rooms named after 3 largest technology companies.
                                </span>
                                <ul data-role="listview" data-inset="true">
                                    <li>
                                        <a href="#">Google</a>
                                    </li>
                                    <li>
                                        <a href="#">Twitter</a>
                                    </li>
                                    <li>
                                        <a href="#">Facebook</a>
                                    </li>
                                </ul>
                            </p>
                        </div>
                        <div data-role="collapsible">
                            <h3>Ballrooms</h3>
                            <p>
                                <span>
                                    We have 3 huge ball rooms named after 3 different dance styles from across the world.
                                </span>
                                <ul data-role="listview" data-inset="true">
                                    <li>
                                        <a href="#">Ballet</a>
                                    </li>
                                    <li>
                                        <a href="#">Kathak</a>
                                    </li>
                                    <li>
                                        <a href="#">Paso Doble</a>
                                    </li>
                                </ul>
                            </p>
                        </div>
                    </div>
                    Contact us for pricing and availability.
                </p>
            </div><!-- /content -->

            <div data-role="footer">
                <h2>
                    <a href="#contactpanel" data-rel="panel" class="ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-b ui-btn-icon-left ui-icon-phone">Contact Us</a>
                </h2>
            </div>
        </div><!-- /page -->
        <!-- Facilities page ends -->

        <!-- Catering page begins -->
        <div data-role="page" id="catering">
            <div data-role="popup" id="eventregister4" data-overlay-theme="b" data-theme="b" data-dismissible="false">
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
                <a href="#eventregister4" data-rel="popup" data-position-to="window" data-transition="pop" class="ui-btn-right ui-btn-b ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-icon-calendar">Events</a>
                <div data-role="navbar">
                    <ul>
                        <li><a href="#about">About Us</a></li>
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
                    We offer a full catering service for your events. Our three star Michelin Chef and his staff can tackle almost any cuisine you may need for your guests.<br />Contact us for a full menu and prices or you can use the simple tool below for an estimate on the prices.
                </p>
                <form>
                    <label style="font-weight: bold; padding: 15px 0px;" for="slider">Number of guests</label>
                    <input type="range" name="slider" id="slider" data-highlight="true" min="50" max="1000" value="50">
                    <fieldset data-role="controlgroup" id="cuisine-choices">
                        <legend style="font-weight: bold; padding: 15px 0px;">Choose your cuisine</legend>
                        <input type="radio" name="cuisine-choice" id="cuisine-choice-cont" value="15" checked="checked" />
                        <label for="cuisine-choice-cont">Continental</label>
                        <input type="radio" name="cuisine-choice" id="cuisine-choice-mex" value="12" />
                        <label for="cuisine-choice-mex">Mexican</label>
                        <input type="radio" name="cuisine-choice" id="cuisine-choice-ind" value="14" />
                        <label for="cuisine-choice-ind">Indian</label>
                    </fieldset>
                    <p>
                        The approximate cost will be: <span style="font-weight: bold;" id="totalCost"></span>
                    </p>
                </form>
            </div><!-- /content -->

            <div data-role="footer">
                <h2>
                    <a href="#contactpanel" data-rel="panel" class="ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-b ui-btn-icon-left ui-icon-phone">Contact Us</a>
                </h2>
            </div>
        </div><!-- /page -->
        <!-- Catering page ends -->

        <!-- Contact page begins -->
        <div data-role="page" id="contact">
            <div data-role="popup" id="eventregister6" data-overlay-theme="b" data-theme="b" data-dismissible="false">
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
                <a href="#eventregister6" data-position-to="window" data-transition="pop" class="ui-btn-right ui-btn-b ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-icon-calendar show-page-loading-msg" data-textonly="false" data-textvisible="true" data-msgtext="" data-inline="true">Events</a>
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
            <form class="user" novalidate action="form.php" method="post" data-ajax="false">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="" required maxlength="20" />
                <div class="error" style="color: red; font-size: 13px;"></div>
                <label for="email">Email Id:</label>
                <input type="email" name="email" id="email" value="" required />
                <div class="error" style="color: red; font-size: 13px;"></div>
                <label for="contact">Contact Number:</label>
                <input type="number" name="contact" id="contact" value="" required />
                <div class="error" style="color: red; font-size: 13px;"></div>
                <label for="facility">Select a facility:</label>
                <select name="facility" id="facility" value="" required>
                    <optgroup label="Banquet Halls">
                        <option value="GR">Gordan Ramsay</option>
                        <option value="AB">Anthony Bourdain</option>
                        <option value="SK">Sanjeev Kapoor</option>
                    </optgroup>
                    <optgroup label="Sports Arena">
                        <option value="ST">Sachin Tendulkar</option>
                        <option value="RF">Rager Federrer</option>
                        <option value="UB">Usain Bolt</option>
                    </optgroup>
                    <optgroup label="Conference Rooms">
                        <option value="G">Google</option>
                        <option value="T">Twitter</option>
                        <option value="F">Facebook</option>
                    </optgroup>
                    <optgroup label="Ball Rooms">
                        <option value="B">Ballet</option>
                        <option value="PD">Paso Doble</option>
                        <option value="K">Kathak</option>
                    </optgroup>
                </select>
                <input type="submit" value="Submit" />
            </form>
            </div><!-- /content -->

            <div data-role="footer">
                <h2>
                    <a href="#contactpanel" data-rel="panel" class="ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-b ui-btn-icon-left ui-icon-phone">Contact Us</a>
                </h2>
            </div>
        </div><!-- /page -->
        <!-- Contact page ends -->
        <script>
            $('body').bind("swipeleft swiperight",function(event)
            {
                var curPage = $.mobile.activePage[0];
                var direction = event.type;
                if(curPage.id == "home" && direction == "swipeleft")
                    $.mobile.changePage("#about");
                if(curPage.id == "about" && direction == "swiperight")
                    $.mobile.changePage("#home");
            });
            $(document).on('pagecontainershow', function(){
                var guests = 50;
                var cost = 35;
                var totalCost;
                $("#slider").on("slidestop", function(event, ui){
                    guests = $('#slider').val();
                    totalCost = costCal();
                    $("#totalCost").text("$" + totalCost);
                });
                $("input:radio[name=cuisine-choice]").on("click", function() {
                    cost = $(this).val();
                    var totalCost = costCal();
                    $("#totalCost").text("$" + totalCost);
                });
                function costCal(){
                    return guests * cost;
                }

                /*Form validation script begins*/

                $("input").on('focus', function(){
                    $(this).parent().next().text("");
                    $(this).css('border-color', 'none');
                });

                $("input").on('blur', function(){
                    var field_val = $(this).val();
                    if(field_val === ""){
                        $(this).parent().next().text("This field is mandatory.");
                        $(this).css('border-color', 'red');
                    }
                });

                $("input[type='text']").on('blur', function(){
                    if($(this).val().match(/^[a-zA-Z]{1,20}$/) === null){
                        $(this).parent().next().text("Name can only have alphabets and maximum limit is 20 characters.");
                        $(this).css('border-color', 'red');
                    }
                });

                $("input[type='email']").on('blur', function(){
                    if($(this).val().match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/) === null){
                        $(this).parent().next().text("Entered email is invalid.");
                        $(this).css('border-color', 'red');
                    }
                });

                $("input[type='number']").on('blur', function(){
                    if($(this).val().match(/^[0-9]{10,10}$/) === null){
                        $(this).parent().next().text("Contact number can only be numeric and should have 10 digits.");
                        $(this).css('border-color', 'red');
                    }
                });

                $("input[type='submit']").on('click', function(event){
                    if($(".error").text() !== "" || $('.user input').val() === ""){
                        alert("Make sure all fields are complete with no errors.");
                        event.preventDefault();
                        return false;
                    }
                });
                /* Form validation script ends */
            });
        </script>
    </body>
</html>