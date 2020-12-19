
<?php include 'classes/Admin.php';?>
<?php

    // $client = new Admin();
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //    $insertClient = $client->clientInsert($_POST);
    // }
print_r ($_POST);
//     $services[] = $_POST['services'];
//     if(empty($services)) 
//     {
//         echo("You didn't select any buildings.");
//     } 
//     else 
//     {
//         $N = count($services);

//         echo("You selected $N door(s): ");
//         for($i=0; $i < $N; $i++)
//         {
//         echo($services[$i] . " ");
//         }
//     }
// ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css" integrity="sha512-kJ30H6g4NGhWopgdseRb8wTsyllFUYIx3hiUwmGAkgA9B/JbzUBDQVr2VVlWGde6sdBVOG7oU8AL35ORDuMm8g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section id="section-a" class="bg-dark">
        <div class="container font-light">
            <div class="row">
                <h1 class="heading">Add New Cradentials</h1>
                <hr>
            </div>
        </div>
    </section>
    <section id="section-b">
        <div class="container py-4">
            <form id="form" action="" method="post">
                <!-- Customer Cradentials -->
                <div class="input-field-group">
                    <div class="input-field">
                        <label for="name"></label>
                        <input type="text" name="name" placeholder="Enter customer name as writen in Passport">
                    </div>
                    <div class="input-field">
                        <label for="email"></label>
                        <input type="text" name="email" placeholder="Customer Email">
                    </div>
                    <div class="input-field">
                        <label for="phone"></label>
                        <input type="text" name="phone" placeholder="Customer Phone Number">
                    </div>
                    <div class="input-field">
                        <label for="date"></label>
                        <input type="text" name="date" placeholder="Enter the date of issue (E.G: dd/mm/yyyy)">
                    </div>
                    <div class="input-field">
                        <label for="assisted_by"></label>
                        <input type="text" name="assisted_by" placeholder="Person who give this client">
                    </div>
                    <div class="input-field">
                        <label for="payment"></label>
                        <input type="text" name="payment" placeholder="Amount of payment">
                    </div>
                    <div class="input-field">
                        <h2>Mention Paid Or Not</h2>
                        <input type="radio" name="paid" id="paymentPaid">
                        <label for="paymentPaid">Paid</label>
                        <div class="mr-2"></div>
                        <input type="radio" name="NotPaid" id="paymentNotPaid">
                        <label for="paymentNotPaid">Not Paid</label>
                    </div>
                    <div class="input-field">
                        <h2>Application Status:</h2>
                        <input type="radio" name="recieved" id="recievedApplication">
                        <label for="recievedApplication">Recieved</label>
                        <div class="mr-2"></div>
                        <input type="radio" name="Processing" id="processingApplication">
                        <label for="processingApplication">Processing</label>
                        <div class="mr-2"></div>
                        <input type="radio" name="CompletedApplication" id="CompletedApplication">
                        <label for="CompletedApplication">Completed</label>
                    </div>
                    <div class="input-field">
                        <h2>Upload Files</h2>
                        <input type="file" value="" >
                    </div>
                </div>
                <!-- List Of All Services -->
                <div class="input-field checkbox">
                    <h2>Services Include :</h2>
                    <div class="checkboxes">
                        <div class="checkbox-group">
                            <input type="checkbox" id="services1" name="services[]" value="Full Package1">
                            <label for="services1">Full Package</label>
                        </div> 
                        <div class="checkbox-group">
                            <input type="checkbox" id="services2" name="services[]" value="Finance">
                            <label for="services2">Finance</label> 
                        </div> 
                        <div class="checkbox-group">
                            <input type="checkbox" id="services3" name="services[]" value="Social">
                            <label for="services3">Social</label>
                        </div> 
                        
                        <div class="checkbox-group">
                            <input type="checkbox" id="services4" name="services[]">
                            <label for="services4">Junta</label>
                        </div> 
                        
                        <div class="checkbox-group">
                            <input type="checkbox" id="services5" name="services[]">
                            <label for="services5">Contract</label>
                        </div>  
                        <div class="checkbox-group">
                            <input type="checkbox" id="services6" name="services[]">
                            <label for="services6">SEF Entry</label>
                        </div>  
                    </div>
                </div>

                <!-- Completed Services-->
                <div class="input-field checkbox">
                    <h2>Services Completed :</h2>
                    <div class="checkboxes">
                        <div class="checkbox-group">
                            <input type="checkbox" id="completedServices1" name="completedServices">
                            <label for="completedServices1">Full Package</label>
                        </div> 
                        <div class="checkbox-group">
                            <input type="checkbox" id="completedServices2" name="completedServices">
                            <label for="completedServices2">Finance</label> 
                        </div> 
                        <div class="checkbox-group">
                            <input type="checkbox" id="completedServices3" name="completedServices">
                            <label for="completedServices3">Social</label>
                        </div> 
                        
                        <div class="checkbox-group">
                            <input type="checkbox" id="completedServices4" name="completedServices">
                            <label for="completedServices4">Junta</label>
                        </div> 
                        
                        <div class="checkbox-group">
                            <input type="checkbox" id="completedServices5" name="completedServices">
                            <label for="completedServices5">Contract</label>
                        </div>  
                        <div class="checkbox-group">
                            <input type="checkbox" id="completedServices6" name="completedServices">
                            <label for="completedServices6">SEF Entry</label>
                        </div>  
                    </div>
                </div>
                <!-- Agents Details and Services they are woriing with -->
                <div class="agent-field-group">
                    <div class="input-field">
                        <label for="agent_name"></label>
                        <input type="text" name="agent_name" placeholder="Agent Name 1">
                    </div>
                    <div class="input-field">
                        <label for="agent_name"></label>
                        <input type="text" name="agent_name" placeholder="Agent Name 2">
                    </div>
                    <div class="input-field checkbox">
                        <h2>Mention Services Agents 1 Working with :</h2>
                        <div class="checkboxes">
                            <div class="checkbox-group">
                                <input type="checkbox" id="agentServiceOne1" name="agentServiceOne">
                                <label for="agentServiceOne1">Finance</label>
                            </div> 
                            <div class="checkbox-group">
                                <input type="checkbox" id="agentServiceOne2" name="agentServiceOne">
                                <label for="agentServiceOne2">Social</label> 
                            </div> 
                            <div class="checkbox-group">
                                <input type="checkbox" id="agentServiceOne3" name="agentServiceOne">
                                <label for="agentServiceOne3">Junta</label>
                            </div> 
                            <div class="checkbox-group">
                                <input type="checkbox" id="agentServiceOne4" name="agentServiceOne">
                                <label for="agentServiceOne4">Contract</label>
                            </div>
                        </div>
                    </div>
                    <div class="input-field checkbox">
                        <h2>Mention Services Agents 2 Working with :</h2>
                        <div class="checkboxes">
                            <div class="checkbox-group">
                                <input type="checkbox" id="agentServiceTwo1" name="agentServiceTwo">
                                <label for="agentServiceTwo1">Finance</label>
                            </div> 
                            <div class="checkbox-group">
                                <input type="checkbox" id="agentServiceTwo2" name="agentServiceTwo">
                                <label for="agentServiceTwo2">Social</label> 
                            </div> 
                            <div class="checkbox-group">
                                <input type="checkbox" id="agentServiceTwo3" name="agentServiceTwo">
                                <label for="agentServiceTwo3">Junta</label>
                            </div> 
                            <div class="checkbox-group">
                                <input type="checkbox" id="agentServiceTwo4" name="agentServiceTwo">
                                <label for="agentServiceTwo4">Contract</label>
                            </div>
                        </div>
                    </div>
                    <!-- agent 3 and 4 -->
                    <div class="input-field">
                        <label for="agent_name"></label>
                        <input type="text" name="agent_name" placeholder="Agent Name 3">
                    </div>
                    <div class="input-field">
                        <label for="agent_name"></label>
                        <input type="text" name="agent_name" placeholder="Agent Name 4">
                    </div>
                    <div class="input-field checkbox">
                        <h2>Mention Services Agents 3 Working with :</h2>
                        <div class="checkboxes">
                            <div class="checkbox-group">
                                <input type="checkbox" id="agentServiceThree1" name="agentServiceThree">
                                <label for="agentServiceThree1">Finance</label>
                            </div> 
                            <div class="checkbox-group">
                                <input type="checkbox" id="agentServiceThree2" name="agentServiceThree">
                                <label for="agentServiceThree2">Social</label> 
                            </div> 
                            <div class="checkbox-group">
                                <input type="checkbox" id="agentServiceThree3" name="agentServiceThree">
                                <label for="agentServiceThree3">Junta</label>
                            </div> 
                            <div class="checkbox-group">
                                <input type="checkbox" id="agentServiceThree4" name="agentServiceThree">
                                <label for="agentServiceThree4">Contract</label>
                            </div>
                        </div>
                    </div>
                    <div class="input-field checkbox">
                        <h2>Mention Services Agents 4 Working with :</h2>
                        <div class="checkboxes">
                            <div class="checkbox-group">
                                <input type="checkbox" id="agentServiceFour1" name="agentServiceFour">
                                <label for="agentServiceFour1">Finance</label>
                            </div> 
                            <div class="checkbox-group">
                                <input type="checkbox" id="agentServiceFour2" name="agentServiceFour">
                                <label for="agentServiceFour2">Social</label> 
                            </div> 
                            <div class="checkbox-group">
                                <input type="checkbox" id="agentServiceFour3" name="agentServiceFour">
                                <label for="agentServiceFour3">Junta</label>
                            </div> 
                            <div class="checkbox-group">
                                <input type="checkbox" id="agentServiceFour4" name="agentServiceFour">
                                <label for="agentServiceFour4">Contract</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="submit-button">
                    <input type="submit" name="submit" Value="Save" />
                </div>
            </form>
        </div>
    </section>
    
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js" integrity="sha512-8qmis31OQi6hIRgvkht0s6mCOittjMa9GMqtK9hes5iEQBQE/Ca6yGE5FsW36vyipGoWQswBj/QBm2JR086Rkw==" crossorigin="anonymous"></script> -->
</body>
</html>