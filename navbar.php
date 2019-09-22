<?php
function get_navbar($active_index)
{
    $links = array(
        array("label" => "Therapist Login", "href" => "login.php"),
        array("label" => "Contact Us", "href" => "contact.php"),
        array("label" => "Cancel Appoinment", "href" => "cancellation.php"),
        array("label" => "Make Appointment", "href" => "appointment.php"),
        array("label" => "About Me", "href" => "about.php"),
        array("label" => "Home", "href" => "home.php"),


    );
    ?>
    <div class="topnav">

        <?php
            $i = 0;
            foreach ($links as $item) {
                ?>
            <a class=<?php if ($i == $active_index) {
                                    echo "active";
                                } else {
                                    echo "inactive";
                                } ?> href=<?php echo $item["href"] ?>><?php echo $item["label"] ?></a>
        <?php
                $i++;
            }
            ?>
    </div>
    <style>
        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: right;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #4CAF50;
            color: white;
        }
    </style>
<?php
}
