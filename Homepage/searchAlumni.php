

<script type="text/javascript">
                function filterTable(ele) {
                    var id = ele.id;
                    let input = document.getElementById(id);
                    let filter = input.value.toUpperCase();
                    let table = document.getElementById("alumniTable");
                    let tr = table.getElementsByTagName("tr");

                    var sel = document.getElementById("dropdown");
                    var index = sel.options[sel.selectedIndex].value;

                    for (let i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[index];
                        if (td) {
                            let txt = td.textContent || td.innerText;
                            if (txt.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            }
                            else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }
            </script>

                <table>
                    <tr>
                        <td>
                            <select class="inputTable" data-target=".tableSelect"  name="inputTable" id = 'dropdown'>
                                <option value="1" data-show=".alumniID" selected>Alumni ID</option>
                                <option value="2" data-show=".birthdate">Birthdate</option>
                                <option value="3" data-show=".status">Status</option>
                                <option value="4" data-show=".email">Email</option>
                                <option value="5" data-show=".phoneNumber">Phone Number</option>
                                <option value="6" data-show=".firstName">First Name</option>
                                <option value="7" data-show=".middleName">Middle Name</option>
                                <option value="8" data-show=".lastName">Last Name</option>
                                <option value="9" data-show=".streetName">Street Name</option>
                                <option value="10" data-show=".city">City</option>
                                <option value="11" data-show=".state">State</option>
                                <option value="12" data-show=".countryRegion">Country/Region</option>
                                <option value="13" data-show=".zipcode">Zipcode</option>
                            </select>
                        </td>
                        
                        <td>
                            <div class="tableSelect">
                                <div class="alumniID hide"><input type="text" id="alumniIDInput" class="box" onkeyup="filterTable(this);" name="alumniID" placeholder="Search for Alumni ID..."></div>
                                <div class="birthdate hide"><input type="text" id="birthdateInput" class="box" onkeyup="filterTable(this);" name="birthdate" placeholder="Search for Birthdate..."></div>
                                <div class="status hide"><input type="text" id="statusInput" class="box" onkeyup="filterTable(this);" name="status" placeholder="Search for Status..."></div>
                                <div class="email hide"><input type="text" id="emailInput" class="box" onkeyup="filterTable(this);" name="email" placeholder="Search for Email..."></div>
                                <div class="phoneNumber hide"><input type="text" id="phoneNumberInput" class="box" onkeyup="filterTable(this);" name="phoneNumber" placeholder="Search for Phone Number..."></div>
                                <div class="firstName hide"><input type="text" id="firstNameInput" class="box" onkeyup="filterTable(this);" name="firstName" placeholder="Search for First Name..."></div>
                                <div class="middleName hide"><input type="text" id="middleNameInput" class="box" onkeyup="filterTable(this);" name="middleName" placeholder="Search for Middle Name..."></div>
                                <div class="lastName hide"><input type="text" id="lastNameInput" class="box" onkeyup="filterTable(this);" name="lastName" placeholder="Search for Last Name..."></div>
                                <div class="streetName hide"><input type="text" id="streetNameInput" class="box" onkeyup="filterTable(this);" name="streetName" placeholder="Search for Street Name..."></div>
                                <div class="city hide"><input type="text" id="cityInput" class="box" onkeyup="filterTable(this);" name="city" placeholder="Search for City..."></div>
                                <div class="state hide"><input type="text" id="stateInput" class="box" onkeyup="filterTable(this);" name="state" placeholder="Search for State..."></div>
                                <div class="countryRegion hide"><input type="text" id="countryRegionInput" class="box" onkeyup="filterTable(this);" name="countryRegion" placeholder="Search for Country/Region..."></div>
                                <div class="zipcode hide"><input type="text" id="zipcodeInput" class="box" onkeyup="filterTable(this);" name="zipcode" placeholder="Search for Zipcode..."></div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                // waits for the user to click something     
                //       event     selector    data     handler
                $(document).on('change', '.inputTable', function() { 
                    var target = $(this).data('target'); // previous thing selected
                    var show = $("option:selected", this).data('show');// new thing selected
                    $(target).children().addClass('hide');// adds the class hide so the CSS will hide it
                    $(show).removeClass('hide');// removes the hide functionality on the new thing selected
                });

                // triggers the above function before right before the user sees the page
                // without this the user would see all of the textboxs
                $(document).ready(function(){ 
                    var show = $("option:selected", this).data('show');
                    $(show).removeClass('hide');
                });
            </script>

            <style>
                .hide {
                    display: none;
                }
            </style>