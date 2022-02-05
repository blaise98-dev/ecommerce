                      <?php 
                       if (!isset($_SESSION['USERID'])){
                          redirect(web_root."admin/index.php");
                         }

                      // $autonum = New Autonumber();
                      // $res = $autonum->single_autonumber(2);

                       ?>
                      <form class="form-horizontal span6" action="controller.php?action=add" method="POST">

                          <div class="row">
                              <div class="col-lg-12">
                                  <h1 class="page-header">Add New customer</h1>
                              </div>
                              <!-- /.col-lg-12 -->
                          </div>

                          <!-- <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "user_id">User Id:</label>

                      <div class="col-md-8"> -->
                          <!--  <input class="form-control input-sm" id="user_id" name="user_id" placeholder=
                            "Account Id" type="hidden" value="<?php echo $res->AUTO; ?>"> -->
                          <!--   </div>
                    </div>
                  </div> -->
                          <div class="form-group">
                              <div class="col-md-10">
                                  <label class="col-md-4 control-label" for="FNAME">First Name:</label>
                                  <!-- <input  id="CUSTOMERID" name="CUSTOMERID"  type="HIDDEN" value="<?php echo $res->AUTO; ?>">  -->
                                  <div class="col-md-8">
                                      <input class="form-control input-sm" id="FNAME" name="FNAME"
                                          placeholder="First Name" type="text" value="">
                                  </div>
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-10">
                                  <label class="col-md-4 control-label" for="LNAME">Last Name:</label>

                                  <div class="col-md-8">
                                      <input class="form-control input-sm" id="LNAME" name="LNAME"
                                          placeholder="Last Name" type="text" value="">
                                  </div>
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-10">
                                  <label class="col-md-4 control-label" for="GENDER">Gender:</label>

                                  <div class="col-md-8">
                                      <input id="GENDER" name="GENDER" placeholder="Gender" type="radio" checked="true"
                                          value="Male"><b> Male </b>
                                      <input id="GENDER" name="GENDER" placeholder="Gender" type="radio" value="Female">
                                      <b> Female </b>
                                  </div>
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-10">
                                  <label class="col-md-4 control-label" for="CITYADD">Province:</label>

                                  <div class="col-md-8">
                                      <select class="form-control province-input-sm" name="CUSTPROVINCE"
                                          id="province-dropdown" required>
                                          <option value="" class="default-opt">Choose Province</option>
                                      </select>

                                  </div>
                              </div>
                          </div>


                          <div class="form-group">
                              <div class="col-md-10">
                                  <label class="col-md-4 control-label" for="CITYADD">District:</label>

                                  <div class="col-md-8">
                                      <select class="form-control sector-input-sm" name="CUSTDISTRICT"
                                          id="district-dropdown" required>
                                          <option value="" class="default-opt">Choose District</option>

                                      </select>
                                  </div>
                              </div>
                          </div>


                          <div class="form-group">
                              <div class="col-md-10">
                                  <label class="col-md-4 control-label" for="CITYADD">Sector:</label>

                                  <div class="col-md-8">
                                      <select class="form-control sector-input-sm" name="CUSTSECTOR"
                                          id="sector-dropdown" required>
                                          <option value="" class="default-opt">Choose Sector</option>

                                      </select>
                                  </div>
                              </div>
                          </div>


                          <div class="form-group">
                              <div class="col-md-10">
                                  <label class="col-md-4 control-label" for="CITYADD">Cell:</label>

                                  <div class="col-md-8">
                                      <select class="form-control cell-input-sm" name="CUSTCELL" id="cell-dropdown"
                                          required>
                                          <option value="" class="default-opt">Choose Cell</option>

                                      </select>
                                  </div>
                              </div>
                          </div>


                          <div class="form-group">
                              <div class="col-md-10">
                                  <label class="col-md-4 control-label" for="CITYADD">Village:</label>

                                  <div class="col-md-8">
                                      <select class="form-control cell-input" name="CUSTVILLAGE" id="village-dropdown"
                                          required>
                                          <option value="" class="default-opt">Choose village</option>
                                      </select>
                                  </div>
                              </div>
                          </div>


                          <div class="form-group">
                              <div class="col-md-10">
                                  <label class="col-md-4 control-label" for="CUSUNAME">Username:</label>

                                  <div class="col-md-8">
                                      <input class="form-control input-sm" id="CUSUNAME" name="CUSUNAME"
                                          placeholder="Username" type="text" value="">
                                  </div>
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-10">
                                  <label class="col-md-4 control-label" for="CUSPASS">Password:</label>

                                  <div class="col-md-8">
                                      <input class="form-control input-sm" id="CUSPASS" name="CUSPASS"
                                          placeholder="Password" type="password" value=""><span></span>
                                  </div>
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-10">
                                  <label class="col-md-4 control-label" for="PASS"></label>

                                  <div class="col-md-8">
                                      <p>Note</p>
                                      Password must be atleast 8 to 15 characters. Only letter, numeric
                                      digits, underscore and first character must be a letter.
                                  </div>
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-10">
                                  <label class="col-md-4 control-label" for="PHONE">Contact
                                      Number:</label>

                                  <div class="col-md-8">
                                      <input class="form-control input-sm" id="PHONE" name="PHONE"
                                          placeholder="+250 783530924" type="number" value="">
                                  </div>
                              </div>
                          </div>


                          <div class="form-group">
                              <div class="col-md-8">
                                  <label class="col-md-4 control-label" for="idno"></label>

                                  <div class="col-md-8">
                                      <button class="btn btn-primary btn-sm" name="save" type="submit"><span
                                              class="fa fa-save fw-fa"></span> Save</button>
                                      <!-- <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-circle-left fw-fa"></span></span>&nbsp;<strong>List of Users</strong></a> -->
                                  </div>
                              </div>
                          </div>


                          <div class="form-group">
                              <div class="rows">
                                  <div class="col-md-6">
                                      <label class="col-md-6 control-label" for="otherperson"></label>

                                      <div class="col-md-6">

                                      </div>
                                  </div>

                                  <div class="col-md-6" align="right">


                                  </div>

                              </div>
                          </div>

                      </form>
                      </form>
                      <script language="javascript" type="text/javascript">
function OpenPopupCenter(pageURL, title, w, h) {
    var left = (screen.width - w) / 2;
    var top = (screen.height - h) / 4; // for 25% - devide by 4  |  for 33% - devide by 3
    var targetWin = window.open(pageURL, title,
        'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' +
        w + ', height=' + h + ', top=' + top + ', left=' + left);
}


let provinceSelector = document.querySelector('#province-dropdown');
let districtSelector = document.querySelector('#district-dropdown');
let sectorSelector = document.querySelector('#sector-dropdown');
let cellSelector = document.querySelector('#cell-dropdown');
let villageSelector = document.querySelector('#village-dropdown');

// fetch data
const url = 'data.json';
fetch(url)
    .then((response) => {
        if (response.status !== 200) {
            console.log('Looks like there was a problem. Status Code: ' + response.status);
            return;
        }
        response.json().then((data) => {
            let option;
            let provinceKeys = Object.keys(data);
            for (let i = 0; i < provinceKeys.length; i++) {
                option = document.createElement('option');
                option.text = provinceKeys[i];
                option.value = provinceKeys[i];
                provinceSelector.add(option);
            }
            provinceSelector.addEventListener('change', (e) => allDistricts(data[e.target.value]));
        });
    })
    .catch((err) => {
        console.error('Fetch Error -', err);
    });

const allDistricts = (data) => {
    let districtKeys = Object.keys(data);
    districtSelector.innerHTML = '';
    for (let i = 0; i < districtKeys.length; i++) {
        option = document.createElement('option');
        option.text = districtKeys[i];
        option.value = districtKeys[i];
        districtSelector.add(option);
    }
    districtSelector.addEventListener('change', (e) => allSectors(data[e.target.value]));
};

const allSectors = (data) => {
    let sectorKeys = Object.keys(data);
    sectorSelector.innerHTML = '';
    for (let i = 0; i < sectorKeys.length; i++) {
        option = document.createElement('option');
        option.text = sectorKeys[i];
        option.value = sectorKeys[i];
        sectorSelector.add(option);
    }
    sectorSelector.addEventListener('change', (e) => allCells(data[e.target.value]));
};

const allCells = (data) => {
    let cellKeys = Object.keys(data);
    cellSelector.innerHTML = '';
    for (let i = 0; i < cellKeys.length; i++) {
        option = document.createElement('option');
        option.text = cellKeys[i];
        option.value = cellKeys[i];
        cellSelector.add(option);
    }
    cellSelector.addEventListener('change', (e) => allVillages(data[e.target.value]));
};

const allVillages = (data) => {
    villageSelector.innerHTML = '';
    for (let i = 0; i < data.length; i++) {
        option = document.createElement('option');
        option.text = data[i];
        option.value = data[i];
        villageSelector.add(option);
    }
};
                      </script>